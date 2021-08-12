<?php

	require 'modelo_graficochilehabanero.php';

	$MG = new Modelo_Grafico();
	$consulta = $MG -> TraerDatosGraficoBar();
	echo json_encode($consulta);
?>