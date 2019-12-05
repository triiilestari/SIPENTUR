@extends('layouts.main')

    @section('title','SIPENTUR | Detail Data Gedung')

    @section('container')
        <div style="text-align: center; font-family: Bookman Old Style; font-size:30px">DETAIL DATA GEDUNG</div>
        <br>
        <br>
        <br>
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
            
        <div class="col-md-12profile_details">
            <div class="profile_view">
                <div class="col-sm-12">
                <h4 class="brief"><i></i></h4>
                <div class="left col-xs-12">
                <div class="col-xs-6 col-sm-6 emphasis">
                  <a href="/owner.indexgedung" class="btn btn-primary">Cancel </a>
                  <a href="{{$gedung->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a>
                <form action="{{$gedung->id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </button>
                </form>
                </div>
                </div>
            </div>
            </div>
        </div>
                </div>
        </div>

    @endsection