<?php 
foreach ($cliente->result() as $datos_cliente) {
}
?> 
            <?php if($this->session->flashdata("errorr")):?>
              <script type="text/javascript">
                $(document).ready(function(){
                $.Notification.autoHideNotify('error', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("errorr")?>');
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
                    <h3>EDITAR INFORMACIÓN DEL CLIENTE CODIGO <?php echo $datos_cliente->Codigo_Cliente?></h3>
                       <div class="row">
                           <form id="FormEditarCliente" method="POST" action="<?= base_url()?>Clientes/editarCliente" autocomplete="off">
                              <div class="form-row">
                              <!--*******************************CAMPOS OCULTOS**********************************-->
                              <input type="hidden" name="id_cliente" value="<?php echo $datos_cliente->Id_Cliente; ?>">
                              <input type="hidden" name="departamento" value="<?= $datos_cliente->Fk_Id_Departamento;?>">
                              <input type="hidden" name="municipio" value="<?php echo $datos_cliente->Fk_Id_Municipio;?>">
                              <input type="hidden" name="condicion" value="<?php echo $datos_cliente->Condicion_Actual_Cliente;?>">
                              <input type="hidden" name="estado_civil" value="<?php echo $datos_cliente->Estado_Civil_Cliente;?>">
                              <input type="hidden" name="Tipo_Cliente" id="Tipo_Cliente" value="<?php echo $datos_cliente->Tipo_Cliente;?>">
                              <!--FIN DE CAMPOS OCULTOS-->
                                    <div class="form-group col-md-6">
                                          <label for="Nombre_Cliente">Nombre</label>
                                          <input type="text" class="form-control" id="Nombre_Cliente" name="Nombre_Cliente" value="<?= $datos_cliente->Nombre_Cliente ?>" placeholder="Nombre del cliente">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Apellido_Cliente">Apellido</label>
                                          <input type="text" class="form-control" id="Apellido_Cliente" name="Apellido_Cliente" value="<?= $datos_cliente->Apellido_Cliente ?>" placeholder="Apellido del cliente">
                                    </div>
                              </div>


                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="cbbDepartamentos">Cambiar Departamento</label>
                                          <select id="cbbDepartamentos" name="cbbDepartamentos" class="select" onchange="javascript:document.all('departamento').value=this.value;" data-placeholder="Elige un Departamento ...">
                                            <option style="background-color:red; color:white;" value="<?= $datos_cliente->Fk_Id_Departamento;?>"><?= $datos_cliente->Nombre_Departamento?></option>
                                          <?php 
                                            foreach ($datos->result() as $departamentos) {
                                          ?>
                                            <option value="<?= $departamentos->Id_Departamento ?>"><?= $departamentos->Nombre_Departamento ?></option>

                                          <?php  } ?>
                                          </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="cbbMunicipios">Cambiar Municipio</label>
                                          <select id="cbbMunicipios" name="cbbMunicipios" class="select" onchange="javascript:document.all('municipio').value=this.value;" data-placeholder="...">
                                            <option style="background-color:red; color:white;" value="<?php echo $datos_cliente->Fk_Id_Municipio;?>"><?= $datos_cliente->Nombre_Municipio?></option>
                                          </select>
                                    </div>
                              </div> 

                              

                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Condicion_Cliente">Cambiar Condición actual</label>
                                          <select onchange="javascript:document.all('condicion').value=this.value;" id="Condicion_Cliente" name="Condicion_Cliente" class="form-control">
                                            <option style="background-color:red; color:white;" value="<?php echo $datos_cliente->Condicion_Actual_Cliente;?>"><?php echo $datos_cliente->Condicion_Actual_Cliente;?></option>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                          </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Estado_Cliente">Cambiar Estado civil</label>
                                          <select onchange="javascript:document.all('estado_civil').value=this.value;" id="Estado_Cliente" name="Estado_Cliente" class="form-control">
                                          <option style="background-color:red; color:white;" value="<?php echo $datos_cliente->Estado_Civil_Cliente;?>"><?php echo $datos_cliente->Estado_Civil_Cliente;?></option>
                                            <option value="Soltero/a">Soltero/a</option>
                                            <option value="Casado/a">Casado/a</option>
                                            <option value="Divorsiado/a">Divorciado/a</option>
                                          </select>
                                    </div>
                              </div>

                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Genero_Cliente">Genero</label>
                                          <input type="text" id="Genero_Cliente" name="Genero_Cliente" class="form-control" value="<?= $datos_cliente->Genero_Cliente?>">
                                         
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Telefono_Cliente">Teléfono fijo</label>
                                          <input type="text" class="form-control" id="Telefono_Cliente" name="Telefono_Cliente" placeholder="Teléfono móvil" value="<?= $datos_cliente->Telefono_Fijo_Cliente?>" data-mask="(999) 9999-9999? x99999">
                                    </div>
                              </div>

                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Celular_Cliente">Teléfono celular</label>
                                          <input type="text" class="form-control" id="Celular_Cliente" name="Celular_Cliente" placeholder="Teléfono celular" value="<?= $datos_cliente->Telefono_Celular_Cliente?>" data-mask="(999) 9999-9999? x99999">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Fecha_Nacimiento">Fecha de nacimiento</label>
                                          <input type="text" class="form-control DateTime" id="Fecha_Nacimiento" name="Fecha_Nacimiento" placeholder="Fecha de nacimiento" value="<?= $datos_cliente->Fecha_Nacimiento_Cliente?>" data-mask="9999/99/99">
                                    </div>
                              </div>

                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Zona">Zona</label>
                                          <input type="text" id="Zona" name="Zona" class="form-control" value="<?= $datos_cliente->Zona_Cliente?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Dui_Cliente">DUI</label>
                                          <input type="text" class="form-control" id="Dui_Cliente" name="Dui_Cliente" placeholder="DUI del cliente" value="<?= $datos_cliente->DUI_Cliente?>" data-mask="99999999-9">
                                    </div>
                              </div>

                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Nit_Cliente">NIT</label>
                                          <input type="text" class="form-control" id="Nit_Cliente" name="Nit_Cliente" placeholder="NIT del cliente" value="<?= $datos_cliente->NIT_Cliente?>" data-mask="9999-999999-999-9">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Fecha_Registro">Fecha de registro</label>
                                          <input type="text" class="form-control DateTime" id="Fecha_Registro" name="Fecha_Registro" placeholder="Fecha de registro del cliente" value="<?= $datos_cliente->Fecha_Registro_Cliente?>" data-mask="9999/99/99">
                                    </div>
                              </div>
                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Profesion_Cliente">Profesión</label>
                                          <input type="text" class="form-control" id="Profesion_Cliente" name="Profesion_Cliente" placeholder="Profesión del cliente" value="<?= $datos_cliente->Profesion_Cliente?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Tipo_Clien">Cambiar Tipo de cliente</label>
                                          <select id="Tipo_Clien" onchange="javascript:document.all('Tipo_Cliente').value=this.value;"  class="form-control">
                                            <option style="background-color:red; color:white;" value="<?php echo $datos_cliente->Tipo_Cliente;?>"><?php echo $datos_cliente->Tipo_Cliente;?></option>
                                            <option value="Empleado">Empleado</option>
                                            <option value="Empresario">Empresario</option>
                                          </select>
                                    </div>
                              </div>

                               <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Domicilio_Cliente">Domicilio</label>
                                          <textarea id="Domicilio_Cliente" rows="3" name="Domicilio_Cliente" class="form-control resize"
                                          value="<?= $datos_cliente->Domicilio_Cliente?>"><?= $datos_cliente->Domicilio_Cliente?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Observaciones">Observaciones</label>
                                          <textarea id="Observaciones" rows="3" name="Observaciones" class="form-control resize"
                                          value="<?= $datos_cliente->Observaciones_Cliente?>"><?= $datos_cliente->Observaciones_Cliente?></textarea>
                                    </div>
                              </div>
                              <button type="submit" class="btn btn-primary" onclick="hh()">Siguiente</button>
                            </form>
                       </div>   <!-- row -->    


                    </div>
                </div>
            </div>
<script type="text/javascript">
/*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/

$(document).ready(function(){
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
/*fin de la funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
</script>