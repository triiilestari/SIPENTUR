@extends('user.layout.home')

@section('title','Detail Gedung')
@section('content')

<section id="cart_items mb-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bayar</li>
            </ol>
        </nav>
        
        
        
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Keterangan</p>
                        <form>
                            <input disabled type="text" value="Nama">
                            <input disabled type="text" value="Gedung">
                            <input disabled type="text" value="Mulai Sewa">
                            <input disabled type="text" value="Selesai">
                            <input disabled type="text" value="Harga /Hari">
                            <input disabled type="text" value="Durasi (Hari)">
                            <input disabled type="text" value="Total Pembayaran">
                        </form>
                        
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p> Data Pemesanan</p>
                        <div class="form-one">
                            @php
                            $datetime1 = new DateTime($data->day_over);
                            $datetime2 = new DateTime($data->day_start);
                            $selisih = $datetime1->diff($datetime2);
                            // dd($selisih->days)
                            @endphp
                            <form action="{{url('bayar')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <input disabled type="text" name="nama" value="{{\DB::table('users')->where('id', $data->id_loaner)->value('name')}}">
                                <input disabled type="text" name="gedung" value="{{\DB::table('buildings')->where('id', $data->id_building)->value('name_building')}}">
                                <input disabled type="text" name="awal_sewa" value="{{date('d-m-Y', strtotime($data->day_start))}}">
                                <input disabled type="text" name="akhir_sewa" value="{{date('d-m-Y', strtotime($data->day_over))}}">
                                <input disabled type="text" name="harga" value="{{number_format(\DB::table('buildings')->where('id', $data->id_building)->value('cost'))}}">
                                <input disabled type="text" name="durasi" value="{{$selisih->days + 1}}">
                                <input disabled type="text" name="total" value="{{number_format(\DB::table('buildings')->where('id', $data->id_building)->value('cost') * ($selisih->days + 1))}}">
                                
                            </form>
                            {{-- <a class="btn btn-primary" href="">Get Quotes</a> --}}
                        </div>
                        <div class="form-two">
                            <form action="{{url('bayar')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <p>Pembayaran</p>
                                <input type="text" name="bayar" placeholder="Nominal" required>
                                <label for="">Bukti Transafer</label>
                                <input type="file" name="bukti_tf" required>
                                <button type="submit" class="btn btn-primary">Pesan</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</section> <!--/#cart_items-->


@endsection