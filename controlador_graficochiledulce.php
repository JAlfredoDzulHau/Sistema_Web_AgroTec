<?php

	require 'modelo_graficochiledulce.php';

	$MG = new Modelo_Grafico();
	$consulta = $MG -> TraerDatosGraficoBar();
	echo json_encode($consulta);
?>