@extends('layouts.main')

@section('title','SIPENTUR | Detail Data Gedung')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">DETAIL DATA GEDUNG</div>
<br>
<br>
@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

@foreach ($gedung as $gedung)
<div class="x_panel">
  <div class="accordion">
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <div class="col">
            <tr>
              <td>                
                <button class="btn btn-primary collapsed" type="button" data-toggle="collapse"
                  data-target="#collapse{{ $gedung->id }}" aria-expanded="false" aria-controls="collapseThree">
                  Gedung {{ $gedung->name_building }}
                </button>
              </td>
              <td>
                @if ( $gedung->submission==1 && $gedung->verif==0 && $gedung->edit==0)
                Belum terverifikasi
                @elseif($gedung->verif == 1 && $gedung->submission == 0 && $gedung->edit == 0)
                Terverifikasi 
                @elseif($gedung->verif == 0 && $gedung->submission == 0 && $gedung->edit == 1)
                Pengeditan
                @elseif($gedung->verif == 0 && $gedung->submission == 0 && $gedung->edit == 0)
                Pengajuan Pengeditan
                @endif
              </td>
            </tr>
          </div>



        </h2>
      </div>
      <div id="collapse{{ $gedung->id }}" class="collapse" aria-labelledby="headingThree"
        data-parent="#accordionExample">
        <div class="card-body">
          <div class="x_content">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Nama Gedung</th>
                  <td>: {{$gedung->name_building}}</td>

                <tr>
                  <th scope="row">Alamat Gedung</th>
                  <td>: {{$gedung->address_building}}</td>

                </tr>
                <tr>
                  <th scope="row">Kapasitas</th>
                  <td>: {{$gedung->capacity}}</td>


                </tr>
                <tr>
                  <th>Biaya/hari </th>
                  <td>: {{$gedung->cost}}</td>

                <tr>
                  <th scope="row">Keterangan</th>
                  <td>: {{$gedung->description}}</td>

                </tr>
                <tr>
                  <th scope="row">Kriteria</th>
                  <td>: {{$gedung->criteria}}</td>

                </tr>
                <tr>
                  <th scope="row">Status Verifikasi</th>
                  <td>:
                    @if ($gedung->verif == 0 && $gedung->submission == 1)
                    Belum diverifikasi
                    @elseif($gedung->verif == 1 && $gedung->submission == 0 && $gedung->edit == 0)
                    Terverifikasi
                    @elseif($gedung->verif == 0 && $gedung->submission == 0 && $gedung->edit == 1)
                    Pengeditan
                    @endif
                  </td>
                  <td> </td>
                  <td> </td>
                </tr>
              </tbody>
            </table>
            <br>
            <h2>Verifikasi Data Gedung {{$gedung->name_building}}</h2>
            <form method="post" action="/admin.showgedung/{{$gedung->id}}" enctype="multipart/form-data">
              @method('patch')
              @csrf
              <div class="form-group">
                <select value="{{$gedung->criteria}}" name="Kriteria" id="Kriteria">
                  <option value="vip">VIP</option>
                  <option value="sedang">Sedang</option>
                  <option value="rendah">Rendah</option>
                </select>
              </div>
              <div class="form-group">
                <input id="Verifikasi" type="radio" name="Verifikasi" value="0"> Belum / Tidak diverifikasi<br>
                <input id="Verifikasi" type="radio" name="Verifikasi" value="1"> Terverifikasi<br>
              </div>
            </form>

            <div class="col-md-12profile_details">
              <div class="profile_view">
                <div class="col-sm-12">
                  <h4 class="brief"><i></i></h4>
                  <div class="left col-xs-12">
                    <div class="col-xs-6 col-sm-6 emphasis">
                      <a href="/admin.indexgedung" class="btn btn-primary">Cancel </a>
                      <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Verifikasi</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<hr>
@endforeach
@endsection