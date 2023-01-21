<head>
  <title> Tambah Master User - Reminder </title>
  <link rel="shortcut icon" href="{{asset('gambar/lonceng.jpg')}}">
</head>


@extends('layouts.app')

@section('content')

@if(session('sukses'))
<div class="alert alert-danger" role="alert">
  {{session('sukses')}}
</div>
@endif

{{-- menampilkan error validasi --}}
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<br>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-white">
					<div class="card-header">
						<h3 class="card-title"> <b> Tambah Data Master User </b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('master_user')}}/{{('create')}}" method="POST" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- role -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Role </label>
								</div>
								<div class="col-md-9">
									<select class="form-control" name="role" value="{{ old('role') }}" required>
										<option disabled>-- Pilih --</option>
										<option> Admin </option>
										<option> User </option>
									</select>
								</div>
							</div>

							<!-- name -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Nama </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nama" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- email -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Email </label>
								</div>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- password -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Password </label>
								</div>
								<div class="col-md-9">
									<input type="password" class="form-control kata_sandi" name="password" value="{{old('password')}}" placeholder="Password" required autocomplete="off" autofocus>
								</div>
							</div>

							<!-- password2 -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Ulangi Password </label>
								</div>
								<div class="col-md-9">
									<input type="password" class="form-control kata_sandi @error('password2') is-invalid @enderror" name="password2" value="{{ old('password2') }}" placeholder="wajib di isi ..." required autocomplete="off">
									@error('password2')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<!-- Show password -->
							<div class="form-group row">
								<div class="col-md-3">
									<label>  </label>
								</div>
								<div class="col-md-9">
									<input type="checkbox" class="form-checkbox"> Show password
								</div>
							</div>

							<!-- Tombol --> 
							<div class="form-group row">
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Simpan
									</button>
									<a href="{{url('kategori')}}" class="btn btn-default btn-sm float-sm-right">
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


<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){       
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.kata_sandi').attr('type','text');
			}else{
				$('.kata_sandi').attr('type','password');
			}
		});
	});
</script>

@stop


