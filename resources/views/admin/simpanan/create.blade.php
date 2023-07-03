@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tamabah Simpanan Anggota</h2>
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

<form method="post" action="{{ URL::to("admin/simpanan")}}" >
  @csrf
     <div class="row">
        <div class= "col-md-4">
            <div class="form-group">
                <label class="control-label"> Nomor Anggota <span class="required"> *</span></label>
                <select name= "member_id" class="form-select">
                    @foreach ($member as $mbr)
                        <option value="{{ $mbr->id }}">{{ $mbr->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label"> Tanggal <span class="required"> *</span></label>
                <input type="date" class="form-control" name="tanggal">
            </div>
        </div>
     </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label"> Jenis Simpanan <span class="required"> *</span></label>
                <select name="jenis_simpanan" class="form-select">
                    <option value="Simpanan Wajib">Simpanan Wajib</option>
                    <option value="Simpanan Pokok">Simpanan Pokok</option>
                    <option value="Simpanan Sukarela">Simpanan Sukarela</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label"> Jumlah <span class="required"> *</span></label>
                <input type="text" class="form-control" name="jumlah">
            </div>
        </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label"> Keterangan <span class="required"> *</span></label>
                <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
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