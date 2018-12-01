<?php
    class SeccionVO{
        private $idSeccion;
        private $Nombre;
        private $Descripcion;
        private $Imagen;
        private $Relevancia;
        
        function getIdSeccion() {
            return $this->idSeccion;
        }

        function getNombre() {
            return $this->Nombre;
        }

        function getDescripcion() {
            return $this->Descripcion;
        }

        function getImagen() {
            return $this->Imagen;
        }

        function getRelevancia() {
            return $this->Relevancia;
        }

        function setIdSeccion($idSeccion) {
            $this->idSeccion = $idSeccion;
        }

        function setNombre($Nombre) {
            $this->Nombre = $Nombre;
        }

        function setDescripcion($Descripcion) {
            $this->Descripcion = $Descripcion;
        }

        function setImagen($Imagen) {
            $this->Imagen = $Imagen;
        }

        function setRelevancia($Relevancia) {
            $this->Relevancia = $Relevancia;
        }
    }