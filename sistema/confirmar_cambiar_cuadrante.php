<?php 

include  "includes/scripts.php"; 
include "includes/header.php";	
include "../conexion.php";
include "includes/footer.php";


	if (!empty($_POST)) 
	{
		$id_empleado = $_POST['id_empleado'];
		$id_empleado_2 = $_POST['id_empleado_2'];	
		$query_update = mysqli_query($conection, "UPDATE cuadrantes SET id_empleado = $id_empleado_2 WHERE id_empleado = $id_empleado");
		if($query_update){
			header("location: registro_cuadrante_2.php");
		}else{
			echo "Error al eliminar";
		}
	}

		$id_empleado = $_REQUEST['id_empleado'];
		$query = mysqli_query($conection, "	SELECT e.id_empleado, e.nombre
											FROM empleados e 											
											WHERE e.id_empleado = $id_empleado");
		$result = mysqli_num_rows($query);
		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$nombre 	= $data['nombre'];
				
			
				
			}
		}
		$id_empleado_2 = $_REQUEST['id_empleado_2'];
		$query = mysqli_query($conection, "	SELECT e.id_empleado, e.nombre
											FROM empleados e 											
											WHERE e.id_empleado = $id_empleado_2");
		$result = mysqli_num_rows($query);
		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$nombre_2 	= $data['nombre'];
				
			
				
			}
		}		
	
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>	
	<title>Eliminar Empleado</title>
</head>
<body>	<br><br><br><br><br><br><br><br>
	<section id="container">		
		<div class="form_register">	
				
			<h2>¿Esta seguro de querer cambiar el empleado del cuadrante? este paso será irreversible.</h2>
			<p>	Nombre del empleado actual: 			<span>		<?php echo $nombre ?>		</span></p>
			<p>	Nombre del empleado posterior al cambio: 			<span>		<?php echo $nombre_2 ?>		</span></p>
			
			

			<form method="post" action=""   method="POST">
				<input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">					
				<a href="registro_cuadrante.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>

		</div>
	</section>	
</body>
</html>