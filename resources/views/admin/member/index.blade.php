@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data Member</h2>
        </div>
        <div class="pull-right">
        @can('member-create')
            <a class="btn btn-success" href="{{ URL::to('admin/member/create') }}"> New Member </a>
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
     <th>Nomor Telepon</th>
     <th>Alamat</th>
     <th>Photo</th>
     <th width="300px">Action</th>
  </tr>
    @foreach ($member as $key => $mbr)
    <tr>

        @php
            $i = 0;
        @endphp

        <td>{{ ++$i }}</td>
        <td>{{ $mbr->member_code }}</td>
        <td>{{ $mbr->nama_user }}</td>
        <td>{{ $mbr->phone }}</td>
        <td>{{ $mbr->address }}</td>
        <td>{{ $mbr->kota }}</td>
        <td>
            <img src="{{ asset('images/member/'. $mbr->photo) }}" width="100px">
        </td>
        <td>
            
            @can('member-edit')
                <a class="btn btn-primary" href="{{ URL::to('admin/member/'. $mbr->id. "/edit") }}">Edit</a>
            @endcan

                <form action="{{URL::to('admin/member/'. $mbr->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                 </form>

        </td>
    </tr>
    @endforeach
</table>

{!! $member->render() !!}
@endsection
