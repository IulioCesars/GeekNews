<?php

class ImagenTools{
    function SubirImagen($File, $SubFolder){
        $uploadedfileload="true";
        $uploadedfile_size=$_FILES[$File]['size'];
        echo $_FILES[$File]['name'];
        $msg = "";
        /*if ($_FILES[$File]['size']>1000000) {
            $msg=$msg."El archivo es mayor que 1000KB, debes reduzcirlo antes de subirlo<BR>";
            $uploadedfileload="false";
        }*/

        /*if (!($_FILES[$File]['type'] =="image/pjpeg" OR $_FILES[$File]['type'] =="image/gif")){
            $msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
            $uploadedfileload="false";
        }*/

        $file_name=time() . " " .$_FILES[$File]['name'];
        $add="Media/" . $SubFolder . "/" . "$file_name";
        if($uploadedfileload=="true"){

            if(move_uploaded_file ($_FILES[$File]['tmp_name'], "../".$add)){
                echo " Ha sido subido satisfactoriamente";
                return $add;
            }else{echo "Error al subir el archivo";
                return 0;
            }
        }else{echo $msg;
            return 0;
        }
    }
}