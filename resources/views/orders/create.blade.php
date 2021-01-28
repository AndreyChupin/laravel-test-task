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
    <form class="form-signin" action='{{route('orders.store')}}' method='post'>
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Добавление заказа</h1>
        <input type='hidden' name='user_id' value='{{$user}}'>
        <input type="text" name='product_name' class="form-control" placeholder="Наименование" required autofocus
               value='{{old('product_name')}}'>
        <input type="text" name='quantity' class="form-control password" placeholder="Количество"
               value='1'>
        <textarea class="form-control form-control--address" id='note' name='note'
                  style='width: 300px; height: 100px' placeholder='Примечания'></textarea>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить</button>
    </form>
@endsection
