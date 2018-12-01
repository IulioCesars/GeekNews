<?php

class NoticiaDAO{
    function Insertar($_Noticia){
        //Recibe como paremtro un objeto VO de noticia para poder insertarlo en la BD
        //Retornara el id de la noticia insertada, en caso de que pase un error
        //retornara -1
        $Query= sprintf("sp_Noticia_Insertar('%s','%s',%s,%s );",
            $_Noticia->getTitulo(),$_Noticia->getCuerpo(),
            $_Noticia->getIdReportero(),$_Noticia->getIdSeccion());
        $BD_SQL = new BaseDatos();
        $BD_SQL->Conect();
        $Resutl = $BD_SQL->StoredProcedure($Query);
        $Row = $BD_SQL->GetData($Resutl);
        $BD_SQL->Disconnect();
        return $Row["Retorno"];
    }

    function Buscar($_ID){
        $Query = sprintf("sp_Noticia_Obtener(%s);",$_ID);
        $BD = new BaseDatos();
        $BD->Conect();
        $Result = $BD->StoredProcedure($Query);
        $Row = $BD->GetData($Result);
        $BD->Disconnect();
        return $Row;
    }
    function Buscar2($_ID){
        $Query = sprintf("sp_Busqueda('%s');",$_ID);
        $BD = new BaseDatos();
        $BD->Conect();
        $Result = $BD->StoredProcedure($Query);
        $Row = $BD->GetData($Result);
        $BD->Disconnect();
        return $Row;
    }
}