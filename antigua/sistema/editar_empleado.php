<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php  include  "includes/scripts.php"; ?>
	<title>Actualizar Empleado</title>
</head>

<?php



	include "../conexion.php";
 	include "includes/header.php";
	




	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['idusuario']) )
		{
			$alert='<p class= "msg_error" >Error. El campo id_empleado esta vacio</p>';
		}else{			

			echo $idusuario 				= 	$_POST['idusuario'];
			echo $nombre 					= 	$_POST['nombre'];
			echo $dni  						= 	$_POST['dni'];
			echo $nss  						= 	$_POST['nss'];
			echo $correo      				=	$_POST['correo'];	
			echo $direccion  				= 	$_POST['direccion'];
			echo $localidad  				= 	$_POST['localidad'];
			echo $telefono    				= 	$_POST['telefono'];
			echo $tipo_contrato				= 	$_POST['tipo_contrato'];
			echo $cargo						= 	$_POST['cargo'];
			echo $fecha_nacimiento    		= 	$_POST['fecha_nacimiento'];
			echo $jornada_semanal    		= 	$_POST['jornada_semanal'];
			echo $salario_mensual    		= 	$_POST['salario_mensual'];
           
			}
			
			echo $idusuario;
			echo $nombre;
			echo $dni;
			echo $nss;
			echo $correo;	
			echo $direccion;
			echo $localidad;
			echo $telefono;
			echo $tipo_contrato;
			echo $cargo;
			echo $fecha_nacimiento;
			echo $jornada_semanal;
			echo $salario_mensual;
			

			
				$query_insert = mysqli_query($conection, "UPDATE empleados SET nombre = '$nombre', dni = '$dni', correo = '$correo', direccion = '$direccion', localidad = '$localidad', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento', jornada_semanal = $jornada_semanal, cargo = '$cargo', tipo_contrato = '$tipo_contrato' WHERE idusuario = $idusuario ");
				
				if($query_insert){
					$alert='<p class= "msg_save" >Empleado actualizado correctamente.</p>';
				}else{
					$alert='<p class= "msg_error" >Error al actualizar al empleado.</p>';
				
				}
	
	
	}
?>	


<body>
	<?php 
	

 
			
	$idusuario = $_GET['idusuario'];
	$sql= mysqli_query($conection, "SELECT * FROM empleados   WHERE idusuario = $idusuario");

	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('location: lista_empleados.php');
	}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {

			
			$idusuario			= $data['idusuario'];
			$nombre 			= $data['nombre'];
			$dni 				= $data['dni'];
			$nss				= $data['nss'];
			$correo				= $data['correo'];				
			$direccion 			= $data['direccion'];
			$localidad 			= $data['localidad'];
			$telefono 			= $data['telefono'];
			$fecha_nacimiento 	= $data['fecha_nacimiento'];
			$cargo 				= $data['cargo'];
			$tipo_contrato		= $data['tipo_contrato'];
			$jornada_semanal 	= $data['jornada_semanal'];
			$salario_mensual 	= $data['salario_mensual'];
				
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
					<input type="hidden" name="idusuario" id="idusuario"   value="<?php echo $idusuario; ?>" >	

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
					<label for="cargo">Cargo</label>
					<input type="text" name="cargo" id="cargo" value="<?php echo $cargo; ?>"  >
				</td>
				<td>
					<label for="tipo_contrato">Tipo de Contrato</label>
					<input type="text" name="tipo_contrato" id="tipo_contrato" value="<?php echo $tipo_contrato; ?>" >
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