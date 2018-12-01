<?php
include "../Modelos/ConexionMySQL.php";

    if(isset($_GET['id'])){
        $ID = $_GET['id'];
        $BD = new BaseDatos();
        $BD->Conect();
        $BD->StoredProcedure(sprintf("sp_Noticia_MeGusta(%s);",$ID));
        $BD->Disconnect();
    }

    header("Location: ../Noticia.php?id=" . $ID );