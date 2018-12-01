<!DOCTYPE html>
<?php 
    include 'Controladores/Session_Controlador.php';
?>
<?php 
    require 'Modelos/VO/SeccionVO.php';
    require 'Modelos/DAO/SeccionDAO.php';
    require 'Modelos/ConexionMySQL.php';
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

        <?php 
            $_SeccionDAO = new SeccionDAO();
            $SeccionColeccion = $_SeccionDAO->ConsultarTodo();
            for($i=0;$i<count($SeccionColeccion);$i++){
                echo "<div class='col-lg-4'>";
                    echo "<div class='panel panel-default'>";
                        echo "<div class='panel-body'> <a href='Home.php?seccionid=" . $SeccionColeccion[$i]->getIdSeccion() . "'> " . $SeccionColeccion[$i]->getNombre() . "</a></div>";
                        echo "<img class='imgpanel' src='" . MEDIA . "/Seccion/" . $SeccionColeccion[$i]->getImagen() . "' alt=''>";
                        echo "<div class='panel-footer'>".$SeccionColeccion[$i]->getDescripcion()."</div>"; 
                    echo "</div>";
                echo "</div>";
            }
        ?>
        
        <!--<div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-body">Gaming!</div>
                <img class="imgpanel" src="Recursos/img/1.jpg" alt="">
                <div class="panel-footer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus, arcu vitae pellentesque pretium, odio sapien eleifend lacus, ultricies aliquet turpis sapien vitae nunc. Vestibulum ut fringilla erat. Praesent vitae leo in est vehicula tincidunt eget ut sem. Suspendisse facilisis ultricies elementum. Fusce a ligula non diam cursus sodales sed vitae nulla. Proin ac consequat neque, euismod venenatis lacus. Integer molestie quam elit, vel tincidunt neque laoreet sed. Aliquam at metus tempus dui congue imperdiet sed scelerisque metus.</div>
            </div>
        </div> -->
    </body>
</html>
