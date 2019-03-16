            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <span class="margin-logo">
                       <a href="<?= base_url() ?>Home/Main" class="logo"><i><img src="<?= base_url() ?>plantilla/images/fc_logo.png" width="48" alt="Logo"></i> <span><img src="<?= base_url() ?>plantilla/images/fast_cash.png" width="120" alt="Logo"></span></a>
                        </span>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i data-original="ion-navicon-round" class="ion-navicon-round"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free" style="font-size: 21px;"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <div class="margen_nombe_nav">
                                        <div class="nombre_nav">
                                            <?php echo $this->session->userdata("nombre")." ".$this->session->userdata("apellido");?>
                                        </div>
                                        <div class="tipo_nav">
                                            <?php echo $this->session->userdata("tipoAcceso");?>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?= base_url() ?>plantilla/images/user.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url();?>Home/loginOut"><i class="fa fa-power-off fa-lg"></i> Cerrar Sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details oculto_margen_nombe_nav1">
                        <div class="pull-left margen_nombe_nav1">
                            <div class="nombre_nav1">
                                <?php echo $this->session->userdata("nombre")." ".$this->session->userdata("apellido");?>
                            </div>
                            <div class="tipo_nav1">
                                <?php echo $this->session->userdata("tipoAcceso");?>
                            </div> 
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>Home/Main" class="waves-effect active"><i class="fa fa-home fa-lg"></i><span> Inicio</span></a>
                            </li>
                        <?php
                            $conn = mysqli_connect("localhost", "root", "123456", "db_fastcash");
                            if (!$conn){die("Connection failed: " . mysqli_connect_error());}
                            else{
                                mysqli_query($conn, "SET CHARACTER SET 'utf8'");
                                $acceso = $this->session->userdata("idAcceso");
                                $consulta = "SELECT m.html FROM tbl_permisos as p INNER JOIN tbl_accesos as a ON p.idAcceso = a.idAcceso INNER JOIN tbl_menu as m ON p.idMenu = m.idMenu WHERE p.idAcceso = '$acceso' AND p.permiso = '1'";
                                $datos =  mysqli_query( $conn, $consulta);  
                                while($item = mysqli_fetch_array($datos)){echo $item["html"];}
                            }
                            mysqli_close($conn);
                            ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

            <!--MODAL PARA CREAR SOLICITUDES-->
<div class="modal fade modal_opcion_solicitud" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-th-large fa-lg text-success"></i>
                        Crear Solicitud
                    </h4>
                </div>
                    <div class="modal-body">
                        <div class="margn">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <a href="<?= base_url() ?>Solicitud/CrearSolicitud/1" title="Nuevo" data-toggle="tooltip" class="btn btn-success btn-block btn-lg waves-effect waves-light m-d-5" style="background-color: #117864; border-color: #117864;"><font style="color: #fff;"><i class="fa fa-file-text-o fa-lg"></i> Crédito Popular</font></a>
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="<?= base_url() ?>Solicitud/CrearSolicitud/2" title="Nuevo" data-toggle="tooltip" class="btn btn-success btn-block btn-lg waves-effect waves-light m-d-5" style="background-color: #006064; border-color: #006064;"><font style="color: #fff;"><i class="fa fa-paste fa-lg"></i> Crédito Personal</font></a>
                                </div>
                            </div>
                           <!--  <div class="row">
                                <div class="form-group col-md-6">
                                    <a href="<?= base_url() ?>Solicitud/CrearSolicitud/3" title="Nuevo" data-toggle="tooltip" class="btn btn-success btn-block btn-lg waves-effect waves-light m-d-5" style="background-color: #1B4F72; border-color: #1B4F72;"><font style="color: #fff;"><i class="fa fa-list-alt fa-lg"></i> Crédito Falta Nombre</font></a>
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="<?= base_url() ?>Solicitud/CrearSolicitud/4" title="Nuevo" data-toggle="tooltip" class="btn btn-success btn-block btn-lg waves-effect waves-light m-d-5" style="background-color: #004D40; border-color: #004D40;"><font style="color: #fff;"><i class="fa fa-newspaper-o fa-lg"></i> Crédito Falta Nombre</font></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div  align="center">
                        <button type="button" class="btn btn-default block waves-effect waves-light m-d-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

                    <!--MODAL PARA PAGOS CREDITOS-->
<div class="modal fade modal_opcion_pagos" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-usd fa-lg text-success"></i>
                        Pagos de créditos
                    </h4>
                </div>
                    <div class="modal-body">
                        <div class="margn">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <a href="<?= base_url() ?>Pagos/" title="Hacer Pago" data-toggle="tooltip" class="btn btn-success btn-block btn-lg waves-effect waves-light m-d-5" style="background-color: #D68910; border-color: #D68910;"><font style="color: #fff;"><i class="fa fa-id-card-o fa-lg"></i> Pago crédito popular</font></a>
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="<?= base_url() ?>Pagos/CreditosPersonales" title="Hacer Pago" data-toggle="tooltip" class="btn btn-success btn-block btn-lg waves-effect waves-light m-d-5" style="background-color: #0E6251 border-color: #0E6251"><font style="color: #fff;"><i class="fa fa-address-card-o fa-lg"></i> Pago crédito personal</font></a>
                                </div>
                            </div>
                           <!--  <div class="row">
                                <div class="form-group col-md-6">
                                    <a href="<?= base_url() ?>Pagos/3" title="Hacer Pago" data-toggle="tooltip" class="btn btn-success btn-block btn-lg waves-effect waves-light m-d-5" style="background-color: #148F77; border-color: #148F77;"><font style="color: #fff;"><i class="fa fa-newspaper-o fa-lg"></i> Pago crédito Falta Nombre</font></a>
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="<?= base_url() ?>Pagos/4" title="Hacer Pago" data-toggle="tooltip" class="btn btn-success btn-block btn-lg waves-effect waves-light m-d-5" style="background-color: #3498DB; border-color: #3498DB;"><font style="color: #fff;"><i class="fa fa-address-book-o fa-lg"></i> Pago crédito Falta Nombre</font></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div  align="center">
                        <button type="button" class="btn btn-default block waves-effect waves-light m-d-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

