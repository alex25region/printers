@extends('layouts.app')


@section('content')
    <div class="container">
        @include('admin.layouts.messages')
        <div class="card w-100">
{{--            <div class="card-header">
                <h3><b>Принтеры</b></h3>
            </div>--}}

            <div class="card-body">
                <div class="row">
                    <div class="col-12 search">
                        <input type="text" class="form-control shadow" placeholder="Search..." id="search" autofocus />
                    </div>

                </div>
                <table id="maintable" class="table table-sm table-striped table-hover text-center my-2 ">
                    <tr class="thead-dark">
                        <th>IP-адрес</th>
                        <th>Модель</th>
                        <th>Наименование принтера</th>
                        <th>Инвентарный номер</th>
                        <th>Описание</th>
                        <th>Комментарий</th>
                        <th>Image</th>
                        <th>Скрипт</th>
                    </tr>
                    @foreach($printers as $printer)
                        <tr class="border-bottom searchable">
                            <td><b>{{$printer->ipaddress}}</b></td>
                            <td>{{$printer->getModel->model}}</td>
                            <td>{{$printer->name}}</td>
                            <td>{{$printer->inv_number}}</td>
                            <td>{{$printer->description}}</td>
                            <td>{{$printer->comment}}</td>
                            @if ($printer->getModel->image)
                                <td><img src="{{asset('/storage/images/'.$printer->getModel->image)}}" alt="no image" width="50" ></td>
                            @else
                                <td><img src="{{asset('/storage/images/default.png')}}" alt="no image" width="50" ></td>
                            @endif


{{--                            <td><a href="{{asset('/storage/scripts/'.$printer->file)}}" target="_blank">{{$printer->file}}</a></td>--}}
                            <td>
{{--                                <form action="{{ route('admin.printers.destroy', $printer) }}" method="post">--}}
{{--                                </form>--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="{{route('test')}}">Установить</button>--}}

                                <a class="btn btn-sm btn-outline-secondary" href="{{action('Front\FrontController@test')}}">Установить</a>
                            </td>
                        <tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
