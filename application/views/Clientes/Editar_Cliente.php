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
<?php 
    foreach ($cliente->result() as $datos_cliente) {
    }
?> 
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
                                    <li class="active">Actualizar cliente</li>
                                </ol>
                            </div>
                        </div>
                        
                        <!-- Basic Form Wizard -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">ACTUALIZAR INFORMACIÓN DEL CLIENTE CODIGO <?php echo $datos_cliente->Codigo_Cliente?></h3>
                                    </div> 
                                    <div class="panel-body">
                                        <div class="wizard">
                                          <div role="tabpanel">
                                              <!-- Nav tabs -->
                                            <ul class="nav nav-tabs nav-justified nav-tabs-dropdown nav-pills" role="tablist">
                                                <li role="presentation" class="active"><a href="#cliente1" class="btn-block waves-effect waves-light" aria-controls="cliente" role="tab" data-toggle="tab" style="pointer-events: none;cursor: default;">Información personal del Cliente</a></li>
                                                <li role="presentation" class="disabled" id="tabsEmpleado"><a href="#empleado" class="btn-block waves-effect waves-light" aria-controls="empleado" role="tab" data-toggle="tab" style="pointer-events: none;cursor: default;">Información tipo del Cliente</a></li>
                                                <div class="clearfix"></div>
                                            </ul>
                                              <!-- Tab panes --> 
                                            <div class="tab-content margn top">
                                                <!--Tab Panel 1-->
                                                <div class="tab-pane active" role="tabpanel" id="cliente1">
                                                   <form role="form" id="basic-form" method="POST" action="<?= base_url()?>Clientes/editarCliente" autocomplete="off" class="demo-form">
                                                    <!--*******************************CAMPOS OCULTOS***************************-->
                                                      <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $datos_cliente->Id_Cliente;?>">
                                                      <input type="hidden" name="departamento" value="<?= $datos_cliente->Fk_Id_Departamento;?>">
                                                      <input type="hidden" name="municipio" value="<?php echo $datos_cliente->Fk_Id_Municipio;?>">
                                                     
                                                      <input type="hidden" name="estado_civil" value="<?php echo $datos_cliente->Estado_Civil_Cliente;?>">

                                                      <input type="hidden" id="tipoC"  name="tipoC" value="<?php echo $datos_cliente->Tipo_Cliente;?>">
                                                      
                                                      <!--FIN DE CAMPOS OCULTOS-->
                                            <div class="row form-section">
                                               <div class="mar_che_cobrar2">
                                                        <div class="row">
                                                            <div class="form-group col-md-3">
                                                                    <label for="Tipo_Cliente">Tipo de cliente</label>
                                                                    <select id="select" name="Tipo_Cliente" class="form-control">
                                                                        <?php 
                                                                        if($datos_cliente->Tipo_Cliente == "Otro"){ 
                                                                            echo "
                                                                            <option value='Otro' style='background-color:green; color:white;'>Otro</option>
                                                                            <option value='Empleado'>Empleado</option>
                                                                            <option value='Comerciante'>Comerciante</option>
                                                                            ";
                                                                            }
                                                                        if($datos_cliente->Tipo_Cliente == "Empleado"){ 
                                                                            echo "
                                                                            <option value='Empleado' style='background-color:green; color:white;'>Empleado</option>
                                                                            <option value='Otro'>Otro</option>
                                                                            <option value='Comerciante'>Comerciante</option>
                                                                            ";
                                                                            } 
                                                                         if($datos_cliente->Tipo_Cliente == "Comerciante"){ 
                                                                            echo "
                                                                            <option value='Comerciante' style='background-color:green; color:white;'>Comerciante</option>
                                                                            <option value='Otro'>Otro</option>
                                                                            <option value='Empleado'>Empleado</option>
                                                                            ";
                                                                            }                         
                                                                        ?>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group col-md-6"></div>
                                                            <div class="form-group col-md-3">
                                                                    <label for="Ingreso_Mensual">Ingreso Mensual</label>
                                                                    <input type="text" class="form-control validaDigit" id="Ingreso_Mensual" name="Ingreso_Mensual" placeholder="Ingreso mensual"  required data-parsley-required-message="Por favor, digite un ingreso" value="<?= $datos_cliente->ingreso ?>">
                                                            </div>
                                                        </div>    
                                                    </div>    
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="Codigo_Cliente">Código</label>
                                                            <input type="text" class="form-control" id="Codigo_Cliente" name="Codigo_Cliente" placeholder="Código del cliente" required data-parsley-required-message="Por favor, código requerido" value="<?= $datos_cliente->Codigo_Cliente ?>" readonly="true">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="Nombre_Cliente">Nombre</label>
                                                            <input type="text" class="form-control" id="Nombre_Cliente" name="Nombre_Cliente" placeholder="Nombre del cliente" required data-parsley-required-message="Por favor, escriba un nombre" value="<?= $datos_cliente->Nombre_Cliente ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="Apellido_Cliente">Apellido</label>
                                                            <input type="text" class="form-control" id="Apellido_Cliente" name="Apellido_Cliente" placeholder="Apellido del cliente" required data-parsley-required-message="Por favor, escriba un apellido" value="<?= $datos_cliente->Apellido_Cliente ?>">
                                                        </div>
                                                    </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Dui_Cliente">DUI</label>
                                                                        <input type="text" class="form-control" id="Dui_Cliente" name="Dui_Cliente" placeholder="DUI del cliente" data-mask="9999999-9" required data-parsley-required-message="Por favor, digite un DUI" value="<?= $datos_cliente->DUI_Cliente ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Nit_Cliente">NIT</label>
                                                                        <input type="text" class="form-control" id="Nit_Cliente" name="Nit_Cliente" placeholder="NIT del cliente" data-mask="9999-999999-999-9" value="<?= $datos_cliente->NIT_Cliente ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Prpofesion_Cliente">Profesion</label>
                                                                        <input type="text" class="form-control" id="Prpofesion_Cliente" name="Profesion_Cliente" placeholder="Profesión del cliente" value="<?= $datos_cliente->Profesion_Cliente ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Estado_Cliente">Estado Civil</label>
                                                                        <select onchange="javascript:document.all('estado_civil').value=this.value;" id="Estado_Cliente" name="Estado_Cliente" class="form-control">
                                                                  <option style="background-color:green; color:white;" value="<?php echo $datos_cliente->Estado_Civil_Cliente;?>"><?php echo $datos_cliente->Estado_Civil_Cliente;?></option>
                                                                    <option value="Soltero/a">Soltero/a</option>
                                                                    <option value="Casado/a">Casado/a</option>
                                                                    <option value="Divorsiado/a">Divorciado/a</option>
                                                                  </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Genero_Cliente">Genero</label>
                                                                        <select id="Genero_Cliente" name="Genero_Cliente" class="form-control">
                                                                        <option style="background-color:green; color:white;" value="<?php echo $datos_cliente->Genero_Cliente;?>"><?php echo $datos_cliente->Genero_Cliente;?></option>
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino">Femenino</option>
                                                                        <option value="Otro">Otro</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Fecha_Nacimiento">Fecha de nacimiento</label>
                                                                        <input type="text" class="form-control DateTime" id="Fecha_Nacimiento" name="Fecha_Nacimiento" placeholder="Fecha de nacimiento" data-mask="9999/99/99" required data-parsley-required-message="Por favor, digite una fecha de nacimiento"
                                                                        value="<?php echo $datos_cliente->Fecha_Nacimiento_Cliente;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Telefono_Cliente">Teléfono</label>
                                                                        <input type="text" class="form-control validaTel" id="Telefono_Cliente" name="Telefono_Cliente" placeholder="Teléfono móvil" value="<?= $datos_cliente->Telefono_Fijo_Cliente?>">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Celular_Cliente">Celular</label>
                                                                        <input type="text" class="form-control validaTel" id="Celular_Cliente" name="Celular_Cliente" placeholder="Teléfono celular" required data-parsley-required-message="Por favor, digite un teléfono" value="<?= $datos_cliente->Telefono_Celular_Cliente?>">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Email">Email</label>
                                                                        <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" value="<?= $datos_cliente->email?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="cbbDepartamentos">Departamento</label>
                                                                        <select id="cbbDepartamentos" name="cbbDepartamentos" class="select" data-placeholder="Elige un departamento ..." required data-parsley-required-message="Por favor, selecione un departamento">
                                                                            <option style="background-color:green; color:white;" value="<?= $datos_cliente->Fk_Id_Departamento;?>"><?= $datos_cliente->Nombre_Departamento?></option>
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
                                                                            <option style="background-color:green; color:white;" value="<?php echo $datos_cliente->Fk_Id_Municipio;?>"><?= $datos_cliente->Nombre_Municipio?></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Zona">Zona </label>
                                                                        <select id="Zona" name="Zona" class="form-control">
                                                                        <option style="background-color:green; color:white;" value="<?php echo $datos_cliente->Zona_Cliente;?>"><?= $datos_cliente->Zona_Cliente?></option>
                                                                        <option value="Rural">Rural</option>
                                                                        <option value="Urbana">Urbana</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="Domicilio_Cliente">Dirección</label>
                                                                        <textarea id="Domicilio_Cliente" rows="3" name="Domicilio_Cliente" class="form-control resize" ><?= $datos_cliente->Domicilio_Cliente?></textarea>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="Observaciones">Observaciones</label>
                                                                       <textarea id="Observaciones" rows="3" name="Observaciones" class="form-control resize"
                                                                  value="<?= $datos_cliente->Observaciones_Cliente?>"><?= $datos_cliente->Observaciones_Cliente?></textarea>
                                                                    </div>
                                                                </div>
                                                    </div><!--FIN DEL DIV PARA VALIDAR-->
                                                        <ul class="pull-right">
                                                            <li><!--**********BOTONES**************-->
                                                                <a href="<?= base_url() ?>Clientes/gestionarCliente" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
                                                                <a  id="btnA" class="btn btn-warning waves-effect waves-light m-b-5 btn-info-full guardar1 next-step"><i class="fa fa-pencil fa-lg"></i> Actualizar</a> 
                                                                
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </form>
                                                <!-- </div> -->
                                                
                                                <!--Final del formulario Para ACTUALIZAR-->

                                                <!--Tab Panel 4-->
                                                <!--Tab Panel 4.1-->

                                                <!--FORMULARIO PARA ACTUALIZAR DATOS LABORALES DEL CLIENTE-->

                                                    <div role="tabpanel" class="tab-pane empleado" style="display: none;">
                                                <form id="DLaborales" role="form" method="POST" action="<?= base_url()?>Clientes/EditardatosLaborales" autocomplete="off">
                                                    <div class="mar_che_cobrar3">
                                                        <div class="row">
                                                          <div class="form-group col-md-6">
                                                            <label><h5>Cliente: <span id="NombreTipoClienteEmpleado" style="color: gray;"></span></h5></label>
                                                            <!--===============CAMPO OCULTO================-->
                                                             <input type="hidden" id="Id_Cliente1" name="Fk_Id_Cliente" class="style" readonly="true">
                                                             <input type="hidden"  id="Accion1" name="Accion" class="style" readonly="true">
                                                           </div>
                                                            <div class="form-group col-md-6">
                                                               <label><h5>Tipo de cliente: <span id="TipoClienteEmpleado" style="color: gray;"></span></h5></label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="aler" class="alert alert-danger" role="alert" style="display:none;">
                                                        <strong>Alerta!</strong> Por favor tener en cuenta la elección del Tipo de cliente.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Nombre_Empresa">Nombre de la empresa</label>
                                                                <input type="text" class="form-control" id="Nombre_Empresa" name="Nombre_Empresa" placeholder="Nombre de la empresa" required data-parsley-required-message="Por favor, escriba el nombre de la empresa">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Cargo">Cargo que desempeña</label>
                                                                <input type="text" class="form-control" id="Cargo" name="Cargo" placeholder="Cargo que desempeña" >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="Telefono">Teléfono</label>
                                                                <input type="text" class="form-control validaTel" id="Telefono" name="Telefono" placeholder="Teléfono" required data-parsley-required-message="Por favor, digite un teléfono">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="Direccion">Dirección de la empresa</label>
                                                                <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Dirección de empresa"
                                                                required data-parsley-required-message="Por favor, escriba una dirección">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="Rubro">Rubro de la empresa en que trabaja</label>
                                                                <input type="text" class="form-control" id="Rubro" name="Rubro" placeholder="Rubro de la empresa">
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="Observaciones1">Observaciones</label>
                                                                <textarea id="Observaciones1" rows="3" name="Observaciones" class="form-control resize"></textarea>
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline pull-right">
                                                            <li><a href="<?= base_url() ?>Clientes/gestionarCliente" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
                                                            <button type="submit" class="btn btn-warning waves-effect waves-light m-b-5 btn-info-full"><i class="fa fa-save fa-lg"></i> Actualizar</button></li>
                                                        </ul>
                                                </form>
                                                    </div>
                                                    <!--FINAL DEL FORMULARIO PARA ACTUALIZAR DATOS LABORALES-->
                                                <!--Tab Panel 4.2-->
                                                <!--FORMULARIO PARA ACTUALIZAR DATOS DEL NEGOCIO DEL CLIENTE-->
                                                    <div role="tabpanel" class="tab-pane empresario" style="display: none;">
                                                <form id="DNegocio" role="form" method="POST" action="<?= base_url()?>Clientes/EditarDatosNegocio" autocomplete="off">
                                                    <div class="mar_che_cobrar3">
                                                        <div class="row">
                                                          <div class="form-group col-md-6">
                                                               <label><h5>Cliente: <span id="NombreTipoClienteEmpresario" style="color: gray;"></span></h5></label>
                                                              <!--===============CAMPO OCULTO================-->
                                                            <input type="hidden"  id="Id_Cliente2" name="Fk_Id_Cliente" class="style" readonly="true">
                                                             <input type="hidden" id="Accion2" name="Accion" class="style" readonly="true">
                                                           </div>
                                                            <div class="form-group col-md-6">
                                                              <label><h5>Tipo de cliente: <span id="TipoClienteEmpresario" style="color: gray;"></span></h5></label>
                                                              </div>
                                                        </div>
                                                    </div>
                                                    <div id="aler2" class="alert alert-danger" role="alert" style="display:none;">
                                                        <strong>Alerta!</strong> Usted no registro la información o actualizo el tipo de cliente puede insertar dicha informacion en el siguiente formulario.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
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
                                                            <button type="submit" id="Guardar" class="btn btn-warning waves-effect waves-light m-b-5 btn-info-full"><i class="fa fa-save fa-lg"></i> Actualizar</button></li>
                                                        </ul>
                                                </form>
                                                    </div>
                                                    <!--FINAL DEL FORMULARIO PARA ACTUALIZAR DATOS DEL NEGOCIO DEL CLIENTE-->
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

<script type="text/javascript">
/*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
$(document).ready(function(){
    //editar el codigo del cliente
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
   //*********************************CODIGO PARA VALIDAR BOTON ACTUALIZAR******************************************
   $('input, select, textarea').parsley();
    function curIndex() {
    // Return the current index by looking at which section has the class 'current'
    return $sections.index($sections.filter('.current'));
    }
    var $sections = $('.form-section');
   $('#btnA').click(function(){
   
    $sections
      .removeClass('current')
      .eq(0)
      .addClass('current');
    $('.demo-form').parsley().whenValidate({
        group: 'block-' + curIndex()
        }).done(function() {
            //-------------Ajax
            $.ajax({
            url:"<?= base_url()?>Clientes/editarCliente",
            type:"POST",
            data:$('#basic-form').serialize(),
            success:function(respuesta){  
                var regi=eval(respuesta);
                if(regi.length>0){
                    var $r3 = $("#select").val();
                    if ($r3 == "Otro") {
                        tipo=$('#tipoC').val();
                        if(tipo=="Empleado"){
                            $.ajax({
                                url:"<?= base_url()?>Clientes/EliminarDatosLaborales",
                                type:"GET",
                                data:{ID:$("#id_cliente").val()},
                                success:function(respuesta){

                                }
                            });
                        }
                        if(tipo=="Comerciante"){
                            $.ajax({
                                url:"<?= base_url()?>Clientes/EliminarDatosNegocio",
                                type:"GET",
                                data:{ID:$("#id_cliente").val()},
                                success:function(respuesta){

                                }
                            });
                    }

                                               
                    }
                    //AQUI SE VALIDA EL TIPO DE EMPLEAD
                if(regi[0]['Tipo_Cliente']=="Empleado"){
                    $("#Id_Cliente1").val($('#id_cliente').val());
                    var $v1 = $("#Nombre_Cliente").val();
                    var $v2 = $("#Apellido_Cliente").val();
                    var $vg = $v1 +" "+ $v2;
                    $("#NombreTipoClienteEmpleado").text($vg);
                    $("#TipoClienteEmpleado").text($("#select").val());
                    $("#Nombre_Empresa").val(regi[0]['Nombre_Empresa']);
                    $("#Cargo").val(regi[0]['Cargo']);
                    $("#Telefono").val(regi[0]['Telefono']);
                    $("#Direccion").val(regi[0]['Direccion']);
                    $("#Rubro").val(regi[0]['Rubro']);
                    $("#Observaciones1").val(regi[0]['Observaciones']);
                    $("#Accion1").val(1);
                    //CARGAMOS Y OCULTAMOS DIVS
                    $(".empleado").show();
                    $("#cliente1").hide(); 

                    var $active = $('.wizard .nav-tabs li.active');
                    $active.next().removeClass('disabled');
                    nextTab($active);
                    function nextTab(elem) {
                    $(elem).next().find('a[data-toggle="tab"]').click();
                    }
                }
                 if(regi[0]['Tipo_Cliente']=="Otro"){
                    window.location.href="<?= base_url()?>Clientes/gestionarCliente";
                 }
                if(regi[0]['Tipo_Cliente']=="Comerciante"){
                    $("#Id_Cliente2").val($('#id_cliente').val());
                    var $n1 = $("#Nombre_Cliente").val();
                    var $n2 = $("#Apellido_Cliente").val();
                    var $hg = $n1 +" "+ $n2;

                    $("#NombreTipoClienteEmpresario").text($hg);
                    $("#TipoClienteEmpresario").text(regi[0]['Tipo_Cliente']);

                    $('#Nombre_Negocio').val(regi[0]['Nombre_Negocio']);
                    $("#NIT").val(regi[0]['NIT']);
                    $("#NRC").val(regi[0]['NRC']);
                    $("#Giro").val(regi[0]['Giro']);
                    $("#Tipo_Factura").val(regi[0]['Tipo_Factura']);
                    $("#Direccion_Negocio").val(regi[0]['Direccion_Negocio']);
                    $("#Accion2").val(1);

                    $(".empresario").show();
                    $("#cliente1").hide();

                    var $active = $('.wizard .nav-tabs li.active');
                    $active.next().removeClass('disabled');
                    nextTab($active);
                    function nextTab(elem) {
                    $(elem).next().find('a[data-toggle="tab"]').click();
                    }
                }
                }
                else{

                    document.getElementById('aler').style.display='block';
                    document.getElementById('aler2').style.display='block';
                    $("#Accion1").val(2);
                    $("#Accion2").val(2);
                    var $r3 = $("#select").val();
                    if ($r3 === "Empleado") {
                         $.ajax({
                            url:"<?= base_url()?>Clientes/EliminarDatosNegocio",
                            type:"GET",
                            data:{ID:$("#id_cliente").val()},
                            success:function(respuesta){

                            }
                        });

                        $("#Id_Cliente1").val($('#id_cliente').val());
                        var $o1 = $("#Nombre_Cliente").val();
                        var $o2 = $("#Apellido_Cliente").val();
                        var $og = $o1 +" "+ $o2;
                        $("#NombreTipoClienteEmpleado").text($og);
                        $("#TipoClienteEmpleado").text($("#select").val());
                        $(".empleado").show();
                        $("#cliente1").hide();
                        var $active = $('.wizard .nav-tabs li.active');
                        $active.next().removeClass('disabled');
                        nextTab($active);
                        function nextTab(elem) {
                        $(elem).next().find('a[data-toggle="tab"]').click();
                        }
                    }
                    if ($r3 === "Comerciante") {
                        $.ajax({
                            url:"<?= base_url()?>Clientes/EliminarDatosLaborales",
                            type:"GET",
                            data:{ID:$("#id_cliente").val()},
                            success:function(respuesta){

                            }
                        });
                        $(".empresario").show();
                        $("#cliente1").hide();
                        $("#Id_Cliente2").val($('#id_cliente').val());

                        var $d1 = $("#Nombre_Cliente").val();
                        var $d2 = $("#Apellido_Cliente").val();
                        var $dg = $d1 +" "+ $d2;
                        $("#NombreTipoClienteEmpresario").text($dg);
                        $("#TipoClienteEmpresario").text($("#select").val());

                        var $active = $('.wizard .nav-tabs li.active');
                        $active.next().removeClass('disabled');
                        nextTab($active);
                        function nextTab(elem) {
                        $(elem).next().find('a[data-toggle="tab"]').click();
                        }
                    }
                     if ($r3 == "Otro") {

                        window.location.href="<?=base_url()?>Clientes/gestionarCliente";                       

                    }
                }  
            }     
        });


            //------------ Fin Ajax
        });
    });
    // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
    $sections.each(function(index, section) {
        $(section).find('input, select, textarea').attr('data-parsley-group', 'block-' + index);
    });
//*****************************FIN DE CODIGO PARA VALIDAR EL BOTON DE ACTUALIZAR*********************


//*************************CODIGO PARA VALIDAR FORMULARIO DE DATOS DE EMPLEADOS*****************************
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
                            //alert(opciones);
                            $("#cbbMunicipios").append(opciones);
                            //$("#cbbMunicipios").innerHTML=opciones;
                    }
                }
             });
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