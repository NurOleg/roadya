@extends('layouts.admin')
@section('content')
    <script src="{{ asset('vendor/quill/quill.js') }}"></script>
    <div class="page-inner bg-light">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mb-4 card">
                    <div class="card-header">
                        <b>Создание заведения</b>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="{{ route('placemark_store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="" for="name">Название</label>
                                <input
                                    required
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Название"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="address">Адрес</label>
                                <input
                                    required
                                    class="form-control"
                                    id="address"
                                    name="address"
                                    placeholder="Адрес"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="type">Тип заведения</label>
                                <select
                                    class="form-control"
                                    id="type"
                                    name="type"
                                    required
                                >
                                    <option value="">Не выбрано</option>
                                    @foreach($types as $type => $typeName)
                                        <option value="{{ $type }}">{{ $typeName }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="" for="url">Сайт заведения</label>
                                <input
                                    required
                                    class="form-control"
                                    id="url"
                                    name="url"
                                    placeholder="Сайт заведения"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="phone">Контактный телефон
                                    (формат: +79112223344)</label>
                                <input
                                    required
                                    class="form-control"
                                    id="phone"
                                    name="phone"
                                    placeholder="Контактный телефон"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="instagram">Instagram</label>
                                <input
                                    required
                                    class="form-control"
                                    id="instagram"
                                    name="instagram"
                                    placeholder="Instagram"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="phone">Вконтакте</label>
                                <input
                                    required
                                    class="form-control"
                                    id="vk"
                                    name="vk"
                                    placeholder="Вконтакте"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="telegram">Telegram
                                    (формат: +79112223344)</label>
                                <input
                                    required
                                    class="form-control"
                                    id="telegram"
                                    name="telegram"
                                    placeholder="Telegram"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="whatsapp">Whatsapp
                                    (формат: +79112223344)</label>
                                <input
                                    required
                                    class="form-control"
                                    id="whatsapp"
                                    name="whatsapp"
                                    placeholder="Whatsapp"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="viber">Viber</label>
                                <input
                                    required
                                    class="form-control"
                                    id="viber"
                                    name="viber"
                                    placeholder="Viber"
                                    type="text"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="point">Координаты (формат: 37.884929 -122.429415)</label>
                                <input
                                    required
                                    class="form-control"
                                    id="point"
                                    name="point"
                                    placeholder="Координаты"
                                    type="text"
                                />
                            </div>

                            <div class="form-group tags" style="display: none">
                                <label class="" for="tags">Тэги</label>
                                <select
                                    required
                                    class="form-control"
                                    id="tags"
                                    multiple=""
                                    name="tags[]">

                                </select>
                            </div>

                            <div class="form-group">
                                <div id="editor-container">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="" for="images">Изображения заведения</label>
                                <input
                                    class="form-control-file"
                                    id="images"
                                    name="images[]"
                                    type="file"
                                    multiple
                                />
                                <input
                                    class="form-control-file"
                                    id="images"
                                    name="images[]"
                                    type="file"
                                    multiple
                                />
                                <input
                                    class="form-control-file"
                                    id="images"
                                    name="images[]"
                                    type="file"
                                    multiple
                                />
                            </div>
                            <input type="hidden" name="description" id="description" value="">
                            <button class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/editor.js') }}"></script>
    <script>
        $('document').ready(function () {
            $('#editor-container').on('focusout', function (){
                let description = $(this).find('.ql-editor').html();
                $('#description').val(description);
            });

            $('#type').on('change', function () {
                $.ajax({
                    url: '/admin/placemark/tags',
                    data: {type: $(this).val()},
                    success: function (data) {
                        let options = '';
                        $.each(data, function (i, v) {
                            options += '<option value="'+ i +'">'+ v +'</option>'
                        });

                        $('#tags').html(options);
                        $('.tags').css('display', 'block');
                    }
                });
            });
        });
    </script>
@endsection
