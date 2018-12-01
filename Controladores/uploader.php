<?php
    $uploadedfileload="true";
    $uploadedfile_size=$_FILES['uploadedfile']['size'];
    echo $_FILES['uploadedfile']['name'];
    $msg = "";
    if ($_FILES['uploadedfile']['size']>1000000) {
        $msg=$msg."El archivo es mayor que 1000KB, debes reduzcirlo antes de subirlo<BR>";
        $uploadedfileload="false";
    }

    /*if (!($_FILES['uploadedfile']['type'] =="image/pjpeg" OR $_FILES['uploadedfile']['type'] =="image/gif")){
        $msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
        $uploadedfileload="false";
    }*/

    $file_name=time() . " " .$_FILES['uploadedfile']['name'];
    $add="../Media/$file_name";
    if($uploadedfileload=="true"){

        if(move_uploaded_file ($_FILES['uploadedfile']['tmp_name'], $add)){
            echo " Ha sido subido satisfactoriamente";
        }else{echo "Error al subir el archivo";}

    }else{echo $msg;}

