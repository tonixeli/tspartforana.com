<html>
	<head>
		<meta charset = "utf-8">
	</head>
	<body>
<?php 
include "../conexion.php";

$pueblo=$_POST['pueblo'];

	$sql="SELECT  nombre
		from usuarios 
		where pueblo='$pueblo' AND estatus = 1 order by nombre ASC";

	$result=mysqli_query($conection,$sql);

$cadena="


			<select id='usuario' name='usuario' required>";
			$cadena=$cadena."<option value='' >Selecciona Usuario</option>";

	while ($usuario=mysqli_fetch_row($result)) 
	{

		$cadena=$cadena."<option value='$usuario[0]'>$usuario[0]</option>";
	}

	echo  $cadena.
	"</select>";
?>
</body>