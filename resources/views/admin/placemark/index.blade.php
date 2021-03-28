@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3 card">
            <div class="card-header"><span>Мои заведения</span>
                <a href="{{ route('placemark_create') }}" class="btn btn-success" style="float: right">Создать заведение</a>
            </div>
            @if($placemarks->count() > 0)
                <div class="table-responsive table-striped table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Тип</th>
                            <th>Адрес</th>
                            <th>Дата создания</th>
                            <th>Дата обновления</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($placemarks as $k => $placemark)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$placemark->name}}</td>
                                <td>{{\App\Models\Placemark::TYPES_NAMES[$placemark->type]}}</td>
                                <td>{{$placemark->address}}</td>
                                <td>{{$placemark->created_at}}</td>
                                <td>{{$placemark->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
