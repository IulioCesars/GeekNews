<?php
require_once "ConfigMySQL.php";
 
class BaseDatos
{
    protected $conexion;
    protected $db;
    protected $query;


    public function Conect(){
        $this->conexion = mysqli_connect(HOST, USER, PASS, DBNAME);
    }

    public function GetIDLastInsert(){

        return mysqli_insert_id($this->conexion);
    }

    public function Disconnect(){
        if ($this->conexion) {
            mysqli_close ($this->conexion);
        }
    }

    public function get(){
        return $this->conexion;
    }
    
    public function ExecuteQuery($_Query){
        $query=mysqli_query ($this->conexion,$_Query);
        return $query;        
    }

    public function GetData($_Result){
        return mysqli_fetch_array ($_Result);
    }
    
    public function StoredProcedure($_SP){
        $query=mysqli_query( $this->conexion,"call ".$_SP);
        return $query;
    }


    /*public function GetData($_Row, $_Parameter){
        return mysql_result($query,$_Row,$_Parameter);
    }*/
    
}