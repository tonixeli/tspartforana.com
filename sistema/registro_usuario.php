<?php

include "../conexion.php";
include "includes/header.php";
include  "includes/scripts.php"; 
include "includes/footer.php"; 

if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['localidad']))
		{
			$alert='<p class= "msg_error" > Los campos nombre y localidad son obligatorios</p>';
		}else{
			

			$estado 					= 	$_POST['estado'];
			$nombre 					= 	$_POST['nombre'];
			$dni  						= 	$_POST['dni'];
			$id_localidad				=	$_POST['localidad'];
			$direccion  				= 	$_POST['direccion'];
			$telefono    				= 	$_POST['telefono'];
            $nombre_familiar 			= 	$_POST['nombre_familiar'];
			$telefono_familiar  		= 	$_POST['telefono_familiar'];
			$nombre_familiar2  	 		= 	$_POST['nombre_familiar2'];
			$telefono_familiar2 		= 	$_POST['telefono_familiar2'];
			$alta						= 	$_POST['alta'];
            $tipo_sad 					= 	$_POST['tipo_sad'];
			$grado	 					= 	$_POST['grado'];
			$copago 					= 	$_POST['copago'];
			$horas_atencion_personal 	= 	$_POST['horas_atencion_personal'];
			$horas_atencion_hogar 		= 	$_POST['horas_atencion_hogar'];
			
			}
			
			$query =mysqli_query($conection," SELECT * FROM usuarios WHERE nombre = '$nombre' ");

			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class= msg_error >El usuario ya existe.</p>';
			}else{
				$query_insert = mysqli_query($conection, "INSERT INTO usuarios (estado, nombre, dni, id_localidad,  direccion, telefono, nombre_familiar, telefono_familiar, nombre_familiar2, telefono_familiar2, alta, tipo_sad, grado, copago, horas_atencion_personal, horas_atencion_hogar) VALUES ('$estado','$nombre','$dni', $id_localidad, '$direccion','$telefono','$nombre_familiar','$telefono_familiar','$nombre_familiar2','$telefono_familiar2','$alta','$tipo_sad','$grado','$copago','$horas_atencion_personal','$horas_atencion_hogar')");
				
				if($query_insert){
					$alert='<p class= "msg_save" >Usuario creado correctamente.</p>';
				}else{
					$alert='<p class= "msg_error" >Error al crear el usuario.</p>';
				
				}
		}
	
	}
?>	

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	
	<title>Registro usuario</title>
</head>
<body>
	
	<section id="container">
		<div class="form_cuadrante">
                        <br>
			<h1>Registro de Nuevo Usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>
                        <br>



<form action="" method="POST">

<table>    
	<tr>
		<td>
			<label for="nombre">Nombre</label>	
			<input type="text" name="nombre" id="nombre" placeholder="Apellido1 Apellido2, Nombre"  required>

			<label for="estado">Estado</label>	
			<input type="text" name="estado" id="estado" placeholder="Hospitalizado etc...si no hay ninguna incidencia puede dejarse vacio"  >
		</td>
                                
		<td>
			<label for="dni">DNI</label>
			<input type="text" name="dni" id="dni" placeholder="Introducir nueve caracteres tipo DNI 12345678A  /  NIE Y1234567X" required>

			<label for="telefono">Telefono</label>
			<input type="telefono" name="telefono" id="telefono" placeholder="Maximo 12 caracteres"  >
		</td>
			
		</tr>
                                
			<tr>
				<td>

					<label for="direccion">Direccion</label>
					<input type="direccion" name="direccion" id="direccion" >
				</td>
				<td>
					<label for="localidad">Selecciona Localidad</label>
					<?php
					
						$query_localidad = mysqli_query($conection,"SELECT id_localidad, nombre FROM localidades order by nombre ASC");
						$result_localidad= mysqli_num_rows($query_localidad);

					?>
					<select name="localidad" id="localidad"  value="" required>
					<option value="">Selecciona una localidad</option>	
						
					<?php 

						if($result_localidad > 0)
						{

							while ($localidad = mysqli_fetch_array($query_localidad)){
							?>

							<option value="<?php echo $localidad['id_localidad']; ?>" ><?php echo $localidad["nombre"]?></option>

							<?php
						
							}

						}
					?>
					
					</select>



				</td>
				
				
				
			</tr>
                                
				<tr>
					<td>

						<label for="nombre_familiar">Nombre Familiar</label>
						<input type="text" name="nombre_familiar" id="nombre_familiar" >
					</td>
                                
					<td>
						<label for="telefono_familiar">Telefono Familiar</label>
						<input type="text" name="telefono_familiar" id="telefono_familiar" >
					</td>
				</tr>
				<tr>               
				<tr>
					<td>
						<label for="nombre_familiar2">Nombre Familiar 2</label>
						<input type="text" name="nombre_familiar2" id="nombre_familiar2" >
					</td>
                                
					<td>
						<label for="telefono_familiar2">Telefono Familiar 2</label>
						<input type="text" name="telefono_familiar2" id="telefono_familiar2" >
					</td>
				</tr>
                                
				<tr>
					<td>
						<table>
							<tr>
								<td>
									<label for="tipo_sad" >Tipo SAD</label>
									<select name="tipo_sad" id="tipo_sad">
										<option value=""></option>
										<option value="Mancomunitat">Mancomunitat</option>
										<option value="Alta_Intensidad">Alta Intensidad</option>
										<option value="Gratuito">Gratuito</option>
					
									</select>
								</td>
								<td>
									<label for="grado" >Grado</label>
										<select name="grado" id="grado">
											<option value=""></option>
											<option value="I">I</option>
											<option value="II">II</option>
											<option value="III">III</option>
										</select>
								</td>
								<td>
									<label for="copago" >Copago</label>
									<input type="text" step="0.01" name="copago" id="copago" >
								</td>	
							</tr>						
					
							<tr>
					
								<td>
									<label for="horas_atencion_personal">Horas Atencion Personal </label>
									<input type="text" name="horas_atencion_personal" id="horas_atencion_personal" >
								</td>
								<td>
				
									<label for="horas_atencion_hogar">Horas Atencion Hogar </label>
									<input type="text" name="horas_atencion_hogar" id="horas_atencion_hogar" >
								</td>
							</tr>
						</table>
					</td>
	
					<td>
						<table>
							<td>
								<label for="alta" >Fecha del Alta</label>				
								<input type="date" name="alta" id="alta"  ></td><td>
								<input type="submit" value="Registrar" class="btn_sig">
							</td>	
						</table>
					</td>
				</tr>			
			</table>
		</form>
	</div>
</section>

</body>
</html>