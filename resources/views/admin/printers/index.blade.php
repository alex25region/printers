@extends('admin.layouts.app')
@section('content')
<div class="container">
    @include('admin.layouts.messages')
    <div class="card w-100">
        <div class="card-header">
            <h3><b>Принтеры</b></h3>
        </div>

<div class="card-body">
    <div class="row">
        <div class="col-8">
            <a href="{{ route('admin.printers.create')}}" title="Create">
                <button type="button" class="btn btn-success shadow mb-2">Создать принтер</button>
            </a>
        </div>
{{--        <div class="col-4 w-auto text-right">--}}
{{--            <input type="text" class="form-control" placeholder="Search..." id="search" autofocus />--}}
{{--        </div>--}}
        <div class="col-4 search">
            <input type="text" class="form-control shadow" placeholder="Search..." id="search" autofocus />
        </div>

    </div>
        <table id="maintable" class="table table-sm table-striped table-hover text-center my-2 ">
            <tr class="thead-dark">
                <th>ID</th>
                <th>Модель</th>
                <th>IP-адрес</th>
                <th>Наименование принтера</th>
                <th>Инвентарный номер</th>
                <th>Описание</th>
                <th>Комментарий</th>
                <th>Image</th>
                <th>Скрипт</th>
                <th>Действия</th>
            </tr>
            @foreach($printers as $printer)
                <tr class="border-bottom searchable">
                    <td>{{$printer->id}}</td>
                    {{--                    <td>{{$printer->model_id}}</td>--}}
                    <td>{{$printer->getModel->model}}</td>
                    <td><b>{{$printer->ipaddress}}</b></td>
                    <td>{{$printer->name}}</td>
                    <td>{{$printer->inv_number}}</td>
                    <td>{{$printer->description}}</td>
                    <td>{{$printer->comment}}</td>
                    @if ($printer->getModel->image)
                    <td><img src="{{asset('/storage/images/'.$printer->getModel->image)}}" alt="no image" width="50" ></td>
                    @else
                    <td><img src="{{asset('/storage/images/default.png')}}" alt="no image" width="50" ></td>
                    @endif
                    <td>{{$printer->file}}</td>
                    <td>
                        <div class="btn-group" role="group">
{{--                            <a href="{{ route('admin.printers.index', $printer->id)}}" title="Show" >--}}
{{--                                <button type="button" class="btn btn-sm btn-secondary mr-1 shadow"><i class="fa fa-eye"></i></button>--}}
{{--                            </a>--}}
                            <a href="{{ route('admin.printers.edit', $printer->id)}}" title="Edit">
                                <button type="button" class="btn btn-sm btn-outline-primary mr-1 shadow"><i class="fa fa-pencil-alt"></i></button>
                            </a>
                            <form action="{{ route('admin.printers.destroy', $printer) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger shadow" title="Delete"
                                        onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                <tr>
            @endforeach
        </table>
</div>
{{--        <div class="card-footer d-flex">--}}
{{--            <div class="mx-auto mt-2">--}}
{{--                {{$printers->links()}}--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
</div>

@endsection
