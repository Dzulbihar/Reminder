<head>
  <title> Edit Kendala - Reminder </title>
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
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-white">
					<div class="card-header">
						<h3 class="card-title"> <b>Edit Data Kendala</b> </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('kendala') }}/{{$kendala->id}}/{{('update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- jenis_request --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> Jenis request </label>
								</div>
								<div class="col-md-9">
									<select class="form-control select2" style="width: 100%;" name="jenis_request">
										<option selected> {{ $kendala->jenis_request}} </option>
										@foreach($jenis_request as $ka)
										<option>
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
									<select class="form-control select2" style="width: 100%;" name="kategori">
										<option selected> {{ $kendala->kategori}} </option>
										@foreach($kategori as $ka)
										<option>
											{{$ka->kategori}}
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- keterangan -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Permintaan / Keterangan  </label>
								</div>
								<div class="col-md-9">
									<textarea name="keterangan" rows="4" cols="50" class="form-control" required>{{ $kendala->keterangan}}</textarea>
								</div>
							</div>

							<!-- file_pendukung_1 --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> File pendukung </label>
								</div>
								<div class="col-md-7">
									<input type="file" class="form-control @error('file_pendukung_1') is-invalid @enderror" name="file_pendukung_1" value="{{ $kendala->file_pendukung_1}}">
									@error('file_pendukung_1')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$kendala->file_pendukung_1()}}" width="100%"></embed>
								</div>
							</div>

							<!-- file_pendukung_2 --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> File pendukung </label>
								</div>
								<div class="col-md-7">
									<input type="file" class="form-control @error('file_pendukung_2') is-invalid @enderror" name="file_pendukung_2" value="{{ $kendala->file_pendukung_2}}">
									@error('file_pendukung_2')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$kendala->file_pendukung_2()}}" width="100%"></embed>
								</div>
							</div>

							<!-- file_pendukung_3 --> 
							<div class="form-group row">
								<div class="col-md-3">
									<label> File pendukung </label>
								</div>
								<div class="col-md-7">
									<input type="file" class="form-control @error('file_pendukung_3') is-invalid @enderror" name="file_pendukung_3" value="{{ $kendala->file_pendukung_3}}">
									@error('file_pendukung_3')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<span class="text-danger">ukuran maksimal 4 mb</span>
								</div>
								<div class="col-md-2">
									<embed type="application/pdf" src="{{$kendala->file_pendukung_3()}}" width="100%"></embed>
								</div>
							</div>

							@if(auth()->user()->role == 'Admin')
							<!-- keterangan1 -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Keterangan Tambahan dari Admin </label>
								</div>
								<div class="col-md-9">
									<textarea name="keterangan1" rows="4" cols="50" class="form-control">{{ $kendala->keterangan1}}</textarea>
								</div>
							</div>
							<!-- target -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Target </label>
								</div>
								<div class="col-md-9">
									<input  type="datetime-local" class="form-control" name="target" value="{{ $kendala->target}}" autocomplete="off" autofocus>
								</div>
							</div>
							<!-- status -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Status </label>
								</div>
								<div class="col-md-9">
									<select class="form-control" name="status">
										<option disabled>-- Select --</option>
										<option value="0" @if($kendala->status == '0') selected @endif> Belum Selesai </option>
										<option value="1" @if($kendala->status == '1') selected @endif> Selesai </option>
									</select>
								</div>
							</div>
							@endif

							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/kendala')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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