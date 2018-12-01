<?php

    class NoticiaVO{
        private $idNoticia;
        private $Titulo;
        private $Cuerpo;
        private $Visitas;
        private $MeGusta;
        private $Autorizada;
        private $idReportero;
        private $idSeccion;
        private $Fecha;

        /**
         * @return mixed
         */
        public function getIdNoticia()
        {
            return $this->idNoticia;
        }

        /**
         * @param mixed $idNoticia
         */
        public function setIdNoticia($idNoticia)
        {
            $this->idNoticia = $idNoticia;
        }

        /**
         * @return mixed
         */
        public function getTitulo()
        {
            return $this->Titulo;
        }

        /**
         * @param mixed $Titulo
         */
        public function setTitulo($Titulo)
        {
            $this->Titulo = $Titulo;
        }

        /**
         * @return mixed
         */
        public function getCuerpo()
        {
            return $this->Cuerpo;
        }

        /**
         * @param mixed $Cuerpo
         */
        public function setCuerpo($Cuerpo)
        {
            $this->Cuerpo = $Cuerpo;
        }

        /**
         * @return mixed
         */
        public function getVisitas()
        {
            return $this->Visitas;
        }

        /**
         * @param mixed $Visitas
         */
        public function setVisitas($Visitas)
        {
            $this->Visitas = $Visitas;
        }

        /**
         * @return mixed
         */
        public function getMeGusta()
        {
            return $this->MeGusta;
        }

        /**
         * @param mixed $MeGusta
         */
        public function setMeGusta($MeGusta)
        {
            $this->MeGusta = $MeGusta;
        }

        /**
         * @return mixed
         */
        public function getAutorizada()
        {
            return $this->Autorizada;
        }

        /**
         * @param mixed $Autorizada
         */
        public function setAutorizada($Autorizada)
        {
            $this->Autorizada = $Autorizada;
        }

        /**
         * @return mixed
         */
        public function getIdReportero()
        {
            return $this->idReportero;
        }

        /**
         * @param mixed $idReportero
         */
        public function setIdReportero($idReportero)
        {
            $this->idReportero = $idReportero;
        }

        /**
         * @return mixed
         */
        public function getIdSeccion()
        {
            return $this->idSeccion;
        }

        /**
         * @param mixed $idSeccion
         */
        public function setIdSeccion($idSeccion)
        {
            $this->idSeccion = $idSeccion;
        }

        /**
         * @return mixed
         */
        public function getFecha()
        {
            return $this->Fecha;
        }

        /**
         * @param mixed $Fecha
         */
        public function setFecha($Fecha)
        {
            $this->Fecha = $Fecha;
        }
    }