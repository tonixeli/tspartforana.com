<?php	include "../conexion.php";
session_start();
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
					$query_tf = mysqli_query($conection,"SELECT nombre FROM empleados WHERE rol = '5' order by nombre ASC");
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