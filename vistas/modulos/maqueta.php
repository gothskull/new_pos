
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
            <!-- <button class="btn btn-sm btn-info mb-2 btn-rounded" data-toggle="modal" data-target="#modal-usuarios">Agregr Usuario</button> -->
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
                <tr class="text-center">
                    <td>1</td>
                    <td>Tiger Nixon</td>
                    <td>correo@gmaqilñ</td>
                    <td>Administrador</td>
                    <td><span class="badge badge-success">Activado</span></td>
                    <td>2011/04/25</td>
                    <td><img src="vistas/assets/images/users/user.png" alt="" class="img-fluid img-rounded-circle" width="38px"></td>
                    <td>
                        <div class="btn-group btn-group-toggle">
                            <label for="" class="btn btn-info btn-sm">
                                <input type="radio"><i class="fa fa-pencil"></i>
                            </label>
                            <label for="" class="btn btn-danger btn-sm">
                                <input type="radio"><i class="fa fa-trash"></i>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>1</td>
                    <td>Jorge Valverde</td>
                    <td>correo@gmaqilñ</td>
                    <td>Administrador</td>
                    <td><span class="badge badge-success">Activado</span></td>
                    <td>2011/04/25</td>
                    <td><img src="vistas/assets/images/users/user.png" alt="" class="img-fluid img-rounded-circle" width="38px"></td>
                    <td>
                        <div class="btn-group btn-group-toggle">
                            <label for="" class="btn btn-info btn-sm">
                                <input type="radio"><i class="fa fa-pencil"></i>
                            </label>
                            <label for="" class="btn btn-danger btn-sm">
                                <input type="radio"><i class="fa fa-trash"></i>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>1</td>
                    <td>Marthe Ropdriguez</td>
                    <td>correo@gmaqilñ</td>
                    <td>Administrador</td>
                    <td><span class="badge badge-danger">Desactivado</span></td>
                    <td>2011/04/25</td>
                    <td><img src="vistas/assets/images/users/user.png" alt="" class="img-fluid img-rounded-circle" width="38px"></td>
                    <td>
                        <div class="btn-group btn-group-toggle">
                            <label for="" class="btn btn-info btn-sm">
                                <input type="radio"><i class="fa fa-pencil"></i>
                            </label>
                            <label for="" class="btn btn-danger btn-sm">
                                <input type="radio"><i class="fa fa-trash"></i>
                            </label>
                        </div>
                    </td>
                </tr>
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
            <form class="form-horizontal" method="post">
                <di5v class="modal-body">


                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="username">Nombre</label>
                                <input class="form-control" type="text" id="nombreUser" name="nombreUser" required="" placeholder="Nombre del usuario">
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="emailaddress">Correo</label>
                                <input class="form-control" type="email" id="correo" name="correo" required="" placeholder="Ingresa el Correo">
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12">
                                <label for="password">Contraseña</label>
                                <input class="form-control" type="password" required="" id="password" name="password" placeholder="Ingresa la contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <p>Perfil</p>
                                <select class="selectpicker" data-style="btn-primary btn-bordered">
                                    <option>Seleciona un  perfil para el usuario</option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group m-b-0">
                                <div class="col-12">
                                    <p class="mb-2 mt-4 font-weight-bold text-muted">Subir imágen</p>
                                </div>
                            <div class="col-10 align-items-center">
                                <input type="file" class="form-control">
                                <p class="help-bock">Peso máximo de la foto: 20MB</p>
                            </div>
                            <div class="col-2 ">
                                <img src="vistas/assets/images/users/user.png" width="50px" class="img-fluid justify-content-end ">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group account-btn float-right m-t-10">
                        <div class="col-12">
                            <button class="btn w-lg  btn-danger waves-effect waves-light" data-dismiss="modal" type="buton">Cancelar</button>
                            <button class="btn w-lg  btn-primary waves-effect waves-light" type="submit">Crear Usuario</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
