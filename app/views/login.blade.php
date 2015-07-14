<!DOCTYPE html>
<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Login - Tetrico</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="css/login.css">
         </head>    
         <body>
           
        <div id="container">
            <div id="logo">
                <!--img src="img/logo.png" alt=""-->
            </div>
            <div id="loginbox">   
                     
                <form id="loginform" action="login" method="post">
                    @if (Session::has('login_errors'))
                    <p style='color:#FB1D1D'> El nombre de usuario o la contraseña no son correctos. </p>
                    @else
                    <p>Introduzca usuario y contraseña para continuar.</p>
                    @endif
                    <div class="input-group input-sm">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span><input name="username" class="form-control" id="username" placeholder="Usuario" type="text">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span><input name="password" class="form-control" id="password" placeholder="Contraseña" type="password">
                    </div>
                    <div class="form-actions clearfix">                      
 <input class="btn btn-block btn-primary btn-default" value="Acceder" type="submit">
                    </div>
                    <div class="footer-login">
                                            
                    </div>
                </form>
                </div>
        </div>
        <!--script src="js/jquery.js"></script>  
        <script src="js/jquery-ui.js"></script>
        <script src="js/login.js"></script--> 
</body>
</html>