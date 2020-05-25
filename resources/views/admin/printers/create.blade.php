@extends('admin.layouts.app')
@section('content')
            <div class="row justify-content-center">
                <div class="card shadow w-50 mx-2">
                    <div class="card-header">
                        <h3>Создание принтера</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.printers.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-borderless text-nowrap text-center">
                                <tbody>

                                <tr>
                                    <th class="w-25 text-right border-right align-middle">Модель принтера:</th>
                                    <td>
                                        <select class="form-control" id="model_id" name="model_id">

                                            @foreach($models as $model)
                                                <option value="{{ $model->id }}">{{ $model->model }}</option>
                                            @endforeach

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right border-right align-middle">IP-адрес:</th>
                                    <td>
                                        <input type="text" class="form-control" name="ipaddress" id="ipaddress" />
                                    </td>
                                </tr>

                                <tr>
                                    <th class="w-25 text-right border-right align-middle">Наименование:</th>
                                    <td>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right border-right align-middle">Инвентарный номер:</th>
                                    <td>
                                        <input type="text" class="form-control" name="inv_number" id="inv_number">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right border-right align-middle">Описание:</th>
                                    <td>
                                        <input type="text" class="form-control" name="description" id="description">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right border-right align-middle">Комментарий:</th>
                                    <td>
                                        <input type="text" class="form-control" name="comment" id="comment">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right border-right align-middle">Скрипт:</th>
                                    <td>
                                        <input type="file" class="form-control-file" name="file" id="file">
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div class="form-group text-center d-block">
                                <button class="btn btn-success custom" type="submit">Создать</button>
                                <a href="{{ route('admin.printers.index') }}" class="btn text btn-danger custom">Назад</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
