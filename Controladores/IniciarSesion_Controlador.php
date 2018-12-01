<?php
    require '../Modelos/VO/UsuarioVO.php';
    require '../Modelos/DAO/UsuarioDAO.php';
    require '../Modelos/ConexionMySQL.php';
    
    $_UsuarioVO = new UsuarioVO();
    $_UsuarioDAO = new UsuarioDAO();

    $_UsuarioVO->setEmail($_POST["email"]);
    $_Contraseña = $_POST["pass"];
    
    //$_UsuarioVO->setIdUsuario($_UsuarioDAO->Validar($_UsuarioVO));
    $R = $_UsuarioDAO->Validar($_UsuarioVO);

    if(password_verify($_Contraseña, $R['Contrasena'])){
        session_start();
        $_UsuarioVO->setIdUsuario($R['Retorno']);
        $_SESSION["Usuario"]["Id"]=$_UsuarioVO->getIdUsuario();
        $_SESSION["Usuario"]["Email"]=$_UsuarioVO->getEmail();
        header('Location: ../Home.php');
    }
    else {
        header('Location: ../index.php?stade=error');
    }