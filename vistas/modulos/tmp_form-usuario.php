<form id="formularioUser" class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="modal-body">


            <div class="form-group m-b-25">
                <div class="col-12">
                    <label for="username">Nombre</label>
                    <input class="form-control" type="text" id="nombre_usuario" name="nombre_usuario" value=" "  placeholder="Nombre del usuario"  data-parsley-required data-parsley-required-message="Este campo es requerido" data-parsley-minlength="3" data-parsley-minlength-message="El nombre debe ser de al menos 3 caractares" >
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
                    <p>Selecciona un  perfil para el usuario</p>
                    <select name="perfil" id="perfil" class="selectpicker " data-style="btn-primary btn-bordered" parsley-trigger="change" data-parsley-required data-parsley-required-message="Este campo es requerido" >
                        <!-- <option value="">Selecciona un perfil</option> -->
                        <option value=" " id="optPerfil"></option>
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
           <button  class="btn btn-primary waves-effect waves-light" type="submit" >
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

<div class="row mt-4">
    <div class="col-sm-12">
        <!-- meta -->
        <div class="profile-user-box card-box bg-custom">
            <div class="row">
                <div class="col-sm-6">
                    <span class="float-left mr-3"><img src="vistas/assets/images/users/avatar-1.jpg" alt="" class="thumb-lg rounded-circle"></span>
                    <div class="media-body text-white">
                        <h4 class="mt-1 mb-1 font-18">Administración de usuarios</h4>
                        <p class="font-13 text-light">Listado de usuarios</p>
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