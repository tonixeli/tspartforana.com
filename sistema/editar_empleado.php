<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php  	include  "includes/scripts.php"; 
			include  "../conexion.php";
 			include  "includes/header.php";
	?>
	<title>Actualizar Empleado</title>
</head>
<?php
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['id_empleado']) )
		{
			$alert='<p class= "msg_error" >Error. El campo id_empleado esta vacio</p>';
		}else{	
			echo $id_empleado 				= 	$_POST['id_empleado'];
			echo $nombre 					= 	$_POST['nombre'];
			echo $dni  						= 	$_POST['dni'];
			echo $nss  						= 	$_POST['nss'];
			echo $correo      				=	$_POST['correo'];	
			echo $direccion  				= 	$_POST['direccion'];
			echo $localidad  				= 	$_POST['localidad'];
			echo $telefono    				= 	$_POST['telefono'];
			echo $tipo_contrato				= 	$_POST['tipo_contrato'];
			echo $cargo						= 	$_POST['cargo'];
			echo $id_rol					= 	$_POST['rol'];
			echo $fecha_nacimiento    		= 	$_POST['fecha_nacimiento'];
			echo $jornada_semanal    		= 	$_POST['jornada_semanal'];
			echo $salario_mensual    		= 	$_POST['salario_mensual'];           
			}			
					
			$query_insert = mysqli_query($conection, "UPDATE empleados SET nombre = '$nombre', dni = '$dni', nss = '$nss', correo = '$correo', direccion = '$direccion', localidad = '$localidad', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento', jornada_semanal = $jornada_semanal, id_rol = $id_rol, cargo = '$cargo', tipo_contrato = '$tipo_contrato' WHERE id_empleado = $id_empleado ");
				
			if($query_insert){
					$alert='<p class= "msg_save" >Empleado actualizado correctamente.</p>';
			}else{
					$alert='<p class= "msg_error" >Error al actualizar al empleado.</p>';				
			}	
	}
?>
<body>
	<?php 			
		$id_empleado = $_GET['id_empleado'];
		$sql= mysqli_query($conection, "SELECT e.id_empleado, e.nombre, e.dni, e.nss, e.correo, e.direccion, e.localidad, e.telefono, e.fecha_nacimiento, (e.id_rol) as id_rol, (r.rol) as rol, e.cargo, e.tipo_contrato, e.jornada_semanal, e.salario_mensual FROM empleados e INNER JOIN rol r  ON e.id_rol = r.id_rol WHERE id_empleado = $id_empleado");
		$result_sql = mysqli_num_rows($sql);
		if($result_sql == 0){
		header('location: lista_empleados.php');
		}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {			
			$id_empleado		= $data['id_empleado'];
			$nombre 			= $data['nombre'];
			$dni 				= $data['dni'];
			$nss				= $data['nss'];
			$correo				= $data['correo'];				
			$direccion 			= $data['direccion'];
			$localidad 			= $data['localidad'];
			$telefono 			= $data['telefono'];
			$fecha_nacimiento 	= $data['fecha_nacimiento'];
			$id_rol 			= $data['id_rol'];
			$rol 				= $data['rol'];
			$cargo 				= $data['cargo'];
			$tipo_contrato		= $data['tipo_contrato'];
			$jornada_semanal 	= $data['jornada_semanal'];
			$salario_mensual 	= $data['salario_mensual'];
			if($id_rol == 1){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 2){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 3){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 4){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 5){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 6){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 7){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 8){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 9){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}else if($id_rol == 10){
				$option = '<option value="'.$id_rol.'" select>'.$rol.'</option>';
			}				
			}
		}
	?>
	<section id="container">
		<div class="form_cuadrante">
                        <br>
			<h1>Actualizar Empleado</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>
                        <br>
			<form action="" method="POST">

		<table>
		
			<tr>
					<input type="hidden" name="id_empleado" id="idusuario"   value="<?php echo $id_empleado; ?>" >	

				<td>
					<label for="nombre">Nombre</label>	
					<input type="text" name="nombre" id="nombre"  value="<?php echo $nombre; ?>" required>	
				</td>
                                
				<td>
					<label for="dni">DNI</label>
					<input type="text" name="dni" id="dni" value="<?php echo $dni; ?>" required>
				</td>
				<td>
					<label for="fecha_nacimiento">Fecha de Nacimiento</label>
					<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>" >
				</td>
				<td>
					<label for="nss">NSS</label>
					<input type="text" name="nss" id="nss" value="<?php echo $nss; ?>" >
				</td>
				
			</tr>
                                
			<tr>
				<td>
					<label for="correo">Correo Electronico</label>
					<input type="text" name="correo" id="correo" value="<?php echo $correo; ?>"  >
				</td>
				<td>
					<label for="direccion">Direccion</label>
					<input type="text" name="direccion" id="direccion" value="<?php echo $direccion; ?>" >
				</td>	
				<td>
					<label for="localidad">Localidad</label>
					<input type="text" name="localidad" id="localidad" value="<?php echo $localidad; ?>" >
				</td>
				<td>
					<label for="telefono">Telefono</label>
					<input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>"  >
				</td>			
			</tr>
			<tr>


					<td>
							<label for="rol">Rol del Usuario</label>
								<?php
								$query_rol = mysqli_query($conection,"SELECT * FROM rol");
								$result_rol= mysqli_num_rows($query_rol);
								?>				
							<select name="rol" id="rol" value="" class="notItemOne" required>
								<?php
								 echo $option;
									if($result_rol > 0)
									{
									while ($rol = mysqli_fetch_array($query_rol)){
									?>
							<option value="<?php echo $rol["id_rol"]; ?>"><?php echo $rol["rol"] ?></option>
									<?php						
									}
								}
								?>					
							</select>
						</td>



				<td>
							<label for="correo">Cargo del empleado</label>						
							<select name="cargo" id="cargo" required>
								<option value="<?php echo $cargo ?>"><?php echo $cargo ?></option>
								<option value="Gerente">Gerente</option>
								<option value="Director/a">Director/a</option>
								<option value="Informatico/a">Informatico/a</option>
								<option value="Coordinador/a">Coordinador/a</option>
								<option value="Ayte. Coordinacion">Ayte. Coordinacion</option>
								<option value="Trabajador/a Familiar">Trabajador/a Familiar</option>
								<option value="Limpiador/a">Limpiador/a</option>
								<option value="Administrativo/a">Administrativo/a</option>
								<option value="Profesor/a">Profesor/a</option>
								<option value="Integrador/a Social">Integrador/a Social</option>
								<option value="Trabajador/a Social">Trabajador/a Social</option>
							</select>
						</td>
				<td>
					
					
					<label for="tipo_contrato">Tipo contrato</label>						
								<select name="tipo_contrato" id="tipo_contrato" required>
								<option value="<?php echo $tipo_contrato; ?>"><?php echo $tipo_contrato; ?></option>
								<option value="Indefinido Completo">Indefinido Completo</option>
								<option value="Indefinido Parcial">Indefinido Parcial</option>
								<option value="Temporal Completo">Temporal Completo</option>
								<option value="Temporal Parcial">Temporal Parcial</option>
								<option value="Interinidad Completo">Interinidad Completo</option>
								<option value="Interinidad Parcial">Intirenidad parcial</option>
								<option value="Obras y Servicios Completo">Obras y Servicios Completo</option>
								<option value="Obras y Servicios Parcial">Obras y Servicios Parcial</option>
				</td>	
				<td>
					<label for="jornada_semanal">Jornada Semanal</label>
					<input type="number" name="jornada_semanal" id="jornada_semanal" value="<?php echo $jornada_semanal; ?>" >
				</td>			
			</tr>
				
						<table>
							<td>
								
								<input type="submit" value="Actualizar" class="btn_sig">
							</td>	
						</table>
				<br>
				
				</table>

			</form>


		</div>



	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>