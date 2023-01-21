<head>
  <title> Tambah Kendala - Reminder </title>
  <link rel="shortcut icon" href="{{asset('gambar/lonceng.jpg')}}">
</head>


@extends('layouts.app')

@section('content')


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
						<h3 class="card-title"> <b> Tambah Data Kendala </b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('kendala')}}/{{('create')}}" method="POST" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- jenis_request -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis request </label>
								</div>
								<div class="col-md-9">
									<select name="jenis_request" class="form-control select2" style="width: 100%;" value="{{ old('jenis_request') }}">
										@foreach($jenis_request as $ka)
										<option value="{{$ka->jenis_request}}">
											{{$ka->jenis_request}}
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- kategori -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Kategori </label>
								</div>
								<div class="col-md-9">
									<select name="kategori" class="form-control select2" style="width: 100%;" value="{{ old('kategori') }}">
										@foreach($kategori as $ka)
										<option value="{{$ka->kategori}}">
											{{$ka->kategori}}
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- keterangan -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Permintaan / Keterangan </label>
								</div>
								<div class="col-md-9">
									<textarea name="keterangan" rows="4" cols="50" class="form-control" required></textarea>
								</div>
							</div>

							<!-- file_pendukung_1 --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> File pendukung </label>
								</div>
								<div class="col-md-9">
									<input type="file" class="form-control @error('file_pendukung_1') is-invalid @enderror" name="file_pendukung_1" value="{{ old('file_pendukung_1') }}">
									@error('file_pendukung_1')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							<!-- file_pendukung_2 --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> File pendukung </label>
								</div>
								<div class="col-md-9">
									<input type="file" class="form-control @error('file_pendukung_2') is-invalid @enderror" name="file_pendukung_2" value="{{ old('file_pendukung_2') }}">
									@error('file_pendukung_2')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							<!-- file_pendukung_3 --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> File pendukung </label>
								</div>
								<div class="col-md-9">
									<input type="file" class="form-control @error('file_pendukung_3') is-invalid @enderror" name="file_pendukung_3" value="{{ old('file_pendukung_3') }}">
									@error('file_pendukung_3')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
							</div>

							@if(auth()->user()->role == 'Admin')
							<!-- keterangan1 -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Keterangan Tambahan dari Admin </label>
								</div>
								<div class="col-md-9">
									<textarea name="keterangan1" rows="4" cols="50" class="form-control"></textarea>
								</div>
							</div>
							<!-- target -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Target </label>
								</div>
								<div class="col-md-9">
									<input type="datetime-local" class="form-control" name="target" value="{{old('target')}}" placeholder="Jenis request" autocomplete="off" autofocus>
								</div>
							</div>
							@endif

							<input type="hidden" name="user_entry" value="{{ Auth::user()->name }}">

							<!-- Tombol --> 
							<div class="form-group row">
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Simpan
									</button>
									<a href="{{url('kendala')}}" class="btn btn-default btn-sm float-sm-right">
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