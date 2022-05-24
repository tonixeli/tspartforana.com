<?php
	include "../conexion.php";
 include "includes/header.php";
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php  include  "includes/scripts.php"; ?>
	<title>Lista Usuarios</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<h1>Lista de Usuarios</h1>
		<a href="registro_usuario.php" class="btn_new">Crear Usuario</a>
		<table>
			<tr>

				<th>ID</th>
				<th>NOMBRE</th>
				<th>DNI</th>
				<th>PUEBLO</th>
				<th>TELEFONO</th>
				<th>TIPO SAD</th>
				<th>GRADO</th>				
				<th>COPAGO</th>	
				<th>ACCIONES</th>			
			</tr>
			<?php
				//paginador
			$sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM usuarios WHERE estatus = 1");
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

				$query = mysqli_query($conection, "SELECT *
					FROM usuarios
					WHERE estatus = 1 ORDER BY nombre
					LIMIT $desde,$por_pagina ");
				$result = mysqli_num_rows($query);
				if($result > 0){
					while ($data = mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data["id"]; ?></td>
				<td><?php echo $data["nombre"]; ?></td>
				<td><?php echo $data["dni"]; ?></td>
				<td><?php echo $data["pueblo"]; ?></td>
				<td><?php echo $data["telefono"]; ?></td>
				<td><?php echo $data["tipo_sad"]; ?></td>
				<td><?php echo $data["grado"]; ?></td>
				<td><?php echo $data["copago"]; ?></td>
				<td>
					<a class="link_edit" href="editar_usuario.php?id=<?php echo $data["id"]; ?>"> Editar </a>					
					|
					<a class="link_delete" href="eliminar_confirmar_usuario_sad.php?id=<?php echo $data["id"]; ?>"> Baja </a>				
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