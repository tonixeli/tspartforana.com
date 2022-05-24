<?php
	$alert = '';
	session_start();
	if(!empty($_SESSION['active'])){
		header('location: sistema/');
	}else{



	if (!empty($_POST)) {
		if (empty($_POST['usuario']) || empty($_POST['clave'])) 
		{
			$alert ='ingrese su usuario  su clave';
		}else{
			require_once "conexion.php";

			$user = mysqli_real_escape_string($conection,$_POST['usuario']);
			$pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

			$query = mysqli_query($conection,"SELECT * FROM empleados WHERE usuario= '$user' AND clave= '$pass' AND estatus= 1");
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);

				
				$_SESSION['active'] =	true;
				$_SESSION['idUser'] = 	$data['idusuario'];
				$_SESSION['nombre'] =	$data['nombre'];
				$_SESSION['email']  = 	$data['email'];
				$_SESSION['user']   =	$data['usuario'];
				$_SESSION['rol']    = 	$data['rol'];

				header('location:sistema/');
			}else{
				$alert ='El usuario o la clave son incorrectos';
				session_destroy();
			}

			}
		}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login | Treballadores Socials de la Part Forana S. COOP.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div><h3>Treballadores Socials de la Part Forana S. COOP.</h3></div>
  <section id="container">
  	 
  		<form action="" method="post">
  			
  			<h3>Iniciar Sesion</h3>
  			<img src="img/Login.png" alt="Login">

  			<input type="text" name="usuario" placeholder="Usuario">
  			<input type="password" name="clave" placeholder="Contraseña">
  			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
  			<input type="submit" value="INICIAR SESION">
			  
  			<img  class="centrado"   src="img/foto.png"  >

  		</form>

  </section>
	
</body>
</html>