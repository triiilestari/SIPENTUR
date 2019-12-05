@extends('layouts.main')

    @section('title','SIPENTUR | Tambah Data Gedung')

    @section('container')
    <div style="text-align: center; font-family: Bookman Old Style; font-size:30px">TAMBAH DATA GEDUNG</div>
    <br>
    <br>
    <br>
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
    <div class="x_panel">
        <div class="x_title">
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/owner.indexgedung" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NamaGedung">Nama Gedung <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="NamaGedung" required="required" class="form-control col-md-7 col-xs-12" name="NamaGedung">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AlamatGedung">Alamat Gedung <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="AlamatGedung" name="AlamatGedung" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
          
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Biaya">Biaya/hari <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="Biaya" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="Biaya">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Kapasitas">Kapasitas <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="Kapasitas" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="Kapasitas">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="File">Foto <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="File" class="date-picker col-md-7 col-xs-12" required="required" type="file" name="File">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Kapasitas">Keterangan <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="Keterangan" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="Keterangan">
                    </div>
                  </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <br>
                      <a href="/owner.indexgedung" class="btn btn-primary">Cancel</a>
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
    </div>
    </div>

@endsection