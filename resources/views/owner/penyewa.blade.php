<div class="x_panel">
        <div class="">
        <h1>Gedung {{$gedung->NamaGedung}}</h1>
        <div class="x_content">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>Nama Gedung</th>
                <td>: {{$gedung->NamaGedung}}</td>
                <td> </td>
                <td> </td>
              <tr>
                <th scope="row">Alamat Gedung</th>
                <td>: {{$gedung->AlamatGedung}}</td>
                <td> </td>
                <td> </td>
              </tr>
              <tr>
                <th scope="row">Kapasitas</th>
                <td>: {{$gedung->Kapasitas}}</td>
                <td> </td>
                <td> </td>
              </tr>
              <tr>
                <th>Biaya/hari </th>
                <td>: {{$gedung->Biaya}}</td>
                <td> </td>
                <td> </td>
                <tr>
                <th scope="row">Keterangan</th>
                <td>: {{$gedung->Keterangan}}</td>
                <td> </td>
                <td> </td>
                </tr>
                <tr>
                <th scope="row">Kriteria</th>
                <td>: {{$gedung->Kriteria}}</td>
                <td> </td>
                <td> </td>
                </tr>
                <tr>
                <th scope="row">Status Verifikasi</th>
                <td>: @if ($gedung->Verifikasi == 0)
                        Belum diverifikasi
                        @elseif($gedung->Verifikasi == 1)
                        Terverifikasi
                        @endif</td>
                        <td> </td>
                <td> </td>
                </tr>
            </tbody>
          </table>

        </div>
    