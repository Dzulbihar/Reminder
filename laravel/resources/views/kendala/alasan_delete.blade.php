<head>
  <title> Alasan Dihapus - Reminder </title>
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
						<h3 class="card-title"> <b> Data Kendala </b>  </h3>
					</div>
					<!-- form start -->
					<form action="{{ url('kendala') }}/{{$kendala->id}}/{{('delete')}}" method="GET" enctype="multipart/form-data" >
						{{csrf_field()}}

						<div class="card-body">

							<!-- target -->
							<div class="form-group row">
								<div class="col-md-3">
									<label> Alasan Data Dihapus </label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="alasan_delete" value="{{old('alasan_delete')}}" placeholder="Alasan Dihapus" required autocomplete="off" autofocus>
								</div>
							</div>

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