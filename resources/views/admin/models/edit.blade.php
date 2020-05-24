@extends('admin.layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow w-50 mx-2">
            <div class="card-header">
                <h3>Редактирование модели принтера</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.models.update', $model->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table table-borderless text-nowrap text-center">
                        <tbody>

                        <tr>
                            <th class="w-25 text-right border-right align-middle">Наименование модели:</th>
                            <td colspan="2">
                                <input type="text" class="form-control" name="model" id="model" value="{{$model->model}}">
                            </td>
                        </tr>
                        @if ($model->image == null)
                            <tr>
                                <th class="w-25 text-right border-right align-middle">Изображение:</th>
                                    <td>
                                        <input type="file" class="form-control-file" name="image" id="image">
                                    </td>
                            </tr>
                        @else
                            <tr>
                                <th class="w-25 text-right border-right align-middle">Изображение:</th>
                                <td class="text-left">
                                    <img src="{{asset('/storage/images/'.$model->image)}}" alt="image" width="150">
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25 text-right border-right align-middle">Изменить изображение:</th>
                                <td>
                                    <input type="file" class="form-control-file" name="image" id="image">
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="form-group text-center d-block">
                        <button class="btn btn-success custom" type="submit">Обновить</button>
                        <a href="{{ route('admin.models.index') }}" class="btn text btn-danger custom">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
