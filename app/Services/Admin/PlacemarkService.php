<?php


namespace App\Services\Admin;

use App\Models\Image;
use App\Models\Placemark;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Placemark\UpdatePlacemarkRequest;

class PlacemarkService
{
    /**
     * @param User $user
     * @return mixed
     */
    public function index(User $user)
    {
        return Placemark::whereUserId($user->id)->get();
    }

    /**
     * @param array $data
     * @return Placemark
     */
    public function store(array $data): Placemark
    {
        $data['point'] = DB::raw("ST_GeomFromText('POINT({$data['point']})')");

        //auth()->user()->id
        $placemark = Placemark::create(array_merge($data, ['user_id' => auth()->user()->id]));
        $uploadedImages = [];

        foreach ($data['images'] as $image) {
            /** @var UploadedFile $image */
            $path = $image->store('placemarks/' . $placemark->id);
            $uploadedImages[] = new Image(['path' => $path]);
        }

        $placemark->images()->saveMany($uploadedImages);

        if (!empty($data['tags'])) {
            $tagCodesArray = $data['tags'];
            $tagIds = Tag::whereIn('code', $tagCodesArray)->get()->pluck('id')->toArray();

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
     * @param Placemark $placemark
     * @return bool
     */
    public function delete(Placemark $placemark): bool
    {
        try {
            $placemark->images()->delete();

            Storage::deleteDirectory('placemarks/' . $placemark->id);

            return $placemark->delete();

        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
