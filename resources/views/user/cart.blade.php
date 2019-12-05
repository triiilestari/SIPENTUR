@extends('user.layout.home')

@section('title','Detail Gedung')
@section('content')

{{-- @dd($hari) --}}
<section id="cart_items">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sewa</li>
            </ol>
        </nav>
        
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>
        
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Gedung</td>
                        <td class="description"></td>
                        <td class="price">Harga</td>
                        <td class="start">Mulai</td>
                        <td class="selesai">selesai</td>
                        <td class="total">Total</td>
                        <td>Hapus</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sewa as $item)
                    <article data-postid="{{ $item->id }}">
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{ asset('file/'. $item->building->files) }}" alt="" width="100px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $item->building->name_building }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>Rp {{ number_format(floatval($item->building->cost)) }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <b id="start_date">{{ date('d-m-Y', strtotime($item->day_start)) }}</b>
                                </div>
                            </td>
                            <td class="mulai">
                                <div class="cart_quantity_button">
                                    <b id="end_date">{{ date('d-m-Y', strtotime($item->day_over)) }}</b>
                                </div>
                                {{--                                    {{ ($item->day_start) - ($item->day_over)  }}--}}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price" id="sumprice"></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="/sewa/{{ $item->id }}/hapus"><i
                                    class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        </article>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                    @php
                                    $datetime1 = new DateTime($item->day_over);
                                    $datetime2 = new DateTime($item->day_start);
                                    $selisih = $datetime1->diff($datetime2);
                                    // dd($selisih->days)
                                    @endphp
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Total</td>
                                        <td><span>Rp {{ number_format(floatval($item->building->cost * ($selisih->days + 1)))}}</span></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Lama penyewaan</td>
                                        <td>{{$selisih->days + 1}} hari</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{'/bayar/'. $item->id}}">
                                                <button class="btn btn-primary">Pesan dan bayar</button>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </section> <!--/#cart_items-->
    @endsection
    