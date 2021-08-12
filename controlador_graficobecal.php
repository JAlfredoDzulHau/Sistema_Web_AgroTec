<?php

	require 'modelo_graficobecal.php';

	$MG = new Modelo_Grafico();
	$consulta = $MG -> TraerDatosGraficoOptimo();
	echo json_encode($consulta);


?>