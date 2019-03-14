<?php if($this->session->flashdata("errorr")):?>
  <script type="text/javascript">
    $(document).ready(function(){
    $.Notification.autoHideNotify('error', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("errorr")?>');
    });
  </script>
<?php endif; ?>
<style>
  #encabezado{
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
                    <form class="form-inline" id="buscrPorFecha" method="post" action="<?= base_url() ?>Reportes/ResumenIva/2">
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
                        <a href="<?= base_url();?>Reportes/ResumenIva/1" class="btn btn-warning refres"><i class="fa fa-refresh"></i></a>
                      </div>
                    </form>
                  </div>
              </div> <br>  
            <div class="panel-body">
            <?php
              if (isset($datos) && sizeof($datos) != 0)
                  { 
                  ?>
              <div class="margn">
                <div class="">

                  <div class="pull-left"></div>
                  <div class="pull-right">
                  <?php
                    if (isset($si) && $si ==true)
                    {
                  ?>
                      <!-- <a title='Ver en PDF' href="<?= base_url() ?>Reportes/ResumenIvaPDF?i=<?= $fi?>&&f=<?= $ff ?>" target="_blank" type='button' class='btn btn-danger block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Ver en PDF </a>  -->
                      <a title='Aprobar Solicitud'  href="<?= base_url() ?>Reportes/ResumenIvaEXCEL?i=<?= $fi?>&&f=<?= $ff ?>" target="_blank" type='button' class='btn btn-success block waves-effect waves-light m-b-5'><i class='fa fa-file fa-lg'></i> Excel </a>
                      <a title="Imprimir Solicitud" type="button" onclick="imprimirTabla()" class="btn btn-info block waves-effect waves-light m-b-5" data-toggle="tooltip" data-dismiss="modal"><i class="fa fa-print  fa-lg"></i> Imprimir</a>
                  <?php } ?>
                  </div>
               </div>
                  <?php 
                    if (isset($si) && $si ==true)
                    {
                    
                      
                      $contador=0;
                      $inicio = "";
                      $final = "";
                      $total = 0;
                      $totalIVA = 0;
                      $totalIntereses = 0;
                      foreach ($datos as $row)
                      {
                        $totalIVA = $totalIVA + $row->iva;
                        $totalIntereses = $totalIntereses + $row->interes;
                        $total = $total + $row->iva + $row->interes; 
                        if ($contador == 0)
                        {
                          $inicio = $row->codigoSolicitud;
                        }
                        if ($contador == sizeof($datos))
                        {
                          $final = $row->codigoSolicitud;
                        }
                        $contador++;
                      }
                  ?>
            <div id="tablaImprimir">
              <div class="mos" style="position: absolute; background-size: 100% 100%; filter:alpha(opacity=25); filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.5); opacity:.25; left:100px; top:220px; display: none;">
                <img src="<?= base_url() ?>plantilla/images/fc_logoR.png">
              </div>
              <div class="row" id="encabezado">
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
                  <br>
                </div>
                <div class="col-md-12">
                  <p class="text-center"><strong>Libro de ventas a consumidores del <?= $fi ?> al <?= $ff ?></strong></p>
                </div>
              </div>
               <!-- tabla -->
               <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" rowspan="2">Fecha</th>
                      <th colspan="2" class="text-center">Facturas</th>
                      <th class="text-center" rowspan="2">Ventas no sujetas</th>
                      <th class="text-center" rowspan="2">Ventas excentas</th>
                      <th colspan="4" class="text-center">Ventas gravadas</th>
                      <th class="text-center" rowspan="2">Ventas por terceros</th>
                    </tr>
                    <tr class="text-center">
                      <td>Inicio</td>
                      <td>Fin</td>
                      <td>Locales</td>
                      <td>Exportaciones</td>
                      <td>IVA retenido</td>
                      <td>Venta Total</td>
                    </tr>
                    <tr class="text-center">
                      <td><?= date('d/m/Y') ?></td>
                      <td><?= $inicio ?></td>
                      <td><?= $row->codigoSolicitud ?></td>
                      <td>$ 0.00</td>
                      <td>$ 0.00</td>
                      <td>$ <?= $total ?></td>
                      <td>$ 0.00</td>
                      <td>$ 0.00</td>
                      <td>$ <?= $total ?></td>
                      <td>---</td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="3"><strong>Totales</strong></td>
                      <td>$ 0.00</td>
                      <td>$ 0.00</td>
                      <td>$ <?= $total ?></td>
                      <td>$ 0.00</td>
                      <td>$ 0.00</td>
                      <td>$ <?= $total ?></td>
                      <td>$0</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                      <td colspan="3"><strong>Ventas no sujetas</strong></td>
                      <td colspan="2">$ 0.00</td>
                      <td colspan="4"></td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="3"><strong>Excentas</strong></td>
                      <td colspan="2">$ 0.00</td>
                      <td colspan="4"></td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="3"><strong>Exportaciones</strong></td>
                      <td colspan="2">$ 0.00</td>
                      <td colspan="4"></td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="3"><strong>Locales</strong></td>
                      <td colspan="2">$ <?= $total ?></td>
                      <td colspan="4"></td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="3"><strong>Neto</strong></td>
                      <td colspan="2">$ <?= $totalIntereses ?></td>
                      <td colspan="4"></td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="3"><strong>Impuestos</strong></td>
                      <td colspan="2">$ <?= $totalIVA ?></td>
                      <td colspan="4"></td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="3"><strong>(-) Iva retenido</strong></td>
                      <td colspan="2">$ 0.00</td>
                      <td colspan="4"></td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="3"><strong>Total</strong></td>
                      <td colspan="2">$ <?= $total ?></td>
                      <td colspan="4"></td>
                    </tr>
                  </tbody>
               </table>
               <!-- fin tabla -->
               <br><br><br>
              <p class="text-center"><strong>Nombre o firma del contribuyente </strong>________________________________________________</p>

              <?php
                }
              ?>
            </div>
              </div>
              <?php
    
              }
              else
              {
               echo '<div class="alert alert-info"><strong><h4 class="text-center">No hay datos que mostrar !!!</h4></strong><p class="text-center">Por favor, digite un rango de fecha para ver el informe.</p></div>';
              }
              ?>
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
      $(".mos").show();
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
      $(".mos").hide();
       $(".ocultarImprimir").show();
    }
</script>