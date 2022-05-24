<?php 

	
	include "../conexion.php";
session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}

	if (!empty($_POST)) 
	{
		



		$idusuario = $_POST['idusuario'];

		$query_delete = mysqli_query($conection, "DELETE FROM cuadrantes WHERE id_cuadrante= '$idusuario'");
		

		if($query_delete){
			header("location: registro_cuadrante.php");
		}else{
			echo "Error al eliminar";
		}

	}





	if(empty($_REQUEST['id_cuadrante']) )
	{
		header("location: registro_cuadrante.php");
	}else{

		

		$idusuario = $_REQUEST['id_cuadrante'];

		$query = mysqli_query($conection, "SELECT tf, usuario
												FROM cuadrantes 												
												WHERE id_cuadrante = $idusuario");
		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$tf = $data['tf'];
				$usuario = $data['usuario'];
				
			}
		}else{
			header("location: registro_cuadrante.php");
		}

		
	}



 ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php  include  "includes/scripts.php"; ?>
	<title>Eliminar Empleado</title>
</head>
<body>
	<?php include "includes/header.php" ?>
	<section id="container">
		
		<div class="data_delete">
			
			<h2>¿Esta seguro de querer eliminar el registro?</h2>
			<p>TF: <span><?php echo $tf ?></span></p>
			<p>usuario: <span><?php echo $usuario ?></span></p>
			

			<form method="post" action="">
				<input type="hidden" name="tf" value="<?php echo $tf; ?>">
				<input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
				<a href="registro_cuadrantes.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>

		</div>



	</section>

	<?php include "includes/footer.php" ?>
</body>
</html>