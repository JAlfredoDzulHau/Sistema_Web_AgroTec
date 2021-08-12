<?php 
	
	$host = '127.0.0.1';
	$user = 'cp37c4ac995';
	$password = '49a5095bbdef747565cf7f11a0a33554c631f9a3';
	$db = 'cp37c4ac995';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexión";
	}

?>