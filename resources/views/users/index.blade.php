@extends('layouts.layout')

@section('content')
    <h3>Все пользователи</h3>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
            <th>Адрес</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>
                    <a class="link-dark" href='{{route('users.show', ['user'=> $user->id])}}'>{{$user->id}}</a>
                </td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <div class="container">
                        <div class="row">
                            <a class="col-sm btn btn-outline-primary"
                               href='{{route('users.edit', ['user' => $user->id])}}'
                               style='display: block'>Изменить</a>
                            <form class="col-sm" action='{{route('users.destroy', ['user' => $user->id])}}'
                                  method='post'>
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
