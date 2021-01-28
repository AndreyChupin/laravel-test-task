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

    <form class="form-signin" action='{{route('users.update', ['user' => $user->id])}}' method='post'>
        @csrf
        @method('PUT')
        <h1 class="h3 mb-3 font-weight-normal">Редактирование</h1>
        <label class="form-label" for='first_name'>Имя</label>
        <input class="form-control" type='text' id='first_name' name='first_name' value='{{$user->first_name}}'>
        <label class="form-label" for='last_name'>Фамилия</label>
        <input class="form-control" type='text' id='last_name' name='last_name' value='{{$user->last_name}}'>
        <label class="form-label" for='address'>Адрес</label>
        <textarea class="form-control form-control--address" id='address' name='address' id=''
                  style='width: 300px; height: 100px'>{{$user->address}}</textarea>
        <label class="form-label" for='email'>Email</label>
        <input class="form-control" type='email' id='email' name='email' value='{{$user->email}}'>
        <button class="btn btn-lg btn-primary btn-block" type='submit'>Изменить</button>
    </form>
@endsection
