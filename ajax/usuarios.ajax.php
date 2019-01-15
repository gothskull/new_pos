<?php 
	require_once "../controladores/usuarios.controlador.php";
	require_once "../modelos/usuarios.modelo.php";

class UsuariosAjax
{
	public $validarCorreo;

	public function validarCorreoAjax()
	{
		$datos = $this->validarCorreo;

		$rta = ControladorUsuarios::ctrValidarCorreoRepetido( $datos);

		echo $rta;
	}
}

$correo = new UsuariosAjax();
$correo-> validarCorreo = $_POST['validarCorreo'];
$correo-> validarCorreoAjax();