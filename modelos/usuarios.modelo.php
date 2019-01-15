<?php 
require_once "conexion.php";

class ModeloUsuarios
{
	/**
	 * Verifica el acceso de los usuarios al sistema 
	 */
	static public function mdlMostrarUsuario($tabla, $item, $valor)
	{
		if($item != null)
		{
			$link = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$link->bindParam(":".$item, $valor,PDO::PARAM_STR);
			$link->execute();

			return $link->fetch();
		} else {
			$link = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$link->execute();

			return $link->fetchAll();
		}

		$link->close();
		$link = null;
	}
	/**
	 * Ingreso de usuarios 
	 */
	static public function mdlIngresoUsuarios($tabla, $datos)
	{
		$link = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreUsuario,correo,password,perfil) VALUES(:nombreUsuario,:correo,:password,:perfil)");
		$link->bindParam("nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
		$link->bindParam("correo", $datos["correo"], PDO::PARAM_STR);
		$link->bindParam("password", $datos["password"], PDO::PARAM_STR);
		$link->bindParam("perfil", $datos["perfil"], PDO::PARAM_STR);

		if($link->execute())
		{
			return "ok";
		} else {
			return "error";
		}

		$link->close();
		$link = null;

	}
	/**
	 * Valida que no se repitan correos 
	 */
	static public function mdlValidarCorreoRepetido($tabla, $datosController)
	{
		$link = Conexion::conectar()->prepare("SELECT correo FROM $tabla WHERE correo = :correo");
		$link->bindParam(":correo", $datosController, PDO::PARAM_STR);
		$link->execute();

		return $link->fetch();

		$link->close();
		$link = null;
	}
	  
}