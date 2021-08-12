<?php
	class conexion{
		private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $conexion;
		public function __construct(){
		    $this->servidor = "127.0.0.1";
			$this->usuario = "cp37c4ac995";
			$this->contrasena = "49a5095bbdef747565cf7f11a0a33554c631f9a3";
			$this->basedatos = "cp37c4ac995";
		}
		function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			$this->conexion->set_charset("utf8");
		}
		function cerrar(){
			$this->conexion->close();	
		}
	}
?> 