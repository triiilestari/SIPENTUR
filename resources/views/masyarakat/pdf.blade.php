<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIPENTUR | Bukti</title>

    <!-- Bootstrap -->
    {{-- <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
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
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/eshopper/images/ico/apple-touch-icon-57-precomposed.png') }}"> --}}
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
    <h2 class="title text-center">BUKTI PENYEWAAN</h2>
    <br>
    <br>
    <div id="cart_items mb-5">
        <div class="container">
            <div class="col-sm-12">
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-3" style="margin-left:5cm;">
                            <div class="shopper-info">
                                    <p><b>Data Penyewa</b></p>
                                <form>
                                    <input disabled type="text" value="Nama">
                                    <input disabled type="text" value="Alamat">
                                    <input disabled type="text" value="Email">
                                    <input disabled type="text" value="Telphone">
                                </form>
                                
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="shopper-info">
                                <p>Keterangan</p>
                                    @foreach ($checkout as $item)
                                        <form>
                                            <input disabled type="text" value="{{$item->name}}">
                                            <input disabled type="text" value="{{$item->user_address}}">
                                            <input disabled type="text" value="{{$item->email}}">
                                            <input disabled type="text" value="{{$item->phone}}">
                                        </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                    <div class="shopper-informations">
                        <div class="row">
                            <div class="col-sm-3" style="margin-left:5cm;">
                                <div class="shopper-info">
                                        <br>
                                    <p><b>Data Penyewaan</b></p>
                                    <form>
                                        <input disabled type="text" value="Nama Gedung">
                                        <input disabled type="text" value="Alamat Gedung">
                                        <input disabled type="text" value="Harga">
                                        <input disabled type="text" value="Mulai Sewa">
                                        <input disabled type="text" value="Selesai Sewa">
                                        <input disabled type="text" value="Durasi">
                                        <input disabled type="text" value="Total">
                                        <input disabled type="text" value="Tanggal Bayar">
                                    </form>
                                    
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="shopper-info">
                                        <br>
                                    <p>Keterangan</p>
                                        @foreach ($checkout as $item)
                                            @php
                                            $datetime1 = new DateTime($item->day_over);
                                            $datetime2 = new DateTime($item->day_start);
                                            $selisih = $datetime1->diff($datetime2);
                                            // dd($selisih->days)
                                            @endphp
                                            <form>
                                                <input disabled type="text" value="{{$item->name_building}}">
                                                <input disabled type="text" value="{{$item->address_building}}">
                                                <input disabled type="text" value="Rp {{ number_format($item->cost)}}">
                                                <input disabled type="text" value="{{date('d M Y', strtotime($item->day_start))}}">
                                                <input disabled type="text" value="{{date('d M Y', strtotime($item->day_over))}}">
                                                <input disabled type="text" value="{{$selisih->days + 1}} hari">
                                                <input disabled type="text" value="Rp {{number_format($item->salary)}}">
                                                <input disabled type="text" value="{{date('d M Y', strtotime($item->day_payment))}}">
                                            </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div> <!--/#cart_items-->
    </div>

    <footer id="footer" style="margin-left:0px; margin-top:2cm"><!--Footer-->
        <br>
        <div class="footer-top" style="margin-top:-2cm">
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
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('user/js/jquery.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('user/js/price-range.js') }}"></script>
    <script src="{{ asset('user/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script> --}}
</body>
</html>