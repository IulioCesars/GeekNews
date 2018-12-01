<!DOCTYPE html>
<?php
    include "Modelos/VO/SeccionVO.php";
    include "Modelos/DAO/SeccionDAO.php";
    include "Modelos/ConexionMySQL.php";
    include 'Controladores/Session_Controlador.php';
    include 'Modelos/VO/UsuarioVO.php';
    include 'Modelos/DAO/UsuarioDAO.php';

    if(!isset($_SESSION["Usuario"]["Id"]))
        header('Location: index.php?stade=errorsession');
    else{
        $_UsuarioDAO = new UsuarioDAO();
        //Revisa si no es admin, si no lo es lo redirige a home.php
        if($_UsuarioDAO->ValidarAdmin($_SESSION["Usuario"]["Id"])=="Usuario")
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
            <div class="col-lg-10 col-lg-offset-1 materialcard">
                <br>
                <p class="text-right">Fecha:<?php print_r(date("d/m/Y")); ?></p>
                <h3 class="text-left">Nueva Noticia</h3>
                <form enctype="multipart/form-data" action="Controladores/CrearNoticia_Controlador.php" method="POST">
                    <label>Seccion:</label>
                    <select name="Seccion" required>
                        <?php
                            $_SeccionDAO = new SeccionDAO();
                            $_Coleccion = $_SeccionDAO->ConsultarTodo();
                            count($_Coleccion);
                            for($i=0;$i<count($_Coleccion);$i++) {
                                echo "<option  value='" . $_Coleccion[$i]->getIdSeccion() .
                                    "'>" . $_Coleccion[$i]->getNombre() . "</option>";
                            }
                        ?>
                    </select>
                    <p>Titulo:</p>
                    <input class="form-control" type="text" name="titulo" placeholder="Titulo"required>
                    <br>
                    <p>Cuerpo de la Noticia:</p>
                    <textarea class="form-control" name="Cuerpo" rows="10" required></textarea>
                    <br>
                    <p>Multimedia:</p>
                    <input class="" name="archivo" type="file" accept="image/jpeg, image/png, video/mp4"/>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Publicar" />

                </form>
                <div class="hidden  ">

                </div>
                <div class="blank"></div>
            </div>
        </div>
    </body>
</html>