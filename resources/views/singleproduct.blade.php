@extends('layout')

@section('content')
    <section class="product d-flex justify-content-between container text-start mt-5">
        <div class="product-img">
            <img src="{{ $product->getImage() }}" class="img-fluid" alt="item">
        </div>



        <div class="product-description">
            <h3 class="product-name">
                {{ $product->title }}
            </h3>


            <div class="rating">
                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                <i class="fa fa-star text-danger" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <br>
            </div>
            <div class="details d-flex justify-content-between align-items-center my-3">
                <div class="product-price d-flex align-items-center">
                    <span class="price">{{ $product->price }} UZS</span>
                    @if($product->quantity > 0)
                        <span class="mx-5">В наличии : {{ $product->quantity }}</span>
                    @else
                        <span class="mx-5">Нет в наличие</span>
                    @endif
                </div>
                @if($product->quantity > 0)
                    <div class="product-btn d-flex align-items-center">
                        <button class="add-to-cart" data-product="{{ $product->id }}" data-price="{{ $product->price }}" data-title="{{ $product->title }}"  data-thumbnail="{{ $product->thumbnail }}">Добавить в корзину</button>
                        <div class="btn-like">
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                @endif
            </div>
            <div>
            <div class="my-5">
                <h4>Описания</h4>
                <p>
                    {{ $product->about }}
                </p>

            </div>

            @if(!$product->branches->isEmpty())
                <h4>{{ $option[0]->name }}</h4>
                <div class="my-5 d-flex">
                    @foreach($product->branches as $branch)
                        <div class="branch-item">
                            <img src="{{ $branch->getImage() }}" data-id="{{ $branch->id }}" alt="">
                        </div>
                    @endforeach
                    <input type="hidden" id="branch" name="branchs">
                </div>
            @else
                no branches
            @endif

            <div class="accordion">
                <div class="accordion-item">
                    <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Состав</span><span class="icon" aria-hidden="true"></span></button>
                    <div class="accordion-content">
                      <p>{{$product->composition}}</p>
                    </div>
                </div>

                <div class="accordion-item">
                    <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Характеристики</span><span class="icon" aria-hidden="true"></span></button>
                    <div class="accordion-content">
                      <p>{{ $product->characteristic }}</p>
                    </div>
                </div>

                <div class="accordion-item">
                    <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Отзывы о товаре</span><span class="icon" aria-hidden="true"></span></button>
                    <div class="accordion-content">
                        <form action="{{ route('comment.save', $product->id) }}" method="POST">
                            @csrf
                            <label for="">Опишите продукта</label>
                            <div class="form-group d-flex">
                                @if(Auth::check())
                                    <input name="name" type="hidden" class="form-control" value="{{ Auth::user()->name }}">
                                @else
                                    <input name="name" type="hidden" class="form-control" value="Гость">
                                @endif
                                    <div class="containers">
                                        <input type="radio" name="star" class="rating" value="1">
                                        <input type="radio" name="star" class="rating" value="2">
                                        <input type="radio" name="star" class="rating" value="3">
                                        <input type="radio" name="star" class="rating" value="4">
                                        <input type="radio" name="star" class="rating" value="5">
                                    </div>
                            <input name="comment" type="text" class="form-control">
                            <button type="submit" class="comment-btn">Отправить</button>
                            </div>

                        </form>
                        <div class="comments">
                            @foreach($comments as $comment)
                                <div class="comments">
                                    @foreach($comments as $comment)
                                        <div class="comments-divs">
                                            <p class="comment-user">
                                                {{ $comment->name }}
                                            </p>
                                            <p class="comment-comment">
                                                {{ $comment->comment }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>


    </section>

@endsection

