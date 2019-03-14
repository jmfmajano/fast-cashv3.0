
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
                    <h3 class="panel-title">Pago de crédito</h3>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <!-- Formulario del empleado  -->
              <form method="post"  autocomplete="off" id="FrmPagos">
                <div class="margn">
                  <!--CAMPOS OCULTOS-->
                  <?php 
                  foreach ($caja->result() as $caja) {
                    # code...
                  }
                  ?>
                  <input type="text" hidden name="idCajaChica" value="<?php echo $caja->idCajaChica?>">
                  <input type="text" hidden name="fechaCajaChica" value="<?= $caja->fechaCajaChica?>">
                  <input type="text" hidden name="cantidadApertura" value="<?= $caja->cantidadApertura?>">
                  <!--FIN DE LOS CAMPOS OCULTOS-->
                   <div id="infor">
                    <?php 
                      foreach ($creditos->result() as $pago) {
                      # code...
                      }
                    ?>
                      <div class="row">
                        <div class="col-md-12" align="right">
                          <a class="btn btn-inverse btn-custom waves-effect waves-light m-d-5 btn-xs" style="cursor: pointer; margin-top: -10px; font-family: Arial; position: absolute;" onclick="limpiar()"><i class="fa fa-refresh fa-lg"></i></a> 
                        </div>
                      </div>
                      <div class="marPago">
                      <div class="row">
                        <div class="col-md-12">
                          <input type="hidden" name="idCredito" value="<?= $pago->idCredito?>">
                          <input type="hidden" id="cliente" name="Cliente" value="<?php echo $pago->Nombre_Cliente." ".$pago->Apellido_Cliente?>">   
                          <span id="spanCliente" style="font-size: 1.8rem;"><?php echo $pago->Nombre_Cliente." ".$pago->Apellido_Cliente?></span>
                        </div>
                      </div>
                     <div class="marPago3">
                          <div class="row">
                              <div class="col-md-10">
                                <div class="row">
                                  <div class="col-md-6" style="font-size: 1.4rem;">
                                      <input type="hidden" id="capital" name="capital" value="<?= $pago->capital?>" >
                                      <label style="background: #F0F4C3; color: #000; padding: 5px; border-radius: 5px;">Capital del crédito: <span style="font-weight: normal;">$&nbsp;<span id="spanCapital"><?= $pago->capital?></span></span></label>
                                  </div> 
                                  <div class="col-md-6" style="font-size: 1.4rem;">
                                      <input type="hidden" id="totalAb" name="totalAb" value="<?= $pago->totalAbonado?>" >
                                      <label style="background: #E3F2FD; color: #000; padding: 5px; border-radius: 5px;">Capital abonado hasta la fecha: <span style="font-weight: normal;">$&nbsp;<span id="spanTotalAb"><?= $pago->totalAbonado?></span></label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2" align="right">
                                <a id="MasMenos" class="btn btn-primary btn-custom waves-effect waves-light m-d-5 btn-sm" style="cursor: pointer; margin-top: 1px; font-family: Arial;">VER MÁS</a>
                              </div>
                          </div>
                          <div id="MostrarMas" style="display:none;">
<!--                             <hr style="border-color: #EAEDED;">
 -->                            <div class="row">
                                <div class="col-md-6" style="font-size: 1.4rem;">
                                      <input type="hidden" id="fechaA" name="fechaA" value="<?= $pago->fechaPago?>" >
                                      <label style="background: #EAEDED; color: #000; padding: 5px; border-radius: 5px;">Fecha de apertura del crédito: <span id="spanFechaA" style="font-weight: normal;"><?= $pago->fechaPago?></span></label>
                                </div>
                                <div class="col-md-6" style="font-size: 1.4rem;">
                                      <input type="hidden" id="tasa" name="tasa" value="<?= $pago->tasaInteres?>" >
                                      <label style="background: #FCF3CF; color: #000; padding: 5px; border-radius: 5px;">Tasa de interes del crédito: <span style="font-weight: normal;">$&nbsp;<span id="spanTasa"><?= $pago->tasaInteres?></span></span></label>
                                </div>
                            </div>
<!--                             <hr style="border-color: #EAEDED;">
 -->                            <div class="row">
                                <div class="col-md-6" style="font-size: 1.4rem;">
                                        <input type="hidden" id="capitalPendiente1" name="capitalPendiente1" value="<?php echo $pago->capital-$pago->totalAbonado;?>">
                                        <label style="background: #F2D7D5; color: #000; padding: 5px; border-radius: 5px;">Capital pendiente: <span style="font-weight: normal;">$&nbsp;<span id="spanCapitalPendiente1"><?php echo $pago->capital-$pago->totalAbonado;?></span></span></label>
                                        <input type="hidden" name="pagoReal" id="pagoReal">
                                </div>
                                <div class="col-md-6" style="font-size: 1.4rem;">
                                        <input type="hidden" id="interesPendiente1" name="interesPendiente1" value="<?= $pago->i?>">
                                        <label style="background: #F2D7D5; color: #000;  padding: 5px; border-radius: 5px;">Interes pendiente: <span style="font-weight: normal;">$&nbsp;<span id="spanInteresPendiente"><?php echo $pago->i;?></span></span></label>
                                        
                                </div>
                            </div>
                          </div>
                      </div>
                      </div>
                    </div>
                    <div id="DivDatosPagos" class="marPago">
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
                                <input type="text" class="form-control" id="totalPago" name="totalPago" placeholder="Digitar pago" required data-parsley-required-message="Por favor, inserte el monto de dinero">
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
                                <b style="font-size: 1.5rem; color: #990000;">IVA: </b></label>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 13px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; color: #990000;">Interes: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 14px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; color: #990000;">Abono a capital: </b>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 14px;">
                              <div class="col-md-12" align="right">
                                <b style="font-size: 1.5rem; color: #990000;">Capital pendiente: </b>
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
                                  <label class="label label-default"style="background: #F2D7D5; color: #000; font-weight: normal;">$ <span id="spanInteresP">00.00</span></label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="vuelto" name="vuelto" >
                                  <label class="mostrLabel">Vuelto:&nbsp;</label>
                                  <label class="label label-default"style="background: #F0F4C3; color: #000; font-weight: normal;">$ <span id="spanVuelto">00.00</span></label>
                              </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                              <div class="col-md-12" style="font-size: 1.8rem; margin-bottom:10px;">
                                  <input type="hidden" id="totalAbonado" name="totalAbonado" >
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
$(document).on('ready', function(){
  //Ver mas informacion
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
/*
  $('#FrmPagos').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  });*/
  $('#btnPagar').on('click', function(){
     $.ajax({
                url:"<?= base_url()?>Pagos/InsertarPago",
                type:"POST",
                
                data:$('#basic-form').serialize(),
                success:function(respuesta){
                  alert('Pago insertado');

                }
              });
  })
    //FUNCION PARA CALCULAR LOS DIAS------------------------------
  $('#fechaPago').on('change', function(){
    if($('#fechaPago').val()!=""){
      var fechaIncicio = new Date($('#fechaA').val()).getTime();
      var fechaFin = new Date($('#fechaPago').val()).getTime();
      var dias = fechaFin - fechaIncicio;
      var diasp=Math.round(dias/(1000*60*60*24));
      $('#diasPagados').val(diasp);
      $('#spanDiasPagados').text(diasp);
    }
    else{
      //alert('entra al else');
      $('#diasPagados').val(00);
      $('#spanDiasPagados').text(00);
    }
    
    calculos();
  });//CIERRE DE LA FUNCION PARA CALCULAR LOS DIAS
  //FUNCION PARA HACER LOS DEMAS CALCULOS----------------------
  $('#totalPago').on('keyup', function(){
    calculos();
    
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
    if(totalp ==""){
      //alert('campo para pagos vacio')
       $('#iva').val(0);
        $('#interes').val(0);
        $('#abonoCapital').val(0);
        $('#capitalP').val(0);
        $('#totalAbonado').val(0);
    }
    else{
      if(diaspa==""){
        $('#iva').val(0);
        $('#interes').val(0);
        $('#abonoCapital').val(0);
        $('#capitalP').val(0);
        $('#totalAbonado').val(0);
      }
      else if($('#fechaPago').val()==""){
        $('#iva').val(0);
        $('#interes').val(0);
        $('#abonoCapital').val(0);
        $('#capitalP').val(0);
        $('#totalAbonado').val(0);
        $('#diasPagados').val("");
      }
      else{
         var tasaI = tasa/100;
        //var TasaInteresDiario= tasaI/30;
        //var totalInteres = TasaInteresDiario*(capitalPendiente)*diaspa;
        var Interes=(capitalPendiente*diaspa*tasaI)/30;
        var iva = Interes*0.13;
        //alert("Interes:"+Interes+" Iva: "+iva+"tasa: "+tasaI);
        var Interesp = parseFloat($('#interesPendiente1').val());
        var totalInteres = Interesp+Interes;

        var abonoCapital = totalp-totalInteres-iva;
        if(abonoCapital<0){
          abonoCapital=0;

          var newInteresPendiente = (Interesp+Interes+iva)-totalp;
          $('#spanInteresP').text(newInteresPendiente.toFixed(4));
          $('#interesP').val(newInteresPendiente.toFixed(4));

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
        $('#pagoReal').val(totalp);
        $('#vuelto').val(0);
        $('#spanVuelto').text(0);
       if(parseFloat($('#totalAbonado').val()) >= parseFloat($('#capital').val())){
          var abono = $('#totalAbonado').val();
          var vuelto;
          var capitalPend = $('#capitalPendiente1').val();
          vuelto = abonoCapital - capitalPend;
          var newAbonoCApital = abonoCapital-vuelto;
          var newCapitalPendiente=capitalPend - newAbonoCApital;
          var ab= $('#totalAb').val();
          var newTotalAbono= newAbonoCApital + parseFloat(ab); 
          $('#abonoCapital').val(newAbonoCApital);
          $('#spanAbonoCapital').text(newAbonoCApital);
          $('#vuelto').val(vuelto.toFixed(4));
          $('#spanVuelto').text(vuelto.toFixed(4));
          $('#capitalP').val(newCapitalPendiente);
          $('#spanCapitalP').text(newCapitalPendiente);
          $('#totalAbonado').val(newTotalAbono);
          $('#spanTotalAbonado').text(newTotalAbono);
          $('#pagoReal').val(parseFloat(newAbonoCApital)+parseFloat(Interes)+parseFloat(iva));
          swal("Mensaje de notificación!", "El credito seria saldado con este pago");
        }
      } 
      //alert('asas');
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
        $('#spanVuelto').text("00.00");
        $('#spanTotalAbonado').text("00.00");
    }
  
</script>

