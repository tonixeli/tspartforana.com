<?php 

	include "../conexion.php";
session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}

	if (!empty($_POST)) 
	{
		
		



		 $id = $_POST['id'];
		 $baja = $_POST['baja'];

		
			$query_delete = mysqli_query($conection, "UPDATE usuarios SET baja = '$baja', estatus = 0 WHERE id = $id");

		if($query_delete){
			header("location: lista_usuarios.php");
		}else{
			echo "Error al eliminar";
		}

	}





	if(empty($_REQUEST['id']))
	{
		header("location: lista_usuarios.php");
	}else{

		

		$id = $_REQUEST['id'];

		$query = mysqli_query($conection, "SELECT nombre
												FROM usuarios 
												WHERE id = $id");
		$result = mysqli_num_rows($query);

		if($result > 0){

			while ($data = mysqli_fetch_array($query))
			{
				$nombre = $data['nombre'];
				
			}
		}else{
			header("location: lista_usuarios.php");
		}
		
	}

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php  include  "includes/scripts.php"; ?>
	<title>Eliminar Usuarios</title>
</head>
<body>
	<?php include "includes/header.php" ?>
	<section id="container">
		
		<div class="form_register">
			<br><br>
			<h2>¿Esta seguro de querer dar de baja al usuario?</h2>
			<p>Nombre: <span><?php echo $nombre ?></span></p>
			

			<form method="post" action="">
				
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				
				<table><td><label for="baja" >Fecha de Baja</label>				
					<input type="date" name="baja" id="baja"  ></td></table>
				
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				
				<input type="submit" value="Aceptar" class="btn_ok">
				
			</form>

		</div>



	</section>

	<?php include "includes/footer.php" ?>
</body>
</html>