<?php 

if($_SESSION['id_rol'] != 1 )
{?>
<nav>
			<ul>
				<li class="principal">
				<li><a href="#">Menu</a>
				<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="registro_sad.php">Nuevo S.A.D.</a></li>
						<li><a href="lista_sad.php">Lista de S.A.D.</a></li>				
						<li><a href="ver_cuadrante.php">Mi Cuadrante</a></li>					
						<li><a href="mis_ausencias.php">Mis Ausencias</a></li>
						<li><a href="perfil_empleado.php">Cambiar Contraseña</a></li>
				</ul>
				</li>
			</ul>
</nav>	
					
<?php
}else{

?>
<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li class="principal">
					
					<a href="#">Empleados</a>
					<ul>
						<li><a href="registro_empleado.php">Registro Empleado/a</a></li>
						<li><a href="lista_empleados.php">Lista de Empleados/as</a></li>

					</ul>
				</li>
				<li class="principal">
					
					<a href="#">Usuarios</a>
					<ul>						
						<li><a href="registro_usuario.php">Registro Usuario/a</a></li>
						<li><a href="lista_usuarios.php">Lista de Usuarios/as</a></li>
					</ul>
				</li>
				<li class="principal">
					
					<a href="#">Cuadrantes</a>
					<ul>
						<li><a href="registro_cuadrante.php">Gestión Cuadrantes</a></li>
						<li><a href="ver_cuadrante_admin.php">Imprimir Cuadrantes</a></li>
						<li><a href="ver_cuadrante.php">Mi Cuadrante</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">SAD</a>
					<ul>
						<li><a href="registro_sad.php">Nuevo SAD</a></li>
						<li><a href="lista_sad.php">Listar Mis  SAD</a></li>
						<li><a href="lista_sad_admin_mensual.php">Lista de SAD Mensual</a></li>
					</ul>
				</li>
				<li class="principal">
					<li class="principal">
					<a href="#">Perfil del Empleado</a>
					<ul>
						<li><a href="perfil_empleado.php">Cambiar Contraseña</a></li>
						<li><a href="mis_ausencias.php">Mis Ausencias</a></li>
					</ul>
				</li>
				
			</ul>
		</nav>
<?php } ?>