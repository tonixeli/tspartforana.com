<?php
include "../conexion.php";
include "includes/header.php";
if($_SESSION['id_rol'] != 1)
{
	header("location: ./");
}

?>

<!DOCTYPE html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php  include  "includes/scripts.php"; ?>
	<title>Lista Empleados</title>
</head>
<body>
	
	<br><br><br><br><br>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	
	<section id="container">

		<h1>Lista de Empleados</h1>
		<a href="registro_empleado.php" class="btn_new">Crear empleada/o</a>
		<table>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Usuaria/o  BBDD</th>
				<th>Cargo</th>
				<th>Acciones</th>
			</tr>


			<?php
				//paginador
			$sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM empleados WHERE estatus = 1 ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];


			$por_pagina = 10;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}


			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);


				$query = mysqli_query($conection, "SELECT e.id_empleado, e.nombre, e.correo, e.usuario, e.cargo, r.rol 
					FROM empleados e INNER JOIN rol r ON e.id_rol = r.id_rol 
					WHERE estatus = 1 ORDER BY nombre ASC
					LIMIT $desde,$por_pagina ");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				<td><?php echo $data["id_empleado"]; ?></td>
				<td><?php echo $data["nombre"]; ?></td>
				<td><?php echo $data["correo"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td><?php echo $data["cargo"]; ?></td>
				<td>
					<a class="link_edit" href="editar_empleado.php?id_empleado=<?php echo $data["id_empleado"]; ?>">Editar</a>

					<?php If($data["id_empleado"] != 1){  ?>

					|
					<a class="link_delete" href="eliminar_confirmar_empleado.php?id_empleado=<?php echo $data["id_empleado"]; ?>">Eliminar</a>
				<?php } ?>
				</td>
			</tr>
			<?php
			}

		}


		?>
			
		</table>

		<div class="paginador">
			<ul>
				<?php
				if ($pagina != 1) {
					// code...
				
				?>
				<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina - 1; ?>"><<</a></li>

				<?php
			}
					for ($i=1; $i <= $total_paginas ; $i++)
					{
						if ($i == $pagina) {
							echo '<li class="pageSelected" >'.$i.'</li>';
						}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}
				if($pagina != $total_paginas)
				{
				?>
				
				<li><a href="?pagina=<?php echo $pagina + 1;?>">>></a></li>
				<li><a href="?pagina=<?php echo $total_paginas;?>">>|</a></li>
			<?php } ?>
			</ul>
		</div>
		
	</section>

	<?php include "includes/footer.php"; ?>
</body>
</html>