@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список заказов</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Список заказов</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Список заказов</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (count($orders))
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">#</th>
                                            <th>Пользователь</th>
                                            <th>Телефон</th>
                                            <th>Адрес доставки</th>
                                            <th>Товары</th>
                                            <th>Обшая сумма заказа</th>
                                            <th>Коментария</th>
                                            <th>Способ оплаты</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->user->number }}</td>
                                                <td>{{ $order->user->address }}</td>
                                                <td>
                                                    <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-box-open">Список товаров</i>
                                                    </a>
                                                </td>
                                                <td>{{ $order->total }}</td>
                                                <td>{{ $order->comment }}</td>
                                                <td>
                                                    @if($order->payment_type === 0)
                                                        {{ 'Наличные' }}
                                                    @else
                                                        {{ 'Онлайн' }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Заказов пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        {{--                            <div class="card-footer clearfix">--}}
                        {{--                                {{ $products->links() }}--}}
                        {{--                            </div>--}}
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection




















