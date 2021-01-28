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

    <form class="form-signin" action='{{route('orders.update', ['order' => $order->id])}}' method='post'>
        @csrf
        @method('PUT')
        <h1 class="h3 mb-3 font-weight-normal">Редактирование</h1>
        <label class="form-label" for='product_name'>Наименование</label>
        <input type="text" id='product_name' name='product_name' class="form-control" placeholder="Наименование"
               required autofocus
               value='{{$order->product_name}}'>
        <label class="form-label" for='quantity'>Количество</label>
        <input type="text" id='quantity' name='quantity' class="form-control password"
               value='{{$order->quantity}}'>
        <label class="form-label" for='status'>Статус</label>
        <input type="text" id='status' name='status' class="form-control password"
               value='{{$order->status}}'>
        <label class="form-label" for='note'>Примечания</label>
        <textarea class="form-control form-control--address" id='note' name='note'
                  style='width: 300px; height: 100px'>{{$order->note}}</textarea>
        <button class="btn btn-lg btn-primary btn-block" type='submit'>Изменить</button>
    </form>
@endsection
