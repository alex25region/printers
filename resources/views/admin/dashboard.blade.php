@extends('admin.layouts.app')
@section('content')

    <div class="container">

        <div class="card shadow w-auto">
            <div class="card-header">
                <h3>Главная панель администратора</h3>
            </div>
            <div class="card-body">
                <table class="table-responsive">
                    <tr>
                        <td class="border-right w-25 align-middle text-center border-bottom">
                            <a href="{{route('admin.printers.index')}}">
                                <button class="btn btn-outline-secondary btn-lg m-2">Принтеры <span class="badge badge-dark py-2"></span></button>
                            </a>
                        </td>
                        <td class="border-bottom w-auto">
                            <div class="row m-2">
                                Данный раздел для создания, редактирования и удаления принтеров.
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-right w-25 align-middle text-center">
                            <a href="{{route('admin.models.index')}}">
                                <button class="btn btn-outline-secondary btn-lg m-2 w-auto">Модели принтеров <span class="badge badge-dark py-2"></span></button>
                            </a>
                        </td>
                        <td>
                            <div class="row m-2">
                                Данный раздел для создания, редактирования и удаления моделей принтеров.
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

@endsection