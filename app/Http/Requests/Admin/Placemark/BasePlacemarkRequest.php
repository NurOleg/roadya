<?php

namespace App\Http\Requests\Admin\Placemark;

use App\Models\Placemark;
use Illuminate\Foundation\Http\FormRequest;

class BasePlacemarkRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'        => 'string|max:255',
            'type'        => 'string|in:' . implode(',', Placemark::TYPES),
            'address'     => 'string',
            'url'         => 'string|url',
            'phone'       => 'string|regex:/(+7)[0-9]{10}/',
            'instagram'   => 'string',
            'telegram'    => 'string',
            'whatsapp'    => 'string',
            'vk'          => 'string',
            'viber'       => 'string',
            'point'       => 'string',
            'description' => 'string',
            'tags'        => 'array',
            'images'      => 'array',
            'tags.*'      => 'string|in:' . implode(',', array_keys(Placemark::TAGS_BY_TYPES[$this->validationData()['type']])),
            'images.*'    => 'mimes:jpeg,png,jpg'
        ];
    }
}
