@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="card shadow w-50 mx-2">
            <div class="card-header">
                <h3>Установка принтера {{$printer->name}} ({{$printer->ipaddress}})</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('installprinter', $printer->id) }}" method="get">
                    @csrf
                    @method('GET')
                <table class="table table-borderless text-nowrap text-center">
                    <tbody>

                    <tr>
                        <th class="w-25 text-right border-right align-middle">Введите имя компьютера:</th>
                        <td>
                            <input type="text" class="form-control" name="comp" id="comp" placeholder="Введите имя или ip-адрес компьютера" required autofocus>
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25 text-right border-right align-middle">Модель:</th>
                        <td class="text-left">{{$printer->getModel->model}}</td>

                    </tr>
                    <tr>
                        <th class="w-25 text-right border-right align-middle">IP-адрес:</th>
                        <td class="text-left">{{$printer->ipaddress}}</td>
                    </tr>

                    <tr>
                        <th class="w-25 text-right border-right align-middle">Наименование:</th>
                        <td class="text-left">{{$printer->name}}</td>
                    </tr>
                    <tr>
                        <th class="w-25 text-right border-right align-middle">Инвентарный номер:</th>
                        <td class="text-left">{{$printer->inv_number}}</td>
                    </tr>
                    <tr>
                        <th class="w-25 text-right border-right align-middle">Описание:</th>
                        <td class="text-left">{{$printer->description}}</td>
                    </tr>
                    <tr>
                        <th class="w-25 text-right border-right align-middle">Комментарий:</th>
                        <td class="text-left">{{$printer->comment}}</td>
                    </tr>
                    <tr>
                        <th class="w-25 text-right border-right align-middle">Изображение:</th>
                        @if ($printer->getModel->image)
                            <td class="text-left"><img src="{{asset('/storage/images/'.$printer->getModel->image)}}" alt="no image" width="100"></td>
                        @else
                            <td class="text-left"><img src="{{asset('/storage/images/default.png')}}" alt="no image" width="100" ></td>
                        @endif
                    </tr>
                    </tbody>
                </table>
                    <div class="form-group text-center d-block">
                        <button class="btn btn-primary shadow" type="submit">Установить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
