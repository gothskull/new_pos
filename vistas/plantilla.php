<?php session_start(); ?>
<?php //session_destroy(); ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Practica Sistemas POS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="vistas/assets/images/favicon.ico">
        <!-- DataTables -->
        <link href="vistas/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="vistas/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="vistas/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="vistas/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        
        <!-- Sweet Alert css -->
        <link href="vistas/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="vistas/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="vistas/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="vistas/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="vistas/assets/css/style.css" rel="stylesheet" type="text/css" />

        <link href="vistas/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="vistas/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="vistas/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="vistas/plugins/switchery/switchery.min.css" />
        <!-- MIS ESTILOS -->
        <link rel="stylesheet" href="vistas/css/custom.css" />

        <script src="vistas/assets/js/modernizr.min.js"></script>

    </head>


        <?php 
        if(isset($_SESSION['init']) && $_SESSION['init'] == "true")
        {
            
        ?>
    <body >

                <!-- Begin page -->
                <div id="wrapper">

                    <!-- ========== Left Sidebar Start ========== -->
                    <div class="left side-menu">

                        <?php require_once "modulos/left_sidebar.php" ?>
                        <!-- Sidebar -left -->

                    </div>
                    <!-- Left Sidebar End -->



                    <!-- ============================================================== -->
                    <!-- Start right Content here -->
                    <!-- ============================================================== -->

                    <div class="content-page">

                        <!-- Top Bar Start -->
                        <?php require_once "modulos/top_bar.php" ?>
                        <!-- Top Bar End -->



                        <!-- Start Page content -->
                        <div class="content">
                            <div class="container-fluid">

                                <?php 
                                    if(isset($_GET['ruta']))
                                    {
                                        if($_GET['ruta'] == 'usuarios' ||
                                           $_GET['ruta'] == 'clientes' ||
                                           $_GET['ruta'] == 'productos' ||
                                           $_GET['ruta'] == 'ventas' ||
                                           $_GET['ruta'] == 'reportes' ||
                                           $_GET['ruta'] == 'crear-venta' ||
                                           $_GET['ruta'] == 'inicio' ||
                                           $_GET['ruta'] == 'categorias' ||
                                           $_GET['ruta'] == 'salir' ||
                                           $_GET['ruta'] == 'vales') 
                                        {
                                           require_once "modulos/" . $_GET['ruta'] . ".php"; 
                                        } else {
                                           require_once "modulos/404.php";
                                        }
                                    } else {
                                        $_GET['ruta'] = 'inicio';
                                        require_once "modulos/inicio.php";
                                    }
                                    ?>

                            </div> <!-- container -->

                        <footer class="footer text-center">
                            Diseño y Desarrollo Hernando J. Chaves <?php echo date('Y') ?> | Todos los derechos reservados
                        </footer>
                        </div> <!-- content -->


                    </div>
            <?php 
                    
            ?>        


                    <!-- ============================================================== -->
                    <!-- End Right content here -->
                    <!-- ============================================================== -->


                </div>
                <!-- END wrapper -->
        <?php 
        } else {
            require_once "modulos/login.php";
        }
        ?>


        <!-- jQuery  -->
        <script src="vistas/assets/js/jquery.min.js"></script>
        <script src="vistas/assets/js/bootstrap.bundle.min.js"></script>
        <script src="vistas/assets/js/metisMenu.min.js"></script>
        <script src="vistas/assets/js/waves.js"></script>
        <script src="vistas/assets/js/jquery.slimscroll.js"></script>

        <!-- Flot chart -->
        <script src="vistas/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="vistas/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="vistas/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="vistas/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="vistas/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="vistas/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="vistas/plugins/flot-chart/curvedLines.js"></script>
        <script src="vistas/plugins/flot-chart/jquery.flot.axislabels.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="vistas/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="vistas/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="vistas/assets/pages/jquery.dashboard.init.js"></script>

        <!-- Required datatable js -->
        <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="vistas/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="vistas/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="vistas/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="vistas/plugins/datatables/jszip.min.js"></script>
        <script src="vistas/plugins/datatables/pdfmake.min.js"></script>
        <script src="vistas/plugins/datatables/vfs_fonts.js"></script>
        <script src="vistas/plugins/datatables/buttons.html5.min.js"></script>
        <script src="vistas/plugins/datatables/buttons.print.min.js"></script>
        <!-- Responsive examples -->
        <script src="vistas/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="vistas/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Init Js file -->
        <script type="text/javascript" src="vistas/assets/pages/jquery.form-advanced.init.js"></script>
        <script src="vistas/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
        <script src="vistas/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="vistas/plugins/select2/js/select2.min.js" type="text/javascript"></script>

        <!-- Parsley js -->
        <script type="text/javascript" src="vistas/plugins/parsleyjs/parsley.min.js"></script>

        <!-- Sweet Alert Js  -->
        <script src="vistas/plugins/sweet-alert/sweetalert2.min.js"></script>
        <script src="vistas/assets/pages/jquery.sweet-alert.init.js"></script>

        <!-- App js -->
        <script src="vistas/assets/js/jquery.core.js"></script>
        <script src="vistas/assets/js/jquery.app.js"></script>
         <!-- Proyecto -->
         <script src="vistas/js/project/usuarios.js"></script>
         <script src="vistas/js/project/general.js"></script>

    </body>
</html>