<head>
  <title> Detail Kendala - Reminder </title>
  <link rel="shortcut icon" href="{{asset('gambar/lonceng.jpg')}}">
</head>


@extends('layouts.app')

@section('content')

<br>

<!-- Notifikasi --------------------------- -->
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
        <div class="card">

          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab"> Detail Permintaan </a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"> Kirim Email </a></li>
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
                      <a href="#"> {{$kendala->user_entry}} </a>
                    </span>
                    <span class="description"> Tanggal Input - {{$kendala->created_at()}} | Tanggal Update - {{$kendala->updated_at()}} </span>
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

                              <?php 
                                $target = date('d F Y, H:i:s', strtotime($kendala->target));
                                $hari_ini = date('d F Y, H:i:s');
                              ?>

                              @empty ($kendala->target)
                                <a class="badge badge-info">Belum ditentukan</a>
                              @else
                                @if(strtotime($hari_ini) <= strtotime($target)  || $kendala->status == '1' )
                                  {{ date('d F Y, H:i:s', strtotime($kendala->target)) }}
                                @else
                                  <p class="badge badge-danger">Sudah lewat target </p>
                                  <br>
                                  <p class="badge badge-danger"> {{ date('d F Y, H:i:s', strtotime($kendala->target)) }} </p>
                                  <?php 
                                    // echo \Mail::to('ahmad.dzulbihar69@gmail.com')->send(new \App\Mail\Kirim());
                                  ?>
                                @endif
                              @endempty

                            </td>
                          </tr>
                          <tr>
                            <td> Status </td>
                            <td>:</td>
                            <td>
                              @if($kendala->status == 0 )
                                <a class="badge badge-danger">Belum selesai</a>
                              @else
                                <a class="badge badge-success">Selesai</a>
                              @endif
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
                            <embed type="application/pdf" src="{{$kendala->file_pendukung_1()}}" alt="{{ $kendala->file_pendukung_1()}}" width="100%"></embed>
                          @endempty
                          @empty ($kendala->file_pendukung_2)
                          @else
                            <embed type="application/pdf" src="{{$kendala->file_pendukung_2()}}" alt="{{ $kendala->file_pendukung_2()}}" width="100%"></embed>
                          @endempty
                          @empty ($kendala->file_pendukung_3)
                          @else
                            <embed type="application/pdf" src="{{$kendala->file_pendukung_3()}}" alt="{{ $kendala->file_pendukung_3()}}" width="100%"></embed>
                          @endempty
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                  </div>

                </div>
                <!-- /.post -->

                <!-- The timeline -->
                <div class="timeline timeline-inverse">

                  <!-- komentar -->
                  @foreach($kendala_detail as $detail)
                  <div>
                    <i class="fas fa-user bg-info"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i>
                        {{$detail->created_at->diffForHumans()}}
                      </span>
                      <h3 class="timeline-header">
                        <a href="#"> {{$detail->user_entry}} </a>
                      </h3>

                      <div class="timeline-body">
                        {{$detail->komentar}}
                        @empty ($detail->file_pendukung)
                        @else
                          <embed type="application/pdf" src="{{$detail->file_pendukung()}}" alt="{{ $detail->file_pendukung()}}" width="100%"></embed>
                        @endempty
                      </div>

                      @if(auth()->user()->name == $detail->user_entry)
                      <!-- <div class="timeline-footer">
                        <a href="{{url('kendala')}}/{{$kendala->id}}/{{$detail->id}}/{{('komentar_edit')}}" class="btn btn-warning btn-flat btn-sm">
                          Edit
                        </a>
                        <a href="{{url('kendala')}}/{{$kendala->id}}/{{$detail->id}}/{{('komentar_delete')}}" class="btn btn-danger btn-flat btn-sm" onclick="return confirm('Yakin mau dihapus ?')">
                          Delete
                        </a>
                      </div> -->
                      @endif

                      <form action="{{url('kendala')}}/{{$kendala->id}}/{{('komentar')}}" method="POST" enctype="multipart/form-data" style="padding-left:0.5em; padding-right: 0.5em;">
                      {{csrf_field()}}
                        <input type="hidden" name="parent" value="{{$detail->id}}">
                        <input type="hidden" name="user_entry" value="{{ Auth::user()->name }}">
                        <input class="form-control form-control-sm mb-3" type="text" name="komentar" autocomplete="off" placeholder="Type a comment">
                        <!-- Tombol --> 
                      </form>
                      <hr>

                      @foreach($detail->childs as $child)
                        <span class="time"><i class="far fa-clock"></i>
                          {{$child->created_at->diffForHumans()}}
                        </span>
                        <h3 class="timeline-header" >
                          <a href="#"> {{$child->user_entry}} </a> : {{$child->komentar}} 
                          <div class="timeline-body">
                            @empty ($child->file_pendukung)
                            @else
                              <embed type="application/pdf" src="{{$child->file_pendukung()}}" alt="{{ $child->file_pendukung()}}" width="100%"></embed>
                            @endempty
                          </div>
                        
                        @if(auth()->user()->name == $child->user_entry)
                          <!-- <a href="{{url('kendala')}}/{{$kendala->id}}/{{$child->id}}/{{('komentar_edit')}}" class="btn btn-warning text-white btn-flat btn-xs">
                            Edit
                          </a>
                          <a href="{{url('kendala')}}/{{$kendala->id}}/{{$child->id}}/{{('komentar_delete')}}" class="btn btn-danger btn-flat btn-xs" onclick="return confirm('Yakin mau dihapus ?')">
                            Delete
                          </a> -->
                        @endif
                        </h3>
                      @endforeach

                    </div>
                  </div>
                  @endforeach
                  <!-- END komentar -->

                  <!-- form -->
                  <div>
                    <i class="fas fa-comments bg-warning"></i>
                    <div class="timeline-item">
                      <div class="timeline-body">
                        <form action="{{url('kendala')}}/{{$kendala->id}}/{{('komentar')}}" method="POST" enctype="multipart/form-data" >
                        {{csrf_field()}}
                          <input type="hidden" name="parent" value="0">
                          <input type="hidden" name="user_entry" value="{{ Auth::user()->name }}">
                          <div class="row">
                          <div class="col-md-10">                          
                          <input class="form-control form-control-sm" type="text" name="komentar" autocomplete="off" placeholder="Type a comment">
                          </div> 
                          <div class="col-md-2">     
                          <input class="form-control form-control-sm" type="file" name="file_pendukung">
                          </div>
                          </div>
                        </form> 
                      </div>
                    </div>
                  </div>
                  <!-- END form -->

                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="{{ url('kendala') }}/{{$kendala->id}}/{{('send_email')}}" method="post">
                @csrf
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kamu</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" placeholder="Nama Kamu" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email Tujuan</label>
                    <div class="col-sm-10">
                      <select name="email" class="form-control select2" style="width: 100%;">
                        @foreach($users as $user)
                        <option value="{{$user->email}}">
                          {{$user->email}} - [{{$user->name}}]
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Isi Pesan</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" name="email_body" placeholder="Tulis pesan disini ..." required></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-success btn-sm">
                        Kirim Email 
                      </button>
                    </div>
                  </div>
                </form>
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




