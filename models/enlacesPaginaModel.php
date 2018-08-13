<?php  

Class EnlacesPaginaModel{

	public static function verEnlaces($enlaces){

		if ($enlaces == "registrar" || $enlaces == "consultas" || $enlaces == "editar") {
			
			$module = "views/modules/".$enlaces.".php";

		}

		elseif ($enlaces == "index") {
			

			$module = "views/modules/registrar.php";

		}

		elseif ($enlaces == "registrado") {
			

			$module = "views/modules/registrar.php";

		}

		elseif ($enlaces == "unregistred") {
			

			$module = "views/modules/registrar.php";

		}

		elseif ($enlaces == "actualizado") {
			

			$module = "views/modules/consultas.php";

		}

		elseif ($enlaces == "wrong") {
			

			$module = "views/modules/consultas.php";

		}

		elseif ($enlaces == "eliminado") {
			

			$module = "views/modules/consultas.php";

		}

		elseif ($enlaces == "undeleted") {
			

			$module = "views/modules/consultas.php";

		}

		else{

			$module = "views/modules/registrar.php";			

		}

		return $module;

	}


}

?>