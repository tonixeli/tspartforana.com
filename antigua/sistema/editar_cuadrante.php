
<!-- *******************************************************************************
             
	******************************************************************************** -->

<?php 


include "../conexion.php";
 include "includes/header.php";
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}


	if(!empty($_POST))
	{
			
			 $id_cuadrante			= $_POST['id_cuadrante'];
			 $orden_sad					= $_POST['orden_sad'];
			 $tf 								= $_POST['tf'];
			 $pueblo  					= $_POST['pueblo'];
			 $usuario 					= $_POST['usuario'];			
			 $titulo_cuadrante	= $_POST['titulo_cuadrante'];
			 $horario_sad  			= $_POST['horario_sad'];
			 $duracion_sad 			= $_POST['duracion_sad'];
			 $caracter_sad			= $_POST['caracter_sad'];			
			 $actividades  			= $_POST['actividades'];
			 $observaciones 		= $_POST['observaciones']; 

				$query_insert = mysqli_query($conection, " 	UPDATE cuadrantes
																										SET 
																										orden_sad = '$orden_sad',
																										tf = '$tf',
																										pueblo = '$pueblo',
																										usuario = '$usuario',
																										titulo_cuadrante = '$titulo_cuadrante',
																										horario_sad = '$horario_sad',
																										duracion_sad = '$duracion_sad',
																										caracter_sad = '$caracter_sad',
																										actividades = '$actividades',
																										observaciones = '$observaciones'
																										WHERE id_cuadrante = '$id_cuadrante' ");

				if($query_insert){
					
					
				 $alert='<p class="msg_save">Enviado Correctamente.</p>';
				
				}else{

				$alert='<p class="msg_error">Error en el envio.</p>';
				

					 }
			}
		


?>
<!-- *********************************************************************************
	       
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
<?php include "includes/header.php"; 
	 $tf = $_REQUEST['tf'];?>
	<section id="container"><br><br>
		<a class="btn_sig" href="registro_cuadrante_2.php?tf=<?php echo $tf; ?>">REGRESAR AL CUADRANTE </a>
		<div class="form_cuadrante"></div>
			<h1>Cuadrante</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>


<!-- ********************************************************************************************
	

	*********************************************************************************************-->


<form id="combo" name="combo" action="" method="post">				
				
<table><h3>Modifica Cuadrante</h3> 



	<?php


 $id_cuadrante = $_REQUEST['id_cuadrante'];
$sql= mysqli_query($conection, "SELECT * FROM cuadrantes   WHERE id_cuadrante = $id_cuadrante");
$result_sql = mysqli_num_rows($sql);


	if($result_sql == 0){
		header('location: registro_cuadrante_2.php');
	}else{
	

		$option = '';
		while ($data = mysqli_fetch_array($sql)) {
			// code...
			$id_cuadrante 			= $data['id_cuadrante']; 
			$orden_sad					= $data['orden_sad'];
			$tf 								= $data['tf'];
	?>Pueblo :<?php	echo	$pueblo  				= $data['pueblo'];echo "<br>"; 
	?>Usuario :<?php	echo	$usuario 				= $data['usuario'] ;	
	
			$titulo_cuadrante	 	= $data['titulo_cuadrante'];
			$horario_sad  			= $data['horario_sad'];
			$duracion_sad 			= $data['duracion_sad'];
			$caracter_sad				= $data['caracter_sad']; 
			$observaciones 			= $data['observaciones'];
			$actividades  			= $data['actividades'];
			
		
		}
	}
?>	




	
<!--*********************************************************************************************

 

************************************************************************************************-->
	<tr>
		
		<th>TF</th>	
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
<td>
		<input type="hidden" name="id_cuadrante" value="<?php  echo $id_cuadrante ?>"  >
		<input type="text" name="tf" value="<?php  echo $tf ?>" readonly>

		
		<?php					
					$query_tf = mysqli_query($conection,"SELECT nombre FROM empleados order by nombre ASC");
					$result_tf= mysqli_num_rows($query_tf);
				?>
				<select name="tf" id="tf"  value="<?php echo $tf; ?>" required>
						<option value="$tf">Selecciona TF</option>						
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
<!--*********************************************************************************************

  
**************************************************************************************************-->
		<td>

			<select name="orden_sad" id="orden_sad" required>
					<option 	value=" <?php echo "$orden_sad"; ?> "> <?php echo "$orden_sad"; ?> </option>
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
				</select>
		</td>
	<td>
			<?php
					
					$query_pueblo = mysqli_query($conection,"SELECT nombre FROM pueblos order by nombre ASC");
					$result_pueblo= mysqli_num_rows($query_pueblo);

				?>


				<select name="pueblo" id="pueblo" required>
						

				<?php 
					if($result_pueblo > 0)
					{
					while ($pueblo = mysqli_fetch_array($query_pueblo)){
				?>
						<option value="<?php echo $pueblo["nombre"]; ?> "><?php echo $pueblo["nombre"] ?></option>
					<?php						
						}
					}
					?>					
				</select>
			</td> 
		<td><div id="selectusuario" required></div>	</td>
				
				</select></td>
				
					<td> 
									<select class="select_cuadrante" name="titulo_cuadrante" id="titulo_cuadrante" required>

											<option value="<?php echo "$titulo_cuadrante"; ?>"><?php echo "$titulo_cuadrante"; ?></option>
											<option value="Manana Entre Semana">Mañana Entre Semana</option>
											<option value="Tarde Entre Semana">Tarde Entre Semana</option>
											<option value="Tarde Entre Semana Alternos">Tarde Entre Semana Alternos</option>
											<option value="Manana Sabado">Mañana Sabado</option>
											<option value="Manana Sabado Alternos">Mañana Sabado Alternos</option>
											<option value="Tarde Sabado">Tarde Sabado</option>
											<option value="Tarde Sabado Alternos">Tarde Sabado Alternos</option>
											<option value="Manana Domingo">Mañana Domingo</option>
											<option value="Manana Domingo Alternos">Mañana Domingo Alternos</option>
											<option value="Tarde Domingo">Tarde Domingo</option>
											<option value="Tarde Domingo Alternos">Tarde Domingo Alternos</option>
											<option value="Manana Festivo">Mañana Festivo</option>
											<option value="Tarde Festivo">Tarde Festivo</option>
											
									</select>


							</td>
				
				<td>

					<textarea type="comentario" name="horario_sad" id="horario_sad"  rows="10" cols="30"  required><?php echo "$horario_sad"; ?></textarea>


				</td>	
				<td>
					
					<select name="duracion_sad" id="duracion_sad" required>
											<option value=" <?php echo "$duracion_sad"; ?> "> <?php echo "$duracion_sad"; ?> </option>
												
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
											<option value=" <?php echo "$caracter_sad"; ?> "> <?php echo "$caracter_sad"; ?> </option>
											<option value="Ordinario">Ordinario</option>
											<option value="Extraordinario">Extraordinario</option>
					
									</select>


				</td>	
				<td>
					
					<textarea type="comentario" name="actividades" id="actividades"   rows="10" cols="30" required>  <?php echo "$actividades"; ?></textarea>

				</td>
				<td>
					
					<textarea type="comentario" name="observaciones" id="observaciones"  rows="10" cols="30" > <?php echo "$observaciones"; ?></textarea>


				</td>	
				</tr>	
	</section>
</table>
<input type="submit" value="Siguiente" class="btn_sig">
</form>




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