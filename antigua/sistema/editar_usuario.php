<?php



	include "../conexion.php";
 	include "includes/header.php";
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}




	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['pueblo']))
		{
			$alert='<p class= "msg_error" > Los campos nombre y pueblo son obligatorios</p>';
		}else{
			

			echo $id 						= 	$_POST['id'];
			echo $estado 					= 	$_POST['estado'];
			echo $nombre 					= 	$_POST['nombre'];
			echo $dni  						= 	$_POST['dni'];
			echo $pueblo   					=	$_POST['pueblo'];
			echo $direccion  				= 	$_POST['direccion'];
			echo $telefono    				= 	$_POST['telefono'];
            echo $nombre_familiar 			= 	$_POST['nombre_familiar'];
			echo $telefono_familiar  		= 	$_POST['telefono_familiar'];
			echo $nombre_familiar2   		= 	$_POST['nombre_familiar2'];
			echo $telefono_familiar2 		= 	$_POST['telefono_familiar2'];
			
            echo $tipo_sad 					= 	$_POST['tipo_sad'];
			echo $grado 					= 	$_POST['grado'];
			echo $copago 					= 	$_POST['copago'];
			echo $horas_atencion_personal 	= 	$_POST['horas_atencion_personal'];
			echo $horas_atencion_hogar 		= 	$_POST['horas_atencion_hogar'];
			
			}
			
			
			

			
				$query_insert = mysqli_query($conection, "UPDATE usuarios SET estado = '$estado', nombre = '$nombre', dni = '$dni', pueblo ='$pueblo', direccion = '$direccion', telefono = '$telefono', nombre_familiar = '$nombre_familiar', telefono_familiar = '$telefono_familiar', nombre_familiar2 = '$nombre_familiar2', telefono_familiar2 = '$telefono_familiar2', tipo_sad = '$tipo_sad', grado = '$grado', copago = '$copago', horas_atencion_personal = '$horas_atencion_personal', horas_atencion_hogar = '$horas_atencion_hogar' WHERE id = $id ");
				
				if($query_insert){
					$alert='<p class= "msg_save" >Usuario actualizado correctamente.</p>';
				}else{
					$alert='<p class= "msg_error" >Error al actualizar el usuario.</p>';
				
				}
	
	
	}
?>	

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php  include  "includes/scripts.php"; ?>
	<title>Actualizar Usuario</title>
</head>
<body>
	<?php 
	

 
			
	$id = $_GET['id'];
	$sql= mysqli_query($conection, "SELECT * FROM usuarios   WHERE id = $id");

	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('location: lista_usuarios.php');
	}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {

			// code...
			$id 						= $data['id'];
			$estado						= $data['estado'];
			$nombre 					= $data['nombre'];
			$dni 						= $data['dni'];
			$pueblo 					= $data['pueblo'];
			$direccion 					= $data['direccion'];
			$telefono 					= $data['telefono'];
			$nombre_familiar 			= $data['nombre_familiar'];
			$telefono_familiar 			= $data['telefono_familiar'];
			$nombre_familiar2 			= $data['nombre_familiar2'];
			$telefono_familiar2 		= $data['telefono_familiar2'];
			
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
				<input type="hidden" name="id" id="id"   value="<?php echo $id; ?>" >	

				<td><label for="nombre">Nombre</label>	
				<input type="text" name="nombre" id="nombre"  value="<?php echo $nombre; ?>" required>
				<label for="estado">Estado</label>	
				<input type="text" name="estado" id="estado"  value="<?php echo $estado; ?>" >	
				</td>
                                
				<td><label for="dni">DNI</label>
				<input type="text" name="dni" id="dni" value="<?php echo $dni; ?>" required>

				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>"  ></td></tr>
                                
				<tr>
					<td><label for="direccion">Direccion</label>
					<input type="direccion" name="direccion" id="direccion" value="<?php echo $direccion; ?>" ></td>
					<td><label for="pueblo">Selecciona Localidad</label>
				<?php
					
					$query_pueblo = mysqli_query($conection,"SELECT nombre FROM pueblos order by nombre ASC");
					$result_pueblo= mysqli_num_rows($query_pueblo);

				?>
				<select name="pueblo" id="pueblo"  value="<?php echo $pueblo; ?>" required>
					<option value="<?php echo $pueblo; ?>"><?php echo $pueblo; ?></option>	
						
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
					
				</select>



				</td>
							
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
	<?php include "includes/footer.php"; ?>
</body>
</html>