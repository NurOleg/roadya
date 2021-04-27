@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3 card">
            <div class="card-header"><span>Мои услуги</span>
                <a href="{{ route('service_create') }}" class="btn btn-success" style="float: right">Создать услугу</a>
            </div>
            @if($services->count() > 0)
                <div class="table-responsive table-striped table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Тип</th>
                            <th>Заведение</th>
                            <th>Кем создано</th>
                            <th>Дата создания</th>
                            <th>Дата обновления</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <th scope="row">
                                    <a href="{{ route('service_detail', ['service' => $service->id]) }}">
                                        {{$loop->iteration}}
                                    </a>
                                </th>
                                <td>{{$service->type}}</td>
                                <td>{{$service->placemark->name}}</td>
                                <td>{{$service->user->email}}</td>
                                <td>{{$service->created_at}}</td>
                                <td>{{$service->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
