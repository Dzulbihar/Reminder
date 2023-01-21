<head>
  <title> kendala_history - Reminder </title>
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
            <!-- Tombol Atas -->
            <h3 class="card-title"> <b> Data Kendala (History delete) </b> &nbsp;&nbsp;</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Aksi </th>
                  <th> Tanggal Hapus </th>
                  <th> Alasan Hapus </th>
                  <th> User Entry </th>
                  <th> Tanggal input </th>
                  <th> Tanggal update </th>
                  <th> User Entry </th>
                  <th> Jenis request </th>
                  <th> Kategori </th>
                  <th> Permintaan </th>
                  <th> Keterangan Tambahan </th>
                  <th> Target </th>
                  <th> Status </th>
                </tr>
              </thead>
              <tbody>
                <!-- Variabel php untuk nomor-->    
                <?php
                  $nomer = 1;
                ?>
                <!-- ambil data di database-->
                @foreach($kendala_history as $kt)
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>
                    <a href="{{ url('kendala') }}/{{$kt->id}}/{{('restore')}}" class="btn btn-info btn-sm">
                      <i class="fa fa-window-restore"></i>
                      Restore
                    </a>
                  </td>
                  <td>{{ $kt->created_at}} </td>
                  <td>{{ $kt->alasan_delete}} </td>
                  <td>{{ $kt->user_delete}} </td>
                  <td>
                    {{ date('d F Y, H:i:s', strtotime($kt->tgl_created_at)) }}
                  </td>
                  <td>
                    {{ date('d F Y, H:i:s', strtotime($kt->tgl_updated_at)) }}
                  </td>
                  <td>{{ $kt->user_entry}} </td>
                  <td>{{ $kt->jenis_request}} </td>
                  <td>{{ $kt->kategori}} </td>
                  <td>{{ $kt->keterangan}} </td>
                  <td>
                    @empty ($kt->keterangan1)
                      <a class="badge badge-info">Belum ada tambahan</a>
                    @else
                      {{ $kt->keterangan1}}
                    @endempty
                  </td>
                  <td>
                    @empty ($kt->target)
                      <a class="badge badge-info">Belum ditentukan</a>
                    @else
                      {{ $kt->target()}}
                    @endempty
                  </td>
                  <td>
                    @empty ($kt->status)
                      <a class="badge badge-info">Belum selesai</a>
                    @else
                      {{ $kt->status}}
                    @endempty
                  </td>
                </tr>
                @endforeach  
              </tbody>
            </table>
            <!-- Button trigger modal -->
            <div>
              <a href="{{url('/kendala')}}/{{('clear')}}" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin mau bersihkan ?')">
                <i class="fa fa-trash"></i>
                Bersihkan
              </a>
              <a href="{{url('/kendala')}}" class="btn btn-default btn-sm">
                <i class="fa fa-undo"></i>
                Kembali
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
