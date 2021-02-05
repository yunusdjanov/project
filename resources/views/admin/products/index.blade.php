@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Продукты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Продукты</li>
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
                            <h3 class="card-title">Список продуктов</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить
                                продукт</a>
                            @if (count($products))
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">#</th>
                                            <th>Наименование</th>
                                            <th>Бренд</th>
                                            <th>Описание</th>
                                            <th>Состав</th>
                                            <th>Характеристика</th>
                                            <th>Цена</th>
                                            <th>Скидка</th>
                                            <th>Количество</th>
                                            <th>Субкатегория</th>
                                            <th>branches</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->brand }}</td>
                                                <td>{{ Str::limit($product->about, 10) }}</td>
                                                <td>{{ Str::limit($product->composition, 10) }}</td>
                                                <td>{{ Str::limit($product->characteristic, 10) }}</td>
                                                <td>{{ $product->price }} :UZS</td>
                                                <td>{{ $product->discount }}%</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->subcategory()->pluck('title')->join(',') }}</td>
                                                <td>{{ $product->branches()->pluck('branch')->join(',') }}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i
                                                                class="fas fa-trash-alt"></i>
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
                        <div class="card-footer clearfix"
                        {{ $products->links() }}
                         </div>
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

