<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class BaseReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'text'         => 'string',
            'rating'       => 'float',
            'placemark_id' => 'int',
            'images'       => 'arrray',
            'images.*'     => 'image'
        ];
    }

    /**
     * @return array
     */
    public function validationData(): array
    {
        $json = $this->get('data');
        return array_merge(json_decode($json, true), $this->allFiles());
    }
}
