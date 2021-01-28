@extends('layouts.layout')

@section('content')
    <h3>Все заказы</h3>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Id пользователя</th>
            <th>Email пользователя</th>
            <th>Наименование</th>
            <th>Количество</th>
            <th>Статус</th>
            <th>Примечания</th>
            <th>Создан</th>
            <th>Обновлен</th>
            <th>Действия</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td><a class="link-dark"
                       href='{{route('orders.show',['order'=> $order->id])}}'>{{$order->id}}</a></td>
                <td><a class="link-dark"
                       href='{{route('users.show',['user'=> $order->user_id])}}'>{{$order->user_id}}</a></td>
                <td>{{$order->user->email}}</td>
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
