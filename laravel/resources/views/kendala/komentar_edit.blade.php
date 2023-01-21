<head>
  <title> Detail Kendala - Reminder </title>
  <link rel="shortcut icon" href="{{asset('gambar/lonceng.jpg')}}">
</head>


@extends('layouts.app')

@section('content')

<br>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
        <div class="card">

          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab"> Detail Permintaan </a></li>
            </ul>
          </div><!-- /.card-header -->

          <div class="card-body">
            <div class="tab-content">

              <div class="active tab-pane" id="timeline">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('gambar/avatar5.png')}}" alt="user image">
                    <span class="username">
                      <a href=""> {{$kendala->user_entry}} </a>
                    </span>
                    <span class="description"> Tanggal Upload - {{$kendala->created_at()}} | Tanggal Update - {{$kendala->updated_at()}} </span>
                  </div>
                  <!-- /.user-block -->

                  <div class="row">
                    <div class="col-md-4">
                      <table class="table" border="0">
                        <tbody>
                          <tr>
                            <td>Jenis request</td>
                            <td>:</td>
                            <td>{{$kendala->jenis_request}}</td>
                          </tr>
                          <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>{{$kendala->kategori}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                      <table class="table" border="0">
                        <tbody>
                          <tr>
                            <td> Target </td>
                            <td>:</td>
                            <td>
                              @empty ($kendala->target)
                                <a class="badge badge-info">Belum ditentukan</a>
                              @else
                                {{$kendala->target()}}
                              @endempty
                            </td>
                          </tr>
                          <tr>
                            <td> Status </td>
                            <td>:</td>
                            <td>
                              @empty ($kendala->status)
                                <a class="badge badge-info">Belum selesai</a>
                              @else
                                {{$kendala->status}}
                              @endempty
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <hr>

                  <p>
                    <b>Permintaan :</b> 
                    {{$kendala->keterangan}}
                  </p>
                  <hr>
                  <p>
                    @empty ($kendala->keterangan1)
                    @else
                    <b>Keterangan tambahan dari Admin :</b> 
                    {{$kendala->keterangan1}}
                    @endempty                    
                  </p>

                  <div class="timeline timeline-inverse">
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <h3 class="timeline-header"> File pendukung </h3>
                        <div class="timeline-body">
                          @empty ($kendala->file_pendukung_1)
                          @else
                            <!-- <img src="{{ $kendala->file_pendukung_1()}}" alt="{{ $kendala->file_pendukung_1()}}" width="30%"> -->
                            <embed type="application/pdf" src="{{$kendala->file_pendukung_1()}}" alt="{{ $kendala->file_pendukung_1()}}" width="30%"></embed>
                          @endempty
                          @empty ($kendala->file_pendukung_2)
                          @else
                            <embed type="application/pdf" src="{{$kendala->file_pendukung_2()}}" alt="{{ $kendala->file_pendukung_2()}}" width="30%"></embed>
                          @endempty
                          @empty ($kendala->file_pendukung_3)
                          @else
                            <embed type="application/pdf" src="{{$kendala->file_pendukung_3()}}" alt="{{ $kendala->file_pendukung_3()}}" width="30%"></embed>
                          @endempty
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                  </div>

                  <form action="{{url('kendala')}}/{{$kendala->id}}/{{$kendala_detail->id}}/{{('komentar_update')}}" method="POST" enctype="multipart/form-data" >
                  {{csrf_field()}}

                    <a class="btn btn-primary btn-sm"> Edit Komentar </a>
                    <a href="{{url('kendala')}}/{{$kendala->id}}/{{('detail')}}" class="btn btn-primary btn-sm"> Kembali </a>

                    <input type="hidden" name="user_entry" value="{{ Auth::user()->name }}">
                    <hr>
                    <input class="form-control form-control-sm" type="text" name="komentar" autocomplete="off" value="{{$kendala_detail->komentar}}" autofocus>
                    <br>

                    <div class="row">
                      <div class="col-md-10">
                        <input class="form-control form-control-sm" type="file" name="file_pendukung">
                      </div>
                      <div class="col-md-2">
                        <embed type="application/pdf" src="{{$kendala_detail->file_pendukung()}}" width="100%"></embed>
                      </div>
                    </div>
                    <br>
                    <!-- Tombol --> 
                    <button type="submit" class="btn btn-primary btn-sm">
                      Simpan
                    </button>
                    <hr>

                  </form> 


                </div>
                <!-- /.post -->


              </div>
              <!-- /.tab-pane -->



            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->



@endsection



