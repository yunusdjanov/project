@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список товаров</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Список товаров</li>
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
                            <h3 class="card-title">Список товаров</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px">#</th>
                                        <th>Товар</th>
                                        <th>Количество</th>
                                        <th>Свойство</th>
                                        <th>Цена за шт.</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($list as $item)
                                        <tr>
                                            <td>{{ $item->product_id }}</td>
                                            <td>{{ \App\Models\Product::where('id', $item->product_id)->pluck('title')->join(',') }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ \App\Models\Branch::where('id', $item->branch)->pluck('branch')->join(',') }}</td>
                                            <td>{{ $item->price }} UZS</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection





















