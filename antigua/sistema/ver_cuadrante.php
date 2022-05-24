<DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php 

	 include  "includes/scripts.php";
	 include "../conexion.php";
	  ?>
	<title>cuadrante</title>

</head>

<body>
	<?php 

	include "includes/header.php";

	 ?>
<div id="container.cuadrante">

	<br><br><br><br><br><br>
	<?php $tf = $_SESSION["nombre"] ; ?>
<br><table><tr><td><h3><?php echo $tf = $_SESSION["nombre"] ; ?></h3></td></tr></table><br>

<!--  cuadrante de  Mañana Entre emana -->


		<?php
		
			
			
			$tf = $_SESSION["nombre"] ;
			$query = mysqli_query($conection, "SELECT *  FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Entre Semana' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Mañana Entre Semana</h3></td></tr></table>
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
		
			
			$tf = $_SESSION["nombre"] ;
			$query = mysqli_query($conection, "SELECT * FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Entre Semana' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
			
				<td><?php echo $data["pueblo"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $data["usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
		
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 
	
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
		
			$tf = $_SESSION["nombre"] ;
			
			
			$query = mysqli_query($conection, "SELECT * FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Entre Semana' order by orden_sad");

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
		
			$tf = $_SESSION["nombre"] ;	
			
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Entre Semana' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
		
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 
	
							</td>

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>               
				<td><?php echo $dataTES["observaciones"]; ?></td>
            	
           
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>

<!-- *****************************************Manana Sabado******************************************************************* -->

		<?php
		
			$tf = $_SESSION["nombre"] ;
			
			
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Sabado' order by orden_sad");

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
		
			$tf = $_SESSION["nombre"] ;	
			
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Sabado' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
		
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 
	
							</td>
				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>               
				<td><?php echo $dataTES["observaciones"]; ?></td>
            	
           	
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>

		<!-- *****************************************Tarde Sabado******************************************************************* -->
	<?php
		
			$tf = $_SESSION["nombre"] ;
			
			
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Sabado' order by orden_sad");

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
		
			$tf = $_SESSION["nombre"] ;	
		
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Sabado' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
		
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 
	
							</td>

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>               
				<td><?php echo $dataTES["observaciones"]; ?></td>
        
            	
         
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>

<!-- *****************************************Manana Domingo******************************************************************* -->
	<?php
		
			$tf = $_SESSION["nombre"] ;
			
		
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Domingo' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Manaña Domingo</h3></td></tr></table>
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
		
			$tf = $_SESSION["nombre"] ;	
			
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Domingo' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
		
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 
	
							</td>

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>               
				<td><?php echo $dataTES["observaciones"]; ?></td>			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>

	<!-- *****************************************Tarde Domingo******************************************************************* -->
	<?php
		
			$tf = $_SESSION["nombre"] ;
			
		
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Domingo' order by orden_sad");

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
		
			$tf = $_SESSION["nombre"] ;	
			
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Domingo' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	");
						
								$result_sql = mysqli_num_rows($query_select);

									if($result_sql != 0){
										
										while ($data2 = mysqli_fetch_array($query_select)) {
			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;

		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;

											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;
		
											}
										}

		 
								?>


										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>

										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>

			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>

 
	
							</td>

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>               
				<td><?php echo $dataTES["observaciones"]; ?></td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>	

	<!-- *****************************************Manana Festivo****************************************************************** -->		
				<?php		
			$tf = $_SESSION["nombre"] ;		
			$query = mysqli_query($conection, "SELECT * FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Festivo' order by orden_sad");
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
			$tf = $_SESSION["nombre"] ;		
			$queryTES = mysqli_query($conection, "SELECT * 	FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Festivo' order by orden_sad");
				$resultTES = mysqli_num_rows($queryTES);
				if($resultTES > 0){
					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>
			<tr>				
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php
								$usuario = $dataTES["usuario"];
								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	");						
								$result_sql = mysqli_num_rows($query_select);
									if($result_sql != 0){										
										while ($data2 = mysqli_fetch_array($query_select)) {			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;
		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;
											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;		
											}
										}		 
								?>
										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>
										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>
			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>	
							</td>
				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>               
				<td><?php echo $dataTES["observaciones"]; ?></td>			       
            </tr>
			<?php
			}
		}
		}
		?>			
		</table>
<!-- *****************************************+Tarde Festivo******************************************************************* -->
				<?php		
			$tf = $_SESSION["nombre"] ;
			$query = mysqli_query($conection, "SELECT * FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Festivo' order by orden_sad");
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
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>
			<?php		
			$tf = $_SESSION["nombre"] ;	
			$queryTES = mysqli_query($conection, "SELECT * FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Festivo' order by orden_sad");
				$resultTES = mysqli_num_rows($queryTES);
				if($resultTES > 0){
					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>
			<tr>				
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 
								$usuario = $dataTES["usuario"];
								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	");						
								$result_sql = mysqli_num_rows($query_select);
									if($result_sql != 0){										
										while ($data2 = mysqli_fetch_array($query_select)) {			
		 									$direccion  =$data2['direccion'] ; 
		 									$telefono  =$data2['telefono'] ;
		 									$nombre_familiar  =$data2['nombre_familiar'] ; 
		 									$telefono_familiar =$data2['telefono_familiar'] ;
											$nombre_familiar_2  =$data2['nombre_familiar2'] ; 
		 									$telefono_familiar_2 =$data2['telefono_familiar2'] ;		
											}
										}		 
								?>
										<p> <?php echo $direccion ; ?> </p>
										<p> <?php echo $telefono ; ?> </p>
										<p> <?php echo $nombre_familiar ; ?> </p>
										<p> <?php echo $telefono_familiar ; ?> </p>
			 							<p> <?php echo $nombre_familiar_2 ; ?> </p>
										<p> <?php echo $telefono_familiar_2 ; ?> </p>	
				</td>
				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>               
				<td><?php echo $dataTES["observaciones"]; ?></td> 			       
            </tr>
			<?php
			}
		}

}
		?>			
		</table>
<!-- ******************************************************************************************************************************-->
		<br><br>
</div>
	<?php include "includes/footer.php" ?>
</body>

</html>