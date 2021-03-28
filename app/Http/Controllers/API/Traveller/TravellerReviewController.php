<?php


namespace App\Http\Controllers\API\Traveller;


use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TravellerReviewController extends BaseApiController
{
    /**
     * @var ReviewService
     */
    private ReviewService $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }

    /**
     * @param StoreReviewRequest $request
     * @return JsonResponse
     */
    public function store(StoreReviewRequest $request): JsonResponse
    {
        $this->authorize('create', Review::class);

        $review = $this->service->store($request->validated());
        return $this->successResponse($review, 'Отзыв успешно создан.', Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $this->authorize('view', Review::class);

        return $this->successResponse($this->service->show($id));
    }

    /**
     * @param UpdateReviewRequest $request
     * @param Review $placemark
     */
    public function update(UpdateReviewRequest $request, Review $placemark)
    {
        $this->authorize('update', Review::class);
    }

    /**
     * @param Review $review
     * @return JsonResponse
     */
    public function destroy(Review $review): JsonResponse
    {
        $this->authorize('delete', Review::class);

        return $this->successResponse([], $this->service->delete($review));
    }
}
