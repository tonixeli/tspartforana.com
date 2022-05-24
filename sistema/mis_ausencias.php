<!DOCTYPE html>
<html lang="es">



<!-- archgivos que afectan al contenido de la pagina WEB -->
<?php 
include "../conexion.php"; //archivo de conexion a la base de  datos
include "includes/header.php"; // cabecera comun a todas las paginas del sitio WEB
include  "includes/scripts.php"; // escripts del sitio WEB
 ?>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>	<!-- tipo de caracteres usados-->
	<title>Mis Ausencias</title> <!-- tiutlo de la pagina -->

</head>



<body>
	
<section id="container">	
<!--   brs para crear un espacio en la cabecera de la pagina  -->		
<br><br><br><br><br>
<h1>Mis de Ausencias</h1>
<table>
	<tr>
		<td>
<!-- 	condicional para filtrar  usuarios administradores si es un usuario administrador se aplicara el codigo 
		y se podra editar cualquier empleado si no es un  usuario administrador solo podra ver las ausencias propias -->			
			<?php	
					if($_SESSION['id_rol'] == 1){	
						//query para extraer el nombre del empleado del cual tenemos la id 					
						$query_empleado = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados order by nombre ASC");
						$result_empleado= mysqli_num_rows($query_empleado);

			?>

<!-- formulario para la seleccion de un empleado -->
			<form id="combo" name="combo" action="mis_ausencias.php" method="POST">
				<select name="id_empleado" id="id_empleado"  value="<?php echo $id_empleado; ?>" required>
					<option value="">Selecciona un empleado</option>						
					<?php 
					if($result_empleado > 0){
						while ($empleado = mysqli_fetch_array($query_empleado)){
						?> <option value="<?php echo $empleado['id_empleado']; ?>"><?php echo $empleado["nombre"] ?></option> <?php						
						}
					}
					?> 
		</td> 
		<td>
			<input type="submit" value="Aceptar" class="btn_sig">
		</td>
		<td>
			<a>Aquí puedes seleccionar a otro empleado para ver sus ausencias.<br> Selecciona un empleado y click en Aceptar.</a></td>	
			</form>				
	</tr>	
			<?php } ?>
		<table><!-- tabla para mostrar las ausencias de  determinado empleado -->
			<tr> <!-- primera fila y cabecerra de la tabla  -->				
				<th>Empleado</th>						<!-- titulo uno empleado -->
				<th>Tipo Ausencia</th>					<!-- titulo dos tipo de ausencia-->
				<th>Fecha Inicio</th>					<!-- titulo tres fecha de inicio -->
				<th>Fecha Fin</th>						<!-- titulo cuatro fecha de fin -->
				<th>Total Dias</th>						<!-- campo calculado el cual muestra cuantos dias tiene determinadoa ausencia -->
				<?php	if($_SESSION['id_rol'] == 1){ 	// comprobacion de que el usuario es un administrador?> 
				<th>Modificaciones</th> 				<!-- si el usuario es administrador se desplegara el titulo cinco  de modificaciones -->
				<?php } ?>
			</tr>			
				<?php
					if (!empty($_REQUEST))	{ 						//si el POST no esta vacio se crea la variable id_empleado
					$id_empleado = $_REQUEST["id_empleado"]; 			//creacion de la variable id_empleado
					}else {  									// en caso contrario la variable id_empleado sera la del empleado que ha iniciado sesion
					$id_empleado = $_SESSION["id_empleado"] ; 	//creacion de lka variable id_empleado del usuario que ha iniciado sesion
					}
/** Query para obtener todas las ausencias de  determinado empleado correspondiente con id_empleado, la query afecta a las tablas empleados
(para obtener el "nombre" del empleado y a la tabla ausencias" tipo_ausencia" "fecha_inicio" y " fecha_fin"*/
					$query = mysqli_query($conection, "	SELECT 	a.id_ausencia,
																a.id_empleado, 
																e.nombre as empleado, 
																a.tipo_ausencia, 
																a.fecha_inicio, 
																a.fecha_fin 
														FROM ausencias a INNER JOIN empleados e ON a.id_empleado=e.id_empleado
														WHERE a.id_empleado = $id_empleado 
														ORDER BY fecha_inicio ASC");
					$result = mysqli_num_rows($query);
						if($result > 0){

						while ($data = mysqli_fetch_array($query)){
				?>
			<tr>
				<?php 	$id_ausencia = $data["id_ausencia"];
						$empleado = $data["empleado"]; //creamos variable nombre_empleado para formulario crear nueva ausencia ?>
				<td><?php echo $data["empleado"]; 				//primer campo de la tabla el cual muestra el nombre del empleado?></td> 
				<td><?php echo $data["tipo_ausencia"]; 			//segundo campo de la tabla el cual muestra el tipo de ausencia?></td>
				<td><?php echo $data["fecha_inicio"]; 			//tercer campo de la tabla para mostrar fecha de inicio?></td>
				<td><?php echo $data["fecha_fin"]; 				//cuarto campo de la tabla para mostrar fecha de fin?></td>	
			
				
				<td><?php 
					$id_ausencia = $data["id_ausencia"]; //recogemos  la variable id_ausencia	del select anterior para calcular el numero de dias de a ausencia	
/** En la siguiente query calculamos el numero de dias desde la fecha_inicio de la ausencia asta la fecha_fin  para ello usamos la funcion datediff necesita como primer parametro el nombre de la tabla punto la fecha mas nuva y el nombre de la tabla punto la fecha mas antigua a esta funcion hay que añadir le 1 dia porque calcula de las 00.00 horas del primer dia alas 00.00 horas del ultimo dia*/				
				$query2 = mysqli_query($conection, " 	SELECT DATEDIFF(ausencias.fecha_fin, ausencias.fecha_inicio) + 1 AS dias 
														FROM ausencias 
														WHERE id_ausencia = $id_ausencia");
				$result2 = mysqli_num_rows($query2);
						if($result2 > 0){//comprobacion de que el resultado es mayor que 0 para ejecutar el while
						while ($data2 = mysqli_fetch_array($query2)){ //while para el calculo de los dias totales de la ausencia
			?>
			
					<?php echo $data2["dias"]; 				//recuperacion de la variable dias que hace referencia al total de dias de la ausencia			?>
				<?php


				}
				}		
					
					
						?>
						</td>
						<?php	if($_SESSION['id_rol'] == 1){ //comprobacion de la id_rol para el aceso  a editar y eliminar ausencia?> 
				<td>
					
				<a class="link_delete" href="eliminar_ausencia.php?id_ausencia=<?php echo $data["id_ausencia"]; ?>, id_empleado=<?php echo $data["id_empleado"]; ?>"> Eliminar </a>	
				
				</td>
				<?php	}
			}
				
				}		?>
				
            </tr>
			<?php
		
		if($_SESSION['id_rol'] == 1){
		?>			
		</table>		
</section>

			<form id="registro_ausencias" name="registro_ausencias" action="registro_ausencias.php" method="POST">				
				
<table><h3>Registrar Ausencia</h3>
<!--*********************************************************************************************

 Cabecera de la tabla del formulario de nuevo registro_cuadrante

************************************************************************************************-->
	<tr>


		<th>Empleado</th>		
		<th>Tipo Ausencia</th>
		<th>Fecha Inicio</th>
		<th>Fecha Fin</th>
			

	</tr>
<!--********************************************************************************************


*************************************************************************************************-->
	<tr>

<!--*********************************************************************************************

**************************************************************************************************-->
<td>
		
		<input type="hidden" name="id_empleado" value="<?php echo $id_empleado ?>" >
		<?php $query_empleado = mysqli_query($conection,"SELECT id_empleado, nombre FROM empleados WHERE id_empleado = '$id_empleado'");
			$result = mysqli_num_rows($query_empleado);
						if($result > 0){

						while ($data = mysqli_fetch_array($query_empleado)){
				?>
			
				<?php 	
						$empleado = $data["nombre"]; 
				}}
		?>
		<input type="text" name="empleado" value="<?php echo $empleado ?>" placeholder="<?php echo $empleado ?>" readonly>
</td>

<!--*********************************************************************************************

  Seleccionamos el orden del SAD dentro del cuadrante  de la TF agrupados por titulo
  
**************************************************************************************************-->
		<td>

			<select name="tipo_ausencia" id="tipo_ausencia" required>
					<option 	value="">Selecciona un tipo de ausencia</option>				
					<option 	value="Vacaciones">	Vacaciones</option>
					<option 	value="Dias Personales">Dias Personales</option>
					<option 	value="Hospitalizacion de un Familiar">Hospitalizacion de un Familiar</option>
					<option 	value="Matrimonio">Matrimonio</option>

			</select>
		</td>
		<td>
				<div>
			
				<input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de Inicio"  required>

				</div>
		</td>
		<td>
				<div>
				
				<input type="date" name="fecha_fin" id="fecha_fin" placeholder="Fecha de Fin"  required>

				</div>	
					

		</td>
			
	</tr>
	</section>
</table>
<input type="submit" value="Registrar" class="btn_sig">
</form><?php } ?>	
<?php include "includes/footer.php" ?>
</body>
</html