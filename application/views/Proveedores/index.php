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

<style>
  a{
    cursor: pointer;
  }
</style>
<!-- contenedor -->
<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Home/Main">Inicio</a></li>
            <li class="active">Proveedores</li>
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
                    <h3 class="panel-title">Registro de Proveedores</h3>                 
                  </div>
                  <div class="col-sm-7">
                      <a title="Nuevo" href="" data-toggle="modal" data-target="#modal_agregar_proveedor" class="btn btn-primary waves-effect waves-light m-b-5"><i class="fa fa-plus-circle"></i> <span>Nuevo Proveedor<span></a>
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
                        <th class="th th1" scope="col">Nombre</th>
                        <th class="th th1" scope="col">Empresa</th>
                        <th class="th th1" scope="col">Rubro</th>
                        <th class="th th1" >Acción</th>
                      </tr>
                    </thead>
                    <tbody class="tbody tbody1">
                        <?php 
                          $i = 0;
                          if(!empty($datos)){
                          foreach ($datos->result() as $proveedor) {
                            $id = $proveedor->idProveedor;
                            $nombre = '"'.$proveedor->nombreCompleto.'"';
                            $empresa = '"'.$proveedor->nombreEmpresa.'"';
                            $rubro = '"'.$proveedor->rubro.'"';
                            $telefono = '"'.$proveedor->telefono.'"';
                            $email = '"'.$proveedor->email.'"';
                            $direccion = '"'.$proveedor->direccionEmpresa.'"';
                            $descripcion = '"'.$proveedor->descripcion.'"';
                            $fecha = '"'.$proveedor->fechaRegistro.'"';

                            if ($proveedor->estado != 0 ){
                            $i = $i +1;
                        ?>
                          <tr class="tr tr1">
                            <td class="td td1" data-label="#"><b><?= $i;?></b></td>
                            <td class="td td1"><?= $proveedor->nombreCompleto?></td>
                            <td class="td td1"><?= $proveedor->nombreEmpresa?></td>
                            <td class="td td1"><?= $proveedor->rubro?></td>
                            <td class="td td1">
                          <?php 
                            echo "<a onclick='detalleProveedor($id, $nombre, $empresa, $rubro, $telefono, $email, $direccion, $descripcion, $fecha)' title='Ver historial' href='' data-toggle='modal' data-target='#modal_ver_proveedor' class='waves-effect waves-light ver'><i class='fa fa-info-circle'></i></a>";

                            echo "<a title='Editar' href='' onclick='actualizarProveedor($id, $nombre, $empresa, $rubro, $telefono, $email, $direccion, $descripcion, $fecha)' data-toggle='modal' data-target='#modal_actualizar_proveedor' class='waves-effect waves-light editar'><i class='fa fa-pencil-square'></i></a>";
                            echo "<a title='Eliminar' onclick='Delete($id)' class='waves-effect waves-light eliminar' data-id='$id' data-toggle='modal' data-target='#modal_eliminar_proveedor'><i class='fa fa-times-circle'></i></a>";
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
      </div> <!-- End Row -->

    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana Modal para agregar un proveedor-->
<!-- ============================================================== -->
<div class="modal fade" id="modal_agregar_proveedor" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="limpiar()">&times;</button>
            <h4 class="modal-title">Nuevo proveedor</h4>
          </div>
          <div class="modal-body">
              <form id="DProveedor" method="post" action="<?= base_url() ?>Proveedores/GuardarProveedor" autocomplete="off">
                <div class="margn">
                    <div class="row">
                      <div class="form-group col-md-6">
                            <label for="nombre_proveedor">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre completo del proveedor">
                      </div>
                      <div class="form-group col-md-6">
                            <label for="nombre_empresa">Nombre de la empresa</label>
                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre completo de la empresa">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                            <label for="telefono_empresa">Teléfono</label>
                            <input type="text" class="form-control validaTel" id="telefono_empresa" name="telefono_empresa" placeholder="Teléfono de la empresa">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="correo_empresa">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo_empresa" name="correo_empresa" placeholder="Email de la empresa">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="rubro_empresa">Rubro</label>
                            <select name="rubro_empresa" id="rubro_empresa" class="select" data-placeholder="Seleccione un tipo de proceso">
                              <option value="">.::Seleccione un tipo de proceso::.</option>
                              <option value="Textil">Textil</option>
                              <option value="Construcción, estructuras metálicas">Construcción, estructuras metálicas</option>
                              <option value="Suministros Eléctricos">Suministros Eléctricos</option>
                              <option value="Pinturas">Pinturas</option>
                              <option value="Imprenta">Imprenta</option>
                              <option value="Muebles en madera">Muebles en madera</option>
                            </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                            <label for="direccion_empresa">Dirección de la empresa</label>
                            <textarea class="form-control resize" rows="3" id="direccion_empresa" name="direccion_empresa"></textarea>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="descripcion_empresa">Descripción</label>
                            <textarea class="form-control resize" rows="3" id="descripcion_empresa" name="descripcion_empresa"></textarea>
                      </div>
                    </div>
                   <div  align="center">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
                    <button type="reset" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                    <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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
<!-- Ventana Modal para ver datos de los proveedores-->
<!-- ============================================================== -->
<div class="modal fade" id="modal_ver_proveedor" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><i class="fa fa-list-alt fa-lg"></i> Detalle del proveedor</h4>
          </div>
          <div class="modal-body">
            <div class='margn'>
              <div id="detalleProveedor">
                
              </div>
              <div align="center">
                <button type="button" class="btn btn-default waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar </button>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- Fin de ventana modal -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Ventana Modal para ver actualizar proveedor-->
<!-- ============================================================== -->
<div class="modal fade" id="modal_actualizar_proveedor" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar datos del proveedor</h4>
          </div>
          <div class="modal-body">
              <form id="DProveedor" class="DProveedor" method="post" action="<?= base_url() ?>Proveedores/ActualizarProveedor" autocomplete="off">
                <div class="margn">
                    <div class="row">
                      <div class="form-group col-md-6">
                            <label for="nombre_proveedorA">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre_proveedorA" name="nombre_proveedor" placeholder="Nombre completo del proveedor">
                            <input type="hidden" class="form-control" id="id_proveedorA" name="id_proveedor" >
                      </div>
                      <div class="form-group col-md-6">
                            <label for="nombre_empresaA">Nombre de la empresa</label>
                            <input type="text" class="form-control" id="nombre_empresaA" name="nombre_empresa" placeholder="Nombre completo de la empresa">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                            <label for="telefono_empresaA">Teléfono</label>
                            <input type="text" class="form-control validaTel" id="telefono_empresaA" name="telefono_empresa" placeholder="Teléfono de la empresa">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="correo_empresaA">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo_empresaA" name="correo_empresa" placeholder="Email de la empresa">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="rubro_empresaA">Rubro</label>
                            <select name="rubro_empresa" id="rubro_empresaA" class="form-control">
                              <option value="Textil">Textil</option>
                              <option value="Construcción, estructuras metálicas">Construcción, estructuras metálicas</option>
                              <option value="Suministros Eléctricos">Suministros Eléctricos</option>
                              <option value="Pinturas">Pinturas</option>
                              <option value="Imprenta">Imprenta</option>
                              <option value="Muebles en madera">Muebles en madera</option>
                            </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                            <label for="direccion_empresaA">Dirección de la empresa</label>
                            <textarea class="form-control resize" rows="3" id="direccion_empresaA" name="direccion_empresa"></textarea>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="descripcion_empresaA">Descripción</label>
                            <textarea class="form-control resize" rows="3" id="descripcion_empresaA" name="descripcion_empresa"></textarea>
                      </div>
                    </div>
                  <div  align="center">
                    <button type="submit" class="btn btn-warning waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Actualizar</button>
                    <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
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


<!--MODAL PARA ELIMINAR DATOS-->
<div class="modal fade" id="modal_eliminar_proveedor" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
    <form  action="<?= base_url()?>Proveedores/EliminarProveedor" method="GET">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="mySmallModalLabel">
                <i class="fa fa-warning fa-lg text-danger"></i>
            </h4>
        </div>
            <div class="modal-body">
              <input type="hidden" id="idProveedor" name='id'>
              <p align="center">¿Está seguro de eliminar el proveedor?</p>
            </div>
            <div  align="center">
                <button type="submit" class="btn btn-danger block wwaves-effect waves-light m-b-5"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
   $(document).on("ready", main);
  function main()
  {
    $("#fecha_proceso").prop('readonly', true);

    $('#DProveedor').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  });

  }

  function detalleProveedor(id, nombre, empresa, rubro, telefono, email, direccion, descripcion, fecha)
  {
    $("#detalleProveedor").empty(); 
    fila = '';
    fila +="<ul><h5><b>Información del Empleado</b></h5><ol>";
    fila += "<div class='row'>"; 
    fila += "<div class='col-sm-1'></div>"; 
    fila += "<div class='col-sm-11'>"; 
    fila +="<div class='row'><div class='col-sm-6'><label>Nombre del proveedor:&nbsp;</label>"+ nombre +"</div>";
    fila +="<div class='col-sm-6'><label>Nombre de la empresa:&nbsp;</label>"+empresa+"</div></div>";

    fila +="<div class='row'><div class='col-sm-6'><label>Teléfono del proveedor:&nbsp;</label><span style='color: #2E86C1; text-decoration: underline;'>"+ telefono +"</span></div>";
    fila +="<div class='col-sm-6'><label>Email de la empresa:&nbsp;</label><span style='color: #2E86C1; text-decoration: underline;'>"+email+"</span></div></div>";

    fila +="<div class='row'><div class='col-sm-6'><label>Rubro de la empresa:&nbsp;</label>"+rubro+"</div>";
    fila +="<div class='col-sm-6'><label>Dirección de la empresa:&nbsp;</label>"+direccion+"</div></div>";

    fila +="<div class='row'><div class='col-sm-6'><label>Descripción del proveedor:&nbsp;</label>"+ descripcion +"</div></div>";
    fila+="</div></div></ul>";

    $("#detalleProveedor").append(fila);
  }

  function actualizarProveedor(id, nombre, empresa, rubro, telefono, email, direccion, descripcion, fecha)
  {
    document.getElementById('id_proveedorA').value=id;
    document.getElementById('nombre_proveedorA').value=nombre;
    document.getElementById('nombre_empresaA').value=empresa;
    document.getElementById('rubro_empresaA').value=rubro;
    document.getElementById('telefono_empresaA').value=telefono;
    document.getElementById('correo_empresaA').value=email;
    document.getElementById('direccion_empresaA').value=direccion;
    document.getElementById('descripcion_empresaA').value=descripcion;
  }

  function Delete(id){
        $('#idProveedor').val(id);
  }

  function limpiar(){
    $('#nombre_proveedor').val("");
    $('#nombre_empresa').val("");
    $('#rubro_empresa').val("");
    $('#telefono_empresa').val("");
    $('#correo_empresa').val("");
    $('#direccion_empresa').val("");
    $('#descripcion_empresa').val("");
  }
</script>