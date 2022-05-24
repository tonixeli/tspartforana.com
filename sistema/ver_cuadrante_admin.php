<?php
	
include  "includes/scripts.php";
include "../conexion.php";
include "includes/header.php";

session_start();
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
		<a class="btn_sig" href="ver_cuadrante_admin.php ">TSpartforana.com</a>
			<h1>Nuevo Cuadrante</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>
			<form id="combo" name="combo" action="ver_cuadrante_tf_admin.php" method="POST">
<table>
	<tr>
				<th>tf</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
		
	</tr>			
 <tr> 	
 	<td>		
				<?php					
					$query_tf = mysqli_query($conection,"SELECT id_empleado, nombre as empleado FROM empleados WHERE id_rol = 5 order by nombre ASC");
					$result_tf= mysqli_num_rows($query_tf);
				?>
				<select name="id_empleado" id="id_empleado"  value="<?php echo $empleado; ?>" required>
						<option value="">Selecciona una TF</option>						
					<?php 
					if($result_tf > 0)
					{
					while ($tf = mysqli_fetch_array($query_tf)){
						?>
						<option value="<?php echo $tf["id_empleado"]; ?>"><?php echo $tf["empleado"] ?></option>
						
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
<?php include "includes/footer.php"; ?>
</body>
</html>