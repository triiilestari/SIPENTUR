@extends('layouts.main')

    @section('title','SIPENTUR | Sewa Gedung')

    @section('container')
        <div style="text-align: center; font-family: Bookman Old Style; font-size:30px">Sewa Gedung</div>
        <br>
        <br>
        @foreach( $gedung as $gedung )
        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
            <div class="well profile_view">
              <div class="col-sm-12">
              <h4 class="brief"><i>Gedung : {{$gedung->NamaGedung}}</i></h4>
                <div class="left col-xs-7">
                  <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Alamat : {{$gedung->AlamatGedung}}  </li>
                    <li><i class="fa fa-phone"></i> Phone #: </li>
                  </ul>
                </div>
                <div class="right col-xs-5 text-center">
                  <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                </div>
              </div>
              <div class="col-xs-12 bottom text-center">
                <div class="col-xs-12 col-sm-6 emphasis">
                </div>
                <div class="col-xs-12 col-sm-12 emphasis">
                  <a href="/masyarakat.createsewa/{{ $gedung->id }}" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> Sewa Gedung</a>
                  <a href="/masyarakat.showgedung/{{ $gedung->id }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Detail Gedung</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
    @endsection