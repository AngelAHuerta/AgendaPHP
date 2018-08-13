<?php  

require_once "navegacion.php";


?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12"><br>
			<h3>Consulta de contactos</h3><br>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nombre(s)</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Teléfono</th>
							<th>Email</th>
							<th>Dirección</th>
							<th>Fecha de Registro</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php 

                            $consulta = new ContactosController();
                            $consulta->consultarContactos();

						?>
					</tbody>
				</table>
			</div>
			<?php  

				$eliminar = new ContactosController();
				$eliminar->eliminar();

				if (isset($_GET['action'])) {
					
					if ($_GET['action'] == "actualizado") {
						
						echo "<div class='alert alert-success'>
								<strong>Contacto actualizado</strong>
								</div>";

					}elseif ($_GET['action'] == "wrong") {
						
						echo "<div class='alert alert-danger'>
								<strong>Error al actualizar</strong>
								</div>";

					}elseif ($_GET['action'] == "eliminado") {
						
						echo "<div class='alert alert-success'>
								<strong>Contacto eliminado</strong>
								</div>";

					}elseif ($_GET['action'] == "undeleted") {
						
						echo "<div class='alert alert-danger'>
								<strong>Error al eliminar</strong>
								</div>";

					}

				}

			?>
		</div>
	</div>
</div>