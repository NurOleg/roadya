<?php


namespace App\Services\Admin;


use App\Http\Requests\Admin\Login\LoginRequest;
use App\Http\Requests\Admin\Login\RegisterRequest;
use App\Models\CompanyOptions;
use App\Models\IndividualOptions;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));

        $user = User::create($data);

        if ($request->get('type') === User::IP_TYPE) {
            IndividualOptions::create(array_merge($request->all(), ['user_id' => $user->id]));
        } else {
            CompanyOptions::create(array_merge($request->all(), ['user_id' => $user->id]));
        }

        $request->session()->regenerate();

        Auth::login($user);

        return redirect()->intended(route('placemark_index'));
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('placemark_index'));
        }

        return back()->withErrors([
            'email' => 'Вы ещё зарегестрированы либо ввели неправильный пароль.',
        ]);
    }
}
