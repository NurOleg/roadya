<?php

namespace App\Http\Requests\Placemark;

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
            'name'      => 'string|max:255',
            'type'      => 'string|in:' . implode(',', Placemark::TYPES),
            'address'   => 'string',
            'url'       => 'string|url',
            'phone'     => 'string|regex:/(+7)[0-9]{9}/',
            'instagram' => 'string',
            'telegram'  => 'string',
            'whatsapp'  => 'string',
            'vk'        => 'string',
            'viber'     => 'string',
            'point'     => 'string',
            'tags'      => 'array',
            'tags.*'    => 'string|in:' . implode(',', Placemark::TAGS_BY_TYPES[$this->type]),
            'images.*'  => 'image'
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
