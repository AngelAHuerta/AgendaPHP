<?php  
require_once "conexion.php";

Class ContactosModel{

	public static function insertBD($datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO contactos(nombre, apPaterno, apMaterno, telefono, email, direccion, fechaRegistro) VALUES (:nombre, :app, :apm, :tel, :email, :direccion, :fecha)");

		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":app", $datos['app'], PDO::PARAM_STR);
		$stmt->bindParam(":apm", $datos['apm'], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datos['telefono'], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "registrado";
		}else{
			return "unregistred";
		}

	}

	public static function queryBD(){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM contactos");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	public static function llenarFormulario($datos){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM contactos WHERE idContacto = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	public function updateBD($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE contactos SET nombre = :nombre, apPaterno = :app, apMaterno = :apm, telefono = :tel, email = :email, direccion = :direccion WHERE idContacto = :id");

		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":app", $datos['app'], PDO::PARAM_STR);
		$stmt->bindParam(":apm", $datos['apm'], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datos['telefono'], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "actualizado";
		}else{
			return "wrong";
		}

		$stmt->close();

	}

	public static function deleteBD($datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM contactos WHERE idContacto = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "eliminado";
		}else{
			return "undeleted";
		}

	}

}

?>