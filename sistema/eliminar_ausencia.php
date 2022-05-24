<!DOCTYPE html>
<html>


<head>
<?php

include "includes/scripts.php";
include "../conexion.php";
include "includes/header.php";

?> 
<?php

	if (!empty($_POST)) 
	{

		$id_aus = $_POST['id_ausencia'];
		

		$query_delete = mysqli_query($conection, "DELETE FROM ausencias WHERE id_ausencia= '$id_aus'");
		

		if($query_delete){
			header("location: mis_ausencias.php?id_empleado=<?php echo $id_empleado; ?>");

		}else{
			echo "Error al eliminar";
		}

	}

	if(empty($_REQUEST['id_ausencia']) )
	{
		header("location: mis_ausencias.php");
	}else{

		$id_ausencia = $_REQUEST['id_ausencia'];
		$id_empleado = $_REQUEST['id_empleado'];
		$query = mysqli_query($conection, "	SELECT 	a.id_ausencia, 
													a.id_empleado, 
													e.nombre as empleado, 
													a.tipo_ausencia,
													a.fecha_inicio,
													a.fecha_fin
											FROM ausencias a
											INNER JOIN empleados e 	ON a.id_empleado = e.id_empleado 
											WHERE id_ausencia = '$id_ausencia'

											");

		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$id_ausencia 	= $data['id_ausencia'];
				$id_empleado 	= $data['id_empleado'];
				$empleado		= $data['empleado'];
				$tipo_ausencia 	= $data['tipo_ausencia'];
				$fecha_inicio 	= $data['fecha_inicio'];
				$fecha_fin 		= $data['fecha_fin'];
				
				
			}
		}else{
			header("location: mis_ausencias.php?id_empleado= $id_empleado;");
		}
		
	}

 ?>

	<title>eliminar_ausencia</title>
</head>
<body>
	</br></br></br>
<section id="container">
		
		<div class="data_delete">
			
			<h2>¿Esta seguro de querer eliminar el registro de ausencia?</h2>
			<p>Empleado: <span><?php echo $empleado ?></span></p>
			<p>Tipo de Ausencia: <span><?php echo $tipo_ausencia ?></span></p>
			<p>Fecha de Inicio: <span><?php echo $fecha_inicio ?></span></p>
			<p>Fecha de Fin: <span><?php echo $fecha_fin ?></span></p>

			<form method="POST" action="">
				<input type="hidden" name="id_ausencia" value="<?php echo $id_ausencia; ?>">
				<input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
				<a href="mis_ausencias.php?id_empleado=<?php echo $id_empleado; ?>" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>

		</div>

	</section>
</body>
</html>