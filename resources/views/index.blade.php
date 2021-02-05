@extends('layout')

@section('content')


    <div class="section-1">

            <div class="swiper-container main-banners">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide index-swiper">
                            <div style="display:block; width: 100%; height:100%; background: url('{{ $banner->getImage() }}'); background-size: 100% 100%;"></div>
                        </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>

    </div>


    <!-- ---------- section 2 -----------  -->
    <div class="section-2">
        <div class="s2-imgs-box container">

            <div class="s2-img-item">
                <img src="imgs/14.jpg" alt="">
            </div>

            <div class="s2-img-item">
                <img src="imgs/21.jpg" alt="">
            </div>

            <div class="s2-img-item">
                <img src="imgs/31.jpg" alt="">
            </div>

        </div>

        <div class="container s2-c-items">
            @foreach($categories as $category)
                <div class="s2-category-item">
                    <a href="{{ route('product.list', $category->id) }}"><img src="{{ $category->getImage() }}" alt="" class="img-responsive"></a>
                    <span>
                    {{ $category->title }}
                </span>
                </div>
            @endforeach
        </div>
    </div>


    <!-- ---------- section 3 -----------  -->
    <div class="section-3">
        <div class="container khiti shop-area">
            <h2 class="mb-3 bt-3">Хиты продаж</h2>
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

    <div class="container new shop-area">
            <h2 class="mb-3 bt-3">Новинки</h2>
            <br>
            <div class="shopping-items">

                <div class="shop-slider slider-items">
                    <button class="btn">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button class="btn">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>

                @include('mightalsolike')

            </div>
        </div>



    <!-- ---------- section 4 -----------  -->
    <div class="section-4">
        <div class="brends container">
            <div class="brend-slider">
                <button class="btn">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </button>
                <button class="btn">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
            <h2 class="mb-3 bt-3">Наши бренды</h2>
            <div class="s4-content">
                <div class="s4-left-img">
                    <img src="imgs/brands baner 1.jpg" alt="">
                </div>

                <div class="s4-right-content">
                    <h3>O DR.SEA</h3>
                    <p class="fs-6">
                        На протяжении многих лет Израиль
                        является лидером в области передовых
                        биотехнологий и производства
                        натуральной косметики. Именно здесь,
                        на берегу Мертвого моря, производится
                        неповторимая по своему составу
                        продукция компании DR.SEA
                        (Доктор Море).
                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="blog container">
            <img src="imgs/b1 1.jpg" alt="" class="img-responsive">
            <img src="imgs/b2 1.jpg" alt="" class="img-responsive">
            <img src="imgs/b2 1.jpg" alt="" class="img-responsive">
            <img src="imgs/b1 1.jpg" alt="" class="img-responsive">

        </div>
    </div>
    <br><br>

    <!-- ---------- section 5 -----------  -->

    <div class="section-5">
        <div class="s5-1 container">
            <div class="s5-content">
                <h2 class="mb-3 bt-3">Интернет-магазин корейской косметики NABI</h2>
                <p class="fs-6">
                    Магазин корейской косметики NABI представляет разнообразные линии
                    для ухода за кожей и декоративную косметику популярных корейских производителей
                    для любого типа кожи, вкуса и возраста. Мы всегда поможем Вам выбрать лучшее
                    соотношение цены и качества!

                    Миссия нашей команды - помочь Вам превратить ежедневный рутинный уход
                    за лицом и телом в священнодействие, однообразие - в творчество,
                    вынужденную необходимость — в наслаждение!
                    Мы работаем для того, чтобы Вы полюбили себя!
                </p>
                <div>
                    <img src="imgs/nabo logo green 1.svg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="s5-img">
                <img src="imgs/shop 1.jpg" class="img-responsive" alt="">
            </div>
        </div>
        <br>
        <div class="container p-5">
            <h2 class="mb-3 bt-3">
                Как нас найти?
            </h2>

            <div class="map-contanier">
                <div class="map-box col-lg-7 col-md-12">
                    <h3 class="fs-4 text-light">
                        г. Ташкент
                    </h3>
                    <h4 class="fs-6 text-light">
                        Яккасарайский район,
                        ул Глинка 48 (угол Нукусская)
                    </h4>
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d95877.31487310283!2d69.3403648!3d41.327001599999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1610817408563!5m2!1sen!2s" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

                <div class="more col-lg-5 col-md-12">
                    <button class="btn">
                        Подробнее о магазине
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

