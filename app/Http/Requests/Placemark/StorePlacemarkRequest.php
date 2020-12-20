<?php


namespace App\Http\Requests\Placemark;


class StorePlacemarkRequest extends BasePlacemarkRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'name'      => 'required',
            'type'      => 'required',
            'address'   => 'required',
            'url'       => 'string|url',
            'phone'     => 'required',
            'instagram' => 'string',
            'telegram'  => 'string',
            'whatsapp'  => 'string',
            'vk'        => 'string',
            'viber'     => 'string',
            'point'     => 'required',
        ]);
    }
}
