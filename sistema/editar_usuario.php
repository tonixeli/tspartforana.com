<?php


	include  "includes/scripts.php"; 
	include "../conexion.php";
 	include "includes/header.php";
 	include "includes/footer.php"; 

	if($_SESSION['id_rol'] != 1)
	{
		header("location: ./");
	}




	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['id_usuario']) || empty($_POST['localidad']))
		{
			$alert='<p class= "msg_error" > Los campos nombre y pueblo son obligatorios</p>';
		}else{
			

			 $id_usuario 				= 	$_POST['id_usuario'];
			 $estado 					= 	$_POST['estado'];
			 $nombre 					= 	$_POST['nombre'];
			 $dni  						= 	$_POST['dni'];
			 $id_localidad   			=	$_POST['localidad'];
			 $direccion  				= 	$_POST['direccion'];
			 $telefono    				= 	$_POST['telefono'];
             $nombre_familiar 			= 	$_POST['nombre_familiar'];
			 $telefono_familiar  		= 	$_POST['telefono_familiar'];
			 $nombre_familiar2   		= 	$_POST['nombre_familiar2'];
			 $telefono_familiar2 		= 	$_POST['telefono_familiar2'];
			 $alta 						= 	$_POST['alta'];			
             $tipo_sad 					= 	$_POST['tipo_sad'];
			 $grado 					= 	$_POST['grado'];
			 $copago 					= 	$_POST['copago'];
			 $horas_atencion_personal 	= 	$_POST['horas_atencion_personal'];
			 $horas_atencion_hogar 		= 	$_POST['horas_atencion_hogar'];
			
			
			
			

			
				$query_insert = mysqli_query($conection, " 	UPDATE 	usuarios 
															SET  	estado = '$estado', 
																	nombre = '$nombre', 
																	dni = '$dni', 
																	id_localidad = $id_localidad, 
																	direccion = '$direccion', 
																	telefono = '$telefono', 
																	nombre_familiar = '$nombre_familiar', 
																	telefono_familiar = '$telefono_familiar', 
																	nombre_familiar2 = '$nombre_familiar2', 
																	telefono_familiar2 = '$telefono_familiar2', 
																	alta = '$alta',
																	tipo_sad = '$tipo_sad', 
																	grado = '$grado', 
																	copago = '$copago', 
																	horas_atencion_personal = '$horas_atencion_personal', 
																	horas_atencion_hogar = '$horas_atencion_hogar' 
															WHERE 	id_usuario = $id_usuario " );
				
				if($query_insert){
					$alert='<p class= "msg_save" >Usuario actualizado correctamente.</p>';
				}else{
					$alert='<p class= "msg_error" >Error al actualizar el usuario.</p>';
				
				}
	}
			
	
	}
?>	

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	
	<title>Actualizar Usuario</title>
</head>
<body>
	<?php 
	

 
			
	$id_usuario = $_GET['id'];
	$sql= mysqli_query($conection, "	SELECT 	u.estado, u.nombre, u.dni, (u.id_localidad) as id_localidad, u.direccion, u.telefono, 
												u.nombre_familiar, u.telefono_familiar, u.nombre_familiar2, u.telefono_familiar2, u.alta, 
												u.tipo_sad, u.grado, u.copago, u.horas_atencion_personal, u.horas_atencion_hogar, (l.nombre) as localidad 
										FROM usuarios u 
										INNER JOIN localidades l 
										ON u.id_localidad = l.id_localidad  
										WHERE id_usuario = $id_usuario");

	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('location: lista_usuarios.php');
	}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {

			// code...
			
			$estado						= $data['estado'];
			$nombre 					= $data['nombre'];
			$dni 						= $data['dni'];
			$id_localidad 				= $data['id_localidad'];
			$localidad 					= $data['localidad'];	
			$direccion 					= $data['direccion'];
			$telefono 					= $data['telefono'];
			$nombre_familiar 			= $data['nombre_familiar'];
			$telefono_familiar 			= $data['telefono_familiar'];
			$nombre_familiar2 			= $data['nombre_familiar2'];
			$telefono_familiar2 		= $data['telefono_familiar2'];
			$alta  						= $data['alta'];			
			$tipo_sad 					= $data['tipo_sad'];
			$grado 						= $data['grado'];
			$copago 					= $data['copago'];
			$horas_atencion_personal	= $data['horas_atencion_personal'];
			$horas_atencion_hogar 		= $data['horas_atencion_hogar'];
					
		
		}
	}



	?>
	<section id="container">
		<div class="form_cuadrante">
                        <br>
			<h1>Actualizar Usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>
                        <br>
			<form action="" method="POST">


				<table><tr>
				<input type="hidden" name="id_usuario" id="id_usuario"   value="<?php echo $id_usuario; ?>" ></td>	

				<td><label for="nombre">Nombre</label>	
				<input type="text" name="nombre" id="nombre"  value="<?php echo $nombre; ?>" required>
				<label for="estado">Estado</label>	
				<input type="text" name="estado" id="estado"  value="<?php echo $estado; ?>" >	
				</td>
                                
				<td><label for="dni">DNI</label>
				<input type="text" name="dni" id="dni" value="<?php echo $dni; ?>" required>

				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>"  ></td></td></tr>
                                
				<tr><td><label for="pueblo">Selecciona Localidad</label>
				<?php
					
					$query_localidad = mysqli_query($conection,"SELECT id_localidad, nombre FROM localidades order by nombre ASC");
					$result_localidad= mysqli_num_rows($query_localidad);

				?>
				<select name="localidad" id="localidad"  value="<?php echo $localidad; ?>" required>
					<option value="<?php echo $id_localidad; ?>"><?php echo $localidad; ?></option>	
						
					<?php 

					if($result_localidad > 0)
					{

					while ($localidad = mysqli_fetch_array($query_localidad)){
						?>

						<option value="<?php echo $localidad["id_localidad"]; ?>"><?php echo $localidad["nombre"] ?></option>

						<?php
						
						}

					}
					?>
					
				</select>



				</td>
				<td><label for="direccion">Direccion</label>
					<input type="direccion" name="direccion" id="direccion" value="<?php echo $direccion; ?>" ></td>			
				</tr>
                                
				<tr><td><label for="nombre_familiar">Nombre Familiar</label>
				<input type="text" name="nombre_familiar" id="nombre_familiar" value="<?php echo $nombre_familiar; ?>"></td>
                                
				<td><label for="telefono_familiar">Telefono Familiar</label>
				<input type="text" name="telefono_familiar" id="telefono_familiar" value="<?php echo $telefono_familiar; ?>"></td></tr>
					</tr><tr>               
				<tr><td><label for="nombre_familiar2">Nombre Familiar 2</label>
				<input type="text" name="nombre_familiar2" id="nombre_familiar2" value="<?php echo $nombre_familiar2; ?>"></td>
                                
				<td><label for="telefono_familiar2">Telefono Familiar 2</label>
				<input type="text" name="telefono_familiar2" id="telefono_familiar2" value="<?php echo $telefono_familiar2; ?>"></td></tr>
                                
				<tr>
				
				<td>	<table>
							<tr>
								<td>
									<label for="tipo_sad" >Tipo SAD</label>
									<select name="tipo_sad" id="tipo_sad">
										<option value="<?php echo $tipo_sad; ?>"><?php echo $tipo_sad; ?></option>
										<option value="Mancomunitat">Mancomunitat</option>
										<option value="Alta_Intensidad">Alta Intensidad</option>
										<option value="Gratuito">Gratuito</option>
					
									</select>
								</td>
								<td>
									<label for="grado" >Grado</label>
										<select name="grado" id="grado">
											<option value="<?php echo $grado ?>"><?php echo $grado; ?></option>
											<option value=""></option>
											<option value="I">I</option>
											<option value="II">II</option>
											<option value="III">III</option>
										</select>
								</td>
								<td>
									<label for="copago" >Copago</label>
									<input type="text" step="0.01" name="copago" id="copago" value="<?php echo $copago; ?>"value="$copago">
								</td>
									
							</tr>						
					
							<tr>
					
								<td>
									<label for="horas_atencion_personal">Horas Atencion Personal </label>
									<input type="text" name="horas_atencion_personal" id="horas_atencion_personal" value="<?php echo $horas_atencion_personal; ?>" >
								</td>
								<td>
				
									<label for="horas_atencion_hogar">Horas Atencion Hogar </label>
									<input type="text" name="horas_atencion_hogar" id="horas_atencion_hogar" value="<?php echo $horas_atencion_hogar; ?>">
								</td>
								<td>
									<label for="alta" >Alta</label>
									<input type="date"  name="alta" id="alta" value="<?php echo $alta; ?>" required>
								</td>
							</tr>
						</table>
					</td>
	
					<td>
						<table>
							<td>
								
								<input type="submit" value="Registrar" class="btn_sig">
							</td>	
						</table>
				<br>
				
				

			</form>


		</div>



	</section>
	
</body>
</html>