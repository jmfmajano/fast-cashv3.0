<style>
  a{
    cursor: pointer;
  }
</style>
<?php if($this->session->flashdata("errorr")):?>
  <script type="text/javascript">
    $(document).ready(function(){
    $.Notification.autoHideNotify('error', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("errorr")?>');
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
            <li><a href="<?= base_url() ?>Solicitud/">Registro de solicitudes</a></li>
            <li class="active">Gestión de Solicitud de prestamo</li>
          </ol>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="table-title">
                <div class="row">
                  <div class="col-md-12">

                    <?php 
                        $encabezado = '<h3 class="panel-title">Solicitud de prestamo ';
                      if ($tipoSolicitud == 1)
                      {
                        $encabezado .= 'crédito popular</h3>';
                      }
                      if ($tipoSolicitud == 2)
                      {
                        $encabezado .= 'crédito personal</h3>';
                      }
                        echo $encabezado;
                    ?>                
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <form id="formNuevaSolicitud" method="post" action="<?= base_url() ?>Solicitud/GuardarSolicitud" autocomplete="off">
                <div class="margn">
                <?php 
                  if ($tipoSolicitud == 1)
                    {
                      echo '<input type="hidden" id="tipoCredito" value="Crédito popular" name="tipoCredito">';
                    }
                  if ($tipoSolicitud == 2)
                    {
                      echo '<input type="hidden" id="tipoCredito" value="Crédito personal" name="tipoCredito">';
                    }
                ?>
                <!-- Primera Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-2">
                            <label for="">Número de solicitud</label>
                            <input type="text" class="form-control" id="" name="numero_solicitud" placeholder="Numero de la solicitud" required data-parsley-required-message="Por favor, ingresa un codigo">
                      </div>
                      <div class="form-group col-md-8">
                      </div>
                      <div class="form-group col-md-2" align="center">
                        <div class="mar_che_cobrar">
                            <label for="cobra_mora">Cobrar mora</label><br>
                            <div class="checkbox checkbox-success checkbox-inline">
                                <input onclick="mora()" type="checkbox" value="" id="cobra_moraC" name="">
                                <label for="cobra_mora">Cobrar</label>
                            </div>
                        </div>  
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                      <label for="">Cliente</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="nombre_cliente" name="nombre_cli" placeholder="Nombre del cliente" required data-parsley-required-message="Por favor, seleccione un nombre de cliente">
                                <input type="hidden" id="cobra_mora" name="cobra_mora">
                          <a title="Agregar&nbsp;cliente" class="input-group-addon btn btn-success waves-light m-d-5" data-toggle="modal" data-target="#agregarCliente"><i class="fa fa-user-plus fa-lg"></i></a>
                        </div>
                      </div>
<!--                     </div>                    
                    <div class="row"> -->

                      <div class="form-group col-md-3">
                            <label for="tipo_prestamo">Linea</label>
                            <!-- Probando linea de tiempo para populares-->
                            <?php 
                              if ($tipoSolicitud == 1)
                               {
                            ?>
                              <select id="tipo_prestamo" name="tipo_prestamo" class="select" data-placeholder="Seleccione un tipo de prestamo" data-live-search="true">
                                <option value="">Seleccione un tipo de prestamo</option>
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
                            <?php 
                               }
                            ?>
                            <?php  ?>
                            <!-- Probando linea de tiempo para hipotecarios-->
                            <?php 
                              if ($tipoSolicitud == 2)
                               {
                            ?>
                              <select id="tipo_prestamo" name="tipo_prestamo" class="select" data-placeholder="Seleccione un tipo de prestamo" data-live-search="true">
                                <option value="">Seleccione un tipo de prestamo</option>
                                <?php 
                                    foreach ($plazos->result() as $plazos)
                                    {
                                      if ($plazos->tiempo_plazo ==1)
                                      {
                                        echo '<option value="'.$plazos->id_plazo.'">Personales hasta '.$plazos->tiempo_plazo.' año</option>';
                                      }
                                      else
                                      {
                                ?>
                                <option value="<?= $plazos->id_plazo ?>">Personales hasta <?= $plazos->tiempo_plazo ?> años</option>
                                <?php }} ?>
                              </select>
                            <?php 
                               }
                            ?>
                            <?php  ?>
                            <input type="hidden" class="form-control" id="numero_meses" name="numero_meses">
                      </div> <!-- Fin linea de tiempo -->

                      <div class="form-group col-md-3">
                      <label for="">Destino del prestamo</label>
                        <select id="destino_prestamo" name="destino_prestamo" class="select" data-placeholder="Seleccione un tipo de prestamo" data-live-search="true">
                          <option value="1">Créditos para empresas</option>
                          <option value="2">Créditos para vivienda</option>
                          <option value="3">Créditos para consumo</option>
                        </select>
                      </div> <!-- Destino del prestamo -->


                    </div>
                    <!-- Fin de la primera Linea del formulario-->

                    <!-- Segunda Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-4">
                            <label for="fecha_recibido">Fecha Recibida</label>
                            <input type="text" class="form-control DateTime" id="fecha_recibido" name="fecha_recibido" placeholder="Fecha de recibido del prestamo" data-mask="9999/99/99">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="tasa_interes">Tasa de interes</label>
                            <?php 
                              if ($tipoSolicitud == 1)
                                {
                                  echo '<input type="text" value="10" class="form-control validaDigit" id="tasa_interes" name="tasa_interes" placeholder="Tasa de interes del prestamo">';
                                }
                                else
                                {
                                  echo '<input type="text" value="22" class="form-control validaDigit" id="tasa_interes" name="tasa_interes" placeholder="Tasa de interes del prestamo">';
                                }
                            ?>
                            
                      </div>
                      <div class="form-group col-md-4">
                            <label for="monto_dinero">Monto de dinero</label>
                            <input type="text" value="0" class="form-control validaDigit" id="monto_dinero" name="monto_dinero" placeholder="Monto de dinero" required data-parsley-required-message="Por favor, ingrese una cantidad de dinero">
                      </div>
                    </div>
                    <!-- Fin de la segunda Linea del formulario-->

                     <!-- Tercera Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-3">
                            <label for="">IVA a pagar</label>
                            <input type="text" class="form-control validaDigit" id="iva_pagar" name="iva_pagar" placeholder="Plazo de tiempo">
                      </div>
                      <div class="form-group col-md-3">
                            <label for="">Intereses a pagar</label>
                            <input type="text" class="form-control validaDigit" id="intereses_pagar" name="intereses_pagar" placeholder="Plazo de tiempo">
                      </div>
                      <div class="form-group col-md-3">
                            <?php 
                              if ($tipoSolicitud == 1)
                                {
                                  echo '<label for="">Cuota diaria</label>';
                                }
                                else
                                {
                                  echo '<label for="">Cuota mensual</label>';
                                }
                            ?>
                            <input type="text" class="form-control validaDigit" id="cuota_diaria" name="cuota_diaria" placeholder="Interes diario">
                      </div>
                      <div class="form-group col-md-3">
                            <label for="">Total a pagar</label>
                            <input type="text" class="form-control validaDigit" id="total_pagar" name="total_pagar" placeholder="Capital e intereses + IVA">
                      </div>
                    </div>
                    <!-- Fin de la tercera Linea del formulario-->

                    <!-- Cuarta Linea del formulario-->
                    <div class="row">
                      <div class="form-group col-md-10">
                            <label for="observaciones">Observaciones</label>
                            <textarea class="form-control resize" rows="3" id="observaciones" name="observaciones" style="min-height: 101px;" required data-parsley-required-message="Por favor, ingresa una descripción"></textarea>
                      </div>
                      <div class="form-group col-md-2 text-center">
                        <p><label for="">Operación</label></p>
                      <div class="btn-group-vertical">
                             <button title="Nuevo Fiador" type="button" class="btn btn-primary waves-effect waves-light m-d-5 btn-custom" id="fiador" data-toggle="modal" data-target="#agregarFiador"><i class="fa fa-user-plus fa-lg"></i> Fiador</button>
                             <button title="Nueva Prenda" type="button" class="btn btn-primary waves-effect waves-light m-d-5 btn-custom" id="prenda" data-toggle="modal" data-target="#agregarPrenda"><i class="fa fa-tags fa-lg"></i> Prenda</button>
                             <button title="Nueva Hipoteca" type="button" class="btn btn-primary waves-effect waves-light m-d-5 btn-custom" id="hipoteca" data-toggle="modal" data-target="#agregarHipoteca"><i class="fa fa-file-text fa-lg"></i> Hipoteca</button>
                      </div>
                      </div>
                    </div>
                    <!-- Fin de la cuarta Linea del formulario-->
                    <div id="">
                  <!-- Agregar Fiador -->
                  <div class="margn" style="display:none" id="mostrarF">
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table" id="fiadores">
                          <thead>
                            <div class="alert alert-success">
                              <strong style="color: #424949;">DATOS DEL FIADOR</strong>
                            </div>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div><br>
                  <!--Fin Agregar Fiador -->

                  <!-- Agregar Garantia -->
                  <div class="margn" style="display:none" id="mostrarG">
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table" id="garantia">
                          <thead>
                            <div class="alert alert-success">
                              <strong style="color: #424949;">DATOS DE LA GARANTIA</strong>
                            </div>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div><br>

                  <!-- Agregar Garantia -->
                  <div class="margn" style="display:none" id="mostrarH">
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table" id="hipotecas">
                          <thead>
                            <div class="alert alert-success">
                              <strong style="color: #424949;">DATOS DE LA HIPOTECA</strong>
                            </div>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div><br>
                    

                    <input type="hidden" value="1" class="form-control" id="id_cliente" name="id_cliente" placeholder="">
                    <input type="hidden" value="1" class="form-control" id="numero_cuotas" name="numero_cuotas" placeholder="">
                    <!-- Fin Agregar Garantia -->
                    </div>
                    <button type="submit" onclick="validarCliente()" class="btn btn-success waves-effect waves-light m-d-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
                     <button type="reset" class="btn btn-default waves-effect waves-light m-d-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                     <a href="<?= base_url() ?>Solicitud/" class="btn btn-default waves-effect waves-light m-d-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
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


<!-- ============================================================== -->
<!-- Ventana Modal para agregar Nuevo Plazo-->
<!-- ============================================================== -->
<div class="modal fade" id="agregarCliente" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Clientes Existentes</h4>
        </div>
        <div class="modal-body">
          <table id="datatable" class="table">
            <thead class="thead-dark thead thead1">
              <tr class="tr tr1">
                <th class="th th1" scope="col">#</th>
                <th class="th th1" scope="col">Código</th>
                <th class="th th1" scope="col">Nombre del Cliente</th>
                <th class="th th1" scope="col">Agregar</th>
              </tr>
            </thead>
            <tbody class="tbody tbody1">
              <?php 
                $i = 0;
                if(!empty($clientes)){
                foreach ($clientes->result() as $cliente)
                {
                  $i = $i +1;
                  // $datosCliente = $cliente->Id_Cliente." ".$cliente->Nombre_Cliente." ". $cliente->Apellido_Cliente;
                  $id = $cliente->Id_Cliente; 
                  $nombre = '"'.$cliente->Nombre_Cliente.'"'; 
                  $apellido = '"'.$cliente->Apellido_Cliente.'"';
                  $dui = '"'.$cliente->DUI_Cliente.'"';
              ?>
              <tr class="tr tr1">
                <td class="td td1" data-label="#" style="min-width: 10px; width: auto;"><b><?= $i;?></b></td>
                <td class="td td1" data-label="Código"><?= $cliente->Codigo_Cliente ?></td>
                <td class="td td1" data-label="Nombre del Cliente"><?= $cliente->Nombre_Cliente. " ".$cliente->Apellido_Cliente ?></td>
                <td class="td td1" data-label="Agregar">
                  <?php
                  echo "<a title='Agregar' class='btn btn-success btn-custom waves-effect waves-light m-b-5 btn-xs seleccionarCliente' 
                          onclick='agregarCliente($id, $nombre, $apellido, $dui)' data-toggle='tooltip' data-dismiss='modal'>
                        <i class='fa fa-user-plus fa-lg'></i>
                      </a>";
                  ?>
                </td>
              </tr>
              <?php }}?>
            </tbody>
          </table>
        </div>
        <div align="center">
          <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Ventana Modal para agregar Fiador-->
<!-- ============================================================== -->
<div class="modal fade" id="agregarFiador" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="limpiar()">&times;</button>
          <h4 class="modal-title">Nuevo fiador</h4>
        </div>
        <div class="modal-body">
            <form action="" autocomplete="off" id="FormNuevaSolicitudModalFiador">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-4">
                          <label for="">Nombre</label>
                          <input type="text" class="form-control" id="nombre_fiador" name="nombre_fiador" placeholder="Nombre del fiador">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="">Apellido</label>
                          <input type="text" class="form-control" id="apellido_fiador" name="apellido_fiador" placeholder="Apellido del fiador">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="">DUI</label>
                          <input type="text" class="form-control" id="dui_fiador" name="dui_fiador" placeholder="DUI" data-mask="99999999-9">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                          <label for="">NIT</label>
                          <input type="text" class="form-control" id="nit_fiador" name="nit_fiador" placeholder="NIT" data-mask="9999-999999-999-9">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="">Teléfono</label>
                          <input type="text" class="form-control validaTel" id="telefono_fiador" name="telefono_fiador" placeholder="Teléfono">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="">Email</label>
                          <input type="email" class="form-control" id="email_fiador" name="email_fiador" placeholder="Correo electrónico">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                          <label for="">Fecha de Nacimiento</label>
                          <input type="text" class="form-control DateTime" id="nacimiento_fiador" name="nacimiento_fiador" placeholder="Fecha de nacimiento" data-mask="999/99/99">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="">Género</label>
                          <select class="form-control" id="genero_fiador" name="genero_fiador">
                                <option value="">Seleccione un género</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Otro">Otro</option>
                          </select>
                    </div>
                    <div class="form-group col-md-4">
                          <label for="">Ingreso</label>
                          <input type="text" class="form-control validaDigit" id="ingreso_fiador" name="ingreso_fiador" placeholder="Ingreso mensual">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="">Dirección</label>
                          <textarea class="form-control resize" rows="3" id="direccion_fiador" name="direccion_fiador"></textarea>
                    </div>
                </div>
                <div align="center">
                  <button id="btnAgregar" class="btn btn-success waves-effect waves-light m-b-5" type="button" onclick="agregarFiador()"><i class="fa fa-check-square-o fa-lg"></i> Agregar</button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-b-5" ><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
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
<!-- Ventana Modal para agregar prenda-->
<!-- ============================================================== -->
<div class="modal fade" id="agregarPrenda" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="limpiar()">&times;</button>
          <h4 class="modal-title">Nueva prenda</h4>
        </div>
        <div class="modal-body">
            <form action="" autocomplete="off" id="FormNuevaSolicitudModalPrenda">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-6">
                          <label for="">Nombre de la prenda</label>
                          <input type="text" class="form-control" id="nombre_prenda" name="nombre_prenda" placeholder="Nombre de la prenda">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="">Precio valorado</label>
                          <input type="text" class="form-control validaDigit" id="precio_valorado" name="precio_valorado" placeholder="Precio de la prenda">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="">Descripción</label>
                          <textarea class="form-control resize" rows="3" id="descripcion_prenda" name="descripcion_prenda"></textarea>
                    </div>
                </div>
                <div align="center">
                  <button type="button" class="btn btn-success waves-effect waves-light m-b-5" onclick="agregarPrenda()"><i class="fa fa-check-square-o fa-lg"></i> Agregar</button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-b-5" ><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
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
<!-- Ventana Modal para agregar hipoteca-->
<!-- ============================================================== -->
<div class="modal fade" id="agregarHipoteca" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="limpiar()">&times;</button>
          <h4 class="modal-title">Nueva Hipoteca</h4>
        </div>
        <div class="modal-body">
            <form action="" autocomplete="off" id="FormNuevaSolicitudModalPrenda">
              <div class="margn">
                <div class="row">
                    <div class="form-group col-md-6">
                          <label for="">Nombre de la hipoteca</label>
                          <input type="text" class="form-control" id="nombre_hipoteca" name="nombre_hipoteca" placeholder="Nombre de la hipoteca">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="">Precio valorado de la hipoteca</label>
                          <input type="text" class="form-control validaDigit" id="precio_hipoteca" name="precio_hipoteca" placeholder="Precio de la hipoteca">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                          <label for="">Descripción</label>
                          <textarea class="form-control resize" rows="3" id="descripcion_hipoteca" name="descripcion_hipoteca"></textarea>
                    </div>
                </div>
                <div align="center">
                  <button type="button" class="btn btn-success waves-effect waves-light m-b-5" onclick="agregarHipoteca()"><i class="fa fa-check-square-o fa-lg"></i> Agregar</button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-b-5" ><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
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

<script type="text/javascript">
  $(document).on("ready", main);
  function main()
  {
    $("#btnAgregar").prop('disable', true);
    $("#numero_solicitud").prop('readonly', true);
    $("#nombre_cliente").prop('readonly', true);
    $("#tasa_interes").prop('readonly', true);
    $("#monto_dinero").prop('readonly', true);
    $("#iva_pagar").prop('readonly', true);
    $("#intereses_pagar").prop('readonly', true);
    $("#cuota_diaria").prop('readonly', true);
    $("#total_pagar").prop('readonly', true);

    // $(".seleccionarCliente").on("click", agregarCliente);
    $("#tipo_prestamo").on('change', activarIP);
    $("#monto_dinero").on('change', calcularIntereses);
    $("#tasa_interes").on('change', calcularIntereses);
    $("#tipo_credito").on('change', mostrarOperacion);
    $("#cobra_moraC").on('change', mora);
  }

function agregarCliente(id, nombre, apellido, dui)
  {
    // // Fin del proceso
    str = dui.replace("-", "");
    codigo = "F"+str;
    nombre_cliente = nombre +" "+apellido;
    $("#nombre_cliente").attr("value", nombre_cliente);
    $("#id_cliente").attr("value", id);
    $("#numero_solicitud").attr("value", codigo);
  }

// Funcion para calcular Intereses, IVA y toal a pagar, Funcion nueva esta en proceso aun

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
    datos = cadena.split(separador);

    meses = datos[2]; // numero de meses
  }
  else
  {
    meses = "";
  }

    $("#numero_meses").attr("value", meses);
}
function calcularIntereses()
{
  tipoCredito = $("#tipoCredito").val();
  mesesD = $("#numero_meses").val();
  tipoPrestamo = $("#tipo_prestamo").val();
  tasaInteres = (parseFloat($("#tasa_interes").val()) / 100) * mesesD;
  montoDinero = $("#monto_dinero").val();


  separador = " ";
  indice = document.getElementById('tipo_prestamo').selectedIndex;
  if (indice != "")
  {
    cadena = document.getElementById('tipo_prestamo').options[indice].text;
    datos = cadena.split(separador);

    meses = datos[2]; // numero de meses
  }
  else
  {
    meses = "";
  }

  if (tipoCredito == "Crédito popular")
  {
      numeroDePagos = (meses*30);
      totalInteresesAPagar = montoDinero * tasaInteres;
      totalIvaAPagar = totalInteresesAPagar * 0.13;
      totalAPagar = parseFloat(totalIvaAPagar) + parseFloat(totalInteresesAPagar) + parseFloat(montoDinero);
      cuotaDiaria = totalAPagar.toFixed(4)/numeroDePagos.toFixed();
  }
  else
  {
      numeroDePagos = (meses*12);
      tasaMensual= (tasaInteres)/numeroDePagos;
      power = Math.pow((1+tasaMensual), numeroDePagos);
      cuotaDiariaAux = (montoDinero * tasaMensual * power)/(power - 1);
      totalInteresesAPagar = (cuotaDiariaAux*numeroDePagos)-montoDinero;
      totalIvaAPagar = totalInteresesAPagar * 0.13;

      cuotaDiaria = (montoDinero * tasaMensual * power)/(power - 1) + (totalIvaAPagar/(meses*12));

      totalAPagar = parseFloat(totalIvaAPagar) + parseFloat(totalInteresesAPagar) + parseFloat(montoDinero);
  }

  // Probando calculos
  // totalPagoConCuotas = cuotaDiaria*26;

  if (isNaN(cuotaDiaria))
  {
    $("#cuota_diaria").attr("value",  0);
  }
  else
  {
    $("#cuota_diaria").attr("value",  cuotaDiaria.toFixed(4));
  }

  if (isNaN(totalIvaAPagar))
  {
    $("#iva_pagar").attr("value", 0);
  }
  else
  {
    $("#iva_pagar").attr("value", totalIvaAPagar.toFixed(4));
  }

  if (isNaN(totalInteresesAPagar))
  {
    $("#intereses_pagar").attr("value", 0);
  }
  else
  {
    $("#intereses_pagar").attr("value", totalInteresesAPagar.toFixed(4));
  }

  if (isNaN(totalAPagar))
  {
    $("#total_pagar").attr("value", 0);
  }
  else
  {
    $("#total_pagar").attr("value", totalAPagar.toFixed(4));
  }

  if (isNaN(numeroDePagos))
  {
    $("#numero_cuotas").attr("value", 0);
  }
  else
  {
    $("#numero_cuotas").attr("value", numeroDePagos);
  }


}

//Redondeo a dos decimales
function redondeo2decimales(numero)
{
  var flotante = parseFloat(numero);
  var resultado = Math.round(flotante*100)/100;
  return resultado;
}

function agregarFiador()
{
  nombre = $("#nombre_fiador").val();
  apellido = $("#apellido_fiador").val();
  dui = $("#dui_fiador").val();
  nit = $("#nit_fiador").val();
  telefono = $("#telefono_fiador").val();
  email = $("#email_fiador").val();
  nacimiento = $("#nacimiento_fiador").val();
  genero = $("#genero_fiador").val();
  ingreso = $("#ingreso_fiador").val();
  direccion = $("#direccion_fiador").val();

  if (nombre != "" && apellido != "" && dui != "" && nit != "" && telefono != ""  && nacimiento != "" && genero != "" && ingreso != "" && direccion != "")
  {
    $(document).ready(function(){
    $.Notification.autoHideNotify('success', 'top center', 'Aviso!', 'Información agregada.');
    });

    $("#mostrarF").fadeIn();
    fila = '';
    fila += '<tr>';
    fila +=  '<td><strong>Nombre:</strong> '+nombre +" "+ apellido +'</td>';
    fila +=  '<td><strong>Ingreso:</strong> '+"$"+" "+ingreso+'</td>';
    fila +=  '<td><strong>Dirección:</strong> '+direccion+'</td>';
    fila += '</tr>';

    fila +=  '<td><input type="hidden" name="nombreFiador[]" class="form-control" value="'+nombre+'"></td>';
    fila +=  '<td><input type="hidden" name="apellidoFiador[]" class="form-control" value="'+apellido+'"></td>';
    fila +=  '<td><input type="hidden" name="duiFiador[]" class="form-control" value="'+dui+'"></td>';
    fila +=  '<td><input type="hidden" name="nitFiador[]" class="form-control" value="'+nit+'"></td>';
    fila +=  '<td><input type="hidden" name="telefonoFiador[]" class="form-control" value="'+telefono+'"></td>';
    fila +=  '<td><input type="hidden" name="emailFiador[]" class="form-control" value="'+email+'"></td>';
    fila +=  '<td><input type="hidden" name="nacimientoFiador[]" class="form-control" value="'+nacimiento+'"></td>';
    fila +=  '<td><input type="hidden" name="generoFiador[]" class="form-control" value="'+genero+'"></td>';
    fila +=  '<td><input type="hidden" name="ingresoFiador[]" class="form-control" value="'+ingreso+'"></td>';
    fila +=  '<td><input type="hidden" name="direccionFiador[]" class="form-control" value="'+direccion+'"></td>';
    $("#fiadores").append(fila);
   
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
  }else{
    $(document).ready(function(){
    $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Todos los campos excepto el email son requeridos.');
    });
  }  
}

function agregarPrenda()
{
  nombre = $("#nombre_prenda").val();
  precio = $("#precio_valorado").val();
  descripcion = $("#descripcion_prenda").val();

if (nombre != "" && precio != "" && descripcion != "")
  {
    $(document).ready(function(){
    $.Notification.autoHideNotify('success', 'top center', 'Aviso!', 'Información agregada.');
    });

    $("#mostrarG").fadeIn();
    fila = '';
    fila += '<tr>';
    fila +=  '<td><strong>Nombre:</strong> '+nombre+'</p></td>';
    fila +=  '<td><strong>Precio:</strong> '+"$"+" "+precio+'</p></td>';
    fila +=  '<td><strong>Descripción:</strong> '+descripcion+'</p></td>';
    fila += '</tr>';

    fila += '<tr>';
    fila +=  '<td><input type="hidden" name="nombrePrenda[]" class="form-control" value="'+nombre+'"></td>';
    fila +=  '<td><input type="hidden" name="precioPrenda[]" class="form-control" value="'+precio+'"></td>';
    fila +=  '<td><input type="hidden" name="descripcionPrenda[]" class="form-control" value="'+descripcion+'"></td>';
    fila += '</tr>';

    $("#garantia").append(fila);

    $('#nombre_prenda').val("");
    $('#precio_valorado').val("");
    $('#descripcion_prenda').val("");
  }else{
    $(document).ready(function(){
    $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Todos los campos son requeridos.');
    });
  }
}


function agregarHipoteca()
{
  nombre = $("#nombre_hipoteca").val();
  precio = $("#precio_hipoteca").val();
  descripcion = $("#descripcion_hipoteca").val();

if (nombre != "" && precio != "" && descripcion != "")
  {
    $(document).ready(function(){
    $.Notification.autoHideNotify('success', 'top center', 'Aviso!', 'Información agregada.');
    });

    $("#mostrarH").fadeIn();
    fila = '';
    fila += '<tr>';
    fila +=  '<td><strong>Nombre:</strong> '+nombre+'</p></td>';
    fila +=  '<td><strong>Precio:</strong> '+"$"+" "+precio+'</p></td>';
    fila +=  '<td><strong>Descripción:</strong> '+descripcion+'</p></td>';
    fila += '</tr>';

    fila += '<tr>';
    fila +=  '<td><input type="hidden" name="nombreHipoteca[]" class="form-control" value="'+nombre+'"></td>';
    fila +=  '<td><input type="hidden" name="precioHipoteca[]" class="form-control" value="'+precio+'"></td>';
    fila +=  '<td><input type="hidden" name="descripcionHipoteca[]" class="form-control" value="'+descripcion+'"></td>';
    fila += '</tr>';

    $("#hipotecas").append(fila);

    $('#nombre_hipoteca').val("");
    $('#precio_hipoteca').val("");
    $('#descripcion_hipoteca').val("");
  }else{
    $(document).ready(function(){
    $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Todos los campos son requeridos.');
    });
  }
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
function mora()
{
  var mora;
  if( $('#cobra_moraC').prop('checked') )
  {
    mora = 1;
    console.log(mora);
  }
  else
  {
    mora = 0;
    console.log(mora);
  }
  $("#cobra_mora").attr("value", mora);
}

$(document).ready(function () {
  $('#formNuevaSolicitud').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  });
});

$(document).ready(function () {
  $('#FormNuevaSolicitudModalFiador').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  });
});
</script>
