<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tétrico - Beta</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=URL::to('css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=URL::to('css/sb-admin.css'); ?>" rel="stylesheet">
    <!--link rel="stylesheet" type="text/css" href="<?=URL::to('css/book.css'); ?>" /-->
    <!-- Morris Charts CSS -->
    <link href="<?=URL::to('css/plugins/morris.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=URL::to('font-awesome-4.1.0/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="">

        <!-- Navigation -->
        @include('nav')
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
            <div class="row">
            <!-- Parte central -->
            <div class="col-md-8">
            		 <div class="row">
                   		 <div class="col-lg-12">
                        	<h1 class="page-header">
                            Crear Página<small></small>
                        	</h1>
                    	</div>
                	</div>
					<?php $num = count($paginas) + 1;
					?>
                	<form action="<?=URL::to('pagina/create'); ?>" method="POST" enctype="multipart/form-data">
                	<label>Pagina Nº {{$num}}</label> - Contando {{$num}} de la base de datos
                	<div class="form-group">
                                <textarea class="form-control-e" rows="16" name="contenido"></textarea>
                    </div>
                    <input type="hidden" value="{{$relId}}" name="id">
                    <button type="submit" class="btn btn-danger">Siguiente página</button>
                    </form>

            </div>
            <!--fin parte central -->

             <div class="col-md-4"><h3>Paginas</h3>
                	<div class="list-group">
                	<?php $np = 1; ?>
                	@foreach($paginas as $pagina)
                	<a href="<?=URL::to('leer_pag/'.$relId.'/'.$pagina->pk); ?>" class="list-group-item">
                		<i class="fa fa-file fa-1x"></i> Pagina Nº {{$np}}
                	</a>
                	<?php $np = $np + 1; ?>
                	@endforeach
                	</div>
                	<div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"> <i class="fa fa-fw fa-edit"></i>Publicar</h3>
                            </div>
                            <div class="panel-body">
                                <p>Introduzca su contraseña y luego presione publicar:</p>
                		<form action="<?=URL::to('pagina/publicar'); ?>" method="POST" enctype="multipart/form-data">
                			<div class="form-group">
                    		            <input type="password" class="form-control" name="pas">
                    		</div>
                    		<input type="hidden" value="{{$relId}}" name="id">
                    		<button type="submit" class="btn btn-danger">Publicar</button>
                    	</form>
                            </div>
                        </div>
					</div>
            </div>
               
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
