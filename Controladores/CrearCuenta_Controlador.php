<?php
    require '../Modelos/VO/UsuarioVO.php';
    require '../Modelos/DAO/UsuarioDAO.php';
    require '../Modelos/ConexionMySQL.php';
    
    $_UsuarioVO = new UsuarioVO();
    $_UsuarioDAO = new UsuarioDAO();

    $_UsuarioVO->setNombre($_POST["nombre"]);
    $_UsuarioVO->setApellido($_POST["apellidos"]);
    $_UsuarioVO->setEmail($_POST["email"]);
    $_UsuarioVO->setContraseña($_POST["password"]);
    $_UsuarioVO->setTelefono($_POST["telefono"]);
    $_UsuarioVO->setFNacimiento($_POST["fnacimiento"]);
    $_UsuarioVO->setGenero($_POST["genero"]);
    
    //echo $_UsuarioVO->printUsuario();
    
    $Retorno = $_UsuarioDAO->Insertar($_UsuarioVO);
    echo empty($Retorno);
    if(!empty($Retorno)){
        header('Location: ../');
    }else{
        echo 'Error';
    }
    
    
    
    
    
    
    
    
    
