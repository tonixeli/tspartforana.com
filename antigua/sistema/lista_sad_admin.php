<?php
	include "../conexion.php";
session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php  include  "includes/scripts.php"; ?>
	<title>Lista SAD</title>
</head>
<body>

	<?php include "includes/header.php"; ?>
	<section id="container">
		<br><br>
		<h1>Lista SAD</h1>
		<a href="registro_sad.php" class="btn_new">Nuevo SAD</a>
		
		<br><br>
		<table>
			<tr>
				<th>Empleado</th>
				<th>Pueblo</th>
				<th>Usuario</th>
				<th>Fecha</th>
				<th>Categoria</th>
				<th>Duracion</th>
				<th>Acciones</th>
			</tr>


			<?php
				

			$query = mysqli_query($conection, "SELECT id, tf, pueblo, usuario,fecha, categoria, duracion 
												FROM sad WHERE  estatus = 1 ORDER BY fecha DESC, tf ASC");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				<td><?php echo $data["tf"]; ?></td>
				<td><?php echo $data["pueblo"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td><?php echo $data["fecha"]; ?></td>
				<td><?php echo $data["categoria"]; ?></td>
				<td><?php echo $data["duracion"]; ?></td>
                <td><form  class="form_eliminar"action="eliminar_sad.php" method="POST">
                               <input type="hidden" name="idsad" value="<?php echo $data["id"]; ?>" >
                               <input type="submit" value="Eliminar" class="btn"></td>
			 </form></td>
			
                        
            </tr>
			<?php
			}

		}


		?>
			
		</table>

		
	</section>
<?php include "includes/footer.php" ?>

</body>
</html