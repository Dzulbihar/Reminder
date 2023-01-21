<head>
  <title> Tambah Jenis request - Reminder </title>
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
				<div class="card card-white">
					<div class="card-header">
						<h3 class="card-title"> <b> Tambah Data Jenis request </b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('jenis_request')}}/{{('create')}}" method="POST" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- jenis_request -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis request </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="jenis_request" value="{{old('jenis_request')}}" placeholder="Jenis request" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- Tombol --> 
							<div class="form-group row">
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Simpan
									</button>
									<a href="{{url('jenis_request')}}" class="btn btn-default btn-sm float-sm-right">
										Kembali
									</a>
								</div>
							</div>

						</div>
					</form> 
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->




@stop