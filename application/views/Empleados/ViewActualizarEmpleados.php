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
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Empleados/Index">Gestión de Empleados</a></li>
            <li class="active">Actualizar Empleado</li>
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
                    <h3 class="panel-title">Actualizar Empleado</h3>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <!-- Formulario del empleado  -->
              <form method="post" action="<?= base_url()?>Empleados/ActualizarEmpleados" autocomplete="off" id="FormEditarEmpleado">
                <div class="margn">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="hidden" name="txtid" id="txtid" value="<?php echo $data->idEmpleado ?>">
                      <label for="txtNombre">Nombre</label>
                      <input type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $data->nombreEmpleado; ?>" placeholder="Nombre del empleado">
                    </div>
                     <div class="form-group col-md-6">
                      <label for="txtApellido">Apellido</label>
                      <input type="text" class="form-control" name="txtApellido" id="txtApellido" value="<?php echo $data->apellidoEmpleado; ?>" placeholder="Apellido del empleado">
                    </div>                 
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="txtFechaNacimiento">Fecha de Nacimiento</label>
                      <input type="text" class="form-control DateTime" name="txtFechaNacimiento" id="txtFechaNacimiento" value="<?php echo $data->fechaNacimientoEmpleado; ?>" placeholder="Fecha de Nacimiento" data-mask="9999/99/99">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cboGenero">Genero</label>
                      <select class="form-control" id="cboGenero" name="cboGenero">
                        <?php if($data->genero == "Femenino"){ ?>
                        <option value="Femenino" selected>Femenino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Otros">Otro</option>
                        <?php } if($data->genero == "Masculino"){ ?>
                        <option value="Masculino" selected>Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otros">Otro</option>
                        <?php } if($data->genero == "Otros"){ ?>
                        <option value="Otros" selected>Otro</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                      <label for="txtDui">DUI</label>
                      <input type="text" class="form-control" name="txtDui" id="txtDui" value="<?php echo $data->dui; ?>" placeholder="DUI del empleado" data-mask="99999999-9">
                    </div>                  
                    <div class="form-group col-md-6">
                      <label for="txtNit">NIT</label>
                      <input type="text" class="form-control" name="txtNit" id="txtNit" value="<?php echo $data->nit; ?>" placeholder="NIT del empleado" data-mask="9999-999999-999-9">
                    </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                      <label for="txtCargo">Cargo</label>
                      <input type="text" class="form-control" name="txtCargo" id="txtCargo" value="<?php echo $data->cargo; ?>" placeholder=" Cargo del empleado">
                    </div>                  
                    <div class="form-group col-md-6">
                      <label for="txtProfesion">Profesión</label>
                      <input type="text" class="form-control" name="txtProfesion" id="txtProfesion" value="<?php echo $data->profesion; ?>" placeholder="Profesión del empleado">
                    </div>
                  </div>
                    <div class="row">
                     <div class="form-group col-md-6">
                      <label for="txtTelefono">Teléfono</label>
                      <input type="text" class="form-control validaTel" name="txtTelefono" id="txtTelefono" value="<?php echo $data->telefono; ?>" placeholder="Teléfono">
                    </div>                  
                    <div class="form-group col-md-6">
                      <label for="txtEmail">Email</label>
                      <input type="email" class="form-control" name="txtEmail" id="txtEmail" value="<?php echo $data->email; ?>" placeholder="Email del empleado">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="txtDireccion">Dirección</label>
                      <textarea class="form-control resize" name="txtDireccion" id="txtDireccion" rows="3"><?php echo $data->direccion; ?></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-warning waves-effect waves-light"><i class="fa fa-floppy-o fa-lg"></i> Actualizar</button>
                  <a href="<?= base_url() ?>Empleados/Index" class="btn btn-default waves-effect waves-light"><i class="fa fa-close fa-lg"></i> Cancelar</a>
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

