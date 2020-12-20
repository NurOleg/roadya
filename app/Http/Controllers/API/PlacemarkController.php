<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Placemark\ListPlacemarkRequest;
use App\Http\Requests\Placemark\StorePlacemarkRequest;
use App\Http\Requests\Placemark\UpdatePlacemarkRequest;
use App\Models\Placemark;
use App\Services\PlacemarkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlacemarkController extends BaseApiController
{
    /**
     * @var PlacemarkService|null
     */
    private ?PlacemarkService $service = null;

    /**
     * @param PlacemarkService $service
     */
    public function __construct(PlacemarkService $service)
    {
        $this->service = $service;
    }

    /**
     * @param ListPlacemarkRequest $request
     * @return JsonResponse
     */
    public function index(ListPlacemarkRequest $request): JsonResponse
    {
        return $this->successResponse($this->service->list($request));
    }

    /**
     * @param StorePlacemarkRequest $request
     * @return JsonResponse
     */
    public function store(StorePlacemarkRequest $request): JsonResponse
    {
        $placemark = $this->service->store($request->validated());
        return $this->successResponse($placemark, 'Заведение успешно создано.', Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->successResponse($this->service->show($id));
    }

    /**
     * @param UpdatePlacemarkRequest $request
     * @param Placemark $placemark
     * @return JsonResponse
     */
    public function update(UpdatePlacemarkRequest $request, Placemark $placemark): JsonResponse
    {
        return $this->successResponse($this->service->update($request, $placemark));
    }

    /**
     * @param Placemark $placemark
     * @return JsonResponse
     */
    public function destroy(Placemark $placemark): JsonResponse
    {
        return $this->successResponse([], $this->service->delete($placemark));
    }
}
