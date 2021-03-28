<!DOCTYPE html>
<html lang="en-gb">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Signin | Eleven Admin Template</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900|Anonymous+Pro:400,700|Arimo:400,700"
          rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>

<body>
<svg width="24" height="24" viewBox="0 0 24 24" style="display:none">
    <g id="logo-icon" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none"
       fill-rule="evenodd">
        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
    </g>
</svg>

<div class="page">
    <div class="position-relative d-flex flex-row flex-fill page-wrapper">
        <div class="position-relative d-flex flex-column flex-fill page-content" style="min-width:0">
            <div class="d-flex flex-column justify-content-center align-items-center px-3 bg-white min-vh-100">
                <div class="w-100 auth-card">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <svg width="24" height="24" class="d-block m-auto">
                                    <use xlink:href="#logo-icon"></use>
                                </svg>
                                <h4 class="mb-0 mt-3">Регистрация</h4>
                                <p class="text-muted">Заполните поля для продолжения</p>
                            </div>

                            <div>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                           role="tab"
                                           aria-controls="home" aria-selected="true">ИП</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                           role="tab"
                                           aria-controls="profile" aria-selected="false">ООО</a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <form class="" method="post" action="{{ route('register') }}">
                                            @csrf
                                            <input type="hidden" name="type" value="individual">
                                            <div class="mb-4 form-group">
                                                <label for="name" class="">Имя</label>
                                                <input name="name" id="name" placeholder="Full name" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="surname" class="">Фамилия</label>
                                                <input name="surname" id="surname" placeholder="Full name" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="patronymic" class="">Отчество</label>
                                                <input name="patronymic" id="patronymic" placeholder="Full name"
                                                       type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="address" class="">Фактический адрес: </label>
                                                <input name="address" id="address" placeholder="Address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="post_address" class="">Почтовый адрес: </label>
                                                <input name="post_address" id="post_address" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="phone" class="">Телефон: </label>
                                                <input name="phone" id="phone" placeholder="Phone" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="email" class="">Емаил: </label>
                                                <input name="email" id="email" placeholder="Email address" type="email"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="ogrnip" class="">ОГРНИП: </label>
                                                <input name="ogrnip" id="ogrnip" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="inn" class="">ИНН: </label>
                                                <input name="inn" id="inn" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="checking_account" class="">Расчетный счет: </label>
                                                <input name="checking_account" id="checking_account"
                                                       placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="personal_account" class="">Личный счет: </label>
                                                <input name="personal_account" id="personal_account"
                                                       placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="bik" class="">БИК: </label>
                                                <input name="bik" id="bik" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="kpp" class="">КПП: </label>
                                                <input name="kpp" id="kpp" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>

                                            <div class="mb-4 form-group">
                                                <label for="password" class="">Придумайте пароль (не менее 8-ти
                                                    символов): </label>
                                                <input name="password" id="password" placeholder="Email address"
                                                       type="password"
                                                       class="form-control"/>
                                            </div>

                                            <button class="mb-3 btn btn-primary btn-lg btn-block">
                                                Регистрация
                                            </button>

                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                         aria-labelledby="profile-tab">
                                        <form class="" method="post" action="{{ route('register') }}">
                                            @csrf
                                            <input type="hidden" name="type" value="company">
                                            <div class="mb-4 form-group">
                                                <label for="name" class="">Имя</label>
                                                <input name="name" id="name" placeholder="Full name" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="surname" class="">Фамилия</label>
                                                <input name="surname" id="surname" placeholder="Full name" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="patronymic" class="">Отчество</label>
                                                <input name="patronymic" id="patronymic" placeholder="Full name"
                                                       type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="director_name" class="">Имя</label>
                                                <input name="director_name" id="director_name" placeholder="Full name"
                                                       type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="director_surname" class="">Фамилия</label>
                                                <input name="director_surname" id="director_surname"
                                                       placeholder="Full name" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="director_patronymic" class="">Отчество</label>
                                                <input name="director_patronymic" id="director_patronymic"
                                                       placeholder="Full name" type="text"
                                                       class="form-control"/>
                                            </div>

                                            <div class="mb-4 form-group">
                                                <label for="legal_address" class="">Юридический адрес: </label>
                                                <input name="legal_address" id="legal_address"
                                                       placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="post_address" class="">Почтовый адрес: </label>
                                                <input name="post_address" id="post_address" placeholder="Email address"
                                                       type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="phone" class="">Телефон: </label>
                                                <input name="phone" id="phone" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="email" class="">Емаил: </label>
                                                <input name="email" id="email" placeholder="Email address" type="email"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="ogrn" class="">ОГРН: </label>
                                                <input name="ogrn" id="ogrn" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="inn" class="">ИНН: </label>
                                                <input name="inn" id="inn" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="kpp" class="">КПП: </label>
                                                <input name="kpp" id="kpp" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="bank_account" class="">Счет банка: </label>
                                                <input name="bank_account" id="bank_account" placeholder="Email address"
                                                       type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="personal_account" class="">Личный счет: </label>
                                                <input name="personal_account" id="personal_account"
                                                       placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="bik" class="">БИК: </label>
                                                <input name="bik" id="bik" placeholder="Email address" type="text"
                                                       class="form-control"/>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label class="">Действует на основании доверенности или на
                                                    основание устава
                                                    (выбор): </label>
                                                <fieldset class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="powers_of_attorney"
                                                                   type="radio">
                                                            Доверенность</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="charter" type="radio">
                                                            Устав</label>
                                                    </div>

                                                </fieldset>
                                            </div>

                                            <div class="mb-4 form-group">
                                                <label for="password" class="">Придумайте пароль (не менее 6-ти
                                                    символов): </label>
                                                <input name="password" id="password" placeholder="Email address"
                                                       type="password"
                                                       class="form-control"/>
                                            </div>

                                            <button class="mb-3 btn btn-primary btn-lg btn-block">
                                                Регистрация
                                            </button>

                                        </form>
                                    </div>

                                </div>
                            </div>
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
