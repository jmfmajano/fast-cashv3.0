<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Reportes/">Reportes</a></li>
            <li class="active">infored</li>
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
                    <h3 class="panel-title">Reporte Infored</h3>                 
                  </div>
                </div>
              </div>
            </div>
              <div class="row" style="padding-left: 50px; padding-right: 50px;">
                <div class="col-md-12 text-center">
                    <form class="form-inline" id="buscrPorFecha" method="post" action="<?= base_url() ?>Reportes/ReporteInfored">
                      <div class="margn">
                        <div class="form-group">
                          <label for="fechaInicio">Mes</label>
                          <div class="input-group">
                            <select name="mesInfored" id="" class="form-control">
                              <option value="">Seleccione un mes</option>
                              <option value="1">Enero</option>
                              <option value="2">Febrero</option>
                              <option value="3">Marzo</option>
                              <option value="4">Abril</option>
                              <option value="5">Mayo</option>
                              <option value="6">Junio</option>
                              <option value="7">Julio</option>
                              <option value="8">Agosto</option>
                              <option value="9">Septiembre</option>
                              <option value="10">Octubre</option>
                              <option value="11">Noviembre</option>
                              <option value="12">Diciembre</option>
                            </select>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Generar reporte</button>
                        <!-- <a href="<?= base_url();?>Reportes/ReporteIva/1" class="btn btn-warning refres"><i class="fa fa-refresh"></i></a> -->
                      </div>
                    </form>
                  </div>
              </div> <br>  
            <div class="panel-body">
              <!-- <div class="">
                  <div class="pull-left"></div>
                  <div class="pull-right"></div>

                  <div class="table table-responsive">
                    <table class="table table-bordered">
                    <tr>
                      <th>año</th>
                      <th>mes</th>
                      <th>nombre</th>
                      <th>tipo_per</th>
                      <th>num_ptm</th>
                      <th>inst</th>
                      <th>fec_otor</th>
                      <th>monto</th>
                      <th>plazo</th>
                      <th>saldo</th>
                      <th>mora</th>
                      <th>forma_pag</th>
                      <th>tipo_rel</th>
                      <th>linea_cre</th>
                      <th>dias</th>
                      <th>ult_pag</th>
                      <th>tipo_gar</th>
                      <th>tipo_mon</th>
                      <th>valcuota</th>
                      <th>dia</th>
                      <th>fechanac</th>
                      <th>dui</th>
                      <th>nit</th>
                      <th>fecha_can</th>
                      <th>fecha_ven</th>
                      <th>ncuotascre</th>
                      <th>calif_act</th>
                      <th>activi_eco</th>
                      <th>sexo</th>
                      <th>estcredito</th>
                    </tr>
                      <?php
                      function dias_transcurridos($fecha_i,$fecha_f)
                              {
                                $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
                                $dias   = abs($dias); $dias = floor($dias);   
                                return $dias;
                              }
                      foreach ($datos->result() as $fila)
                      {
                        ?>

                        <tr>
                          <td><?= date('Y') ?></td>
                          <td>07</td>
                          <td><?= $fila->Nombre_Cliente ?></td>
                          <td>1</td>
                          <td><?= $fila->codigoCredito ?></td>
                          <td></td>
                          <td><?= $fila->fechaApertura ?></td>
                          <td><?= $fila->capital ?></td>
                          <td><?= $fila->plazoMeses ?></td>

                          <?php 
                            $this->load->model("Reportes_Model");
                            $cre = $this->Reportes_Model->DatosAdicionalesInfored($fila->idCredito);
                          ?>
                          
                          <td>
                          <?php
                              if (@$cre->capitalPendiente != null)
                              {
                                echo $cre->capitalPendiente;
                              }
                              else
                              {
                                echo $fila->capital;
                              }
                          ?>
                          </td>



                          <td>
                            <?php
                              if (@$cre->capitalPendiente != null)
                              {
                                echo $cre->mora;
                              }
                              else
                              {
                                echo '0.00';
                              }
                          ?>
                          </td>
                          <td>
                          <?php 
                              if (strlen(stristr($fila->tipoCredito,'popular'))>0) {
                                echo "9";
                              }
                              else
                              {
                                echo "5";
                              }
                          ?>
                          </td>
                          <td><strong>1</strong></td>
                          <td><strong>COM</strong></td>
                          <td>
                            <?php
                              $hoy = date('Y-m-d');
                              $vencimiento = date($fila->fechaVencimiento);
                              if ($vencimiento > $hoy)
                              {
                                echo "0";
                              }
                              else
                              {
                                echo dias_transcurridos($vencimiento, $hoy);
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              if (@$cre->capitalPendiente != null)
                              {
                                echo $cre->fechaPago;
                              }
                              else
                              {
                                echo $fila->fechaApertura;
                              }
                          ?>
                          </td>


                          <td>
                            <?php 
                              if (strlen(stristr($fila->tipoCredito,'prendario'))>0) {
                                echo "PR";
                              }
                              else
                              {
                                if (strlen(stristr($fila->tipoCredito,'hipotecario'))>0) {
                                    echo "HI";
                                  }
                                  else{
                                    echo "FP";
                                  }
                              }
                            ?>

                          </td>

                          <td><strong>02</strong></td>
                          <td><?= $fila->pagoCuota ?></td>
                          <td><?= date('d')?></td>
                          <td><?= $fila->Fecha_Nacimiento_Cliente ?></td>
                          <td><?= $fila->DUI_Cliente ?></td>
                          <td><?= $fila->NIT_Cliente ?></td>

                          <td>
                            <?php

                            


                              if (@$cre->capitalPendiente != null)
                              {
                                if ($fila->estadoCredito == "Finalizado") {
                                  echo substr($cre->fechaRegistro, 0, 10);
                                }
                                else
                                {
                                  echo "Pendiente";
                                }
                              }
                              else
                              {
                                echo 'Pendiente';
                              }
                            ?>
                          </td>

                          <td><?= $fila->fechaVencimiento ?></td>
                          <td><?= $fila->cantidadCuota ?></td>

                          <td>
                            
                            <?php
                              $hoy = date('Y-m-d');
                              $vencimiento = date($fila->fechaVencimiento);
                              if ($vencimiento > $hoy)
                              {
                                echo "--";
                              }
                              else
                              {
                                $numero =  dias_transcurridos($vencimiento, $hoy);
                                switch ($numero) {
                                  case $numero <= 7:
                                      echo "A1";
                                    break;
                                  case $numero > 7 && $numero <= 14:
                                      echo "A2";
                                    break;
                                  case $numero > 14 && $numero <= 30:
                                      echo "B";
                                    break;
                                  case $numero > 30 && $numero <= 90:
                                      echo "C1";
                                    break;
                                  case $numero > 90 && $numero <= 120:
                                      echo "C2";
                                    break;
                                  case $numero > 120 && $numero <= 150:
                                      echo "D1";
                                    break;
                                  case $numero > 150 && $numero <= 180:
                                      echo "D2";
                                    break;
                                  case $numero > 180:
                                      echo "E";
                                    break;

                                  
                                  default:
                                    # code...
                                    break;
                                }
                              }
                            ?>
                          </td>

                          <td><strong>Comerciante</strong></td>
                          <td><?php 
                              if ($fila->Genero_Cliente == "Masculino") {
                                echo "F";
                              }
                              else
                              {
                                echo "M";
                              }
                          ?>
                          </td>
                          <td><?php 
                              switch ($fila->estadoCredito) {
                                case 'Proceso':
                                      echo "1";
                                  break;
                                case 'Vencido':
                                      echo "1";
                                  break;
                                case 'Finalizado':
                                      echo "3";
                                  break;
                                case 'Saneado':
                                      echo "4 ";
                                  break;
                                
                                default:
                                  
                                  break;
                              }
                          ?>
                          </td>
                        </tr>




                        <?php 
                      }
                      ?>
                    </table>
                  </div>
               </div> -->
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