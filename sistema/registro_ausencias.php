<?php
include "../conexion.php";
include  "includes/scripts.php";
include "includes/header.php"; 
include "includes/footer.php";

	
	

			$id_empleado 	= $_POST['id_empleado'];
			$tipo_ausencia 	= $_POST['tipo_ausencia'];
			$fecha_inicio	= $_POST['fecha_inicio'];
			$fecha_fin 		= $_POST['fecha_fin'];
			
			$query_insert = mysqli_query($conection,"INSERT INTO ausencias (id_empleado, tipo_ausencia, fecha_inicio, fecha_fin) VALUES ('$id_empleado','$tipo_ausencia','$fecha_inicio','$fecha_fin')");
				if($query_insert){
					$alert='<p class="msg_save">Enviado Correctamente</p>';
					header("Location: mis_ausencias.php?id_empleado = $id_empleado");
				}else{
					$alert='<p class="msg_error">Error en el envio.</p>';
					header("Location: mis_ausencias.php?id_empleado = $id_empleado");
				}
		
		

?>	