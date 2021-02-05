@extends('admin.layouts.layout')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание поста</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Создание поста</li>
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
                            <h3 class="card-title">Создание поста</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" enctype="multipart/form-data"
                              action="{{ route('posts.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название поста</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название поста">
                                </div>
                                <div class="form-group">
                                    <label for="title">Контент поста</label>
                                    <textarea name="content" id="content" rows="10"
                                              class="form-control  @error('content') is invalid @enderror"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Изображение поста</label>
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
                                    <label for="category_id">Рубрика</label>
                                    <select class="form-control @error('rubric_id') is invalid @enderror" id="rubric_id"
                                            name="rubric_id">
                                        <option value="">Выберите рубрику</option>
                                        @foreach($rubrics as $k => $v)
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

