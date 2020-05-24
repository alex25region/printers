@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @include('admin.layouts.messages')
        <div class="card w-100">
            <div class="card-header">
                <h3><b>Модели принтеров</b></h3>
            </div>

            <div class="card-body">
{{--                <a href="{{ route('admin.models.create')}}" title="Create">
                    <button type="button" class="btn btn-success shadow mb-2">Создать модель принтера</button>
                </a>--}}
                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('admin.models.create')}}" title="Create">
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
{{--                        <th>Image</th>--}}
                        <th>Image2</th>
                        <th>Действия</th>
                    </tr>
                    @foreach($models as $model)
                        <tr class="searchable">
                            <td>{{$model->id}}</td>

                            <td>{{$model->model}}</td>
{{--                            <td>{{$model->image}}</td>--}}
                            @if($model->image == null)
                                <td><img src="{{asset('/storage/images/default.png')}}" alt="image" width="50"></td>
                            @else
                                <td><img src="{{asset('/storage/images/'.$model->image)}}" alt="image" width="50"></td>
                            @endif
                           <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.models.edit', $model->id)}}" title="Edit">
                                        <button type="button" class="btn btn-sm btn-outline-primary mr-1 shadow"><i class="fa fa-pencil-alt"></i></button>
                                    </a>
                                    <form action="{{ route('admin.models.destroy', $model) }}" method="post">
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
        </div>
    </div>

@endsection
