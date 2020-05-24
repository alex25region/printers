{{--Сообщение об ошибке--}}
@if($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <strong>{{ $errors->first() }}</strong>
            </div>
        </div>
    </div>
@endif

{{--Сообщение об успешности--}}
@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;﻿</span>
                </button>
                <strong>{{ session()->get('success') }}</strong>
            </div>
        </div>
    </div>
@endif
