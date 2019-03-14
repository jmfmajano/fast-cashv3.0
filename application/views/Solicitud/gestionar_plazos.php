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
                                    <li class="active">Gestión de plazos</li>
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
                                            <h3 class="panel-title">Registro de plazos</h3>
                                          </div>
                                          <div class="col-sm-6">
                                              <a class="btn btn-primary waves-effect waves-light m-b-5" title="Nuevo" data-toggle="modal" data-target="#agregarPlazo"><i class="fa fa-plus-circle"></i> <span>Nuevo Plazo</span></a>
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
                                                      <th class="th th1" scope="col">Plazos Existentes</th>
                                                      <th class="th th1" >Acción</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody class="tbody tbody1">
                                                   <?php 
                                                      $i = 0;
                                                      if(!empty($plazos)){
                                                      foreach ($plazos->result() as $plazo)
                                                      {
                                                        if ($plazo->estado_plazo != 0)
                                                        {
                                                        $idPlazo = '"'.$plazo->id_plazo.'"';  // variable que se le pasara como parametro a las funciones de actualizar y eliminar...
                                                        $tiempoPlazo= '"'.$plazo->tiempo_plazo.'"'; // variable que se le pasara como parametro a la funcion actualizar...
                                                        $fechaPlazo = '"'.$plazo->fechaRegistro.'"'; // variable que se le pasara como parametro a la funcion actualizar...
                                                        $i = $i +1;
                                                   ?>
                                                      <tr class="tr tr1">
                                                        <td class="td td1" data-label="#" style="min-width: 80px; width: auto;"><b><?= $i;?></b></td>
                                                        <?php 
                                                            if ($plazo->tiempo_plazo == 1)
                                                            {
                                                              echo '<td class="td td1" data-label="Plazos Existentes">Populares hasta '.$plazo->tiempo_plazo.' mes</td>';
                                                            }
                                                            else
                                                            {
                                                              echo '<td class="td td1" data-label="Plazos Existentes">Populares hasta '.$plazo->tiempo_plazo.' meses</td>';
                                                            }
                                                        ?>
                                                        <td class="td td1" data-label="Acción">                                      
                                                          <?php 
                                                            echo "<a onclick='actualizarPlazo($idPlazo, $tiempoPlazo, $fechaPlazo)' title='Editar' data-toggle='modal' data-target='#actualizarPlazo' class='waves-effect waves-light editar'><i class='fa fa-pencil-square'></i></a>";

                                                            echo "<a onclick='eliminarPlazo($idPlazo)' title='Eliminar' class='waves-effect waves-light eliminar'  data-toggle='modal' data-target='.modal_eliminar_plazo'><i class='fa fa-times-circle'></i></a>";
                                                          ?>
                                                        </td>
                                                      </tr>
                                                   <?php }}} ?>
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
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana Modal para agregar Nuevo Plazo-->
<!-- ============================================================== -->
<div class="modal fade" id="agregarPlazo" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="limpiar()">&times;</button>
          <h4 class="modal-title">Nuevo plazo</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>Solicitud/guardarPlazo" autocomplete="off" id="FormNuevoPlazo">
            <div class="margn">
               <div class="row">
                  <div class="form-group col-md-12">
                    <label for="tiempo_plazo">Plazo de tiempo</label>
                    <input type="text" class="form-control" id="tiempo_plazo" name="tiempo_plazo" placeholder="Plazo de tiempo">
                  </div>
               </div>
              <div align="center">
                <button type="submit" class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
                <button type="reset" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cancelar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana Modal para actualizar Nuevo Plazo-->
<!-- ============================================================== -->
<div class="modal fade" id="actualizarPlazo" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar plazo</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>Solicitud/actualizarPlazo" autocomplete="off" id="FormEditarPlazo">
            <div class="margn">
              <div class="row">
                    <div class="form-group col-md-6">
                          <label for="">Fecha de creacíon</label>
                          <input type="text" class="form-control" id="fecha_plazo" name="fecha_plazo" readonly="true">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="">Estado del plazo</label>
                          <input type="text" class="form-control" value="Activo" id="estado_plazo" name="estado_plazo" readonly="true">
                    </div>
                    <div class="form-group col-md-12">
                          <label for="plazo_tiempo">Tiempo del plazo</label>
                          <input type="text" class="form-control" id="plazo_tiempo" name="tiempo_plazo" placeholder="Plazo">
                    </div>
                    <div class="form-group col-md-12">
                          <input type="hidden" class="form-control" id="id_plazo" name="id_plazo">
                    </div>
              </div>
              <div align="center">
                <button type="submit" class="btn btn-warning waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Actualizar</button>
                <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cancelar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->

<!--MODAL PARA ELIMINAR DATOS-->
<div class="modal fade modal_eliminar_plazo" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form  action="<?= base_url();?>Solicitud/eliminarPlazo" method="GET">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-warning fa-lg text-danger"></i>
                    </h4>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="id" name='id'>
                  <p align="center">¿Está seguro de eliminar el plazo?</p>
                </div>
                <div align="center">
                    <button type="submit" class="btn btn-danger block wwaves-effect waves-light m-b-5"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                    <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- ============= Inicio del Script================== -->
<script type="text/javascript">
  // Funcion para poder actualizar los datos del plazo...  
  function actualizarPlazo(idPlazo, tiempoPlazo, fechaPlazo){
        document.getElementById('id_plazo').value=idPlazo;
        document.getElementById('plazo_tiempo').value=tiempoPlazo;
        document.getElementById('fecha_plazo').value=fechaPlazo;
        document.getElementById('id_plazo').style.display = 'none';
  }

  function limpiar(){
        $('#tiempo_plazo').val("");
  }

  function eliminarPlazo(id){
        $('#id').val(id);
  }

  $("#tiempo_plazo, #plazo_tiempo").keypress( function (e){
    ValidacionTiempoPlazo = (document.all) ? e.keyCode : e.which;
    ValidacionTiempoPlazo = String.fromCharCode(ValidacionTiempoPlazo)
    return /^[0-9]+$/.test(ValidacionTiempoPlazo);
  });
</script>
<!-- ============= Fin del Script================== -->