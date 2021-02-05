@extends('admin.layouts.layout')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание купона</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Создание купона</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Создание купона</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('coupons.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="coupon">Купон</label>
                                    <input type="text" name="coupon"
                                           class="form-control @error('coupon') is-invalid @enderror" id="coupon"
                                           value="{{ @old('coupon') }}">
                                </div>
                                <div class="form-group">
                                    <label for="amount">Сумма скидки</label>
                                    <input type="number" name="amount"
                                           class="form-control @error('amount') is-invalid @enderror" id="amount">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

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

