<head>
  <title> Master User - Reminder </title>
  <link rel="shortcut icon" href="{{asset('gambar/lonceng.jpg')}}">
</head>


@extends('layouts.app')

@section('content')

<!-- Notifikasi --------------------------- -->
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif


<br>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Data Master User </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Role </th>
                  <th> Nama </th>
                  <th> Email </th>
                  <th> Status </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($master_user as $user)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>{{ $user->role}} </td>
                  <td>{{ $user->name}} </td>
                  <td>{{ $user->email}} </td>
                  <td>
                    @if ($user->status == '1')
                      <a class="badge badge-success">Aktif</a>
                    @else
                      <a class="badge badge-danger">Tidak Aktif</a>
                    @endif
                  </td>
                  <td>
                    @if ($user->status == '1')
                    <a href="{{url('/master_user/status/'.$user->id)}}" class="btn btn-danger btn-sm">
                      <i class="fa fa-exclamation-circle"></i>
                      Nonaktifkan
                    </a>
                    @else
                    <a href="{{url('/master_user/status/'.$user->id)}}" class="btn btn-success btn-sm">
                      <i class="fa fa-exclamation-circle"></i>
                      Aktifkan
                    </a>
                    @endif
                    <a href="{{ url('master_user') }}/{{$user->id}}/{{('edit')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                    <a href="{{ url('master_user') }}/{{$user->id}}/{{('delete')}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">
                      <i class="fa fa-trash"></i>
                      Delete
                    </a>
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
            <!-- Button trigger modal -->
            <div>
              <a href="{{url('master_user')}}/{{('add')}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>
                Tambah Data
              </a>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->







@endsection
