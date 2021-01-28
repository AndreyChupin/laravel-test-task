@extends('layouts.layout')

@section('content')
    <h3>Заказ:</h3>
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
        <tr>
            <td>{{$order->id}}</td>
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
    </table>
    <h3>Пользователь id:{{$order->user->id}}</h3>
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
            <td><a class="link-dark"
                   href='{{route('users.show', ['user'=> $order->user->id])}}'>{{$order->user->id}}</a></td>
            <td>{{$order->user->first_name}}</td>
            <td>{{$order->user->last_name}}</td>
            <td>{{$order->user->email}}</td>
            <td>{{$order->user->address}}</td>
            <td>{{$order->user->role}}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <a class="col-sm btn btn-outline-primary"
                           href='{{route('users.edit', ['user' => $order->user->id])}}'
                           style='display: block'>Изменить</a>
                        <form class="col-sm" action='{{route('users.destroy', ['user' => $order->user->id])}}'
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
@endsection
