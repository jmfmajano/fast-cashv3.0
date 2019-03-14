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
                        <li><a href="<?= base_url() ?>Clientes/gestionarCliente">Gestión de clientes</a></li>
                        <li class="active">Nuevo cliente</li>
                    </ol>
                </div>
            </div>
            <!-- Basic Form Wizard -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">Nuevo cliente</h3> 
                        </div> 
                        <div class="panel-body">
                            <div class="wizard">
                              <div role="tabpanel">
                                  <ul class="nav nav-tabs nav-justified nav-tabs-dropdown nav-pills" role="tablist">
                                        <li role="presentation" class="active"><a href="#cliente1" class="btn-block waves-effect waves-light" aria-controls="cliente" role="tab" data-toggle="tab" style="pointer-events: none;cursor: default;">Información personal del Cliente</a></li>
                                        <li role="presentation" class="disabled" id="tabsEmpleado"><a href="#empleado" id="btnTabsEmpleado" class="btn-block waves-effect waves-light" aria-controls="empleado" role="tab" data-toggle="tab" style="pointer-events: none;cursor: default;">Información tipo del Cliente</a></li>
                                    <div class="clearfix"></div>
                                  </ul>
                                  <!-- Tab panes --> 
                                  <div class="tab-content margn top">
                                    <!--Tab Panel 1-->
                                    <div class="tab-pane active" role="tabpanel" id="cliente1">
                                       <form role="form" id="basic-form" method="POST" action="<?= base_url()?>Clientes/InsertarCliente" class="demo-form" autocomplete="off">
                                       <div class="row form-section">                                        
                                       <div class="mar_che_cobrar2">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                            <label for="Tipo_Cliente">Tipo de cliente</label>
                                                            <select id="select" name="Tipo_Cliente" class="form-control">
                                                                <option value="Otro">Otro</option>
                                                                <option value="Empleado">Empleado</option>
                                                                <option value="Comerciante">Comerciante</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-6"></div>
                                                    <div class="form-group col-md-3">
                                                            <label for="Ingreso_Mensual">Ingreso Mensual</label>
                                                            <input type="text" class="form-control validaDigit" id="Ingreso_Mensual" name="Ingreso_Mensual" placeholder="Ingreso mensual"  required data-parsley-required-message="Por favor, digite un ingreso">
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="row">
                                                 <div class="form-group col-md-4">
                                                    <label for="Codigo_Cliente">Código</label>
                                                    <input type="text" class="form-control" id="Codigo_Cliente" name="Codigo_Cliente" placeholder="Código del cliente" required data-parsley-required-message="Por favor, código requerido" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="Nombre_Cliente">Nombre</label>
                                                    <input type="text" class="form-control" id="Nombre_Cliente" name="Nombre_Cliente" placeholder="Nombre del cliente" required data-parsley-required-message="Por favor, escriba un nombre">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="Apellido_Cliente">Apellido</label>
                                                    <input type="text" class="form-control" id="Apellido_Cliente" name="Apellido_Cliente" placeholder="Apellido del cliente" required data-parsley-required-message="Por favor, escriba un apellido">
                                                </div>
                                            </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Dui_Cliente">DUI</label>
                                                                <input type="text" class="form-control" id="Dui_Cliente" name="Dui_Cliente" placeholder="DUI del cliente" data-mask="99999999-9" required data-parsley-required-message="Por favor, digite un DUI">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Nit_Cliente">NIT</label>
                                                                <input type="text" class="form-control" id="Nit_Cliente" name="Nit_Cliente" placeholder="NIT del cliente" data-mask="9999-999999-999-9">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Prpofesion_Cliente">Profesión</label>
                                                                <input type="text" class="form-control" id="Prpofesion_Cliente" name="Profesion_Cliente" placeholder="Profesión del cliente">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Estado_Cliente">Estado Civil</label>
                                                                <select id="Estado_Cliente" name="Estado_Cliente" class="form-control">
                                                                    <option value="Soltero/a">Soltero/a</option>
                                                                    <option value="Casado/a">Casado/a</option>
                                                                    <option value="Divorsiado/a">Divorciado/a</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Genero_Cliente">Genero</label>
                                                                <select id="Genero_Cliente" name="Genero_Cliente" class="form-control">
                                                                <option value="Masculino">Masculino</option>
                                                                <option value="Femenino">Femenino</option>
                                                                <option value="Otro">Otro</option>
                                                                </select>
                                                            </div>                                           
                                                            <div class="form-group col-md-4">
                                                                <label for="Fecha_Nacimiento">Fecha de nacimiento</label>
                                                                <input type="text" class="form-control DateTime" id="Fecha_Nacimiento" name="Fecha_Nacimiento" placeholder="Fecha de nacimiento" data-mask="9999/99/99" required data-parsley-required-message="Por favor, digite una fecha de nacimiento">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Telefono_Cliente">Teléfono</label>
                                                                <input type="text" class="form-control validaTel" id="Telefono_Cliente" name="Telefono_Cliente" placeholder="Teléfono móvil">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Celular_Cliente">Celular</label>
                                                                <input type="text" class="form-control validaTel" id="Celular_Cliente" name="Celular_Cliente" placeholder="Teléfono celular" required data-parsley-required-message="Por favor, digite un teléfono">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Email_Cliente">Email</label>
                                                                <input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="cbbDepartamentos">Departamento</label>
                                                                <select id="cbbDepartamentos" name="cbbDepartamentos" class="select" data-placeholder="Elige un departamento ..." required data-parsley-required-message="Por favor, selecione un departamento">
                                                                    <option value="">.::Seleccionar::.</option>
                                                                    <?php 
                                                                    foreach ($datos->result() as $departamentos) { 
                                                                    ?>
                                                                    <option value="<?= $departamentos->Id_Departamento ?>"><?= $departamentos->Nombre_Departamento ?></option>
                                                                      <?php  } ?>         
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="cbbMunicipios">Municipio</label>
                                                                <select id="cbbMunicipios" name="cbbMunicipios" class="select" data-placeholder="Elige un municipio..." required data-parsley-required-message="Por favor, selecione un municipio">
                                                                    <option value="">.::Seleccionar::.</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Zona">Zona </label>
                                                                <select id="Zona" name="Zona" class="form-control">
                                                                <option value="">.::Seleccionar::.</option>
                                                                <option value="Rural">Rural</option>
                                                                <option value="Urbana">Urbana</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="Domicilio_Cliente">Dirección</label>
                                                                <textarea id="Domicilio_Cliente" rows="3" name="Domicilio_Cliente" class="form-control resize" required data-parsley-required-message="Por favor, escriba una dirección"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="Observaciones">Observaciones</label>
                                                                <textarea id="Observaciones" rows="3" name="Observaciones" class="form-control resize"></textarea>
                                                                <input type="text" hidden name="urlImg" id="urlImg">
                                                            </div>
                                                        </div>
                                       
                                           
                                       </div><!--FIN DEL DIV PARA VALIDAR-->
                                            
                                                        <ul class="list-inline pull-left">
                                                            <li><a id="btnFoto" class="btn btn-info waves-effect waves-light m-b-5" data-toggle="modal" data-target="#myModalEdit"><i class="fa fa-camera fa-lg"></i> Agregar Foto</a></li>
                                                        </ul>
                                                        <ul class="pull-right">
                                                            <li><!--**********BOTONES**************-->
                                                                <a href="<?= base_url() ?>Clientes/gestionarCliente" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
                                                                <a  id="btnGuardar" class="btn btn-success waves-effect waves-light m-b-5 btn-info-full guardar1"><i class="fa fa-save fa-lg"></i> Guardar</a> 
                                                                <a id="btn" class="btn btn-primary waves-effect waves-light m-b-5 next-step siguiente1" style="display: none;"><i class="fa fa-share fa-lg"></i> Siguiente</a>
                                                            </li>
                                                        </ul>
                                                     </form>
                                                    </div>
                                                <!--Final del formulario Para insertar-->
                                                <!--Tab Panel 4-->
                                                <!--Tab Panel 4.1-->
                                                <!--FORMULARIO PARA INSERTAR DATOS LABORALES DEL CLIENTE-->
                                                    <div role="tabpanel" class="tab-pane empleado" style="display: none;">
                                                <form id="DLaborales" role="form" method="POST" action="<?= base_url()?>Clientes/datosLaborales" autocomplete="off">
                                                        <div class="mar_che_cobrar3">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                  <label><h5>Cliente: <span id="NombreTipoClienteEmpleado" style="color: gray;"></span></h5></label>
                                                                <!--===============CAMPO OCULTO================-->
                                                                 <input type="hidden" id="Id_Cliente1" name="Fk_Id_Cliente" class="style" readonly="true">
                                                               </div>
                                                                <div class="form-group col-md-6">
                                                                  <label><h5>Tipo de cliente: <span id="TipoClienteEmpleado" style="color: gray;"></span></h5></label>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Nombre_Empresa">Nombre de la empresa</label>
                                                                <input type="text" class="form-control" id="Nombre_Empresa" name="Nombre_Empresa" placeholder="Nombre de la empresa" required data-parsley-required-message="Por favor, escriba el nombre de la empresa">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Cargo">Cargo que desempeña</label>
                                                                <input type="text" class="form-control" id="Cargo" name="Cargo" placeholder="Cargo que desempeña">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Telefono">Teléfono</label>
                                                                <input type="text" class="form-control validaTel" id="Telefono" name="Telefono" placeholder="Teléfono" required data-parsley-required-message="Por favor, digite un teléfono">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="Direccion">Dirección de la empresa</label>
                                                                <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Dirección de empresa" required data-parsley-required-message="Por favor, escriba una dirección">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="Rubro">Rubro de la empresa en que trabaja</label>
                                                                <input type="text" class="form-control" id="Rubro" name="Rubro" placeholder="Rubro de la empresa">
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="Observaciones">Observaciones</label>
                                                                <textarea id="Observaciones" rows="3" name="Observaciones" class="form-control resize"></textarea>
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline pull-right">
                                                            <li><a href="<?= base_url() ?>Clientes/gestionarCliente" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
                                                            <button type="submit" id="btnTipoEmpleado" class="btn btn-success waves-effect waves-light m-b-5 btn-info-full"><i class="fa fa-save fa-lg"></i> Guardar</button></li>
                                                        </ul>
                                                </form>
                                                    </div>
                                                    <!--FINAL DEL FORMULARIO PARA INSERTAR DATOS LABORALES-->
                                                <!--Tab Panel 4.2-->
                                                <!--FORMULARIO PARA INSERTAR DATOS DEL NEGOCIO DEL CLIENTE-->
                                                    <div role="tabpanel" class="tab-pane empresario" style="display: none;">
                                                <form id="DNegocio" role="form" method="POST" action="<?= base_url()?>Clientes/datosNegocio" autocomplete="off">
                                                        <div class="mar_che_cobrar3">
                                                            <div class="row">
                                                              <div class="form-group col-md-6">
                                                                  <label><h5>Cliente: <span id="NombreTipoClienteEmpresario" style="color: gray;"></span></h5></label>
                                                                  <!--===============CAMPO OCULTO================-->
                                                                <input type="hidden" id="Id_Cliente2" name="Fk_Id_Cliente" class="style" readonly="true">
                                                               </div>
                                                                <div class="form-group col-md-6">
                                                                  <label><h5>Tipo de cliente: <span id="TipoClienteEmpresario" style="color: gray;"></span></h5></label>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="Nombre_Negocio">Nombre del negocio</label>
                                                                <input type="text" class="form-control" id="Nombre_Negocio" name="Nombre_Negocio" placeholder="Nombre del negocio" required data-parsley-required-message="Por favor, escriba un nombre">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="NIT">NIT</label>
                                                                <input type="text" class="form-control" id="NIT" name="NIT" placeholder="NIT" data-mask="9999-999999-999-9">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="NRC">Número de Registro del Contribuyente(NRC)</label>
                                                                <input type="text" class="form-control" id="NRC" name="NRC" placeholder="Número de Registro del Contibuyente" data-mask="9999-999999-999-9">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="Giro">Giro</label>
                                                                <input type="text" class="form-control" id="Giro" name="Giro" placeholder="Giro del negocio">
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-7">
                                                                <label for="Direccion_Negocio">Dirección del negocio</label>
                                                                <input type="text" class="form-control" id="Direccion_Negocio" name="Direccion_Negocio" placeholder="Dirección del negocio" required data-parsley-required-message="Por favor, escriba una dirección">
                                                            </div>
                                                            <div class="form-group col-md-5">
                                                                <label for="Tipo_Factura">Tipo de factura</label>
                                                                <input type="text" class="form-control" id="Tipo_Factura" name="Tipo_Factura" placeholder="Tipo factura">
                                                            </div>
                                                        </div>
                                                        <ul class=" pull-right">
                                                            <li><a href="<?= base_url() ?>Clientes/gestionarCliente" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
                                                            <button type="submit" id="Guardar" class="btn btn-success waves-effect waves-light m-b-5 btn-info-full btnTipoEmpresario"><i class="fa fa-save fa-lg"></i> Guardar</button></li>
                                                        </ul>
                                                </form>
                                                    </div>
                                                    <!--FINAL DEL FORMULARIO PARA INSERTAR DATOS DEL NEGOCIO DEL CLIENTE-->
                                                <!-- Fin Tab Panel 4-->
                                                <div class="clearfix"></div>
                                            </div>
                                         </div>
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
<!--MODAL PARA LA FOTO-->
<!-- MODAL PARA EDITAR --> 
<div id="myModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Foto de cliente</h4>
            </div>
            <div class="modal-body" >
                <div id="errorFoto" style="display:none;" class="alert alert-danger">
                <h4>Por favor complete los campos requeridos para poder agregar la foto</h4> 
                </div>
                <div id="errorCamara" style="display:none;" class="alert alert-danger">
                <h4>Al parecer no tiene configurada una camara en este equipo, contacte al administrador</h4> 
                </div>
                <video id="video" width="200" style="width: 100%; height: auto;"></video>
                <br>
                <div align="center">
                <button class="btn btn-success block waves-effect waves-light m-b-5" id="boton"><i class="fa fa-camera fa-lg"></i> Tomar foto</button>
                <a class="btn btn-default block waves-effect waves-light m-b-5" id="Cancel"  data-dismiss="modal" aria-hidden="true"><i class="fa fa-close fa-lg"></i> Cerrar</a>
                <p id="estado"></p>
                <canvas id="canvas" style="display: none;"></canvas>                                 
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--FINAL DEL MODAL-->
<script>
$(document).ready( function() {
    //funcion para sacar el codigo del cliente:
    $('#Nombre_Cliente').on('change', function(){
        //alert('funciona');
        generarCodigo();
    });
    $('#Apellido_Cliente').on('change', function(){
        //alert('funciona');
        generarCodigo();
    });
    $('#Dui_Cliente').on('change', function(){
        //alert('funciona');
        generarCodigo();
    });
   $('input, select, textarea').parsley();
   //*********************************CODIGO PARA VALIDAR BOTON GUARDAR************************************************
    function curIndex() {
    // Return the current index by looking at which section has the class 'current'
    return $sections.index($sections.filter('.current'));
    }
    var $sections = $('.form-section');
   $('#btnGuardar').click(function(){
    $sections
      .removeClass('current')
      .eq(0)
      .addClass('current');
    $('.demo-form').parsley().whenValidate({
        group: 'block-' + curIndex()
        }).done(function() {
            $.ajax({
                url:"<?= base_url()?>Clientes/InsertarCliente",
                type:"POST",
                data:$('#basic-form').serialize(),
                success:function(respuesta){
                    //alert('hola');
                    var regi=eval(respuesta);
                    //alert(regi[0]['Id_Cliente']);
                    $('#Id_Cliente1').val(regi[0]['Id_Cliente']);
                    $('#Id_Cliente2').val(regi[0]['Id_Cliente']);
                    // $("#NombreTipoClienteEmpleado").val($("#Nombre_Cliente").val());
                    // $("#TipoClienteEmpleado").val($("#select").val());
                    // $("#NombreTipoClienteEmpresario").val($("#Nombre_Cliente").val());
                    // $("#TipoClienteEmpresario").val($("#select").val());
                    if(regi[0]['Tipo_Cliente']=="Otro" || regi[0]['Tipo_Cliente']==""){
                        self.location ="<?= base_url()?>Clientes/gestionarCliente";
                    }
                }     
            });
        });
    });
    // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
    $sections.each(function(index, section) {
        $(section).find('input, select, textarea').attr('data-parsley-group', 'block-' + index);
    });
   //************************* FIN DEL CODIGO PARA VALIDAR EL BOTON GUARDAR********************************************
   //*************************CODIGO PARA VALIDAR OTRO BOTON SIGUIENTE*************************************************
    $('#btn').click(function(){
    $sections
      .removeClass('current')
      .eq(0)
      .addClass('current');
    $('.demo-form').parsley().whenValidate({
        group: 'block-' + curIndex()
        }).done(function() {
            $.ajax({
                url:"<?= base_url()?>Clientes/InsertarCliente",
                type:"POST",
                
                data:$('#basic-form').serialize(),
                success:function(respuesta){
                    //alert('hola');
                    var regi=eval(respuesta);
                    //alert(regi[0]['Id_Cliente']);
                    $('#Id_Cliente1').val(regi[0]['Id_Cliente']);
                    $('#Id_Cliente2').val(regi[0]['Id_Cliente']);

                    var $n1 = $("#Nombre_Cliente").val();
                    var $n2 = $("#Apellido_Cliente").val();
                    var $hg = $n1 +" "+ $n2;

                    $("#NombreTipoClienteEmpleado").text($hg);
                    $("#TipoClienteEmpleado").text($("#select").val()); 

                    $("#NombreTipoClienteEmpresario").text($hg);
                    $("#TipoClienteEmpresario").text($("#select").val());

                    if(regi[0]['Tipo_Cliente']=="Otro" || regi[0]['Tipo_Cliente']==""){
                        self.location ="<?= base_url()?>Clientes/gestionarCliente";
                    }
                    else{
                        var $r = $("#select").val();
                        if ($r === "Empleado") {
                            $("#cliente1").hide();
                            $(".empleado").show();
                        } 
                        if ($r === "Comerciante") {
                            $("#cliente1").hide();
                            $(".empresario").show();
                        }
                        var $active = $('.wizard .nav-tabs li.active');
                        $active.next().removeClass('disabled');
                        nextTab($active);
                        function nextTab(elem) {
                        $(elem).next().find('a[data-toggle="tab"]').click();
                        }
                    }
                }     
            });
        });
    });
//*************************FIN DEL CODIGO PARA VALIDAR BOTON SIGUIENTE******************************************


//*************************CODIGO PARA VALIDAR FORMULARIO DE DATOS DE EMPLEADOS*********************************
    //Aqui no se ejecuta el envento click del boton si no el evento submit del formulario
   $('#DLaborales').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  });
//*************************FIN DEL CODIGO PARA VALIDAR FORMULARIO DE EMPLEADOS********************************

//*************************CODIGO PARA VALIDAR FORMULARIO DE DATOS DE NEGOCIO*********************************
   //Aqui no se ejecuta el envento click del boton si no el evento submit del formulario
   $('#DNegocio').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  });
//*************************FIN DEL CODIGO PARA VALIDAR FORMULARIO DE DATOS DE NEGOCIO*************************
   $("#cbbDepartamentos").change(function () {
      $('#cbbMunicipios').each(function(){
          $('#cbbMunicipios option').remove();
      })
      $.ajax({
             url: "obtenerMunicipios",
             type: "GET",
             data: {ID:$(this).val()},
            success:function(respuesta){
                var registro = eval(respuesta);
                    if (registro.length > 0)
                    {
                        var opciones = "";
                        for (var i = 0; i < registro.length; i++) 
                        {
                            opciones += "<option value='"+ registro[i]["Id_Municipio"] +"'>"+ registro[i]["Nombre_Municipio"] +"</option>";
                        }
                        $("#cbbMunicipios").append(opciones);
                    }
                }
             });

   });

/*|||||||--------FUNCION PARA TOMAR LA FOTO----------------||||||*/

function tieneSoporteUserMedia() {
    //VALIDAR EL NAVEGADOR Y SI ES COMPATIBLE
    return !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
}
function _getUserMedia() {
    //USAR EL ELEMENTO MEDIA QUE ES PARA ACCEDER A LA CAMARA
    return (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);
}
$("#btnFoto").click(function(){
   // Declaramos elementos del DOM
   var dui=$('#Dui_Cliente').val();
   if(dui==""){
    //alert('error');
    document.getElementById('errorFoto').style.display='block';
   }else{
    document.getElementById('errorFoto').style.display='none';
    document.getElementById('errorCamara').style.display='none';
    var $video = document.getElementById("video"),
    $canvas = document.getElementById("canvas"),
    $boton = document.getElementById("boton"),
    $estado = document.getElementById("estado");
    if (tieneSoporteUserMedia()) {
        _getUserMedia(
        {video: true},
        function (stream) {
            console.log("Permiso concedido");
            //$video.src = window.URL.createObjectURL(stream);
            $video.srcObject=stream;
            $video.play();
            //Escuchar el click
            $boton.addEventListener("click", function(){
                //Pausar reproducción
                $video.pause();
                //Obtener contexto del canvas y dibujar sobre él
                var contexto = $canvas.getContext("2d");
                $canvas.width = $video.videoWidth;
                $canvas.height = $video.videoHeight;
                contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);
                var foto = $canvas.toDataURL(); //Esta es la foto, en base 64
                $estado.innerHTML = "Enviando foto. Por favor, espera...";
                var xhr = new XMLHttpRequest();
                //var dui="2222222";
                xhr.open("POST", "TomarFoto?dui="+dui+"&indicador=1", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send(encodeURIComponent(foto)); //Codificar y enviar
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                        console.log("La foto fue enviada correctamente");
                        console.log(xhr);
                        $estado.innerHTML = "Foto guardada con éxito.";
                        //alert(xhr.responseText);//AQUI ESTA LA RUTA DE LA IMAGEN
                        $('#urlImg').val(xhr.responseText);
                        $video.pause();//PAUSAR EL VIDEO
                        stream.stop();//CERRAR LA CAMARA
                                //$video.src="";
                    }
                }
            });
        }, 
        function (error) {
            console.log("Permiso denegado o error: ", error);
            document.getElementById('errorCamara').style.display='block';
        });
    }
    else{
        $(document).ready(function(){
          $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Lo siento. Tu navegador no soporta esta característica');
        });
        $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
    }
}
});

$("#select").change( function() {
                if ($(this).val() === "") {
                    $(".siguiente1").hide();
                    $(".guardar1").show();
                }
                if ($(this).val() === "Otro") {
                    $(".siguiente1").hide();
                    $(".guardar1").show();
                }
                if ($(this).val() === "Empleado") {
                    $(".siguiente1").show();
                    $(".guardar1").hide();
                } 
                if ($(this).val() === "Comerciante") {
                    $(".siguiente1").show();
                    $(".guardar1").hide();
                }
            });
});
function generarCodigo(){
    var Name = $('#Nombre_Cliente').val();
    var apellido = $('#Apellido_Cliente').val();
    var dui=$('#Dui_Cliente').val();
    nombre = Name.trim();
    Apllido = apellido.trim();
    arregloNombre = nombre.split(" ");
    arregloApellido = apellido.split(" ");
    sizeName = arregloNombre.length;
    sizeApellido = arregloApellido.length;
    
    newDui= dui.replace("-", "");
    codigo = arregloNombre[0][0] + arregloNombre[sizeName-1][0] +arregloApellido[0][0]+arregloApellido[sizeApellido-1][0]+newDui;
    if(Name!="" && apellido!="" && dui!=""){
         // alert('el codigo es: '+codigo);
         $('#Codigo_Cliente').val(codigo);
    }
}
</script>
