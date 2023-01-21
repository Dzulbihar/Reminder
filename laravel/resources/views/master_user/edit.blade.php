<head>
  <title> Edit Master User - Reminder </title>
  <link rel="shortcut icon" href="{{asset('gambar/lonceng.jpg')}}">
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
						<h3 class="card-title"> <b>Edit Data Master User</b> </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('master_user') }}/{{$master_user->id}}/{{('update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- role -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Role </label>
								</div>
								<div class="col-md-9">
										<select class="form-control" name="role" required>
										<option disabled>-- Pilih --</option>
										<option value="Admin" @if($master_user->role == 'Admin') selected @endif> Admin </option>
										<option value="User" @if($master_user->role == 'User') selected @endif> User </option>
									</select>
								</div>
							</div>

							<!-- name -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama </label>
								</div>
								<div class="col-md-9">
									<input  type="text" class="form-control" name="name" value="{{ $master_user->name}}" autocomplete="off" autofocus>
								</div>
							</div>

							<!-- name -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Email </label>
								</div>
								<div class="col-md-9">
									<input  type="text" class="form-control" name="email" value="{{ $master_user->email}}" autocomplete="off" autofocus>
								</div>
							</div>

							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/master_user')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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