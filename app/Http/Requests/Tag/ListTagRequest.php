<?php

namespace App\Http\Requests\Tag;

use App\Models\Placemark;
use Illuminate\Foundation\Http\FormRequest;

class ListTagRequest extends FormRequest
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
            'type' => 'string|in:' . implode(',', Placemark::TYPES),
        ];
    }
}
