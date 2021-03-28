<?php


namespace App\Services\Admin;

use App\Models\Image;
use App\Models\Placemark;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

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
}
