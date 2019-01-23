
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

    </nav><!-- FIN TOPBAR -->

</div>
<section id="listaUsuarios">
    <div class="row mt-4">
        <div class="col-sm-12">
            <!-- meta -->
            <div class="profile-user-box card-box bg-custom">
                <div class="row">
                    <div class="col-sm-6">
                        <span class="float-left mr-3"><img src="vistas/assets/images/users/user.png" alt="" class="thumb-lg rounded-circle"></span>
                        <div class="media-body text-white">
                            <h4 class="mt-1 mb-1 font-18 text-uppercase">Lista de usuarios</h4>
                            <p>Distrivelez Avenida Boyaca</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-right">
                            <button type="button" class="btn btn-light waves-effect" data-toggle="modal" data-target="#signup-modal">
                                <i class="fa fa-plus"></i> Agregar Usuario
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
             <!--  <button id="addUser"  type="button" class="btn btn-primary waves-effect waves-light mb-5 ml-3" data-toggle="modal" data-target="#signup-modal"><i class="fa fa-plus"></i> Agregar Usuario</button> -->

                <table id="tablaUsuarios" class="table table-bordered dt-responsive table-hover table-striped nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Foto</th>
                        <th>Último Login</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>


                    <tbody>
                        <?php
                            $item  = null;
                            $valor = null; 
                            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                            foreach($usuarios as $key => $value)
                            { ?>

                                <tr class="text-center">
                                    <td><?php echo $value['id_usuario'] ?></td>
                                    <td><?php echo $value['nombre_usuario'] . " " . $value['apellidos_usu'] ?></td>
                                    <td><?php echo $value['correo'] ?></td>
                                    <td><?php echo $value['nombre_perfil'] ?></td>
                                    <td><?php echo $value['estado'] == 1 ? '<span class="badge badge-custom">Activado</span>' : '<span class="badge badge-danger">Desactivado</span>' ?></td>
                                    <td>
                                        <?php 
                                            if(!empty($value['foto_usuario']))
                                            { ?>
                                                <img src="<?php echo $value['foto_usuario'] ?>" alt="" class="img-fluid rounded-circle" width="38px">
                                            <?php } else { ?>
                                            <img src="vistas/assets/images/users/user.png" alt="" class="img-fluid img-rounded-circle" width="38px">
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $value['ultimo_login'] ?></td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            <label  idUser="<?php echo $value['id_usuario'] ?>" for="" class="btn bg-custom text-light btn-sm editarUser" >
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
                            <!-- <th>Apellidos</th> -->
                            <th>Correo</th>
                            <!-- <th>Contraseña</th> -->
                            <!-- <th>Tipo de documento</th> -->
                            <!-- <th>Número de identificación</th> -->
                            <!-- <th>Teléfono</th> -->
                            <!-- <th>Tipo de sangre</th> -->
                            <!-- <th>Dirección</th> -->
                            <!-- <th>Fecha de nacimiento</th> -->
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Foto</th>
                            <th>Último Login</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div> <!-- FIN TABLA MOSTRANDO ITEMS -->
</section>




<!-- FORMULARIO EDICIÓN  USUARIOS -->
<section id="edicionUsuarios" class="d-none">
    <div class="row mt-4">
        <div class="col-sm-12">
            <!-- meta -->
            <div class="profile-user-box card-box bg-custom">
                <div class="row">
                    <div class="col-sm-6">
                        <span class="float-left mr-3">
                            <img src="vistas/assets/images/users/user.png" alt="" class="thumb-lg rounded-circle ">
                        </span>
                        <div class="media-body text-white">
                            <h4 class="mt-1 mb-1 font-18 text-uppercase">Edición de usuarios</h4>
                            <p>Distrivelez Avenida Boyaca</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-right">
                            <button type="button" class="btn btn-light waves-effect" data-toggle="modal" data-target="#signup-modal">
                                <i class="fa fa-plus"></i> Agregar Usuario
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>
    <div class="row">
            <div class="col-sm-12">
                <div class="card-box ">
                    <div class="row">
                        <div class="col-md-4 text-center mt-1">
                            <h2 id="nvo_titulo_perfil" class="text-capitalize"></h2>
                            <img src="" class="img-fluid mt-3 foto_edicion rounded-circle" alt="" width="128px">
                            <!-- <img src="vistas/assets/images/users/user.png" class="img-fluid mt-3 foto_base  rounded-circle" alt=""> -->
                             <div class="input-group mt-5">
                                <div class="input-group-append">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input foto_usuario" id="nva_foto_usuario" name="foto_usuario" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                        <label for="" class="custom-file-label text-left">Sube una foto</label>
                                         <ul class="parsley-errors-list filled d-none" id="">
                                            <li class="parsley-type">La  foto debe pesar menos de 20MB</li>
                                        </ul>
                                         <ul class="parsley-errors-list filled d-none" id="">
                                            <li class="parsley-type">Solo se admiten fotos en formatos JPG O PNG</li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="help-block mx-auto">Peso máximo de la foto: 2MB</p>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <form id="formUserEdit" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                        <div class="form-row">
                                            <div class="form-group col">
                                                    <!-- <label for="" class="col-form-label">Nombre</label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-user"></i></div>
                                                    </div>
                                                    <input type="text" id="nvo_nombre_usuario" class="form-control" name="nombre_usuario" value="" data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-minlength="3" data-parsley-minlength-message="El nombre debe ser de al menos 3 caractares">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-custom text-light"><div class="fa fa-user"></div></div>
                                                    </div>
                                                    <input type="text" class="form-control" id="nvo_apellidos_usu" name="apellidos_usu" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-address-card"></i></div>
                                                    </div>
                                                    <input type="text" id="nvo_num_identificacion" class="form-control" name="num_identificacion" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-phone"></i></div>
                                                    </div>
                                                    <input type="text" id="nvo_telefono_usu" class="form-control" name="telefono_usu" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-envelope"></i></div>
                                                    </div>
                                                    <input type="email" id="nvo_correo" class="form-control" name="correo" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                                    <ul class="parsley-errors-list filled d-none" id="nvoErrorCorreo">
                                                        <li class="parsley-type">Este correo ya esta registrado</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <div class="col-form-label"></div> -->
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-lock"></i></div>
                                                    </div>
                                                    <input type="password" id="nvo_password" class="form-control" name="password" placeholder="Ingresa la nueva contraseña" data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-minlength="8" data-parsley-minlength-message="La contraseña debe ser de al menos 8 caractares">
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-row">
                                            <div class="form-group col">
                                               <div class="input-group">
                                                   <div class="input-group-prepend">
                                                       <div class="input-group-text bg-custom text-light"><i class="fa fa-map-marker"></i></div>
                                                   </div>
                                                   <input type="text" id="nva_direccion" class="form-control" name="direccion" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="form-row">
                                           <div class="form-group col">
                                            <label for="" class="col form-label">Fecha de nacimiento</label>
                                               <input type="date" id="nvo_nacimiento" class="form-control" name="nacimiento" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                           </div>
                                           <div class="form-group col">
                                            <label for="" class="col form-label">Tipo de sangre</label>
                                               <div class="input-group ">
                                                   <div class="input-group-prepend">
                                                       <div class="input-group-text bg-custom text-light"><i class="fa fa-tint"></i></div>
                                                   </div>
                                                   <input type="text" id="nvo_tipo_sangre" class="form-control" name="tipo_sangre" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                               </div>
                                           </div>
                                       </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-custom">Perfil</button>
                                                    </div>
                                                    <select name="perfil_id" id="nvo_perfil_id" class="custom-select">
                                                        <option value="3">Vendedor</option>
                                                        <option value="1">Administrador</option>
                                                        <option value="2">Especial</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button for="" class="btn btn-custom">Estado</button>
                                                    </div>
                                                    <select name="estado" id="nvo_estado" class="custom-select">
                                                        <option value="1">Activado</option>
                                                        <option value="0">Desactivado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                </div>
                               <div class="form-group text-left m-b-0 mt-2 pl-3">
                                   <button  class="btn bg-custom text-light waves-effect waves-light" type="submit" >
                                       <i class="fa fa-check-circle"></i> Guardar
                                   </button>
                                   <button type="reset" class="btn btn-light waves-effect m-l-5 cancelEditUser" >
                                       <i class="fa fa-times-circle"></i> Cancelar
                                   </button>
                               </div>
                                <?php 
                                    $editarUsuario = new ControladorUsuarios();
                                    $editarUsuario->ctrEditarUsuario();
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h2 class="text-center">Vales de Hernando Chaves</h2>
                            <table id="tablaUsuarios" class="table table-bordered dt-responsive table-hover table-striped nowrap mt-3" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                            
                            
                                <tbody>
                                    <?php
                                        $item  = null;
                                        $valor = null; 
                                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                            
                                        foreach($usuarios as $key => $value)
                                        { ?>
                            
                                            <tr class="text-center">
                                                <td><?php echo $value['id_usuario'] ?></td>
                                                <td><?php echo $value['nombre_usuario'] . " " . $value['apellidos_usu'] ?></td>
                                                <td><?php echo $value['correo'] ?></td>
                                                <td><?php echo $value['nombre_perfil'] ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-toggle">
                                                        <label  idUser="<?php echo $value['id'] ?>" for="" class="btn bg-custom text-light btn-sm editarUser" >
                                                            <input type="radio"><i class="fa fa-pencil"></i>
                                                        </label>
                                                        <label idUser="<?php echo $value['id'] ?>" for="" class="btn btn-danger btn-sm ">
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
                                       <th>Descripción</th>
                                       <th>Fecha</th>
                                       <th>Valor</th>
                                       <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>





<!-- MODAL CREAR USUARIOS -->
<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-custom text-light">
                <h3>Crear Nuevo Usuario</h3>
                <h3 class="d-none">Editar Usuario</h3>
            </div>
            <form id="formUserAdd" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-user"></i></div>
                                    </div>
                                    <input type="text" id="nombre_usuario" class="form-control" name="nombre_usuario" placeholder="Nombre del usuario" data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-minlength="3" data-parsley-minlength-message="El nombre debe ser de al menos 3 caractares">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-custom text-light"><div class="fa fa-user"></div></div>
                                    </div>
                                    <input type="text" class="form-control" id="apellidos_usu" name="apellidos_usu" placeholder="Apellidos del usuario" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-address-card"></i></div>
                                    </div>
                                    <input type="text" id="num_identificacion" class="form-control" name="num_identificacion" placeholder="Número de cédula" data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-type="number" data-parsley-type-message="Solo se aceptan números">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input type="text" id="telefono_usu" class="form-control" name="telefono_usu" placeholder="Teléfono del usuario" data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-type="number" data-parsley-type-message="Solo se aceptan números">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <!-- <div class="col-form-label"></div> -->
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-envelope"></i></div>
                                    </div>
                                    <input type="email" id="correo" class="form-control" name="correo" placeholder="Correo del usuario" data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-type="email" data-parsley-type-message="Correo no valido">
                                    <ul class="parsley-errors-list filled d-none" id="errorCorreo">
                                        <li class="parsley-type">Este correo ya esta registrado</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <!-- <div class="col-form-label"></div> -->
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-custom text-light"><i class="fa fa-lock"></i></div>
                                    </div>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Ingresa la contraseña" data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-minlength="8" data-parsley-minlength-message="La contraseña debe ser de al menos 8 caractares">
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group col">
                               <div class="input-group input-group-sm">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text bg-custom text-light"><i class="fa fa-map-marker"></i></div>
                                   </div>
                                   <input type="text" id="direccion" class="form-control" name="direccion" placeholder="Dirección del usuario" >
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6">
                            <label for="" class="col form-label">Fecha de nacimiento</label>
                               <input type="date" id="nacimiento" class="form-control" name="nacimiento" data-parsley-required data-parsley-required-message="Este campo es requerido">
                           </div>
                           <div class="form-group col-md-6">
                            <label for="" class="col form-label">Tipo de sangre</label>
                               <div class="input-group ">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text bg-custom text-light"><i class="fa fa-tint"></i></div>
                                   </div>
                                   <input type="text" id="tipo_sangre" class="form-control" name="tipo_sangre" placeholder="Tipo de sangre" data-parsley-required data-parsley-required-message="Este campo es requerido">
                               </div>
                           </div>
                       </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-custom btn-sm">Perfil</button>
                                    </div>
                                    <select name="perfil_id" id="perfil_id" class="custom-select">
                                        <!-- <option value="">Escoge una opción</option> -->
                                        <option value="3">Vendedor</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Especial</option>
                                    </select>
                                     <ul class="parsley-errors-list filled d-none " id="errorPerfil">
                                        <li class="parsley-type">Este campo es requerido</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <button for="" class="btn btn-custom btn-sm">Estado</button>
                                    </div>
                                    <select name="estado" id="estado" class="custom-select">
                                        <option value="1">Activado</option>
                                        <option value="0">Desactivado</option>
                                    </select>
                                     <ul class="parsley-errors-list filled d-none " id="errorEstado">
                                        <li class="parsley-type">Este campo es requerido</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group m-b-0">
                                <div class="col-12">
                                    <p class="mb-2 mt-4 font-weight-bold ">Subir imágen</p>
                                </div>
                            <div class="col-10 align-items-center">
                                <div class="input-form-group input-group-sm">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input foto_usuario" id="foto_usuario" name="foto_usuario" data-parsley-required data-parsley-required-message="Este campo es requerido">
                                        <label for="" class="custom-file-label">Escoge un archivo</label>
                                        <p class="help-block text-center">Peso máximo de la foto: 20MB</p>
                                    </div>
                                </div>
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
                       <button id="btnCrearUser" class="btn bg-custom text-light waves-effect waves-light" type="submit" >
                           <i class="fa fa-check-circle"></i> Guardar
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
</div><!-- FIN MODAL -->


