<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="" />


    <title>Signin | Eleven Admin Template</title>
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:900|Anonymous+Pro:400,700|Arimo:400,700"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body>
<svg width="24" height="24" viewBox="0 0 24 24" style="display:none">
    <g
        id="logo-icon"
        stroke="currentColor"
        stroke-width="1"
        stroke-linecap="round"
        stroke-linejoin="round"
        fill="none"
        fill-rule="evenodd"
    >
        <path
            d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"
        ></path>
    </g>
</svg>

<div class="page">
    <div class="position-relative d-flex flex-row flex-fill page-wrapper">
        <div
            class="position-relative d-flex flex-column flex-fill page-content"
            style="min-width:0"
        >
            <div
                class="d-flex flex-column justify-content-center align-items-center px-3 bg-white min-vh-100"
            >
                <div class="w-100 auth-card">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <svg width="24" height="24" class="d-block m-auto">
                                    <use xlink:href="#logo-icon"></use>
                                </svg>
                                <h4 class="mb-0 mt-3">Good Evening, please log in</h4>
                                <p class="text-muted">to continue using your account</p>
                            </div>
                            <form class="" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-4 form-group">
                                    <label for="email" class="">Email</label>
                                    <input
                                        name="email"
                                        id="email"
                                        placeholder="Email address"
                                        type="email"
                                        class="form-control"
                                    />
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="password" class="d-flex">
                                        <span class="mr-auto">Password</span>
                                        <a class="form-text small text-muted" href="#"
                                        >Forgot password?</a
                                        >
                                    </label>
                                    <input
                                        placeholder="Password"
                                        id="password"
                                        name="password"
                                        type="text"
                                        class="form-control"
                                    />
                                </div>
                                <button class="mb-3 btn btn-warning btn-lg btn-block">
                                    Войти
                                </button>
                                <div class="text-center">
                                    <small class="text-muted text-center">
                                        <span>Ещё нет аккаунта?</span>
                                        <a href="{{ route('register_form') }}">Зарегистрируйтесь сейчас!</a>
                                    </small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/lottie.js') }}"></script>
</body>
</html>
