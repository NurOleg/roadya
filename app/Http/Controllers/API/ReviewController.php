<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Placemark\StorePlacemarkRequest;
use App\Http\Requests\Placemark\UpdatePlacemarkRequest;
use App\Http\Requests\Review\ListReviewRequest;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Models\Placemark;
use App\Models\Review;
use App\Services\PlacemarkService;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends BaseApiController
{
    /**
     * @var ReviewService|null
     */
    private ?ReviewService $service = null;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
        $this->middleware('auth:sanctum');
    }

    /**
     * @param ListReviewRequest $request
     * @return JsonResponse
     */
    public function index(ListReviewRequest $request): JsonResponse
    {
        return $this->successResponse($this->service->list($request));
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->successResponse($this->service->show($id));
    }
}
