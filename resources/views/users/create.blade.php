@extends('layouts.layout')

@section('content')
    <div class='container'>
        <div class="mt-5">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <form class="form-signin" action='{{route('users.store')}}' method='post'>
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <input type="email" id="inputEmail" name='email' class="form-control" placeholder="Email" required autofocus
               value='{{old('email')}}'>
        <input type="password" id="inputPassword" name='password' class="form-control password" placeholder="Пароль"
               required>
        <input type="password" id="inputPasswordConfirmation" name='password_confirmation'
               class="form-control password_confirmation" placeholder="Повторите пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
    </form>
@endsection
