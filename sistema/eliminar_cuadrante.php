<?php 

include "includes/scripts.php";
include "../conexion.php";
include "includes/header.php";

if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}

	if (!empty($_POST)) 
	{

		$id_cuadrante = $_POST['id_cuadrante'];
		$id_empleado = $_POST['id_empleado'];

		$query_delete = mysqli_query($conection, "DELETE FROM cuadrantes WHERE id_cuadrante= '$id_cuadrante'");
		

		if($query_delete){
			header("location: registro_cuadrante_2.php?id_empleado=<?php echo $id_empleado; ?>");

		}else{
			echo "Error al eliminar";
		}

	}

	if(empty($_GET['id_cuadrante']) )
	{
		header("location: registro_cuadrante_2.php");
	}else{

				$id_cuadrante = $_GET['id_cuadrante'];

		$query = mysqli_query($conection, "	SELECT 	c.id_cuadrante, 
													c.id_empleado, 
													e.nombre as empleado, 
													u.nombre as usuario, 
													l.nombre as localidad 
											FROM cuadrantes c
											INNER JOIN empleados e 		ON c.id_empleado 	= e.id_empleado
											INNER JOIN usuarios u 		ON c.id_usuario 	= u.id_usuario
											INNER JOIN localidades l 	ON c.id_localidad 	= l.id_localidad
											WHERE id_cuadrante = $id_cuadrante");

		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$id_cuadrante 	= $data['id_cuadrante'];
				$id_empleado 	= $data['id_empleado'];
				$empleado 		= $data['empleado'];
				$id_usuario 	= $data['id_usuario'];
				$usuario 		= $data['usuario'];
				$localidad 		= $data['localidad'];
				
			}
		}else{
			header("location: registro_cuadrante_2.php?id_empleado= $id_empleado;");
		}
		
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Eliminar Cuadrante</title>
</head>
<body>
	
	<section id="container">
		
		<div class="data_delete">
			
			<h2>¿Esta seguro de querer eliminar el registro de cuadrante?</h2>
			<p>Empleado: <span><?php echo $empleado ?></span></p>
			<p>Localidad: <span><?php echo $localidad ?></span></p>
			<p>Usuario: <span><?php echo $usuario ?></span></p>
			

			<form method="post" action="">
				<input type="hidden" name="id_cuadrante" value="<?php echo $id_cuadrante; ?>">
				<input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
				<a href="registro_cuadrante_2.php?id_empleado=<?php echo $id_empleado; ?>" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>

		</div>

	</section>

</body>
</html>