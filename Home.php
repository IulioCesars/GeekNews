<!DOCTYPE html>
<?php 
    include 'Controladores/Session_Controlador.php';
    include 'Modelos/ConexionMySQL.php';

    if(isset($_GET['seccionid'])){
        if(is_numeric($_GET['seccionid'])){
            $ID_Seccion = $_GET['seccionid'];
        }
    }
?>
<html>
    <head>
    <head>
        <title>GeekNews</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Recursos/css/bootstrap.min.css" rel="stylesheet">
        <link href="Recursos/css/maintheme.css" rel="stylesheet">
    </head>
    </head>
    <body class="background">
        <?php
            include 'Recursos/layers/Navbar.php';

            $BD = new BaseDatos();
            $BD->Conect();
            if(isset($ID_Seccion))
                $result = $BD->StoredProcedure("sp_Noticia_ObtenerTodoF(" . $ID_Seccion . ");");
            else
                $result = $BD->StoredProcedure("sp_Noticia_ObtenerTodo();");
            $BD->Disconnect();



            for($i=0;$i< mysqli_num_rows ($result);$i++){
                $R = $BD->GetData($result);

                echo "
                    <div class=\"col-lg-4\">
                            <div class=\"panel panel-default\" style='height: 450px'>
                                <div class=\"panel-body col-lg-6\">
                                    <h3><a href=\"Noticia.php?id=" . $R['idNoticia'] . "\">" . $R['Titulo'] . "</a></h3>
                                </div>
                                <div class=\"panel-body col-lg-6\">
                                    <p><b>Fecha:</b> " . $R['Fecha'] . "</p>
                                    <p><b>Reportero: </b>" . $R['Reportero'] . "</p>
                                    <p><b>Seccion: </b>" . $R['Seccion'] . "</p>
                                </div>";

                $url = HTTP .  $_SERVER["HTTP_HOST"] . '/' . PROYECTO . "/" . $R["Multimedia"];
                $ext =  substr($url, strripos($url,'.'));
                if(strlen($R["Multimedia"])>3)
                    if($ext == '.mp4'){
                        echo "<video class='imgpanel' width='480' height=auto controls>";
                        echo "<source src='" . $url . "' type='video/mp4'>";
                        echo "</video>";
                    }
                    else{
                        echo "<img class='imgpanel img-responsive' src='" . $url . "'>";
                    }
                else{
                    $url = HTTP .  $_SERVER["HTTP_HOST"] . '/' . PROYECTO . "/" . MEDIA . "/default.jpg";
                    echo "<img class='imgpanel img-responsive' src='" . $url . "'>";
                }

                          echo  "<div class=\"panel-footer\">
                                    " . $R['Cuerpo'] . "
                                    <a href=\"Noticia.php?id=" . $R['idNoticia'] . "\">Ver mas...</a>
                                </div>
                            </div>
                    </div>";
            }
        ?>
    </body>
</html>
