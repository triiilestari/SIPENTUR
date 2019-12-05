@extends('layouts.main')

@section('title','SIPENTUR | Profile')

@section('container')
<div class="">

  @if (session('success'))
      <div class="alert alert-success">
        <p>{{ session('success') }}</p>
      </div>
  @endif
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Profile</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <form class="form-horizontal form-label-left" action="{{ route('owner.update',Auth::user()) }}" method="post"
            novalidate>
            <span class="section">Personal Info</span>
            @csrf
            @method('PATCH')

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name </label>
              <div class="col-md-6 col-sm-6">
                <input id="name" class="form-control" name="name" placeholder="" required="required" type="text"
                  value="{{ Auth::user()->name }}">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email </label>
              <div class="col-md-6 col-sm-6">
                <input type="email" id="email" name="email" required="required" class="form-control"
                  value="{{ Auth::user()->email }}">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Nama Company </label>
              <div class="col-md-6 col-sm-6">
                <input type="text" id="company_name" name="company_name" required="required"
                  value="{{ Auth::user()->company_name }}" class="form-control">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">Alamat </label>
              <div class="col-md-6 col-sm-6">
                <input type="text" id="user_address" name="user_address" required="required"
                  value="{{ Auth::user()->user_address }}" class="form-control">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="website">Nomer Telephone </label>
              <div class="col-md-6 col-sm-6">
                <input type="tel" id="phone" name="phone" required="required" class="form-control"
                  value="{{ Auth::user()->phone }}">
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 offset-md-3">
                <button id="send" type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection