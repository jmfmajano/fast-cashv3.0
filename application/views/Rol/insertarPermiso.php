
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
            <li><a href="<?= base_url() ?>Rol/index">Gestión de Permisos</a></li>
            <li class="active">Asignar Permiso</li>
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
                    <h3 class="panel-title">asignación de Permisos</h3>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <!-- Formulario del empleado  -->
              <form method="post" action="<?= base_url()?>Rol/Guardar" autocomplete="off" id="FormNuevoPermiso" name="FormNuevoPermiso">
                <div class="margn">  
                    <div class="row">
                       <div class="form-group col-md-5">
                         <div class="mar_che_cobrar2" style="padding: 15px; border-radius: 5px;">                 
                           <label for="txtNombre">Seleccionar el tipo de acceso</label>
                            <select id="idPermiso" name="idPermiso" onchange="validar(this.value)" class="select" data-placeholder="Seleccionar acceso">
                              <option value="1">.::Seleccionar acceso::.</option>
                              <?php
                                foreach ($datosRol->result() as $c) {
                                  # code...
                                    echo '<option value="'.$c->idAcceso.'">'.$c->tipoAcceso.'</option>';
                                }
                              ?>
                            </select>
                          </div>
                      </div>                
                      <div class="col-md-3"></div>
                      <div class="col-md-4" align="right">
                          <img src="<?= base_url()?>plantilla/images/prueba.png" class="img-thumbnail">
                      </div>                
                    </div>                 
                    <div class="alert alert-warning" role="alert" id="msj" style="display: none;">
                      <div class="row">
                        <div class="col-md-11">
                          <h4>Aviso!</h4> 
                        </div>
                        <div class="col-md-1" align="right">
                            <i class="fa fa-ban fa-lg"></i>
                        </div>
                      </div>
                      <hr>
                      <p>El rol que ha seleccionado ya tiene permisos asignados.</p>
                    </div>

                    <div class="alert alert-info" role="alert" id="msjSelect">
                      <div class="row">
                        <div class="col-md-11">
                          <h4>Aviso!</h4> 
                        </div>
                        <div class="col-md-1" align="right">
                            <i class="fa fa-info-circle fa-lg"></i>
                        </div>
                      </div>
                      <hr>
                      <p>Por favor selecione un rol al cual desea asignarle permisos.</p>
                    </div>
                    
                  <div class="row">
                    <div id="divPermiso" style="display: none;">
                      <!-- trabajando -->
                         <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="margn">
                            <table class="table">
                              <thead class="thead thead1">
                                <tr class="tr tr1">
                                  <th class="th th1">Menu del Sistema</th>
                                  <th class="th th1">Estado de Permiso</th>
                                </tr>
                              </thead>
                              <tbody class="tbody tbody1">
                              <?php
                              $c = 0;
                              foreach ($datosMenu->result() as  $menu) {
                                $c = $c + 1;
                              ?>
                              <tr class="tr tr1">
                                <td class="td td1" data-label="Menu del Sistema" style="border: none;">
                                  <div class="mar_che_cobrar2" style="padding: 8px; background: #F4F6F6;">
                                  <i class="fa fa-address-book fa-lg" style="color: #00CC00;"></i> <strong style='text-decoration: underline;'><?= $menu->menu?></strong>
                                  </div>
                                </td>
                                <td class="td td1" data-label="Estado de Permiso" style="border: none; width: 150px;">
                                  <input type="checkbox" name="menu[]" id="menu" class="flipswitch" value="<?= $menu->idMenu?>">
                                </td>
                              </tr>
                              <?php
                              }
                              ?>
                                  
                              </tbody>
                            </table>
                          </div>
                          <br>
                          <button type="submit" id="submit" class="btn btn-success waves-effect waves-light m-d-5"><i class="fa fa-floppy-o fa-lg"></i> Asignar Permiso</button>
                          <button type="reset" class="btn btn-default waves-effect waves-light m-d-5"><i class="fa fa-refresh fa-lg"></i> Limpiar</button>
                          <a href="<?= base_url() ?>Rol/index" class="btn btn-default waves-effect waves-light m-d-5"><i class="fa fa-close fa-lg"></i> Cancelar</a>
                        </div>
                  </div>
                  </div>                 
                      <!-- trabajando -->
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

<script type="text/javascript">

$(document).ready(function() {
    $("#submit").on("click", function(e) {
        var condiciones = $('input[type="checkbox"]').is(":checked");        
        if (!condiciones) {
            $.Notification.autoHideNotify('error', 'top center', 'Aviso!', 'Por favor seleccione un Permiso');
            e.preventDefault();
        }
    });
});
 
  function validar(id){

    //alert('id'+$('#idCredito').val());
    ide = $('#idPermiso').val();
    if(ide != "1")
    {   
      //cargar el ultimo pago si lo hay si no carga los datos del credito directamente
      $.ajax({
        url:"<?= base_url()?>Rol/validarPermisos",
        type:"GET",
        data:{Id:ide},
        success:function(respuesta){
          var registro = eval(respuesta);
         // alert('aaaaa');
          if (registro.length > 0)
          {
            $("#msjSelect").hide('slow/1000/slow');
            $("#msj").show('slow/1000/slow');
            $("#divPermiso").hide('slow/1000/slow'); 
          }
          else
          { 
            $("#msjSelect").hide('slow/1000/slow');
            $("#msj").hide('slow/1000/slow');
            $("#divPermiso").show('slow/1000/slow'); 
          }
        }//cierre succes
      }); //cierre de ajax
     }else{
      $("#msj").hide('slow/1000/slow');
      $("#divPermiso").hide('slow/1000/slow'); 
      $("#msjSelect").show('slow/1000/slow');
     }
  }//cierre de la funcion change
</script>