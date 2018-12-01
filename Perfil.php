<!DOCTYPE html>
<?php 
    include 'Controladores/Session_Controlador.php';

    include 'Modelos/ConexionMySQL.php';
    include 'Modelos/VO/UsuarioVO.php';
    include 'Modelos/DAO/UsuarioDAO.php';

    if(isset($_GET['id'])){
        if(is_numeric($_GET['id'])){
            $ID_Perfil = $_GET['id'];
        }
    }

    if(isset($ID_Perfil)){
        $_UsuarioDAO = new UsuarioDAO();
        $_Usuario = new UsuarioVO();
        $_Usuario->ArraytoObject($_UsuarioDAO->Obtener($ID_Perfil));
    }else{
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
            <div style="background-image: url('<?php
            if($_Usuario->getPortada()!=null)
                echo 'data:image/jpeg;base64,'.base64_encode( $_Usuario->getPortada());
            else
                echo 'Recursos/img/Portada.jpg';
            ?>');" class="col-lg-10 col-lg-offset-1 imgPortada">
                <div class="blank" ></div>
                <?php
                if($_Usuario->getAvatar()!=null)
                    echo '<img class="imgperfil" src="data:image/jpeg;base64,'.base64_encode( $_Usuario->getAvatar() ).'"/>';
                else
                    echo '<img class="imgperfil" src="Recursos/img/Perfil.jpg"/>';
                ?>
                <h1 class="color-white">
                    <?php
                        //Nombre de Perfil
                        echo $_Usuario->getNombre() . " " . $_Usuario->getApellido();
                    ?>
                </h1>
                <label class="color-white">Email: </label>
                <text class="color-white"><?php echo $_Usuario->getEmail(); ?></text>
                <br>
                <label class="color-white">Telefono: </label>
                <text class="color-white"><?php echo $_Usuario->getTelefono(); ?></text>
                <br>
                <label class="color-white">Fecha de Nacimiento: </label>
                <text class="color-white"><?php echo $_Usuario->getFNacimiento(); ?></text>
                <?php   ?>
            </div>
        </div>
        <div class="blank"></div>
        <div class="col-lg-8 col-lg-offset-2 materialcard">
            <div class="blank"></div>

            <form action="Controladores/ModificarPerfil_Controlador.php" method="post" enctype="multipart/form-data" >
                <div class="col-lg-12">
                    <h3>Editar Perfil</h3>
                </div>

                <div class="col-lg-6">
                    <label>Nombre: </label>
                        <input class="form-inline form-control" type="text" name="nombre" placeholder="">
                    <label>Apellidos: </label>
                        <input class="form-inline form-control" type="text" name="apellidos" placeholder="">
                    <label>Email: </label>
                        <input class="form-inline form-control" type="text" name="email" placeholder="">
                    <label>Telefono: </label>
                        <input class="form-inline form-control" type="text" name="telefono" placeholder="">
                </div>
                <div class="col-lg-6">
                    <label>Fecha Nacimiento: </label>
                        <input class="form-inline form-control" type="date" name="fnacimiento" placeholder="">
                    <label class="hidden">Genero: </label>
                        <input  class="form-inline hidden form-control" type="text" name="genero" placeholder="">
                    <label>Avatar: </label>
                        <input type="file" name="imgAvatar"/>
                    <label>Portada: </label>
                        <input type="file" name="imgPortada"/>
                </div>


                <div class="col-lg-12">
                    <div class="blank"></div>
                    <div class="blank"></div>
                    <input class="btn btn-primary" type="submit" name="" value="Guardar Cambios">
                    <div class="blank"></div>
                    <div class="blank"></div>
                </div>
            </form>
            <div class="blank"></div>
                    
        </div>
    </body>
</html>
