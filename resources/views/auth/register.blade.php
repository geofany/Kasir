<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/bootstrap-theme.min.css')}}">
    <!-- jquery ui -->
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <!--  -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/zoa-font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/font-family.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/style-main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css/responsive.css')}}">
</head>
<body style="background-image:url('{{url('/img/hero-bg.jpg')}}')">
<!-- push menu-->
<!-- end push menu-->
<header>
    <div class="container space_top_bot_55 delay03" id="menu-header">
        <div class="row flex">
            <div class="col-lg-1 col-md-2 col-sm-6 col-xs-5 logo-top-home1">
                <a href="#"><img style="width: 130px;margin-top: 0px;margin-left: 10px" src="{{asset('img/toko.png')}}" alt=""></a>
            </div>
            <div class="col-lg-8 col-md-7 hidden-sm hidden-xs menu-center-home1">
                <ul class="nav navbar-nav menu-font menu-main">
                    <li class="relative dropdown">
                        <a href="{{url('/')}}" class="link-menu delay03 uppercase">HOME</a>
                        <figure class="line active_line absolute delay03"></figure>

                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-7 text-right icon-main">

                <ul class="nav navbar-nav menu-font menu-main">


                </ul>
            </div>
        </div>
    </div>
</header>
<main>

    <!--  -->
    <div class="container login_page margin_bottom_50" >
        <div class="row" >
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
                <h1 class="title-font text-center capital margin_bottom_50">Register</h1>
                <div class="form-customer des-font">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name" autofocus>

                            {{--Tambahan default laravel--}}
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

                            {{--Tambahan default laravel--}}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input id="hp" type="number" pattern="^[0-9]" class="form-control" name="hp"  required placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Store Name</label>
                            <input id="nama_toko" type="text" class="form-control" name="nama_toko"  required placeholder="Store Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            {{--Tambahan default laravel--}}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                            {{--Tambahan default laravel--}}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="btn-button-group mg-top-30 mg-bottom-15">
                            <button type="submit" class="btn-nixx full-width number-font uppercase">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                    <div class="flex space_top_50 space_bot_30">
                        <a href="{{route('login') }}" class="link-default">Have a Account?</a>
                    </div>
                    <div class="btn-button-group mg-top-30 mg-bottom-15 ">
                        <a style="color: white" href="{{route('login') }}">
                        <button type="submit" class="btn-nixx full-width number-font uppercase">
                            LOGIN
                        </button>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space_bot_40 logo-footer-home2">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left logo-footer clear-space-left">
                    <a href="#" class="inline-block"><img style="width: 100px;margin-top: 6px;margin-left: 60px" src="{{asset('img/toko.png')}}" class="img-responsive" alt=""></a>
                </div>


            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space_bot_40 copy-footer-home2">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left copy clear-space">
                    <p class="des-font copy-text space_top_40">Copyright © 2020. All rights reserved.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right social-footer clear-space">
                    <div class="social-home2 space_top_40">

                    </div>
                </div>

            </div>
        </div>
    </div>

</footer>
</body>


<script src="{{asset('js/js/jquery-3.3.1.min.js')}}" defer=""></script>
<script src="{{asset('js/js/bootstrap.min.js')}}" defer=""></script>

<!-- end -->
<script src="{{asset('js/js/slick.min.js')}}" defer=""></script>
<script src="{{asset('js/js/function-main.js')}}" defer=""></script>
<script src="{{asset('js/js/function-input-number.js')}}" defer=""></script>
<script src="{{asset('js/js/function-select-custom.js')}}" defer=""></script>
</body>
</html>
