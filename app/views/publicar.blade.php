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
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
            	<?php $relato = get_object_vars($datos[0]);?>
                <!-- Page Heading -->
            <div class="row">
            	<div class="col-lg-2"></div>
            <!-- Parte central -->
            <div class="col-lg-8">
            		 <div class="row">
                   		 <div class="col-lg-12">
                        	<h1 class="page-header">
                            Publicar relato<small></small>
                        	</h1>
                    	</div>
                	</div>

                	<form action="<?=URL::to('guardar_paso/create'); ?>" method="POST">
               		<label>Nombre de usuario</label>
               		<div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input value="{{$relato['user']}}" type="text" class="form-control" placeholder="Nombre o Sobrenombre" name="user">
                            </div>
               		<div class="form-group has-success">
               			<label>Nombe del relato</label>
               			<input type="text" class="form-control" placeholder="" name="nom_rel" value="{{$relato['nom_rel']}}">
               		</div>
                	<div class="form-group">
                                <label>Descripcion</label>
                                <textarea class="form-control" rows="3" name="des"></textarea>
                    </div>
                    <div class="form-group">
                                <label>Genero</label>
                                <select class="form-control" name="gen">
                                    <option	value="0">Asesinos</option>
                                    <option	value="1">Fantasmas</option>
                                    <option	value="2">Extraterrestres</option>
                                    <option	value="3">Otros</option>
                                </select>
                            </div><input type="hidden" value="{{$relato['pk']}}">
                    <button type="submit" class="btn btn-info">Listo </button>
                    </form>

            </div>
            <!--fin parte central -->

                	<div class="col-lg-2">Usuarios de la pagina</div>
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
