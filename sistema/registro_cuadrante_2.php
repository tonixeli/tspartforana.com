<!-- *******************************************************************************
                   recogemos la variable de trabajadora familiar 
	******************************************************************************** -->

<?php 
include  "includes/scripts.php";
include "../conexion.php";
include "includes/header.php";


if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}

	if(!empty($_POST))
	{
		$alert='';
		
		if  (
				empty($_POST['orden_sad']) 			||
			 	empty($_POST['id_empleado']) 		|| 
				empty($_POST['id_localidad']) 		|| 
				empty($_POST['id_usuario'])			|| 				
				empty($_POST['titulo_cuadrante']) 	||
				empty($_POST['horario_sad']) 		||
			 	empty($_POST['duracion_sad']) 		|| 
				empty($_POST['caracter_sad'])		|| 				
				empty($_POST['actividades']) 	
				

			)
		{

		

		}else{
			
			$orden_sad			= $_POST['orden_sad'];
			$id_empleado 		= $_POST['id_empleado'];
			$id_empleado_2 		= $_POST['id_empleado_2'];
			$id_localidad  		= $_POST['id_localidad'];
			$id_usuario 		= $_POST['id_usuario'];			
			$titulo_cuadrante	= $_POST['titulo_cuadrante'];
			$horario_sad  		= $_POST['horario_sad'];
			$duracion_sad 		= $_POST['duracion_sad'];
			$caracter_sad		= $_POST['caracter_sad'];	
			$observaciones 		= $_POST['observaciones'];
			$actividades  		= $_POST['actividades'];
			
			 

				$query_insert = mysqli_query($conection, "INSERT INTO `cuadrantes` (`id_cuadrante`, `orden_sad`, `id_empleado`, `id_empleado_2`, `id_localidad`, `id_usuario`, `titulo_cuadrante`, `horario_sad`, `duracion_sad`, `caracter_sad`, `actividades`, `observaciones`) 
																					VALUES (NULL, '$orden_sad', '$id_empleado', '$id_empleado_2', '$id_localidad', '$id_usuario', '$titulo_cuadrante', '$horario_sad', '$duracion_sad', '$caracter_sad', '$actividades', '$observaciones')");

				if($query_insert){

				 $alert='<p class="msg_save">Enviado Correctamente.</p>';
				
				}else{

				$alert='<p class="msg_error">Error en el envio.</p>';
				

					 }
			}
		
}


	

?>
<!-- *********************************************************************************
	        cabecera de la pagina 
	********************************************************************************** -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>Cuadrantes</title>
	<script language="javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>	

	<section id="container">
		<div class="form_cuadrante"></div>
		<br><br>	<h1>Cuadrante</h1>





<?php
		if (isset($_POST["id_empleado_2"])) {
			$id_empleado = $_POST["id_empleado"];
			$id_empleado_2 = $_POST["id_empleado_2"];		
			$query_tf_2 = mysqli_query($conection,"SELECT  id_empleado, nombre FROM empleados WHERE id_empleado = $id_empleado_2");
			$result_sql_2 = mysqli_num_rows($query_tf_2);

									if($result_sql_2 != 0){
										
										while ($emp = mysqli_fetch_array($query_tf_2)) {
			
		 									$id_empleado_2  =$emp['id_empleado'] ; 
		 									$nombre_2  =$emp['nombre'] ; 	 									
		
											}}
												 
			
			echo "id_empleado = $id_empleado" ;									
			echo "id_empleado_2 = $id_empleado_2" ;	
			echo "nombre_2 = $nombre_2";

			$query_update_2 = mysqli_query($conection, "UPDATE cuadrantes SET id_empleado = $id_empleado_2 WHERE id_empleado = $id_empleado");

					if($query_update_2){

				 		$alert='<p class="msg_save">Actualizado Correctamente.</p>';
				
					}else{

						$alert='<p class="msg_error">Error en la actualizacion.</p>';



					}
		}

		if (isset($_POST["id_empleado_3"])) {
			$id_empleado = $_POST["id_empleado"];
			$id_empleado_3 = $_POST["id_empleado_3"];		
			$query_tf_3 = mysqli_query($conection,"SELECT  id_empleado, nombre FROM empleados WHERE id_empleado = $id_empleado_3");
			$result_sql_3 = mysqli_num_rows($query_tf_3);

									if($result_sql_3 != 0){
										
										while ($emp = mysqli_fetch_array($query_tf_3)) {
			
		 									$id_empleado_3  =$emp['id_empleado'] ; 
		 									$nombre_3  =$emp['nombre'] ; 	 									
		
											}}
												 
			
			echo "id_empleado = $id_empleado" ;									
			echo "id_empleado_3 = $id_empleado_3" ;	
			echo "nombre_3 =$nombre_3";

			$query_update_3 = mysqli_query($conection, "UPDATE cuadrantes SET id_empleado_2 = $id_empleado_3 WHERE id_empleado = $id_empleado");

					if($query_update_3){

				 		$alert='<p class="msg_save">Actualizado Correctamente.</p>';
				
					}else{

						$alert='<p class="msg_error">Error en la actualizacion.</p>';



					}
		}

?>



			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>
		<br><br><a class="btn_sig" href="registro_cuadrante.php ">Selecciona otra TF</a><br>
<!-- **********************************************************************************
		Listado de Cuadrantes de $tf separados por $titulo_cuadrante
		y ordenados por $orden_sad
	*********************************************************************************** -->
<?php  $id_empleado = $_REQUEST['id_empleado'];  ?>





								<?php 

					

									

								$query_select = mysqli_query($conection,"SELECT id_empleado, nombre FROM  empleados  WHERE id_empleado = '$id_empleado'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($emp = mysqli_fetch_array($query_select)) {
											$id_empleado = $emp['id_empleado'];
		 									$nombre  =$emp['nombre'] ; 	 									
		
											}
										}

								$query_select_2 = mysqli_query($conection,"SELECT id_empleado, id_empleado_2 FROM  cuadrantes  WHERE id_empleado = '$id_empleado'	");
						
								$result_sql_2 = mysqli_num_rows($query_select_2);
									$id_empleado_2 = 'no tiene sustituta';
									if($result_sql_2 != 0){
										
										while ($emp_2 = mysqli_fetch_array($query_select_2)) {
			
		 									$id_empleado_2  =$emp_2['id_empleado_2'] ; 	 									
		
											}
									}

								$query_select_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM  empleados  WHERE id_empleado = '$id_empleado_2'	");
						
								$result_sql_3 = mysqli_num_rows($query_select_3);
									$nombre_3 = 'no tiene sustituta';
									if($result_sql_3 != 0){
										
										while ($emp_3 = mysqli_fetch_array($query_select_3)) {
			
		 									$nombre_3  =$emp_3['nombre'] ; 	 									
		
											}
										}
		

								?>

<br><table><tr>	<td><h3>TF Referencia :<?php echo "$nombre"; ?></h3></td>
				<td><h3>TF Suplentes :<?php echo "$nombre_3"; ?></h3></td>




				<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>


		
<!--***********************************************************************************************************************
******************************************************  cuadrante de  Mañana Entre semana **********************************
*************************************************************************************************************************-->


		<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  (c.id_empleado = '$id_empleado'  OR c.id_empleado_2 = '$id_empleado' )
												AND titulo_cuadrante = 'Manana Entre Semana' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr>	<td><h1>Mañana Entre Semana</h1></td></tr><tr>






<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar Mañana Entre Semana a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir Mañana Entre Senmana con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>

</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad,  
												c.duracion_sad,  
												c.caracter_sad,  
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  (c.id_empleado = '$id_empleado'  OR c.id_empleado_2 = '$id_empleado' )
												AND titulo_cuadrante = 'Manana Entre Semana' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>
										<p> <?php echo $estado ; ?> </p>
 
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td> 
				<td><?php echo $data["caracter_sad"]; ?></td>
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>
<!-- **********************************************************************************************************************************
*******************************************************cuadrante Tarde Entre Semana****************************************************
************************************************************************************************************************************* -->

		<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  (c.id_empleado = '$id_empleado'  OR c.id_empleado_2 = '$id_empleado' )
												AND titulo_cuadrante = 'Tarde Entre Semana' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table>		<tr><td><h3>Tarde Entre Semana</h3></td>
				
<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>




</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE   ( c.id_empleado = '$id_empleado'  OR c.id_empleado_2 = '$id_empleado' )
												AND titulo_cuadrante = 'Tarde Entre Semana' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 										<p> <?php echo $estado ; ?> </p>
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>
<!-- *****************************************************************************************************************************************
****************************************************** cuadrante  Tarde Entre Semana Alternos  ***********************************************
******************************************************************************************************************************************* -->

		<?php
		
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  (c.id_empleado = '$id_empleado'  OR c.id_empleado_2 = '$id_empleado' )
												AND titulo_cuadrante = 'Tarde Entre Semana Alternos' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Tarde Entre Semana Alternos</h3></td>
<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>

</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  (c.id_empleado = '$id_empleado'  OR c.id_empleado_2 = '$id_empleado' ) 
												AND titulo_cuadrante = 'Tarde Entre Semana Alternos' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 										<p> <?php echo $estado ; ?> </p>
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>		
<!-- *************************************************************************************************************************************
*******************************************************cuadrante Manana Sabado************************************************************
************************************************************************************************************************************** -->

		<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Sabado' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Mañana Sabado</h3></td>
<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>


</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Sabado' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 										<p> <?php echo $estado ; ?> </p>
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>

<!-- ***************************************************************************************************************************
***********************************************cuadrante Manana Sabado Alternos**************************************************
***************************************************************************************************************************** -->

		<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Sabado Alternos' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Mañana Sabado Alternos</h3></td>


<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>



</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Sabado Alternos' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 										<p> <?php echo $estado ; ?> </p>
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>


		<!-- *****************************************Tarde Sabado******************************************************************* -->
	<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Sabado' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Tarde Sabado</h3></td>

<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>


</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Sabado' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>
										<p> <?php echo $estado ; ?> </p>
 
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>

		<!-- *****************************************Tarde Sabado******************************************************************* -->
	<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Sabado Alternos' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Tarde Sabado Alternos</h3></td>

<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>





</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
		
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Sabado Alternos' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 										<p> <?php echo $estado ; ?> </p>
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>

<!-- *****************************************Manana Domingo******************************************************************* -->
	<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Domingo' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Mañana Domingo</h3></td>


<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>


</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Domingo' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>
										<p> <?php echo $estado ; ?> </p>
 
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>

<!-- *****************************************Manana Domingo Alternos******************************************************************* -->
	<?php
		
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Domingo Alternos' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Mañana Domingo Alternos</h3></td>


<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>




</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Domingo Alternos' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 										<p> <?php echo $estado ; ?> </p>
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>


	<!-- *****************************************Tarde Domingo******************************************************************* -->
	<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Domingo' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Tarde Domingo</h3></td>

<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>




</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Domingo' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>
										<p> <?php echo $estado ; ?> </p>
 
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>
			
	<!-- ***********************************Tarde Domingo Alternos******************************************************************* -->
	<?php
		
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Domingo Alternos' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Tarde Domingo Alternos</h3></td>


<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>




</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Domingo Alternos' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 										<p> <?php echo $estado ; ?> </p>
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>	

	<!-- *****************************************Manana Festivo****************************************************************** -->		
				<?php
		
			
			
		
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Festivo' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Mañana Festivo</h3></td>


<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>


</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
			
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Manana Festivo' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>
										<p> <?php echo $estado ; ?> </p>
 
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>

<!-- *****************************************Tarde Festivo****************************************************************** -->		
				<?php
		
			
			
			
			$query = mysqli_query($conection, "	SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad,
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Festivo' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Tarde Festivo</h3></td>

<td><form id="reasignacion" name="empleado_2" action="confirmar_cambiar_cuadrante.php" method="POST"><h3>Reasignar todo a :
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_2 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_2= mysqli_num_rows($query_tf_2);
				?>
				<select name="id_empleado_2" id="id_empleado_2"  value="<?php echo $id_empleado_2; ?>" required>
						<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_tf_2 > 0)
					{
					while ($empleado_2 = mysqli_fetch_array($query_tf_2)){
						?>
						<option value="<?php echo $empleado_2["id_empleado"]; ?>"><?php echo $empleado_2["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3><input type="submit" value="Aceptar" class="btn_sig"></form></td>








				<td><form id="reasignacion" name="empleado_3" action="" method="POST"><h3>Compartir todo con :</h3>
					<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>
					<?php					
					$query_tf_3 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_3= mysqli_num_rows($query_tf_3);
				?>
				<select name="id_empleado_3" id="id_empleado_3"  value="<?php echo $id_empleado_3; ?>" required>
						<option value="NULL">Sin Asignación</option>						
					<?php 
					if($result_tf_3 > 0)
					{
					while ($empleado_3 = mysqli_fetch_array($query_tf_3)){
						?>
						<option value="<?php echo $empleado_3["id_empleado"]; ?>"><?php echo $empleado_3["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_4 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_4= mysqli_num_rows($query_tf_4);
				?>
				<select name="id_empleado_4" id="id_empleado_4"  value="<?php echo $id_empleado_4; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_4 > 0)
					{
					while ($empleado_4 = mysqli_fetch_array($query_tf_4)){
						?>
						<option value="<?php echo $empleado_4["id_empleado"]; ?>"><?php echo $empleado_4["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3>
				<?php					
					$query_tf_5 = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE estatus = 1  AND id_empleado > 29 order by nombre ASC");
					$result_tf_5= mysqli_num_rows($query_tf_5);
				?>
				<select name="id_empleado_5" id="id_empleado_5"  value="<?php echo $id_empleado_5; ?>" required>
						<option value="NULL">Sin Asignacion</option>						
					<?php 
					if($result_tf_5 > 0)
					{
					while ($empleado_5 = mysqli_fetch_array($query_tf_5)){
						?>
						<option value="<?php echo $empleado_5["id_empleado"]; ?>"><?php echo $empleado_5["nombre"] ?></option>
						<?php						
						}
					}
					?>		
				</select></h3></td><td><input type="submit" value="Aceptar" class="btn_sig">
			</form></td>

</tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actidades</th>
				<th>Observaciones</th>
				<th>Editar/Eliminar</th>
			</tr>

			<?php
		
			
		
			$query = mysqli_query($conection, "SELECT 
												c.id_cuadrante,	
												c.orden_sad,
												c.id_usuario,
												c.id_localidad, 
												e.nombre as empleado, 
												l.nombre as localidad, 
												u.nombre as usuario, 
												c.titulo_cuadrante, 
												c.horario_sad, 
												c.duracion_sad, 
												c.caracter_sad, 
												c.actividades, 
												c.observaciones  
												FROM cuadrantes c 
												INNER JOIN empleados e 		ON c.id_empleado = e.id_empleado
												INNER JOIN localidades l 	ON c.id_localidad = l.id_localidad
												INNER JOIN usuarios u 		ON c.id_usuario = u.id_usuario
												WHERE  c.id_empleado = '$id_empleado' 
												AND titulo_cuadrante = 'Tarde Festivo' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$id_usuario = $data["id_usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE id_usuario = '$id_usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
											$estado =$data2['estado'] ;
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 										<p> <?php echo $estado ; ?> </p>
	
							</td>

				<td><?php echo $data["horario_sad"]; ?></td>
				<td><?php echo $data["duracion_sad"]; ?></td>
				<td><?php echo $data["caracter_sad"]; ?></td> 
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $data["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>		
<!-- ******************************************************************************************************************************-->
		<br><br>


			<form id="combo" name="combo" action="registro_cuadrante_2.php" method="POST">				
				
<table><h3>Nuevo Cuadrante</h3>
<!--*********************************************************************************************

 Cabecera de la tabla del formulario de nuevo registro_cuadrante

************************************************************************************************-->
	<tr>
		
		<th>Orden SAD</th>		
		<th>Localidad</th>
		<th>Usuario</th>
		<th>Titulo Cuadrante</th>
		<th>Horario SAD</th>
		<th>Duracion SAD</th>
		<th>Caracter SAD</th>
		<th>Actividades</th>
		<th>Observaciones</th>	

	</tr>
<!--********************************************************************************************


*************************************************************************************************-->
	<tr>

<!--*********************************************************************************************

**************************************************************************************************-->

		<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" placeholder="<?php echo $id_empleado ?>" readonly>


<!--*********************************************************************************************

  Seleccionamos el orden del SAD dentro del cuadrante  de la TF agrupados por titulo
  
**************************************************************************************************-->
		<td>

			<select name="orden_sad" id="orden_sad" required>
					<option 	value="">	0</option>
				
					<option 	value="1">	1</option>
					<option 	value="2">	2</option>
					<option 	value="3">	3</option>
					<option 	value="4">	4</option>
					<option 	value="5">	5</option>
					<option 	value="6">	6</option>
					<option 	value="7">	7</option>
					<option 	value="8">	8</option>
					<option 	value="9">	9</option>
				
					<option 	value="10">	10</option>
					<option 	value="11">	11</option>
					<option 	value="12">	12</option>
					<option 	value="13">	13</option>
					<option 	value="14">	14</option>
					<option 	value="15">	15</option>
					<option 	value="16">	16</option>
					<option 	value="17">	17</option>
					<option 	value="18">	18</option>
					<option 	value="19">	19</option>
				
					<option 	value="20">	20</option>
					<option 	value="21">	21</option>
					<option 	value="22">	22</option>
					<option 	value="23">	23</option>
					<option 	value="24">	24</option>
					<option 	value="25">	25</option>
					<option 	value="26">	26</option>
					<option 	value="27">	27</option>
					<option 	value="28">	28</option>
					<option 	value="29">	29</option>
				
					<option 	value="30">	30</option>
					
					
				</select>
		</td>
	<td>
				<?php					
					$query_localidad = mysqli_query($conection,"SELECT id_localidad, nombre FROM localidades order by nombre ASC");
					$result_localidad= mysqli_num_rows($query_localidad);
				?>
				<select name="id_localidad" id="id_localidad"  value="<?php echo $id_localidad; ?>"required>											
					<?php 
					if($result_localidad > 0)
					{
					while ($localidad = mysqli_fetch_array($query_localidad)){
						?>
						<option value="<?php echo $localidad["id_localidad"]; ?>"><?php echo $localidad["nombre"] ?></option>
						<?php						
						}
					}
					?>					
				</select></td> 
		<td><div id="selectusuario"  required></div>	</td>
				
				</select></td>
				
					<td> 
									<select class="select_cuadrante" name="titulo_cuadrante" id="titulo_cuadrante" required>

											<option value="">Selecciona un titulo cuadrante</option>
										
											<option value="Manana Entre Semana">Mañanas Entre Semana</option>
											<option value="Tarde Entre Semana">Tardes Entre Semana</option>
											<option value="Tarde Entre Semana Alternos">Tardes Entre Semana Alternos</option>
										
											<option value="Manana Sabado">Mañanas Sabados</option>
											<option value="Manana Sabado Alternos">Mañanas Sabados Alternos</option>
											<option value="Tarde Sabado">Tardes Sabados</option>
											<option value="Tarde Sabado Alternos">Tardes Sabados Alternos</option>
										
											<option value="Manana Domingo">Mañanas Domingos</option>
											<option value="Manana Domingo Alternos">Mañanas Domingos Alternos</option>
											<option value="Tarde Domingo">Tardes Domingos</option>
											<option value="Tarde Domingo Alternos">Tardes Domingos Alternos</option>
										
											<option value="Manana Festivo">Mañanas Festivos</option>
											<option value="Tarde Festivo">Tardes Festivos</option>											
									</select>		

									</select>


							</td>
				
				<td>

					<textarea type="comentario" name="horario_sad" id="horario_sad"  rows="10" cols="30" required></textarea>


				</td>	
				<td>
					
					<select name="duracion_sad" id="duracion_sad" required>
											<option value="">0</option>
											<option value="0,25">0,25</option>
											<option value="0,50">0,50</option>
											<option value="0,75">0,75</option>

											<option value="1,00">1,00</option>
											<option value="1,25">1,25</option>
											<option value="1,50">1,50</option>
											<option value="1,75">1,75</option>

											<option value="2,00">2,00</option>
											<option value="2,25">2,25</option>
											<option value="2,50">2,50</option>
											<option value="2,75">2,75</option>

											<option value="3,00">3,00</option>
											<option value="3,25">3,25</option>
											<option value="3,50">3,50</option>
											<option value="3,75">3,75</option>

											<option value="4,00">4,00</option>
											<option value="4,25">4,25</option>
											<option value="4,50">4,50</option>
											<option value="4,75">4,75</option>

											<option value="5,00">5,00</option>
											<option value="5,25">5,25</option>
											<option value="5,50">5,50</option>
											<option value="5,75">5,75</option>

											<option value="6,00">6,00</option>
											<option value="6,25">6,25</option>
											<option value="6,50">6,50</option>
											<option value="6,75">6,75</option>

											<option value="7,00">7,00</option>
											<option value="7,25">7,25</option>
											<option value="7,50">7,50</option>
											<option value="7,75">7,75</option>

											<option value="8,00">8,00</option>
											<option value="8,25">8,25</option>
											<option value="8,50">8,50</option>
											<option value="8,75">8,75</option>

											<option value="9,00">9,00</option>
											<option value="9,25">9,25</option>
											<option value="9,50">9,50</option>
											<option value="9,75">9,75</option>

											<option value="10,00">10,00</option>
											<option value="10,25">10,25</option>
											<option value="10,50">10,50</option>
											<option value="10,75">10,75</option>

											<option value="11,00">11,00</option>
											<option value="11,25">11,25</option>
											<option value="11,50">11,50</option>
											<option value="11,75">11,75</option>

											<option value="12,00">12,00</option>
											<option value="12,25">12,25</option>
											<option value="12,50">12,50</option>
											<option value="12,75">12,75</option>
						
											<option value="13,00">13,00</option>
											<option value="13,25">13,25</option>
											<option value="13,50">13,50</option>
											<option value="13,75">13,75</option>

											<option value="14,00">14,00</option>
											<option value="14,25">14,25</option>
											<option value="14,50">14,50</option>
											<option value="14,75">14,75</option>

											<option value="15,00">15,00</option>
											<option value="15,25">15,25</option>
											<option value="15,50">15,50</option>
											<option value="15,75">15,75</option>

											<option value="16,00">16,00</option>
											<option value="16,25">16,25</option>
											<option value="16,50">16,50</option>
											<option value="16,75">16,75</option>

											
											<option value="17,00">17,00</option>
											<option value="17,25">17,25</option>
											<option value="17,50">17,50</option>
											<option value="17,75">17,75</option>

											<option value="18,00">18,00</option>
											<option value="18,25">18,25</option>
											<option value="18,50">18,50</option>
											<option value="18,75">18,75</option>

											<option value="19,00">19,00</option>
											<option value="19,25">19,25</option>
											<option value="19,50">19,50</option>
											<option value="19,75">19,75</option>

											<option value="20,00">20,00</option>
											<option value="20,25">20,25</option>
											<option value="20,50">20,50</option>
											<option value="20,75">20,75</option>

											<option value="21,00">21,00</option>
											<option value="21,25">21,25</option>
											<option value="21,50">21,50</option>
											<option value="21,75">21,75</option>

											<option value="22,00">22,00</option>
											<option value="22,25">22,25</option>
											<option value="22,50">22,50</option>
											<option value="22,75">22,75</option>
						
											<option value="23,00">23,00</option>
											<option value="23,25">23,25</option>
											<option value="23,50">23,50</option>
											<option value="23,75">23,75</option>

											<option value="24,00">24,00</option>
											<option value="24,25">24,25</option>
											<option value="24,50">24,50</option>
											<option value="24,75">24,75</option>
											
											
											<option value="25,00">25,00</option>
											<option value="25,25">25,25</option>
											<option value="25,50">25,50</option>
											<option value="25,75">25,75</option>

											<option value="26,00">26,00</option>
											<option value="26,25">26,25</option>
											<option value="26,50">26,50</option>
											<option value="26,75">26,75</option>

											
											<option value="27,00">27,00</option>
											<option value="27,25">27,25</option>
											<option value="27,50">27,50</option>
											<option value="27,75">27,75</option>

											<option value="28,00">28,00</option>
											<option value="28,25">28,25</option>
											<option value="28,50">28,50</option>
											<option value="28,75">28,75</option>

											<option value="29,00">29,00</option>
											<option value="29,25">29,25</option>
											<option value="29,50">29,50</option>
											<option value="29,75">29,75</option>

											<option value="30,00">30,00</option>
											
									</select>



				</td>
				<td>
					
						<select name="caracter_sad" id="caracter_sad" required>
											<option value="">Caracter SAD</option>
											<option value="Ordinario">Ordinario</option>
											<option value="Extraordinario">Extraordinario</option>
					
									</select>


				</td>	
				<td>
					
					<textarea type="comentario" name="actividades" id="actividades"  rows="10" cols="30" required  ></textarea>

				</td>
				<td>
					
					<textarea type="comentario" name="observaciones" id="observaciones" rows="10" cols="30" ></textarea>


				</td>	
				</tr>	
	</section>
</table>
<input type="submit" value="Siguiente" class="btn_sig">
</form>

<!--****************************************************************************************************************************************
****************************************************scripts para buscar los usuarios de un pueblo ******************************************
*****************************************************************************************************************************************-->


<script type="text/javascript">
	$(document).ready(function(){
		$('#id_localidad').val(1);
		recargarLista();

		$('#id_localidad').change(function(){
			recargarLista();
		});
	})
</script>

<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:'POST',
			url:"datos.php",
			data:"id_localidad=" + $('#id_localidad').val(),
			success:function(r){
				$('#selectusuario').html(r);
			
			}
		});
	}
</script>
<?php include "includes/footer.php"; ?>
</body>
</html>