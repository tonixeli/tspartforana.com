<?php 

	
	include "../conexion.php";
session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}

	if (!empty($_POST)) 
	{
		IF($_POST["idusuario"] == 1){
			header("location: lista_empleados.php");
			exit;
		}



		$idusuario = $_POST['idusuario'];

		//$query_delete = mysqli_query($conection,"DELETE FROM users WHERE idusuario = $idusuario");
		$query_delete = mysqli_query($conection, "UPDATE empleados SET estatus = 0 WHERE idusuario = $idusuario");

		if($query_delete){
			header("location: lista_empleados.php");
		}else{
			echo "Error al eliminar";
		}

	}





	if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1)
	{
		header("location: lista_empleados.php");
	}else{

		

		$idusuario = $_REQUEST['id'];

		$query = mysqli_query($conection, "SELECT e.nombre,e.usuario,r.rol
												FROM empleados e 
												INNER JOIN 
												rol r 
												ON e.rol = r.idrol 
												WHERE e.idusuario = $idusuario");
		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$nombre = $data['nombre'];
				$usuario = $data['usuario'];
				$rol = $data['rol'];
			}
		}else{
			header("location: lista_empleados.php");
		}

		
	}



 ?>





<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php  include  "includes/scripts.php"; ?>
	<title>Eliminar Empleado</title>
</head>
<body>
	<?php include "includes/header.php" ?>
	<section id="container">
		
		<div class="data_delete">
			
			<h2>¿Esta seguro de querer eliminar el registro?</h2>
			<p>Nombre: <span><?php echo $nombre ?></span></p>
			<p>Empleado: <span><?php echo $usuario ?></span></p>
			<p>Tipo de Empleado: <span><?php echo $rol ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
				<a href="lista_empleados.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>

		</div>



	</section>

	<?php include "includes/footer.php" ?>
</body>
</html>