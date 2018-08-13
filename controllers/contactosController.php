<?php  

require_once "models/contactosModel.php";

Class ContactosController{

	public function registrar(){

		if (isset($_POST['txtnombre'])){
			
			$datos = array('nombre' => utf8_decode($_POST['txtnombre']),
			 				'app' => utf8_decode($_POST['txtapp']), 
			 				'apm' => utf8_decode($_POST['txtapm']), 
			 				'telefono' => $_POST['txttel'], 
			 				'email' => $_POST['txtemail'], 
			 				'direccion' => utf8_decode($_POST['txtdir']), 
			 				'fecha' => $_POST['txtfecha']);

			$respuesta = ContactosModel::insertBD($datos);

			if ($respuesta == "registrado" ) {
				header("location:index.php?action=registrado");
			}elseif ($respuesta == "unregistred" ) {
				header("location:index.php?action=unregistred");
			}
		
		}

	}

	public function consultarContactos(){


		$respuesta = ContactosModel::queryBD();

		foreach ($respuesta as $key => $item) {
			
			echo '<tr>
					<td>'.utf8_encode($item['nombre']).'</td>
					<td>'.utf8_encode($item['apPaterno']).'</td>
					<td>'.utf8_encode($item['apMaterno']).'</td>
					<td>'.$item['telefono'].'</td>
					<td>'.$item['email'].'</td>
					<td>'.utf8_encode($item['direccion']).'</td>
					<td>'.$item['fechaRegistro'].'</td>
					<td><a href="index.php?action=editar&idEditar='.$item['idContacto'].'"><span class="glyphicon glyphicon-edit"></span></a></td>
					<td><a href="index.php?action=consultas&idEliminar='.$item['idContacto'].'"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>';

		}

	}

	public function verFormulario(){

		$datos = $_GET['idEditar'];

		$respuesta = ContactosModel::llenarFormulario($datos);

		echo '<div>
				<input type="hidden" name="txtid" value="'.$respuesta['idContacto'].'">
			</div>
			<div class="form-group">
				<label>Nombre(s):</label>
				<input type="text" class="form-control" name="txtnombre" value="'.utf8_encode($respuesta['nombre']).'" required>
			</div>
			<div class="form-group">
				<label>Apellido Paterno:</label>
				<input type="text" class="form-control" name="txtapp" value="'.utf8_encode($respuesta['apPaterno']).'" required>
			</div>
			<div class="form-group">
				<label>Apellido Materno:</label>
				<input type="text" class="form-control" name="txtapm" value="'.utf8_encode($respuesta['apMaterno']).'" required>
			</div>
			<div class="form-group">
				<label>Teléfono:</label>
				<input type="number" class="form-control" name="txttel" value="'.$respuesta['telefono'].'" required>
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" class="form-control" name="txtemail" value="'.$respuesta['email'].'" required>
			</div>
			<div class="form-group">
				<label>Dirección:</label>
				<input type="text" class="form-control" name="txtdir" value="'.utf8_encode($respuesta['direccion']).'" required>
			</div>
			<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="editar">Editar</button>';


	}

	public function editarContacto(){

		if (isset($_POST['txtnombre'])) {
			
			$datos = array('nombre' => utf8_decode($_POST['txtnombre']),
			 				'app' => utf8_decode($_POST['txtapp']), 
			 				'apm' => utf8_decode($_POST['txtapm']), 
			 				'telefono' => $_POST['txttel'], 
			 				'email' => $_POST['txtemail'], 
			 				'direccion' => utf8_decode($_POST['txtdir']),
			 				 'id' => $_POST['txtid']);

			$respuesta = ContactosModel::updateBD($datos);

			if ($respuesta == "actualizado") {
				header("location:index.php?action=actualizado");
			}elseif ($respuesta == "wrong") {
				header("location:index.php?action=wrong");
			}

		}

	}

	public function eliminar(){

		if (isset($_GET['idEliminar'])) {
		
			$datos = $_GET['idEliminar'];

			$respuesta = ContactosModel::deleteBD($datos);

			if ($respuesta == "eliminado") {
				header("location:index.php?action=eliminado");
			}elseif ($respuesta == "undeleted") {
				header("location:index.php?action=undeleted");
			}

		}

	}

}

?>