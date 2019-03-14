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
                    <li class="active">Facturas</li>
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
                          <div class="col-sm-6">
                            <h3 class="panel-title">Registro de Facturas</h3>
                          </div>
                          <div class="col-sm-6">
                            <a href="<?= base_url();?>Facturas/" class="btn btn-warning"><i class="fa fa-refresh"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                    <div id="divFlitros" >
                      <h4>Seleccione un filtro de busqueda</h4>
                      <!-- FILTROS -->
                      <div class="row">
                        <div class="col-md-3">
                          <div class="radio radio-success radio-inline">
                            <input type="radio"  id="rbFiltroNombre" name="rbFiltro" onclick="filtros()">
                            <label class="custom-control-label" for="rbFiltroNombre">Por nombre del cliente</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="radio radio-success radio-inline">
                            <input type="radio"  id="rbFiltroFecha" onclick="filtros()" name="rbFiltro">
                            <label class="control-label" for="rbFiltroFecha">Por rango de fecha</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="radio radio-success radio-inline">
                            <input type="radio"  id="rbFiltroFactura" name="rbFiltro" onclick="filtros()">
                            <label class="custom-control-label" for="rbFiltroFactura">Por código de factura</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                         <div class="radio radio-success radio-inline">
                            <input type="radio"  id="rbFiltroTodos" name="rbFiltro" onclick="filtros()" >
                            <label class="custom-control-label" for="rbFiltroTodos">Mostrar todas las facturas</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="margn" id="divNombre" style="display:none;">
                      <h4>Degite el nombre del cliente que desea buscar</h4>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control" name="" id="txtBuscarNombre" placeholder="Buscar por nombre del cliente">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <a onclick="consultarFiltros(1)" class="btn btn-success" id="btnBuscar"><i class="fa fa-search"></i> Buscar</a>
                          <a onclick="ocultar()" class="btn btn-warning"><i class="fa fa-close"></i> Cerrar filtros</a>
                        </div>
                      </div>
                    </div>
                   
                    <div id="divRangoFechas" class="margn" style="display:none;">
                        <h4>Seleccione el rango de fechas para realizar la factura</h4>
                        <form class="form-inline" id="buscrPorFecha" method="post">
                         
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
                            <a onclick="consultarFiltros(2)" id="btnBuscarFecha" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</a>
                            <a onclick="ocultar()" class="btn btn-warning"><i class="fa fa-close"></i> Cerrar filtros</a>
                  
                        </form>
                    </div>
                    <div id="divCodigoFactura" class="margn" style="display:none;">
                      <h4>Degite el código de la factura que desea buscar</h4>
                      <div class="row">
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="" id="txtBuscarFactura" placeholder="Buscar por código de Factura">
                        </div>
                        <div class="col-md-4">
                          <a onclick="consultarFiltros(3)" class="btn btn-success" id="btnBuscar"><i class="fa fa-search"></i> Buscar</a>
                          <a onclick="ocultar()" class="btn btn-warning"><i class="fa fa-close"></i> Cerrar filtros</a>
                        </div>
                      </div>
                    </div>
                    <br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="margn">
                              <div id="mostrarTabla">
                                <table id="datatable" class="table">
                                  <thead class="thead-dark thead thead1">
                                    <tr class="tr tr1">
                                      <th class="th th1" scope="col"># Factura</th>
                                      <th class="th th1" scope="col">Cliente</th>
                                      <th class="th th1" >Fecha de Aplicacion</th>
                                      <th  class="th th1">Acción</th>
                                    </tr>
                                  </thead>
                                  <tbody class="tbody tbody1">
                                  <?php
                                    foreach ($factura->result() as $fact) {
                                      ?>
                                      <tr>
                                      <td><?= $fact->id_factura?></td>
                                      <td><?= $fact->Nombre_Cliente." ".$fact->Apellido_Cliente?> </td>
                                      <td><?= $fact->fechaAplicacion?></td>
                                      <td><a href="<?= base_url()?>Facturas/DetalleFactura/<?= $fact->id_factura?>" title='Ver factura' data-toggle="tooltip" class='waves-effect waves-light ver'><i class='fa fa-folder'></i></a></td>
                                      </tr>
                                  <?php
                                    }
                                  ?>
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
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<script type="text/javascript">
  function filtros(){
    // document.getElementById('divCerrar').style.display='block';
    // $(".divCerrar").css({"display":"block"});
    if($('#rbFiltroNombre').prop('checked')){
      document.getElementById('divNombre').style.display='block';
      document.getElementById('divRangoFechas').style.display='none';
      document.getElementById('divCodigoFactura').style.display='none';
    }
    else if($('#rbFiltroFecha').prop('checked')){
      document.getElementById('divNombre').style.display='none';
      document.getElementById('divRangoFechas').style.display='block';
      document.getElementById('divCodigoFactura').style.display='none';
    }
    else if($('#rbFiltroFactura').prop('checked')){
      document.getElementById('divNombre').style.display='none';
      document.getElementById('divRangoFechas').style.display='none';
      document.getElementById('divCodigoFactura').style.display='block';
    }
    else if($('#rbFiltroTodos').prop('checked')){
      document.getElementById('divNombre').style.display='none';
      document.getElementById('divRangoFechas').style.display='none';
      document.getElementById('divCodigoFactura').style.display='none';
      // $(".divCerrar").css({"display":"none"});
      // document.getElementById('divCerrar').style.display='none';
      consultarFiltros(4);
    }
  }
  function ocultar(){
    document.getElementById('divNombre').style.display='none';
    document.getElementById('divRangoFechas').style.display='none';
    document.getElementById('divCodigoFactura').style.display='none';
    // $(".divCerrar").css({"display":"none"});
    // document.getElementById('divCerrar').style.display='none';
  }

  function consultarFiltros(valor){
    var nombre = $('#txtBuscarNombre').val();
    var Fecha1 = $('#fechaInicio').val();
    var Fecha2 = $('#fechaFinal').val();
    var fa = $('#txtBuscarFactura').val();

    $.ajax({
          url:"<?= base_url()?>Facturas/filtrarFactura/"+valor,
          type:"GET",
          data:{Nombre:nombre, fecha1:Fecha1, fecha2:Fecha2, nFactura:fa},
          success:function(respuesta){
            var registro = eval(respuesta);
            if (registro.length > 0)
              {
                document.getElementById('mostrarTabla').innerHTML="";
                var HTML="";
                HTML+='<table id="datatable" class="table">';
                HTML +='<thead class="thead-dark thead thead1">';
                HTML+='<tr>';
                HTML+='<th>Numero de factura</th>';
                HTML+='<th>Cliente</th>';
                HTML+='<th>Fecha de Aplicacion</th>';
                HTML+='<th>Accion</th>';
                HTML+='</tr>';
                HTML+='</thead>';
                HTML+='<tbody>';
                //alert('funciona');
                for (var i =0 ; i<registro.length ; i++){
                  //alert('sssss'+i);
                  HTML+='<tr>';
                  HTML+='<td>'+registro[i]['id_factura']+'</td>';
                  HTML+='<td>'+registro[i]['Nombre_Cliente']+' '+registro[i]['Apellido_Cliente']+'</td>';
                  HTML+='<td>'+registro[i]['fechaAplicacion']+'</td>';
                  HTML+='<td><a href="<?= base_url()?>Facturas/DetalleFactura/'+registro[i]['id_factura']+'" title="Ver factura" data-toggle="tooltip" class="waves-effect waves-light ver"><i class="fa fa-folder"></i></a></td>'
                  HTML+='</tr>';
                }
                HTML+='</tbody>';
                HTML+='</table>';
                document.getElementById('mostrarTabla').innerHTML=HTML;
                //$('#tableBody').apend(HTML);*/
              }
              else{
                // alert('No se encontraron registros con ese filtro');
                $(document).ready(function(){
                  $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'No se encontraron registros con ese filtro.');
                });
              }
          }
        });

  }
</script>