<?php

	include "../conexion.php";
	
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['tf']) || empty($_POST['pueblo']) || empty($_POST['usuario']) || empty($_POST['fecha']) || empty($_POST['categoria']) || empty($_POST['duracion']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios</p>';
		}else{
			

			$tf 		= $_POST['tf'];
			$pueblo  	= $_POST['pueblo'];
			$usuario 	= $_POST['usuario'];
			$fecha  	= $_POST['fecha'];
			$categoria  = $_POST['categoria'];
			$duracion   = $_POST['duracion'];
			

				$query_insert = mysqli_query($conection,"INSERT INTO sad (tf, pueblo, usuario, fecha, categoria, duracion) VALUES ('$tf','$pueblo','$usuario','$fecha','$categoria','$duracion')");
				if($query_insert){
					$alert='<p class="msg_save">Enviado Correctamente</p>';
				}else{
					$alert='<p class="msg_error">Error en el envio.</p>';
				}
			}
		
	}

?>	

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php  include  "includes/scripts.php"; ?>
	<title>Registro SAD</title>
	<script language="javascript" src="js/jquery-3.6.0.min.js"></script>

</head>
<body>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<br><br>
		<div class="form_register">
			
			<h1>Registro SAD</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''?></div>
			
			<form id="combo" name="combo" action="" method="post">

<!--======================== formulario parte del empleado==================================================-->
				
				<label for="tf">Trabajadora Familiar</label>
				<input type="text" name="tf" id="tf" value="<?php echo $_SESSION['nombre'] ; ?>" readonly >
				
				

<!-- =========================================seleccion de localidad===============================================-->

					<label for="pueblo">Selecciona Localidad</label>
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
					
				</select>
<!-- =========================================seleccion de usuario============================================================-->
		
			<label for="usuario">Selecciona Usuario</label>
			<div id="selectusuario"  required></div>			
				

<!-- =========================================seleccion de Fecha============================================================-->


				<div><label for="fecha">Fecha</label>
				<?php 
					$fcha = date("Y-m-d");
					//$inicio = date("Y-m-01");
					$inicio = date("Y-m-01");
					?>

				<input type="date" name="fecha" id="fecha" placeholder="Fecha del SAD"  min="<?php echo $inicio;?>"  max= "<?php echo $fcha;?>" required></div>

<!-- =========================================seleccion de Categoria========================================================-->

				<div><label for="categoria" >Categoría</label>
				<select name="categoria" id="categoria" required>
					<option value="">Selecciona categotria del SAD</option>
					<option value="ordinaria">Ordinaria</option>
					<option value="extraordinaria">ExtraOrdinaria</option></div>
				</select>

<!-- =========================================seleccion de Duracion=========================================================-->

				<div><label for="duracion">Duración</label>
				<select name="duracion" id="duracion" required>
					<option value="">Selecciona la duración</option>
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

				</select></div>
<!-- =========================================Enviar formulario=============================================================-->

				<input type="submit" value="Registrar SAD" class="btn_save">

			</form>
		</div>
	</section>

	<?php include "includes/footer.php"; ?>

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
			//document.getElementById("$usuario[0]").attributes["required"] = ""; 	
			}
		});
	}
</script>
	<?php include "includes/footer.php"; ?>
</body>
</html>