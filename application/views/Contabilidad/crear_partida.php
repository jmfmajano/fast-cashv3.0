<?php if($this->session->flashdata("guardar")):?>
  <script type="text/javascript">
    $(document).ready(function(){
    $.Notification.autoHideNotify('success', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("guardar")?>');
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


<style>
    #vistaPartida{
        display: none;
    }
</style>
<!-- ============================================================== -->
 <!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- <h4 class="pull-left page-title">Inicio</h4> -->
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= base_url() ?>Clientes/gestionarCliente">Partidas</a></li>
                        <li class="active">Nueva partida</li>
                    </ol>
                </div>
            </div>

            

            <!-- Basic Form Wizard -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">Crear partida</h3> 
                        </div> 
                        <div class="panel-body"> 
                            <div class="margn">
                                    <form id="DProcesoCC2" method="" action="" autocomplete="off">
                                        <div class="row">
                                          <div class="form-group col-md-4">
                                            <div class="mar_che_cobrar2" style="padding-bottom: 10px;">
                                                <label for="fecha_proceso">Fecha</label>
                                                <input type="text"  class="form-control DateTime" id="fechaPartida" name="" placeholder="Fecha del proceso" data-mask="9999/99/99">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-md-4">
                                                <label for="fecha_proceso">Cuenta</label>
                                                <select name="tipo_proceso" id="nombreCuenta" class="select" data-placeholder="Seleccione una cuenta">
                                                  <option value="">.::Seleccione una cuenta::.</option>
                                                  <?php 
                                                    foreach ($datos->result() as $cuenta) {
                                                  ?>
                                                    <option value="<?= $cuenta->idCuenta ?>"><?= $cuenta->NombreCuenta ?></option>
                                                  <?php 
                                                    }
                                                   ?>
                                                </select>
                                          </div>
                                          <div class="form-group col-md-4">
                                                <label for="cantidad_apertura">Destino</label>
                                                <select name="tipo_proceso" id="destino" class="select" data-placeholder="Seleccione un tipo de proceso">
                                                  <option value="">.::Seleccione un tipo de proceso::.</option>
                                                  <option value="Debe">Debe</option>
                                                  <option value="Haber">Haber</option>
                                                </select>
                                          </div>
                                          <div class="form-group col-md-4">
                                                <label for="cantidad_apertura">Cantidad de dinero</label>
                                                <input type="text" class="form-control validaDigit" id="cantidad_dinero" name="" placeholder="Cantidad de dinero del proceso a efectuar">
                                          </div>
                                        </div>
                                        
                                        <div class="row">
                                            <button type="button" id="CrearPartida" class="btn btn-success waves-effect waves-light m-d-5"><i class="fa fa-save fa-lg"></i> Aceptar</button>
                                            <button class="btn btn-danger waves-effect waves-light m-d-5"><i class="fa fa-close fa-lg"></i> Cancelar</button>
                                        </div>
                                  </form>
                                </div>
                                    <br>
                                <div class="margn">
                                    <table class="table table_bordered" id="vistaPartida">
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Cuenta</th>
                                            <th>Debe</th>
                                            <th>Haber</th>
                                        </tr>

                                        <tr class="alert-success" id="tablaPartida">
                                            <th class="text-center" colspan="2">Total</th>
                                            <th id="debeT">$0</th>
                                            <th id="haberT">$0</th>
                                        </tr>
                                    </table>
   



                                    <form method="post" action="<?= base_url() ?>Contabilidad/GuardarPartida" >
                                        <input type="hidden" value="0" id="totalDebe" name="totalDebe">
                                        <input type="hidden" value="0" id="totalHaber" name="totalHaber">
                                        <input type="hidden" value="" id="fechaPartidaE" name="fechaPartida">
                                        <table class="">
                                            <tr id="frmPartida" style="display:none">
                                                <td colspan="4">
                                                    <div class="row">
                                                      <div class="form-group col-md-12">
                                                            <label for="detalle_proceso">Detalle</label>
                                                            <textarea class="form-control resize" rows="3" cols="135" id="detalle_proceso" name="detalle_proceso"></textarea>
                                                      </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="alert-success" id="btns" style="display:none">
                                                <th class="text-center" colspan="4">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                    <button class="btn btn-success">Cancelar</button>
                                                </th>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                        </div>  <!-- End panel-body -->
                    </div> <!-- End panel -->
                </div> <!-- end col -->
            </div> <!-- End row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<script>
    $(document).on("ready", main);
    function main()
    {
        $("#CrearPartida").on("click", operar);
        $("#fechaPartida").on("change", operarFecha);
    }

    function operar()
    {
        html = ""
        htmlFrm = ""
        indice = document.getElementById('nombreCuenta').selectedIndex;
        cadena = document.getElementById('nombreCuenta').options[indice].text;
        debe=$("#totalDebe").val();
        haber=$("#totalHaber").val();
        total=debe + haber;
        fecha = $("#fechaPartida").val();
        cuenta = $("#nombreCuenta").val();
        destino = $("#destino").val();
        cantidad = $("#cantidad_dinero").val();

        if (fecha != "" && cadena != "" && destino != "" && cantidad != "")
        {
            html += "<tr>";
            html += "    <th>"+fecha+"</th>";
            html += "    <th>"+cadena+"</th>";
            if (destino == "Debe") 
            {
                debe = parseFloat(debe) + parseFloat(cantidad);
                html += "    <th>"+cantidad+"</th>";
                html += "    <th>0</th>";
            }
            else
            {
                haber= parseFloat(haber) + parseFloat(cantidad);
                html += "    <th>0</th>";
                html += "    <th>"+cantidad+"</th>";
            }
            html += "</tr>";

            $("#tablaPartida").before(html);
            $("#totalDebe").attr("value", debe);
            $("#totalHaber").attr("value", haber);
            $("#debeT").html(debe);
            $("#haberT").html(haber); 

            htmlFrm += "<tr>";
            htmlFrm += "    <th><input type='hidden' value="+fecha+" name='fecha'></th>";
            htmlFrm += "    <th><input type='hidden' value="+indice+" name='cuenta[]'></th>";
            if (destino == "Debe") 
            {
                debe = parseFloat(debe) + parseFloat(cantidad);
                htmlFrm += "    <th><input type='hidden' value="+cantidad+" name='debe[]'></th>";
                htmlFrm += "    <th><input type='hidden' value='0' name='haber[]'></th>";
            }
            else
            {
                haber= parseFloat(haber) + parseFloat(cantidad);
                htmlFrm += "    <th><input type='hidden' value='0' name='debe[]'></th>";
                htmlFrm += "    <th><input type='hidden' value="+cantidad+" name='haber[]'></th>";
            }
            htmlFrm += "</tr>";

            
            $("#frmPartida").before(htmlFrm);

            //Mostrando datos
            $("#vistaPartida").show();
            $("#frmPartida").show();
            $("#btns").show();
        }
        else
        {
            alert("Ingresa todos los valores");
        }
    }

    function operarFecha()
    {
        $("#fechaPartidaE").attr("value", $(this).val());
    }
</script>

  }