<head>
  <title> Home - Reminder </title>
  <link rel="shortcut icon" href="{{asset('gambar/lonceng.jpg')}}">
</head>

@extends('layouts.app')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0" align="center"> <b>Dashboard</b> </h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3> {{TotalKendala()}} </h3>
            <p>Total Kendala</p>
          </div>
          <div class="icon">
            <i class="ion-alert-circled"></i>
          </div>
          <a href="{{url('/kendala')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{BelumSelesaiKendala()}}</h3>
            <p>Kendala Belum Selesai</p>
          </div>
          <div class="icon">
            <i class="ion-close-circled"></i>
          </div>
          <a href="{{ url('belum_selesai')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3> {{SelesaiKendala()}} </h3>
            <p>Kendala Sudah Selesai</p>
          </div>
          <div class="icon">
            <i class="ion-checkmark-circled"></i>
          </div>
          <a href="{{url('/kendala')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection
