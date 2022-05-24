<?php
	include "../conexion.php";
	

	if(!empty($_POST))
	{
		$alert='';
		if( empty($_POST['clave1']) || empty($_POST['clave2'] ) )
		{
			$alert='<p class="msg_error">Los dos campos de contraseña son obligatorios</p>';
		}else{
			

			$idusuario = $_POST['idUsuario'];
			$nombre = $_POST['nombre'];			
			$user   = $_POST['usuario'];
			$clave  = md5($_POST['clave1']);
			$clave2  = md5($_POST['clave2']);
			$rol    = $_POST['rol'];


				

			if($_POST['clave1'] == $_POST['clave2'] )
					{

						

						$sql_update = mysqli_query($conection, "UPDATE empleados 
																SET  clave = '$clave'
																WHERE idusuario = $idusuario");

					}

					                                                      

				if($sql_update){
					$alert='<p class="msg_save">La contraseña a sido actualizada correctamente</p>';
				}else{
					$alert='<p class="msg_error">Las dos contraseñas no coinciden.</p>';
				}
			
		
	}}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php  include  "includes/scripts.php"; ?>
	<title>Perfil del  Empleado</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">		
		<table>
			<?php				
			$empleado = $_SESSION["nombre"] ;
			$query = mysqli_query($conection, "SELECT idusuario, nombre, correo, usuario, clave, cargo 	FROM empleados WHERE nombre = '$empleado' ");
				$result = mysqli_num_rows($query);
				if($result > 0){
					while ($data = mysqli_fetch_array($query)){
								?>
			<tr>
				<td hidden><?php echo $data["idusuario"]; ?></td>
				<td hidden><?php echo $data["nombre"]; ?></td>
			
				<td hidden><?php echo $data["usuario"]; ?></td>
				<td hidden><a>****************</a></td>
				<td hidden><?php echo $data["clave"]; ?></td>
				<td hidden><?php echo $data["cargo"]; ?></td>
			</tr>
			<?php
			}
		}

		?>			
		</table>
		<section id="container">
			
		<div class="form_register">
			<h1>Cambio de Contraseña</h1><hr>			
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>
			<form action="" method="post">
				<input type="hidden" name="idUsuario" value="<?php echo $_SESSION['idUser'] ?> " >
				<label for="nombre">Nombre</label>	
				<input type="text" name="nombre" id="nombre" placeholder="Apellidos,Nombre" value="<?php echo $_SESSION['nombre'] ?> " readonly>				
				<label for="usuario">Usuario</label>
				<input type="texto" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $_SESSION['user'] ?>" readonly>

				<label for="clave">Para cambiar contraseña debes introducir la nueva contraseña en las dos casillas</label>
				<input type="password" name="clave1" id="clave" placeholder="introduce aquí la nueva contraseña" value="" required="">
				<input type="password" name="clave2" id="clave" placeholder="introduce aquí la nueva contraseña" value="" required="">
				
					
				
				<input type="hidden" name="rol" value="<?php echo $rol; ?>" >

				<input type="submit" value="Actualizar usuario" class="btn_save">
				
			</form>
		</div>
	</section>		
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>