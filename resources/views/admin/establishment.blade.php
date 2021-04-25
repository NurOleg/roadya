<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content=""/>


    <title>Signin | Eleven Admin Template</title>
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:900|Anonymous+Pro:400,700|Arimo:400,700"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body>
<section class="establishment-body">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="https://avatars.mds.yandex.net/get-altay/1371846/2a00000162de7e7560328fc73d94fff01687/L"
                     alt="establishment image"
                     aria-hidden="true"
                     class="w-100">
            </div>
            <div class="col-9">
                <h2>Заведение у камина</h2>
                <p class="lead">It is a long established fact that a reader will be distracted by the readable content
                    of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                    normal distribution of letters, as opposed to using 'Content here, content here', making it look
                    like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                    their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                    infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                    (injected humour and the like).
                </p>
            </div>
        </div>
    </div>
</section>
<section class="establishment-body-services">
    <div class="container">
        <h2>Услуги</h2>
        <ul class="nav nav-tabs" id="services" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true">Горячее</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile" aria-selected="false">Напитки</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Hot</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Drinks</div>
        </div>
    </div>
</section>
</body>
</html>
