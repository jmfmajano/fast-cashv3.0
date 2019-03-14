<?php if($this->session->flashdata("guardar")):?>
  <script type="text/javascript">
    $(document).ready(function(){
    $.Notification.autoHideNotify('success', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("guardar")?>');
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
            <li class="active">Caja general</li>
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
                    <h3 class="panel-title">Caja general</h3>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
            <?php 
              if (sizeof($datos->result())==0)
              {
            ?>
              <form method="post" action="<?= base_url() ?>CajaChica/AperturarCaja" id="formAperturar" autocomplete="off">
                <div class="margn">
                <!-- Primera Linea del formulario-->

                  <h4>Aperturar Caja</h4>
                  <div class="margn">
                    <div class="row">
                      <div class="form-group col-md-6">
                            <label for="fecha_apertura">Fecha</label>
                            <input type="text" class="form-control DateTime" id="fecha_apertura" name="fecha_apertura" placeholder="Fecha apertura de caja general" data-mask="9999/99/99">
                      </div>
                      <div class="form-group col-md-6">
                            <label for="cantidad_apertura">Cantidad de apertura</label>
                            <input type="text"  class="form-control validaDigit" id="cantidad_apertura" name="cantidad_apertura" placeholder="Cantidad con la que se apertura">
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="margn">
                    <div align="center">
                            <button type="submit" class="btn btn-info waves-effect waves-light m-d-5"><i class="fa fa-check-square-o fa-lg"></i> Aperturar</button>
                    </div>
                  </div>
               </div>
              </form>
              <?php
                }
                else
                {
                  foreach ($datos->result() as $caja)
                  {
                    // echo "Id: ".$caja->idCajaChica."<br>";
                    // echo "Estado: ".$caja->estadoCajaChica."<br>";
                    // echo "Fecha: ".$caja->fechaCajaChica."<br>";
                    // echo "Cantidad".$caja->cantidadApertura."<br>";
                    // echo "Saldo".$caja->saldo."<br>";
                  }
                
                ?>
                <div class="margn">
                <form id="DProcesoCC2" method="post" action="<?= base_url() ?>CajaChica/GuardarProcesoCC" autocomplete="off">
                    <div class="row">
                      <div class="form-group col-md-6">
                            <label for="fecha_proceso">Fecha</label>
                            <input type="text" value="<?= $caja->fechaCajaChica ?>" class="form-control" id="fecha_proceso" name="fecha_proceso" placeholder="Fecha de recibido del prestamo" data-mask="9999/99/99">
                            <input type="hidden" value="<?= $caja->idCajaChica ?>" class="form-control" id="id_cc" name="id_cc" placeholder="Fecha de recibido del prestamo">
                            <input type="hidden" value="<?= $caja->saldo ?>" class="form-control" id="saldo_cc" name="saldo_cc" placeholder="Fecha de recibido del prestamo">
                      </div>
                      <div class="form-group col-md-6">
                            <label for="cantidad_apertura">Cantidad de dinero</label>
                            <input type="text" class="form-control validaDigit" id="cantidad_dinero" name="cantidad_dinero" placeholder="Cantidad de dinero del proceso a efectuar">
                      </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                            <label for="cantidad_apertura">Tipo de proceso</label>
                            <select name="tipo_proceso" id="" class="select" data-placeholder="Seleccione un tipo de proceso">
                              <option value="">.::Seleccione un tipo de proceso::.</option>
                              <option value="Entrada">Entrada de dinero</option>
                              <option value="Salida">Salida de dinero</option>
                            </select>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="monto_dinero">Forma de pago</label><br>
                            <select name="forma_pago" id="" class="select" data-placeholder="Seleccione una forma de pago">
                              <option value="">.::Seleccione una forma de pago::.</option>
                              <?php 
                                foreach ($tipoPago->result() as $tipo)
                                {
                              ?>
                              <option value="<?= $tipo->idTipo ?>"><?= $tipo->detalle ?></option>
                              <?php } ?>
                            </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                            <label for="detalle_proceso">Detalle del proceso</label>
                            <textarea class="form-control resize" rows="3" id="detalle_proceso" name="detalle_proceso"></textarea>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-d-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
              </form>
                 <!-- Inicio cerrar caja -->
                <form method="post" action="<?= base_url() ?>CajaChica/CerrarCajaGeneral/">
                      <input type="hidden" value="<?= $caja->fechaCajaChica ?>" class="form-control" id="fecha_cc" name="fecha_cc" placeholder="Fecha de recibido del prestamo">
                      <input type="hidden" value="<?= $caja->idCajaChica ?>" class="form-control" id="id_cc" name="id_cc" placeholder="Fecha de recibido del prestamo">
                      <input type="hidden" value="<?= $caja->saldo ?>" class="form-control" id="saldo_cc" name="saldo_cc" placeholder="Fecha de recibido del prestamo">
                      <button href="" class="btn btn-danger waves-effect waves-light m-d-5" style="position: absolute; margin-left: 105px; margin-top: -34px;"><i class=" fa fa-close fa-lg"></i> Cerrar caja general</button>
                </form>
                <!-- Fin cerrar caja -->
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


<script>
   $(document).on("ready", main);
  function main()
  {
    $("#fecha_proceso").prop('readonly', true);
  }
</script>