<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
    
    <script src="{{ asset('user/js/html5shiv.js') }}"></script>
    <script src="{{ asset('user/js/respond.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('user/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('user/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('user/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('user/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('user/images/ico/apple-touch-icon-57-precomposed.png') }}">
    
    <title>@yield('title')</title>
</head>
<body>
    
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right clearfix nav navbar-nav">
                            
                        </div>
                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                
                                <li>
                                    <ul class="nav navbar-nav navbar-right">
                                        @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        
                                        @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                        @endif
                                        
                                        

                                        @else
                                        <li class="nav-item dropdown">
                                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <img src="images/img.jpg" alt="">@yield('akun')
                                            <span class=" fa fa-chevron-down"> {{ Auth::user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                            <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right">
                                                </i>{{ __('Logout') }}</a></li>
                                            </ul>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            
                                        </li>
                                        @endguest
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
        
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                {{-- @include('user.layout.navbar') --}}
                                @guest
                                <li><a href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="{{ url('/sewa') }}"><i class="fa fa-shopping-cart"></i> Sewa</a></li>
                                <li><a href="{{ url('/') }}"><i class="fa fa-star"></i> Cari Gedung</a></li> 

                                @else
                                @if (Auth::user()->id_role == 3)
                                <li><a href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="{{ url('/sewa') }}"><i class="fa fa-shopping-cart"></i> Sewa</a></li>
                                <li><a href="{{ url('/') }}"><i class="fa fa-star"></i> Cari Gedung</a></li> 
                                @endif
                                @if (Auth::user()->id_role == 2)
                                <li><a href="{{ url('/home') }}"><i class="fa fa-user"></i> Manage</a></li>
                                @endif
                                @if(Auth::user()->id_role == 1) 
                                <li><a href="{{ url('/home') }}"><i class="fa fa-user"></i> Manage</a></li>
                                
                                @endif
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    

    @include('user.layout.alert')
    
    @yield('content')
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>SI</span>PENTUR</h2>
                            <p>Cepat Aman dan Terpercaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- <div class="footer-widget">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div> --}}
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019 SIPENTUR Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('user/js/jquery.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('user/js/price-range.js') }}"></script>
    <script src="{{ asset('user/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>
</html>
