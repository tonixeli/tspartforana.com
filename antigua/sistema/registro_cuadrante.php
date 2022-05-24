<?php	include "../conexion.php";
 include "includes/header.php";
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuevo Cuadrante</title>
	<?php  include  "includes/scripts.php"; ?>
	<script language="javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
<div>
	<?php include "includes/header.php"; ?>
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
					$query_tf = mysqli_query($conection,"SELECT nombre FROM empleados order by nombre ASC");
					$result_tf= mysqli_num_rows($query_tf);
				?>
				<select name="tf" id="tf"  value="<?php echo $tf; ?>" required>
						<option value="">Selecciona una TF</option>						
					<?php 
					if($result_tf > 0)
					{
					while ($tf = mysqli_fetch_array($query_tf)){
						?>
						<option value="<?php echo $tf["nombre"]; ?>"><?php echo $tf["nombre"] ?></option>
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