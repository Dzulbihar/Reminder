<head>
  <title> Edit Email - Reminder </title>
  <link rel="shortcut icon" href="{{asset('cetak/logo_tpks.png')}}">
</head>

@extends('layouts.app')

@section('content')

<br>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-white">
					<div class="card-header">
						<h3 class="card-title"> <b>Edit Data Email</b> </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('email') }}/{{$email->id}}/{{('update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- email -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> email </label>
								</div>
								<div class="col-md-9">
									<input  type="text" class="form-control" name="email" value="{{ $email->email}}" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- subject -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Subject </label>
								</div>
								<div class="col-md-9">
									<input  type="text" class="form-control" name="subject" value="{{ $email->subject}}" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- body -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Isi pesan </label>
								</div>
								<div class="col-md-9">
									<input  type="text" class="form-control" name="body" value="{{ $email->body}}" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- nama -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Pengirim </label>
								</div>
								<div class="col-md-9">
									<input  type="text" class="form-control" name="nama" value="{{ $email->nama}}" required autocomplete="off" autofocus>
								</div>
							</div>

							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/email')}}" class="btn btn-default btn-sm float-right">Kembali</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- /.card -->

		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->




	@stop