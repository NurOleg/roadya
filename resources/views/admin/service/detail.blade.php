@extends('layouts.admin')
@section('content')
    <script src="{{ asset('vendor/quill/quill.js') }}"></script>
    <div class="page-inner bg-light">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mb-4 card">
                    <div class="card-header">
                        <b>Редактирование услуги</b>
                        <a href="{{ route('service_delete', ['service' => $service->id]) }}" class="btn btn-danger" style="float: right">Удалить услугу</a>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="{{ route('service_update', ['service' => $service->id]) }}"
                              enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" value="{{ $service->type }}">

                            <input type="text" value="{{ $service->user->login }}" readonly>
                            <input type="text" value="{{ $service->placemark->name }}" readonly>
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
            $('#editor-container').on('focusout', function () {
                let description = $(this).find('.ql-editor').html();
                $('#description').val(description);
            });

            $('#type').on('change', function () {
                $.ajax({
                    url: '/admin/service/tags',
                    data: {type: $(this).val()},
                    success: function (data) {
                        let options = '';
                        $.each(data, function (i, v) {
                            options += '<option value="' + i + '">' + v + '</option>'
                        });

                        $('#tags').html(options);
                        $('.tags').css('display', 'block');
                    }
                });
            });
        });
    </script>
@endsection
