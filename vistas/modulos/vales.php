
            <li>
                <div class="page-title-box">
                    <h4 class="page-title">Administración de Vales </h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item">Vales</li>
                    </ol>
                </div>
            </li>

        </ul>

    </nav><!-- FIN TOPBAR -->

</div>
<div class="row mt-4">
    <div class="col-sm-12">
        <!-- meta -->
        <div class="profile-user-box card-box bg-custom">
            <div class="row">
                <div class="col-sm-6">
                    <span class="float-left mr-3"><img src="vistas/assets/images/users/user.png" alt="" class="thumb-lg rounded-circle"></span>
                    <div class="media-body text-white">
                        <h4 class="mt-1 mb-1 font-18">Administración de vales</h4>
                        <p class="font-13 text-light">Listado de vales Distrivelez</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="text-right">
                        <button type="button" class="btn btn-light waves-effect" data-toggle="modal" data-target="#signup-modal">
                            <i class="fa fa-plus"></i> Agregar Vale
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
         <!--  <button id="addUser"  type="button" class="btn btn-primary waves-effect waves-light mb-5 ml-3" data-toggle="modal" data-target="#signup-modal"><i class="fa fa-plus"></i> Agregar Vale</button> -->

            <table id="tablaUsuarios" class="table table-bordered dt-responsive table-hover table-striped nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Usuario</th>
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
                                <td><?php echo $value['nombre_perfil'] ?></td>
                                <td>
                                    <div class="btn-group btn-group-toggle">
                                        <label  idUser="<?php echo $value['id'] ?>" for="" class="btn bg-custom text-light btn-sm editarUser" data-toggle="modal" data-target="#signup-modal">
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
                       <th>Usuario</th>
                       <th>Descripción</th>
                       <th>Fecha</th>
                       <th>Valor</th>
                       <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div> <!-- FIN TABLA MOSTRANDO ITEMS -->

<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-custom text-light">
                <h3>Crear Nuevo Usuario</h3>
                <h3 class="d-none">Editar Usuario</h3>
            </div>
            <form id="formularioUser" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col">
                                    <!-- <label for="" class="col-form-label">Nombre</label> -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user"></i></div>
                                    </div>
                                    <input type="text" id="nombre_usuario" class="form-control" name="nombre_usuario" placeholder="Nombre del usuario">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <!-- <label for="" class="col-form-label">Apellidos</label> -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><div class="fa fa-user"></div></div>
                                    </div>
                                    <input type="text" class="form-control" id="apellidos_usu" name="apellidos_usu" placeholder="Apellidos del usuario">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <!-- <label for="" class="col-form-label">Número de Cédula</label> -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-address-card"></i></div>
                                    </div>
                                    <input type="text" id="num_identificacion" class="form-control" name="num_identificacion" placeholder="Número de cédula">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input type="text" id="telefono_usu" class="form-control" name="telefono_usu" placeholder="Teléfono" del="" usuario="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <!-- <div class="col-form-label"></div> -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                    </div>
                                    <input type="email" id="correo" class="form-control" name="correo" placeholder="Correo del usuario">
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group col">
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fa fa-map-marker"></i></div>
                                   </div>
                                   <input type="text" id="direccion" class="form-control" name="direccion" placeholder="Dirección del usuario">
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col">
                            <label for="" class="col form-label">Fecha de nacimiento</label>
                               <input type="date" id="nacimiento" class="form-control" name="nacimiento">
                           </div>
                           <div class="form-group col">
                            <label for="" class="col form-label">Tipo de sangre</label>
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fa fa-tint"></i></div>
                                   </div>
                                   <input type="text" id="tipo_sangre" class="form-control" name="tipo_sangre" placeholder="Tipo de sangre">
                               </div>
                           </div>
                       </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="" class="col-form-label">Perfil del usuario</label>
                                <select name="nombre_perfil" id="nombre_perfil" class="selectpicker" >
                                    <option>Selecciona un perfil</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="vendedor">Vendedor</option>
                                    <option value="especial">Especial</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="col-form-label">Estado</label>
                                <select name="estado" id="estado" class="selectpicker" >
                                    <option>Asignale un estado</option>
                                    <option value="administrador">Activado</option>
                                    <option value="vendedor">Desactivado</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group m-b-0">
                                <div class="col-12">
                                    <p class="mb-2 mt-4 font-weight-bold ">Subir imágen</p>
                                </div>
                            <div class="col-10 align-items-center">
                                <input type="file" class="form-control foto_usuario" id="foto_usuario" name="foto_usuario">
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
                       <button  class="btn bg-custom text-light waves-effect waves-light" type="submit" >
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
