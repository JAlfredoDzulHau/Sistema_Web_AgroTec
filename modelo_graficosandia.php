<?php
	class Modelo_Grafico{
		private $conexion;
		function __construct()
		{
			require_once('conexionsandia.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }


		function TraerDatosGraficoBar(){

			$sql = "SELECT Nombrec, TempMin, TempMax, TempOpt, humRel,humMin, humMax FROM cultivos WHERE Nombrec='Sandia'";	
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