<?php

	require 'modelo_graficobecal2.php';

	$MG = new Modelo_Grafico();
	$consulta = $MG -> TraerDatosGraficoBecal();
	echo json_encode($consulta);


?>