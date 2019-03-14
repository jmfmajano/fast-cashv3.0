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
<!-- contenedor -->
<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
		<div class="row">
            <div class="col-sm-12">
                <!-- <h4 class="pull-left page-title">Gestion de los estados de la solicitud</h4> -->
                <ol class="breadcrumb pull-right">
                    <li><a href="<?= base_url() ?>Home/Main">Inicio</a></li>
                    <li class="active">Solicitudes de préstamo</li>
                </ol>
            </div>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                    <!--Panel body aqui va la tabla con los datos-->
                    <div class="panel-heading">
                      <div class="table-title">
                        <div class="row">
                          <div class="col-sm-5">
                            <h3 class="panel-title">Registro de solicitudes</h3>
                          </div>
                          <div class="col-sm-7">
                              <a title="Nuevo" href="" data-toggle="modal" data-target=".modal_opcion_solicitud" class="btn btn-primary waves-effect waves-light m-b-5"><i class="fa fa-plus-circle"></i> <span>Nueva Solicitud<span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="margn">
                                <table id="datatable" class="table">
                                  <thead class="thead-dark thead thead1">
                                    <tr class="tr tr1">
                                      <th class="th th1" scope="col">#</th>
                                      <th class="th th1" scope="col">Estado</th>
                                      <th class="th th1" scope="col">Cliente</th>
                                      <th class="th th1" >Monto de dinero</th>
                                      <th class="th th1" >Fecha Recibida</th>
                                      <th class="th th1" >Tipo de Crédito</th>
                                      <th class="th th1" >Acción</th>
                                    </tr>
                                  </thead>
                                  <tbody class="tbody tbody1">
                                  	<?php 
                                      $i = 0;
                                      if(!empty($datos)){
                                  		foreach ($datos->result() as $solicitudes)
                                  		{
                                        if ($solicitudes->estadoSolicitud != 0)
                                        {
                                        
                                        $idSolicitud = '"'.$solicitudes->idSolicitud.'"';
                                        $codigoSolicitud = '"'.$solicitudes->codigoSolicitud.'"';
                                        $estadoSolicitud = '"'.$solicitudes->estadoSolicitud.'"';
                                        $cliente = '"'.$solicitudes->Nombre_Cliente." ".$solicitudes->Apellido_Cliente.'"';
                                        $tipoPrestamo = '"'.$solicitudes->tiempo_plazo.'"';
                                        $fechaRegistro = '"'.$solicitudes->fechaRecibido.'"';
                                        $capital = '"'.$solicitudes->capital.'"';
                                        $interes = '"'.$solicitudes->tasaInteres.'"';
                                        $iva = '"'.$solicitudes->totalIva.'"';
                                        $capitalPagar = '"'.$solicitudes->ivaInteresCapital.'"';
                                        $cuotaDiaria = '"'.$solicitudes->pagoCuota.'"';
                                        $numeroCuotas = '"'.$solicitudes->cantidadCuota.'"';
                                        $observaciones = '"'.$solicitudes->observaciones.'"';

                                        $i = $i +1;
                                  	?>
                  									<tr class="tr tr1">
                                      <td class="td td1" data-label="#" style="min-width: 10px; width: auto;"><b><?= $i;?></b></td>
                  										<td class="td td1" data-label="Estado" style="min-width: 5px; width: auto;">
                                      <?php
                                          switch ($solicitudes->idEstadoSolicitud)
                                          {
                                            case '1':
                                              echo "<img title='Nueva Solicitud' src='".base_url()."/plantilla/images/estadosSolicitudes/mas.png'>&nbsp;<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nuevo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                                              break;
                                              case '2':
                                              echo "<img title='Solicitud en Revisión' src='".base_url()."/plantilla/images/estadosSolicitudes/ajustes.png'>&nbsp;<span class='label label-warning'>&nbsp;En Revisión&nbsp;</span>";
                                              break;
                                              case '3':
                                              echo "<img src='".base_url()."/plantilla/images/estadosSolicitudes/comprobar.png'>&nbsp;<span class='label label-success'>&nbsp;&nbsp;Aprobado&nbsp;&nbsp;</span>";
                                              break;
                                              case '4':
                                              echo "<img src='".base_url()."/plantilla/images/estadosSolicitudes/cancelar.png'>&nbsp;<span class='label label-danger'>&nbsp;&nbsp;Denegado&nbsp;&nbsp;</span>";
                                              break;
                                            
                                            default:
                                              # code...
                                              break;
                                          }
                                      ?>
                                      </td>
                  										<td class="td td1" data-label="Cliente"><?= $solicitudes->Nombre_Cliente." ".$solicitudes->Apellido_Cliente ?></td>
                  										<td class="td td1" data-label="Monto de dinero">$ <?= $solicitudes->ivaInteresCapital?></td>
                                      <td class="td td1" data-label="Fecha Recibida"><?= $solicitudes->fechaRecibido ?></td>
                                      <?php 
                                        if ($solicitudes->tipoCredito == "Crédito popular")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #626567;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$solicitudes->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($solicitudes->tipoCredito == "Crédito popular mixto")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #DC7633;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$solicitudes->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($solicitudes->tipoCredito == "Crédito popular prendario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #0B5345;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$solicitudes->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($solicitudes->tipoCredito == "Crédito popular hipotecario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #2980B9;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$solicitudes->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($solicitudes->tipoCredito == "Crédito personal")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #666699;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$solicitudes->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }                                        
                                        if ($solicitudes->tipoCredito == "Crédito personal hipotecario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #3F51B5;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$solicitudes->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                        if ($solicitudes->tipoCredito == "Crédito personal prendario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #AFB42B;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$solicitudes->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                        if ($solicitudes->tipoCredito == "Crédito personal mixto")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #9C640C;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$solicitudes->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                      ?>
                                      
                  										<td class="td td1" data-label="Acción" style="min-width: 120px;">
                                      <?php 

                                       echo "<a title='Ver más...' data-toggle='tooltip' href='".base_url()."Solicitud/DetalleSolicitud/".$solicitudes->idSolicitud."' class='waves-effect waves-light ver'><i class='fa fa-folder'></i></a>";

                                       if ($solicitudes->idEstadoSolicitud == 1 || $solicitudes->idEstadoSolicitud == 2)
                                       {
                                        echo "<a title='Editar' data-toggle='tooltip' href='".base_url()."Solicitud/FrmActualizarSolicitud/".$solicitudes->idSolicitud."' class='waves-effect waves-light editar'><i class='fa fa-pencil-square'></i></a>";
                                        echo "<a title='Eliminar' onclick='Delete($idSolicitud)' class='waves-effect waves-light eliminar' data-id='$idSolicitud' data-toggle='modal' data-target='.modal_eliminar_solicitud'><i class='fa fa-times-circle'></i></a>";
                                       }

                                       if ($solicitudes->idEstadoSolicitud == 4)
                                       {
                                        echo "<a title='Eliminar' onclick='Delete($idSolicitud)' class='waves-effect waves-light eliminar' data-id='$idSolicitud' data-toggle='modal' data-target='.modal_eliminar_solicitud'><i class='fa fa-times-circle'></i></a>";
                                       }

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
<!-- Ventana Modal para ver datos de la solicitud-->
<!-- ============================================================== -->
<div class="modal fade" id="modal_ver_solicitud" role="dialog">
	<div class="modal-dialog modal-md">
	  	<div class="modal-content">
	        <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Datos de la solicitud</h4>
	        </div>
	        <div class="modal-body">
              <table class="table" id="DetalleSolicitud">
                  
              </table>
	        </div>
	        <div align="center">
	          <button type="submit" class="btn btn-warning waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Aprobar</button>
	          <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cancelar</button>
	        </div>
	  	</div>
	</div>
</div>
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana Modal para eliminar datos de la solicitud-->
<!-- ============================================================== -->
      <div class="modal fade modal_eliminar_solicitud" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <form name="frmeliminarcliente" action="<?= base_url();?>Solicitud/EliminarSolicitud/" id="frmeliminarcliente" method="GET">
                  <div>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="mySmallModalLabel">
                        <i class="fa fa-warning fa-lg text-danger"></i> 
                      </h4>
                  </div>
                  <div class="modal-body">
                    <input type="text" hidden id="Id" name='id'>
                    <p align="center">¿Está seguro de eliminar la solicitud?</p>
                  </div>
                  <div align="center">
                      <button type="submit" class="btn btn-danger block waves-effect waves-light m-b-5"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                      <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                  </div>
                  </form>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->

<script type="text/javascript">

  function actualizarPlazo(codigoSolicitud, estadoSolicitud, cliente, tipoPrestamo, fechaRegistro, capital, interes, iva, capitalPagar, cuotaDiaria, numeroCuotas, observaciones)
  {
    eliminaFilas();
    mes = '';
    if (tipoPrestamo == 1)
    {
      mes = 'mes';
    }
    else
    {
      mes = 'meses';
    }
    htmlInfo = '';
    htmlInfo = '<tbody>';
    htmlInfo += '<tr>';
    htmlInfo += '          <td colspan="2"><p><strong>Código: </strong>'+codigoSolicitud+'</p></td>';
    htmlInfo += '          <td colspan=""><p><strong>Estado: </strong>'+estadoSolicitud+'</p></td>';
    htmlInfo += '        </tr>';
    htmlInfo += '        <tr>';
    htmlInfo += '          <td colspan=""><p><strong>Cliente: </strong>'+cliente+'</p></td>';
    htmlInfo += '          <td colspan=""><p><strong>Tipo de préstamo: </strong>Popular a '+tipoPrestamo+ ' ' + mes +' </p></td>';
    htmlInfo += '          <td colspan=""><p><strong>Fecha Registro: </strong>'+fechaRegistro+'</p></td>';
    htmlInfo += '        </tr>';
    htmlInfo += '        <tr>';
    htmlInfo += '          <td colspan=""><p><strong>Capital: </strong>$'+capital+'</p></td>';
    htmlInfo += '          <td colspan=""><p><strong>Interes: </strong>'+interes+'</p></td>';
    htmlInfo += '          <td colspan=""><p><strong>IVA: </strong>$'+iva+'</p></td>';
    htmlInfo += '        </tr>';
    htmlInfo += '        <tr>';
    htmlInfo += '          <td colspan=""><p><strong>Total a pagar: </strong>$'+capitalPagar+'</p></td>';
    htmlInfo += '          <td colspan=""><p><strong>Cuota diaria: </strong>$'+cuotaDiaria+'</p></td>';
    htmlInfo += '          <td colspan=""><p><strong>Número de cuotas: </strong>'+numeroCuotas+'</p></td>';
    htmlInfo += '        </tr>';
    htmlInfo += '        <tr>';
    htmlInfo += '          <td colspan="3" class="text-center"><p><strong>Observaciones: </strong>'+observaciones+'</p></td>';
    htmlInfo += '        </tr> ';
    htmlInfo += '</tbody> ';
    $("#DetalleSolicitud").append(htmlInfo);
  }

  function eliminaFilas()
  {
    var trs=$("#DetalleSolicitud tr").length;
            if(trs>1)
            {
                // Eliminamos la ultima columna
                for (var i = 0; i < trs; i++)
                {
                  $("#DetalleSolicitud tr:last").remove();
                }
            }
  }

  function Delete(id){
      document.getElementById('Id').value=id;
    }

</script>