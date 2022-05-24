<?php include "../conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php  include  "includes/scripts.php"; ?>
	<title>Mis Ausencias</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">	
		<?php 
		
		
		?>
		<h1>Lista de Ausencias</h1>
		<table>
		<tr>
			<td>
			<?php	
			if($_SESSION['rol'] == 1){
	

								
					$query_tfa = mysqli_query($conection,"SELECT nombre FROM empleados order by nombre ASC");
					$result_tfa= mysqli_num_rows($query_tfa);
				?>




				<form id="combo" name="combo" action="mis_ausencias.php" method="POST">
				<select name="tfa" id="tfa"  value="<?php echo $tfa; ?>" required>
						<option value="">Selecciona una TF</option>						
					<?php 
					if($result_tfa > 0)
					{
					while ($tfa = mysqli_fetch_array($query_tfa)){
						?>
						<option value="<?php echo $tfa["nombre"]; ?>"><?php echo $tfa["nombre"] ?></option>
						<?php						
						}
					}
					?> 
			</td> <td>
					<input type="submit" value="Aceptar" class="btn_sig">
				</form>
				</td>
			<td><a>Aqui puedes seleccionar a otro empleado para ver sus ausencias.<br> Selecciona un empleado y click en Aceptar.</a></td>
			
			</tr>	
				<?php } ?>


		<table>
			<tr>
				<th>Empleado</th>
				<th>Tipo Ausencia</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>Total Dias</th>
			</tr>
			
			<?php
			if ($_POST['tfa'])	{
				$empleado = $_POST['tfa'];
			}else {
				$empleado = $_SESSION["nombre"] ;
			}

			$query = mysqli_query($conection, "	SELECT * 
												FROM ausencias 
												WHERE empleado = '$empleado' 
												ORDER BY fecha_inicio ASC");
				$result = mysqli_num_rows($query);
						if($result > 0){
						while ($data = mysqli_fetch_array($query)){
			?>
			<tr>
					<td><?php echo $data["empleado"]; 							?></td>
					<td><?php echo $data["tipo_ausencia"]; 						?></td>
					<td><?php echo $data["fecha_inicio"]; 						?></td>
					<td><?php echo $data["fecha_fin"]; 							?></td>	
			
				
					<td><?php 
					$id_ausencia = $data["id_ausencia"]; 		
				
				$query2 = mysqli_query($conection, " SELECT DATEDIFF(ausencias.fecha_fin, ausencias.fecha_inicio) + 1 AS dias 
													FROM ausencias 
													WHERE id_ausencia = $id_ausencia");
				$result2 = mysqli_num_rows($query2);
						if($result2 > 0){
						while ($data2 = mysqli_fetch_array($query2)){
			?>
			
					<?php echo $data2["dias"]; 							?>
				<?php	
				}
				}		
					
					
						?>
				<?php	}
				}		?>
				</td>
				
            </tr>
			<?php
		
		
		?>			
		</table>		
	</section>
<?php include "includes/footer.php" ?>
</body>
</html