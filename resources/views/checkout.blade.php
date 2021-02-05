{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--       <h1 class="text-center">Список продуктов</h1>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col">#</th>--}}
{{--                <th scope="col">name</th>--}}
{{--                <th scope="col">quantity</th>--}}
{{--                <th scope="col">price</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach(Cart::content() as $item)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{ $item->id }}</th>--}}
{{--                <td>{{ $item->name }}</td>--}}
{{--                <td>{{ $item->qty }}</td>--}}
{{--                <td>{{ $item->price }}</td>--}}
{{--            </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--        <div class="row">--}}
{{--            <h1 class="text_center">--}}
{{--                Обшая сумма:{{ Cart::total() }}--}}
{{--            </h1>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="row">--}}
{{--            @csrf--}}
{{--            <div class="mb-3">--}}
{{--                <label for="name" class="form-label">Ф.И.О</label>--}}
{{--                <h6>{{ Auth::user()->name }}</h6>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="name" class="form-label">Телефон</label>--}}
{{--                <h6>{{ Auth::user()->number }}</h6>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="name" class="form-label">Адрес для доставки</label>--}}
{{--                <h6>{{ Auth::user()->address }}</h6>--}}
{{--            </div>--}}
{{--            <a href="#" class="btn btn-success">Наличные(при доставке)</a>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>--}}
{{--</body>--}}
{{--</html>--}}



@extends('layout')


@section('content')

    <section class="container">
        <h4 class="section-title">Выберите способ оплаты</h4>
        <div class="payment-process">
            <div class="payment-methods">
                <div class="method" id="select-method"><img src="imgs/uzs.jpg" class="checkes" alt="payment-method" width="100" height="100"></div>
                <div class="method" id="select-method"><img src="imgs/click.jpg" class="checkes" alt="payment-method" width="100" height="100"></div>
                <div class="method" id="select-method"><img src="imgs/payme.jpg" class="checkes" alt="payment-method" width="100" height="100"></div>
            </div>
            <div class="purchase-block">
                <span class="">id: <span id="item-id">000014</span></span>
                @foreach(Cart::content() as $item)
                <p id="item-name">{{ $item->name }}.................. <span class="">{{ $item->price }} UZS</span></p>
                @endforeach
                <h4>Итого: <span class="item-price">{{ Cart::total() }} uzs</span> </h4>
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <button class="btn-pay" id="submit">Оплатить</button>
                </form>

            </div>
        </div>
        <div class="payment-info">
            <p class="payment-text">Магазин корейской косметики NABI представляет разнообразные линии
                для ухода за кожей и декоративную косметику популярных корейских производителей
                для любого типа кожи, вкуса и возраста. Мы всегда поможем Вам выбрать лучшее
                соотношение цены и качества!

                Миссия нашей команды - помочь Вам превратить ежедневный рутинный уход
                за лицом и телом в священнодействие, однообразие - в творчество,
                вынужденную необходимость — в наслаждение!Мы работаем для того, чтобы Вы полюбили себя!</p>
            <p class="payment-text">Магазин корейской косметики NABI представляет разнообразные линии
                для ухода за кожей и декоративную косметику популярных корейских производителей
                для любого типа кожи, вкуса и возраста. Мы всегда поможем Вам выбрать лучшее
                соотношение цены и качества!

                Миссия нашей команды - помочь Вам превратить ежедневный рутинный уход
                за лицом и телом в священнодействие, однообразие - в творчество,
                вынужденную необходимость — в наслаждение!Мы работаем для того, чтобы Вы полюбили себя!</p>
        </div>
    </section>

@endsection


