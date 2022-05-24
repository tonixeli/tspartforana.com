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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Obser...</th>
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
											
        			<td><?php echo $data["actividades"]; ?></td> 
        			<td><?php echo $data["observaciones"]; ?></td>    	
            	
               
		     
            </tr>

			<?php
			}

		}
}

		?>
			
		</table>
		
		
		
		
		
<!--***************************************************************************************************************
******************************************  cuadrante de  Tarde Entre emana ***************************************
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Obser...</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		
            	
           
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		
		
		
		
		
<!-- ******************************************************************************************************************************************
**************************************************************+Tarde_Entre_Semana_alternos*****************************************************
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		 
            	
         
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Obser...</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		 
            	
           
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		
		
		
		
		

<!-- **********************************************************************************************************************************************
***************************************************************Manana Sabados Alternos*************************************************************
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Obser...</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		
            	
           
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>


		

<!-- **************************************************************************************************************************************************
******************************************************************  Tarde del Sabado  *********************************************************************
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Obser...</th>
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

				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		
            	
           	
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		
		
		
		
<!-- **********************************************************************************************************************************************
******************************************************************Tarde  Sabados   alternos*********************************************************************
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observ...</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        		 
            	
           	
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>




		

<!-- *********************************************************************************************************************************************
*********************************************************************Manana Domingo***************************************************************
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           	
			       
            </tr>

			<?php
			}

		}

}
		?>
			
		</table>
		
		
		
<!-- *********************************************************************************************************************************************
*********************************************************************Manana Domingo alternos***************************************************************
************************************************************************************************************************************************ -->

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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
         
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
          
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
		
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        
            	
           	
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
       
            	
           
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				 <td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
        
            	
           	
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td> 
				<td><?php echo $dataTES["observaciones"]; ?></td>
            	
           	
			       
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
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Datos de Usuario</th>
				<th>Horario</th>
				<th>Actidades</th>
				<th>Observaciones</th>
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
				
				<td><?php echo $dataTES["actividades"]; ?></td>
				<td><?php echo $dataTES["observaciones"]; ?></td>
         
            	
           
			       
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