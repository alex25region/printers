@extends('admin.layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow w-50 mx-2">
            <div class="card-header">
                <h3>Создание модели принтера</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.models.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-borderless text-nowrap text-center">
                        <tbody>

                        <tr>
                            <th class="w-25 text-right border-right align-middle">Наименование модели:</th>
                            <td>
                                <input type="text" class="form-control" name="model" id="model"/>
                            </td>
                        </tr>

{{--                        <tr>
                            <th class="w-25 text-right border-right align-middle">Изображение:</th>
                            <td>
                                <input type="text" class="form-control" name="image" id="image">
                            </td>
                        </tr>--}}
                        <tr>
                            <th class="w-25 text-right border-right align-middle">Изображение:</th>
                            <td>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="form-group text-center d-block">
                        <button class="btn btn-success custom" type="submit">Создать</button>
                        <a href="{{ route('admin.models.index') }}" class="btn text btn-danger custom">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
