<?php 

class ControladorUsuarios
{
	public function ctrIngresoUsuarios()
	{
		if(isset($_POST['correo']))
		{
			if(preg_match('/^[a-zA-Z0-9@.-]+$/',$_POST['correo']) && 
		       preg_match('/^[a-zA-Z0-9!#$%&()]+$/',$_POST['password']))
			{
				$tabla = 'usuarios';
				$item  = 'correo';
				$valor = $_POST['correo'];

				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta['correo'] == $_POST['correo'] && $respuesta['password'] == $_POST['password'])
				{
					$_SESSION['init'] = "true";
					echo "<script>";
						echo "window.location = 'inicio' ";
					echo "</script>";
				} else { ?>
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
}