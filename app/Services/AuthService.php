<?php


namespace App\Services;


use App\Http\Requests\Auth\GetTokenRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @param RegisterRequest $request
     * @return string
     */
    public function register(RegisterRequest $request): string
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));
        $data['type'] = User::TRAVELLER_TYPE;

        $user = User::create($data);

        return $user->createToken($request->get('email'))->plainTextToken;
    }

    /**
     * @param GetTokenRequest $request
     * @return string
     * @throws \Exception
     */
    public function getToken(GetTokenRequest $request): string
    {
        $user = User::whereEmail($request->get('email'))->first();

        if ($user === null || !Hash::check($request->get('password'), $user->password)) {
            throw new \Exception('Вы ещё зарегестрированы либо ввели неправильный пароль.');
        }

        return $user->createToken($request->get('email'))->plainTextToken;
    }
}
