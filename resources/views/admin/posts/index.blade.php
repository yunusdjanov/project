@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Посты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Посты</li>
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
                            <h3 class="card-title">Список постов</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3"> Добавить пост </a>
                            @if(count($posts))
                                <div class="table-responsive">
                                    <div class="card-body">
                                        <table id="myTable" class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Title</th>
                                                <th>Рубрика</th>
                                                <th>Added data</th>
                                                <th style="width: 40px">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($posts as $post)
                                                <tr>
                                                    <td>{{$post->id}}</td>
                                                    <td>{{$post->title}}</td>
                                                    <td>{{$post->rubric->title}}</td>
                                                    <td>{{$post->created_at}}</td>
                                                    <td>
                                                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                                           class="btn btn-info btn-sm float-left mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                                            method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('are you sure?')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p>
                                    There is no Posts!!!
                                </p>
                            @endif

                        </div>


                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $posts->links() }}
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

