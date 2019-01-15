<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg" style="background: url('assets/images/bg-1.jpg');background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index.html" class="text-success">
                                <span><img src="assets/images/logo.png" alt="" height="26"></span>
                            </a>
                        </h2>

                        <form class="" method="post">

                            <div class="form-group m-b-20 row">
                                <div class="col-12">
                                    <label for="emailaddress">Correo</label>
                                    <input class="form-control" type="email" id="emailaddress" required="" placeholder="Ingresa tu correo" name="correo">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <a href="page-recoverpw.html" class="text-muted float-right"><small>Olvidaste tu contraseña?</small></a>
                                    <label for="password">Contraseña</label>
                                    <input class="form-control" type="password" required="" id="password" placeholder="Ingresa tu contrasea" name="password">
                                </div>
                            </div>

                            <!-- <div class="form-group row m-b-20">
                                <div class="col-12">

                                    <div class="checkbox checkbox-custom">
                                        <input id="remember" type="checkbox" checked="">
                                        <label for="remember">
                                            Recuerdame
                                        </label>
                                    </div>

                                </div>
                            </div> -->

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Ingresar</button>
                                </div>
                                <div class="col-12">
                                    <?php 
                                        $login = new ControladorUsuarios();
                                        $login->ctrIngresoUsuarios();
                                    ?>
                                </div>
                            </div>

                        </form>

                        <!-- <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                            </div>
                        </div> -->

                    </div>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="account-copyright">Diseño y Desarrollo Hernando J. Chaves, Todos los derechos reservados</p>
        </div>

    </div>



    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>