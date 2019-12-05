@extends('layouts.main')

@section('title','SIPENTUR | Data Gedung')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">Data Gedung</div>
<br>
<br>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="x_panel">
    <div class="x_content">
        <table id="datatable" class="table table-striped jambo_table bulk-action">
            <thead>
                <tr class="headings">
                    <th scope="row">No.</th>

                    <th>Nama Gedung</th>
                    <th>Alamat Gedung</th>
                    <th>Status</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $gedung as $gedung )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gedung->name_building }}</td>
                    <td>{{ $gedung->address_building }}</td>
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

                    <td>


                        @if ( $gedung->submission==1 && $gedung->verif==0 && $gedung->edit==0)
                        <a href="" class="btn btn-info btn-xs" data-toggle="modal"
                            data-target="#verif-{{ $gedung->id }}">
                            <i class="fa fa-folder"></i> Verifikasi</a>

                        @elseif($gedung->verif == 1 && $gedung->submission == 0 && $gedung->edit == 0)
                        <button class="btn btn-success btn-xs">
                            <i class="fa fa-check"></i> Terverifikasi</button>

                        @elseif($gedung->verif == 0 && $gedung->submission == 0 && $gedung->edit == 1)
                        <button href="" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i> Pengeditan</button>
                            
                        @elseif($gedung->verif == 0 && $gedung->submission == 0 && $gedung->edit == 0)
                        <a href="" class="btn btn-warning btn-xs" data-toggle="modal"
                            data-target="#editverif-{{ $gedung->id }}">
                            <i class="fa fa-exclamation"></i> Verifikasi Pengeditan</a>
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalLong">
                            <i class="fa fa-folder">Verifikasi
                        </button> --}}
                        @endif
                    </td>
                    <div class="modal fade" id="verif-{{ $gedung->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Gedung</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.updateverif',$gedung) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="">Nama Gedung</label>
                                            <h2>{{ $gedung->name_building }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat Gedung</label>
                                            <h2>{{ $gedung->address_building }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Gedung</label>
                                            <h2>{{ $gedung->cost }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fasilitas Gedung</label>
                                            <div class="row">
                                                @if ($gedung->ac==1)
                                                <div class="col-sm-3">
                                                    <p>AC</p>
                                                </div>
                                                @endif
                                                @if ($gedung->proyektor==1)
                                                <div class="col-sm-3">
                                                    <p>Proyektor</p>
                                                </div>
                                                @endif
                                                @if ($gedung->toilet==1)
                                                <div class="col-sm-3">
                                                    <p>Toilet</p>
                                                </div>
                                                @endif
                                                @if ($gedung->rganti==1)
                                                <div class="col-sm-3">
                                                    <p>Ruang Ganti</p>
                                                </div>
                                                @endif
                                                @if ($gedung->podium==1)
                                                <div class="col-sm-3">
                                                    <p>Podium</p>
                                                </div>
                                                @endif
                                                @if ($gedung->musholla==1)
                                                <div class="col-sm-3">
                                                    <p>Musholla</p>
                                                </div>
                                                @endif
                                                @if ($gedung->parking==1)
                                                <div class="col-sm-3">
                                                    <p>Parkir Luas</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img src="/file/{{ $gedung->files }}" style="width: 200px; height: 200px;"
                                                srcset="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Verifikasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editverif-{{ $gedung->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editverifTitle">Verifikasi Gedung</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.updateverifedit',$gedung) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="">Nama Gedung</label>
                                            <h2>{{ $gedung->name_building }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat Gedung</label>
                                            <h2>{{ $gedung->address_building }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Gedung</label>
                                            <h2>{{ $gedung->cost }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fasilitas Gedung</label>
                                            <div class="row">
                                                @if ($gedung->ac==1)
                                                <div class="col-sm-3">
                                                    <p>AC</p>
                                                </div>
                                                @endif
                                                @if ($gedung->proyektor==1)
                                                <div class="col-sm-3">
                                                    <p>Proyektor</p>
                                                </div>
                                                @endif
                                                @if ($gedung->toilet==1)
                                                <div class="col-sm-3">
                                                    <p>Toilet</p>
                                                </div>
                                                @endif
                                                @if ($gedung->rganti==1)
                                                <div class="col-sm-3">
                                                    <p>Ruang Ganti</p>
                                                </div>
                                                @endif
                                                @if ($gedung->podium==1)
                                                <div class="col-sm-3">
                                                    <p>Podium</p>
                                                </div>
                                                @endif
                                                @if ($gedung->musholla==1)
                                                <div class="col-sm-3">
                                                    <p>Musholla</p>
                                                </div>
                                                @endif
                                                @if ($gedung->parking==1)
                                                <div class="col-sm-3">
                                                    <p>Parkir Luas</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img src="/file/{{ $gedung->files }}" style="width: 200px; height: 200px;"
                                                srcset="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Verifikasi</button>
                                    </div>
                                </form>
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