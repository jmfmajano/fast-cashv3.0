<?php if($this->session->flashdata("errorr")):?>
  <script type="text/javascript">
    $(document).ready(function(){
    $.Notification.autoHideNotify('error', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("errorr")?>');
    });
  </script>
<?php endif; ?>
<style>
  #tablaImprimir{
    display: none;
  }
</style>

<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Reportes/">Reportes</a></li>
            <li class="active">reporte general</li>
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
                    <h3 class="panel-title">Reporte general de créditos</h3>                 
                  </div>
                </div>
              </div>
            </div>
              <div class="row" style="padding-left: 50px; padding-right: 50px;">
                <div class="col-md-12 text-center">
                    <form class="form-inline" id="buscrPorFecha" method="post" action="<?= base_url() ?>Reportes/ReporteIva/2">
                      <div class="margn">
                        <div class="form-group">
                          <label for="fechaInicio">Inicio </label>
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control DateTime" name="fechaInicial" id="fechaInicio" placeholder="Fecha inicial" required data-parsley-required-message="Por favor, digite fecha de inicio" data-mask="9999/99/99">
                          </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-group">
                          <label for="fechaFinal">Final </label>
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control DateTime" name="fechaFinal" id="fechaFinal" placeholder="Fecha final" required data-parsley-required-message="Por favor, digite fecha final" data-mask="9999/99/99">
                          </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        <a href="<?= base_url();?>Reportes/ReporteIva/1" class="btn btn-warning refres"><i class="fa fa-refresh"></i></a>
                      </div>
                    </form>
                  </div>
              </div> <br>  
            <div class="panel-body">
              <div class="margn">
                <div class="">

                  <div class="pull-left"></div>
                  <div class="pull-right">
                    <?php
                    if (sizeof($datos->result()) != 0){
                      if (isset($i) && isset($f))
                      {
                    ?>
                      <!-- <a title='Ver en PDF' href="<?= base_url() ?>Reportes/ReporteIvaPDF/2/?i=<?= $i?>&&f=<?= $f ?>" target="_blank" type='button' class='btn btn-danger block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Ver en PDF </a>  -->
                      <a title='Aprobar Solicitud'  href="<?= base_url() ?>Reportes/ReporteIvaEXCEL/2/?i=<?= $i?>&&f=<?= $f ?>" target="_blank" type='button' class='btn btn-success block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Excel </a>
                      <a title="Imprimir Solicitud" type="button" onclick="imprimirTabla()" class="btn btn-info block waves-effect waves-light m-b-5" data-toggle="tooltip" data-dismiss="modal"><i class="fa fa-print  fa-lg"></i> Imprimir</a>
                    <?php }
                      else
                      {
                    ?>
                      <!-- <a title='Ver en PDF' href="<?= base_url() ?>Reportes/ReporteIvaPDF/1" target="_blank" type='button' class='btn btn-danger block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Ver en PDF </a>  -->
                      <a title='Aprobar Solicitud'  href="<?= base_url() ?>Reportes/ReporteIvaEXCEL/1" target="_blank" type='button' class='btn btn-success block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Excel </a>
                      <a title="Imprimir Solicitud" type="button" onclick="imprimirTabla()" class="btn btn-info block waves-effect waves-light m-b-5" data-toggle="tooltip" data-dismiss="modal"><i class="fa fa-print  fa-lg"></i> Imprimir</a>
                    <?php }} ?>
                  </div>
               </div>
                <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="margn">
                              <?php 
                                if (sizeof($datos->result()) != 0){
                              ?>
                                <table id="" class="table">
                                  <thead class="thead-dark thead thead1">
                                    <tr>
                                      
                                      <?php 
                                        if (isset($i) && isset($f))
                                        {
                                          echo '
                                            <td colspan="9" class="text-center"><strong>PROCESOS EFECTUADOS ENTRE EL '.$i.' Y '.$f.'</strong></td>
                                          ';
                                        }
                                        else
                                        {
                                          echo '
                                            <td colspan="9" class="text-center"><strong>ÚLTIMOS PROCESOS EFECTUADOS</strong></td>
                                          ';
                                        }
                                      ?>
                                    </tr>
                                    <tr class="tr tr1">
                                      <th class="th th1" scope="col">#</th>
                                      <th class="th th1" scope="col">Código crédito</th>
                                      <th class="th th1" scope="col">Cliente</th>
                                      <th class="th th1" >Neto</th>
                                      <th class="th th1" >IVA</th>
                                      <th class="th th1" >Excento</th>
                                      <th class="th th1" >IVA retenido</th>
                                      <th class="th th1" >Total</th>
                                      <th class="th th1" >Observaciones</th>
                                      <!-- <th  class="th th1">Acción</th> -->
                                    </tr>
                                  </thead>
                                  <tbody class="tbody tbody1">
                                  <?php  
                                    $j = 0;
                                    $total = 0;
                                    $totalIVA = 0;
                                    $totalIntereses = 0;
                                    if(!empty($datos)){
                                    foreach ($datos->result() as $row) {
                                      $j = $j +1;
                                      $totalIVA = $totalIVA + $row->iva;
                                      $totalIntereses = $totalIntereses + $row->interes;
                                      $total = $total + $row->iva + $row->interes; 
                                    // if($creditos->estadoCredito=="Finalizado"){
                                    ?>
                                     <tr class="tr tr1">
                                      <td class="td td1" data-label="#" style="min-width: 10px; width: auto;"><b><?= $j;?></b></td>
                                      <td class="td td1" data-label="Código del Crédito"><?= $row->codigoCredito?></td>
                                      <td class="td td1" data-label="Cliente"><?= $row->Nombre_Cliente?>  <?=  $row->Apellido_Cliente?></td>
                                      <td class="td td1" data-label="Neto"><span class="label label-default" style="font-size: 1.2rem; font-family: Arial;">$<?= $row->interes?></span></td>
                                      <td class="td td1" data-label="IVA"><span  class="label label-warning" style="font-size: 1.2rem; font-family: Arial;">$<?= $row->iva?></span></td>
                                      <td class="td td1" data-label="Excento"><span>$0</span></td>
                                      <td class="td td1" data-label="Iva retenido"><span class="" style="font-size: 1.2rem; font-family: Arial;"> $0</span></td>
                                      <td class="td td1" data-label="Total"><span class="" style="font-size: 1.2rem; font-family: Arial;">$<?= $row->iva + $row->interes; ?></span></td>
                                      <td class="td td1" data-label="Observaciones"><span class="" style="font-size: 1.2rem; font-family: Arial;">---</span></td>
                                    </tr>
                                  <?php }} ?>
                                  <tr>
                                    <td colspan="3" class="text-center"><strong>Total</strong></td>
                                    <td>$<?= $totalIntereses ?></td>
                                    <td>$<?= $totalIVA ?></td>
                                    <td></td>
                                    <td></td>
                                    <td>$<?= $total ?></td>
                                    <td></td>
                                  </tr>
                                  </tbody>
                                </table>
                                <?php
                                    } 
                                    else
                                    {
                                    echo '<div class="alert alert-danger"><strong><h4 class="text-center">No hay datos que mostrar !!!</h4></strong><p class="text-center">Por favor, digite un rango de fecha valido ver el informe.</p></div>';
                                    }
                                  ?>

                                <div id="tablaImprimir">
                                  <div style="position: absolute; background-size: 100% 100%; filter:alpha(opacity=25); filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.5); opacity:.25; left:100px; top:220px;">
                                    <img src="<?= base_url() ?>plantilla/images/fc_logoR.png">
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4 col-md-push-2 pull-left">
                                        <img src="<?= base_url() ?>plantilla/images/fc_logoR.png" width="100" height="100">
                                      </div>
                                      <div class="col-md-4 col-md-pull-2 text-center">
                                        <p><strong>GOCAJAA GROUP SA DE CV</strong></p>
                                        <p><strong>MERCEDES UMAÑA, USULUTAN</strong></p>
                                        <p><strong>REPORTE DE IVA</strong></p>
                                      </div>
                                      <div class="col-md-4  pull-right"></div>
                                    </div>
                                  </div>
                                  <table class="table table-bordered">
                                      <thead class="">
                                      <tr>
                                      
                                      <?php 
                                        if (isset($i) && isset($f))
                                        {
                                          echo '
                                            <td colspan="9" class="text-center"><strong>PROCESOS EFECTUADOS ENTRE EL '.$i.' Y '.$f.'</strong></td>
                                          ';
                                        }
                                        else
                                        {
                                          echo '
                                            <td colspan="9" class="text-center"><strong>ÚLTIMOS PROCESOS EFECTUADOS</strong></td>
                                          ';
                                        }
                                      ?>
                                    </tr>
                                        <tr>
                                          <th>#</th>
                                          <th>Código crédito</th>
                                          <th>Cliente</th>
                                          <th>Neto</th>
                                          <th>IVA</th>
                                          <th>Excento</th>
                                          <th>IVA retenido</th>
                                          <th>Total</th>
                                          <th>Observaciones</th>
                                        </tr>
                                      </thead>
                                      <tbody class="tbody tbody1">
                                        <?php  
                                          $i = 0;
                                          $i = 0;
                                          $total = 0;
                                          $totalIVA = 0;
                                          $totalIntereses = 0;
                                          if(!empty($datos))
                                          {
                                            foreach ($datos->result() as $row)
                                            {
                                              $i = $i +1;
                                              $totalIVA = $totalIVA + $row->iva;
                                              $totalIntereses = $totalIntereses + $row->interes;
                                              $total = $total + $row->iva + $row->interes; 
                                              ?>
                                               <tr>
                                                <td><b><?= $i;?></b></td>
                                                <td><?= $row->codigoCredito?></td>
                                                <td><?= $row->Nombre_Cliente?>  <?=  $row->Apellido_Cliente?></td>
                                                <td>$<?= $row->interes?></td>
                                                <td>$<?= $row->iva?></td>
                                                <td><span>$0</span></td>
                                                <td> $0</td>
                                                <td>$<?= $row->iva + $row->interes; ?></td>
                                                <td>---</td>
                                              </tr>
                                        <?php }} ?>
                                        <tr>
                                          <td colspan="3" class="text-center"><strong>Total</strong></td>
                                          <td>$<?= $totalIntereses ?></td>
                                          <td>$<?= $totalIVA ?></td>
                                          <td></td>
                                          <td></td>
                                          <td>$<?= $total ?></td>
                                          <td></td>
                                        </tr>
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
      </div> <!-- End Row -->

    </div>
  </div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<script>
    $(document).ready(function(){
      $('#buscrPorFecha').parsley().on('field:validated', function() {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
      });
    });

    function imprimirTabla()
    {
      // $(".ocultarImprimir").hide();
      var elemento=document.getElementById('tablaImprimir');
      var pantalla=window.open(' ','popimpr');

      pantalla.document.write('<html><head><title>' + document.title + '</title>');
      pantalla.document.write('<link href="<?= base_url() ?>plantilla/css/bootstrap.min.css" rel="stylesheet" />');
      pantalla.document.write('</head><body >');

      pantalla.document.write(elemento.innerHTML);
      pantalla.document.write('</body></html>');
      pantalla.document.close();
      pantalla.focus();
      pantalla.onload = function() {
        pantalla.print();
        pantalla.close();
      };
       $(".ocultarImprimir").show();
    }
</script>