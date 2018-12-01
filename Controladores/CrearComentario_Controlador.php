<?php
    require '../Modelos/ConexionMySQL.php';
    $Email = $_POST['email'];
    $Comentario = $_POST['comentario'];
    $IDNoticia = $_POST['ID'];

    $BD = new BaseDatos();
    $Query = sprintf("sp_Comentario_Insertar('%s', '%s', %s);",
        $Email, $Comentario, $IDNoticia);
    $BD->Conect();
    $BD->StoredProcedure($Query);
    $BD->Disconnect();
    echo $Query;
    header('Location: ../Noticia.php?id='.$IDNoticia);
