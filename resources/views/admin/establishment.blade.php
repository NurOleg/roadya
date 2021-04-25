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
<div class="d-flex justify-content-center">
    <h1 class="pt-4">Настройки вашего заведения</h1>
</div>
<section class="establishment-body pt-5 mt-2 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="https://avatars.mds.yandex.net/get-altay/1371846/2a00000162de7e7560328fc73d94fff01687/L"
                     alt="establishment image"
                     aria-hidden="true"
                     class="w-100">
            </div>
            <div class="col-8">
                <h2 class="mb-3">Заведение у камина</h2>
                <p class="lead">It is a long established fact that a reader will be distracted by the readable content
                    of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                    normal distribution of letters, as opposed to using 'Content here, content here', making it look
                    like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                    their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                    infancy.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="establishment-body-services">
    <div class="container">
        <h2 class="mb-4 ">Услуги</h2>
        <ul class="nav nav-tabs" id="services" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#hot" role="tab" aria-controls="home"
                   aria-selected="true">Горячее</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile" aria-selected="false">Напитки</a>
            </li>

        </ul>
        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="hot" role="tabpanel" aria-labelledby="home-tab">
                <div class="row border p-2 rounded mb-2 d-flex align-items-center">
                    <div class="col-4">
                        <img src="https://m-briz.com/wp-content/uploads/2020/05/imgonline-com-ua-Resize-Qn7aVWZZLY.jpg" alt="hot" class="img-thumbnail img-fluid"">
                    </div>
                    <div class="col">
                        <div class="row justify-content-between mb-2">
                            <strong class="title col" >Название</strong>
                            <strong class="title col">150 ₽</strong>
                        </div>
                    <p class="lead">t is a long established fact that a reader will be distracted by the readable content
                        of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                        normal distribution of letters,</p>
                    </div>
                    <div class="col-2">
                        <button type='button' class="btn btn-warning mb-2 w-100"  data-toggle="modal" data-target="#change-1">Изменить</button>
                        <form action="#" class="delete-services">
                            <button type='submit' class="btn btn-danger w-100">Удалить</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Drinks</div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="change-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменение "Название"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input name='name' type="text" class="form-control" id="name" value="Название">
                    </div>
                    <div class="form-group">
                        <label for="cost">Цена</label>
                        <input name='cost' type="text"  class="form-control" id="cost" value="150" onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                    </div>
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Описание</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    const servicesDel = document.querySelectorAll('.delete-services');
    servicesDel.forEach(function(item){
        item.addEventListener('click', (e) => {
            const p = confirm('Удалить услугу ? Данное действие нельзя отменить')
            if(!p) e.preventDefault()
        })
    })
</script>
<script src="{{ asset('vendor/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
