@extends('layouts.main')

@section('title','SIPENTUR | Data Gedung')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">Data Gedung</div>
<br>
<br>



<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
  TAMBAH DATA +
</button>
@if (session('stay'))
<div class="alert alert-warning">
  {{ session('stay') }}
</div>
@endif
@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Tambah Gedung </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('owner.creategedung') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="building-name">Nama gedung </label>
            <input type="text" name="building_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-address">Alamat gedung </label>
            <input type="text" name="building_address" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-cost">Harga gedung </label>
            <input type="text" name="building_cost" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-name">Kapasitas gedung </label>
            <input type="text" name="building_capacity" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-name">Fasilitas </label>
            <div class="row">
              <div class="col-sm-3">
                <input type="checkbox" name="ac">
                <label for="ac">AC</label>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" name="proyektor">
                <label for="proyektor">Proyektor</label>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" name="podium">
                <label for="podium">Podium</label>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" name="toilet">
                <label for="toilet">Toilet</label>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" name="rganti">
                <label for="rganti">Ruang Ganti</label>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" name="musholla">
                <label for="musholla">Musholla</label>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" name="parking">
                <label for="parking">Parkir Luas</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="building-description">Deskripsi gedung </label>
            <input type="text" name="building_description" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-file">Foto gedung </label>
            <input type="file" name="building_file" class="form-control">
          </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="x_panel">
  <div class="x_content">
    <table id="datatable" class="table table-striped jambo_table bulk-action">
      <thead>
        <tr class="headings">
          <th scope="row">No.</th>
          <th>Nama Gedung</th>
          <th>Alamat Gedung</th>
          <th>Harga</th>
          <th>Kapasitas</th>
          <th>Deskripsi</th>
          <th>Kriteria</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $gedung as $gedung )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $gedung->name_building }}</td>
          <td>{{ $gedung->address_building }}</td>
          <td>{{ $gedung->cost }}</td>
          <td>{{ $gedung->capacity }}</td>
          <td>{{ $gedung->description }}</td>
          <td>
            @if ($gedung->ac + $gedung->podium + $gedung->toilet + $gedung->proyektor + $gedung->rganti +
            $gedung->parking <= 4) Standart @elseif($gedung->ac + $gedung->podium + $gedung->toilet + $gedung->proyektor
              + $gedung->rganti + $gedung->parking <= 5) VIP @else VVIP @endif </td> <td><img
                  src="/file/{{ $gedung->files }}" style="width: 200px; height: 200px " alt=""></td>
          <td>
            @if ($gedung->submission==0 && $gedung->verif==1 && $gedung->edit==0)
            <a href="{{ route('owner.proposeedit',$gedung) }}" class="btn btn-primary">
              Propose For Edit
            </a>
            @endif

            @if ($gedung->submission==1)
            <div class="btn btn-success">
              Waiting Verification
            </div>
            @endif

            @if ($gedung->edit==0 && $gedung->verif==0 && $gedung->submission==0)
            <div class="btn btn-danger">
              Waiting Verification For Edit
            </div>
            @endif

            @if ($gedung->verif==0 && $gedung->edit==1)
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
              data-target="#exampleModal-{{ $gedung->id_building }}">
              Edit
            </button>
            <!-- Modal -->

            @endif
          </td>
          <div class="modal fade" id="exampleModal-{{ $gedung->id_building }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Edit Gedung </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('owner.editgedung',$gedung)}}" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                      <label for="building-name">Nama Gedung </label>
                      <input type="text" name="building_name" class="form-control" required
                        value="{{ $gedung->name_building }}">
                    </div>
                    <div class="form-group">
                      <label for="building-address">Alamat Gedung </label>
                      <input type="text" name="building_address" class="form-control" required
                        value="{{ $gedung->address_building }}">
                    </div>
                    <div class="form-group">
                      <label for="building-cost">Harga Gedung </label>
                      <input type="text" name="building_cost" class="form-control" required value="{{ $gedung->cost }}">
                    </div>
                    <div class="form-group">
                      <label for="building-name">Kapasitas Gedung </label>
                      <input type="text" name="building_capacity" required class="form-control"
                        value="{{ $gedung->capacity }}">
                    </div>
                    <div class="form-group">
                      <label for="building-name">Fasilitas </label>
                      <div class="row">
                        <div class="col-sm-3">
                          <input type="checkbox" name="ac" @if ($gedung->ac==1)
                          checked
                          @endif>
                          <label for="ac">AC</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="checkbox" name="proyektor" @if ($gedung->proyektor==1)
                          checked
                          @endif >
                          <label for="proyektor">Proyektor</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="checkbox" name="podium" @if ($gedung->podium==1)
                          checked
                          @endif >
                          <label for="podium">Podium</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="checkbox" name="toilet" @if ($gedung->toilet==1)
                          checked
                          @endif >
                          <label for="toilet">Toilet</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="checkbox" name="rganti" @if ($gedung->rganti==1)
                          checked
                          @endif>
                          <label for="rganti">Ruang Ganti</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="checkbox" name="musholla" @if ($gedung->musholla==1)
                          checked
                          @endif >
                          <label for="musholla">Musholla</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="checkbox" name="parking" @if ($gedung->parking==1)
                          checked
                          @endif >
                          <label for="parking">Parkir Luas</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="building-description">Deskripsi Gedung </label>
                      <textarea name="building_description" required class="form-control" cols="30"
                        rows="10">{{ $gedung->description }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="building-file">Foto Gedung </label>
                      <input type="file" name="building_file" class="form-control">
                    </div>
                    <img src="/file/{{ $gedung->files }}" style="width: 100px; height: 100px;" alt="">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
  </div>

  </tr>
  @endforeach
  </tbody>
  </table>
</div>
</div>
@endsection