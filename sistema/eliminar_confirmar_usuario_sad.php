<?php 

include "../conexion.php";
include  "includes/scripts.php";
include "includes/header.php"; 
include "includes/footer.php";

if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}

	if (!empty($_POST)) 
	{
		 $id_usuario = $_POST['id_usuario'];
		 $baja = $_POST['baja'];

		
			$query_update = mysqli_query($conection, "UPDATE usuarios SET baja = '$baja', estatus = 0 WHERE id_usuario = $id_usuario");

		if($query_update){
			header("location: lista_usuarios.php");
		}else{
			echo "Error al eliminar";
		}

	}





	if(empty($_REQUEST['id']))
	{
		header("location: lista_usuarios.php");
	}else{

		

		$id_usuario = $_REQUEST['id'];

		$query = mysqli_query($conection, "SELECT u.id_usuario, u.nombre as nom, u.id_localidad, l.id_localidad, l.nombre as poble
												FROM usuarios u 
												INNER JOIN localidades l 
												ON u.id_localidad = l.id_localidad
												WHERE u.id_usuario = $id_usuario");
		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$nom = $data['nom'];
				$poble = $data['poble'];
				$id_usuario = $data['id_usuario'];
				
			}
		}else{
			header("location: lista_usuarios.php");
		}
		
	}

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	
	<title>Eliminar Usuario</title>
</head>
<body>
	<br><br><br><br><br><br><br><br>
	<section id="container">
		
		<div class="form_register">
			<br><br>
			<h2>¿Esta Ud. seguro de querer dar de baja al usuario?</h2>
			<p>Nombre: <span><?php echo $nom ?></span></p>
			<p>Localidad: <span><?php echo $poble ?></span></p>
			<p>ID Usuario: <span><?php echo $id_usuario ?></span></p>
			

			<form method="post" action="">
				
				<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
				
				<label for="baja" >Introduzca la Fecha de Baja</label>				
					<input type="date" name="baja" id="baja"  required >
				
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				
				<input type="submit" value="Aceptar" class="btn_ok">
				
			</form>
		</div>
	</section>	
</body>
</html>