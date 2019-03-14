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
                    <h3 class="panel-title">Reporte de créditos por clientes</h3>
                  </div>
                </div>
              </div>
            </div>
              <!-- inico -->
              <div class="row" style="padding-left: 50px; padding-right: 50px;" id="buscarPorCliente">
                  <div class="col-md-12 text-center">
                      <form class="form-inline" id="buscrPorFecha" method="post" action="<?= base_url() ?>Reportes/GeneralPorCliente/">
                         <a href="<?= base_url();?>Reportes/General/1" class="btn btn-warning refres"><i class="fa fa-refresh"></i>Volver</a>
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
                  ?>
                    <!-- <a title='Ver en PDF' href="<?= base_url() ?>Reportes/ReporteGeneralClientePDF/<?= $cliente ?>" target="_blank" type='button' class='btn btn-danger block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Ver en PDF </a>  -->
                    <a title='Aprobar Solicitud'  href="<?= base_url() ?>Reportes/ReporteGeneralClienteEXCEL//<?= $cliente ?>" target="_blank" type='button' class='btn btn-success block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Excel </a>
                    <a title="Imprimir Solicitud" type="button" onclick="imprimirTabla()" class="btn btn-info block waves-effect waves-light m-b-5" data-toggle="tooltip" data-dismiss="modal"><i class="fa fa-print  fa-lg"></i> Imprimir</a>
                    <?php } ?>
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
                                     <td colspan="9" class="text-center"><strong>REPORTE DE CRÉDITOS POR CLIENTE</strong></td>
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
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4 col-md-push-2 pull-left">
                                        <img src="<?= base_url() ?>plantilla/images/fc_logoR.png" width="100" height="100">
                                      </div>
                                      <div class="col-md-4 col-md-pull-2 text-center">
                                        <p><strong>GOCAJAA GROUP SA DE CV</strong></p>
                                        <p><strong>MERCEDES UMAÑA, USULUTAN</strong></p>
                                        <p><strong>REPORTE DE CRÉDITOS POR CLIENTE</strong></p>
                                      </div>
                                      <div class="col-md-4  pull-right"></div>
                                    </div>
                                  </div>
                                  <table class="table table-bordered">
                                      <thead class="">
                                        <tr>
                                         <td colspan="9" class="text-center"><strong>REPORTE DE CRÉDITOS POR CLIENTE</strong></td>
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