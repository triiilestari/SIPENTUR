@extends('layouts.main')

@section('title','SIPENTUR | PenyewaGedung')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">DATA PENYEWA GEDUNG</div>
<br>
<br>
<div class="x_panel">
    <div class="x_content">
        <table id="datatable" class="table table-striped jambo_table bulk-action">
            <thead>
                <tr class="headings">
                    <th scope="row">No.</th>
                    <th>Nama Gedung</th>
                    <th>Alamat Gedung</th>
                    <th>Harga</th>
                    <th>Pelaksanaan</th>
                    <th>Durasi</th>
                    <th>Total</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($penyewa as $item)
                @php
                    $datetime1 = new DateTime($item->day_over);
                    $datetime2 = new DateTime($item->day_start);
                    $selisih = $datetime1->diff($datetime2);
                    // $namagedung = $data->name_building;
                    // $hargagedung = $data->cost;
                    // dd($namagedung, $hargagedung);
                    // dd($selisih->days)
                @endphp
                <tr>
                <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$item->name_building}}</td>
                    <td>{{$item->address_building}}</td>
                    <td>Rp {{number_format($item->cost)}}</td>
                    <td>
                        <p>Mulai</p>
                        <span><b id="start_date">{{ date('d M Y', strtotime($item->day_start)) }}</b></span>
                        <br>
                        <br>
                        <p>Selesai</p>
                        <span><b id="start_date">{{ date('d M Y', strtotime($item->day_over)) }}</b></span>
                    </td>
                    <td>
                        <span><b>{{$selisih->days + 1}} hari</b></span>
                    </td>
                    <td>Rp {{number_format($item->salary)}}</td>
                    <td>
                        <img src="{{ asset('storage/'. $item->bukti_tf) }}" alt="" width="100px" height="80px">
                    </td>
                    {{-- <td>
                        @if($item->approvement=='proses')
                        Menunggu Verifikasi
                        @endif
                        @if($item->approvement=='verifikasi')
                        Terverifikasi
                        @endif
                    </td> --}}
                    <td>
                        @if ( $item->approvement=='proses')
                        <a href="" class="btn btn-info btn-xs">
                            <i class="fa fa-folder"></i> Verifikasi</a>
                        @endif
                        @if ( $item->approvement=='verifikasi')
                        <a href="" class="btn btn-success btn-xs">
                            <i class="fa fa-folder"></i> Terverifikasi</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection