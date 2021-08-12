<?php

	require 'modelo_graficocalabaza.php';

	$MG = new Modelo_Grafico();
	$consulta = $MG -> TraerDatosGraficoBar();
	echo json_encode($consulta);
?>