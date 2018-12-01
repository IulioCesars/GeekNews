<?php
    require '../Modelos/VO/NoticiaVO.php';
    require '../Modelos/DAO/NoticiaDAO.php';
    require '../Modelos/ConexionMySQL.php';
    require '../Modelos/ImagenTools.php';

    session_start();

    $_NoticiaDAO = new NoticiaDAO();
    $_NoticiaVO = new NoticiaVO();
    $_ImagenTools = new ImagenTools();
    $BD = new BaseDatos();

    $_NoticiaVO->setTitulo($_POST["titulo"]);
    $_NoticiaVO->setIdSeccion($_POST["Seccion"]);
    $_NoticiaVO->setCuerpo($_POST["Cuerpo"]);
    $_NoticiaVO->setIdReportero($_SESSION["Usuario"]["Id"]);

        $_FILES["archivo"];

    $index = $_NoticiaDAO->Insertar($_NoticiaVO);
    $RutaImagen = $_ImagenTools->SubirImagen("archivo","Noticias");

    echo "indice de post: " . $index;
    echo "Ruta de imagen: " . $RutaImagen;

    $BD->Conect();
    $BD->StoredProcedure("sp_Multimedia_Insertar(". $index .", '" . $RutaImagen ."');");
    $BD->Disconnect();

    header('Location: ../Noticia.php?id='.$index);
