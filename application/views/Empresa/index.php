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
<style>
  a{
    cursor: pointer;
  }
</style>
<!-- contenedor -->
<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Home/Main">Inicio</a></li>
            <li class="active">Empresa</li>
          </ol>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="table-title">
                <div class="row">
                  <div class="col-md-5">
                    <h3 class="panel-title">Datos de la empresa</h3>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
                <?php
                  foreach ($datos->result() as $empresa) {

                  }
                  if (sizeof($datos->result()) == 0 || $empresa->estado == 0)
                  {
                ?>
                <form id="DProcesoCC" method="post" action="<?= base_url() ?>Empresa/GuardarEmpresa" autocomplete="off">
                <div class="margn">
                <!-- Primera Linea del formulario-->
                    <div class="row">
                      <div class="col-md-4">
                        <br>
                        <div align="center" class="js-tilt"><img class='img-thumbnail img-responsive' src='<?=base_url()?>plantilla/images/original.png' alt='Imagen del Cliente'alt="Logo"></img>
                        <h4>GOCAJAA GROUP, S.A.DE C.V.</h4>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="form-group col-md-7">
                                <label for="nombre_empresa">Nombre de la empresa</label>
                                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre completo de la empresa">
                          </div>
                          <div class="form-group col-md-5">
                                <label for="telefono_empresa">Teléfono</label>
                                <input type="text" class="form-control validaTel" id="telefono_empresa" name="telefono_empresa" placeholder="Teléfono de la empresa">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-4">
                                <label for="nrc_empresa">NRC</label>
                                <input type="text" class="form-control" id="nrc_empresa" name="nrc_empresa" placeholder="NRC de la empresa" data-mask="9999-999999-999-9">
                          </div>
                          <div class="form-group col-md-4">
                                <label for="correo_empresa">Correo electrónico</label>
                                <input type="text" class="form-control" id="correo_empresa" name="correo_empresa" placeholder="Email de la empresa">
                          </div>
                          <div class="form-group col-md-4">
                                <label for="giro_empresa">Giro</label>
                                <select name="giro_empresa" id="giro_empresa" class="form-control">
                                  <option value="">Seleccione un tipo de giro</option>
                                  <option value="Comercio">Comercio</option>
                                  <option value="Financiero">Financiero</option>
                                </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12">
                                <label for="direccion_empresa">Dirección</label>
                                <textarea type="text" rows="3" class="form-control resize" id="direccion_empresa" name="direccion_empresa" placeholder="Dirección de la empresa"></textarea>
                          </div>
                        </div>

                      </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-d-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
                    <button type="reset" class="btn btn-default waves-effect waves-light m-d-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                </div>
              </form>
              <?php
              }
              else
              {
                foreach ($datos->result() as $empresa) {
                  $id = $empresa->idEmpresa;
                  $nombre = '"'.$empresa->nombreEmpresa.'"';
                  $giro = '"'.$empresa->giro.'"';
                  $email = '"'.$empresa->email.'"';
                  $telefono = '"'.$empresa->telefono.'"';
                  $direccion = '"'.$empresa->direccion.'"';
                  $nrc = '"'.$empresa->nrc.'"';
                }
              ?>
                <div class="margn">
                  <div class="margn">
                    <div class="row">
                      <div class="col-md-4">
                        <div align="center" class="js-tilt"><img class='img-thumbnail img-responsive' src='<?=base_url()?>plantilla/images/original.png' alt='Imagen del Cliente'alt="Logo"></img>
                        <h4>GOCAJAA GROUP, S.A.DE C.V.</h4>
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-12">
                            <p style="font-size: 17px;"><strong>Nombre de la empresa: </strong><?= $empresa->nombreEmpresa ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p style="font-size: 17px;"><strong>Teléfono: </strong><span style='color: #2E86C1; text-decoration: underline;'><?= $empresa->telefono ?></span></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p style="font-size: 17px;"><strong>NRC: </strong><?= $empresa->nrc ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p style="font-size: 17px;"><strong>Email: </strong><span style='color: #2E86C1; text-decoration: underline;'><?= $empresa->email ?></span></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p style="font-size: 17px;"><strong>Giro: </strong><?= $empresa->giro ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p style="font-size: 17px;"><strong>Dirección: </strong><?= $empresa->direccion ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="margn">
                    <div align="center">
                      <?php 
                      echo "<a onclick='actualizarInformacionEmpresa($id, $nombre, $giro, $email, $telefono, $direccion, $nrc)' title='Actualizar' href='' data-toggle='modal' data-target='#modal_actualizar_empresa' class='btn btn-warning waves-effect waves-light m-b-5'><i class='fa fa-pencil fa-lg'></i><span> Actualizar Información<span></a> ";
                      ?>
                      <?php 
                      echo "<a onclick='Delete($id)' title='Eliminar' class='btn btn-danger waves-effect waves-light m-b-5' data-id='$id' data-toggle='modal' data-target='#modal_eliminar_datos_empresa'><i class='fa fa-trash-o fa-lg'></i><span> Eliminar Información<span></a>";
                      ?>
                    </div>
                  </div>

                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div> <!-- End Row -->

    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Ventana Modal para agregar un proveedor-->
<!-- ============================================================== -->
<div class="modal fade" id="modal_actualizar_empresa" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar datos de la Empresa</h4>
          </div>
          <div class="modal-body">
              <form id="DProcesoCC" method="post" action="<?= base_url() ?>Empresa/ActualizarEmpresa" autocomplete="off">
                <div class="margn">
                <!-- Primera Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-7">
                            <label for="nombre_empresaA">Nombre de la empresa</label>
                            <input type="text" class="form-control" id="nombre_empresaA" name="nombre_empresa" placeholder="Nombre completo de la empresa">
                            <input type="hidden" class="form-control" id="id_empresaA" name="id_empresa">
                      </div>
                      <div class="form-group col-md-5">
                            <label for="telefono_empresaA">Teléfono</label>
                            <input type="text" class="form-control validaTel" id="telefono_empresaA" name="telefono_empresa" placeholder="Teléfono de la empresa">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                            <label for="nrc_empresaA">NRC</label>
                            <input type="text" class="form-control" id="nrc_empresaA" name="nrc_empresa" placeholder="NRC de la empresa" data-mask="9999-999999-999-9">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="correo_empresaA">Correo electrónico</label>
                            <input type="text" class="form-control" id="correo_empresaA" name="correo_empresa" placeholder="Email de la empresa">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="giro_empresaA">Giro</label>
                            <select name="giro_empresa" id="giro_empresaA" class="form-control">
                              <option value="Comercio">Comercio</option>
                              <option value="Financiero">Financiero</option>
                            </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                            <label for="direccion_empresaA">Dirección</label>
                            <textarea type="text" rows="3" class="form-control resize" id="direccion_empresaA" name="direccion_empresa" placeholder="Dirección de la empresa"></textarea>
                      </div>
                    </div>
                    <div  align="center">
                      <button type="submit" class="btn btn-warning waves-effect waves-light m-d-5"><i class="fa fa-save fa-lg"></i> Actualizar</button>
                      <button type="button" class="btn btn-default block waves-effect waves-light m-d-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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


<!--MODAL PARA ELIMINAR DATOS-->
<div class="modal fade" id="modal_eliminar_datos_empresa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
    <form  action="<?= base_url()?>Empresa/EliminarEmpresa" method="GET">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="mySmallModalLabel">
                <i class="fa fa-warning fa-lg text-danger"></i>
            </h4>
        </div>
            <div class="modal-body">
              <input type="hidden" id="idEmpresa" name='idEmpresa'>
              <p align="center">¿Está seguro de eliminar el registro?</p>
            </div>
            <div  align="center">
                <button type="submit" class="btn btn-danger block wwaves-effect waves-light m-b-5"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
   $(document).on("ready", main);
  function main()
  {
    $("#fecha_proceso").prop('readonly', true);

    $('#DProcesoCC').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  });

  }

  function actualizarInformacionEmpresa(id, nombre, giro, email, telefono, direccion, nrc)
  {
    document.getElementById('id_empresaA').value=id;
    document.getElementById('nombre_empresaA').value=nombre;
    document.getElementById('giro_empresaA').value=giro;
    document.getElementById('correo_empresaA').value=email;
    document.getElementById('telefono_empresaA').value=telefono;
    document.getElementById('direccion_empresaA').value=direccion;
    document.getElementById('nrc_empresaA').value=nrc;
    
  }

  function Delete(id){
        $('#idEmpresa').val(id);
  }
</script>