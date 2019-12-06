@extends('user.layout.home')

@section('title','Detail Gedung')
@section('content')

    <section>
        <article data-postid="{{ $detailGedung->id }}">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $detailGedung->name_building }}</li>
                    </ol>
                </nav>

                <div class="col-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ asset('file/'. $detailGedung->files) }}" alt=""/>
                                {{-- <img src="{{ asset('user/images/product-details/1.jpg') }}" alt=""/> --}}
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                {{-- <img src="images/product-details/new.jpg" class="newarrival" alt=""/> --}}
                                <h2>{{ $detailGedung->name_building }}</h2>
                                {{-- <img src="images/product-details/rating.png" alt=""/> --}}
                                <span>
									<span>Rp {{ number_format(floatval($detailGedung->cost))}}</span>
									{{-- <i>(Cek ketersediaan dulu sebelum menyewa)</i> --}}

								</span>
                                <p><b>Alamat    :</b> {{ $detailGedung->address_building }}</p>
                                <p><b>Kapasitas :</b> {{ $detailGedung->capacity }} orang</p>
                                <p><b>Pemilik   : </b>{{ $detailGedung->user->name}} </p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive"
                                                alt=""/></a>
                                <table>
                                    <tr>
                                        <td>
                                            <b>Mulai sewa</b>
                                        </td>
                                        <td>
                                            <b>Akhir sewa</b>
                                        </td>
                                    </tr>
                                    <form action="{{url('/sewa')}}" method="POST">
                                        @csrf
                                        <input type="text" name="id" value="{{$detailGedung->id}}" style="display: none">
                                        <tr>
                                            <td>
                                                <input type="date" id="start" name="day_start" required>
                                            </td>
                                            <td>
                                                <input type="date" id="end" name="day_over" required>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Sewa
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                </table>

                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                {{-- <li><a href="#tag" data-toggle="tab">Cek ketersediaan</a></li> --}}
                                <li class="active"><a href="#reviews" data-toggle="tab">Deskripsi</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details">
                            </div>

                            {{-- <div class="tab-pane fade" id="tag">
                                <div class="col-sm-6">
                                    <h2>Cek Ketersediaan gedung: </h2>
                                    <form action="">
                                        <input type="date" id="start" class="date">
                                        <input type="submit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div> --}}

                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    <h2>FASILITAS</h2>
                                    <ul>
                                        @if($detailGedung->ac==1)
                                            <li><a href=""><i class="fa fa-star"></i>AC</a></li>
                                        @endif
                                        @if($detailGedung->proyektor==1)
                                            <li><a href=""><i class="fa fa-star"></i>PROYEKTOR</a></li>
                                        @endif
                                        @if($detailGedung->toilet==1)
                                            <li><a href=""><i class="fa fa-star"></i>TOILET</a></li>
                                        @endif
                                        @if($detailGedung->rganti==1)
                                            <li><a href=""><i class="fa fa-star"></i>RUANG GANTI</a></li>
                                        @endif
                                        @if($detailGedung->parking==1)
                                            <li><a href=""><i class="fa fa-star"></i>PARKIR AREA</a></li>
                                        @endif
                                        @if($detailGedung->musholla==1)
                                            <li><a href=""><i class="fa fa-star"></i>MUSHOLLA</a></li>
                                        @endif
                                        @if($detailGedung->podium==1)
                                            <li><a href=""><i class="fa fa-star"></i>PODIUM</a></li>
                                        @endif
                                    </ul>
                                    <h2>Kriteria</h2>
                                    @if ($detailGedung->ac + $detailGedung->podium + $detailGedung->toilet + $detailGedung->proyektor + $detailGedung->rganti +
                                    $detailGedung->parking <= 4) Standart @elseif($detailGedung->ac + $detailGedung->podium + $detailGedung->toilet + $detailGedung->proyektor
                                      + $detailGedung->rganti + $detailGedung->parking <= 5) VIP @else VVIP @endif
                                    {{-- <p>{{ $detailGedung->description }}</p> --}}
                                    <h2>Ulasan gedung</h2>
                                    <p>{{ $detailGedung->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div><!--/category-tab-->
                </div>
            </div>
        </article>
    </section>
@endsection
