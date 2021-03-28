<?php

namespace App\Http\Requests\Admin\Login;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $extraRules = $this->get('type') === 'individual' ? self::individualRules() : self::companyRules();

        return array_merge($extraRules,
            [
                'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'         => ['required', 'string', 'min:8'],
                'name'             => ['required', 'string', 'min:2'],
                'surname'          => ['required', 'string', 'min:2'],
                'patronymic'       => ['required', 'string', 'min:5'],
                'post_address'     => ['required', 'string', 'min:5'],
                'phone'            => ['required', 'string', 'min:10'],
                'inn'              => ['required', 'string', 'min:10'],
                'kpp'              => ['required', 'string', 'min:10'],
                'bik'              => ['required', 'string', 'min:10'],
                'personal_account' => ['required', 'string', 'min:10'],
            ]
        );
    }

    /**
     * @return array
     */
    private static function individualRules(): array
    {
        return [
            'checking_account' => ['required', 'string'],
            'ogrnip'           => ['required', 'string'],
            'address'          => ['required', 'string', 'min:10'],
        ];
    }

    /**
     * @return array
     */
    private static function companyRules(): array
    {
        return [
            'director_surname'    => ['required', 'string'],
            'director_name'       => ['required', 'string'],
            'director_patronymic' => ['required', 'string'],
            'legal_address'       => ['required', 'string'],
            'ogrn'                => ['required', 'string'],
            'bank_account'        => ['required', 'string'],
        ];
    }
}
