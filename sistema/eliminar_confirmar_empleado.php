<?php 

include  "includes/scripts.php"; 
include "includes/header.php";	
include "../conexion.php";
include "includes/footer.php";

if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}
	if (!empty($_POST)) 
	{
		IF($_POST["id_empleado"] == 1){
			header("location: lista_empleados.php");
			exit;
		}
		$id_empleado = $_POST['id_empleado'];
		$fecha_baja = $_POST['fecha_baja'];		
		$query_delete = mysqli_query($conection, "UPDATE empleados SET estatus = 0, fecha_baja = '$fecha_baja'WHERE id_empleado = $id_empleado");
		if($query_delete){
			header("location: lista_empleados.php");
		}else{
			echo "Error al eliminar";
		}
	}
	if(empty($_REQUEST['id_empleado']) || $_REQUEST['id_empleado'] == 1)
	{
		header("location: lista_empleados.php");
	}else{
		$id_empleado = $_REQUEST['id_empleado'];
		$query = mysqli_query($conection, "	SELECT e.id_empleado, e.nombre, e.usuario, r.rol
											FROM empleados e 
											INNER JOIN rol r 
											ON e.id_rol = r.id_rol 
											WHERE e.id_empleado = $id_empleado");
		$result = mysqli_num_rows($query);
		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$nombre 	= $data['nombre'];
				$usuario 	= $data['usuario'];
				$rol 		= $data['rol'];
				
			}
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
				
			<h2>¿Esta seguro de querer eliminar el registro?</h2>
			<p>	Nombre: 			<span>		<?php echo $nombre ?>		</span></p>
			<p>	Empleado: 			<span>		<?php echo $usuario ?>		</span></p>
			<p>	Tipo de Empleado: 	<span>		<?php echo $rol ?>			</span></p>
			

			<form method="post" action=""   method="POST">
				<input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
				<label for="fecha_baja" >Introduzca la Fecha de Baja</label>				
					<input type="date" name="fecha_baja" id="fecha_baja"  required >			
				<a href="lista_empleados.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>

		</div>
	</section>	
</body>
</html>