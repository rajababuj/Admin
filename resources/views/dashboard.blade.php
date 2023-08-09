<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Limited-Time Offers, INTUITIVE">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
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






    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "logo": "images/default-logo.png"
        }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    <header class="u-clearfix u-header u-header" id="sec-b098">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>

                    <div class="dropdown-menu  dropdown-menu-right">
                        <form action="#">
                            @csrf
                            <button type="submit" class="btn btn-danger">Add Cart</button>
                        </form>
                    </div>

                </li>
            </ul>
        </nav>
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <a href="https://nicepage.com" class="u-image u-logo u-image-1">
                <img src="{{ asset('assets/css/images/default-logo.png') }}" class="u-logo-image u-logo-image-1">
            </a>
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
                <div class="u-nav-container">
                    <ul class="u-nav u-unstyled u-nav-1">
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Home.html" style="padding: 10px 20px;">Home</a>
                        </li>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="About.html" style="padding: 10px 20px;">About</a>
                        </li>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 10px 20px;">Contact</a>
                        </li>
                    </ul>
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
            <h2 class="u-custom-font u-text u-text-palette-1-base u-text-1">Limited-Time Offers</h2>
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <div class="u-container-style u-list-item u-palette-2-light-3 u-repeater-item u-video-cover u-list-item-1">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                            <img src="{{ asset('assets/css/images/r-min.jpg') }}" class="u-expanded-width u-image u-image-default u-image-2">
                            <div class="u-align-center u-container-style u-expanded-widthu-group u-video-cover u-group-1">
                                <div class="u-container-layout u-valign-top u-container-layout-2">
                                    <h4 class="u-custom-font u-font-oswald u-text u-text-2">Modern T-Shirt</h4>
                                    <h6 class="u-text u-text-3">$20.00</h6>
                                    <button class="add-to-cart-btn" data-product="1">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-palette-2-light-3 u-repeater-item u-video-cover u-list-item-2">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                            <img src="{{ asset('assets/css/images/t.jpg') }}" class="u-expanded-width u-image u-image-default u-image-2">
                            <div class="u-align-center u-container-style u-expanded-width u-group u-video-cover u-group-2">
                                <div class="u-container-layout u-valign-top u-container-layout-4">
                                    <h4 class="u-custom-font u-font-oswald u-text u-text-4">Women Dress</h4>
                                    <h6 class="u-text u-text-5">$60.00</h6>
                                    <a href="https://nicepage.online" class="u-btn u-btn-rectangle u-button-style u-none u-text-palette-1-base u-btn-2">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-palette-2-light-3 u-repeater-item u-video-cover u-list-item-3">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-5">
                            <img src="{{ asset('assets/css/images/sdsee.jpg') }}" class="u-expanded-width u-image u-image-default u-image-3">
                            <div class="u-align-center u-container-style u-expanded-width u-group u-video-cover u-group-3">
                                <div class="u-container-layout u-valign-top u-container-layout-6">
                                    <h4 class="u-custom-font u-font-oswald u-text u-text-6">Women Cotton Top</h4>
                                    <h6 class="u-text u-text-7">$17.00</h6>
                                    <a href="https://nicepage.one" class="u-btn u-btn-rectangle u-button-style u-none u-text-palette-1-base u-btn-3">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-palette-2-light-3 u-repeater-item u-video-cover u-list-item-4">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-7">
                            <img src="{{ asset('assets/css/images/erw.jpg') }}" class="u-expanded-width u-image u-image-default u-image-3">
                            <div class="u-align-center u-container-style u-expanded-width u-group u-video-cover u-group-4">
                                <div class="u-container-layout u-valign-top u-container-layout-8">
                                    <h4 class="u-custom-font u-font-oswald u-text u-text-default u-text-8">Summer Dress</h4>
                                    <h6 class="u-text u-text-9">$23.00</h6>
                                    <a href="https://nicepage.com/c/art-design-website-templates" class="u-btn u-btn-rectangle u-button-style u-none u-text-palette-1-base u-btn-4">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="u-text u-text-default u-text-10">Images from <a href="https://www.freepik.com/free-photos-vectors/people" target="_blank">Freepik</a>
            </p>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

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
                            toastr.success('Product added to cart.', 'Success');
                        },
                        error: function(data) {
                            toastr.error('Error adding product to cart.', 'Error');
                        }
                    });
                });
            });
        </script>

    </section>
    <section class="u-clearfix u-section-2" id="sec-9560">
        <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>
    <section class="u-align-center u-clearfix u-image u-shading u-section-3" src="" data-image-width="256" data-image-height="256" id="sec-bf86">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h1 class="u-text u-text-default u-title u-text-1">INTUITIVE</h1>
            <p class="u-large-text u-text u-text-default u-text-variant u-text-2">Sample text. Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices.</p>
            <a href="#" class="u-btn u-button-style u-palette-2-base u-btn-1">Read More</a>
        </div>
    </section>
    <section class="u-clearfix u-section-4" id="sec-bdc6">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="400" data-image-height="265">
                            <div class="u-container-layout u-container-layout-1"></div>
                        </div>
                        <div class="u-container-align-center u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                            <div class="u-container-layout u-valign-middle u-container-layout-2">
                                <h2 class="u-align-center u-text u-text-default u-text-1">Sample Headline</h2>
                                <p class="u-align-center u-text u-text-default u-text-2">Sample text. Click to select the Text Element.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-cc8f">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
        </div>
    </footer>
    <section class="u-backlink u-clearfix u-grey-80">
        <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
            <span>Website Templates</span>
        </a>
        <p class="u-text">
            <span>created with</span>
        </p>
        <a class="u-link" href="" target="_blank">
            <span>Website Builder Software</span>
        </a>.
    </section>
    <script src="{{asset ('assets/dist/js/intlTelInput.min.js') }}"></script>
    <script src="{{asset ('assets/dist/js/utils.js') }}"></script>
    <script src="{{asset ('assets/dist/js/nicepage.js') }}"></script>
    <script src="{{asset ('assets/dist/js/jquery.js') }}"></script>



</body>

</html>