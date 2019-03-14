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
                                <!-- <h4 class="pull-left page-title">Gestion de los estados de la solicitud</h4> -->
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?= base_url() ?>Home/Main">Inicio</a></li>
                                    <li class="active">Gestión de los estados de la solicitud</li>
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
                                            <h3 class="panel-title">Registro de estados de solicitud</h3>
                                          </div>
                                          <div class="col-sm-6">
                                              <a class="btn btn-primary waves-effect waves-light m-d-5" title="Nuevo" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> <span>Nuevo Estado de Solicitud</span></a>
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
                                                      <th class="th th1" scope="col">Estados</th>
                                                      <th class="th th1" >Acción</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody class="tbody tbody1">
                                                  <?php
                                                  $i = 0;
                                                  if(!empty($datos)){
                                                  foreach ($datos->result() as  $estado) {
                                                    $estadoN="'".$estado->nombreEstado."'";
                                                    $i = $i +1;
                                                      # code...
                                                  ?>
                                                  <tr class="tr tr1">
                                                      <td class="td td1" data-label="#" style="min-width: 50px; width: auto;"><b><?= $i;?></b></td>
                                                      <td class="td td1" data-label="Estados"><?= $estado->nombreEstado?></td>
                                                      <td class="td td1" data-label="Acción">
                                                      <a onclick="Edit(<?= $estado->id_estado?>, <?= $estadoN?>)" title="Editar" data-toggle="modal" data-target="#myModalEdit" class="waves-effect waves-light editar"><i class="fa fa-pencil-square"></i></a>

                                                      <a onclick="del(<?= $estado->id_estado?>)" title="Eliminar" class="waves-effect waves-light eliminar"  data-toggle="modal" data-target=".modal_eliminar_estado"><i class="fa fa-times-circle"></i></a>
                                                      </td>
                                                  </tr>
                                                  <?php
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
        </div>

<!--MODAL PARA INSERTAR-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="limpiar()">×</button>
                    <h4 class="modal-title" id="myModalLabel">Insertar un nuevo estado</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url()?>EstadosSolicitud/Guardar" autocomplete="off" id="FormNuevoEstadoSolicitud">
              <div class="margn">
                <div class="form-group">
                    <label for="estado">Nombre del estado</label>
                      <input type="text" class="form-control" id="estado" name="nombreEstado" placeholder="Estado">
                </div>
                <div  align="center">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-d-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-d-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                  <button type="button" class="btn btn-default block waves-effect waves-light m-d-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                </div>
              </div>
            </form>                                  
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

<!-- MODAL PARA EDITAR --> 
<div id="myModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="limpiar()">×</button>
                    <h4 class="modal-title" id="myModalLabel">Editar estado</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url()?>EstadosSolicitud/Editar" autocomplete="off" id="FormEditarEstadoSolicitud">
              <div class="margn">
                <div class="form-group">
                    <label for="estado1">Nombre del estado</label>
                    <input type="hidden" name="id_estado" id="id_estado">
                    <input type="text" class="form-control" id="estado1" name="nombreEstado" placeholder="Estado">
                </div>
                <div  align="center">
                  <button type="submit" class="btn btn-warning waves-effect waves-light m-d-5"><i class="fa fa-save fa-lg"></i> Actualizar</button>
                  <button onclick="limpiar()" type="button" class="btn btn-default block waves-effect waves-light m-d-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                </div>
              </div>
            </form>                                  
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
<!--MODAL PARA ELIMINAR DATOS-->
<div class="modal fade modal_eliminar_estado" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form name="frmeliminarcliente" action="<?= base_url();?>EstadosSolicitud/Eliminar/" id="frmeliminarcliente" method="GET">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-warning fa-lg text-danger"></i>
                    </h4>
                </div>
                    <div class="modal-body">
                      <input type="hidden" id="id" name='id'>
                      <p align="center">¿Está seguro de eliminar el estado?</p>
                    </div>
                    <div  align="center">
                        <button type="submit" class="btn btn-danger block waves-effect waves-light m-d-5"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                        <button type="button" class="btn btn-default block waves-effect waves-light m-d-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<script type="text/javascript">
    function Edit(id, estado){
        $('#estado1').val(estado);
        $('#id_estado').val(id);
    }
    function limpiar(){
        $('#estado1').val("");
        $('#estado').val("");
        $('#id_estado').val("");
    }
   function del(id, estado){
        $('#id').val(id);
   }
</script>




                                    

