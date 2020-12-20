<?php


namespace App\Services;


use App\Http\Requests\Placemark\ListPlacemarkRequest;
use App\Http\Requests\Placemark\UpdatePlacemarkRequest;
use App\Models\Image;
use App\Models\Placemark;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PlacemarkService
{
    /**
     * @param array $data
     * @return Placemark
     */
    public function store(array $data): Placemark
    {
        $data['point'] = DB::raw("ST_GeomFromText('POINT({$data['point']})')");

        //auth()->user()->id
        $placemark = Placemark::create(array_merge($data, ['user_id' => 1]));
        $uploadedImages = [];

        foreach ($data['images'] as $image) {
            /** @var UploadedFile $image */
            $path = $image->store('placemarks/' . $placemark->id);
            $uploadedImages[] = new Image(['path' => $path]);
        }

        $placemark->images()->saveMany($uploadedImages);

        if (!empty($data['tags'])) {
            $tagCodesArray = $data['tags'];
            $tagIds = Tag::whereIn('code', $tagCodesArray)->get(['id'])->toArray();
            $placemark->tags()->attach($tagIds);
        }

        $placemark->point = [$placemark->latitude, $placemark->longitude];

        return $placemark;
    }

    /**
     * @param UpdatePlacemarkRequest $request
     * @param Placemark $placemark
     * @return Placemark
     */
    public function update(UpdatePlacemarkRequest $request, Placemark $placemark): Placemark
    {
        $placemark->update($request->validated());

        if ($request->filled('delete_images')) {
            $deletedImagesQuery = $placemark->images()->whereIn('id', $request->get('delete_images'));
            $deletedImagesPaths = $deletedImagesQuery->get(['path'])->toArray();

            Storage::delete($deletedImagesPaths);

            $deletedImagesQuery->delete();
        }

        $uploadedImages = [];
        if ($request->filled('images')) {
            foreach ($request->get('images') as $image) {
                /** @var UploadedFile $image */
                $path = $image->store('placemarks/' . $placemark->id);
                $uploadedImages[] = new Image(['path' => $path]);
            }

            $placemark->images()->saveMany($uploadedImages);
        }

        if ($request->filled('tags')) {
            $tagCodesArray = $request->get('tags');
            $tagIds = Tag::whereIn('code', $tagCodesArray)->get(['id'])->toArray();
            $placemark->tags()->sync($tagIds);
        }

        return $placemark;
    }

    /**
     * @param ListPlacemarkRequest $request
     * @return LengthAwarePaginator
     */
    public function list(ListPlacemarkRequest $request): LengthAwarePaginator
    {
        $placemarksQuery = Placemark::with(['images', 'rating', 'tags']);

        if ($request->filled('polygon')) {
            $polygon = $this->preparePolygon($request->get('polygon'));
            $placemarksQuery->whereRaw('Contains(point, GeomFromText(' . $polygon . '))');
        }

        $count = $request->filled('count') ? $request->get('count') : 15;

        $placemarks = $placemarksQuery->paginate($count);

        foreach ($placemarks->items() as $placemark) {
            $placemark->point = [$placemark->latitude, $placemark->longitude];
            $placemark->reviews_rating = $placemark['rating'];
        }

        return $placemarks;
    }

    /**
     * @param array $coords
     * @return string
     */
    private function preparePolygon(array $coords): string
    {
        $str = '';

        foreach($coords as $coord) {
            $str .= $coord[0] . ' ' . $coord[1] . ',';
        }

        return mb_substr($str, 0, -1);
    }

    /**
     * @param int $id
     * @return Placemark
     * @throws HttpException
     */
    public function show(int $id): Placemark
    {
        try {
            $placemark = Placemark::with(['images', 'tags'])->findOrFail($id);

            $placemark->point = [$placemark->latitude, $placemark->longitude];
            $placemark->reviews_rating = $placemark->reviews()->avg('rating');

            return $placemark;
        } catch (ModelNotFoundException $exception) {
            throw new HttpException(Response::HTTP_NOT_FOUND, 'Такое заведение ещё не создано или было удалено.');
        }

    }

    /**
     * @param Placemark $placemark
     * @return bool
     */
    public function delete(Placemark $placemark): bool
    {
        $result = 'Не удалось удалить заведение.';
        try {
            $placemark->images()->delete();

            Storage::deleteDirectory('placemarks/' . $placemark->id);

            $placemark->delete();

            $result = 'Заведение успешно удалено';
        } catch (\Exception $e) {
        }

        return $result;
    }
}
