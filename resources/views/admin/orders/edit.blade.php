@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Заказы в ожидании</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Заказы в ожидании</li>
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
                            <h3 class="card-title">Заказы в ожидании</h3>
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
                                            <th>Действия</th>
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
                                                    <form action="{{ route('orders.update', ['order' => $order->id]) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('orders.destroy', ['order' => $order->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Товары пока нет...</p>
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




















