<?php 
	require_once "../controladores/usuarios.controlador.php";
	require_once "../modelos/usuarios.modelo.php";

class ajaxUsuarios
{
	public $idUsuario;
	public $validarCorreo;

	/**
	 * Evita que se creen correos repetidos 
	 */
	public function ajaxValidarCorreo()
	{
		// $datos = $this->validarCorreo;
		$item  = "correo";
		$valor = $this->validarCorreo;

		$rta = ControladorUsuarios::ctrMostrarUsuarios( $item, $valor);

		echo json_encode($rta);

		// echo json_encode("El valor que llego al archivo ajax fue: ".$valor); 
	}
	/**
	 * Edicion de usuarios 
	 */
	public function ajaxEditarUsuario()
	{
		$item  = "id_usuario";
		$valor = $this->idUsuario;
		$rta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode( $rta );
		//echo json_encode("El valor que llego al archivo ajax fue: ".$valor);
	}
}
/**
 * Evita que se creen correos repetidos 
 */
if(isset($_POST['validarCorreo']))
{
	$validarCorreo = new ajaxUsuarios();
	$validarCorreo-> validarCorreo = $_POST['validarCorreo'];
	$validarCorreo-> ajaxValidarCorreo();
} 

/**
 * Edicion de usuarios 
 */
if(isset($_POST['idUsuario']))
{
	$editar = new ajaxUsuarios();
	$editar-> idUsuario = $_POST['idUsuario'];
	$editar-> ajaxEditarUsuario();
}

