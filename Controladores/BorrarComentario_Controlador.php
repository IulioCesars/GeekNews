<?php
    include "../Modelos/ConexionMySQL.php";

    $O = $_GET['O'];
    if(isset($_GET['id'])){
        $ID = $_GET['id'];
        $BD = new BaseDatos();
        $BD->Conect();
        $BD->StoredProcedure(sprintf("sp_Comentario_Borrar(%s);",$ID));
        $BD->Disconnect();
    }

    header("Location: ../Noticia.php?id=" . $O );