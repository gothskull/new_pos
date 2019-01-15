
            <li>
                <div class="page-title-box">
                    <h4 class="page-title">Administración de Usuarios </h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item">Usuarios</li>
                    </ol>
                </div>
            </li>

        </ul>

    </nav>

</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- <button class="btn btn-sm btn-primary mb-2 btn-rounded" data-toggle="modal" data-target="#modal-usuarios">Agregr Usuario</button> -->
          <button type="button" class="btn btn-primary waves-effect waves-light mb-2" data-toggle="modal" data-target="#signup-modal"><i class="fa fa-plus"></i> Agregar Usuario</button>

            <table id="tablaUsuarios" class="table table-bordered dt-responsive table-hover nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Último Login</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
                </thead>


                <tbody>
                    <?php
                        $item  = null;
                        $valor = null; 
                        $usuarios = ControladorUsuarios::ctrListarUsuarios($item, $valor);

                        foreach($usuarios as $key => $value)
                        { ?>

                            <tr class="text-center">
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['nombreUsuario'] ?></td>
                                <td><?php echo $value['correo'] ?></td>
                                <td><?php echo $value['perfil'] ?></td>
                                <td><?php echo $value['estado'] == 1 ? '<span class="badge badge-success">Activado</span>' : '<span class="badge badge-danger">Desactivado</span>' ?></td>
                                <td><?php echo $value['ultimo_login'] ?></td>
                                <td>
                                    <?php 
                                        if($value['estado'] != "")
                                        { ?>
                                            <img src="<?php echo $value['foto'] ?>" alt="" class="img-fluid img-rounded-circle" width="38px">
                                        <?php } else { ?>
                                        <img src="vistas/assets/images/users/user.png" alt="" class="img-fluid img-rounded-circle" width="38px">
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-toggle">
                                        <label for="" class="btn btn-primary btn-sm">
                                            <input type="radio"><i class="fa fa-pencil"></i>
                                        </label>
                                        <label for="" class="btn btn-danger btn-sm">
                                            <input type="radio"><i class="fa fa-trash"></i>
                                        </label>
                                    </div>
                                </td>
                            </tr>

                        <?php }
                    ?>
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Último Login</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<div class="row">
    <div class="col-12">
        <div id="modal-usuarios" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h3>Agregar Usuario</h3>
                        <div class="modal-body"></div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h3>Crear Nuevo Usuario</h3>
            </div>
            <form id="formularioUser" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="modal-body">


                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="username">Nombre</label>
                                <input class="form-control" type="text" id="nombreUsuario" name="nombreUsuario"  placeholder="Nombre del usuario"  data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-minlength="3" data-parsley-minlength-message="El nombre debe ser de al menos 3 caractares" >
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="emailaddress">Correo</label>
                                <input class="form-control" type="email" id="correo" name="correo" placeholder="Ingresa el Correo" parsley-trigger="change" data-parsley-required  data-parsley-required-message="Este campo es requerido" data-parsley-type="email" data-parsley-type-message="Introduce una dirección de correo valida">
                                <ul class="parsley-errors-list filled d-none" id="errorCorreo">
                                    <li class="parsley-type">Este correo ya existe en la base de datos</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="password">Contraseña</label>
                                <input class="form-control" type="password" ="" id="password" name="password" placeholder="Ingresa la contraseña" parsley-trigger="change" data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-minlength-message="La contraseña debe ser de minimo 8 caracteres" data-parsley-minlength="8">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <p>Seleciona un  perfil para el usuario</p>
                                <select name="perfil" id="perfil" class="selectpicker " data-style="btn-primary btn-bordered" parsley-trigger="change" data-parsley-required data-parsley-required-message="Este campo es requerido" >

                                    <option disabled>Selecciona un perfil</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="vendedor">Vendedor</option>
                                    <option value="especial">Especial</option>
                                </select>
                                 <ul class="parsley-errors-list filled " id="errorCorreo">
                                    <li class="parsley-type">Debes seleccionar un perfil</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row form-group m-b-0">
                                <div class="col-12">
                                    <p class="mb-2 mt-4 font-weight-bold text-muted">Subir imágen</p>
                                </div>
                            <div class="col-10 align-items-center">
                                <input type="file" class="form-control fotoUsuario" id="fotoUsuario" name="fotoUsuario">
                                <p class="help-block text-center">Peso máximo de la foto: 20MB</p>
                                 <ul class="parsley-errors-list filled d-none" id="errorFotoSize">
                                    <li class="parsley-type">La  foto debe pesar menos de 20MB</li>
                                </ul>
                                 <ul class="parsley-errors-list filled d-none" id="errorFotoType">
                                    <li class="parsley-type">Solo se admiten fotos en formatos JPG O PNG</li>
                                </ul>
                            </div>

                            <div class="col-2 ">
                                <img src="" width="100px" height="100px" class="img-fluid rounded-circle justify-content-end previsualizar">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                   <div class="form-group text-right m-b-0">
                       <button id="btnCrearUsuario" class="btn btn-primary waves-effect waves-light" type="submit">
                           <i class="fa fa-check-circle"></i> Crear
                       </button>
                       <button type="reset" class="btn btn-light waves-effect m-l-5" data-dismiss="modal">
                           <i class="fa fa-times-circle"></i> Cancelar
                       </button>
                   </div>
                </div>
                <?php 
                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario->ctrCrearUsuario();
                ?>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
