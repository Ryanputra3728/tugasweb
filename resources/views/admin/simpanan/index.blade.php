@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data Simpanan Anggota</h2>
        </div>
        <div class="pull-right">
        @can('member-create')
            <a class="btn btn-success" href="{{ URL::to('admin/simpanan/create') }}"> Tambah Simpanan </a>
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Nomor Anggota</th>
     <th>Name</th>
     <th>Tanggal</th>
     <th>Jenis Simpanan</th>
     <th>Jumlah</th>
     <th>Keterangan</th>
     <th width="300px">Action</th>
  </tr>
    @foreach ($data as $dt)
    <tr>
        {{-- <td>{{ ++$i }}</td> --}}
        <td>{{ $dt->member_id }}</td>
        <td>{{ $dt->name }}</td>
        <td>{{ $dt->tanggal }}</td>
        <td>{{ $dt->jenis_simpanan }}</td>
        <td> @currency($dt->jumlah) </td>
        <td>{{ $dt->keterangan }}</td>
        <td>
            
           
                <a class="btn btn-primary" href="{{ URL::to('admin/simpanan/'. $dt->id. "/edit") }}">Edit</a>

                <form action="{{URL::to('admin/simpanan/'. $dt->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                 </form>

        </td>
    </tr>
    @endforeach
</table>

@endsection
