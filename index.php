<!DOCTYPE html>

<html>
    <head>
        <title>GeekNews</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Recursos/css/bootstrap.min.css" rel="stylesheet">
        <link href="Recursos/css/maintheme.css" rel="stylesheet">
    </head>
    <body class="background">
        <div class="container">
            <br>
            <?php
                if(isset($_GET['stade'])){
                    if($_GET['stade']=="error"){
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>¡Error!</strong> No se encontro el usuario";
                        echo "</div>";
                        }
                    if($_GET['stade']=="errorsession"){
                    echo "<div class='alert alert-danger'>";
                    echo "<strong>¡Error!</strong> No se encontro session del usuario";
                    echo "</div>";
                    }
                }
            ?>

            <div class="col-md-4 col-md-offset-4">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">Bienvenido a GeekNews</div>
                        
                        <div class="panel-body">
                            <form action="Controladores/IniciarSesion_Controlador.php" method="post">
                                <label>Correo:</label>
                                <input class="form-control" type="email" name="email" placeholder="Correo@dominio.com" required/>
                                <br>
                                <label>Password:</label>
                                <input class="form-control" type="password" name="pass" placeholder="*****">
                                <br>
                                <input class="form-control btn btn-primary" type="submit" value="Iniciar Sesion" required/>
                                <center>
                                    <br>
                                    <a class="hidden" href="">¿Olvidaste tu contraseña?</a>
                                    <br>
                                    <a href="CrearCuenta.php">¿No aun tienes cuenta?</a>
                                </center>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        
        <!-- jQuery -->
        <script src="Recursos/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="Recursos/js/bootstrap.min.js"></script>
    </body>
</html>
