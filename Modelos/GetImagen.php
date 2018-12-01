<?php
require_once "ConfigMySQL.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $link = mysqli_connect(HOST, USER, PASS,DBNAME) or die ("ERROR AL CONECTAR");

    $q = "select Avatar from Usuario where idUsuario = 10";//"$id'";
    $result = mysqli_query($link,$q) or die ("Error al consultar");

    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["Avatar"];
    }

    mysqli_free_result($result);
} else {
    echo 'NO ID';
}