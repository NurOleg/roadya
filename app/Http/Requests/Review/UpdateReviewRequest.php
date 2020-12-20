<?php

namespace App\Http\Requests\Review;

class UpdateReviewRequest extends BaseReviewRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'delete_images'   => 'array',
            'delete_images.*' => 'int',
        ]);
    }
}
