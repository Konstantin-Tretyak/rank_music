@extends('layout')

@if(isset($messages))
    {{ dd($messages->first('name')) }}
@endif
@section('content')

<div class="col-md-6 col-md-offset-3">
    <div class="well well-lg">
        <form method="post" action="{{ route('register.post') }}">

            <div class="form-group">
                <input type="text" class="form-control" name="name" id="change_club_name" placeholder="Логин">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="email" id="change_club_name" placeholder="Email"
                       value="">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" id="change_club_name" placeholder="Пароль"
                       value="">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" id="change_club_name" placeholder="Пароль"
                       value="">
            </div>

            @if($errors)
                <ul>
                    @foreach($errors->getMessages() as $field => $errors)
                        <li>
                            {{ $field }}:
                            @foreach($errors as $error)
                                {{ $error }}
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            @endif

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button class="btn btn-default" type="submit">Отправить</button>
        </form>
    </div>
</div>

@section('js')
{{--
            @if ($errors->any())
                <script>
                    $(function() {
                      notify('Неверные пароль или логин', 'error');
                    });
                </script>
            @endif --}}
@stop

@stop