<?php


namespace App\Http\Requests\Admin\Placemark;


class UpdatePlacemarkRequest extends BasePlacemarkRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
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
