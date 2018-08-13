<?php

require_once "models/enlacesPaginaModel.php";

Class EnlacesPaginaController{

	public function enlaces(){

		if (isset($_GET['action'])) {
			
			$enlace = $_GET['action'];

		}else{

			$enlace = "index";

		}

		$respuesta = EnlacesPaginaModel::verEnlaces($enlace);

		include $respuesta;

	}

}

?>