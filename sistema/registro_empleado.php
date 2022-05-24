<?php
include  "includes/scripts.php"; 
include "includes/header.php";
if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}

	include "../conexion.php";
	if(!empty($_POST))
	{
		$alert='';
		if( empty($_POST['usuario']) || empty($_POST['clave']) )
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{

			$dni 				= $_POST['dni'];
			$nss  				= $_POST['nss'];
			$nombre  			= $_POST['nombre'];
			$correo  			= $_POST['correo'];
			$usuario    		= $_POST['usuario'];
			$clave 				= md5($_POST['clave']);
			$id_rol  			= $_POST['rol'];
			$cargo   			= $_POST['cargo'];
			$fecha_nacimiento  	= $_POST['fecha_nacimiento'];
			$telefono    		= $_POST['telefono'];
			$direccion 			= $_POST['direccion'];
			$localidad  		= $_POST['localidad'];
			$fecha_alta   		= $_POST['fecha_alta'];				
			$tipo_contrato    	= $_POST['tipo_contrato'];
			$jornada_semanal    = $_POST['jornada_semanal'];
			$salario_mensual    = $_POST['salario_mensual'];
			$modificador    	= $_SESSION['id_empleado'];

			$query =mysqli_query($conection," SELECT * FROM empleados 
														WHERE usuario = '$usuario' ");
			$result = mysqli_fetch_array($query);
			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existen.</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO `empleados`(`dni`, `nss`, `nombre`, `correo`, `usuario`, `clave`, `id_rol`, `cargo`, `fecha_nacimiento`, `telefono`, `direccion`, `localidad`, `fecha_alta`, `tipo_contrato`, `jornada_semanal`, `salario_mensual`, `modificador`) VALUES ('$dni', '$nss', '$nombre', '$correo', '$usuario', '$clave', '$id_rol', '$cargo', '$fecha_nacimiento', '$telefono', '$direccion', '$localidad', '$fecha_alta', '$tipo_contrato', '$jornada_semanal', '$salario_mensual', $modificador)");
				if($query_insert){
					$alert='<p class="msg_save">Usuario creado correctamente</p>';
				}else{
					$alert='<p class="msg_error">Error al crear el usuario.</p>';
				}
			}
		}
	}
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Registro Empleados</title>
</head>
<body>
	
	<section id="registro">
		<div class="form">
			<br><br><br><br><br><br>
<form action="" method="POST">
			<h1>Registro Empleados</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>


	<table>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<label for="dni">DNI</label>
							<input type="text" name="dni" id="dni" style="width:300px" placeholder="DNI o NIE" required>
						</td>
						<td>
							<label for="nss">NSS</label>
							<input type="text" name="nss" id="nss" style="width:300px" placeholder="Numero Seguridad Social" required>
						</td>
					</tr>
				
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td>
							<label for="telefono">Telefono</label>	
							<input type="tel" name="telefono" id="telefono" placeholder="Telefono" required>
						</td>
						<td>	
							<label for="correo">Correo Electronico</label>
							<input type="email" name="correo" id="correo" placeholder="Correo Electronico" required>	
						</td>
					</tr>
				</table>
			</td>			
		</tr>
		<tr>
			<td>
				<label for="fecha_nacimiento">Fecha de Nacimiento</label>
				<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" style="width:300px" placeholder="Fecha Nacimiento" required>
			</td>
			<td>				
				<label for="nombre">Nombre</label>	
				<input type="text" name="nombre" id="nombre" placeholder="Apellido1 Apellido2, Nombre" required>
			</td>

		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<label for="usuario">Usuario</label>
							<input type="text" name="usuario" id="usuario" required>
						</td>
						<td>
							<label for="clave">Clave</label>
							<input type="password" name="clave" id="clave"  required>
						</td>
					</tr>
				</table>	
			</td>
			<td>
				<table>
					<tr>
						<td>
							<label for="direccion">Direccion</label>	
							<input type="text" name="direccion" id="direccion" placeholder="Direccion" required>
						</td>
						<td>	
							<label for="Localidad">Localidad</label>
							<input type="text" name="localidad" id="localidad" placeholder="Localidad" required>	
						</td>
						</td>
					</tr>
				</table>	
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<label for="rol">Rol del Usuario</label>
								<?php
								$query_rol = mysqli_query($conection,"SELECT * FROM rol");
								$result_rol= mysqli_num_rows($query_rol);
								?>				
							<select name="rol" id="rol" value="" required>
								<?php 
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
							<label for="cargo">Cargo del empleado</label>						
							<select name="cargo" id="cargo" required>
								<option value="">Seleccionar cargo del empleado</option>
								<option value="Gerente">Gerente</option>
								<option value="Director/a">Director/a</option>
								<option value="Informatico/a">Informatico/a</option>
								<option value="Administrativo/a">Administrativo/a</option>
								<option value="Coordinador/a">Coordinador/a</option>
								<option value="Ayte. Coordinacion">Ayte. Coordinacion</option>
								<option value="Trabajador/a Familiar">Trabajador/a Familiar</option>
								<option value="Limpiador/a">Limpiador/a</option>
								<option value="Profesor/a">Profesor/a</option>
								<option value="Integrador/a Social">Integrador/a Social</option>
								<option value="Trabajador/a Social">Trabajador/a Social</option>
							</select>
						</td>
					</tr>
				
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td>
							<label for="fecha_alta">Fecha de  Alta</label>
							<input type="date" name="fecha_alta" id="fecha_alta" placeholder="Fecha de alta" required >
						</td>
						
					</tr>				
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td>
								<label for="tipo_contrato">Tipo contrato</label>						
								<select name="tipo_contrato" id="tipo_contrato" required>
								<option value="">Seleccionar tipo contrato</option>
								<option value="Indefinido Completo">Indefinido Completo</option>
								<option value="Indefinido Parcial">Indefinido Parcial</option>
								<option value="Temporal Completo">Temporal Completo</option>
								<option value="Temporal Parcial">Temporal Parcial</option>
								<option value="Interinidad Completo">Interinidad Completo</option>
								<option value="Interinidad Parcial">Intirenidad parcial</option>
								<option value="Obras y Servicios Completo">Obras y Servicios Completo</option>
								<option value="Obras y Servicios Parcial">Obras y Servicios Parcial</option>
								
							</select>
						</td>
						<td>
							<label for="jornada_semanal">Jornada Semanal</label>
							<input type="number" name="jornada_semanal" id="jornada_semanal" placeholder="Jornada Semanal" required>
						</td>
					</tr>
				
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td>
							<label for="salario_mensual">Salario Mensual</label>
						<input type="number" step="0.01" name="salario_mensual" id="salario_mensual" placeholder="Salario Mensual" required>
						</td>
						<td>
							<label for="documentos">Documentos</label>
							<input type="file" name="documentos" id="documentos" placeholder="documentos">
						</td>						
					</tr>				
				</table>
			</td>
		</tr>		
	</table>
				
		<input type="submit" value="REGISTRAR" class="btn_sig">

</form>
		</div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>