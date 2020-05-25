@extends('admin.layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow w-50 mx-2">
            <div class="card-header">
                <h3>Редактирование принтера</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.printers.update', $printer->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-borderless text-nowrap text-center">
                        <tbody>

                        <tr>
                            <th class="w-25 text-right border-right align-middle">Модель принтера:</th>
                            <td>
                                <select class="form-control" id="model_id" name="model_id">

                                    @foreach($models as $model)
                                        @if( $model->id == $printer->getModel->id )
                                            <option value="{{ $model->id }}" selected="selected"> {{ $model->model }}</option>
                                        @else
                                            <option value="{{ $model->id }}"> {{ $model->model }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25 text-right border-right align-middle">IP-адрес:</th>
                            <td>
                                <input type="text" class="form-control" name="ipaddress" id="ipaddress" value="{{$printer->ipaddress}}" />
                            </td>
                        </tr>

                        <tr>
                            <th class="w-25 text-right border-right align-middle">Наименование:</th>
                            <td>
                                <input type="text" class="form-control" name="name" id="name" value="{{$printer->name}}">
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25 text-right border-right align-middle">Инвентарный номер:</th>
                            <td>
                                <input type="text" class="form-control" name="inv_number" id="inv_number" value="{{$printer->inv_number}}">
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25 text-right border-right align-middle">Описание:</th>
                            <td>
                                <input type="text" class="form-control" name="description" id="description" value="{{$printer->description}}">
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25 text-right border-right align-middle">Комментарий:</th>
                            <td>
                                <input type="text" class="form-control" name="comment" id="comment" value="{{$printer->comment}}">
                            </td>
                        </tr>
{{--                        <tr>
                            <th class="w-25 text-right border-right align-middle">Скрипт:</th>
                            <td>

                                <input type="text" class="form-control" name="file" id="file" value="{{$printer->file}}">
                            </td>
                        </tr>--}}
                        @if ($printer->file == null)
                            <tr>
                                <th class="w-25 text-right border-right align-middle">Скрипт:</th>
                                <td>
                                    <input type="file" class="form-control-file" name="file" id="image">
                                </td>
                            </tr>
                        @else
                            <tr>
                                <th class="w-25 text-right border-right align-middle">Скрипт:</th>
                                <td class="text-left"><a href="{{asset('/storage/scripts/'.$printer->file)}}">{{$printer->file}}</a></td>
                            </tr>
                            <tr>
                                <th class="w-25 text-right border-right align-middle">Загрузить новый скрипт:</th>
                                <td>
                                    <input type="file" class="form-control-file" name="file" id="file">
                                </td>
                            </tr>
                        @endif




                        </tbody>
                    </table>
                    <div class="form-group text-center d-block">
                        <button class="btn btn-success custom" type="submit">Обновить</button>
                        <a href="{{ route('admin.printers.index') }}" class="btn btn-danger custom">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
