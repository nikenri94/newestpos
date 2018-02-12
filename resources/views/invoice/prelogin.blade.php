@extends('include.include')
@section('content')

<body>
<style type="text/css">
	h1.size{
		text-align: center;
		margin-bottom: 5%;

	}
	.margin{
		margin-top: 20%;
	}
	.align{
		float: center;
	}
</style>
	<div class="container margin">
		
			<h1 class="size">
			
				Login sebagai
			
			</h1>
		<div class="panel panel-footer">
			
			<div class="row align">
				<div class="col-lg-2">
					
				</div>
				<div class="col-lg-1">
					
				</div>
				<div class="col-lg-2">
					<a href="admin" class="btn btn-primary"><h2>Admin</h2></a>
				</div>
				<div class="col-lg-2">
					<a href="login" class="btn btn-danger"><h2>Kasir</h2></a>
				</div>
				<div class="col-lg-2">
					<a href="login" class="btn btn-warning"><h2>Pelayan</h2></a>
				</div>
				<div class="col-lg-2">
					
				</div>
			</div>
			
		</div>
	
		
	</div>
@stop