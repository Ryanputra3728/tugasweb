@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Member</h2>
        </div>
        <div class="pull-right">
            {{-- <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back </a> --}}
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Something went wrong.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ URL::to("admin/member")}}" enctype="multipart/form-data" >
  @csrf
     <div class="row">
        <col-md-4>
            <div class="form-group">
                <label class="control-label"> Nomor Anggota <span class="required"> *</span></label>
                <input type="text" class="form-control" name="member_code" value="" required="">
            </div>
        </col-md-4>
     </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label"> Nama Lengkap <span class="required"> *</span></label>
                <input type="text" class="form-control" name="name" value="" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label"> Email <span class="required"> *</span></label>
                <input type="email" class="form-control" name="email" value="" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label"> Password <span class="required"> *</span></label>
                <input type="password" class="form-control" name="password" value="" required="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label"> Nomor Telepon <span class="required"> *</span></label>
                <input type="text" class="form-control" name="phone" value="" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label"> Alamat </label>
                <input type="text" class="form-control" name="address" value="">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label"> Kota </label>
                <input type="text" class="form-control" name="kota" value="">
            </div>
        </div>
        
        <hr>
        
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label"> Photo Profile <span class="required"> *</span></label>
                <input type="file" class="form-control" name="photo" value="" required="">
            </div>
        </div>

        <hr>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label"> No. KTP <span class="required"> *</span></label>
                <input type="text" class="form-control" name="no_ktp" value="" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label"> Photo KTP <span class="required"> *</span></label>
                <input type="file" class="form-control" name="photo_identitas" value="" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label"> Profile Singkat </label>
                <textarea class="form-control" name="profil" value=""></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection