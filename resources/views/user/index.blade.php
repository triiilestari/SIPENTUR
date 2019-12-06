@extends('user.layout.home')

@section('title','Beranda')
@section('content')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>SI</span>PENTUR</h1>
                                <h2>Booking gedung keinginanmu</h2>
                                <p>Pilih Gedung terbaik untuk kegiatan mu</p>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('user/images/home/gedung1.jpg') }}" class="girl img-responsive"
                                    alt=""/>
                                    {{-- <img src="{{ asset('user/images/home/pricing.png') }}" class="pricing" alt=""/> --}}
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>SI</span>PENTUR</h1>
                                    <h2>Temukan Lebih Cepat</h2>
                                    <p>Cari Gedung keinginanmu</p>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ asset('user/images/home/gedung2.jpg') }}" class="girl img-responsive"
                                        alt=""/>
                                        {{-- <img src="{{ asset('user/images/home/pricing.png') }}" class="pricing" alt=""/> --}}
                                    </div>
                                </div>
                                
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>SI</span>PENTUR</h1>
                                        <h2>Kemudahan akses</h2>
                                        <p>Jelas, Aman dan Terpercaya</p>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{ asset('user/images/home/gedung3.jpg') }}" class="girl img-responsive"
                                            alt=""/>
                                            {{-- <img src="{{ asset('user/images/home/pricing.png') }}" class="pricing" alt=""/> --}}
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section><!--/slider-->
            
            
            
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 padding-right">
                            <div class="features_items"><!--features_items-->
                                <br>
                                <h2 class="title text-center">Cari Gedung</h2>
                                
                                @foreach($verif as $gedung)
                                <div class="col-sm-4">
                                    <article data-postid="{{ $gedung->id }}">
                                        <div class="product-image-wrapper" >
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:10cm; height:7cm" src="{{ asset('file/'. $gedung->files) }}" alt=""/>
                                                    <h2>Rp {{ number_format($gedung->cost) }} /hari</h2>
                                                    <p><h4>{{$gedung->name_building}}<h4></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Sewa
                                                    </a>
                                                </div>
                                                <a href="/gedung/{{ $gedung->id }}">
                                                    <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2>Rp {{number_format($gedung->cost)}} /hari</h2>
                                                            <p><h4>{{$gedung->name_building}}</h4></p>
                                                            <a href="/gedung/{{ $gedung->id }}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Sewa
                                                            </a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                                @foreach($edit as $gedung)
                                <div class="col-sm-4">
                                    <article data-postid="{{ $gedung->id }}">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:10cm; height:7cm" src="{{ asset('file/'. $gedung->files) }}" alt=""/>
                                                    <h2>Rp {{number_format($gedung->cost) }} /hari</h2>
                                                    <p><h2>{{$gedung->name_building}}</h2></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Sewa</a>
                                                    </div>
                                                    <a href="/gedung/{{ $gedung->id }}">
                                                        <div class="product-overlay">
                                                            <div class="overlay-content">
                                                                <h2>Rp {{ number_format($gedung->cost)}}/hari</h2>
                                                                <p><h4>{{$gedung->name_building}}<h4></p>
                                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Sewa</a>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    
                                </div><!--features_items-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
            @endsection
            
            