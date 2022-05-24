<!-- *******************************************************************************
                   recogemos la variable de trabajadora familiar 
	******************************************************************************** -->

<?php 

include "../conexion.php";
 include "includes/header.php";
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}

	if(!empty($_REQUEST))
	{
		$alert='';
		
		if  (
				empty($_POST['orden_sad']) 			||
			 	empty($_POST['tf']) 				|| 
				empty($_POST['pueblo']) 			|| 
				empty($_POST['usuario'])			|| 				
				empty($_POST['titulo_cuadrante']) 	||
				empty($_POST['horario_sad']) 		||
			 	empty($_POST['duracion_sad']) 		|| 
				empty($_POST['caracter_sad'])		|| 				
				empty($_POST['actividades']) 	
				

			)
		{

		

		}else{
			
			$orden_sad			= $_POST['orden_sad'];
			$tf 				= $_POST['tf'];
			$pueblo  			= $_POST['pueblo'];
			$usuario 			= $_POST['usuario'];			
			$titulo_cuadrante	= $_POST['titulo_cuadrante'];
			$horario_sad  		= $_POST['horario_sad'];
			$duracion_sad 		= $_POST['duracion_sad'];
			$caracter_sad		= $_POST['caracter_sad'];	
			$observaciones 		= $_POST['observaciones'];
			$actividades  		= $_POST['actividades'];
			
			 

				$query_insert = mysqli_query($conection, "INSERT INTO `cuadrantes` (`id_cuadrante`, `orden_sad`, `tf`, `pueblo`, `usuario`, `titulo_cuadrante`, `horario_sad`, `duracion_sad`, `caracter_sad`, `actividades`, `observaciones`) 
																					VALUES (NULL, '$orden_sad', '$tf', '$pueblo', '$usuario', '$titulo_cuadrante', '$horario_sad', '$duracion_sad', '$caracter_sad', '$actividades', '$observaciones')");

				if($query_insert){

				 $alert='<p class="msg_save">Enviado Correctamente.</p>';
				
				}else{

				$alert='<p class="msg_error">Error en el envio.</p>';
				

					 }
			}
		
	}

?>
<!-- *********************************************************************************
	        cabecera de la pagina header y menu tambien footer y JS 
	********************************************************************************** -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<?php  include  "includes/scripts.php"; ?>
	<title>Nuevo Cuadrante</title>
	<script language="javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>	
<?php include "includes/header.php"; ?>
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
<?php  $tf = $_REQUEST['tf'];  ?>
<br><table><tr><td><h3><?php echo $_POST["tf"]; ?></h3></td></tr></table><br>






<!--***********************************************************************************************************************
******************************************************  cuadrante de  Mañana Entre semana **********************************
*************************************************************************************************************************-->






			<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Entre Semana' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>
<br><table><tr><td><h3>Mañanas Entre Semana</h3></td></tr></table>
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
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Entre Semana' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				
				<td><?php echo $data["orden_sad"]; ?></td>
				<td><?php echo $data["pueblo"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $data["usuario"];
								$pueblo = $data["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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
		
		
		
		
		
<!--***************************************************************************************************************
******************************************  cuadrante de  Tarde Entre Semana ***************************************
*****************************************************************************************************************-->




				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Entre Semana' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tarde Entre Semana</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Entre Semana' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario' AND pueblo = '$pueblo'	");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		
		
		
		
		
<!-- ******************************************************************************************************************************************
**************************************************************Tarde_Entre_Semana_alternos*****************************************************
******************************************************************************************************************************************** -->



				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Entre Semana Alternos' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tarde Entre Semana Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Entre Semana Alternos' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td> 
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		 
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		

<!-- ***********************************************************************************************************************************
***************************************************************Manana Sabado*************************************************************
************************************************************************************************************************************* -->


				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Sabado' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Mañanas Sabado</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Sabado' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		 
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		
		
		
		
		

<!-- **********************************************************************************************************************************************
***********************************************Mañana Sabados Alternos*************************************************************
*********************************************************************************************************************************************** -->


				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Sabado Alternos' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Mañanas Sabado Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Sabado Alternos' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>


		

<!-- **************************************************************************************************************************************************
*****************************************************  Tarde del Sabado  *********************************************************************
************************************************************************************************************************************************** -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Sabado' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tarde Sabado</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Sabado' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario' AND pueblo = '$pueblo'	");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		
		
		
		
<!-- **********************************************************************************************************************************************
*****************************************Tarde  Sabados   alternos*********************************************************************
************************************************************************************************************************************************** -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Sabado Alternos' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tarde Sabado Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Sabado Alternos' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		 
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>




		

<!-- *********************************************************************************************************************************************
*******************************************Manana Domingo***************************************************************
************************************************************************************************************************************************ -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Domingo' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Mañanas Domingo</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Domingo' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'AND pueblo = '$pueblo'	");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		
		
		
<!-- *********************************************************************************************************************************************
*********************************************Mañana Domingo alternos*********************************************************
***************************************************************************************************************************************** -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Domingo Alternos' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Mañanas Domingo Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Domingo Alternos' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario' AND pueblo = '$pueblo'	");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>		
		

	<!-- ***********************************************************************************************************************************
	******************************************************************Tarde Domingo*********************************************************
	************************************************************************************************************************************ -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Domingo' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tarde Domingo</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Domingo' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario' AND pueblo = '$pueblo'	");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>	
		
		

	<!-- ***********************************************************************************************************************************
	******************************************************************Tarde Domingo alternos************************************************
	************************************************************************************************************************************ -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Domingo Alternos' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tardes Domingo Alternos</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Domingo Alternos' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'AND pueblo = '$pueblo'	");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>		
		
		
		
<!-- ****************************************************************************************************************************************
	***************************************************************************Manana Festivo*******************************************
	***************************************************************************************************************************************** -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Festivo' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Mañanas Festivo</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Festivo' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>	

<!-- ********************************************************************************************************************************************
*************************************************************+Tarde Festivo Local ************************************************************
********************************************************************************************************************************************* -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Festivo' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tarde Festivo</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Festivo' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario' AND pueblo = '$pueblo'	");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>	
		
		
				
		

	<!-- ****************************************************************************************************************************************
	***************************************************************************Manana Festivo Local*******************************************
	***************************************************************************************************************************************** -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Festivo Local ' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Mañanas Festivo local</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Festivo Local' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
       
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>	

<!-- ********************************************************************************************************************************************
*************************************************************+Tarde Festivo Local ************************************************************
********************************************************************************************************************************************* -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Festivo Local' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tarde Festivo local</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Festivo Local' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				 <td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>	
		
		
		
		
		
		
	<!-- ****************************************************************************************************************************************
	***************************************************************************Manana Festivo Nacional *******************************************
	***************************************************************************************************************************************** -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Festivo Nacional ' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Mañanas Festivo Nacional</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Manana Festivo Nacional' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>	

<!-- ********************************************************************************************************************************************
*************************************************************+Tarde Festivo  Nacional ************************************************************
********************************************************************************************************************************************* -->

				<?php
		
			
			$tf = $_REQUEST["tf"];
			$query = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Festivo Nacional' order by orden_sad");

				$result = mysqli_num_rows($query);

				if($result > 0){

					
			?>

<br><table><tr><td><h3>Tarde Festivo local</h3></td></tr></table>
<table>
				
			
			<tr>
				<th>Orden</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Duracion</th>
				<th>Caracter</th>
				<th>Actividades</th>
				<th>Observaciones</th>
				<th>Editarr/Eliminar</th>
			</tr>


			<?php
		
			$empleado = $_SESSION["nombre"] ;	
			$tf = $_REQUEST["tf"];
			$queryTES = mysqli_query($conection, "SELECT *
												FROM cuadrantes WHERE  tf = '$tf' AND titulo_cuadrante = 'Tarde Festivo Nacional' order by orden_sad");

				$resultTES = mysqli_num_rows($queryTES);

				if($resultTES > 0){

					while ($dataTES = mysqli_fetch_array($queryTES)){
			?>

			<tr>
				
				<td><?php echo $dataTES["orden_sad"]; ?></td>
				<td><?php echo $dataTES["pueblo"]; ?></td>
				<td><?php echo $dataTES["usuario"]; ?></td>
				<td>
								<?php 

								$usuario = $dataTES["usuario"];
								$pueblo = $dataTES["pueblo"];

								$query_select = mysqli_query($conection,"SELECT * FROM  usuarios  WHERE nombre = '$usuario'	AND pueblo = '$pueblo'");
						
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

				<td><?php echo $dataTES["horario_sad"]; ?></td>
				<td><?php echo $dataTES["duracion_sad"]; ?></td> 
				<td><?php echo $dataTES["caracter_sad"]; ?></td>
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           	<td>
					<a class="link_edit" href="editar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_cuadrante.php?id_cuadrante=<?php echo $dataTES["id_cuadrante"]; ?>"> Eliminar </a>				
				</td>
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>	
		
		
		
		
		
		
<!-- ********************************************************************************************
		Formulario  POST para registro_cuadrante_2 aqui ya tenemos definida a la TF y
		 seleccionaremos orden sad, pueblo y usuario y lo enviamos a registro_cuadrante_3.php

	*********************************************************************************************-->


			<form id="combo" name="combo" action="registro_cuadrante_2.php" method="post">				
				
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

  segunda fila del formulario de recogida de datos para registro_cuadrante_2.php 
	que seran enviados a registro_cuadrante_3.phph 
*************************************************************************************************-->
	<tr>

<!--*********************************************************************************************

  en este input del formulario mostramos $tf es un input solo de lectura 

**************************************************************************************************-->

		<input type="hidden" name="tf" value="<?php  echo $tf ?>" placeholder="<?php echo $tf ?>" readonly>


<!--*********************************************************************************************

  Seleccionamos el orden del SAD dentro del cuadrante  de la TF agrupados por titulo
  
**************************************************************************************************-->
		<td>

			<select name="orden_sad" id="orden_sad" required>
					<option value="">0</option>
										<option 	value=""></option>
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
					$query_pueblo = mysqli_query($conection,"SELECT nombre FROM pueblos order by nombre ASC");
					$result_pueblo= mysqli_num_rows($query_pueblo);
				?>
				<select name="pueblo" id="pueblo"  value="<?php echo $pueblo; ?>"required>											
					<?php 
					if($result_pueblo > 0)
					{
					while ($pueblo = mysqli_fetch_array($query_pueblo)){
						?>
						<option value="<?php echo $pueblo["nombre"]; ?>"><?php echo $pueblo["nombre"] ?></option>
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
<?php include "includes/footer.php"; ?>
</body>
</html>