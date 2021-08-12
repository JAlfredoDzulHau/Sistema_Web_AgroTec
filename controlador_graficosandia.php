<?php

	require 'modelo_graficosandia.php';

	$MG = new Modelo_Grafico();
	$consulta = $MG -> TraerDatosGraficoBar();
	echo json_encode($consulta);
?>