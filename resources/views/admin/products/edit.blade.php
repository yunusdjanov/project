@extends('admin.layouts.layout')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование продукта</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование продукта</li>
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
                            <h3 class="card-title"> Товар: "{{ $products->title }}" </h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" enctype="multipart/form-data"
                              action="{{ route('products.update', ['product' => $products->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Наименование</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $products->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Бренд</label>
                                    <input type="text" name="brand"
                                           class="form-control @error('brand') is-invalid @enderror" id="brand"
                                           value="{{ $products->brand }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Описание</label>
                                    <textarea name="about" id="about" rows="3"
                                              class="form-control  @error('about') is invalid @enderror">{{ $products->about }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">Характеристика</label>
                                    <textarea name="characteristic" id="characteristic" rows="3"
                                              class="form-control  @error('characteristic') is invalid @enderror">{{ $products->characteristic }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">Состав</label>
                                    <textarea name="composition" id="composition" rows="3"
                                              class="form-control  @error('composition') is invalid @enderror">{{ $products->composition }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">Цена</label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           value="{{ $products->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Скидка</label>
                                    <input type="text" name="discount"
                                           class="form-control @error('discount') is-invalid @enderror" id="discount"
                                           value="{{ $products->discount }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Количество</label>
                                    <input type="text" name="quantity"
                                           class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                           value="{{ $products->quantity }}">
                                </div>
                                <div class="form-group">
                                    <label for="subcategory_id">Субкатегория</label>
                                    <select class="form-control @error('subcategory_id') is invalid @enderror"
                                            id="subcategory_id" name="subcategory_id">
                                        <option value="">Select subcategory</option>
                                        @foreach($subcategories as $k => $v)
                                            <option value="{{ $k }}"> {{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="option_id">Опции продукта</label>
                                    <select class="form-control option-type @error('option_id') is invalid @enderror"
                                            id="options" name="option_id">
                                        <option value=""></option>
                                        @foreach($options as $k => $v)
                                            <option value="{{ $v->id }}"> {{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="option_branch">Свойства продукта</label>
                                    <select class="form-control option-branch" id="optionBranch" name="option_branch[]"
                                            multiple="multiple">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Изображение продукта</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail"
                                                   class="custom-file-input @error('image') is-invalid @enderror"
                                                   id="image">
                                            <label class="custom-file-label" for="image"></label>
                                        </div>
                                    </div>
                                    <div><img src="{{ $products->getImage() }}" class="img-thumbnail mt-2"
                                              alt="thumbnail" width="200"></div>
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


@section('script')
    <script>
        $('.option-type').select2({
            theme: 'bootstrap4'
        });

        $('.option-branch').select2({
            theme: 'bootstrap4'
        });

        $('.option-type').on('select2:select', function () {
            console.log($(this).val());

            var id = $(this).val();

            $.ajax({
                method: "POST",
                url: '{{route('getbranch')}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id
                },
                success: function (response) {
                    var array = response;

                    $('.option-branch').html(" ");
                    var datas = $.each(array, function (key, value) {
                        console.log(value);
                        var options = `<option value="${value.id}">${value.branch}</option>`;
                        $('.option-branch').append(options);
                    });
                    console.log(datas)
                }
            })

        });
    </script>
@endsection
