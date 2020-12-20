<?php

namespace App\Http\Requests\Review;

class StoreReviewRequest extends BaseReviewRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
                'text'         => 'required',
                'rating'       => 'required',
                'placemark_id' => 'required',
        ]);
    }
}
