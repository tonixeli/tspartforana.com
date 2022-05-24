<?php
session_start();

	if(empty($_SESSION['active'])){
		header('location: ../');
	}

?>
<meta charset="UTF-8"  >
<header>
		<div class="header">
			
			<h4>TREBALLADORES SOCIALS DE LA PART FORANA S. COOP.</h4>
			
			<div class="optionsBar">
				
				<span class="user"><?php echo $_SESSION['nombre'] ; ?></span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php include "nav.php"; ?>
	</header>