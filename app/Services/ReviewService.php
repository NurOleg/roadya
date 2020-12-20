<?php


namespace App\Services;


use App\Http\Requests\Review\ListReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Models\Image;
use App\Models\Review;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class ReviewService
{
    /**
     * @param array $data
     * @return Review
     */
    public function store(array $data): Review
    {
        //auth()->user()->id
        $review = Review::create(array_merge($data, ['user_id' => rand(0, 10)]));

        $uploadedImages = [];
        if (!empty($data['images'])) {
            foreach ($data['images'] as $image) {
                /** @var UploadedFile $image */
                $path = $image->store('reviews/' . $review->id);
                $uploadedImages[] = new Image(['path' => $path]);
            }

            $review->images()->saveMany($uploadedImages);
        }

        return $review;
    }

    public function update(UpdateReviewRequest $request, Review $review): Review
    {
        $review->update($request->validated());

        if ($request->filled('delete_images')) {
            $deletedImagesQuery = $review->images()->whereIn('id', $request->get('delete_images'));
            $deletedImagesPaths = $deletedImagesQuery->get(['path'])->toArray();

            Storage::delete($deletedImagesPaths);

            $deletedImagesQuery->delete();
        }

        $uploadedImages = [];
        if ($request->filled('images')) {
            foreach ($request->get('images') as $image) {
                /** @var UploadedFile $image */
                $path = $image->store('reviews/' . $review->id);
                $uploadedImages[] = new Image(['path' => $path]);
            }

            $review->images()->saveMany($uploadedImages);
        }

        return $review;
    }

    /**
     * @param ListReviewRequest $request
     * @return LengthAwarePaginator
     */
    public function list(ListReviewRequest $request): LengthAwarePaginator
    {
        $reviewsQuery = Review::with('images');

        if ($request->filled('active')) {
            $reviewsQuery->whereActive($request->get('active'));
        }

        if ($request->filled('user_id')) {
            $reviewsQuery->whereUserId($request->get('user_id'));
        }

        if ($request->filled('placemark_id')) {
            $reviewsQuery->wherePlacemarkId($request->get('placemark_id'));
        }

        $count = $request->filled('count') ? $request->get('count') : 15;

        return $reviewsQuery->paginate($count);
    }

    /**
     * @param int $id
     * @return Review
     */
    public function show(int $id): Review
    {
        $review = Review::with('images')->findOrFail($id);

        return $review;
    }

    /**
     * @param Review $review
     * @return bool
     */
    public function delete(Review $review): bool
    {
        $result = 'Не удалось удалить отзыв.';
        try {
            $review->images()->delete();

            Storage::deleteDirectory('reviews/' . $review->id);

            $review->delete();

            $result = 'Отзыв успешно удалён.';
        } catch (\Exception $e) {
        }

        return $result;
    }
}
