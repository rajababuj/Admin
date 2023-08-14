<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Limited-Time Offers, INTUITIVE">
    <meta name="description" content="">
    <title>Home</title>
    <meta name="generator" content="Nicepage 5.15.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700|Archivo+Black:400">
    <link rel="stylesheet" href="{{ asset('assets\css\Blog-Template.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\Post-Template.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\nicepage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\About.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\Contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\Home.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    @include('layouts.header')
    <header class="u-clearfix u-header u-header" id="sec-b098">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-auto">
                <div class="dropdown">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    <br>
                    <a href="{{ route('viewcart') }}" class="btn btn-info">View Cart</a>
                </div>
                <div class="dropdown">
                    <button class="u-btn dropdown-toggle" type="button" id="size-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Size
                    </button>
                    <div class="dropdown-menu" aria-labelledby="size-dropdown">
                        <li>
                            @foreach ($sizes as $size)
                            <a class="dropdown-item size-option" data-size="{{ $size->name }}" href="#">{{ $size->name }}</a>
                            @endforeach
                        </li>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="u-btn dropdown-toggle" type="button" id="category-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Category
                    </button>

                    <div class="dropdown-menu" aria-labelledby="category-dropdown">
                        <li>
                            @foreach ($categorys as $category)
                            <a class="dropdown-item category-option" data-category="{{ $category->name }}" href="#">{{ $category->name }}</a>
                            @endforeach
                        </li>
                    </div>
                </div>
            </ul>
        </nav>
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.html">About</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
        </div>

    </header>
    <section class="u-align-center u-clearfix u-section-1" id="carousel_a0ac">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h2 class="u-custom-font u-text u-text-palette-1-base u-text-1">E_Commerce Home page-Time</h2>
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    @foreach($product as $item)
                    <div class="u-container-style u-list-item u-palette-2-light-3 u-repeater-item u-video-cover u-list-item-{{ $item->id }}">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                            <img src="{{$item->image}}" class="u-expanded-width u-image u-image-default u-image-{{ $item->id }}">
                            <div class="u-align-center u-container-style u-expanded-widthu-group u-video-cover u-group-1">
                                <div class="u-container-layout u-valign-middle u-container-layout-2">
                                    <h3 class="u-custom-font u-font-oswald u-text u-text-2">{{ $item->name }}</h3>
                                    <h5 class="u-text u-text-3">${{ $item->price }}</h5>
                                    <h5 class="u-text">{{ $item->categoryDetail->name }}</h5>
                                    <h6 class="u-text">{{ $item->sizeDetail->name }}</h6>
                                    <button class="add-to-cart-btn" class="u-btn u-btn-rectangle u-button-style u-none u-text-palette-1-base u-btn-1" data-product="{{ $item->id }}">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <p class="u-text u-text-default u-text-10">Images from <a href="https://www.freepik.com/free-photos-vectors/people" target="_blank">Freepik</a></p>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
        </script>
        <script>
            $(document).ready(function() {
                $('.add-to-cart-btn').click(function() {
                    const productId = $(this).data('product');
                    const productName = 'Product Name';
                    $.ajax({
                        type: 'post',
                        url: "{{ route('add-to-cart') }}",
                        data: {
                            product_id: productId,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            console.log('Product added successfully.');
                            toastr.success('Product added to cart.', 'Success');
                        },
                        error: function(data) {
                            toastr.error('Error adding product to cart.', 'Error');
                        }
                    });
                });
                $('#size-filter-btn').click(function() {
                    $('#size-dropdown').dropdown('toggle');
                });

                $('.size-option').click(function() {
                    const selectedSize = $(this).data('size');
                    $('.u-repeater-item').hide();

                    $(`.u-repeater-item:has(h6:contains(${selectedSize}))`).show();

                    $('#size-dropdown').dropdown('toggle');
                });

                $('#category-filter-btn').click(function() {
                    $('#category-dropdown').dropdown('toggle');
                });

                $('.category-option').click(function() {
                    const selectedCategory = $(this).data('category');
                    $('.u-repeater-item').hide();

                    $(`.u-repeater-item:has(h5:contains(${selectedCategory}))`).show();

                    $('#category-dropdown').dropdown('toggle');
                });

            });
            // Increment button
            $(document).on('click', '.increment-btn', function() {
                const input = $(this).closest('.input-group').find('.qty-input');
                input.val(parseInt(input.val()) + 1);
            });

            // Decrement button
            $(document).on('click', '.decrement-btn', function() {
                const input = $(this).closest('.input-group').find('.qty-input');
                const newValue = parseInt(input.val()) - 1;
                input.val(Math.max(newValue, 1));
            });
        </script>
    </section>
    <script src="{{asset ('assets/dist/js/intlTelInput.min.js') }}"></script>
    <script src="{{asset ('assets/dist/js/utils.js') }}"></script>
    <script src="{{asset ('assets/dist/js/nicepage.js') }}"></script>
    <script src="{{asset ('assets/dist/js/jquery.js') }}"></script>
</body>


</html>