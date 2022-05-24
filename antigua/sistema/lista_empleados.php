<?php
include "../conexion.php";
 include "includes/header.php";
if($_SESSION['rol'] != 1)
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
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<h1>Lista de Empleados</h1>
		<a href="registro_empleado.php" class="btn_new">Crear empleado</a>
		<table>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>UsuarioBD</th>
				<th>Cargo</th>
				<th>Acciones</th>
			</tr>


			<?php
				//paginador
			$sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM empleados WHERE estatus = 1");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];


			$por_pagina = 15;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}


			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);


				$query = mysqli_query($conection, "SELECT e.idusuario, e.nombre, e.correo, e.usuario, e.cargo, r.rol 
					FROM empleados e INNER JOIN rol r ON e.rol = r.idrol 
					WHERE estatus = 1
					LIMIT $desde,$por_pagina ");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)){
			?>

			<tr>
				<td><?php echo $data["idusuario"]; ?></td>
				<td><?php echo $data["nombre"]; ?></td>
				<td><?php echo $data["correo"]; ?></td>
				<td><?php echo $data["usuario"]; ?></td>
				<td><?php echo $data["cargo"]; ?></td>
				<td>
					<a class="link_edit" href="editar_empleado.php?idusuario=<?php echo $data["idusuario"]; ?>">Editar</a>

					<?php If($data["idusuario"] != 1){  ?>

					|
					<a class="link_delete" href="eliminar_confirmar_empleado.php?id=<?php echo $data["idusuario"]; ?>">Eliminar</a>
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