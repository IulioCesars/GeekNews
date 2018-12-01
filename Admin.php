<!DOCTYPE html>
<?php 
    include 'Controladores/Session_Controlador.php';
    include 'Modelos/ConexionMySQL.php';
    include 'Modelos/VO/UsuarioVO.php';
    include 'Modelos/DAO/UsuarioDAO.php';

    if(!isset($_SESSION["Usuario"]["Id"]))
        header('Location: index.php?stade=errorsession');
    else{
        $_UsuarioDAO = new UsuarioDAO();
        //Revisa si no es admin, si no lo es lo redirige a home.php
        if($_UsuarioDAO->ValidarAdmin($_SESSION["Usuario"]["Id"])!="Administrador")
            header('Location: home.php');
    }

?>
<html>
    <head>
        <title>GeekNews</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Recursos/css/bootstrap.min.css" rel="stylesheet">
        <link href="Recursos/css/maintheme.css" rel="stylesheet">
    </head>
    <body class="background">
        <?php
            include 'Recursos/layers/Navbar.php';
        ?>
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="materialcard">


                    <?php

                    ?>

                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="Recursos/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="Recursos/js/bootstrap.min.js"></script>
    </body>
</html>
