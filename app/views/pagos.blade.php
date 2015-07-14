
@if(Auth::check())
<!DOCTYPE html>
<html lang="es">
<body>
	<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gimnasio Walter</title>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/datepicker.css">
	<link href="css/sb-admin.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	</head>
	<div id="wrapper">

		@include('nav')
		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Pagos <small>Realizar pagos</small> 
						</h1> 
							<?php  $mat_status=Session::get('mat_status'); ?>
						@if($mat_status=='ok_create')
						<div class="alert alert-success fade in">
							<button class="close" data-dismiss="alert" type="button">x</button>
							<i class="fa fa-check-square"></i> El usuario fue matriculado correctamente
						</div>
						@endif
						@if($mat_status=='false_create')
						<div class="alert alert-danger fade in">
							<button class="close" data-dismiss="alert" type="button">x</button>
							<i class="fa fa-exclamation"></i> El usuario ya esta registrado en esa clase
						</div>
						@endif
				   @if($users)
					<div class="table-responsive">
					<table id="table_id" class="table table-bordered table-hover table-striped">
						<thead>
									<tr>
										<th>DNI</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>E-mail</th>
										<th>Telefono</th>
										<th>Direccion</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody> @foreach($users as $user)
									<tr>
										<td>{{ $user->dni }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->apellido_pat.' '.$user->apellido_mat }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->telefono }}</td>
										<td>{{ $user->direccion }}</td>
										<td><span class="label label-warning">{{ HTML::link('pago/'.$user->id, 'Realizar Pago') }}</span>
										</td>
										@endforeach
									</tr>
								</tbody>
					</table>
					</div>
					@else
					<div class="alert alert-danger">
						<strong>Error!</strong> No hay datos que mostrar.
					</div>
					@endif 
				</div>
				</div>

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	
					


			
			<!--input id="val" type="hidden" name="user" class="input-block-level" value="" -->
	<!-- jQuery -->
	<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Morris Charts JavaScript -->
	<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
	 <script type="text/javascript"> 
	 $(document).ready(function(){
		 $('#table_id').dataTable();
		  $('#datepicker1').datepicker({
					format: "yyyy-mm-dd"
				});  
	});

	 </script>
				  <script type="text/javascript">
			 $(document).ready(function(){
				$('.edit').click(function() {
					$('[name=id_user]').val($(this).attr('id'));
			   });
			 });
		</script>

@endif
</body>


</html>