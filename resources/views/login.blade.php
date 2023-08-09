<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <link rel="stylesheet" href="{{ asset('assets\css\material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-regular.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-italic.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-900.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-800italic.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-800.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-700italic.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-700.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-600.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-500italic.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-500.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-300italic.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\poppins\poppins-v5-latin-300.svg') }}">



    <link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"> 



    <style>
        .error {
            color: red;
        }
    </style>
    <meta name="robots" content="noindex, follow">
    <script nonce="a99929a1-07dc-4a38-a000-8981e4851a55">
        (function(w, d) {
            ! function(j, k, l, m) {
                j[l] = j[l] || {};
                j[l].executed = [];
                j.zaraz = {
                    deferred: [],
                    listeners: []
                };
                j.zaraz.q = [];
                j.zaraz._f = function(n) {
                    return function() {
                        var o = Array.prototype.slice.call(arguments);
                        j.zaraz.q.push({
                            m: n,
                            a: o
                        })
                    }
                };
                for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                j.zaraz.init = () => {
                    var q = k.getElementsByTagName(m)[0],
                        r = k.createElement(m),
                        s = k.getElementsByTagName("title")[0];
                    s && (j[l].t = k.getElementsByTagName("title")[0].text);
                    j[l].x = Math.random();
                    j[l].w = j.screen.width;
                    j[l].h = j.screen.height;
                    j[l].j = j.innerHeight;
                    j[l].e = j.innerWidth;
                    j[l].l = j.location.href;
                    j[l].r = k.referrer;
                    j[l].k = j.screen.colorDepth;
                    j[l].n = k.characterSet;
                    j[l].o = (new Date).getTimezoneOffset();
                    if (j.dataLayer)
                        for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                ...x[1],
                                ...y[1]
                            })), {}))) zaraz.set(w[0], w[1], {
                            scope: "page"
                        });
                    j[l].q = [];
                    for (; j.zaraz.q.length;) {
                        const z = j.zaraz.q.shift();
                        j[l].q.push(z)
                    }
                    r.defer = !0;
                    for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith("_zaraz_"))).forEach((B => {
                        try {
                            j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                        } catch {
                            j[l]["z_" + B.slice(7)] = A.getItem(B)
                        }
                    }));
                    r.referrerPolicy = "origin";
                    r.src = "../../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                    q.parentNode.insertBefore(r, q)
                };
                ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <div class="main">

        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <img src="{{ asset('assets/css/images/signin-image.jpg') }}">
                        <a href="register" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" action="{{ route('login.submit') }}" class="login-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email" />
                                @if (session('message'))
                                <div class="alert" style="color: red;">{{ session('message') }}</div>
                                @endif
                                <!-- @if($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                                @endif -->
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Your Password" />
                                <!-- @if($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                                @endif -->
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="{{ url('authorized/google') }}"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{asset ('assets/css/main.js') }}"></script>
    <script src="{{asset ('assets/css/jquery.min.js') }}"></script>
    <script src="{{asset ('assets/css/zaraz/sd0d9.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7ed288bacc7aa762","version":"2023.7.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $("#login-form").validate({
                // Specify validation rules
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    email: {
                        required: "This email field is required.",
                        email: "Please enter a valid email address.",
                       
                    },
                    password: {
                        required: "This password field is required.",
                        minlength: "Password must be at least 9 characters long."
                    },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                }

            });
        });
    </script>
</body>


<!-- Mirrored from colorlib.com/etc/regform/colorlib-regform-7/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jul 2023 05:38:06 GMT -->

</html>