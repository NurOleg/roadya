<?php

namespace App\Http\Requests\Placemark;

use Illuminate\Foundation\Http\FormRequest;

class ListPlacemarkRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'page'    => 'int',
            'count'   => 'int',
            'polygon' => 'array'
        ];
    }
}
