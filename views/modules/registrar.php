<?php  

require_once "navegacion.php";

?>

<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4"><br>
			<h3>Registrar Contacto</h3>
			<form method="post" accept-charset="utf-8">
				<div class="form-group">
					<label>Nombre(s):</label>
					<input type="text" class="form-control" name="txtnombre" required>
				</div>
				<div class="form-group">
					<label>Apellido Paterno:</label>
					<input type="text" class="form-control" name="txtapp" required>
				</div>
				<div class="form-group">
					<label>Apellido Materno:</label>
					<input type="text" class="form-control" name="txtapm" required>
				</div>
				<div class="form-group">
					<label>Teléfono:</label>
					<input type="number" class="form-control" name="txttel" required>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" name="txtemail" required>
				</div>
				<div class="form-group">
					<label>Dirección:</label>
					<input type="text" class="form-control" name="txtdir" required>
				</div>
				<div class="form-group">
					<label>Fecha de registro:</label>
					<input type="date" class="form-control" name="txtfecha" value="<?php echo date('Y-m-d');?>" required readonly>
				</div>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="registrar">Registar</button>
			</form>
			<br>

			<?php  

				$registrar = new ContactosController();
				$registrar->registrar();

				if (isset($_GET['action'])) {
					
					if ($_GET['action'] == "registrado") {
						
						echo "<div class='alert alert-success'>
								<strong>Contacto registrado</strong>
								</div>";

					}elseif ($_GET['action'] == "unregistred" ) {
						
						echo "<div class='alert alert-danger'>
								<strong>Error al registrar</strong>
								</div>";

					}

				}

			?>
		</div>
		<div class="col-lg-4"></div>
	</div>
</div>