<?php
	class Modelo_Grafico{
		private $conexion;
		function __construct()
		{
			require_once('conexiongraf.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }


		function TraerDatosGraficoBar(){


			/*
			$resultado =mysqli_query($conexion, "SELECT cultivos.HumOpt, terrenos.HumOpt FROM cultivos INNER JOIN terrenos on cultivos.Terrenos_id = terrenos.Terrenos_id");
			$row= mysqli_fetch_assoc($resultado);
			if($row['terrenos.HumOpt']>$row['cultivos.HumOpt'] || $row['terrenos.HumOpt']<$row['cultivos.HumOpt']){

					echo "string";$row['terrenos.HumOpt']- $row['cultivos.HumOpt']; 
					$arreglo[] = $row;
			}
			*/

			
			$sql = "SELECT Nombrec, TempMin, TempMax, TempOpt, humRel,humMin, humMax FROM cultivos WHERE Nombrec='Tomate'";	
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