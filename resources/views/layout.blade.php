<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/touchspin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alert.css')}}">
    <link rel="stylesheet" href="{{ asset('libra/fontawesome-free-5.15.1-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bars.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/korzinka.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rating.css') }}">


    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>

@include('header')

@yield('content')

@include('footer')


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('js/touchspin.js') }}"></script>
<script src="{{ asset('js/alert.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/rating.js') }}"></script>

<script src="{{ asset('js/imageCheckbox.js') }}"></script>
@yield('script')
<script>
    $('.containers').rating();

    $(".checkes").imgCheckbox({
        radio: true
    });

    $('.branch-item').imgCheckbox({
        radio: true,
        onclick: function(el) {
            console.log();
            if(el.hasClass('imgChked')){
                var parent = $(el).children();
                var id = $(parent).children().attr('data-id');
                $('#branch').val(id);
                console.log($('#branch').val())
            }
        }
    });

    var mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: '.btn-next',
            prevEl: '.btn-prev',
        },
    })

    var swiper = new Swiper('.main-banners', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });



    $('.add-to-cart').on('click', function () {
        var productId = $(this).attr('data-product');
        var price = $(this).attr('data-price');
        var title = $(this).attr('data-title');
        var branch = $('#branch').val();
        var thumbnail = $(this).attr('data-thumbnail');

        console.error(branch)

        $(this).text('Добавлено в корзину');

        $.ajax({
            method: 'POST',
            url: '{{ route('carts.store') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: productId,
                title: title,
                price: price,
                branch: branch,
                thumbnail: thumbnail,

            },
            success: function (response) {

                console.log(response)
                var cartBadge = parseInt($('.cartCount').text());
                var newValue = cartBadge += 1;
                $('.cartCount').text(newValue);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Добавлена',
                    showConfirmButton: false,
                    timer: 1500
                })
                console.log(cartBadge)
            }
        })
    })

    $('.add-Cart').on('click', function () {
        var productId = $(this).attr('data-product');
        var price = $(this).attr('data-price');
        var title = $(this).attr('data-title');
        var thumbnail = $(this).attr('data-thumbnail');

        $(this).addClass('active-new');
        $(this).text('Добавлено в корзину');
        $(this).removeClass('addCart');
        console.log($(this));

        $.ajax({
            method: 'POST',
            url: '{{ route('carts.store') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: productId,
                title: title,
                price: price,
                thumbnail: thumbnail,

            },
            success: function (response) {

                console.log(response)
                var cartBadge = parseInt($('.cartCount').text());
                var newValue = cartBadge += 1;
                $('.cartCount').text(newValue);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Добавлена',
                    showConfirmButton: false,
                    timer: 1500
                })
                console.log(cartBadge)
            }
        })
    })


</script>
<script>
    (function(){
        const classname = document.querySelectorAll('.quantity')
        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function() {
                const id = element.getAttribute('data-id')
                // const productQuantity = element.getAttribute('data-productQuantity')
                axios.post(`/carts/updateqty`, {
                    quantity: this.value,
                    id: id,
                })
                    .then(function (response) {
                        console.log(response);
                        window.location.href = '{{ route('carts.index') }}'
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            })
        })
    })();
</script>
</body>
</html>



