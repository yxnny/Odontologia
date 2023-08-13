<?php
    class ConsultarMedico {
        private $identificacion;
        private $nombres;
        private $apellidos;
        private $especialidad;

        public function __construct($ide,$nom,$ape,$esp) {
            $this->identificacion=$ide;
            $this->nombres=$nom;
            $this->apellidos=$ape;
            $this->especialidad=$esp;
            
        }
        public function obtenerIdentificacion(){
            return $this->identificacion;
        }
        public function obtenerNombres(){
            return $this->nombres;
        }
        public function obtenerApellidos(){
            return $this->apellidos;
        }
        public function obtenerEspecialidad(){
            return $this->especialidad;
        }
    }
?>