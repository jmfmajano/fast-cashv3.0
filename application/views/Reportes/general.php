 <style>
  #tablaImprimir{
    display: none;
  }
  #buscarPorCliente, #buscarPorFecha{
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
            <!-- inicio -->
            <div class="row" style="padding-left: 50px; padding-right: 50px;" id="buscarPor">
                <div class="col-md-12 text-center">
                    <form class="form-inline" id="buscrPorFecha" method="post" action="<?= base_url() ?>Reportes/General/2">
                      <div class="margn">
                        <div class="input-group">
                          <span class="input-group-addon" for="buscarPor">Buscar por</span>
                          <select id="buscarP" name="buscarPor" class="select" data-placeholder="Seleccione un tipo de prestamo" data-live-search="true">
                            <option value=""></option>
                            <option value="1">Clientes</option>
                            <option value="2">Rango de fechas</option>
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
              </div> <!-- fin -->
            <!-- inico -->
            <div class="row" style="padding-left: 50px; padding-right: 50px;" id="buscarPorFecha">
                <div class="col-md-12 text-center">
                    <form class="form-inline" id="buscrPorFecha" method="post" action="<?= base_url() ?>Reportes/General/2">
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
                        <a href="<?= base_url();?>Reportes/General/1" class="btn btn-warning refres"><i class="fa fa-refresh"></i></a>
                      </div>
                    </form>
                  </div>
              </div> <!-- fin -->

              <!-- inico -->
            <div class="row" style="padding-left: 50px; padding-right: 50px;" id="buscarPorCliente">
                <div class="col-md-12 text-center">
                    <form class="form-inline" id="buscrPorFecha" method="post" action="<?= base_url() ?>Reportes/GeneralPorCliente/">
                      <div class="margn">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-group">
                          <label for="fechaFinal">Nombre </label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" placeholder="Nombre del cliente" required data-parsley-required-message="Por favor, digite un nombre">
                          </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        <a href="<?= base_url();?>Reportes/General/1" class="btn btn-warning refres"><i class="fa fa-refresh"></i></a>
                      </div>
                    </form>
                  </div>
              </div> <!-- fin -->

            <div class="panel-body">
              <div class="margn">
                <table class="table">
                  <div class="pull-left"></div>
                  <div class="pull-right">

                    <?php
                    if (sizeof($datos->result()) != 0){
                      if (isset($i) && isset($f))
                      {
                    ?>
                      <!-- <a title='Ver en PDF' href="<?= base_url() ?>Reportes/ReporteGeneralPDF/2/?i=<?= $i?>&&f=<?= $f ?>" target="_blank" type='button' class='btn btn-danger block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Ver en PDF </a>  -->
                      <a title='Aprobar Solicitud'  href="<?= base_url() ?>Reportes/ReporteGeneralEXCEL/2/?i=<?= $i?>&&f=<?= $f ?>" target="_blank" type='button' class='btn btn-success block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Excel </a>
                      <a title="Imprimir Solicitud" type="button" onclick="imprimirTabla()" class="btn btn-info block waves-effect waves-light m-b-5" data-toggle="tooltip" data-dismiss="modal"><i class="fa fa-print  fa-lg"></i> Imprimir</a>
                    <?php }
                      else
                      {
                    ?>
                      <!-- <a title='Ver en PDF' href="<?= base_url() ?>Reportes/ReporteGeneralPDF/1" target="_blank" type='button' class='btn btn-danger block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Ver en PDF </a>  -->
                      <a title='Aprobar Solicitud'  href="<?= base_url() ?>Reportes/ReporteGeneralEXCEL/1" target="_blank" type='button' class='btn btn-success block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Excel </a>
                      <a title="Imprimir Solicitud" type="button" onclick="imprimirTabla()" class="btn btn-info block waves-effect waves-light m-b-5" data-toggle="tooltip" data-dismiss="modal"><i class="fa fa-print  fa-lg"></i> Imprimir</a>
                    <?php }} ?>
                    
                  </div>
               </table>
                <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="margn">
                              <?php 
                                if (sizeof($datos->result()) != 0){
                              ?>
                                <table id="datatable" class="table">
                                  <thead class="thead-dark thead thead1">
                                  <tr>
                                      
                                      <?php 
                                        if (isset($i) && isset($f))
                                        {
                                          echo '
                                            <td colspan="9" class="text-center"><strong>REPORTE GENERAL DE CRÉDITOS ENTRE EL '.$i.' Y '.$f.'</strong></td>
                                          ';
                                        }
                                        else
                                        {
                                          echo '
                                            <td colspan="9" class="text-center"><strong>REPORTE GENERAL DE CRÉDITOS HASTA EL '.date('d-m-Y').'</strong></td>
                                          ';
                                        }
                                      ?>
                                    </tr>
                                    <tr class="tr tr1">
                                      <th class="th th1" scope="col">#</th>
                                      <th class="th th1" scope="col">Código de Cliente</th>
                                      <th class="th th1" scope="col">Cliente</th>
                                      <th class="th th1" >Tipo de Crédito</th>
                                      <th class="th th1" >Total a Pagar</th>
                                      <th class="th th1" >Total Abonado</th>
                                      <th class="th th1" >Intereses pagados</th>
                                      <th class="th th1" >Intereses pendientes</th>
                                      <th class="th th1" >Estado</th>
                                      <!-- <th  class="th th1">Acción</th> -->
                                    </tr>
                                  </thead>
                                  <tbody class="tbody tbody1">
                                   <?php  
                                    $i = 0;
                                    if(!empty($datos)){
                                    foreach ($datos->result() as $creditos) {
                                    $i = $i +1;
                                    if ($creditos->estadoCredito != "Finalizado") {
                                    // if($creditos->estadoCredito=="Finalizado"){
                                      $datosExtras = $this->Reportes_Model->DatosAdicionalesRG($creditos->idCredito );

                                      $IP = 0;
                                      if ($datosExtras->interesesPagados != null)
                                      {
                                        $IP = $datosExtras->interesesPagados;
                                      }
                                    ?>
                                     <tr class="tr tr1">
                                      <td class="td td1" data-label="#" style="min-width: 10px; width: auto;"><b><?= $i;?></b></td>
                                      <td class="td td1" data-label="Código de Cliente"><?= $creditos->Codigo_Cliente?></td>
                                      <td class="td td1" data-label="Cliente"><?= $creditos->Nombre_Cliente?>  <?=  $creditos->Apellido_Cliente?></td>
                                      <td class="td td1" data-label="Tipo de Crédito"><?= $creditos->tipoCredito?></td>
                                      <td class="td td1" data-label="Total a Pagar"><span class="label label-default" style="font-size: 1.2rem; font-family: Arial;">$ <?= $creditos->capital?></span></td>
                                      <td class="td td1" data-label="Total Abonado"><span class="label label-warning" style="font-size: 1.2rem; font-family: Arial;">$ <?= $creditos->totalAbonado?></span></td>
                                      <td class="td td1" data-label="Total Abonado"><span class="label label-warning" style="font-size: 1.2rem; font-family: Arial;">$ <?= $IP ?></span></td>
                                      <td class="td td1" data-label="Total Abonado"><span class="label label-warning" style="font-size: 1.2rem; font-family: Arial;">$ <?= $creditos->interesPendiente?></span></td>
                                      <td class="td td1" data-label="Total Abonado"><span class="" style="font-size: 1.2rem; font-family: Arial;"> <?= $creditos->estadoCredito?></span></td>
                                    </tr>
                                    
                                  <?php }}} ?>
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
                                        <p><strong>REPORTE GENERAL DE CRÉDITOS</strong></p>
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
                                            <td colspan="9" class="text-center"><strong>REPORTE GENERAL DE CRÉDITOS ENTRE EL '.$i.' Y '.$f.'</strong></td>
                                          ';
                                        }
                                        else
                                        {
                                          echo '
                                            <td colspan="9" class="text-center"><strong>REPORTE GENERAL DE CRÉDITOS HASTA EL '.date('d-m-Y').'</strong></td>
                                          ';
                                        }
                                      ?>
                                    </tr>
                                        <tr>
                                          <th>#</th>
                                          <th>Código de Cliente</th>
                                          <th>Cliente</th>
                                          <th>Tipo de Crédito</th>
                                          <th>Total a Pagar</th>
                                          <th>Total Abonado</th>
                                          <th>Intereses pagados</th>
                                          <th>Intereses pendientes</th>
                                          <th>Estado</th>
                                          <!-- <th  class="th th1">Acción</th> -->
                                        </tr>
                                      </thead>
                                      <tbody class="tbody tbody1">
                                         <?php  
                                          $i = 0;
                                          $IP2 =0;
                                          if(!empty($datos))
                                          {
                                            foreach ($datos->result() as $creditos)
                                            {
                                              $i = $i +1;
                                              $datosExtras = $this->Reportes_Model->DatosAdicionalesRG($creditos->idCredito );
                                              if ($creditos->estadoCredito != "Finalizado") {
                                                if ($datosExtras->interesesPagados != null)
                                                  {
                                                    $IP2 = $datosExtras->interesesPagados;
                                                  }
                                              ?>
                                               <tr>
                                                <td><b><?= $i;?></b></td>
                                                <td><?= $creditos->Codigo_Cliente?></td>
                                                <td><?= $creditos->Nombre_Cliente?>  <?=  $creditos->Apellido_Cliente?></td>
                                                <td><?= $creditos->tipoCredito?></td>
                                                <td>$ <?= $creditos->capital?></td>
                                                <td>$ <?= $creditos->totalAbonado?></td>
                                                <td>$ <?= $IP2?></td>
                                                <td><?= $creditos->interesPendiente?></td>
                                                <td><?= $creditos->estadoCredito?></td>
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
      </div> <!-- End Row -->

    </div>
  </div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<script>

$(document).on("ready", main);
function main()
{
  $("#buscarP").on("change", mostrarBusqueda);
}

function mostrarBusqueda()
{
  opcion = $(this).val();
  switch(opcion) {
  case "1":
      $("#buscarPor").slideUp();
      $('#buscarPorCliente').slideDown();
    break;
  case "2":
      $("#buscarPor").slideUp();
      $('#buscarPorFecha').slideDown();
    break;
  default:
    alert(nel);
} 
}
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