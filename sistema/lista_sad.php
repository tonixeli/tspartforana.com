<?php
	include "../conexion.php";
	include "includes/header.php"; 
	include  "includes/scripts.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<br><br><br><br>
	<title>Lista SAD</title>
</head>
<body>

	
	
		<br><br>
		<h1>Lista SAD</h1>
		<a href="registro_sad.php" class="btn_new">Nuevo SAD</a>
			<section id="container">
		
		<table>
		<tr>
			<td>
			<?php	
			if($_SESSION['id_rol'] == 1){
	

								
					$query_tfa = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE  id_empleado > 29 order by nombre ASC");
					$result_tfa= mysqli_num_rows($query_tfa);
				?>




				<form id="combo" name="combo" action="lista_sad.php" method="POST">
				<select name="tfa" id="tfa"  value="<?php echo $tfa; ?>" required>
						<option value="">Selecciona una TF</option>						
					<?php 
					if($result_tfa > 0)
					{
					while ($tfa = mysqli_fetch_array($query_tfa)){
						?>
						<option value="<?php echo $tfa['id_empleado']; ?>"><?php echo $tfa["nombre"] ?></option>
						<?php						
						}
					}
				
				?>




				
			</td> <td>
					<input type="submit" value="Aceptar" class="btn_sig">
				</form>
				</td>
			<td><a>Aqui puedes seleccionar a otro empleado para ver sus S.A.D.<br> Selecciona un empleado y click en Aceptar.</a></td>
			
			</tr>	
				<?php } ?>

				</table><table>
		
			<tr>
				<th>Empleado</th>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Fecha</th>
			<!-- <th>Categoria</th> -->
				<th>Duracion</th>
				<th>Acciones</th>
			</tr>


			<?php
			if (!empty($_POST))	{
				$empleado = $_POST["tfa"];
			}else {
				$empleado = $_SESSION["id_empleado"] ;
			}
				
					
					
					$fin = date("Y-m-d");
					$inicio = date("Y-m-01");
				

				
			
			

			$query = mysqli_query($conection, " SELECT s.id_sad AS idsad, e.nombre AS tf, l.nombre AS localidad, u.nombre as usuario, s.fecha, s.categoria, s.duracion 
													FROM sad AS s
													INNER JOIN localidades AS l ON l.id_localidad = s.id_localidad
													INNER JOIN usuarios AS u ON u.id_usuario = s.id_usuario
													INNER JOIN empleados AS e ON e.id_empleado = s.id_empleado
													WHERE s.id_empleado = $empleado AND fecha BETWEEN '$inicio' AND '$fin' ORDER BY fecha DESC");


				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data["tf"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td><?php echo $data["fecha"]; ?></td>
				
				<td><?php echo $data["duracion"]; ?></td>
                <td><form  class="form_eliminar"action="eliminar_sad.php" method="POST">
                               <input type="hidden" name="idsad" value="<?php echo $data["idsad"]; ?>" >
                               <input type="submit" value="Eliminar" class="btn"></td>
			 </form></td>

                        
            </tr>
			<?php
			}
		}
		?>			
		</table>		
	</section>

</body>
</html