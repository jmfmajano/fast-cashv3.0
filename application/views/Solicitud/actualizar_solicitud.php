<!-- contenedor -->
<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Solicitud/">Registro de solicitudes</a></li>
            <li class="active">Gestión de Solicitud de prestamo</li>
          </ol>
        </div>
      </div>
      <?php
        foreach ($datos->result() as $solicitud)
        {}
      ?>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="table-title">
                <div class="row">
                  <div class="col-md-5">
                    <h3 class="panel-title">Actualizar Solicitud de prestamo</h3>                   
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <form method="post" action="<?= base_url() ?>Solicitud/ActualizarSolicitud/<?= $solicitud->idSolicitud ?>" autocomplete="off" id="formNuevaSolicitud">
                <div class="margn">
                <!-- Primera Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-2">
                            <label for="">Número de solicitud</label>
                            <input type="text" class="form-control" id="numero_solicitud" name="numero_solicitud" value="<?= $solicitud->codigoSolicitud  ?>">
                      </div>
                      <div class="form-group col-md-8">
                      </div>
                      <div class="form-group col-md-2" align="center">
                        <div class="mar_che_cobrar">
                            <label for="cobra_mora">Cobrar mora</label><br>
                            <div class="checkbox checkbox-success checkbox-inline">
                              <?php if($solicitud->cobraMora == 1){
                                echo '<input type="checkbox" value="" id="cobra_moraC"  checked="true">';
                                }else{
                                echo '<input type="checkbox" value="" id="cobra_moraC" >';
                                 } ?>
                                <label for="cobra_mora">Cobrar</label>
                                
                            </div>

                        </div>  
                        <input type="hidden" id="cobra_mora" name="cobra_mora" value="<?= $solicitud->cobraMora?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                      <label for="nombre_cliente">Cliente</label>
                        <div class="">
                          <input type="text" class="form-control" id="nombre_cliente" name="" value="<?= $solicitud->Nombre_Cliente.' '.$solicitud->Apellido_Cliente ?>">
                        </div>
                      </div>
<!--                     </div>                    
                    <div class="row"> -->

                      <div class="form-group col-md-6">
                            <label for="tipo_prestamo">Linea</label>
                              <select id="tipo_prestamo" name="tipo_prestamo" class="select" data-placeholder="Seleccione una linea">
                                <option class="alert-danger" value="<?= $solicitud->id_plazo ?> ">Popular hasta <?= $solicitud->tiempo_plazo ?> meses</option>
                                <?php 
                                    foreach ($plazos->result() as $plazos)
                                    {
                                      if ($plazos->tiempo_plazo ==1)
                                      {
                                        echo '<option value="'.$plazos->id_plazo.'">Populares hasta '.$plazos->tiempo_plazo.' mes</option>';
                                      }
                                      else
                                      {
                                ?>
                                <option value="<?= $plazos->id_plazo ?>">Populares hasta <?= $plazos->tiempo_plazo ?> meses</option>
                                <?php }} ?>
                              </select>
                            <input type="hidden" class="form-control" id="numero_meses" name="numero_meses">
                      </div>
                    </div>
                    <!-- Fin de la primera Linea del formulario-->

                    <!-- Segunda Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-4">
                            <label for="fecha_recibido">Fecha Recibida</label>
                            <input type="text" class="form-control DateTime" id="fecha_recibido" name="fecha_recibido" value="<?= $solicitud->fechaRecibido ?>" data-mask="9999/99/99">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="">Tasa de interes</label>
                            <input type="text" value="10" class="form-control validaDigit" id="tasa_interes" name="tasa_interes" value="<?= $solicitud->tasaInteres ?>" placeholder="Tasa de interes del prestamo">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="monto_dinero">Monto de dinero</label>
                            <input type="text" class="form-control validaDigit" id="monto_dinero" name="monto_dinero" value="<?= $solicitud->capital ?>" placeholder="Monto de dinero">
                      </div>
                    </div>
                    <!-- Fin de la segunda Linea del formulario-->

                     <!-- Tercera Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-3">
                            <label for="">IVA a pagar</label>
                            <input type="text" class="form-control validaDigit" id="iva_pagar" name="iva_pagar" value="<?= $solicitud->totalIva ?>">
                      </div>
                      <div class="form-group col-md-3">
                            <label for="">Intereses a pagar</label>
                            <input type="text" class="form-control validaDigit" id="intereses_pagar" name="intereses_pagar" value="<?= $solicitud->totalInteres ?>">
                      </div>
                      <div class="form-group col-md-3">
                            <label for="">Cuota diaria</label>
                            <input type="text" class="form-control validaDigit" id="cuota_diaria" name="cuota_diaria" value="<?= $solicitud->pagoCuota ?>">
                      </div>
                      <div class="form-group col-md-3">
                            <label for="">Total a pagar</label>
                            <input type="text" class="form-control validaDigit" id="total_pagar" name="total_pagar" value="<?= $solicitud->ivaInteresCapital ?>">
                      </div>
                    </div>
                    <!-- Fin de la tercera Linea del formulario-->

                    <!-- Cuarta Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-12">
                            <label for="observaciones">Observaciones</label>
                            <textarea class="form-control resize" rows="3" id="observaciones" name="observaciones"><?= $solicitud->observaciones ?></textarea>
                      </div>
                    </div>
                    <!-- Fin de la cuarta Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-12">
                            <!-- <label for="">Id Cliente(Este ira oculto, utual es solo para muestra)</label> -->
                            <input type="hidden" value="<?= $solicitud->idSolicitud?>" class="form-control" id="id_solicitud" name="id_solicitud" value="">
                            <input type="hidden" value="<?= $solicitud->cantidadCuota ?>" class="form-control" id="numero_cuotas" name="numero_cuotas" value="">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-warning waves-effect waves-light m-d-5"><i class="fa fa-save fa-lg"></i> Actualizar </button>
                     <a href="<?= base_url() ?>Solicitud" class="btn btn-default waves-effect waves-light m-d-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
               </div>
              </form>
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

<script type="text/javascript">
  $(document).on("ready", main);
  function main()
  {
    $("#numero_solicitud").prop('readonly', true);
    $("#nombre_cliente").prop('readonly', true);
    $("#tasa_interes").prop('readonly', true);
    $("#monto_dinero").prop('readonly', true);
    $("#iva_pagar").prop('readonly', true);
    $("#intereses_pagar").prop('readonly', true);
    $("#cuota_diaria").prop('readonly', true);
    $("#total_pagar").prop('readonly', true);
   // $("#monto_dinero").prop('readonly', true);
    $("#tipo_prestamo").on('change', activarIP);
    $("#monto_dinero").on('change', calcularIntereses);
    $("#tasa_interes").on('change', calcularIntereses);
    $("#cobra_moraC").on('change', mora);
  }

// Funcion para calcular Intereses, IVA y toal a pagar, Funcion nueva esta en proceso aun

function mora()
{
  
 var mora;
  if( $('#cobra_moraC').prop('checked') )
  {
    mora = 1;
    //alert('mora');
   
  }
  else
  {
    mora = 0;
     //alert('mora');
  }
  $("#cobra_mora").attr("value", mora);
}

// Funcion para desbloquear cajas de text para ingresar interes y monto de dinero
function activarIP()
{
  $("#tasa_interes").removeAttr("readonly");
  $("#monto_dinero").removeAttr("readonly");

  //Capturando valor del select para sacar el numero de meses
  separador = " ";
  indice = document.getElementById('tipo_prestamo').selectedIndex;
  if (indice != "")
  {
    cadena = document.getElementById('tipo_prestamo').options[indice].text;
    //cadena = document.getElementById('tipo_prestamo').options[document.getElementById('tipo_prestamo').selectedIndex].text;
    datos = cadena.split(separador);

    meses = datos[2]; // numero de meses
  }
  else
  {
    meses = "";
  }

    $("#numero_meses").attr("value", meses);

    calcularIntereses()
}
function calcularIntereses()
{
  mesesD = $("#numero_meses").val();
  tipoPrestamo = $("#tipo_prestamo").val();
  tasaInteres = (parseFloat($("#tasa_interes").val()) / 100) * mesesD;
  montoDinero = $("#monto_dinero").val();

  numeroDePagos = (tipoPrestamo*30) - (tipoPrestamo*4);

  totalInteresesAPagar = montoDinero * tasaInteres;
  totalIvaAPagar = totalInteresesAPagar * 0.13;
  totalAPagar = parseFloat(totalIvaAPagar) + parseFloat(totalInteresesAPagar) + parseFloat(montoDinero);
  cuotaDiaria = totalAPagar.toFixed(4)/numeroDePagos.toFixed();

  // Probando calculos
  

  //totalPagoConCuotas = cuotaDiaria.toFixed(2)*26;
  totalPagoConCuotas = cuotaDiaria*26;
  //$("#totalP").attr("value", totalAPagar.toFixed(2)); // Total a pagar multiplicando el numero de cuotas por el monto diario a pagar
  //$("#totalPP").attr("value", totalPagoConCuotas.toFixed(2)); // Valor real a pagar 
  //faltante
  //faltante = totalAPagar.toFixed(2) - totalPagoConCuotas.toFixed(2);
  //$("#ajusteP").attr("value", faltante.toFixed(2));

  $("#cuota_diaria").attr("value",  cuotaDiaria.toFixed(4));
  $("#iva_pagar").attr("value", totalIvaAPagar.toFixed(4));
  $("#intereses_pagar").attr("value", totalInteresesAPagar.toFixed(4));
  $("#total_pagar").attr("value", totalAPagar.toFixed(4));
  $("#numero_cuotas").attr("value", numeroDePagos);

}

//Redondeo a dos decimales
function redondeo2decimales(numero)
{
  var flotante = parseFloat(numero);
  var resultado = Math.round(flotante*100)/100;
  return resultado;
}


</script>