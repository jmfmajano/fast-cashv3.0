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
                  <!-- <h4 class="pull-left page-title">Clientes</h4> -->
                  <ol class="breadcrumb pull-right">
                      <li><a href="<?= base_url() ?>Home/Main">Inicio</a></li>
                      <li class="active">Gestión de clientes</li>
                  </ol>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <!-- <h3 class="panel-title">Registro de clientes</h3> -->
					              <div class="table-title">
					                <div class="row">
					                  <div class="col-sm-5">
					                    <h3 class="panel-title">Registro de clientes</h3>
					                  </div>
					                  <div class="col-sm-7">
					                      <a title="Nuevo" data-toggle="tooltip" href="<?= base_url();?>Clientes/" class="btn btn-primary waves-effect waves-light m-b-5"><i class="fa fa-plus-circle"></i> <span>Nuevo Cliente<span></a>
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
                                    <th class="th th1" scope="col">Código de Cliente</th>
                                    <th class="th th1" scope="col">Nombre</th>
                                    <th class="th th1" scope="col">Apellido</th>            
                                    <th class="th th1" scope="col">Tipo</th>
                                    <th class="th th1">Acción</th>
                                </thead>
                                <tbody class="tbody tbody1">
                                <?php
                                $i = 0;
                                if(!empty($registro)){
                                foreach ($registro->result() as $clientes) {
                                  $i = $i +1;
                                $tipo = "'".$clientes->Tipo_Cliente."'"
                                ?>
                                  <tr class="tr tr1">
                                    <td class="td td1" width="10" data-label="#"><b><?= $i;?></b></td>
                                    <td class="td td1" width="150" data-label="Código Cliente"><?= $clientes->Codigo_Cliente?></td>
                                    <td class="td td1" data-label="Nombre"><?= $clientes->Nombre_Cliente?></td>
                                    <td class="td td1" data-label="Apellido"><?= $clientes->Apellido_Cliente?></td>
                                    <td class="td td1" width="100" data-label="Tipo"><?= $clientes->Tipo_Cliente?></td>
                                    <td class="td td1" data-label="Acción">
                                      <a title="Ver historial" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="MostrarInfo(<?= $clientes->Id_Cliente?>, <?php echo $tipo;?>)" class="waves-effect waves-light ver"><i class="fa fa-info-circle"></i></a>

                                      <a title="Editar" data-toggle="tooltip" href="<?=base_url()?>Clientes/Editar?id=<?= $clientes->Id_Cliente?>" class="waves-effect waves-light editar"><i class="fa fa-pencil-square"></i></a>

                                      <a title="Eliminar" onclick="Delete(<?= $clientes->Id_Cliente?>)" class="waves-effect waves-light eliminar" data-id="<?= $clientes->Id_Cliente?>" data-toggle="modal" data-target=".modal_eliminar_cliente"><i class="fa fa-times-circle"></i></a>
                                    </td>
                                  </tr>
                                  <?php
                                  }
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
            </div> <!-- End Row -->
        </div>
    </div>
</div>

        <!--MODAL PARA MOSTRAR LA INFORMACION COMPLETA-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="limpiar()">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel"><i class="fa fa-list-alt fa-lg"></i> Detalle del cliente</h4>
                    </div>
                    <div class="modal-body" >
                      <div id="fotoE" style="display:none;">
                          <div id="errorFoto" style="display:none;" class="alert alert-danger">
                            <h4>Por favor complete los campos requeridos para poder agregar la foto</h4> 
                          </div>
                          <video id="video" width="200" geight="100" style="width: 100%; height: auto;"></video>
                          <br>
                          <div align="center">
                            <button class="btn btn-success block waves-effect waves-light m-b-5" id="boton"><i class="fa fa-camera fa-lg"></i> Tomar foto</button>
                           <a class="btn btn-default block waves-effect waves-light m-b-5" id="Cancel"  data-dismiss="modal" aria-hidden="true"><i class="fa fa-close fa-lg"></i> Cerrar</a>
                          <p id="estado"></p>
                          <canvas id="canvas" style="display: none;"></canvas>                                 
                        </div>
                      </div>
                        <div id="divInfo">
                          <input type="hidden" name='nombre' id="id" class="style" readonly='readonly'>
                        </div>
                        <div id="DivEmpleado" style="display:none;">
                          <form id="DLaboralesRe" method="POST" action="<?= base_url()?>Clientes/datosLaborales">
                            <div class="margn">
                              <div class="row">
                                <input type="hidden" id="Fk_Id_Cliente" name="Fk_Id_Cliente" value="<?php //echo $dato->Id_Cliente; ?>">
                                <div class="form-group col-md-4">
                                  <label for="Nombre_Empresa">Nombre de la empresa</label>
                                  <input type="text" class="form-control" id="Nombre_Empresa" name="Nombre_Empresa" placeholder="Nombre de la empresa">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="Cargo">Cargo que desempeña</label>
                                  <input type="text" class="form-control" id="Cargo" name="Cargo" placeholder="Cargo que desempeña">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="Telefono">Teléfono</label>
                                  <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Teléfono">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="Direccion">Dirección de la empresa</label>
                                  <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Dirección de la empresa">
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
                              <div  align="center">
                                <button type="submit" class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
                                <button type="reset" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                                <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <div id="DivEmpresario" style="display:none;">
                          <form id="DNegocioRe" method="POST" action="<?= base_url()?>Clientes/datosNegocio">
                            <div class="margn">
                              <div class="row">
                                <input type="hidden" id="Fk_Id_Cliente2" name="Fk_Id_Cliente">
                                <div class="form-group col-md-6">
                                  <label for="Nombre_Negocio">Nombre del negocio</label>
                                  <input type="text" class="form-control" id="Nombre_Negocio" name="Nombre_Negocio" placeholder="Nombre del negocio">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="NIT">NIT</label>
                                  <input type="text" class="form-control" id="NIT" name="NIT" placeholder="NIT" data-mask="9999-999999-999-9">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="NRC">Número de Registro del Contribuyente(NRC)</label>
                                  <input type="text" class="form-control" id="NRC" name="NRC" placeholder="Número de Registro del Contibuyente">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="Giro">Giro</label>
                                  <input type="text" class="form-control" id="Giro" name="Giro" placeholder="Giro del negocio">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-7">
                                  <label for="Direccion_Negocio">Dirección del negocio</label>
                                  <input type="text" class="form-control" id="Direccion_Negocio" name="Direccion_Negocio" placeholder="Dirección del negocio">
                                </div>
                                <div class="form-group col-md-5">
                                  <label for="Tipo_Factura">Tipo de factura</label>
                                  <input type="text" class="form-control" id="Tipo_Factura" name="Tipo_Factura" placeholder="Tipo de factura">
                                </div>
                              </div>
                              <div align="center">
                                <button type="submit" class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-save fa-lg"></i> Guardar</button>
                                <button type="reset" class="btn btn-default waves-effect waves-light m-b-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                                <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal" onclick="limpiar()"><i class="fa fa-close fa-lg"></i> Cerrar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        
                    </div>
                    
                    <div class="modal-body" id="divInfo">
                        <input type="hidden" name='nombre' id="id" class="" readonly='readonly'>
                    </div>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--FIN DEL MODAL PARA MOSTRAR DATOS-->
        <!--MODAL PARA ELIMINAR DATOS-->
	    <div class="modal fade modal_eliminar_cliente" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
	        <div class="modal-dialog modal-sm">
	            <div class="modal-content">
	                <form name="frmeliminarcliente" action="<?= base_url();?>Clientes/Eliminar/" id="frmeliminarcliente" method="GET">
	                <div>
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                    <h4 class="modal-title" id="mySmallModalLabel">
	                    	<i class="fa fa-warning fa-lg text-danger"></i> 
	                    </h4>
	                </div>
	                <div class="modal-body">
	                  <input type="hidden"  id="Id" name='id'>
	                  <p align="center">¿Está seguro de eliminar el cliente?</p>
	                </div>
	                <div align="center">
	                    <button type="submit" class="btn btn-danger block waves-effect waves-light m-b-5"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                      <button type="button" class="btn btn-default block waves-effect waves-light m-b-5" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Cerrar</button>
	                </div>
	                </form>
	            </div><!-- /.modal-content -->
	        </div><!-- /.modal-dialog -->
	    </div><!-- /.modal -->
      <script type="text/javascript">
    function Delete(id){
      document.getElementById('Id').value=id;
    }
    </script>
      <!-- FIN DEL MODAL PARA ELIMINAR DATOS-->
    <!-- SCRIPT DEL MODAL PARA MOSTRAR DATOS-->
	  <script type="text/javascript">
		//funcion para cargar los datos en modal con ajax
		function MostrarInfo(id, TipoCliente){
      var id2=id;
      //alert(id2);
      document.getElementById('divInfo').innerHTML= "";
			if(TipoCliente != ""){
        //alert(id2);

			var html ="<div class='margn'><ul><h5><b>Información del Cliente</b></h5><ol>";
			 $.ajax({
             url: "obtenerInfoCliente",
             type: "POST",
             data: {ID:id, tipo:TipoCliente},
            success:function(respuesta){
                var registro = eval(respuesta);
                    if (registro.length > 0)
                    {
                      html += "<div class='row' id='DivInfoC'>"; 
                       if(registro[0]['urlImg']==""){
                       $('[data-toggle="tootli"]').tooltip();
                        var dui = registro[0]['DUI_Cliente'];
                        var id =registro[0]['Id_Cliente'];
                        //alert(dui);
                        html +="<div class='col-sm-2' align='left' style='z-index: 999;'><img id='Imgvacia' class='img-thumbnail img-responsive zoom1' width='100' src='<?=base_url()?>plantilla/images/user1.png' alt='Imagen del Cliente' style='z-index: 99; position: relative;'></img><div style='z-index: 9;'><a class='btn btn-info btn-block btn-custom waves-effect waves-light m-b-5 btn-xs' onclick='FotoA("+dui+","+id+",1)' style='margin-top: 5px;'><i class='fa fa-camera'></i> Agregar foto</a></div></div>";
                      }
                      else{
                        var dui = '"'+registro[0]['DUI_Cliente']+'"';
                        var id =registro[0]['Id_Cliente'];
                        //alert(dui);
                        html +="<div id='ImgDivCliente' class='col-sm-2' align='left' style='z-index: 999;'><img id='ImgD'  class='img-thumbnail img-responsive zoom' width='100' src='<?=base_url()?>"+registro[0]['urlImg']+"' alt='Imagen del Cliente' style='z-index: 99; position: relative;'></img><div style='z-index: 9;'><a class='btn btn-success btn-block btn-custom waves-effect waves-light m-b-5 btn-xs' onclick='FotoA("+dui+","+id+",2)' style='margin-top: 5px;'><i class='fa fa-camera'></i> Editar foto</a></div></div>";
                      }                    
                      //html +="<div class='row'><div class='col-sm-6'><label>Condición actual:&nbsp;</label><input type='text' name='nombre' class='style' readonly='readonly' value='"+registro[0]['Condicion_Actual_Cliente']+"'></div>";
                      html += "<div class='col-sm-10'>";
                      html +="<div class='row'><div class='col-sm-6'><label>Nombre:&nbsp;</label>"+registro[0]['Nombre_Cliente']+" "+registro[0]['Apellido_Cliente']+"</div>";
                      html +="<div class='col-sm-6'><label>Estado civil:&nbsp;</label>"+registro[0]['Estado_Civil_Cliente']+"</div></div>";

                      html +="<div class='row'><div class='col-sm-6'><label>Genero:&nbsp;</label>"+registro[0]['Genero_Cliente']+"</div>";
                      html +="<div class='col-sm-6'><label>Teléfono Fijo:&nbsp;</label><span style='color: #2E86C1; text-decoration: underline;'>"+registro[0]['Telefono_Fijo_Cliente']+"</span></div></div>";

                      html +="<div class='row'><div class='col-sm-6'><label>Teléfono Celular:&nbsp;</label><span style='color: #2E86C1; text-decoration: underline;'>"+registro[0]['Telefono_Celular_Cliente']+"</span></div>";
                      html +="<div class='col-sm-6'><label>Domicilio:&nbsp;</label>"+registro[0]['Domicilio_Cliente']+"</div></div>";

                      html +="<div class='row'><div class='col-sm-6'><label>Fecha de nacimiento:&nbsp;</label>"+registro[0]['Fecha_Nacimiento_Cliente']+"</div>";
                      html +="<div class='col-sm-6'><label>Zona:&nbsp;</label>"+registro[0]['Zona_Cliente']+"</div></div>";

                      html +="<div class='row'><div class='col-sm-6'><label>DUI:&nbsp;</label>"+registro[0]['DUI_Cliente']+"</div>";
                      html +="<div class='col-sm-6'><label>NIT:&nbsp;</label>"+registro[0]['NIT_Cliente']+"</div></div>";

                      html +="<div class='row'><div class='col-sm-6'><label>Correo:&nbsp;</label><span style='color: #2E86C1; text-decoration: underline;'>"+registro[0]['email']+"</span></div>";
                      html +="<div class='col-sm-6'><label>Departamento:&nbsp;</label>"+registro[0]['Nombre_Departamento']+"</div></div>";

                      html +="<div class='row'><div class='col-sm-6'><label>Municipio:&nbsp;</label>"+registro[0]['Nombre_Municipio']+"</div>";
                      html +="<div class='col-sm-6'><label>Profesión u Oficio:&nbsp;</label>"+registro[0]['Profesion_Cliente']+"</div></div>";

                      html +="<div class='row'><div class='col-sm-6'><label>Ingreso Mensual:&nbsp;</label>"+"$"+" "+registro[0]['ingreso']+"</div>";
                      html +="<div class='col-sm-6'><label>Tipo de cliente:&nbsp;</label>"+registro[0]['Tipo_Cliente']+"</div></div>";

                      html +="<div class='row'><div class='col-sm-6'><label>Observaciones:&nbsp;</label>"+registro[0]['Observaciones_Cliente']+"</div></div>";
                      html+="</ol></ul>";
                      html+="<hr>"

                      if(registro[0]['Tipo_Cliente']=="Empleado"){
                        html+="<ul><h5><b>Información Laboral</b></h5><ol>";
                        html += "<div class='row'>"; 
                        html += "<div class='col-sm-2'></div>"; 
                        html += "<div class='col-sm-10'>"; 
                        html +="<div class='row'><div class='col-sm-6'><label>Nombre de la empresa:&nbsp;</label>"+registro[0]['Nombre_Empresa']+"</div>";
                        html +="<div class='col-sm-6'><label>Cargo:&nbsp;</label>"+registro[0]['Cargo']+"</div></div>";

                        html +="<div class='row'><div class='col-sm-6'><label>Rubro:&nbsp;</label>"+registro[0]['Rubro']+"</div>";
                        html +="<div class='col-sm-6'><label>Teléfono:&nbsp;</label><span style='color: #2E86C1; text-decoration: underline;'>"+registro[0]['Telefono']+"</span></div></div>";

                        html +="<div class='row'><div class='col-sm-6'><label>Dirección:&nbsp;</label>"+registro[0]['Direccion']+"</div>";
                        html +="<div class='col-sm-6'><label>Observaciones:&nbsp;</label>"+registro[0]['Observaciones']+"</div></div>";
                        
                        html+="</ol></ul>"
                      }
                      else if(registro[0]['Tipo_Cliente']=="Empresario"){
                        html+="<ul><h5><b>Información del Negocio propio</b></h5><ol>";
                        html += "<div class='row'>"; 
                         html += "<div class='col-sm-2'></div>"; 
                         html += "<div class='col-sm-10'>"; 
                        html +="<div class='row'><div class='col-sm-6'><label>Nombre del Negocio:&nbsp;</label>"+registro[0]['Nombre_Negocio']+"</div>";
                        html +="<div class='col-sm-6'><label>NIT:&nbsp;</label>"+registro[0]['NIT']+"</div></div>";

                        html +="<div class='row'><div class='col-sm-6'><label>NRC:&nbsp;</label>"+registro[0]['NRC']+"</div>";
                        html +="<div class='col-sm-6'><label>Giro:&nbsp;</label>"+registro[0]['Giro']+"</div></div>";

                        html +="<div class='row'><div class='col-sm-6'><label>Dirección del negocio:&nbsp;</label>"+registro[0]['Direccion_Negocio']+"</div>";
                        html +="<div class='col-sm-6'><label>Tipo de factura emitida:&nbsp;</label>"+registro[0]['Tipo_Factura']+"</div></div>";                      
                        html+="</ul>"
                      }
                      else if(registro[0]['Tipo_Cliente']=="Otro"){
                        html+="<div class='alert alert-success'><h4>Cliente con fuente de ingresos diferentes</h4></div>"
                      }
                      html+="<br><div align='center'><button type='button' class='btn btn-default block waves-effect waves-light m-b-5' data-dismiss='modal'><i class='fa fa-close fa-lg'></i> Cerrar</button></div>";
                        document.getElementById('DivEmpleado').style.display='none';
                        document.getElementById('DivEmpresario').style.display='none';
                      //document.getElementById('divInfo').innerHTML= html;
                    }
                    else {
                      html="<div class='alert alert-danger'><p>El cliente no tiene completa su información de: "+TipoCliente+" completar en el siguiente formulario.</p></div>";
                        if (TipoCliente=="Empleado") {
                            document.getElementById('DivEmpleado').style.display='block';
                            document.getElementById('DivEmpresario').style.display='none';
                            document.getElementById('Fk_Id_Cliente').value=id2;
                        }
                        else if(TipoCliente=="Empresario"){
                            document.getElementById('DivEmpleado').style.display='none';
                            document.getElementById('DivEmpresario').style.display='block';
                            document.getElementById('Fk_Id_Cliente2').value=id2;
                        }
                      //html="<div class='alert alert-danger'></div>";
                    }
                    html+="</div>";
                    document.getElementById('Fk_Id_Cliente').value=id2;
                    document.getElementById('divInfo').innerHTML= html;
                }
             }); 
    }
  }
    function limpiar(){
        $('#Nombre_Empresa').val("");
        $('#Cargo').val("");
        $('#Direccion').val("");
        $('#Telefono').val("");
        $('#Rubro').val("");
        $('#Observaciones').val("");

        $('#Nombre_Negocio').val("");
        $('#NIT').val("");
        $('#NRC').val("");
        $('#Giro').val("");
        $('#Direccion_Negocio').val("");
        $('#Tipo_Factura').val("");
    }
    function FotoA(dui, id, param){
      //alert('dui'+dui);
      //alert('Id'+id);
      document.getElementById('divInfo').style.display='none';
      document.getElementById('fotoE').style.display='block';
      // Declaramos elementos del DOM
      document.getElementById('errorFoto').style.display='none';
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
                  xhr.open("POST", "TomarFoto?dui="+dui+"&indicador=2&id="+id, true);
                  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhr.send(encodeURIComponent(foto)); //Codificar y enviar
                  xhr.onreadystatechange = function() {
                      if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                          console.log("La foto fue enviada correctamente");
                          console.log(xhr);
                          $estado.innerHTML = "Foto guardada con éxito.";
                          //alert(xhr.responseText);//AQUI ESTA LA RUTA DE LA IMAGEN
                          //$('#urlImg').val(xhr.responseText);
                          if(xhr.responseText=="error"){
                          	$(document).ready(function(){
				                $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Error al modificar la foto');
				              });
                          }
                          else{
                            
                            if(param==1){
                              $(document).ready(function(){
				                $.Notification.autoHideNotify('success', 'top center', 'Aviso!', 'Foto guardada con exito');
				              });
                              document.getElementById('Imgvacia').src="<?= base_url()?>"+xhr.responseText;
                            }
                            else if(param==2){
                              $(document).ready(function(){
				                $.Notification.autoHideNotify('warning', 'top center', 'Aviso!', 'Foto modificada con exito.<br>Es necesrio actualizar la pagina!');
				              });
				              redirectTime = "5000";
							  redirectURL = "<?= base_url()?>Clientes/gestionarCliente";
						      setTimeout("self.location = redirectURL;",redirectTime);
                            }                            
                            document.getElementById('divInfo').style.display='block';
                            document.getElementById('fotoE').style.display='none';
                          }
                          $video.pause();//PAUSAR EL VIDEO
                          stream.stop();//CERRAR LA CAMARA
                                  //$video.src="";
                      }
                  }
              });
          }, 
          function (error) {
              console.log("Permiso denegado o error: ", error);
              $estado.innerHTML = "No se puede acceder a la cámara, no dio clic en permitir.";
          });
      }
      else{
          $(document).ready(function(){
            $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Lo siento. Tu navegador no soporta esta característica');
          });
          $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
      }
    }
    //==================== EDITAR FOTO
  function tieneSoporteUserMedia() {
    //VALIDAR EL NAVEGADOR Y SI ES COMPATIBLE
    return !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
  } 
  function _getUserMedia() {
    //USAR EL ELEMENTO MEDIA QUE ES PARA ACCEDER A LA CAMARA
    return (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);
  }
</script>
    <!-- FIN DEL SCRIPT DEL MODAL PARA MOSTRAR DATOS-->


