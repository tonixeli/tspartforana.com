<?php
include "../conexion.php";
include  "includes/scripts.php";
include "includes/header.php";
include "includes/footer.php";
if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	
	<title>Lista SAD</title>
</head>
<body>

	
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
			
			
			
			
			
				$fin = date("Y-m-d");
				$inicio = date("Y-m-01");	

			$query = mysqli_query($conection, "SELECT s.id_sad AS idsad, e.nombre AS tf, l.nombre AS localidad, u.nombre as usuario, s.fecha, s.categoria, s.duracion 
													FROM sad AS s
													INNER JOIN localidades AS l ON l.id_localidad = s.id_localidad
													INNER JOIN usuarios AS u ON u.id_usuario = s.id_usuario
													INNER JOIN empleados AS e ON e.id_empleado = s.id_empleado
													WHERE fecha BETWEEN '$inicio' AND '$fin'  ORDER BY fecha DESC, tf ASC");

				$result = mysqli_num_rows($query);

				if($result > 0){ 

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				<td><?php echo $data["tf"]; ?></td>
				<td><?php echo $data["localidad"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td><?php echo $data["fecha"]; ?></td>
				<td><?php echo $data["categoria"]; ?></td>
				<td><?php echo $data["duracion"]; ?></td>
                <td>
                	<form  class="form_eliminar" action="eliminar_sad.php" method="POST">

                               <input type="hidden" name="idsad" value="<?php echo $data["idsad"]; ?>" >
                               <input type="submit" value="Eliminar" class="btn"></td>
			 </form></td>
			
                        
            </tr>
			<?php
			}

		}


		?>
			
		</table>

		
	</section>


</body>
</html