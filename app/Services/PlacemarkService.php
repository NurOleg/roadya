<?php


namespace App\Services;


use App\Http\Requests\Placemark\ListPlacemarkRequest;
use App\Http\Requests\Placemark\UpdatePlacemarkRequest;
use App\Models\Image;
use App\Models\Placemark;
use App\Models\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PlacemarkService
{
    /**
     * @param ListPlacemarkRequest $request
     * @return Paginator
     */
    public function list(ListPlacemarkRequest $request): Paginator
    {
        $placemarksQuery = Placemark::with(['images', 'rating', 'tags']);

        if ($request->filled('polygon')) {
            $polygon = $this->preparePolygon($request->get('polygon'));
            $placemarksQuery->whereRaw('Contains(point, GeomFromText(' . $polygon . '))');
        }

        $count = $request->filled('count') ? $request->get('count') : 15;

        $placemarks = $placemarksQuery->simplePaginate($count);

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
}
