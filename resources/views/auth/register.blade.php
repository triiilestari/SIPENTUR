<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIPENTUR | Registrasi</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet">

    <!-- ESHOPPER -->
    <link href="{{ asset('assets/eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/eshopper/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/eshopper/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/eshopper/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('assets/eshopper/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>
<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> 085150021000</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> sipentur@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->	
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
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="login-form"><!--login form-->
						<h2>Registrasi to SIPENTUR</h2>
						<form action="{{url('user/store')}}" method="post">
                                @csrf
                                <input type="text"  class="form-control-user @error('name') is-invalid @enderror" name="name" placeholder="Name"/>
                                @error('name') <div class="invalid-feedback">{{$message}}</div> @enderror
                                <input type="text" name="user_address" placeholder="User Address"/>
                                @error('user_address') <div class="invalid-feedback">{{$message}}</div> @enderror
                                <input type="text" name="email" placeholder="Email" />
                                @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
                                <input type="text" name="phone" placeholder="Telphone"/>
                                @error('phone') <div class="invalid-feedback">{{$message}}</div> @enderror
                                <input type="password" name="password" placeholder="Password"/>
                                @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                                
                                <input type="password" name="confirmpassword" placeholder="Confirm Password"/>
                                @error('confirmpassword') <div class="invalid-feedback">{{$message}}</div> @enderror
                            <br>
							<button type="submit" class="btn btn-default">Register</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
        </div>
    <footer id="footer" style="margin-left:0px; margin-top:4cm"><!--Footer-->
        <br>
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
