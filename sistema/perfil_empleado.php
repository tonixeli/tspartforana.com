<?php
	include "../conexion.php";
	include  "includes/scripts.php";
	include "includes/header.php";
	if(!empty($_POST))
	{
		$alert='';
		if( empty($_POST['clave1']) || empty($_POST['clave2'] ) )
		{
			$alert='<p class="msg_error">Los dos campos de contraseña son obligatorios</p>';
		}else{
			

			$id_empleado = $_POST['id_empleado'];
			$nombre = $_POST['nombre'];			
			$user   = $_POST['usuario'];
			$clave  = md5($_POST['clave1']);
			$clave2  = md5($_POST['clave2']);
			$id_rol    = $_POST['id_rol'];


				

			if($_POST['clave1'] == $_POST['clave2'] )
					{

						

						$sql_update = mysqli_query($conection, "UPDATE empleados 
																SET  clave = '$clave'
																WHERE id_empleado = $id_empleado");

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
	
	<title>Perfil del  Empleado</title>
</head>
<body>
	
	<section id="container">		
		<table>
			<?php				
			$nombre = $_SESSION["nombre"] ;
			$query = mysqli_query($conection, "SELECT id_empleado, nombre, correo, usuario, clave, cargo 	FROM empleados WHERE nombre = '$nombre' ");
				$result = mysqli_num_rows($query);
				if($result > 0){
					while ($data = mysqli_fetch_array($query)){
								?>
			<tr>
				<td hidden><?php echo $data["id_empleado"]; ?></td>
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
				<input type="hidden" name="id_empleado" value="<?php echo $_SESSION['id_empleado'] ?> " >
				<label for="nombre">Nombre</label>	
				<input type="text" name="nombre" id="nombre" placeholder="Apellidos,Nombre" value="<?php echo $_SESSION['nombre'] ?> " readonly>				
				<label for="usuario">Usuario</label>
				<input type="texto" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $_SESSION['user'] ?>" readonly>

				<label for="clave">Para cambiar contraseña debes introducir la nueva contraseña en las dos casillas</label>
				<input type="password" name="clave1" id="clave" placeholder="introduce aquí la nueva contraseña" value="" required="">
				<input type="password" name="clave2" id="clave" placeholder="introduce aquí la nueva contraseña" value="" required="">
				
					
				
				<input type="hidden" name="id_rol" value="<?php echo $id_rol; ?>" >

				<input type="submit" value="Actualizar usuario" class="btn_save">
				
			</form>
		</div>
	</section>		
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>