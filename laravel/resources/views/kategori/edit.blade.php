<head>
  <title> Edit Kategori - Reminder </title>
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
						<h3 class="card-title"> <b>Edit Data Kategori</b> </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('kategori') }}/{{$kategori->id}}/{{('update')}}" method="POST" enctype="multipart/form-data"  >
						{{csrf_field()}}

						<div class="card-body">

							<!-- kategori -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Kategori </label>
								</div>
								<div class="col-md-9">
									<input  type="text" class="form-control" name="kategori" value="{{ $kategori->kategori}}" required autocomplete="off" autofocus>
								</div>
							</div>

							<div class="form-group row">
								<!-- tombol -->    
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary btn-sm">
										Perbarui
									</button>
									<a href="{{url('/kategori')}}" class="btn btn-default btn-sm float-right">Kembali</a>
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