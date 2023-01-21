<head>
  <title> Kendala - Reminder </title>
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
            <h3 class="card-title"> 
              <b><a href="{{url('kendala')}}" class="text-dark"> Data Kendala </a></b> &nbsp;&nbsp;
            </h3>
            <br><hr>
            <form action="{{url('/kendala/jenis')}}" method="GET">
              <a class="card-title float-left">  
              <select type="text" name="jenis" class="btn btn-default btn-sm">
                @foreach($jenis_request as $ka)
                  <option>
                    {{$ka->jenis_request}}
                  </option>
                @endforeach
              </select>
              <input type="submit" value="Jenis request" class="btn btn-default btn-sm">
              <?php 
                if(isset($_GET['jenis'])){
                 $jenis = $_GET['jenis']; 
                 }
              ?>  &nbsp;&nbsp;
              </a>
            </form>
            <a href="{{ url('target')}}" class="btn btn-default btn-sm float-right">
              <i class="far fa-clock"></i>
              Lewat Target 
            </a> 
            <form action="{{url('/kendala/kategori')}}" method="GET">
              <a class="card-title float-left">
              <select type="text" name="cari_kategori" class="btn btn-default btn-sm">
                @foreach($kategori as $ka)
                  <option>
                    {{$ka->kategori}}
                  </option>
                @endforeach
              </select>
              <input type="submit" value="Kategori" class="btn btn-default btn-sm">
              <?php 
                if(isset($_GET['cari_kategori'])){
                 $cari_kategori = $_GET['cari_kategori'];
                 }
              ?>
              </a>
            </form>
            <a class="float-right">
              &nbsp;&nbsp;
            </a> 
            <a href="{{ url('belum_selesai')}}" class="btn btn-default btn-sm float-right">
              <i class="fa fa-times"></i>
              Belum Selesai 
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Tanggal input </th>
                  <th> Tanggal update </th>
                  <th> User Entry </th>
                  <th> Jenis request </th>
                  <th> Kategori </th>
                  <th> Permintaan </th>
                  <th> Keterangan tambahan dari Admin </th>
                  <th> Target </th>
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
                @foreach($kendala as $kt)
                @if($kt->status == '0')
                <tr>
                  <th>{{ $nomer++}}</th>
                  <td>
                    {{ date('d F Y, H:i:s', strtotime($kt->created_at)) }}
                  </td>
                  <td>
                    {{ date('d F Y, H:i:s', strtotime($kt->updated_at)) }}
                  </td>
                  <td>{{ $kt->user_entry}} </td>
                  <td>{{ $kt->jenis_request}} </td>
                  <td> {{ $kt->kategori}} </td>
                  <td> {{ $kt->keterangan}} </td>
                  <td>
                    @empty ($kt->keterangan1)
                      <a class="badge badge-info">Belum ada tambahan</a>
                    @else
                      {{ $kt->keterangan1}}
                    @endempty
                  </td>
                  <td>
                    <?php 
                      $target = date('d F Y, H:i:s', strtotime($kt->target));
                      $hari_ini = date('d F Y, H:i:s');
                    ?>
                    @empty ($kt->target)
                      <a class="badge badge-info">Belum ditentukan</a>
                    @else
                      @if(strtotime($hari_ini) <= strtotime($target) || $kt->status == '1' )
                        {{ date('d F Y, H:i:s', strtotime($kt->target)) }}
                      @else
                        <p class="badge badge-danger">Sudah lewat target </p>
                        <br>
                        <p class="badge badge-danger"> {{ date('d F Y, H:i:s', strtotime($kt->target)) }} </p>
                        <?php 
                          // echo \Mail::to('ahmad.dzulbihar69@gmail.com')->send(new \App\Mail\Kirim());
                        ?>
                      @endif
                    @endempty
                  </td>
                  <td>
                    @if($kt->status == 0 )
                      <a class="badge badge-danger">Belum selesai</a>
                    @else
                      <a class="badge badge-success">Selesai</a>
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('kendala') }}/{{$kt->id}}/{{('detail')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-folder"></i>
                      Detail
                    </a>
                    <a href="{{ url('kendala') }}/{{$kt->id}}/{{('edit')}}" class="btn btn-warning text-white btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                    <a href="{{ url('kendala') }}/{{$kt->id}}/{{('alasan_delete')}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">
                      <i class="fa fa-trash"></i>
                        Delete
                    </a>
                  </td>
                </tr>
                @endif
                @endforeach  
              </tbody>
            </table>

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
