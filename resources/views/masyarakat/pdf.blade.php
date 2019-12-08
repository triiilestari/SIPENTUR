<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>SIPENTUR | Bukti</title>
</head>
<body>
    <center>
    <h2 class="title text-center">BUKTI PENYEWAAN</h2>
    </center>
    @foreach ($checkout as $item)
    @php
    $datetime1 = new DateTime($item->day_over);
    $datetime2 = new DateTime($item->day_start);
    $selisih = $datetime1->diff($datetime2);
    // dd($selisih->days)
    @endphp
    <center>
    <p><b>Detail Sewa</b></p>
    </center>
   <div style="margin-left:4cm">
    <table>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td>Nama Penyewa</td>
            <td> </td>
            <td> </td>
            <td>:</td>
            <td></td>
            <td><input disabled type="text" value="{{$item->name}}"></td>
        </tr>
        <tr>
                <td> </td>
                <td> </td>
                <td> </td>
            <td>Alamat Penyewa</td>
            <td> </td>
            <td> </td>
            <td>:</td>
            <td></td>
            <td><input disabled type="text" value="{{$item->user_address}}"></td>
        </tr>
        <tr>
                <td> </td>
                <td> </td>
                <td> </td>
            <td>Email Penyewa</td>
            <td> </td>
            <td> </td>
            <td>:</td>
            <td></td>
            <td><input disabled type="text" value="{{$item->email}}"></td>
        </tr>
        <tr>
                <td> </td>
                <td> </td>
                <td> </td>
            <td>Telphone Penyewa</td>
            <td> </td>
            <td> </td>
            <td>:</td>
            <td></td>
            <td><input disabled type="text" value="{{$item->phone}}"></td>
        </tr>
    <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td>Nama Gedung</td>
        <td> </td>
        <td> </td>
        <td>:</td>
        <td></td>
        <td><input disabled type="text" value="{{$item->name_building}}"></td>
    </tr>
    <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        <td>Alamat Gedung</td>
        <td> </td>
        <td> </td>
        <td>:</td>
        <td></td>
        <td><input disabled type="text" value="{{$item->address_building}}"></td>
    </tr>
    <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        <td>Harga Sewa</td>
        <td> </td>
        <td> </td>
        <td>:</td>
        <td></td>
        <td><input disabled type="text" value="Rp {{ number_format($item->cost)}}"></td>
    </tr>
    <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td>Mulai Sewa</td>
        <td> </td>
        <td> </td>
        <td>:</td>
        <td></td>
        <td><input disabled type="text" value="{{date('d M Y', strtotime($item->day_start))}}"></td>
    </tr>
    <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        <td>Selesai Sewa</td>
        <td> </td>
        <td> </td>
        <td>:</td>
        <td></td>
        <td><input disabled type="text" value="{{date('d M Y', strtotime($item->day_over))}}"></td>
    </tr>
    <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        <td>Durasi</td>
        <td> </td>
        <td> </td>
        <td>:</td>
        <td></td>
        <td><input disabled type="text" value="{{$selisih->days + 1}} hari"></td>
    </tr>
    <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        <td>Total</td>
        <td> </td>
        <td> </td>
        <td>:</td>
        <td></td>
        <td><input disabled type="text" value="Rp {{number_format($item->salary)}}"></td>
    </tr>
    <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        <td>Tanggal Pembayaran</td>
        <td> </td>
        <td> </td>
        <td>:</td>
        <td></td>
        <td><input disabled type="text" value="{{date('d M Y', strtotime($item->day_payment))}}"></td>
    </tr>
</table>
</div>
@endforeach     

<div>

</div>
<br>
<br>
<br>
<br>

                            
                            <h2><span>SI</span>PENTUR</h2>
                            <p>Cepat Aman dan Terpercaya</p>
                            <p>Telpon : 085150021000</p>
							<p>Email  : sipentur@gmail.com</p>
                        </div>
                    <p class="pull-left">Copyright © 2019 SIPENTUR Inc. All rights reserved.</p>
</body>
</html>