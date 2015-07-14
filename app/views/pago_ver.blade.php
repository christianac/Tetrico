
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
	<link href="" rel="stylesheet">
	<link rel="stylesheet" href="<?=URL::to('css/bootstrap.min.css'); ?>">
	<link href="<?=URL::to('css/sb-admin.css'); ?>" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="<?=URL::to('font-awesome-4.1.0/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

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
				<?php
				$clase_1 = get_object_vars($rutinas[0]);
				$clase_2 = get_object_vars($rutinas[1]);
				$clase_3 = get_object_vars($rutinas[2]);
				?>
				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							<small>Precios de clases matriculadas</small> 
						</h1>
					@if(count($matriculas)>0)
				   <div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
									<tr>
										<th>Rutina matriculada</th>
										<th>Precios</th>
									</tr>
								</thead>
								<?php $total = 0; ?>
								<tbody> @foreach($matriculas as $matricula)
									<tr>
										<td>
										<?php switch($matricula->id_clase){
													case(1): echo $clase_1["nombre_clase"];
													break;
													case(2): echo $clase_2["nombre_clase"];
													break;	
													case(3): echo $clase_3["nombre_clase"];
													break;											
										} ?>
										</td>
										<td>
										<?php 
										$valor = 0;
										switch($matricula->id_clase){
													case(1): $valor = $clase_1["precio"]; echo $valor;
													break;
													case(2): $valor = $clase_2["precio"]; echo $valor;
													break;	
													case(3): $valor = $clase_3["precio"]; echo $valor;
													break;											
										}  $total = $total + $valor ?>
										</td>
										@endforeach
									</tr>
									<tr class="success">
										<td>
											<b>Total</b>
										</td>
										<td>
											{{ $total }}
										</td>
									</tr>
								</tbody>
					</table>
					</div>
				</div>
				</div>
			<button type="button" class="btn btn-primary">Realizar Pago</button>
			</div>
			@else
			{{ '<div class="alert alert-danger">
                            <i class="fa fa-info-circle"></i> No se ha realizado ninguna matricula
                        </div>' }}
			<!-- /.container-fluid -->
			@endif
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	

			
            </div>

					


			
			<!--input id="val" type="hidden" name="user" class="input-block-level" value="" -->
	<!-- jQuery -->
	<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?=URL::to('js/bootstrap.js'); ?>"></script>
	<!-- Morris Charts JavaScript -->
	<script type="text/javascript" charset="utf8" src="<?=URL::to('js/jquery.dataTables.min.js'); ?>"></script>
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