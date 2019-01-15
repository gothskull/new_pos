<?php 

class ControladorUsuarios
{
	/**
	 * Ingreso de Usuarios 
	 */
	static public function ctrIngresoUsuarios()
	{
		if(isset($_POST['correo']))
		{
			if(preg_match('/^[a-zA-Z0-9@.-]+$/', $_POST['correo']) && 
		       preg_match('/^[a-zA-Z0-9!#$%&)(]+$/',$_POST['password']))
			{
				$tabla = 'usuarios';
				$item  = 'correo';
				$valor = $_POST['correo'];
				$rta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

				if($rta['correo'] == $_POST['correo'] && $_POST['password'] == $rta['password'])
				{
					$_SESSION['init']    = "true";
					$_SESSION['usuario'] = $rta['nombreUsuario'];
					$_SESSION['correo']  = $rta['correo'];
					$_SESSION['perfil']  = $rta['perfil'];
					$_SESSION['foto']    = $rta['fotoUsuario'];

					echo "<script>";
						echo "window.location = 'inicio'";
					echo "</script>";
				}else { ?>
				<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        Datos de ingreso incorrectos
                    </div>
			<?php } 

			 }
		}
	}
	/**
	 * Registro de Usuarios 
	 */
	static public function ctrCrearUsuario()
	{
		if(isset($_FILES['fotoUsuario']['tmp_name']))
		{
			var_dump($_FILES['fotoUsuario']['tmp_name']);
		} else {
			echo "<h1>Paila33</h1>";
		}
		if(isset($_POST['correo']))
		{
			if($_POST['nombreUsuario'])
			{
				// if(isset($_FILES['fotoUsuario']['tmp_name']))
				// {
				// 	var_dump($_FILES['fotoUsuario']['tmp_name']);
				// } else {
				// 	echo "<h1>Paila</h1>";
				// }
				// $tabla = 'usuarios';
				// $mysalt = $_POST['password'];
				// $passEncriptado = crypt($_POST['password'],'$2a$07cfvgbhn$');
				// $datos = [
				// 	'nombreUsuario'  => $_POST['nombreUsuario'],
				// 	'correo'  => $_POST['correo'],
				// 	'password'=> $passEncriptado,
				// 	'perfil'  => $_POST['perfil']
				// ];
				// $rta = ModeloUsuarios::mdlIngresoUsuarios($tabla, $datos);

			}
		}
	}

	/**
	 * Lista los usuarios de la base de datos
	 */
	static public function ctrListarUsuarios($item, $valor)
	{
		$tabla = 'usuarios';
		
		$rta   = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $rta;
	}
	  

	/**
	 * No permite correos repetidos 
	 */
	
	static public function ctrValidarCorreoRepetido( $validarCorreo)
	{
		$tabla           = "usuarios";
		$datosController = $validarCorreo;

		$rta = ModeloUsuarios::mdlValidarCorreoRepetido($datosController, $tabla);

		if($rta[0] > 0)
		{
			echo "true";
		} else {
			echo "false77";

		}
	}
	  
}