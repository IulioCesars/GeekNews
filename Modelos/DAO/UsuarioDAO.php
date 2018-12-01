<?php

    class UsuarioDAO{
                
        function Insertar($p_Usuario){
            $_Usuario = $p_Usuario;
            $Retorno;

            $Query= sprintf("sp_Usuario_Insertar('%s', '%s', '%s', '%s', '%s', '%s', '%s');",
                            $_Usuario->getNombre(),$_Usuario->getApellido(),$_Usuario->getEmail(),
                            $_Usuario->getContraseña(),$_Usuario->getTelefono(),$_Usuario->getFNacimiento(),
                            $_Usuario->getGenero());
            echo $Query;
            $BD_SQL = new BaseDatos();
            $BD_SQL->Conect();
            $Retorno = $BD_SQL->StoredProcedure($Query);
            $BD_SQL->Disconnect();
            return $Retorno;
        }

        function InsertarTodo($p_Usuario){
            $_Usuario = $p_Usuario;
            $Retorno;

            $Query= sprintf("sp_Usuario_Modificar('%s', , '%s', '%s', '%s', '%s',  %s , %s);",
                $_Usuario->getNombre(),$_Usuario->getApellido(),$_Usuario->getEmail(),
                $_Usuario->getTelefono(),$_Usuario->getFNacimiento()
                ,base64_encode($_Usuario->getAvatar()), base64_encode($_Usuario->getPortada()));

            echo $Query;
            $BD_SQL = new BaseDatos();
            $BD_SQL->Conect();
            $v = $BD_SQL->get();
            mysqli_prepare($v,$Query);
            $BD_SQL->Disconnect();
            return $Retorno;
        }
        
        function Validar($p_Usuario){
            $Retorno; //Obtiene valor de query
            $Result; //Obtiene resultados del query
            $Query = sprintf("sp_Usuario_Validar('%s');",
                    $p_Usuario->getEmail());
            $BD_SQL = new BaseDatos();
            $BD_SQL->Conect();
            $Retorno = $BD_SQL->StoredProcedure($Query);
            $Result = $BD_SQL->GetData($Retorno);
            $BD_SQL->Disconnect();
            return $Result;
        }

        function ValidarAdmin($p_ID){
            $Retorno; //Obtiene valor de query
            $Result; //Obtiene resultados del query
            $Query = sprintf("sp_Usuario_ValidarAdmin('%s');",
                    $p_ID);
            $BD_SQL = new BaseDatos();
            $BD_SQL->Conect();
            
            $Retorno = $BD_SQL->StoredProcedure($Query);
            $Result = $BD_SQL->GetData($Retorno);
            $BD_SQL->Disconnect();
            return $Result['Privilegios'];
        }

        function Obtener($p_ID){
            $Retorno; //Obtiene valor de query
            $Result; //Obtiene resultados del query
            $Query = sprintf("sp_Usuario_Obtener(%s);",
                $p_ID);
            $BD_SQL = new BaseDatos();
            $BD_SQL->Conect();
            $Retorno = $BD_SQL->StoredProcedure($Query);
            $Result = $BD_SQL->GetData($Retorno);
            $BD_SQL->Disconnect();

            return $Result;
        }
        
    }