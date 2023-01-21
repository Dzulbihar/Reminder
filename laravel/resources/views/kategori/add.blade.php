<head>
  <title> Tambah Kategori - Reminder </title>
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
						<h3 class="card-title"> <b> Tambah Data Kategori </b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('kategori')}}/{{('create')}}" method="POST" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- kategori -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Kategori </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="kategori" value="{{old('kategori')}}" placeholder="Jenis request" required autocomplete="off" autofocus>
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




@stop