@extends('admin.layouts.layout')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование поста</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование поста</li>
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
                            <h3 class="card-title">Пост: "{{ $post->title }}"</h3>
                        </div>

                        <form role="form" method="post" action="{{ route('posts.update', ['post' => $post->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название поста</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is invalid @enderror" id="title"
                                           value="{{ $post->title }}">
                                </div>


                                <div class="form-group">
                                    <label for="content"> Контент поста </label>
                                    <textarea name="content" id="content" rows="10"
                                              class="form-control @error('content') is invalid @enderror"> {{ $post->content }} </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Рубрика</label>
                                    <select class="form-control @error('rubric_id') is invalid @enderror" id="rubric_id"
                                            name="rubric_id">
                                        <option value="">Выбрать рубрику</option>
                                        @foreach($rubrics as $k => $v)
                                            <option value="{{ $k }}"> {{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="thumbnail">Изображения</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" class="custom-file-input"
                                                   id="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                    </div>

                                    <div><img src="{{ $post->getImage() }}" class="img-thumbnail mt-2" alt="thumbnail"
                                              width="200"></div>
                                </div>

                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

