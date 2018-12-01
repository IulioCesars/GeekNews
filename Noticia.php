<!DOCTYPE html>
<?php
    include 'Controladores/Session_Controlador.php';
    include 'Modelos/ConexionMySQL.php';
    include 'Modelos/DAO/NoticiaDAO.php';
    if(isset($_GET['id'])){
        if(is_numeric($_GET['id'])){
            $ID_Noticia = $_GET['id'];
        }
    }
    if(isset($ID_Noticia)){
        $_NoticiaDAO = new NoticiaDAO();
        $_Noticia = $_NoticiaDAO->Buscar($ID_Noticia);
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
            <div class="col-lg-10 col-lg-offset-1 materialcard">
                <div class="blank"></div>
                <div class="col-lg-10">
                    <h1><?php echo $_Noticia["Titulo"]; ?></h1>
                    <label>Reportero: <?php echo $_Noticia["Reportero"]; ?></label>
                    <b> | </b>
                    <label>Seccion: <?php echo $_Noticia["Seccion"]; ?></label>
                    <b> | </b>
                    <label>Fecha: <?php echo $_Noticia["Fecha"]; ?></label>
                </div>
                <div class="col-lg-2">
                    <div class="blank"></div>
                    <div class="blank"></div>
                    <p><?php echo $_Noticia["Visitas"]; ?> Visitas</p>
                    <p><?php echo $_Noticia["MeGusta"]; ?> Me gusta</p>
                    <a href="Controladores/MeGusta_Controlador.php?id=<?php echo $ID_Noticia ?>" type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Me gusta
                    </a>
                </div>
                <div class="col-lg-12">
                    <hr>
                    <p class="text-justify">
                        <?php echo $_Noticia["Cuerpo"];
                            $url = HTTP .  $_SERVER["HTTP_HOST"] . '/' . PROYECTO . "/" . $_Noticia["Multimedia"];
                        ?>
                    </p>
                    <center>
                        <?php
                            $ext =  substr($url, strripos($url,'.'));
                            if($ext == '.mp4'){
                                echo "<video width='480' height=auto controls>";
                                echo "<source src='" . $url . "' type='video/mp4'>";
                                echo "</video>";
                            }
                            else{
                                echo "<img class='img-responsive' src='" . $url . "'>";
                            }
                        ?>
                    </center>
                    <div class="blank"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="blank"></div>
            
            <div class="col-lg-10 col-lg-offset-1 materialcard">
                <h2>Comentarios</h2>
                <hr>
                <?php
                    $BD = new BaseDatos();
                    $BD->Conect();
                    $result = $BD->StoredProcedure("sp_Comentario_Obtener(" . $ID_Noticia . ");");

                    for($i=0;$i< mysqli_num_rows ($result);$i++){
                        $R = $BD->GetData($result);
                        echo "
                            <hr>
                            <div>
                                <b class='color-blue'>" . $R['Email'] . "</b>
                                <p>" . $R['Fecha'] . "</p>
                                <p>" . $R['Comentario'] . "</p>
                                </p>
                                <a href='Controladores/BorrarComentario_Controlador.php?O=" . $ID_Noticia . "&&id=" . $R['idComentario'] . "'>Eliminar</a>
                            </div>";
                    }
                    $BD->Disconnect();
                    $BD->Conect();
                    $BD->StoredProcedure(sprintf("sp_Noticia_Visita(%s);",$ID_Noticia));
                    $BD->Disconnect();
                ?>
                <hr>
                <form action="Controladores/CrearComentario_Controlador.php" method="post">
                    <h4>Deja tu comentario</h4>
                    <input type="email" class="form-control" name="email" placeholder="user@geeknews.com"
                           value="<?php echo $_SESSION["Usuario"]["Email"] ?>" required/>
                    <br>
                    <textarea class="form-control" name="comentario" required></textarea>
                    <br>
                    <input type="text" class="hidden" name="ID" value="<?php echo $ID_Noticia ?>">
                    <input class="btn bg-primary" type="submit" value="Enviar Comentario">
                </form>
                <div class="blank"></div>
            </div>
        </div>
    </body>
</html>