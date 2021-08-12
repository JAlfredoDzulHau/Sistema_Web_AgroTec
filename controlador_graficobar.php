<?php

	require 'modelo_grafico.php';

	$MG = new Model_Grafico();
	$consulta = $MG -> TraerDatosGraficoBar2();
	echo json_encode($consulta);
?>