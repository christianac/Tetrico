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

                <!-- Page Heading -->
            <div class="row">
            	<div class="col-lg-2"></div>
            <!-- Parte central -->
            <div class="col-lg-8">
            		 <div class="row">
			           <div class="col-lf-12">
                        	<h1 class="page-header">
                            Enviar relato<small></small>
                        	</h1>
                    	</div>
                	</div>

                	<form action="enviar/create" method="POST" enctype="multipart/form-data">
					@if (Session::has('error_envio'))
					<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-info-circle"></i>  <strong>Error de envio: </strong> Aceptaste los terminos y condiciones?
                    </div>
                    @endif
                	<div class="alert alert-info"><i class="fa fa-file fa-5x-t"></i>
                    <strong>Las historias enviadas:<br><ul><li></strong>Deben estar en word o en pdf.</li><li>Deben estar escritas con una correcta ortografia.</li>
                    <li>Deben tener coherencia.</li>
                    </ul>Luego pasaran por un filtro para ser publicadas. 
               		</div>
               		<label>Nombre de usuario</label> - El nombre con el cual desea ser publicado
               		<div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Nombre o Sobrenombre" name="user">
                            </div>
               		<div class="form-group has-success">
               			<label>Nombe del relato</label>
               			<input type="text" class="form-control" placeholder="" name="nom_rel">
               		</div>
                	<div class="form-group">
                                <label>Subir archivo</label>
                                <input type="file" name="ubi">
                    </div>
                    <div class="form-group">
                                <label>Genero</label>
                                <select class="form-control" name="gen">
                                    <option	value="0">Asesinos</option>
                                    <option	value="1">Fantasmas</option>
                                    <option	value="2">Extraterrestres</option>
                                    <option	value="3">Otros</option>
                                </select>
                            </div>
                    <div class="checkbox">
                                    <label>
                                        <input name="acc" type="checkbox" value="1">Acepto los terminos y condiciones
                                    </label>
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                    </form>

            </div>
            <!--fin parte central -->

                	<div class="col-lg-2"></div>
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
