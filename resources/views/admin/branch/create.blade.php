@extends('admin.layouts.layout')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание свойства</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Создание свойства</li>
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
                            <h3 class="card-title">Создание свойства</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" enctype="multipart/form-data"
                              action="{{ route('branch.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="branch">Свойства</label>
                                    <input type="text" name="branch"
                                           class="form-control @error('branch') is-invalid @enderror" id="branch"
                                           value="{{ @old('branch') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Изображения</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail"
                                                   class="custom-file-input @error('thumbnail') is-invalid @enderror"
                                                   id="thumbnail">
                                            <label class="custom-file-label" for="thumbnail"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="option_id">Опции</label>
                                    <select class="form-control @error('option_id') is invalid @enderror" id="option_id"
                                            name="option_id">
                                        <option value="">Выберите опцию</option>
                                        @foreach($options as $k => $v)
                                            <option value="{{ $k }}"> {{ $v }}</option>
                                        @endforeach
                                    </select>
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

