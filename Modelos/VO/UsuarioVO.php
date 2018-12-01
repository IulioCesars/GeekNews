<?php

class UsuarioVO {
    protected $idUsuario;
    protected $Nombre;
    protected $Apellido;
    protected $Email;
    protected $Contraseña;
    protected $Telefono;
    protected $FNacimiento;
    protected $Genero;
    protected $Avatar;
    protected $Portada;
    protected $Privilegios;
    protected $Activo;


    function ArraytoObject($p_Array){
        $this->idUsuario=$p_Array['idUsuario'];
        $this->Nombre=$p_Array['Nombre'];
        $this->Apellido=$p_Array['Apellidos'];
        $this->Email=$p_Array['Email'];
        $this->Telefono=$p_Array['Telefono'];
        $this->FNacimiento=$p_Array['FNacimiento'];
        $this->Avatar=$p_Array['Avatar'];
        $this->Portada=$p_Array['Portada'];
        $this->Activo=$p_Array['Activo'];
    }

    function printUsuario(){
            echo "<p>Nombre: " . $this->Nombre . "</p>";
            echo "<p>Apellido: " . $this->Apellido . "</p>";
            echo "<pEmailNombre: " . $this->Email . "</p>";
            echo "<p>Contraseña: " . $this->Contraseña . "</p>";
            echo "<p>Telefono: " . $this->Telefono . "</p>";
            echo "<p>FNacimiento: " . $this->FNacimiento . "</p>";
            echo "<p>Genero: " . $this->Genero . "</p>";
            echo "<p>Avatar: " . $this->Avatar . "</p>";
            echo "<p>Portada: " . $this->Portada . "</p>";
            echo "<p>Privilegios: " . $this->Privilegios . "</p>";
            echo "<p>Activo: " . $this->Activo . "</p>";
    }
            
    function getNombre() {
        return $this->Nombre;
    }

    function getApellido() {
        return $this->Apellido;
    }

    function getEmail() {
        return $this->Email;
    }

    function getContraseña() {
        return $this->Contraseña;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getFNacimiento() {
        return $this->FNacimiento;
    }

    function getAvatar() {
        return $this->Avatar;
    }

    function getPortada() {
        return $this->Portada;
    }

    function getPrivilegios() {
        return $this->Privilegios;
    }

    function getActivo() {
        return $this->Activo;
    }
    
    function getGenero() {
        return $this->Genero;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
    function setGenero($Genero) {
        $this->Genero = $Genero;
    }
    
    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setContraseña($Contraseña) {
        $this->Contraseña = password_hash($Contraseña, PASSWORD_BCRYPT);
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setFNacimiento($FNacimiento) {
        $this->FNacimiento = $FNacimiento;
    }

    function setAvatar($Avatar) {
        $this->Avatar = $Avatar;
    }

    function setPortada($Portada) {
        $this->Portada = $Portada;
    }

    function setPrivilegios($Privilegios) {
        $this->Privilegios = $Privilegios;
    }

    function setActivo($Activo) {
        $this->Activo = $Activo;
    }
}
