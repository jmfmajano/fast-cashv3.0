<style>
  #LastF{
    background-color: #EAFAF1;
    border: 1px solid #fff;
    height: 1px;
  }
</style>
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
<!-- contenedor -->
<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
    <div class="row">
            <div class="col-sm-12">
                <!-- <h4 class="pull-left page-title">Gestion de los estados de la solicitud</h4> -->
                <ol class="breadcrumb pull-right">
                    <li><a href="<?= base_url() ?>Solicitud/">Registro de solicitudes</a></li>
                    <li class="active">Solicitudes de préstamo</li>
                </ol>
            </div>
        </div>
            <?php 
              $mes='';
              foreach ($datos->result() as $solicitud) {
                $idSolicitud = '"'.$solicitud->idSolicitud.'"';
                $codigoSolicitud = '"'.$solicitud->codigoSolicitud.'"';
                if ($solicitud->tiempo_plazo==1)
                {
                  $mes = 'mes';
                }
                else
                {
                  if ($solicitud->tiempo_plazo > 1)
                  {
                    $mes = 'meses';
                  }
                }
              
            ?>
        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                    <!--Panel body aqui va la tabla con los datos-->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="margn">
                                <table class="table">
                                  <div class="pull-left">
                                   <?php
                                        switch ($solicitud->idEstadoSolicitud)
                                        {
                                          case '1':
                                                echo "<a title='Revisión Solicitud' onclick='Update($idSolicitud)' type='button' class='btn btn-warning block waves-effect waves-light m-b-5' data-id='$idSolicitud' data-toggle='modal' data-target='.modal_actualizar_estado_solicitudP'><i class='fa fa-list fa-lg'></i> En revisión </a> ";
                                                echo "<a title='Denegar Solicitud' onclick='Delete($idSolicitud)' type='button' class='btn btn-danger block waves-effect waves-light m-b-5' data-id='$idSolicitud' data-toggle='modal' data-target='.modal_actualizar_estado_solicitudD'><i class='fa fa-minus-circle  fa-lg'></i> Denegar </a> ";
                                                echo "<a title='Aprobar Solicitud' onclick='Approved($idSolicitud, $codigoSolicitud)' type='button' class='btn btn-success block waves-effect waves-light m-b-5' data-id='$idSolicitud' data-toggle='modal' data-target='.modal_actualizar_estado_solicitudA'><i class='fa fa-check fa-lg'></i> Aprobar </a>";
                                            break;
                                          case '2':
                                                echo "<a title='Denegar Solicitud' onclick='Delete($idSolicitud)' type='button' class='btn btn-danger block waves-effect waves-light m-b-5' data-id='$idSolicitud' data-toggle='modal' data-target='.modal_actualizar_estado_solicitudD'><i class='fa fa-minus-circle  fa-lg'></i> Denegar </a> ";
                                                echo "<a title='Aprobar Solicitud' onclick='Approved($idSolicitud, $codigoSolicitud)' type='button' class='btn btn-success block waves-effect waves-light m-b-5' data-id='$idSolicitud' data-toggle='modal' data-target='.modal_actualizar_estado_solicitudA'><i class='fa fa-check fa-lg'></i> Aprobar </a>";
                                            break;
                                          
                                          default:
                                              # code...
                                            break;
                                        }
                                   ?>
                                    <!-- <a type="button" class="btn btn-warning block waves-effect waves-light m-b-5"><i class="fa fa-list fa-lg"></i> En revisión</a> -->
                                    <!-- <a type="button" class="btn btn-primary block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-thumbs-up fa-lg"></i> Aprobar</a> -->
                                    <a title="Imprimir Solicitud" type="button" onclick="imprimirTabla()" class="btn btn-info block waves-effect waves-light m-b-5" data-toggle="tooltip" data-dismiss="modal"><i class="fa fa-print  fa-lg"></i> Imprimir</a>
                                  </div>
                                        <div class="pull-right">
                                        <?php
                                          if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                          {
                                            if (sizeof($fiadores->result()) == 0) {
                                            echo "<a onclick='agregarFiador($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5' title='Agregar nuevo Fiador' data-toggle='modal' data-target='#agregarFiador'><i class='fa fa-plus-circle fa-lg'></i> Agreagar Fiador</a> ";
                                            }
                                            if (sizeof($garantias->result()) == 0) {
                                              echo "<a onclick='agregarPrenda($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5' title='Agregar nueva garantia' data-toggle='modal' data-target='#agregarPrenda'><i class='fa fa-plus-circle fa-lg'></i> Agregar Garantia</a>";
                                            }
                                            if (sizeof($hipotecas->result()) == 0) {
                                              echo "<a onclick='agregarHipoteca($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5' title='Agregar nueva garantia' data-toggle='modal' data-target='#agregarHipoteca'><i class='fa fa-plus-circle fa-lg'></i>Agregar hipoteca</a>";
                                            }

                                          }
                                        ?>
                                        </div>
                                     </table>
                                  <div id="tablaImprimir">
                                    <div class="mos" style="position: absolute; background-size: 100% 100%; filter:alpha(opacity=25); filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.5); opacity:.25; left:100px; top:220px; display: none;">
                                      <img src="<?= base_url() ?>plantilla/images/fc_logoR.png">
                                    </div>
                                    <div class="margn">
                                    <div class="margn">
                                    <table class="table">
                                      <tbody class="tbody">
                                            <div align="center"><strong>DATOS DEL CLIENTE SOLICITADO</strong></div>
                                            <tr class="tr">
                                               <?php
                                                if($solicitud->cobraMora==1){
                                                  echo '<label style="background: #F91409; color: #fff; padding: 5px; border-radius: 5px;"><span style="font-weight: normal;"><span id="spanCapital">Se cobrara mora</span></span></label>';

                                                }
                                                else{
                                                  echo '<label style=" background: #FFA000; color: #fff; padding: 5px; border-radius: 5px;"><span style="font-weight: normal;"><span id="spanCapital"> No se cobrara mora</span></span></label>';

                                                }

                                                ?>
                                            </tr>
                                            <tr class='tr'>
                                              <td colspan="" class='td'><p><strong>Código de la solicitud: </strong><?= $solicitud->codigoSolicitud ?></p></td>
                                              <td colspan="" class='td'><p><strong>Plazo: </strong><?= $solicitud->tiempo_plazo ." ".$mes?></p></td>
                                              <td colspan="" class='td'><p><strong>Intereses: </strong><?= $solicitud->tasaInteres ?> %</p></td>
                                              <td class='td'></td>
                                            </tr>
                                            <tr class='tr'>
                                              <td colspan="" class='td'><p><strong>Cantidad solicitada: </strong>$&nbsp;<?= $solicitud->capital ?></p></td>
                                              <td colspan="" class='td'><p><strong>Número de cuotas: </strong><?= $solicitud->cantidadCuota?></p></td>
                                              <td colspan="" class='td'><p><strong>Total a Pagar: </strong>$&nbsp;<?= $solicitud->ivaInteresCapital ?></p></td>
                                              <td class='td'></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <br>
                                    <div class="margn">
                                      <table class="table">
                                      <tbody class="tbody">
                                          <div align="center"><strong>DATOS PERSONALES DEL SOLICITANTE</strong></div>
                                            <tr class='tr'>
                                              <td colspan="" class='td'><p><strong>Nombre: </strong><?= $solicitud->Nombre_Cliente." ".$solicitud->Apellido_Cliente ?></p></td>
                                              <td colspan="" class='td'><p><strong>DUI: </strong><?= $solicitud->DUI_Cliente?></p></td>
                                              <td colspan="" class='td'><p><strong>NIT: </strong><?= $solicitud->NIT_Cliente ?></p></td>
                                              <td></td>
                                            </tr>
                                            <tr class='tr'>
                                              <td colspan="" class='td'><p><strong>Estado civil: </strong><?= $solicitud->Estado_Civil_Cliente ?></p></td>
                                              <td colspan="" class='td'><p><strong>Género: </strong><?= $solicitud->Genero_Cliente ?></p></td>
                                              <td colspan="" class='td'><p><strong>Profesión: </strong><?= $solicitud->Profesion_Cliente ?></p></td>
                                              <td></td>
                                            </tr>
                                            <tr class='tr'>
                                              <td colspan="" class='td'><p><strong>Direción: </strong><?= $solicitud->Domicilio_Cliente ?></p></td>
                                              <td colspan="" class='td'><p><strong>Teléfono: </strong><span style='color: #2E86C1; text-decoration: underline;'><?= $solicitud->Telefono_Fijo_Cliente ?></span></p></td>
                                              <td colspan="" class='td'><p><strong>Celular: </strong><span style='color: #2E86C1; text-decoration: underline;'><?= $solicitud->Telefono_Celular_Cliente ?></span></p></td>
                                              <td></td>
                                            </tr>
                                            <tr >
                                              <td colspan="4" class='td'><p><strong>Observaciones: </strong><?= $solicitud->observaciones ?></p></td>
                                            </tr>
                                          </tbody>
                                          </table>
                                          </div>
                                          </div>
                                          <br>

                                            <?php
                                              }
                                              $idSolicitud = '"'.$idSoli.'"';
                                              
                                              if (sizeof($fiadores->result())>0)
                                              {
                                                echo "<div class='margn'>
                                                <table class='table'>
                                                <tbody class='tbody tbody1'>";
                                                if (sizeof($fiadores->result()) == 1)
                                                {
                                                  // Encabezado DATOS DEL FIADOR
                                                  echo "<div class='alert alert-success'>
                                                        <strong style='color: #424949;'>DATOS DEL FIADOR</strong>";
                                                  
                                                  if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                    {      
                                                      echo  "<a onclick='agregarFiador($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5 ocultarImprimir pull-right' title='Agregar nuevo Fiador' data-toggle='modal' data-target='#agregarFiador' style='margin-top: -7px;'><i class='fa fa-plus-circle fa-lg'></i></a>";
                                                    }
                                                    else
                                                    {
                                                       echo "<i class='fa fa-check fa-lg pull-right'></i>";
                                                    }
                                                  echo "</div>";
                                                }
                                                else
                                                {
                                                  // Encabezado de DATOS DE LOS FIADORES
                                                  echo "<div class='alert alert-success'>
                                                        <strong style='color: #424949;'>DATOS DE LOS FIADORES</strong>";
                                                  
                                                  if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                    {      
                                                      echo  "<a onclick='agregarFiador($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5 ocultarImprimir pull-right' title='Agregar nuevo Fiador' data-toggle='modal' data-target='#agregarFiador' style='margin-top: -7px;'><i class='fa fa-plus-circle fa-lg'></i></a>";
                                                    }
                                                    else
                                                    {
                                                       echo "<i class='fa fa-check fa-lg pull-right'></i>";
                                                    }
                                                  echo "</div>";
                                                }
                                                foreach ($fiadores->result() as $fiador)
                                                {
                                                  $idFiador = '"'.$fiador->idFiador.'"';
                                                  $nombre = '"'.$fiador->nombre.'"';
                                                  $apellido = '"'.$fiador->apellido.'"';
                                                  $ingreso = '"'.$fiador->ingreso.'"';
                                                  $dui = '"'.$fiador->dui.'"';
                                                  $nit = '"'.$fiador->nit.'"';
                                                  $telefono = '"'.$fiador->telefono.'"';
                                                  $email = '"'.$fiador->email.'"';
                                                  $direccion = '"'.$fiador->direccion.'"';
                                                  $fechaNacimiento = '"'.$fiador->fechaNacimiento.'"';
                                                
                                            ?>
                                            
                                            <tr class='tr'>
                                              <td colspan="" class='td'><p><strong>Nombre: </strong><?= $fiador->nombre." ".$fiador->apellido ?></p></td>
                                              <td colspan="" class='td'><p><strong>Ingreso: </strong>$&nbsp;<?= $fiador->ingreso?></p></td>
                                              <td colspan="" class='td'><p><strong>DUI: </strong><?= $fiador->dui ?></p></td>
                                              <?php
                                              if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                {
                                                  echo "<td rowspan=3 class='td' align='center'><a onclick='actualizarFiador($idSolicitud, $idFiador ,$nombre, $apellido, $ingreso, $dui, $nit, $telefono, $email, $direccion, $fechaNacimiento)' title='Editar Fiador' data-toggle='modal' data-target='#actualizarFiador' class='waves-effect waves-light editar ocultarImprimir'><i class='fa fa-pencil-square'></i></a></td>";
                                                }
                                              else
                                              {
                                                echo "<td rowspan=3 class='td'></td>";
                                              }
                                              ?>
                                            </tr>
                                            <tr class='tr'>
                                              <td colspan="" class='td'><p><strong>NIT: </strong><?= $fiador->nit ?></p></td>
                                              <td colspan="" class='td'><p><strong>Teléfono: </strong><span style='color: #2E86C1; text-decoration: underline;'><?= $fiador->telefono ?></span></p></td>
                                              <td colspan="" class='td'><p><strong>Correo: </strong><span style='color: #2E86C1; text-decoration: underline;'><?= $fiador->email ?></span></p></td>
                                            </tr>
                                            <tr class='tr'>
                                              <td colspan="" class='td'><p><strong>Dirección: </strong><?= $fiador->direccion ?></p></td>
                                              <td colspan="" class='td'><p><strong>Fecha de nacimiento: </strong><?= $fiador->fechaNacimiento ?></p></td>
                                              <td colspan="" class='td'><p><strong>Género: </strong><?= $fiador->genero ?></p></td>
                                            </tr>
                                            <?php 
                                              if (sizeof($fiadores->result()) == 1)
                                                {
                                                  echo "<tr id='' class='tr'><td colspan='4' class='td td1'></td></tr>";
                                                }
                                                else
                                                {
                                                  echo "<tr class='tr tr1'><td colspan='4' id='LastF' class='td td1'></td></tr>"; //Esta es la fila rosada que aparece en el detalle de la solicitud
                                                }

                                              }
                                            ?>
                                          </tbody>
                                          </table>
                                          </div>
                                          <br>
                                            <?php } ?>

                                            <?php
                                              if (sizeof($garantias->result())>0)
                                              {
                                                echo "<div class='margn'>
                                                <table class='table'>
                                                <tbody class='tbody tbody1'>";
                                                if (sizeof($garantias->result()) == 1)
                                                {
                                                  //Encabezado de DATOS DE LA GARANTIA
                                                  echo "<div class=' alert alert-success'>
                                                      <strong style='color: #424949;'>DATOS DE LA GARANTIA</strong>";
                                                  if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                    { 
                                                      echo "<a onclick='agregarPrenda($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5 ocultarImprimir pull-right' title='Agregar nueva garantia' data-toggle='modal' data-target='#agregarPrenda' style='margin-top: -7px;'><i class='fa fa-plus-circle fa-lg'></i></a>";
                                                    }
                                                    else
                                                    {
                                                       echo "<i class='fa fa-check fa-lg pull-right'></i>";
                                                    }
                                                    echo "</div>";
                                                }
                                                else
                                                {
                                                  // Encabezado de DATOS DE LAS GARANTIAS
                                                  echo "<div class='alert alert-success'>
                                                      <strong style='color: #424949;'>DATOS DE LAS GARANTIAS</strong>";
                                                  if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                    { 
                                                      echo "<a onclick='agregarPrenda($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5 ocultarImprimir pull-right' title='Agregar nueva garantia' data-toggle='modal' data-target='#agregarPrenda' style='margin-top: -7px;'><i class='fa fa-plus-circle fa-lg'></i></a>";
                                                    }
                                                    else
                                                    {
                                                      echo "<i class='fa fa-check fa-lg pull-right'></i>";
                                                    }
                                                    echo "</div>";
                                                }
                                                foreach ($garantias->result() as $garantia)
                                                {
                                                  $idGarantia = '"'.$garantia->idGarantia.'"';
                                                  $nombre = '"'.$garantia->nombre.'"';
                                                  $valorado = '"'.$garantia->valorado.'"';
                                                  $descripcion = '"'.$garantia->descripcion.'"';
                                                ?>
                                              <tr>  
                                                <td colspan="" class='td td1'><p><strong>Nombre: </strong><?= $garantia->nombre ?></p></td>
                                                <td colspan="" class='td td1'><p><strong>Precio valorado: </strong>$&nbsp;<?= $garantia->valorado ?></p></td>
                                                <td colspan="" class='td td1'><p><strong>Descripción: </strong><?= $garantia->descripcion ?></p></td>
                                                <?php
                                                if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                  { 
                                                    echo "<td><a onclick='actualizarPrenda($idSolicitud, $idGarantia, $nombre, $valorado, $descripcion)' title='Editar Garantia' data-toggle='modal' data-target='#actualizarPrenda' class='waves-effect waves-light editar ocultarImprimir'><i class='fa fa-pencil-square'></i></a></td>";
                                                  }
                                                else
                                                {
                                                  echo "<td class='td td1'></td>";
                                                }
                                                  ?>
                                              </tr>
                                                <?php 
                                                  if (sizeof($garantias->result()) == 1)
                                                    {
                                                      echo "<tr id='' class='tr tr1'><td colspan='4' class='td td1'></td></tr>";
                                                    }
                                                    else
                                                    {
                                                      echo "<tr class='tr tr1'><td colspan='4' id='LastF' class='td td1'></td></tr>"; //Esta es la fila rosada que aparece en el detalle de la solicitud
                                                    }
                                                  }
                                                ?>
                                          </tbody>
                                          </table>
                                          </div>
                                        <br>
                                        <?php } ?>

                                        <?php
                                              if (sizeof($hipotecas->result())>0)
                                              {
                                                echo "<div class='margn'>
                                                <table class='table'>
                                                <tbody class='tbody tbody1'>";
                                                if (sizeof($hipotecas->result()) == 1)
                                                {
                                                  //Encabezado de DATOS DE LA GARANTIA
                                                  echo "<div class=' alert alert-success'>
                                                      <strong style='color: #424949;'>DATOS DE LA HIPOTECA</strong>";
                                                  if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                    { 
                                                      echo "<a onclick='agregarHipoteca($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5 ocultarImprimir pull-right' title='Agregar nueva garantia' data-toggle='modal' data-target='#agregarHipoteca' style='margin-top: -7px;'><i class='fa fa-plus-circle fa-lg'></i></a>";
                                                    }
                                                    else
                                                    {
                                                       echo "<i class='fa fa-check fa-lg pull-right'></i>";
                                                    }
                                                    echo "</div>";
                                                }
                                                else
                                                {
                                                  // Encabezado de DATOS DE LAS GARANTIAS
                                                  echo "<div class='alert alert-success'>
                                                      <strong style='color: #424949;'>DATOS DE LAS HIPOTECAS</strong>";
                                                  if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                    { 
                                                      echo "<a onclick='agregarHipoteca($idSolicitud)' class='btn btn-primary waves-effect waves-light m-b-5 ocultarImprimir pull-right' title='Agregar nueva hipoteca' data-toggle='modal' data-target='#agregarHipoteca' style='margin-top: -7px;'><i class='fa fa-plus-circle fa-lg'></i></a>";
                                                    }
                                                    else
                                                    {
                                                      echo "<i class='fa fa-check fa-lg pull-right'></i>";
                                                    }
                                                    echo "</div>";
                                                }
                                                foreach ($hipotecas->result() as $hipoteca)
                                                {
                                                  $idHipoteca = '"'.$hipoteca->idHipoteca.'"';
                                                  $nombreHipoteca = '"'.$hipoteca->nombre.'"';
                                                  $valoradoHipoteca = '"'.$hipoteca->valorado.'"';
                                                  $descripcionHipoteca = '"'.$hipoteca->descripcion.'"';
                                                ?>
                                              <tr>  
                                                <td colspan="" class='td td1'><p><strong>Nombre: </strong><?= $hipoteca->nombre ?></p></td>
                                                <td colspan="" class='td td1'><p><strong>Precio valorado: </strong>$&nbsp;<?= $hipoteca->valorado ?></p></td>
                                                <td colspan="" class='td td1'><p><strong>Descripción: </strong><?= $hipoteca->descripcion ?></p></td>
                                                <?php
                                                if ($solicitud->idEstadoSolicitud != 3 && $solicitud->idEstadoSolicitud != 4)
                                                  { 
                                                    echo "<td><a onclick='actualizarHipoteca($idSolicitud, $idHipoteca, $nombreHipoteca, $valoradoHipoteca, $descripcionHipoteca)' title='Editar Garantia' data-toggle='modal' data-target='#actualizarHipoteca' class='waves-effect waves-light editar ocultarImprimir'><i class='fa fa-pencil-square'></i></a></td>";
                                                  }
                                                else
                                                {
                                                  echo "<td class='td td1'></td>";
                                                }
                                                  ?>
                                              </tr>
                                                <?php 
                                                  if (sizeof($garantias->result()) == 1)
                                                    {
                                                      echo "<tr id='' class='tr tr1'><td colspan='4' class='td td1'></td></tr>";
                                                    }
                                                    else
                                                    {
                                                      echo "<tr class='tr tr1'><td colspan='4' id='LastF' class='td td1'></td></tr>"; //Esta es la fila rosada que aparece en el detalle de la solicitud
                                                    }
                                                  }
                                                ?>
                                          </tbody>
                                          </table>
                                          </div>
                                        <br>
                                        <?php } ?>
                                  <div align="center">
                                    <a href="<?= base_url() ?>Solicitud/" type="button" class="btn btn-default block waves-effect waves-light m-b-5 ocultarImprimir"><i class="fa fa-chevron-left fa-lg"></i> Volver</a>
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
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana actualizar estado de solicitud a en proceso-->
<!-- ============================================================== -->
      <div class="modal fade modal_actualizar_estado_solicitudP" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-md">
              <div class="modal-content">
                  <form name="frmeliminarcliente" action="<?= base_url();?>Solicitud/ActualizarEstadoSolicitud/1/" id="frmeliminarcliente" method="GET">
                  <div>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-refresh fa-lg text-warning"></i> 
                      </h4>
                  </div>
                  <div class="modal-body">
                    <input type="text" hidden id="IdP" name='id'>
                    <p align="center">¿Está seguro de revisar el estado de la solicitud?</p>
                  </div>
                  <div align="center">
                      <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                      <button type="submit" class="btn btn-warning block waves-effect waves-light m-b-5"><i class="fa fa-list fa-lg"></i> Revisar</button>
                  </div>
                  </form>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana actualizar estado de solicitud a denegado-->
<!-- ============================================================== -->
      <div class="modal fade modal_actualizar_estado_solicitudD" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-md">
              <div class="modal-content">
                  <form name="frmeliminarcliente" action="<?= base_url();?>Solicitud/ActualizarEstadoSolicitud/2/" id="frmeliminarcliente" method="GET">
                  <div>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-ban fa-lg text-danger"></i> 
                      </h4>
                  </div>
                  <div class="modal-body">
                    <input type="text" hidden id="IdE" name='id'>
                    <p align="center">¿Está seguro de denegar el estado de la solicitud?</p>
                  </div>
                  <div align="center">
                      <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                      <button type="submit" class='btn btn-danger block waves-effect waves-light m-b-5'><i class='fa fa-minus-circle  fa-lg'></i> Denegar</button>
                  </div>
                  </form>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana para aprobar solicitud-->
<!-- ============================================================== -->
      <div class="modal fade modal_actualizar_estado_solicitudA" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-md">
              <div class="modal-content">
                  <form name="frmeliminarcliente" action="<?= base_url();?>Solicitud/AgregarCredito/" id="frmeliminarcliente" method="GET">
                  <div>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-check-square-o fa-lg text-success"></i> 
                      </h4>
                  </div>
                  <div class="modal-body">
                    <input type="text" hidden id="IdA" name='k'>
                    <input type="text" hidden id="Codigo" name='c'>
                    <p align="center">¿Está seguro de aprobar el estado de la solicitud?</p>
                  </div>
                  <div align="center">
                      <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                      <button type="submit" class="btn btn-success block waves-effect waves-light m-b-5"><i class='fa fa-check fa-lg'></i> Aprobar </button>
                  </div>
                  </form>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana para agregar fiador-->
<!-- ============================================================== -->
<div class="modal fade" id="agregarFiador" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="limpiar()">&times;</button>
          <h4 class="modal-title">Nuevo fiador</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url() ?>Solicitud/AgregarFiador" autocomplete="off" id="FormNuevaSolicitudModalFiador">
              <input type="hidden" class="form-control" id="id_solicitud" name="id_solicitud">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-4">
                          <label for="nombre_fiador">Nombre</label>
                          <input type="text" class="form-control" id="nombre_fiador" name="nombre_fiador" placeholder="Nombre del fiador">
                          <input type="hidden" class="form-control" value="<?= $solicitud->tipoCredito ?>" id="tipoPInicial">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="apellido_fiador">Apellido</label>
                          <input type="text" class="form-control" id="apellido_fiador" name="apellido_fiador" placeholder="Apellido del fiador">
                          <input type="hidden" class="form-control tipoPFinal" name="tipoPrestamo" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="dui_fiador">DUI</label>
                          <input type="text" class="form-control" id="dui_fiador" name="dui_fiador" placeholder="DUI" data-mask="9999999-9">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                          <label for="nit_fiador">NIT</label>
                          <input type="text" class="form-control" id="nit_fiador" name="nit_fiador" placeholder="NIT" data-mask="9999-999999-999-9">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="telefono_fiador">Teléfono</label>
                          <input type="text" class="form-control validaTel" id="telefono_fiador" name="telefono_fiador" placeholder="Teléfono">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="email_fiador">Email</label>
                          <input type="email" class="form-control" id="email_fiador" name="email_fiador" placeholder="Correo electrónico">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                          <label for="nacimiento_fiador">Fecha de Nacimiento</label>
                          <input type="text" class="form-control DateTime" id="nacimiento_fiador" name="nacimiento_fiador" placeholder="Fecha de nacimiento" data-mask="9999/99/99">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="genero_fiador">Género</label>
                          <select class="form-control" id="genero_fiador" name="genero_fiador" data-placeholder="Seleccione un género">
                                <option value="">Seleccione un género</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Otro">Otro</option>
                          </select>
                    </div>
                    <div class="form-group col-md-4">
                          <label for="ingreso_fiador">Ingreso</label>
                          <input type="text" class="form-control validaDigit" id="ingreso_fiador" name="ingreso_fiador" placeholder="Ingreso mensual">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="direccion_fiador">Dirección</label>
                          <textarea class="form-control resize" rows="3" id="direccion_fiador" name="direccion_fiador"></textarea>
                    </div>
                </div>
                <div align="center">
                  <button class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-check-square-o fa-lg"></i> Agregar</button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                  <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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
<!-- Ventana para actualizar fiador-->
<!-- ============================================================== -->
<div class="modal fade" id="actualizarFiador" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar fiador</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url() ?>Solicitud/ActualizarFiador" autocomplete="off" id="FormEditarSolicitudModalFiadorA">
              <input type="hidden" class="form-control" id="id_solicitudA" name="id_solicitud">
              <input type="hidden" class="form-control" id="id_fiadorA" name="id_fiador">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-6">
                          <label for="nombre_fiadorA">Nombre</label>
                          <input type="text" class="form-control" id="nombre_fiadorA" name="nombre_fiador" placeholder="Nombre del fiador">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="nombre_fiadorA">Apellido</label>
                          <input type="text" class="form-control" id="apellido_fiadorA" name="apellido_fiador" placeholder="Apellido del fiador">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                          <label for="dui_fiadorA">DUI</label>
                          <input type="text" class="form-control" id="dui_fiadorA" name="dui_fiador" placeholder="DUI" data-mask="9999999-9">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="nit_fiadorA">NIT</label>
                          <input type="text" class="form-control" id="nit_fiadorA" name="nit_fiador" placeholder="NIT" data-mask="9999-999999-999-9">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="telefono_fiadorA">Teléfono</label>
                          <input type="text" class="form-control validaTel" id="telefono_fiadorA" name="telefono_fiador" placeholder="Teléfono">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                          <label for="email_fiadorA">Email</label>
                          <input type="email" class="form-control" id="email_fiadorA" name="email_fiador" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="nacimiento_fiadorA">Fecha de Nacimiento</label>
                          <input type="text" class="form-control DateTime" id="nacimiento_fiadorA" name="nacimiento_fiador" placeholder="Fecha de nacimiento" data-mask="9999/99/99">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="ingreso_fiadorA">Ingreso</label>
                          <input type="text" class="form-control validaDigit" id="ingreso_fiadorA" name="ingreso_fiador" placeholder="Ingreso mensual">
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="direccion_fiadorA">Dirección</label>
                          <textarea class="form-control resize" rows="3" id="direccion_fiadorA" name="direccion_fiador"></textarea>
                    </div>
                </div>
                <div align="center">
                  <button class="btn btn-warning waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Actualizar</button>
                  <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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
<!-- Ventana para agregar garantia-->
<!-- ============================================================== -->
<div class="modal fade" id="agregarPrenda" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="limpiar()">&times;</button>
          <h4 class="modal-title">Nueva garantia</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url() ?>Solicitud/AgregarPrenda" id="FormNuevaSolicitudModalPrenda" autocomplete="off">
              <input type="hidden" class="form-control" id="id_solicitudP" name="id_solicitud">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-6">
                          <label for="nombre_prenda">Nombre de la prenda</label>
                          <input type="text" class="form-control" id="nombre_prenda" name="nombre_prenda" placeholder="Nombre de la prenda">
                          <input type="hidden" class="form-control tipoPFinal" name="tipoPrestamo" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="precio_valorado">Precio valorado</label>
                          <input type="text" class="form-control validaDigit" id="precio_valorado" name="precio_valorado" placeholder="Precio de la prenda">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="descripcion_prenda">Descripción</label>
                          <textarea class="form-control resize" rows="3" id="descripcion_prenda" name="descripcion_prenda"></textarea>
                  </div>
                </div>
                <div align="center">
                  <button class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-check-square-o fa-lg"></i> Agregar</button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                  <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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
<!-- Ventana para actualizar Prenda-->
<!-- ============================================================== -->
<div class="modal fade" id="actualizarPrenda" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar garantia</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url() ?>Solicitud/ActualizarPrenda" autocomplete="off" id="FormEditarSolicitudModalPrendaA">
              <input type="hidden" class="form-control" id="id_solicitudAP" name="id_solicitud">
              <input type="hidden" class="form-control" id="id_prendaA" name="id_prenda">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-6">
                          <label for="nombre_prendaA">Nombre de la prenda</label>
                          <input type="text" class="form-control" id="nombre_prendaA" name="nombre_prenda" placeholder="Nombre de la prenda">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="precio_valoradoA">Precio valorado</label>
                          <input type="text" class="form-control validaDigit" id="precio_valoradoA" name="precio_valorado" placeholder="Precio de la prenda">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="descripcion_prendaA">Descripción</label>
                          <textarea class="form-control resize" rows="3" id="descripcion_prendaA" name="descripcion_prenda"></textarea>
                  </div>
                </div>
                <div align="center">
                  <button class="btn btn-warning waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Actualizar</button>
                  <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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
<!-- Ventana para agregar garantia-->
<!-- ============================================================== -->
<div class="modal fade" id="agregarHipoteca" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="limpiar()">&times;</button>
          <h4 class="modal-title">Nueva garantia</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url() ?>Solicitud/AgregarHipoteca" id="FormNuevaSolicitudModalHipoteca" autocomplete="off">
              <input type="hidden" class="form-control" id="id_solicitudH" name="id_solicitud">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-6">
                          <label for="nombre_hipoteca">Nombre de la hipoteca</label>
                          <input type="text" class="form-control" id="nombre_hipoteca" name="nombre_hipoteca" placeholder="Nombre de la hipoteca">
                          <input type="hidden" class="form-control tipoPFinal" name="tipoPrestamo" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="precio_hipoteca">Precio valorado de la hipoteca</label>
                          <input type="text" class="form-control validaDigit" id="precio_hipoteca" name="precio_hipoteca" placeholder="Precio de la hipoteca">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="descripcion_hipoteca">Descripción</label>
                          <textarea class="form-control resize" rows="3" id="descripcion_hipoteca" name="descripcion_hipoteca"></textarea>
                  </div>
                </div>
                <div align="center">
                  <button class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-check-square-o fa-lg"></i> Agregar</button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                  <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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
<!-- Ventana para actualizar Prenda-->
<!-- ============================================================== -->
<div class="modal fade" id="actualizarHipoteca" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar garantia</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url() ?>Solicitud/ActualizarHipoteca" autocomplete="off" id="FormEditarSolicitudModalHipotecaA">
              <input type="hidden" class="form-control" id="id_solicitudAH" name="id_solicitud">
              <input type="hidden" class="form-control" id="id_hipotecaA" name="id_hipoteca">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-6">
                          <label for="nombre_hipotecaA">Nombre de la hipoteca</label>
                          <input type="text" class="form-control" id="nombre_hipotecaA" name="nombre_hipoteca" placeholder="Nombre de la hipoteca">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="precio_hipotecaA">Precio valorado de la hipoteca</label>
                          <input type="text" class="form-control validaDigit" id="precio_hipotecaA" name="precio_hipoteca" placeholder="Precio de la hipoteca">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="descripcion_hipotecaA">Descripción</label>
                          <textarea class="form-control resize" rows="3" id="descripcion_hipotecaA" name="descripcion_hipoteca"></textarea>
                  </div>
                </div>
                <div align="center">
                  <button class="btn btn-warning waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Actualizar</button>
                  <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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




<script>
  $(document).on("ready", main);
  function main()
  {
    prestamo = $("#tipoPInicial").val();

    separador = " ";
    datos = prestamo.split(separador);
    dato = datos[1];
    $(".tipoPFinal").attr("value", dato);
  }


  function Update(id){
      document.getElementById('IdP').value=id;
    }

  function Delete(id){
      document.getElementById('IdE').value=id;
    }

    function Approved(id, codigo){
      document.getElementById('IdA').value=id;
      document.getElementById('Codigo').value=codigo;
    }

    function agregarFiador(idSolicitud)
    {
      $("#id_solicitud").attr('value', idSolicitud);
    }

    function actualizarFiador(idSolicitud, idFiador,nombre, apellido, ingreso, dui, nit, telefono, email, direccion, fechaNacimiento)
    {
      $("#id_solicitudA").attr('value', idSolicitud);
      $("#id_fiadorA").attr('value', idFiador);
      $("#nombre_fiadorA").attr('value', nombre);
      $("#apellido_fiadorA").attr('value', apellido);
      $("#ingreso_fiadorA").attr('value', ingreso);
      $("#dui_fiadorA").attr('value', dui);
      $("#nit_fiadorA").attr('value', nit);
      $("#telefono_fiadorA").attr('value', telefono);
      $("#email_fiadorA").attr('value', email);
      $("#direccion_fiadorA").html(direccion);
      $("#nacimiento_fiadorA").attr('value', fechaNacimiento);
    }

    function agregarPrenda(idSolicitud)
    {
      $("#id_solicitudP").attr('value', idSolicitud);
    }

    function actualizarPrenda(idSolicitud, idGarantia, nombre, valorado, descripcion)
    {
      $("#id_solicitudAP").attr('value', idSolicitud);
      $("#id_prendaA").attr('value', idGarantia);
      $("#nombre_prendaA").attr('value', nombre);
      $("#precio_valoradoA").attr('value', valorado);
      $("#descripcion_prendaA").html(descripcion);
    }


    function actualizarPrenda(idSolicitud, idGarantia, nombre, valorado, descripcion)
    {
      $("#id_solicitudAP").attr('value', idSolicitud);
      $("#id_prendaA").attr('value', idGarantia);
      $("#nombre_prendaA").attr('value', nombre);
      $("#precio_valoradoA").attr('value', valorado);
      $("#descripcion_prendaA").html(descripcion);
    }

    function agregarHipoteca(idSolicitud)
    {
      $("#id_solicitudH").attr('value', idSolicitud);
    }

    function actualizarHipoteca(idSolicitud, idHipoteca, nombre, valorado, descripcion)
    {
      $("#id_solicitudAH").attr('value', idSolicitud);
      $("#id_hipotecaA").attr('value', idHipoteca);
      $("#nombre_hipotecaA").attr('value', nombre);
      $("#precio_hipotecaA").attr('value', valorado);
      $("#descripcion_hipotecaA").html(descripcion);
    }


    function imprimirTabla()
    {
       $(".ocultarImprimir").hide();
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
    function limpiar(){
        $('#nombre_fiador').val("");
        $('#apellido_fiador').val("");
        $('#dui_fiador').val("");
        $('#nit_fiador').val("");
        $('#telefono_fiador').val("");
        $('#email_fiador').val("");
        $('#nacimiento_fiador').val("");
        $('#genero_fiador').val("");
        $('#ingreso_fiador').val("");
        $('#direccion_fiador').val("");
        $('#nombre_prenda').val("");
        $('#precio_valorado').val("");
        $('#descripcion_prenda').val("");
    }
</script>


