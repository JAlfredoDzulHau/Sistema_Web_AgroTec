<?php
	class Modelo_Grafico{
		private $conexion;
		function __construct()
		{
			require_once('conexionbecal.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }

		function TraerDatosGraficoBecal(){

			$sql = "SELECT Nombrec, TempMin, TempMax, TempOpt, humRel,humMin, humMax FROM Becal WHERE Nombrec='Chihua'";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
			
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}

	}
	
?>