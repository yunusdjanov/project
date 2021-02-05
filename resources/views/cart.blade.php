


@extends('layout')

@section('content')
{{--    {{ dd(Cart::content()) }}--}}
    <div class="item-block">
        <div class="block-title">
            <h3>Корзина</h3>
            <a href="#">Очистить корзину</a>
        </div>
        <div class="d-flex flex-wrap main-corzin">
            @foreach(Cart::content() as $item)
                <div class="item-details">
                    <div class="item-img">
                        <img src="{{ asset("uploads/{$item->options->thumbnail}") }}" alt="" height="100px"
                             width="100px">
                    </div>
                    <div>
                        <p class="item-info">{{ $item->name }}</p>
                        <span>В наличии</span>
                    </div>
                    @if ($item->options->branch)
                        <div class="item-branch-info">
                            <p class="item-info">{{ \App\Models\Branch::where('id', $item->options->branch)->pluck('branch')->join(',') }}</p>
                        </div>
                    @endif
                    <div class="item-amount" style="width: 130px">
                        <input type="text" value="{{ $item->qty }}" name="quantity" class="quantity form-control"
                               data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                    </div>
                    <div class="buttons">
                        <span class="price" data-price="{{ $item->price }}">{{ $item->price }} uzs</span>
                        <span>

                            @if(!in_array($item->id, \App\Models\Wishlist::pluck('product_id')->all()))
                                <form action="{{ route('wishlist.store', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="wish-btn"><img src="/imgs/like.svg" alt=""></button>
                                </form>
                            @else
                                <form action="{{ route('wishlist.destroy' , $item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button type="submit" class="wish-btn text-danger"><span class="fas fa-heart" style="font-size: 24px"></span></button>
                                </form>
                            @endif
                        </span>
                        <span>
                            <form action="{{ route('carts.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">  <img src="/imgs/delete.svg" alt=""></button>
                            </form>
                        </span>
                    </div>

                </div>
            @endforeach
                @if(Cart::count() > 0)
                    <div class="purchase-block">
                        @foreach(Cart::content() as $item)
                            <p><span class="korzinka-texts">{{ $item->name }}.................. </span><span>{{ $item->price }} UZS</span>
                            </p>
                        @endforeach
                        <div class="d-flex">
                            <input type="text" class="promo" placeholder="Введите код на скидку">
                            <button type="button" class="promo-check" class="btn btn-sm btn-success"><span
                                    class="fas fa-check"></span></button>
                        </div>

                        <h4>Итого: <span class="totals">{{ intval(str_replace(',', '', Cart::total())) }} uzs</span></h4>
                        <a href="{{ route('checkout.index') }}" class="btn-pay">Оформить заказ</a>
                    </div>
                @endif
        </div>
    </div>

    <div class="container new shop-area">
        <h2 class="mb-3 bt-3">С этим часто покупают</h2>
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

@endsection


@section('script')
    <script>

        $('.quantity').TouchSpin({
            min: 0,
            max: '{{ 50 }}',
            stepinterval: 50,
            maxboostedstep: 10000000,
            buttondown_class: "btn btn-newInfo",
            buttonup_class: "btn btn-newInfo"
        });

        var button = $('.promo-check');
        var inputPromo = $('.promo');

        button.on('click', function () {
            console.log(inputPromo.val());

            $.ajax({
                url: '{{ route('coupon.check') }}',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    promo: inputPromo.val()
                },
                success: function (response) {
                    console.log(response);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Вы получили купон на сумму' + response,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        });

        $('.quantity').on('touchspin.on.startupspin', function () {
            console.log($(this).val())
            var value = $(this).val();
            var ids = $(this).attr('data-id');
            var parent = $(this).parent();
            var nextParent = $(parent).parent();
            var sbl = $(nextParent).siblings('.buttons');
            var pr = $(sbl).children().attr('data-price');
            var price = parseInt(pr);

            console.log(price);
            $.ajax({
                method: "POST",
                url: '{{ route('update.qty') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    quantity: value,
                    id: ids
                },
                success: function (response) {
                    console.log(response)

                    if (response.success === true) {
                        var qty = parseInt(response.qty);
                        var total = qty * price;
                        console.log();
                        $('.totals').text(total + 'uzs')
                    }

                }
            })
        })

        $('.quantity').on('touchspin.on.startdownspin', function () {
            console.log($(this).val())
            var value = $(this).val();
            var ids = $(this).attr('data-id');
            var parent = $(this).parent();
            var nextParent = $(parent).parent();
            var sbl = $(nextParent).siblings('.buttons');
            var pr = $(sbl).children().attr('data-price');
            var price = parseInt(pr);

            console.log(price);
            $.ajax({
                method: "POST",
                url: '{{ route('update.qty') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    quantity: value,
                    id: ids
                },
                success: function (response) {
                    console.log(response)

                    if (response.success === true) {
                        var qty = parseInt(response.qty);
                        var total = qty * price;
                        console.log();
                        $('.totals').text(total + 'uzs')
                    }

                }
            })
        })

        $('.wish-btn').on('click', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                method: "POST",
                url: '{{ route('wishlist.store')  }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id
                },
                success: function (response){
                    console.log(response);
                    $('.wish-btn').children().addClass('active-heart')
                    $('.wish-btn').attr('class', 'wish-btn-now')
                }
            })
        })

        $('.wish-btn-now').on('click', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                method: "POST",
                url: '{{ route('wishlist.delete') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id
                },
                success: function (response){
                   $('.wish-btn').children().removeClass('active-heart')
                }
            })
        })
    </script>
@endsection









