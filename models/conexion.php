<?php  

Class Conexion{

	public static function conectar(){

		try{
		
			$conexion = new PDO("mysql:host=localhost;dbname=agenda", "root", "");
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conexion;

		}catch (Exception $e) {
			
			echo $e->getMessage();

		}

	}

}

?>