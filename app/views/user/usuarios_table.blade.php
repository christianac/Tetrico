
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
    <script>
     function validarLetras(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        patron =/[A-Za-z\s]/;
        te = String.fromCharCode(tecla);
        return patron.test(te);
    } 

   function validarEmail(valor) {   
  if (/(\w+)(\.?)(\w*)(\@{1})(\w+)(\.?)(\w*)(\.{1})(\w{2,3})/.test(valor)){   
    return true;   
  } else {   
    return false;   
  }   
}
    
    function validarRegistro(){  
        if(!validarEmail(document.getElementById("ema").value)) // validamos el correo valido 
            {   
                alert("Ingrese un correo valido o revise si sus campos estan completos"); 
                var el = document.getElementById('email-fg');
                if(el) {
                          el.className += el.className ? ' has-error' : 'has-error';
                        }
                event.preventDefault();
            }
        else
            document.frmregistro.submit(); // enviamos el formulario 
    }

    function validarRegistroEdit(){  
        if(!validarEmail(document.getElementById("ema_edit").value)) // validamos el correo valido 
            {   
                alert("Ingrese un correo valido o revise si sus campos estan completos"); 
                var el = document.getElementById('email-e-fg');
                if(el) {
                          el.className += el.className ? ' has-error' : 'has-error';
                        }
                event.preventDefault();
            }
        else
            document.frmregistro.submit(); // enviamos el formulario 
    }

    function maxDNI(e){
        var teclaPulsada=window.event ? window.event.keyCode:e.which;
        var dni = document.getElementById("dni").value;
        if(dni.length == 8)
        {
          return false;
        }   
        return /\d/.test(String.fromCharCode(teclaPulsada));     
    }

    function soloNumeros(e)
    {
        var teclaPulsada=window.event ? window.event.keyCode:e.which;
        var valor=document.getElementById("inputNumero").value;
        if(teclaPulsada==13)
        {
            return true;
        }
        if(valor.length > 8)
        {
          return false;
        }
        return /\d/.test(String.fromCharCode(teclaPulsada));
    } 
    </script>
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
                            Mantenimiento de Personal
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Personal
                            </li>
                            <?php  $status=Session::get('status'); ?>
                            
                        </ol><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Agregar Personal</button></br></br>
                        @if($status=='ok_create')
                        <div class="alert alert-success fade in">
                            <button class="close" data-dismiss="alert" type="button">x</button>
                            <i class="fa fa-check-square"></i> El usuario fue creado con exito
                        </div>
                        @endif
                        @if($status=='ok_delete')
                        <div class="alert alert-success fade in">
                            <button class="close" data-dismiss="alert" type="button">x</button>
                            <i class="fa fa-check-square"></i> El usuario fue eliminado
                        </div>
                        @endif
                   @if($users)
                    <div class="table-responsive">
                    <table id="table_id" class="table table-bordered table-hover table-striped">
                        <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>E-mail</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <!--th>Cargo</th-->
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody> @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->apellido_pat.' '.$user->apellido_mat }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->telefono }}</td>
                                        <td>{{ $user->direccion }}</td>
                                        <!--td> $user->cargo </td-->
                                        <td><span class="label label-info">{{ HTML::link('#Edit', 'Editar', array('class' => 'edit', 'id' => $user->id, 'data-toggle' => 'modal', 'title' => $user->name) ) }}</span>
                                            <span class="label label-danger"><a href="users/delete/{{$user->id}}" onclick="return confirm('Esta seguro de desear eliminar?');  ">Eliminar</a></span>
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
    <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregando Personal</h4>
                  </div>
                  <div class="modal-body">
                    <form action="users/create" method="post" id="frmregistro">
                    <div class="row">
                        <input type="hidden" name="tip" value="1">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nom" required autocomplete="off" onkeypress="return validarLetras(event)" >
                        </div>
                         <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="apepat" required autocomplete="off" onkeypress="return validarLetras(event)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="apemat" required autocomplete="off" onkeypress="return validarLetras(event)">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Fecha de Nac.</label>
                                 <input  type="text" name="fecnac" required class="form-control" placeholder="Click para escoger fecha"  id="datepicker1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sexo</label>
                                 <select class="form-control" name="sex" required>
                                  <option value="Masculino">Masculino</option>
                                  <option value="Femenino">Femenino</option>
                              </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                         <div class="row">
                            <div class="col-sm-6"> <div class="form-group">
                            <label>Telefono / Celular</label>
                            <input onkeypress="return soloNumeros(event);" onpaste="return false" autocomplete="off" placeholder="Telefono" type="text" id="inputNumero" class="form-control" name="tel" required >
                        </div>
                        <div class="form-group">
                            <label>Direccion</label>
                            <input type="text" class="form-control" name="dir" required>
                        </div></div>
                            <div class="col-sm-6"> <div class="form-group">
                            <label>Sucursal</label>
                            <select class="form-control" name="dis" required>
                                  <option value="1">Huacho</option>
                                  <option value="2">Barranca</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label>Cargo</label>
                            <select class="form-control" name="car" required>
                                  <option value="1">Recepcionista</option>
                                  <option value="2">Cajero</option>
                                  <option value="3">Supervisor Asistencia</option>
                                  <option value="4">Instructor</option>
                                  <option value="5">Planificador de Cursos</option>
                                  <option value="6">Vendedor</option>
                                  <option value="7">Jefe de Almacen</option>
                              </select>
                        </div></div>
                         </div>

                         <div class="row">
                            <div class="col-sm-6"><div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>DNI</label>
                            <input id="dni" onkeypress="return maxDNI(event);" onpaste="return false" autocomplete="off" type="numeric" class="form-control" name="dni" required>
                        </div> 

                    </div>
                            <div class="col-sm-6"><div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pas" required>
                               </div>

                                <div class="form-group" id="email-fg">
                            <label>Correo</label>
                            <input type="text" class="form-control" name="ema" id="ema" required>
                               </div>
                    </div>


                         </div>

                        
                        
                        
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse" onclick="validarRegistro()">Guardar</button></form>
                  </div>
                </div>
              </div>
            </div>


             <!-- Modal -->
            <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar Personal</h4>
                  </div>
                  <div class="modal-body">
                    <form action="users/update" method="post" id="formEdit">
                    <div class="row">
                        <input type="hidden" name="tip" value="1">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nom_edit" required autocomplete="off" onkeypress="return validarLetras(event)">
                        </div>
                         <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="apepat_edit" required autocomplete="off" onkeypress="return validarLetras(event)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="apemat_edit" required autocomplete="off" onkeypress="return validarLetras(event)">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Fecha de Nac.</label>
                                 <input autocomplete="off"  type="text" name="fecnac_edit" class="form-control" placeholder="Click para escoger fecha"  id="datepicker2"  required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sexo</label>
                                 <select class="form-control" name="sex_edit"  required>
                                  <option value="Masculino">Masculino</option>
                                  <option value="Femenino">Femenino</option>
                              </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                         <div class="row">
                            <div class="col-sm-6"> <div class="form-group">
                            <label>Telefono</label>
                            <input autocomplete="off" type="text" class="form-control" name="tel_edit" id="tel_edit" required>
                        </div>
                        <div class="form-group">
                            <label>Direccion</label>
                            <input autocomplete="off" type="text" class="form-control" name="dir_edit" required>
                        </div></div>
                            <div class="col-sm-6"> <div class="form-group">
                            <label>Sucursal</label>
                            <select class="form-control" name="dis_edit" required>
                                  <option value="1">Huacho</option>
                                  <option value="2">Barranca</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label>Cargo</label>
                            <select class="form-control" name="car_edit" required>
                                  <option value="1">Recepcionista</option>
                                  <option value="2">Cajero</option>
                                  <option value="3">Supervisor Asistencia</option>
                                  <option value="4">Instructor</option>
                                  <option value="5">Planificador de Cursos</option>
                                  <option value="6">Vendedor</option>
                                  <option value="7">Jefe de Almacen</option>
                              </select>
                        </div></div>
                         </div>

                         <div class="row">
                            <div class="col-sm-6">
                        <div class="form-group">
                            <label>DNI</label>
                            <input autocomplete="off" type="numeric" class="form-control" name="dni_edit" id="dni_edit" required>
                        </div> 

                    </div>
                            <div class="col-sm-6">

                                <div class="form-group" id="email-e-fg">
                            <label>Correo</label>
                            <input id="ema_edit" autocomplete="off" type="text" class="form-control" name="ema_edit" required>
                               </div>
                    </div>


                         </div>

                        
                        
                        
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse" onclick="validarRegistroEdit()">Guardar</button>
                 <input id="val" type="hidden" name="user" class="input-block-level" value="" >
             </form>
                  </div>
                </div>
              </div>
            </div>

            
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
    <script src="js/masked.js"></script>
    <script type="text/javascript">
    jQuery(function($){
            $("#datepicker1").mask("9999-99-99");
            $("#datepicker2").mask("9999-99-99");
            $("#tel_edit").mask("9999999?99");
            $("#dni_edit").mask("99999999");
        });</script>
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- Morris Charts JavaScript -->
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
     <script type="text/javascript"> 
     $(document).ready(function(){
         $('#table_id').dataTable();
          $('#datepicker1').datepicker({
                    format: "yyyy-mm-dd"
                }); 
          $('#datepicker2').datepicker({
                    format: "yyyy-mm-dd"
                }); 
      });          
    </script>
                  <script type="text/javascript">
             $(document).ready(function(){
                $('.edit').click(function() {
                    $('[name=user]').val($(this).attr('id'));
                    var faction = "<?php echo URL::to('user/getuser/data'); ?>";

                    var fdata = $('#val').serialize();
                    $.post(faction, fdata, function(json){
                        if(json.success) {
                            $('#formEdit input[name="nom_edit"]').val(json.name);
                            $('#formEdit input[name="apemat_edit"]').val(json.apemat);
                            $('#formEdit input[name="apepat_edit"]').val(json.apepat);
                            $('#formEdit input[name="fecnac_edit"]').val(json.fecnac);
                            $('#formEdit select[name="sex_edit"]').val(json.sex);                            
                            $('#formEdit input[name="tel_edit"]').val(json.tel);
                            $('#formEdit select[name="dis_edit"]').val(json.dis);
                            $('#formEdit input[name="dir_edit"]').val(json.dir);
                            $('#formEdit select[name="car_edit"]').val(json.car);
                            $('#formEdit input[name="username_edit"]').val(json.use);
                            $('#formEdit input[name="ema_edit"]').val(json.ema);
                            $('#formEdit input[name="dni_edit"]').val(json.dni);
                        } else {
                            $('#errorMessage').html(json.message);
                            $('#errorMessage').show();
                        }
                    });
               });
             });
        </script>

@endif
</body>


</html>