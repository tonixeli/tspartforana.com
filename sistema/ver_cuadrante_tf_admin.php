<!-- *******************************************************************************
                   recogemos la variable de trabajadora familiar 
	******************************************************************************** -->

<?php 

include "../conexion.php";
include  "includes/scripts.php"; 
include "includes/header.php";




if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}

	

?>
<!-- *********************************************************************************



	        cabecera de la pagina header y menu tambien footer y JS 



	********************************************************************************** -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>Nuevo Cuadrante</title>
	<script language="javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>	

	<section id="container">
		<div class="form_cuadrante"></div>
			<h1>Cuadrante</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>
		<a class="btn_sig" href="registro_cuadrante.php ">Selecciona otra TF</a><br>

<!-- **********************************************************************************
		Listado de Cuadrantes de $tf separados por $titulo_cuadrante
		y ordenados por $orden_sad
	*********************************************************************************** -->
<?php  $id_empleado = $_POST['id_empleado'];  



 $query_empl = mysqli_query($conection,"SELECT  nombre FROM empleados WHERE id_empleado = $id_empleado");
 while ($empl = mysqli_fetch_array($query_empl)) {
			
		 								 $emplea  =$empl['nombre'] ; 
		 									
		
											} ?>

<br><h2>Trabajadora Familiar :<?php echo  $emplea; ?></h2>
<!--***********************************************************************************************************************
******************************************************  cuadrante de  Mañana Entre semana **********************************
*************************************************************************************************************************-->
<!--  cuadrante de  Mañana Entre semana -->


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
												AND titulo_cuadrante = 'Manana Entre Semana' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Mañana Entre Semana  </h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
												AND titulo_cuadrante = 'Manana Entre Semana' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
			
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>
<!-- *****************************************+Tarde Entre Semana******************************************************************* -->

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
												AND titulo_cuadrante = 'Tarde Entre Semana' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Tarde Entre Semana</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
												AND titulo_cuadrante = 'Tarde Entre Semana' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
			
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>
<!-- *****************************************   Tarde Entre Semana Alternos  **************************************************** -->

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
												AND titulo_cuadrante = 'Tarde Entre Semana Alternos' 
												order by orden_sad"); 

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Tarde Entre Semana Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
												AND titulo_cuadrante = 'Tarde Entre Semana Alternos' 
												order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
			
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>		
<!-- *****************************************Manana Sabado******************************************************************* -->

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
<br><table><tr><td><h3>Mañana Sabado</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>

<!-- *****************************************Manana Sabado Alternos******************************************************************* -->

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
<br><table><tr><td><h3>Mañana Sabado Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
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
<br><table><tr><td><h3>Tarde Sabado</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
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
<br><table><tr><td><h3>Tarde Sabado Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
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
<br><table><tr><td><h3>Mañana Domingo</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
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
<br><table><tr><td><h3>Mañana Domingo Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
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
<br><table><tr><td><h3>Tarde Domingo</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
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
<br><table><tr><td><h3>Tarde Domingo Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
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
<br><table><tr><td><h3>Mañana Festivo</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
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
<br><table><tr><td><h3>Tarde Festivo</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Localidad</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actividades</th>
				<th>Observaciones</th>
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
				<td><?php echo $data["actividades"]; ?></td>               
				<td><?php echo $data["observaciones"]; ?></td>
            	
            	
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>		


<!--****************************************************************************************************************************************
****************************************************scripts para buscar los usuarios de un pueblo ******************************************
*****************************************************************************************************************************************-->


<script type="text/javascript">
	$(document).ready(function(){
		$('#pueblo').val(1);
		recargarLista();
		$('#pueblo').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:'POST',
			url:"datos.php",
			data:"pueblo=" + $('#pueblo').val(),
			success:function(r){
				$('#selectusuario').html(r);	
			}
		});
	}
</script>

</body>
</html>