<?php

include "../conexion.php";
include  "includes/scripts.php";
include "includes/header.php"; 


if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuevo Cuadrante</title>	
	<script language="javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
<div>
	
	<section id="container">
		<div class="form_cuadrante"></div>
			<br> <br>
			<h1>Nuevo Cuadrante</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>

<form id="combo" name="combo" action="registro_cuadrante_2.php" method="POST">
<table>
	<tr>
		<th>Tf</th>
		<th>Orden sad</th>		
		<th>Localidad</th>
		<th>Usuario</th>
		<th>Datos de usuario</th>
		<th>Titulo cuadrante</th>
		<th>Horario sad</th>
		<th>Duracion sad</th>
		<th>Tipo sad</th>
		<th>Caracter sad</th>
		<th>Actividades</th>
		<th>Observaciones</th>
	</tr>			
 <tr> 	
 	<td>		
				<?php					
					$query_tf = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf= mysqli_num_rows($query_tf);
				?>
				<select name="id_empleado" id="id_empleado"  value="<?php echo $id_empleado; ?>" required>
						<option value="">Selecciona una TF</option>						
					<?php 
					if($result_tf > 0)
					{
					while ($empleado = mysqli_fetch_array($query_tf)){
						?>
						<option value="<?php echo $empleado["id_empleado"]; ?>"><?php echo $empleado["nombre"] ?></option>
						<?php						
						}
					}
					?>					
				</select>
			</td>		
</tr></div>
</table>
<input type="submit" value="Siguiente" class="btn_sig">
</form>

</body>
</html>