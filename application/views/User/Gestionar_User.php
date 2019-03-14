            <?php if($this->session->flashdata("informa")):?>
              <script type="text/javascript">
                $(document).ready(function(){
                $.Notification.autoHideNotify('info', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("informa")?>');
                });
              </script>
            <?php endif; ?>
            <?php if($this->session->flashdata("actualizado")):?>
              <script type="text/javascript">
                $(document).ready(function(){
                $.Notification.autoHideNotify('warning', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("actualizado")?>');
                });
              </script>
            <?php endif; ?>
            <?php if($this->session->flashdata("errorr")):?>
              <script type="text/javascript">
                $(document).ready(function(){
                $.Notification.autoHideNotify('error', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("errorr")?>');
                });
              </script>
            <?php endif; ?>
            <?php if($this->session->flashdata("guardar")):?>
              <script type="text/javascript">
                $(document).ready(function(){
                $.Notification.autoHideNotify('success', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("guardar")?>');
                });
              </script>
            <?php endif; ?> 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- <h4 class="pull-left page-title">Gestion de los accesos al sistema</h4> -->
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?= base_url() ?>Home/Main">Inicio</a></li>
                                    <li class="active">Gestión de usuarios del sistema</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <div class="table-title">
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <h5 class="panel-title">Usuarios registrados</h3>
                                          </div>
                                          <div class="col-sm-6">
                                              <a class="btn btn-primary waves-effect waves-light m-b-5" title="Nuevo" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> <span>Nuevo usuario<span></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                <!--Panel body aqui va la tabla con los datos-->
                                <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="margn">
                                                <table id="datatable" class="table">
                                                  <thead class="thead-dark thead thead1">
                                                    <tr class="tr tr1">
                                                      <th class="th th1" scope="col">#</th>
                                                      <th class="th th1" scope="col">Nombre</th>
                                                      <th class="th th1" scope="col">Usuario</th>
                                                      <th class="th th1" scope="col">Contraseña</th>
                                                      <th class="th th1" scope="col">Tipo Acceso</th>
                                                      <th class="th th1" >Acción</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody class="tbody tbody1">
                                                  <?php
                                                  $c = 0;
                                                  if(!empty($datosUser))
                                                  {
                                                  foreach ($datosUser->result() as  $user) {
                                                     $empleadoN = "'".$user->nombreEmpleado." ".$user->apellidoEmpleado."'";
                                                     $userN = "'".$user->user."'"; 
                                                     $passN = "'".$user->pass."'";
                                                     $idAccesoN = "'".$user->idAcceso."'";
                                                     $tipoAccesoN = "'".$user->tipoAcceso."'";
                                                    $c = $c + 1;
                                                      # code...
                                                      if($user->estadoAcceso == 0)
                                                      {
                                                      ?>
                                                      <tr class="tr tr1" title="Usuario denegado" data-toggle="tooltip" style="background: #F9EBEA; text-decoration:line-through;">
                                                        <td class="td td1"  width="150"><b><?= $c ?></b></td>
                                                        <td class="td td1"><?= $user->nombreEmpleado." ".$user->apellidoEmpleado?></td>
                                                        <td class="td td1"><span class='label label-danger'><?= $user->user?></span></td>
                                                        <td class="td td1"><span style='color: #E74C3C; text-decoration: underline;'>***********</span></td>
                                                        <td class="td td1"><?= $user->tipoAcceso?></td>
                                                        <td class="td td1" style="min-width: 85px;">
                                                          <a onclick="Edit(<?= $user->idUser?>, <?= $empleadoN?>, <?= $userN?>, <?= $passN?>, <?= $idAccesoN?>, <?= $tipoAccesoN?>)" title="Editar" data-toggle="modal" data-target="#myModalEdit" class="waves-effect waves-light editar"><i class="fa fa-pencil-square"></i></a>
                                                          <a onclick="del(<?= $user->idUser?>)" title="Eliminar" class="waves-effect waves-light eliminar"  data-toggle="modal" data-target=".modal_eliminar_estado"><i class="fa fa-times-circle"></i></a>
                                                        </td>
                                                      </tr>
                                                      <?php
                                                       }
                                                       else
                                                       {
                                                      ?>
                                                      <tr class="tr tr1">
                                                        <td class="td td1"  width="150"><b><?= $c ?></b></td>
                                                        <td class="td td1"><?= $user->nombreEmpleado." ".$user->apellidoEmpleado?></td>
                                                        <td class="td td1"><span class='label label-success'><?= $user->user?></span></td>
                                                        <td class="td td1"><span style='color: #2E86C1; text-decoration: underline;'>***********</span></td>
                                                        <td class="td td1"><?= $user->tipoAcceso?></td>
                                                        <td class="td td1" style="min-width: 85px;">
                                                          <a onclick="Edit(<?= $user->idUser?>, <?= $empleadoN?>, <?= $userN?>, <?= $passN?>, <?= $idAccesoN?>, <?= $tipoAccesoN?>)" title="Editar" data-toggle="modal" data-target="#myModalEdit" class="waves-effect waves-light editar"><i class="fa fa-pencil-square"></i></a>
                                                          <a onclick="del(<?= $user->idUser?>)" title="Eliminar" class="waves-effect waves-light eliminar"  data-toggle="modal" data-target=".modal_eliminar_estado"><i class="fa fa-times-circle"></i></a>
                                                        </td>
                                                      </tr>
                                                  <?php
                                                      }
                                                    }
                                                  }
                                                  ?>
                                                      
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!--MODAL PARA INSERTAR-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Insertar un nuevo usuario</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url()?>User/Guardar" autocomplete="off" id="FormNuevoUsuario">
              <div class="margn">
                <div class="row">
                     <div class="form-group col-md-12">                    
                      <label for="cbbEmpleados">Empleados</label>
                       <select id="cbbEmpleados" name="cbbEmpleados" class="select" data-placeholder="Seleccionar empleado">
                          <option value="">.::Seleccionar empleado::.</option>
                          <?php 
                          foreach ($datosEmpleados->result() as $empleados) { 
                          ?>
                          <option value="<?= $empleados->idEmpleado ?>"><?= $empleados->nombreEmpleado ?> <?= $empleados->apellidoEmpleado ?></option>
                            <?php  } ?>         
                      </select>                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="txtUsuario">Usuario</label>
                      <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="txtpass">Contraseña</label>
                      <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Contraseña">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="txtConfirmar">Confirmar Contraseña</label>
                      <input type="password" class="form-control" id="txtConfirmar" name="txtConfirmar" placeholder="Confirmar Contraseña">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">                    
                      <label for="cbbRol">Tipo de Acceso</label>
                       <select id="cbbRol" name="cbbRol" class="select" data-placeholder="Seleccionar acceso">
                          <option value="">.::Seleccionar acceso::.</option>
                          <?php 
                          foreach ($datosRol->result() as $rol) { 
                          ?>
                          <option value="<?= $rol->idAcceso ?>"><?= $rol->tipoAcceso ?></option>
                            <?php  } ?>         
                      </select>                      
                    </div>
                  </div>
                <div  align="center">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                  <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                </div>
            </div>
            </form>                                  
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

<!-- MODAL PARA EDITAR --> 
<div id="myModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Editar información de <span id="empleado"></span></h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url()?>User/Editar" autocomplete="off" id="FormEditarUsuario">
              <div class="margn">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="txtUsuario">Usuario</label>
                      <input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Usuario">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="txtpassword">Contraseña</label>
                      <input type="password" class="form-control" id="txtpassword" name="txtpassword" placeholder="Contraseña">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="txtpassConfirmar">Confirmar Contraseña</label>
                      <input type="password" class="form-control" id="txtpassConfirmar" name="txtpassConfirmar" placeholder="Confirmar Contraseña">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">                    
                      <label for="cbbRol1">Tipo de Acceso</label>
                       <select id="cbbRol1" name="cbbRol1" class="form-control">
                          <?php foreach ($datosRol->result() as $rol) { ?>
                           <option value="<?= $rol->idAcceso ?>"><?= $rol->tipoAcceso ?></option> 
                          <?php } ?> 
                      </select>                      
                    </div>
                  </div>
                  <input type="hidden" name="txtIdUser" id="txtIdUser">
                <div  align="center">
                  <button type="submit" class="btn btn-warning waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Actualizar</button>
                  <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                </div>
            </div>
            </form>                                  
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

<!--MODAL PARA Eliminar DATOS-->
<div class="modal fade modal_eliminar_estado" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form name="frmeliminarcliente" action="<?= base_url();?>User/Eliminar/" id="frmeliminarcliente" method="GET">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-warning fa-lg text-danger"></i> 
                    </h4>
                </div>
                    <div class="modal-body">
                      <input type="text" hidden id="id" name='id'>
                      <p align="center">¿Está seguro de eliminar el usuario?</p>
                    </div>
                    <div  align="center">
                        <button type="submit" class="btn btn-danger block waves-effect waves-light m-b-5"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                        <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<script type="text/javascript">
    function Edit(id, empleado, user, pass, idAcceso, tipoAcceso){
        document.getElementById("empleado").innerHTML = empleado;
        $('#txtuser').val(user);
        $('#txtpassword').val(pass);
        $('#txtpassConfirmar').val(pass);
        $("#cbbRol1 option[value='"+idAcceso+"']").remove();
        $("#cbbRol1").append('<option value="'+idAcceso+'" selected>'+tipoAcceso+'</option>');        
        $('#txtIdUser').val(id);
    }

    function limpiar(){
        $('#tipoAcceso').val("");
        $('#idAcceso').val("");
        $('#descripcion').val("");
    }
   function del(id){
        $('#id').val(id);
   }
</script>




                                    

