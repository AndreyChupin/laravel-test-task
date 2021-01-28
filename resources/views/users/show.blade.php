@extends('layouts.layout')

@section('content')
    <h3>Пользователь</h3>
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
        <tr>
            <td>{{$user->id}}</td>
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
    </table>
    <a class="col-sm btn btn-outline-primary" href='{{route('orders.create', ['user'=> $user->id])}}'>Добавить
        заказ</a>
    <h3>Заказы {{$user->email}}</h3>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Наименование</th>
            <th>Количество</th>
            <th>Статус</th>
            <th>Примечания</th>
            <th>Создан</th>
            <th>Обновлен</th>
            <th>Действия</th>
        </tr>
        @foreach($user->orders as $order)
            <tr>
                <td><a class="link-dark" href='{{route('orders.show', ['order'=> $order->id])}}'>{{$order->id}}</a></td>
                <td>{{$order->product_name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->note}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->updated_at}}</td>
                <td>
                    <div class="container">
                        <div class="row">
                            <a class="col-sm btn btn-outline-primary"
                               href='{{route('orders.edit', ['order' => $order->id])}}'
                               style='display: block'>Изменить</a>
                            <form class="col-sm" action='{{route('orders.destroy', ['order' => $order->id])}}'
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
