<?php
    include_once '../Modelos/ConexionMySQL.php';
    include_once '../Modelos/VO/UsuarioVO.php';
    include_once '../Modelos/DAO/UsuarioDAO.php';

    $_DAO = new UsuarioDAO();

    $_UsuarioVO = new UsuarioVO();
    $_UsuarioVO->setNombre($_POST["nombre"]);
    $_UsuarioVO->setApellido($_POST["apellidos"]);
    $_UsuarioVO->setEmail($_POST["email"]);
    $_UsuarioVO->setTelefono($_POST["telefono"]);
    $_UsuarioVO->setFNacimiento($_POST["fnacimiento"]);
    $_UsuarioVO->setAvatar(file_get_contents($_FILES['imgAvatar']['tmp_name']));
    $_UsuarioVO->setPortada(file_get_contents($_FILES['imgPortada']['tmp_name']));

    $_DAO->InsertarTodo($_UsuarioVO);