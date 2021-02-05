@extends('layout')

@section('content')
    <div class="filter-title container">
        <h3 class="section-title">Профессиональная корейская косметика</h3>
    </div>
    <section class="content">

        <main class="main filter-wrapper">

            <div class="filter-section__wrapper content-filter">
                <p>{{ 'Фильтр по категориям' }}</p>
                <section class="filter-section">
                    {{  $category[0]['title'] }}
                        <div>
                    @foreach($subcategories as $subcategory)
                        <div class="filter-subs-parent">
                            <a class="filter-subs" href="{{ route('product.filter', [$subcategory->category_id, 'sub_ids' => $subcategory->id]) }}">{{ $subcategory->title }}</a>
                        </div>
                    @endforeach
                </div>
                    <form action="{{ route('product.list', [$subcategory->category_id, 'sub_ids' => $subcategory->id]) }}" method="GET">
                        <p class="mt-3">{{ 'Фильтр по брендам' }}</p>
                        <div class="filter-subs-parent">
                             @foreach($brands as $brand)
                            <input type="checkbox" name="brand" value="{{ $brand }}" style="margin-right: 10px">{{ $brand }}<br>
                            @endforeach
                        </div>
                        <p>{{ 'Фильтр по цене' }}</p>
                        Цена от:<input name="price_from" type="number" value="{{ old('price_from') }}"><br>
                        До:<input name="price_to" type="number" value="{{ old('price_to') }}">
                        <button type="submit" class="btn btn-primary mt-3">применить</button>
                    </form>
                </section>
            </div>
            <div class="section-3 recommends">
                <div class="container shop-area">
                    <br>
                    <div class="shopping-items">

                        @foreach($products as $product)
                        <div class="shopping-item card">
                            <div class="card-image-content">
                                <img src="{{ $product->getImage() }}" class="card-img-top" alt="...">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title prize text-danger">{{ $product->price }} UZS</h5>
                                <a  href="{{ route('product.show', $product->id) }}" class="card-text"> {{ Str::limit($product->title, 25, '...') }} </a>
                                <div class="rating">
                                    <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                    <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                    <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                    <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <br>
                                    13 отзывов
                                </div>

                                @if($product->quantity > 0)
                                    @if(!$product->branches->count())
                                        @if(!in_array($product->id, Cart::content()->pluck('id')->all()))
                                            <button class="btn text-center vkorzinu icon-color addCart" data-product="{{ $product->id }}" data-price="{{ $product->price }}" data-title="{{ $product->title }}" data-thumbnail="{{ $product->thumbnail }}">
                                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.2093 4.67278H14.0349L10.6744 0.230168C10.4767 0.0282308 10.2791 -0.173706 10.0814 -0.173706C9.68605 -0.173706 9.2907 0.230168 9.2907 0.634041C9.2907 0.835978 9.2907 1.03792 9.48837 1.03792L12.0581 4.47084H4.94186L7.51163 1.03792C7.7093 0.835979 7.7093 0.835978 7.7093 0.634041C7.7093 0.230168 7.31395 -0.173706 6.9186 -0.173706C6.72093 -0.173706 6.52326 0.0282308 6.32558 0.230168L2.96512 4.67278H0.790698C0.395349 4.67278 0 5.07665 0 5.48053C0 5.8844 0.395349 6.28827 0.790698 6.28827H0.988372L2.37209 14.9716H14.6279L16.0116 6.28827H16.2093C16.6047 6.28827 17 5.8844 17 5.48053C17 5.07665 16.6047 4.67278 16.2093 4.67278ZM13.2442 13.3561H3.55814L2.56977 6.28827H14.4302L13.4419 13.3561H13.2442Z"
                                                        fill="#373435" />
                                                </svg>
                                                В корзину
                                            </button>
                                        @else
                                            <a class="btn text-center vkorzinu icon-color active-new" role="button">
                                                Добавлена в корзину
                                            </a>
                                        @endif
                                    @else
                                        <a class="btn text-center icon-color prosmotr-btn" href="{{ route('product.show', $product->id) }}">
                                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.2093 4.67278H14.0349L10.6744 0.230168C10.4767 0.0282308 10.2791 -0.173706 10.0814 -0.173706C9.68605 -0.173706 9.2907 0.230168 9.2907 0.634041C9.2907 0.835978 9.2907 1.03792 9.48837 1.03792L12.0581 4.47084H4.94186L7.51163 1.03792C7.7093 0.835979 7.7093 0.835978 7.7093 0.634041C7.7093 0.230168 7.31395 -0.173706 6.9186 -0.173706C6.72093 -0.173706 6.52326 0.0282308 6.32558 0.230168L2.96512 4.67278H0.790698C0.395349 4.67278 0 5.07665 0 5.48053C0 5.8844 0.395349 6.28827 0.790698 6.28827H0.988372L2.37209 14.9716H14.6279L16.0116 6.28827H16.2093C16.6047 6.28827 17 5.8844 17 5.48053C17 5.07665 16.6047 4.67278 16.2093 4.67278ZM13.2442 13.3561H3.55814L2.56977 6.28827H14.4302L13.4419 13.3561H13.2442Z"
                                                    fill="#373435" />
                                            </svg>
                                            Посмотрет продукт
                                        </a>
                                    @endif
                                @else
                                    <p class="p-2">нет в наличие</p>
                                @endif
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </main>


        <div class="section-3 recommends">
            <div class="container khiti shop-area">
                <h2 class="mb-3 bt-3">Вам может понравиться</h2>
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
        </div>

@endsection
