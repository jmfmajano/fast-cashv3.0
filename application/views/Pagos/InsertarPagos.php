
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
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Creditos">Créditos</a></li>
            <li class="active">Pagos</li>
          </ol>
        </
      </div>
      <?php
      if (sizeof($caja->result())==0)
      {              
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="table-title">
                <div class="row">
                  <div class="col-md-5">
                    <h3 class="panel-title">Acción no permitida</h3>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="alert alert-danger">
                <h4>No se a realizado la apertura de caja o ya se hizo el cierre de caja, comuniquese con el administrador</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    else{
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="table-title">
                <div class="row">
                  <div class="col-md-5">
                    <h3 class="panel-title">Pago de créditos pulares</h3>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <!-- Formulario del empleado  -->
              <form method="post"  autocomplete="off" id="FrmPagos">
                <div style="padding-left: 38px; padding-right: 38px; border: 1px solid #D5DBDB; border-radius: 5px;">
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div style="border-left: 2px solid green; margin-right: 10px;">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="chValorFecha">&nbsp;Activar valor fecha: </label>
                            <div class="checkbox checkbox-success checkbox-inline">
                              <input type="checkbox" id="chValorFecha" align="right">
                              <label for="chValorFecha"></label>
                            </div>
                            <div class="mar_che_cobrarP" id="DivValorFecha" style="display:none;">
                              <div class="form-group">
                                <input type="text" class="form-control DateTime" id="inputValorFecha" name="fechaPago" placeholder="Digitar de fecha" data-mask="9999/99/99" required data-parsley-required-message="Por favor, seleccione una fecha">
                              </div>
                            </div> 
                          </div>
                        </div>
                      <p>&nbsp;<b>Indicaciones: </b>Para utilizar el valor fecha se debe activar antes de seleccionar un crédito.</p> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <!--CAMPOS OCULTOS-->
                  <?php 
                  foreach ($caja->result() as $caja) {
                  }
                  ?>                  
                  <input type="hidden" name="idCajaChica" value="<?php echo $caja->idCajaChica?>">
                  <input type="hidden" name="fechaCajaChica" value="<?= $caja->fechaCajaChica?>">
                  <input type="hidden" name="cantidadApertura" value="<?= $caja->cantidadApertura?>">
                  <input type="hidden" id="fechaProximoPago" name="fechaProximoPago">
                  <input type="hidden" name="identificador" value="1">
                  <input type="hidden" name="estadoFacturacion" value="1">
                  <!--FIN DE LOS CAMPOS OCULTOS-->
                    <div class="form-group col-sm-6">
                      <div style="margin-top: 7px;">
                        <label>Créditos</label>
                      <select id="idCredito" name="idCredito" class="select" data-placeholder="Seleccione un crédito">
                        <option value="">.::Seleccione un crédito::.</option>
                        <?php
                          foreach ($creditos->result() as $c) {
                            # code...
                            if($c->estadoCredito=='Proceso'){
                              echo '<option value="'.$c->idCredito.'">'.$c->Codigo_Cliente.' - '.$c->Nombre_Cliente.' '.$c->Apellido_Cliente.'
                                    </option>';
                            }
                          }
                        ?>
                      </select>
                    </div>
                    </div>                
                    <div class="col-sm-6 noneIMG" align="right">
                      <div style="padding-bottom: 7px; margin-top: -45px;">
                        <img src="<?= base_url()?>plantilla/images/tarjeta-de-credito.png" class="img-responsive img-thumbnail" alt="Pago" style="width: 70px;">
                      </div>
                    </div>                
                  </div>
                </div>
                <br>
                <div id="alertaSiEnMora" class="alert alert-danger" style="display: none;">
                  <b>AVISO: </b>El crédito de <span id="spanCliente1" style="text-transform: lowercase; font-weight: bold;"></span> esta en mora y los días a pagar son: <label class="label label-default"><span id="spanDiasMora1">00.00</span></label>
                </div>
                <div class="margn">
                  <div id="AlertNada" class="alert alert-info" role="alert">
                    <div class="row">
                      <div class="col-md-11">
                        <h4>Aviso!</h4> 
                      </div>
                      <div class="col-md-1" align="right">
                          <i class="fa fa-info-circle fa-lg"></i>
                      </div>
                    </div>
                    <hr>
                    <p>Por favor selecione un crédito al cual desea asignar el pago.</p>
                  </div>
                   <div id="infor" style="display:none;">
                      <div class="row">
                        <div class="col-md-12" align="right">
                          <a class="btn btn-inverse btn-custom waves-effect waves-light m-d-5 btn-xs" style="cursor: pointer; margin-top: -10px; font-family: Arial; position: absolute;" onclick="limpiar()"><i class="fa fa-refresh fa-lg"></i></a> 
                        </div>
                      </div>
                      <div class="marPago">
                      <div class="row">
                        <div class="col-md-12">
                          <input type="hidden" id="cliente"  name="Cliente">
                          <span id="spanCliente" style="font-size: 1.8rem;"></span>
                        </div>
                      </div>
                     <div class="marPago3">
                          <div class="row">
                              <div class="col-md-10">
                                <div class="row">
                                  <div class="col-md-6" style="font-size: 1.4rem;">
                                      <input type="hidden" id="capital"  name="capital">
                                      <label style="background: #F0F4C3; color: #000;  padding: 5px; border-radius: 5px;">Capital del crédito: <span style="font-weight: normal;">$&nbsp;<span id="spanCapital"></span></span></label>
                                  </div> 
                                  <div class="col-md-6" style="font-size: 1.4rem;">
                                      <input type="hidden" id="totalAb" name="totalAb">
                                      <label style="background: #E3F2FD; color: #000;  padding: 5px; border-radius: 5px;">Capital abonado hasta la fecha: <span style="font-weight: normal;">$&nbsp;<span id="spanTotalAb"></span></label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2" align="right">
                                <a id="MasMenos" class="btn btn-primary btn-custom waves-effect waves-light m-d-5 btn-sm" style="cursor: pointer; margin-top: 1px; font-family: Arial;">VER MÁS</a>
                              </div>
                          </div>
                          <div id="MostrarMas" style="display:none;">
                            <div class="row">
                                <div class="col-md-6" style="font-size: 1.4rem;">
                                      <input type="hidden" id="fechaA" name="fechaA">
                                      <label style="background: #EAEDED; color: #000;  padding: 5px; border-radius: 5px;">Última fecha del crédito: <span id="spanFechaA" style="font-weight: normal;"></span></label>
                                </div>
                                <div class="col-md-6" style="font-size: 1.4rem;">
                                        <input type="hidden" id="tasa" name="tasa">
                                        <label style="background: #FCF3CF; color: #000;  padding: 5px; border-radius: 5px;">Tasa de interes del crédito: <span style="font-weight: normal;"><span id="spanTasa"></span>%&nbsp;</span></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="font-size: 1.4rem;">
                                        <input type="hidden" id="capitalPendiente1" name="capitalPendiente1">
                                        <label style="background: #F2D7D5; color: #000;  padding: 5px; border-radius: 5px;">Capital pendiente: <span style="font-weight: normal;">$&nbsp;<span id="spanCapitalPendiente1"></span></span></label>
                                        <input type="text" hidden="true" name="pagoReal2" id="pagoReal2">
                                </div> 
                                <div class="col-md-6" style="font-size: 1.4rem;">
                                        <input type="hidden" id="interesPendiente1" name="interesPendiente1">
                                        <label style="background: #FFCCBC; color: #000;  padding: 5px; border-radius: 5px;">Interes pendiente: <span style="font-weight: normal;">$&nbsp;<span id="spanInteresPendiente"></span></span></label>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="font-size: 1.4rem;">
                                        <input type="hidden" id="fechaVencimiento" name="fechaVencimiento">
                                        <label style="background: #C5E1A5; color: #000;  padding: 5px; border-radius: 5px;">Fecha de vencimiento: <span style="font-weight: normal;">&nbsp;<span id="spanFechaVencimiento"></span></span></label>
                                </div> 
                            </div>
                          </div>
                      </div>
                      </div>
                    </div>
                    <div id="DivDatosPagos" class="marPago" style="display:none; ">
                      <div class="marPago3">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="Nombre_Cliente">Fecha de pago</label>
                                <input type="text" class="form-control DateTime" id="fechaPago" name="fechaPago" placeholder="Digitar de fecha" data-mask="9999/99/99" required data-parsley-required-message="Por favor, seleccione  una fecha de pago">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="Codigo_Cliente">Total pago</label>
                                <input type="text" class="form-control validaDigit" id="totalPago" name="totalPago" placeholder="Digitar pago" required data-parsley-required-message="Por favor, inserte el monto de dinero">
                              </div>
                            </div>
                          </div>
                      </div>
                      <br>
                      <div class="marPago2">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-6 rejiaLabel">
                            <div class="row" style="margin-top: 22px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem;">Días a cancelar: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; color: #660000;">IVA: </b></label>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 13px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; color: #660000;">Interes: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 14px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; color: #660000;">Abono a capital: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 14px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; color: #660000;">Capital pendiente: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 14px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem;">Nuevo interes pendiente: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 14px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem;">Vuelto: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 14px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; color: #660000;">Días en mora: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 14px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem;">Cobro por mora al 5%: </b>
                              </div>
                            </div>
                           
                            <div class="row" style="margin-top: 64px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; margin-top: 20px;">Total abonado: </b>
                              </div>
                            </div>
                          </div>
                          <!-- hHHHHHHHHH -->
                          <div class="col-md-6 col-sm-6 col-xs-6 marPago4">
                            <br>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="diasPagados" name="diasPagados" >
                                  <label class="mostrLabel">Días a cancelar:&nbsp;</label>
                                  <label class="label label-default" style="background: #E3F2FD; color: #000; font-weight: normal;"><span id="spanDiasPagados">00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="iva" name="iva">
                                  <label class="mostrLabel" style="color: #990000;">IVA:&nbsp;</label>
                                  <label class="label label-default"style="background: #EFEBE9; color: #000; font-weight: normal;">$ <span id="spanIva">00.00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="interes" name="interes">
                                  <label class="mostrLabel" style="color: #990000;">Interes:&nbsp;</label>
                                  <label class="label label-default"style="background: #FCF3CF; color: #000; font-weight: normal;">$ <span id="spanInteres">00.00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="abonoCapital" name="abonoCapital">
                                  <label class="mostrLabel" style="display: none; color: #990000;">Abono a capital:&nbsp;</label>
                                  <label class="label label-default"style="background: #CFD8DC; color: #000; font-weight: normal;">$ <span id="spanAbonoCapital">00.00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="capitalP" name="capitalPendiente" >
                                  <label class="mostrLabel" style="color: #990000;">Capital pendiente:&nbsp;</label>
                                  <label class="label label-default"style="background: #F2D7D5; color: #000; font-weight: normal;">$ <span id="spanCapitalP">00.00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="interesP" name="interesPendiente" >
                                  <label class="mostrLabel" style="color: #990000;">Nuevo interes pendiente:&nbsp;</label>
                                  <label class="label label-default"style="background: #FFFF99; color: #000; font-weight: normal;">$ <span id="spanInteresP">00.00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="vuelto" name="vuelto" >
                                  <label class="mostrLabel">Vuelto:&nbsp;</label>
                                  <label class="label label-default"style="background: #F0F4C3; color: #000; font-weight: normal;">$ <span id="spanVuelto">00.00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="diasMora" name="diasMora" >
                                  <label class="mostrLabel">Dias en mora:&nbsp;</label>
                                  <label class="label label-default" style="background: #FFCCBC; color: #000; font-weight: normal;"> <span id="spanDiasMora">00.00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="cobroMora" name="cobroMora" >
                                  <label class="mostrLabel">Cobro por mora al 5%:&nbsp;</label>
                                  <label class="label label-default" style="background: #CCFFCC; color: #000; font-weight: normal;">$ <span id="spanCobroMora">00.00</span></label>
                              </div>
                            </div>
                            
                            <div class="row" style="margin-top: 50px;">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="text" hidden="true" id="totalAbonado" name="totalAbonado" >

                                  <label class="mostrLabel">Total abonado:&nbsp;</label>
                                  <label class="label label-success" style="font-weight: normal; font-size: 1.6rem;">$ <span id="spanTotalAbonado">00.00</span></label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div align="right" style="margin-top: 10px;">
                        <span class="margBotones">
                           <a id="btnPagar" class="btn btn-info waves-effect waves-light m-d-5"><i class="fa fa-check fa-lg"></i> Pagar</a>

                          <a href="<?= base_url() ?>Creditos" class="btn btn-danger waves-effect waves-light m-d-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
                        </span>
                      </div>
                </div>
                </div>
              </form>
              <!-- Fin formulario Empleado -->
            </div>
          </div>
        </div>
      </div> <!-- End Row -->
    </div>
  </div>
</div>
<?php
}
?>
<script type="text/javascript"> 
  //Ver mas informacion
    var plazoMeses;
    var output;
$(document).on('ready', function(){

  $('#chValorFecha').on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        document.getElementById('DivValorFecha').style.display='block';
        $("#idCredito").prop('disabled', true);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        document.getElementById('DivValorFecha').style.display='none';
        $("#idCredito").prop('disabled', false);
        $("#inputValorFecha").val("");
    }
});

  $('#MasMenos').toggle( 
      function(e){ 
          $('#MostrarMas').slideDown();
          $(this).text('VER MENOS');
          e.preventDefault();
      }, 
      function(e){ 
          $('#MostrarMas').slideUp();
          $(this).text('VER MÁS');
          e.preventDefault();
      }
  );
  //Fin ver mas informacion

$(document).ready(function(){
  $('#inputValorFecha').change(function(){
    if ($("#inputValorFecha").val() != "") {
      $("#idCredito").prop('disabled', false);
      // alert("FALSE");
    }
  });
});

  $('#btnPagar').on('click', function(){

    if($("#chValorFecha").is(':checked') ){
      if ($("#inputValorFecha").val() != "") {
        // alert("ALGO");
      } else {
        $(document).ready(function(){
          $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Todos los campos son requeridos.');
        });
        return false;
      }
    } 

  fechaPago = $("#fechaPago").val();
  totalPago = $("#totalPago").val();

  if (fechaPago != "" && totalPago != "")
  {
  $('#FrmPagos').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  });
     $.ajax({
                url:"<?= base_url()?>Pagos/InsertarPago",
                type:"POST",
                
                data:$('#FrmPagos').serialize(),
                success:function(respuesta){
                  swal({   
                      imageUrl: "<?= base_url()?>plantilla/images/loading.gif", 
                      title: "Pago realizado con exito!",   
                      text: "A continuacion se imprimira el comprobante de pago",   
                      timer: 6099,   
                      showConfirmButton: false 
                  });
                  // alert('Pago realizado con exito, se imprimira el comprobante de pago');
                  setTimeout(function(){

                  var cliente = $('select[name="idCredito"] option:selected').text();
                  arregloNombre = cliente.split(" - ");

                  var HTML ="<div style='position: relative; '><img src='<?= base_url() ?>plantilla/images/fc_logoR.png' style='position: absolute; background-size: 100% 100%; filter:alpha(opacity=25); filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.5); opacity:.25; left:100px; top: -10px;'></div>";

                    HTML+="<img src='<?= base_url()?>plantilla/images/fast_cash.png'  width='100'><div class='row text-center'><h1>FAST CASH</h1><p> GOCAJAA GROUP, S.A.DE C.V.</p><p>Comprobante de pago</p></div>";
                    HTML+= '<table  class="table table-bordered">';
                      HTML+= '<tr class="tr tr1">';
                        HTML+= '<td><strong>Cliente</strong> </td>';
                       HTML+= ' <td>'+arregloNombre[1]+'</td>';
                      HTML+= '</tr>';
                      HTML+= '<tr class="tr tr1">';
                        HTML+= '<td><strong>Por</strong> </td>';
                        HTML+= '<td> $'+$('#totalPago').val()+'</td>';
                      HTML+= '</tr>';
                      HTML+= '<tr class="tr tr1">';
                        HTML+= '<td><strong>Abono capital</strong> </td>';
                        HTML+= '<td> $'+$('#abonoCapital').val();+'</td>';
                      HTML+= '</tr>';
                      HTML+= '<tr class="tr tr1">';
                        HTML+= '<td><strong>Intereses</strong> </td>';
                       HTML+= '<td> $'+$('#interes').val() +'</td>';
                      HTML+= '</tr>';
                      HTML+= '<tr class="tr tr1">';
                       HTML+= '<td><strong>Iva</strong> </td>';
                        HTML+= '<td> $'+$('#iva').val() +'</td>';
                      HTML+= '</tr>';
                      HTML+= '<tr class="tr tr1">';
                       HTML+= '<td><strong>Capital pendiente</strong> </td>';
                        HTML+= '<td> $'+$('#capitalP').val()+'</td>';
                      HTML+= '</tr>';
                      HTML+= '<tr class="tr tr1">';
                       HTML+= '<td colspan="2" style="font-size:12px;" align="center"><strong>CON SU ESFUERZO Y NUESTRO APOYO PROSPERARÁ SU NEGOCIO</strong> </td>';
                      HTML+= '</tr>';
                    HTML+= '</table>';
                    var pantalla=window.open(' ','popimpr');
                    pantalla.document.write('<link href="<?= base_url() ?>plantilla/css/bootstrap.min.css" rel="stylesheet" />');
                  pantalla.document.write(HTML+"<p>Contabilidad</p><br>"+HTML+"<p>Cliente</p>");
                  pantalla.document.close();
                  self.location ="<?= base_url()?>Pagos";
                  //pantalla.print();
                  //pantalla.close();

        //pantalla.document.write(elemento.innerHTML);
     // pantalla.document.write('</body></html>');
      //pantalla.document.close();
      pantalla.focus();
      pantalla.onload = function() {
        pantalla.print();
        pantalla.close();
      };
      }, 6000);
                }
              });
   }else{
    $(document).ready(function(){
    $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Todos los campos son requeridos.');
    });
  } 
  })
  //Fucion Change del select donde estan los datos de los clientes aqui vamos a cargar los datos que necesitemos------------
  $('#idCredito').on('change', function(){

    //alert('id'+$('#idCredito').val());
    ide = $('#idCredito').val();
    if(ide == ""){
     $('#AlertNada').show('slow/1000/slow');
     $('#infor').hide('slow/1000/slow');
     $('#DivDatosPagos').hide('slow/1000/slow');
    }
    else{
    //cargar el ultimo pago si lo hay si no carga los datos del credito directamente
    $.ajax({
      url:"<?= base_url()?>Pagos/CargarUltimoPago",
      type:"GET",
      data:{Id:ide},
      success:function(respuesta){
        var registro = eval(respuesta);
       // alert('aaaaa');
        if (registro.length > 0)
        {
          //alert('funciona');
          for (var i =0 ; i<registro.length ; i++){
             $('#cliente').val(registro[i]['Nombre_Cliente']+" "+registro[i]['Apellido_Cliente']);
             $('#spanCliente').text(registro[i]['Nombre_Cliente']+" "+registro[i]['Apellido_Cliente']);
             $('#spanCliente1').text(registro[i]['Nombre_Cliente']+" "+registro[i]['Apellido_Cliente']);
             $('#capital').val(registro[i]['capital']);
             $('#spanCapital').text(registro[i]['capital']);
             $('#tasa').val(registro[i]['tasaInteres']);
             $('#spanTasa').text(registro[i]['tasaInteres']);
             $('#fechaA').val(registro[i]['fechaPago']);
             $('#spanFechaA').text(registro[i]['fechaPago']);
             $('#totalAb').val(registro[i]['totalAbonado']);
             $('#spanTotalAb').text(registro[i]['totalAbonado']);
             var cpendiente = registro[i]['capital']-registro[i]['totalAbonado'];
             $('#capitalPendiente1').val(cpendiente);
             $('#spanCapitalPendiente1').text(cpendiente);
              $('#AlertNada').hide('fast/1000');
              $('#infor').show('fast/1000');
              $('#DivDatosPagos').show('fast/1000');
              $('#spanInteresPendiente').text(registro[i]['i']);
              $('#interesPendiente1').val(registro[i]['i']);
              $('#spanFechaVencimiento').text(registro[i]['fechaVencimiento']);
              $('#fechaVencimiento').val(registro[i]['fechaVencimiento']);
              plazoMeses =registro[i]['plazoMeses'];
              // alert('fecha de vencimiento'+$('#fechaVencimiento').val());
              if( $('#chValorFecha').prop('checked') ) {
                output = $('#inputValorFecha').val();
              }
              else{
                //alert('NO Seleccionado');
                //SACANDO LA FECHA ACTUAL.
                //FECHA ACTUAL SE ALMACENA EN LA VARIABLE output
                var d1 = new Date();
                var month = d1.getMonth()+1;
                var day = d1.getDate();
                output = d1.getFullYear() + '-' +
                  (month<10 ? '0' : '') + month + '-' +
                  (day<10 ? '0' : '') + day;
              } 
              // alert(output);
              if(Date.parse(output)<Date.parse($('#fechaVencimiento').val())){
                // alert('el credito no esta en mora');
                $('#alertaSiEnMora').hide('fast/1000');
              }
              else{
                // alert('el credito esta en mora');
                $('#alertaSiEnMora').show('fast/1000');
                //sacando los dias que hay en mora
                var fechaIncicio = new Date($('#fechaVencimiento').val()).getTime();
                var fechaFin = new Date(output).getTime();
                var dias = fechaFin - fechaIncicio;
                var diasMora=Math.round(dias/(1000*60*60*24));
                // alert('dias a pagar de mora'+diasMora);
                $('#diasMora').val(diasMora);
                $('#spanDiasMora').text(diasMora);
                $('#spanDiasMora1').text(diasMora);
                calcularMora();
              }
              //alert(plazoMeses);
          }
        }
        else{
          //cargar datos del credito en lugar de los pagos
          $.ajax({
            url:"<?= base_url()?>Pagos/CargarDetallePago",
            type:"GET",
            data:{Id:ide},
            success:function(respuesta){
              var registro = eval(respuesta);
              if (registro.length > 0)
              {
               // alert('funciona');
                for (var i =0 ; i<registro.length ; i++){
                  $('#cliente').val(registro[i]['Nombre_Cliente']+" "+registro[i]['Apellido_Cliente']);
                  $('#spanCliente').text(registro[i]['Nombre_Cliente']+" "+registro[i]['Apellido_Cliente']);
                  $('#spanCliente1').text(registro[i]['Nombre_Cliente']+" "+registro[i]['Apellido_Cliente']);
                  $('#capital').val(registro[i]['capital']);
                  $('#spanCapital').text(registro[i]['capital']);
                  $('#tasa').val(registro[i]['tasaInteres']);
                  $('#spanTasa').text(registro[i]['tasaInteres']);
                  $('#fechaA').val(registro[i]['fechaApertura']);
                  $('#spanFechaA').text(registro[i]['fechaApertura']);
                  $('#totalAb').val(registro[i]['totalAbonado']);
                  $('#spanTotalAb').text(registro[i]['totalAbonado']);
                  var cpendiente = registro[i]['capital']-registro[i]['totalAbonado'];
                  $('#capitalPendiente1').val(cpendiente);
                  $('#spanCapitalPendiente1').text(cpendiente);
                  $('#AlertNada').hide('fast/1000');
                  $('#infor').show('fast/1000');
                  $('#DivDatosPagos').show('fast/1000');
                  $('#spanInteresPendiente').text(registro[i]['interesPendiente']);
                  $('#interesPendiente1').val(registro[i]['interesPendiente']);
                  $('#spanFechaVencimiento').text(registro[i]['fechaVencimiento']);
                  $('#fechaVencimiento').val(registro[i]['fechaVencimiento']);
                  plazoMeses =registro[i]['plazoMeses'];
                  // alert('fecha de vencimiento'+$('#fechaVencimiento').val());
                  if( $('#chValorFecha').prop('checked') ) {
                    output = $('#inputValorFecha').val();
                  }
                  else{
                    //alert('NO Seleccionado');
                    //SACANDO LA FECHA ACTUAL.
                    //FECHA ACTUAL SE ALMACENA EN LA VARIABLE output
                    var d1 = new Date();
                    var month = d1.getMonth()+1;
                    var day = d1.getDate();
                    output = d1.getFullYear() + '-' +
                      (month<10 ? '0' : '') + month + '-' +
                      (day<10 ? '0' : '') + day;
                  } 
                  // alert(output);
                  if(Date.parse(output)<Date.parse($('#fechaVencimiento').val())){
                    // alert('el credito no esta en mora'); 
                    $('#alertaSiEnMora').hide('fast/1000');
                  }
                  else{
                    // alert('el credito esta en mora');
                    $('#alertaSiEnMora').show('fast/1000');
                    //sacando los dias que hay en mora
                    var fechaIncicio = new Date($('#fechaVencimiento').val()).getTime();
                    var fechaFin = new Date(output).getTime();
                    var dias = fechaFin - fechaIncicio;
                    var diasMora=Math.round(dias/(1000*60*60*24));
                    // alert('dias a pagar de mora'+diasMora);
                    $('#diasMora').val(diasMora);
                    $('#spanDiasMora').text(diasMora);
                    $('#spanDiasMora1').text(diasMora);
                    calcularMora();

                  }

                  
                    //alert(plazoMeses);
                }//fin del for
            }//fin del if
          }//fin de success
          });//fin de la funcion si no hay un pago todavia del credito
        }//fin del else
      }//cierre succes
    }); //cierre de ajax
  }
  });//cierre de la funcion change
  //FUNCION PARA CALCULAR LOS DIAS------------------------------
  $('#fechaPago').on('change', function(){
    //alert($('#fechaA').val());
    //var fechaFin = new Date('2018-11-13').getTime();
    //alert(fechaFin);
    if($('#fechaPago').val()!=""){
      if(Date.parse($('#fechaPago').val())<Date.parse($('#fechaA').val())){
        $(document).ready(function(){
        $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'La fecha de pago debe de ser mayor que la ultima fecha de pago.');
        });
      }
      else{
        var fechaIncicio = new Date($('#fechaA').val()).getTime();
        var fechaFin = new Date($('#fechaPago').val()).getTime();
        var dias = fechaFin - fechaIncicio;
        var diasp=Math.round(dias/(1000*60*60*24));
        $('#diasPagados').val(diasp);
        $('#spanDiasPagados').text(diasp);
        //alert('dias pagados');
        //$('#diasPagados').val(00);
        //$('#spanDiasPagados').text(00);
      } 
    }
    else{
      //alert('entra al else');
      $('#diasPagados').val(00);
      $('#spanDiasPagados').text(00);
    }
    
    calculos();
    calcularMora();
  });//CIERRE DE LA FUNCION PARA CALCULAR LOS DIAS
  //FUNCION PARA HACER LOS DEMAS CALCULOS----------------------
  $('#totalPago').on('keyup', function(){
    calculos();
    calcularMora();
    
  })
});//cierre de la funcion principal

//funcion general para realizar todos los calculos

function calculos(){
    var capitalPendiente = $('#capitalPendiente1').val();
    //alert(capitalPendiente);
    var totalp = $('#totalPago').val();
    var diaspa = $('#diasPagados').val();
    var tasa = $('#tasa').val();
    var capitalpendiente1 = $('#capitalPendiente1').val();
    var recargoMora = $('#cobroMora').val();
    if(totalp ==""){
      //alert('campo para pagos vacio')
       $('#iva').val(0);
        $('#interes').val(0);
        $('#abonoCapital').val(0);
        $('#capitalP').val(0);
        $('#totalAbonado').val(0);
        $('#interesP').val(0);
        //Haciendo cero los span
        $('#spanInteres').text(0.00);
        $('#spanInteresP').text(0.00);
        $('#spanIva').text(0.00);
        $('#spanAbonoCapital').text(0.00);
        $('#spanCapitalP').text(0.00);

    }
    else{
      if(diaspa==""){
        $('#iva').val(0);
        $('#interes').val(0);
        $('#abonoCapital').val(0);
        $('#capitalP').val(0);
        $('#totalAbonado').val(0);
        $('#interesP').val(0);
        //haciendo cero los span
        $('#spanInteresP').text(0);
        $('#spanInteres').text(0.00);
        $('#spanInteresP').text(0.00);
        $('#spanIva').text(0.00);
        $('#spanAbonoCapital').text(0.00);
        $('#spanCapitalP').text(0.00);
      }
      else if($('#fechaPago').val()==""){
        $('#iva').val(0);
        $('#interes').val(0);
        $('#abonoCapital').val(0);
        $('#capitalP').val(0);
        $('#totalAbonado').val(0);
        $('#diasPagados').val("");
        $('#spanInteresP').text(0);
        $('#interesP').val(0);
        //haciendo cero los span
        $('#spanInteresP').text(0);
        $('#spanInteres').text(0.00);
        $('#spanInteresP').text(0.00);
        $('#spanIva').text(0.00);
        $('#spanAbonoCapital').text(0.00);
        $('#spanCapitalP').text(0.00);
      }
      else{
         var tasaI = tasa/100;
         console.log("tasa en decimales"+tasaI);

        var Interes=(capitalPendiente*diaspa*tasaI)/(30*plazoMeses);
        console.log("INteres"+Interes);
        var iva = Interes*0.13;

        var Interesp = parseFloat($('#interesPendiente1').val());
        var totalInteres = Interesp+Interes;

        var abonoCapital = totalp-totalInteres-iva-recargoMora;

        if(abonoCapital<0){
          abonoCapital=0;
          var newInteresPendiente = (Interesp+Interes+iva)-totalp;
          $('#spanInteresP').text(newInteresPendiente.toFixed(4));
          $('#interesP').val(newInteresPendiente.toFixed(4));

        }
        else{
          $('#interesP').val(0);
          $('#spanInteresP').text(0);

        }
        $('#iva').val(iva.toFixed(4));
        $('#spanIva').text(iva.toFixed(4));
        $('#interes').val(Interes.toFixed(4));
        $('#spanInteres').text(Interes.toFixed(4));
        $('#abonoCapital').val(abonoCapital.toFixed(4));
        $('#spanAbonoCapital').text(abonoCapital.toFixed(4));
        var capitalPen = capitalPendiente - abonoCapital;
        //alert(capitalPen);
        $('#capitalP').val(capitalPen.toFixed(4));
        $('#spanCapitalP').text(capitalPen.toFixed(4));
        var ta=$('#totalAb').val();
        //alert(ta);
        var newAbono = abonoCapital+parseFloat(ta);
        $('#totalAbonado').val(newAbono.toFixed(4));
        $('#spanTotalAbonado').text(newAbono.toFixed(4));
        $('#pagoReal2').val(totalp);
        $('#vuelto').val(0);
        $('#spanVuelto').text(0);
       if(parseFloat($('#totalAbonado').val()) >= parseFloat($('#capital').val())){
          var abono = $('#totalAbonado').val();
          var vuelto;
          var capitalPend = $('#capitalPendiente1').val();
          vuelto = abonoCapital.toFixed(4) - capitalPend;
          var newAbonoCApital = abonoCapital-vuelto;
          var newCapitalPendiente=capitalPend - newAbonoCApital;
          var ab= $('#totalAb').val();
          var newTotalAbono= newAbonoCApital + parseFloat(ab); 
          $('#abonoCapital').val(newAbonoCApital.toFixed(4));
          $('#spanAbonoCapital').text(newAbonoCApital.toFixed(4));
          $('#vuelto').val(vuelto.toFixed(4));
          $('#spanVuelto').text(vuelto.toFixed(4));
          $('#capitalP').val(newCapitalPendiente.toFixed(4));
          $('#spanCapitalP').text(newCapitalPendiente.toFixed(4));
          $('#totalAbonado').val(newTotalAbono.toFixed(4));
          $('#spanTotalAbonado').text(newTotalAbono.toFixed(4));
          $('#pagoReal2').val(parseFloat(newAbonoCApital.toFixed(4))+parseFloat(Interes.toFixed(4))+parseFloat(iva.toFixed(4)));
          swal("Mensaje de notificación!", "El credito seria saldado con este pago");
        }
      } 
      //alert('asas');
    }
}

function calcularMora(){
  var capitalPendiente = $('#capitalPendiente1').val();
  //alert(capitalPendiente);
  var totalp = $('#totalPago').val();
  var diaspa = $('#diasPagados').val();
  var diasMora2= $('#diasMora').val();
  var tasa = $('#tasa').val();
  if(diaspa!=0 && diasMora2!=0){
    //alert('cobramos mora');
    var capitalpendiente1 = $('#capitalPendiente1').val();
    var tasaI = tasa/100;
    var dias = diaspa - diasMora2;
    //alert('los dias de intereses son> '+dias);
    var Interes=(capitalPendiente*dias*tasaI)/(30*plazoMeses);
    var iva = Interes*0.13;
    //alert('INtereses: '+Interes);
    var sumatoria = parseFloat(capitalPendiente)+parseFloat(Interes)+parseFloat(iva);
    //alert('sumatoria'+sumatoria);
    var mora = sumatoria * 0.05 * diasMora2;
    var moraTotal = parseFloat(sumatoria)+parseFloat(mora);
    //alert('recargo por mora: '+mora+' total a pagar '+moraTotal);
    $('#cobroMora').val(mora.toFixed(4));
    $('#spanCobroMora').text(mora.toFixed(4));
    $('#diasPagados').val(dias);
    $('#spanDiasPagados').text(dias);
  }
  else{
    //alert('No cobramos mora');
  }   
}

function limpiar(){
        $('#idCredito').val("");
        $('#fechaPago').val("");
        $('#totalPago').val("");
        $('#spanDiasPagados').text("00");
        $('#spanIva').text("00.00");
        $('#spanInteres').text("00.00");
        $('#spanAbonoCapital').text("00.00");
        $('#spanCapitalP').text("00.00");
        $('#spanInteresP').text("00.00");
        $('#spanVuelto').text("00.00");
        $('#spanCobroMora').text("00.00");
        $('#spanTotalAbonado').text("00.00");
    }
</script>