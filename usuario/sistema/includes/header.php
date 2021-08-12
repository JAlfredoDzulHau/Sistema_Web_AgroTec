<?php 

	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}
 ?>
	<header>
		<div class="header">
			
			<h3>AgroTec</h3> 
			<div class="optionsBar">
				<p>Calkiní, Campeche, México, a <?php echo fechac(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['user']; ?></span>
				<a href="https://agronomicsystem.jalfredodzulhau.com/bienvenida.php"><img class="close" src="img/home.png" alt="Inicio del sistema" title="Inicio"></a>
				<a href="salir.php"><img class="close" src="img/salir_02.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php include "nav.php"; ?>
	</header>