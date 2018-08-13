<?php  
require_once "navegacion.php";

?>

<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4"><br>
			<h3>Editar Contacto</h3>
			<form method="post" accept-charset="utf-8">
				<?php  

                    $formulario = new ContactosController();
                    $formulario->verFormulario();
                    $formulario->editarContacto();

				?>
			</form>
		</div>
		<div class="col-lg-4"></div>
	</div>
</div>