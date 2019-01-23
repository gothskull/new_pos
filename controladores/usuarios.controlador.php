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
		       preg_match('/^[a-zA-Z0-9!#$%&)(]+$/',$_POST['ingPassword']))
			{
				$tabla = 'usuario';
				$item  = 'correo';
				$valor = $_POST['correo'];
				$rta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);
				$passEncriptado = crypt($_POST['ingPassword'],'$2a$07$god8l3SSm3AlwaysmyLord');

				if($rta['correo'] == $_POST['correo'] && $passEncriptado == $rta['password'])
				{
					$_SESSION['init']           = "true";
					$_SESSION['nombre_usuario'] = $rta['nombre_usuario'];
					$_SESSION['apellidos_usu']  = $rta['apellidos_usu'];
					$_SESSION['correo']         = $rta['correo'];
					$_SESSION['perfil']         = $rta['perfil'];
					$_SESSION['foto_usuario']   = $rta['foto_usuario'];

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
		
		if(isset($_POST['correo']))
		{
			if($_POST['nombre_usuario'])
			{
				if(isset($_FILES['foto_usuario']['tmp_name']))
				{
					$ruta = "";

					list($ancho,$alto) = getimagesize($_FILES['foto_usuario']['tmp_name']);
					// var_dump(getimagesize($_FILES['foto_usuario']['tmp_name']));

					$nvoAncho      = 500;
					$nvoAlto       = 500;
					$nombreArchivo = explode(" ", $_POST['nombre_usuario']);


					$directorio = "files/img/usuarios/".$_POST['nombre_usuario'];
					mkdir($directorio,0755);


					if($_FILES['foto_usuario']['type'] == "image/jpeg")
					{
						$ruta    = "files/img/usuarios/".$_POST['nombre_usuario']."/foto-".$nombreArchivo[0]."-".$nombreArchivo[1].".jpeg";
						$origen  = imagecreatefromjpeg($_FILES['foto_usuario']['tmp_name']);
						$destino = imagecreatetruecolor($nvoAncho,$nvoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nvoAncho,$nvoAlto, $ancho,$alto);
						imagejpeg($destino, $ruta);

					}

					if($_FILES['foto_usuario']['type'] == "image/png")
					{
						$ruta    = "files/img/usuarios/".$_POST['nombre_usuario']."/foto-".$nombreArchivo[0]."-".$nombreArchivo[1].".png";
						$origen  = imagecreatefromjpeg($_FILES['foto_usuario']['tmp_name']);
						$destino = imagecreatetruecolor($nvoAncho,$nvoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nvoAncho,$nvoAlto, $ancho,$alto);
						imagejpeg($destino, $ruta);

					}
				} 
				$tabla = 'usuario';
				$mysalt = $_POST['password'];
				$passEncriptado = crypt($_POST['password'],'$2a$07$god8l3SSm3AlwaysmyLord');
				$datos = [
					'nombre_usuario'     => $_POST['nombre_usuario'],
					'apellidos_usu'      => $_POST['apellidos_usu'],
					'correo'             => $_POST['correo'],
					'password'           => $passEncriptado,
					'num_identificacion' => $_POST['num_identificacion'],
					'telefono_usu'       => $_POST['telefono_usu'],
					'tipo_sangre'        => $_POST['tipo_sangre'],
					'direccion'          => $_POST['direccion'],
					'nacimiento'         => $_POST['nacimiento'],
					'perfil_id'          => $_POST['perfil_id'],
					'estado'             => $_POST['estado'],
					'foto_usuario'       => $ruta,
				];
				$rta = ModeloUsuarios::mdlIngresoUsuarios($tabla, $datos);

			}
		}
	}

	/**
	 * Lista los usuarios de la base de datos
	 */
	static public function ctrMostrarUsuarios($item, $valor)
	{
		$tabla = 'usuario';
		
		$rta   = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $rta;
	}
	  
	/**
	 * Edita los usuarios 
	 */
	static function ctrEditarUsuario()
	{
		
	}
	  

	/**
	 * No permite correos repetidos 
	 */
	
	static public function ctrValidarCorreoRepetido( $validarCorreo)
	{
		$tabla           = "usuario";
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