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
    <h1 class="pt-4 text-center">Настройки вашего заведения</h1>
</div>
<section class="establishment-body pt-5 mt-2 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 mb-4">
                <img src="https://avatars.mds.yandex.net/get-altay/1371846/2a00000162de7e7560328fc73d94fff01687/L"
                     alt="establishment image"
                     aria-hidden="true"
                     class="w-100 ">
            </div>
            <div class="col col-lg-8">
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
<section class="establishment-body-services pb-5">
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
            <li class="nav-item">
                <button type='button' class="nav-link btn btn-link"  data-toggle="modal" data-target="#add-services">+</button>
            </li>

        </ul>
        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="hot" role="tabpanel" aria-labelledby="home-tab">
                <div class=" border p-2 rounded mb-2 d-flex align-items-center flex-lg-row flex-column">
                    <div class="col-6 mb-4 col-lg-4">
                        <img src="https://m-briz.com/wp-content/uploads/2020/05/imgonline-com-ua-Resize-Qn7aVWZZLY.jpg" alt="hot" class="img-thumbnail img-fluid">
                    </div>
                    <div class="col-lg">
                        <div class="row mb-2 ">
                           <div class="col d-flex justify-content-lg-start justify-content-center">
                               <strong class="title mr-3 " >Название</strong>
                               <strong class="title">150 ₽</strong>
                           </div>
                        </div>
                    <p class="lead">t is a long established fact that a reader will be distracted by the readable content
                        of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                        normal distribution of letters,</p>
                    </div>
                    <div class="col-lg-2 col-8">
                        <button type='button' class="btn btn-warning mb-2 w-100"  data-toggle="modal" data-target="#change-1">Изменить</button>
                        <form action="#" class="delete-services">
                            <button type='submit' class="btn btn-danger w-100">Удалить</button>
                        </form>

                    </div>
                </div>
                <div class="row justify-content-between mt-5">
                    <button type='button' class="btn btn-primary"  data-toggle="modal" data-target="#hot-add-service">Добавить сервис</button>
                    <form action="#">
                        <button type='submit' class="btn btn-danger">Удалить услугу</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Drinks</div>

        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="change-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="#">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменение "Название"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Фото</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01"  accept="image/x-png,image/gif,image/jpeg" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Выбрать файл</label>
                  </div>
                </div>
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input name='name' type="text" class="form-control" id="name" value="Название" required>
                    </div>
                    <div class="form-group">
                        <label for="cost">Цена</label>
                        <input name='cost' type="text"  class="form-control" id="cost" value="150" onkeyup="this.value = this.value.replace(/[^\d]/g,'');" required>
                    </div>
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Описание</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-success">Изменить</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="add-services" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Добавить услугу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="services-name">Название</label>
                        <input name='services_name' type="text"  class="form-control" id="services-name" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="hot-add-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Добавить сервис</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Фото</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="add_img"  accept="image/x-png,image/gif,image/jpeg" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="add_img">Выбрать файл</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_name">Название</label>
                    <input name='name' type="text" class="form-control" id="add_name" placeholder="Название" required>
                </div>
                <div class="form-group">
                    <label for="add_cost">Цена</label>
                    <input name='cost' type="text"  class="form-control" id="add_cost" placeholder="150" onkeyup="this.value = this.value.replace(/[^\d]/g,'');" required>
                </div>
                <div class="form-group">
                    <label>Описание</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-success">Изменить</button>
            </div>
        </form>
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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
