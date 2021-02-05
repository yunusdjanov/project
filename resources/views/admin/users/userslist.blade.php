@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Пользователи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Список пользователей</li>
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
                            <h3 class="card-title">Список пользователей</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Ф.И.О</th>
                                    <th>email</th>
                                    <th>Телефон</th>
                                    <th>Адрес</th>
                                    <th>Роль</th>
                                    <th>Упр.ролями</th>
                                    <th style="width: 40px">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>+{{ $user->number }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>
                                            {{ $current = \App\Models\User::find($user->id)->roles->pluck('name') }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Назначить роль
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item" href="{{ route('users.role', ['current' => $current,'role' => 1, 'id' => $user->id]) }}">Супер админ</a>
                                                    <a class="dropdown-item" href="{{ route('users.role', ['current' => $current,'role' => 2, 'id' => $user->id]) }}">Админ</a>
                                                    <a class="dropdown-item" href="{{ route('users.role', ['current' => $current,'role' => 3, 'id' => $user->id]) }}">SEO</a>
                                                    <a class="dropdown-item" href="{{ route('users.role', ['current' => $current,'role' => 4, 'id' => $user->id]) }}">Аналитик</a>
                                                    <a class="dropdown-item" href="{{ route('users.role', ['current' => $current,'role' => 5, 'id' => $user->id]) }}">Пользовател</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
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
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $users->links() }}
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

