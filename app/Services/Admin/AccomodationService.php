<?php


namespace App\Services\Admin;

use App\Models\Image;
use App\Models\Placemark;
use App\Models\Service;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Placemark\UpdatePlacemarkRequest;

class AccomodationService
{
    /**
     * @param User $user
     * @return mixed
     */
    public function index(User $user)
    {
        return Service::whereUserId($user->id)->get();
    }

    /**
     * @param array $data
     * @return Placemark
     */
    public function store(array $data): Placemark
    {

    }

    /**
     * @param UpdatePlacemarkRequest $request
     * @param Placemark $placemark
     * @return Placemark
     */
    public function update(UpdatePlacemarkRequest $request, Placemark $placemark): Placemark
    {

    }

    /**
     * @param Service $service
     * @return bool
     * @throws \Exception
     */
    public function delete(Service $service): bool
    {
        return $service->delete();
    }
}
