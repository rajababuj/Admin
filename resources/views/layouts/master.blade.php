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
    @stack('stylesheets');
</head>

<body class="u-body u-xl-mode" data-lang="en">
    @include('layouts.header')
    <section class="u-align-center u-clearfix u-section-1" id="carousel_a0ac">
        @yield('content')
    </section>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->

@stack('scripts')

</html>