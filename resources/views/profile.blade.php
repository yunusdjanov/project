@extends('layout')


@section('content')

<section>
    <div class="container-fluid pb-5">
        <div class="block-title d-flex align-items-center my-5 w-100">
            <h3>Профиль</h3>
            <a href="{{ route('logout') }}" class="mx-5" href="#">выйти</a>
        </div>

        <div class="d-flex justify-content-around align-items-start mt-5">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">История
                    заказов</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Личные данные</a>
                <a href="{{ route('wishlist.index') }}" class="btn btn-default"><span class="text-primary">Избранное</span></a>
            </div>

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <nav>
                        <div class="nav sub-tabs" id="nav-tab" role="tablist">
                           <h3>Список заказов</h3>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active mt-5" id="nav-process" role="tabpanel"
                             aria-labelledby="nav-process-tab">
                            @if($orders->count() > 0)
                                @foreach($orders as $order)
                            <p>ID:<span class="product-id">{{ $order->id }}</span>......................................
                                    @if($order->status === 1)
                                        <span>{{ 'Оплачен' }}</span>
                                    @else
                                        <span>{{ 'Ожидает потдвеждение' }}</span>
                                    @endif
                            </p>
                                @endforeach
                            @else
                                <p>Заказов пока нет...</p>
                            @endif
                        </div>
                        <div class="tab-pane fade mt-5" id="nav-done" role="tabpanel"
                             aria-labelledby="nav-done-tab">

                        </div>
                        <div class="tab-pane fade mt-5" id="nav-cancel" role="tabpanel"
                             aria-labelledby="nav-cancel-tab">
                            ...</div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <form action="{{ route('user.data.edit', ['id' => Auth::user()->id]) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="name">Ф.И.О</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="number">Телефон</label>
                                    <input type="number" name="number" class="form-control" id="number" value="{{ Auth::user()->number }}">
                                </div>
                                <label for="address">Адрес доставки</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ Auth::user()->address }}">
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Изменить</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            {{-- <div id="profile-banner" class="ad-banner">
                <img src="/imgs/baner.jpg" alt="">
            </div> --}}
        </div>
    </div>
</section>



<div class="section-3">
    <div class="container khiti shop-area">
        <h2 class="mb-3 bt-3">Вас может понравиться</h2>
        <br>
        <div class="shopping-items">

            <div class="shop-slider slider-items">
                <button class="btn btn-prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </button>
                <button class="btn btn-next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
            <div class="swiper-container">
                @include('mightalsolike')
            </div>
        </div>
    </div>
</div>

@endsection
