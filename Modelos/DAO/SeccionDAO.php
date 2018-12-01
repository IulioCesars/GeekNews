<?php
    class SeccionDAO{
        
        function ConsultarTodo(){
            $_ArregloSecciones=array();
            $Retorno; //Obtiene valor de query
            $Result; //Obtiene resultados del query
            $Query = sprintf("sp_Seccion_ConsultarTodo();");
            $BD_SQL = new BaseDatos();
            $BD_SQL->Conect();
            $Retorno = $BD_SQL->StoredProcedure($Query);
            
            for($i=0;$i< mysqli_num_rows ($Retorno);$i++){
                $Result = $BD_SQL->GetData($Retorno);
                array_push($_ArregloSecciones,$this->ResultASeccion($Result));
            }

            $BD_SQL->Disconnect();



            return $_ArregloSecciones;
        }

        function ResultASeccion($Result){
            $_SeccionVO = new SeccionVO();

            $_SeccionVO->setIdSeccion($Result['idSeccion']);
            $_SeccionVO->setNombre($Result['Nombre']);
            $_SeccionVO->setDescripcion($Result['Descripcion']);
            $_SeccionVO->setImagen($Result['Imagen']);
            $_SeccionVO->setRelevancia($Result['Relevancia']);

            return $_SeccionVO;
        }
        
    }