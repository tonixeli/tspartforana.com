<html>
	<head>
		<meta charset = "utf-8">
	</head>
	<body>
<?php 
include "../conexion.php";

$id_localidad=$_POST['id_localidad'];

	$sql="SELECT u.id_usuario, u.nombre, l.id_localidad, l.nombre 
		FROM usuarios  u INNER JOIN localidades l ON u.id_localidad = l.id_localidad
		where u.id_localidad = '$id_localidad' and estatus = 1 ORDER BY u.nombre ASC";

		$result=mysqli_query($conection,$sql);

$cadena="


			<select id_usuario='id_usuario' name='id_usuario' required>";
			$cadena=$cadena."<option value='' >Selecciona Usuario</option>";

	while ($id_usuario=mysqli_fetch_row($result)) 
	{

		$cadena=$cadena."<option value='$id_usuario[0]'>$id_usuario[1]</option>";
	}	

	echo  $cadena.
	"</select>";
?>
</body>

