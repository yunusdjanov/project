@extends('layout')

@section('content')

    <div class="filter-title container">
        <h3 class="section-title">Профессиональная корейская косметика для лица</h3>
    </div>
    <section class="content">

        <main class="main filter-wrapper">

            <div class="filter-section__wrapper content-filter">
                <section class="filter-section">

                    <details class="filters filter-section">
                        <summary class="filters__title faq__summary">Основной уход</summary>
                        <div class="faq__text">
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Очищение</a>
                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Отшелушивание</a>
                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Тонизирование</a>
                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Направленный уход</a>
                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Для кожи вокруг глаз</a>
                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Защита от солнца</a>
                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Маски</a>
                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Мужская косметика</a>
                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <label><a href="#">Детская косметика</a>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="instock" type="checkbox" />
                                    <label for="instock">В наличии</label>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="filters faq__detail">
                        <summary class="filters__title faq__summary"><span class="faq__question">Наши
                                предложения</span>
                        </summary>
                        <div class="faq__text">
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-1" type="checkbox" />
                                    <label for="checkbox-1">Puppy

                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-2" type="checkbox" checked="checked" />
                                    <label for="checkbox-2">Young</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-3" type="checkbox" />
                                    <label for="checkbox-3">Adult</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-4" type="checkbox" />
                                    <label for="checkbox-4">Senior</label>
                                </div>
                            </div>
                        </div>
                    </details>
                    <details class="filters faq__detail">
                        <summary class="filters__title faq__summary"><span class="faq__question">Производитель</span>
                        </summary>
                        <div class="faq__text">
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-1" type="checkbox" />
                                    <label for="checkbox-1">Puppy

                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-2" type="checkbox" checked="checked" />
                                    <label for="checkbox-2">Young</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-3" type="checkbox" />
                                    <label for="checkbox-3">Adult</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-4" type="checkbox" />
                                    <label for="checkbox-4">Senior</label>
                                </div>
                            </div>
                        </div>
                    </details>
                    <details class="filters faq__detail">
                        <summary class="filters__title faq__summary"><span class="faq__question">Объём</span>
                        </summary>
                        <div class="faq__text">
                            <div class="filters__item">
                                <div class="pricing">
                                    <input type="text" name="" id="" placeholder="от">
                                    <input type="text" name="" id="" placeholder="до">
                                </div>
                            </div>
                        </div>
                    </details>
                    <details class="filters faq__detail">
                        <summary class="filters__title faq__summary"><span class="faq__question">Производитель</span>
                        </summary>
                        <div class="faq__text">
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-1" type="checkbox" />
                                    <label for="checkbox-1">Puppy

                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-2" type="checkbox" checked="checked" />
                                    <label for="checkbox-2">Young</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-3" type="checkbox" />
                                    <label for="checkbox-3">Adult</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-4" type="checkbox" />
                                    <label for="checkbox-4">Senior</label>
                                </div>
                            </div>
                        </div>
                    </details>
                    <details class="filters faq__detail">
                        <summary class="filters__title faq__summary"><span class="faq__question">Тип кожи</span>
                        </summary>
                        <div class="faq__text">
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-1" type="checkbox" />
                                    <label for="checkbox-1">Puppy

                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-2" type="checkbox" checked="checked" />
                                    <label for="checkbox-2">Young</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-3" type="checkbox" />
                                    <label for="checkbox-3">Adult</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-4" type="checkbox" />
                                    <label for="checkbox-4">Senior</label>
                                </div>
                            </div>
                        </div>
                    </details>
                    <details class="filters faq__detail">
                        <summary class="filters__title faq__summary"><span class="faq__question">Функция</span>
                        </summary>
                        <div class="faq__text">
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-1" type="checkbox" />
                                    <label for="checkbox-1">Puppy

                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-2" type="checkbox" checked="checked" />
                                    <label for="checkbox-2">Young</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-3" type="checkbox" />
                                    <label for="checkbox-3">Adult</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-4" type="checkbox" />
                                    <label for="checkbox-4">Senior</label>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="filters faq__detail">
                        <summary class="filters__title faq__summary"><span class="faq__question">Возраст</span>
                        </summary>
                        <div class="faq__text">
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-1" type="checkbox" />
                                    <label for="checkbox-1">Puppy

                                    </label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-2" type="checkbox" checked="checked" />
                                    <label for="checkbox-2">Young</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-3" type="checkbox" />
                                    <label for="checkbox-3">Adult</label>
                                </div>
                            </div>
                            <div class="filters__item">
                                <div class="checkbox">
                                    <input id="checkbox-4" type="checkbox" />
                                    <label for="checkbox-4">Senior</label>
                                </div>
                            </div>
                        </div>
                    </details>
                </section>
            </div>
            <div class="section-3 recommends">
                <div class="container shop-area">
                    <br>
                    <div class="shopping-items">

                        @foreach($products as $product)
                        <div class="shopping-item card">
                            <img src="{{ $product->getImage() }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title prize text-danger">{{ $product->price }} UZS</h5>
                                <p class="card-text"> {{ $product->about }} </p>

                                <div class="rating">
                                    <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                    <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                    <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                    <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <br>
                                    13 отзывов
                                </div>

                                <a href="#" class="btn text-center vkorzinu icon-color">
                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.2093 4.67278H14.0349L10.6744 0.230168C10.4767 0.0282308 10.2791 -0.173706 10.0814 -0.173706C9.68605 -0.173706 9.2907 0.230168 9.2907 0.634041C9.2907 0.835978 9.2907 1.03792 9.48837 1.03792L12.0581 4.47084H4.94186L7.51163 1.03792C7.7093 0.835979 7.7093 0.835978 7.7093 0.634041C7.7093 0.230168 7.31395 -0.173706 6.9186 -0.173706C6.72093 -0.173706 6.52326 0.0282308 6.32558 0.230168L2.96512 4.67278H0.790698C0.395349 4.67278 0 5.07665 0 5.48053C0 5.8844 0.395349 6.28827 0.790698 6.28827H0.988372L2.37209 14.9716H14.6279L16.0116 6.28827H16.2093C16.6047 6.28827 17 5.8844 17 5.48053C17 5.07665 16.6047 4.67278 16.2093 4.67278ZM13.2442 13.3561H3.55814L2.56977 6.28827H14.4302L13.4419 13.3561H13.2442Z"
                                            fill="#373435"></path>
                                    </svg>
                                    В корзину
                                </a>
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


                    <div class="shopping-item card">
                        <img src="imgs/p11.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title prize text-danger">107 000 UZS</h5>
                            <p class="card-text">Some quick make up the bulk of the card's content.</p>

                            <div class="rating">
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <br>
                                13 отзывов
                            </div>

                            <a href="#" class="btn text-center vkorzinu icon-color">
                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.2093 4.67278H14.0349L10.6744 0.230168C10.4767 0.0282308 10.2791 -0.173706 10.0814 -0.173706C9.68605 -0.173706 9.2907 0.230168 9.2907 0.634041C9.2907 0.835978 9.2907 1.03792 9.48837 1.03792L12.0581 4.47084H4.94186L7.51163 1.03792C7.7093 0.835979 7.7093 0.835978 7.7093 0.634041C7.7093 0.230168 7.31395 -0.173706 6.9186 -0.173706C6.72093 -0.173706 6.52326 0.0282308 6.32558 0.230168L2.96512 4.67278H0.790698C0.395349 4.67278 0 5.07665 0 5.48053C0 5.8844 0.395349 6.28827 0.790698 6.28827H0.988372L2.37209 14.9716H14.6279L16.0116 6.28827H16.2093C16.6047 6.28827 17 5.8844 17 5.48053C17 5.07665 16.6047 4.67278 16.2093 4.67278ZM13.2442 13.3561H3.55814L2.56977 6.28827H14.4302L13.4419 13.3561H13.2442Z"
                                        fill="#373435" />
                                </svg>
                                В корзину
                            </a>
                        </div>
                    </div>

                    <div class="shopping-item card">
                        <img src="imgs/p11.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title prize text-danger">107 000 UZS</h5>
                            <p class="card-text">Some quick make up the bulk of the card's content.</p>

                            <div class="rating">
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <br>
                                13 отзывов
                            </div>

                            <a href="#" class="btn text-center vkorzinu icon-color">
                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.2093 4.67278H14.0349L10.6744 0.230168C10.4767 0.0282308 10.2791 -0.173706 10.0814 -0.173706C9.68605 -0.173706 9.2907 0.230168 9.2907 0.634041C9.2907 0.835978 9.2907 1.03792 9.48837 1.03792L12.0581 4.47084H4.94186L7.51163 1.03792C7.7093 0.835979 7.7093 0.835978 7.7093 0.634041C7.7093 0.230168 7.31395 -0.173706 6.9186 -0.173706C6.72093 -0.173706 6.52326 0.0282308 6.32558 0.230168L2.96512 4.67278H0.790698C0.395349 4.67278 0 5.07665 0 5.48053C0 5.8844 0.395349 6.28827 0.790698 6.28827H0.988372L2.37209 14.9716H14.6279L16.0116 6.28827H16.2093C16.6047 6.28827 17 5.8844 17 5.48053C17 5.07665 16.6047 4.67278 16.2093 4.67278ZM13.2442 13.3561H3.55814L2.56977 6.28827H14.4302L13.4419 13.3561H13.2442Z"
                                        fill="#373435" />
                                </svg>
                                В корзину
                            </a>
                        </div>
                    </div>
                    <div class="shopping-item card">
                        <img src="imgs/p11.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title prize text-danger">107 000 UZS</h5>
                            <p class="card-text">Some quick make up the bulk of the card's content.</p>

                            <div class="rating">
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <br>
                                13 отзывов
                            </div>

                            <a href="#" class="btn text-center vkorzinu icon-color">
                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.2093 4.67278H14.0349L10.6744 0.230168C10.4767 0.0282308 10.2791 -0.173706 10.0814 -0.173706C9.68605 -0.173706 9.2907 0.230168 9.2907 0.634041C9.2907 0.835978 9.2907 1.03792 9.48837 1.03792L12.0581 4.47084H4.94186L7.51163 1.03792C7.7093 0.835979 7.7093 0.835978 7.7093 0.634041C7.7093 0.230168 7.31395 -0.173706 6.9186 -0.173706C6.72093 -0.173706 6.52326 0.0282308 6.32558 0.230168L2.96512 4.67278H0.790698C0.395349 4.67278 0 5.07665 0 5.48053C0 5.8844 0.395349 6.28827 0.790698 6.28827H0.988372L2.37209 14.9716H14.6279L16.0116 6.28827H16.2093C16.6047 6.28827 17 5.8844 17 5.48053C17 5.07665 16.6047 4.67278 16.2093 4.67278ZM13.2442 13.3561H3.55814L2.56977 6.28827H14.4302L13.4419 13.3561H13.2442Z"
                                        fill="#373435" />
                                </svg>
                                В корзину
                            </a>
                        </div>
                    </div>
                    <div class="shopping-item card">
                        <img src="imgs/p11.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title prize text-danger">107 000 UZS</h5>
                            <p class="card-text">Some quick make up the bulk of the card's content.</p>

                            <div class="rating">
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <br>
                                13 отзывов
                            </div>

                            <a href="#" class="btn text-center vkorzinu icon-color">
                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.2093 4.67278H14.0349L10.6744 0.230168C10.4767 0.0282308 10.2791 -0.173706 10.0814 -0.173706C9.68605 -0.173706 9.2907 0.230168 9.2907 0.634041C9.2907 0.835978 9.2907 1.03792 9.48837 1.03792L12.0581 4.47084H4.94186L7.51163 1.03792C7.7093 0.835979 7.7093 0.835978 7.7093 0.634041C7.7093 0.230168 7.31395 -0.173706 6.9186 -0.173706C6.72093 -0.173706 6.52326 0.0282308 6.32558 0.230168L2.96512 4.67278H0.790698C0.395349 4.67278 0 5.07665 0 5.48053C0 5.8844 0.395349 6.28827 0.790698 6.28827H0.988372L2.37209 14.9716H14.6279L16.0116 6.28827H16.2093C16.6047 6.28827 17 5.8844 17 5.48053C17 5.07665 16.6047 4.67278 16.2093 4.67278ZM13.2442 13.3561H3.55814L2.56977 6.28827H14.4302L13.4419 13.3561H13.2442Z"
                                        fill="#373435" />
                                </svg>
                                В корзину
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
