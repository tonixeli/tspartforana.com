<?php 

	include "../conexion.php";
        
		if(!empty($_POST['idsadeliminar'])){
                    $id = $_POST['idsadeliminar'];

                $query_delete = mysqli_query($conection,"DELETE FROM sad WHERE id = $id");
                
		if($query_delete){
			header("location: lista_sad.php");
		}else{
			echo "Error al eliminar";
		}}
		$id = $_REQUEST['idsad'];
                
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php  include  "includes/scripts.php"; ?>
	<title>Eliminar SAD</title>
</head>
<body>
	<?php include "includes/header.php" ?>
	<section id="container">
		
		<div class="data_delete">
			<br><br>
			<h2>¿Esta seguro de querer eliminar el SAD?</h2>
			
			

			<form method="POST" action="">
				<input type="hidden" name="idsadeliminar" value="<?php echo $id; ?>">
				<a href="lista_sad.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>

		</div>



	</section>

	<?php include "includes/footer.php" ?>
</body>
</html>