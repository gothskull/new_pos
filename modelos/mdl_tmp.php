<?php 

	require_once "conexion.php";

// class ModeloUsuarios
// {
// 	static public function mdlMostrarUsuarios($tabla, $item, $valor)
// 	{
// 		$conn = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
// 		$conn->bindParam(":".$item, $valor, PDO::PARAM_STR);
// 		$conn->execute();

// 		return $conn->fetch();
// 	}
// }

class ModeloUsuarios
{
	 static public function mdlMostrarUsuarios($tabla, $item, $valor)
	 {
	 	$conn = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
	 	$conn->bindParam(":".$item, $valor, PDO::PARAM_STR);
	 	$conn->execute();

	 	return $conn->fetch();
	 }
}