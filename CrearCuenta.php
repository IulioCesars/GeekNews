<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Bienvenido a GeekNews</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Recursos/css/bootstrap.min.css" rel="stylesheet">
        <link href="Recursos/css/maintheme.css" rel="stylesheet">
    </head>
    <body class="background">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">Bienvenido a GeekNews</div>
                        <div class="panel-body">
                            <form action="Controladores/CrearCuenta_Controlador.php" method="post">
                                <div class="col-md-6">
                                    <p>Nombre:
                                        <input class="form-control" type="text" name="nombre" placeholder="" required/></p>
                                    <p>Apellidos:
                                        <input class="form-control" type="text" name="apellidos" placeholder="" required/></p>
                                    <p>Email:
                                        <input class="form-control" type="email" name="email" placeholder="" required/></p>
                                    <p>Contraseña:
                                        <input class="form-control" type="password" name="password" placeholder="" required/></p>
                                    <p class="hidden">Confirmar contraseña
                                        <input class="form-control" type="password" name="confirmarpassword" placeholder="" /></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Telefono:
                                        <input class="form-control" type="tel" name="telefono" placeholder="" required/></p>
                                    <p>Cumpleaños:
                                        <input class="form-control" type="date" name="fnacimiento" placeholder="" required/></p> 
                                    <p>Genero:</p>
                                        <input class="radio-inline" type="radio" name="genero" value="Masculino" checked> Masculino
                                        <input class="radio-inline" type="radio" name="genero" value="Femenino"> Femenino<br>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <input class="btn btn-primary" type="submit" value="Crear Cuenta"/>
                                    <a class="btn btn-default" href="index.php">Cancelar</a>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="../Recursos/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../Recursos/js/bootstrap.min.js"></script>
    </body>
</html>
