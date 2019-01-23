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
			$link = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN perfil  ON id_usuario = id_perfil");
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
		$link = Conexion::conectar()->prepare("INSERT INTO $tabla(
													nombre_usuario,
													apellidos_usu,
													correo,
													password,
													num_identificacion, 
													telefono_usu, 
													tipo_sangre, 
													direccion, 
													nacimiento,
													perfil_id, 
													estado,
													foto_usuario) 
												VALUES(
													:nombre_usuario, 
													:apellidos_usu, 
													:correo,
													:password,
													:num_identificacion, 
													:telefono_usu, 
													:tipo_sangre, 
													:direccion, 
													:nacimiento, 
													:perfil_id, 
													:estado,
													:foto_usuario)");
		$link->bindParam(":nombre_usuario", $datos["nombre_usuario"], PDO::PARAM_STR);
		$link->bindParam(":apellidos_usu", $datos["apellidos_usu"], PDO::PARAM_STR);
		$link->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$link->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$link->bindParam(":num_identificacion", $datos["num_identificacion"], PDO::PARAM_STR);
		$link->bindParam(":telefono_usu", $datos["telefono_usu"], PDO::PARAM_INT);
		$link->bindParam(":tipo_sangre", $datos["tipo_sangre"], PDO::PARAM_STR);
		$link->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$link->bindParam(":nacimiento", $datos["nacimiento"], PDO::PARAM_STR);
		$link->bindParam(":perfil_id", $datos["perfil_id"], PDO::PARAM_STR);
		$link->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$link->bindParam(":foto_usuario", $datos["foto_usuario"], PDO::PARAM_STR);

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