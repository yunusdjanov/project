@extends('admin.layouts.layout')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование категории</li>
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
                            <h3 class="card-title"> Категория: "{{ $category->title }}" </h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" enctype="multipart/form-data" method="post"
                              action="{{ route('categories.update', ['category' => $category->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название категории</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{$category->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Изображение категории</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail"
                                                   class="custom-file-input @error('thumbnail') is-invalid @enderror"
                                                   id="thumbnail">
                                            <label class="custom-file-label" for="thumbnail"></label>
                                        </div>
                                    </div>
                                </div>
                                <div><img src="{{ $category->getImage() }}" class="img-thumbnail mt-2" alt="thumbnail"
                                          width="200"></div>
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

