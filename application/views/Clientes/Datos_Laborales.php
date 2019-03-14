            <?php if($this->session->flashdata("guardar")):?>
              <script type="text/javascript">
                $(document).ready(function(){
                $.Notification.autoHideNotify('success', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("guardar")?>');
                });
              </script>
            <?php endif; ?>
          <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                      <!-- Basic Form Wizard -->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-default">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Registro de clientes</h3> 
                                    </div> 
                                    <div class="panel-body">

                                    <?php
                                     foreach ($id->result() as $dato) {
                                     }
                                     if($dato->Tipo_Cliente=="Empleado"){
                                      ?>
                                      <form id="FormNuevoClienteEmpresario" method="POST" action="<?= base_url()?>Clientes/datosLaborales" autocomplete="off">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="">Cliente: <?= $dato->Nombre_Cliente." ".$dato->Apellido_Cliente ?></label>
                           </div>
                            <div class="form-group col-md-6">
                              <label for="">Tipo de cliente: <?= $dato->Tipo_Cliente;?></label>
                              </div>
                        </div>
                         <div class="form-row">
                         <!--*******************************CAMPOS OCULTOS**********************************-->
                              <input type="hidden" name="Fk_Id_Cliente" value="<?php echo $dato->Id_Cliente; ?>">
                              
                              <!--FIN DE CAMPOS OCULTOS-->
                                    <div class="form-group col-md-6">
                                          <label for="Nombre_Empresa">Nombre de la empresa</label>
                                          <input type="text" class="form-control" id="Nombre_Empresa" name="Nombre_Empresa" placeholder="Nombre de la empresa">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Cargo">Cargo que desempeña</label>
                                          <input type="text" class="form-control" id="Cargo" name="Cargo" placeholder="Cargo que desempeña">
                                    </div>
                              </div>
                        <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Direccion">Dirección de la empresa</label>
                                          <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Dirección de empresa">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Telefono">Teléfono</label>
                                          <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Teléfono" data-mask="(999) 9999-9999? x99999">
                                  </div>
                        </div>
                        <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Rubro">Rubro de la empresa que en que trabaja</label>
                                          <input type="text" class="form-control" id="Rubro" name="Rubro" placeholder="Rubro de la empresa">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Ingreso_Mensual">Ingreso Mensual</label>
                                          <input type="text" class="form-control" id="Ingreso_Mensual" name="Ingreso_Mensual" placeholder="Ingreso mensual">
                                    </div>
                        </div>
                         <div class="form-row">
                                    <div class="form-group col-md-12">
                                          <label for="Observaciones">Observaciones</label>
                                           <textarea id="Observaciones" rows="3" name="Observaciones" class="form-control resize"></textarea>
                                    </div>
                        </div>
                        <div class="row">
                          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                        </div>
                        
                        </form>
                          <?php  
                       }
                       else{
                        ?><form id="FormNuevoClienteEmpleado" method="POST" action="<?= base_url()?>Clientes/datosNegocio" autocomplete="off">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label>Cliente: <?= $dato->Nombre_Cliente." ".$dato->Apellido_Cliente ?></label>
                           </div>
                            <div class="form-group col-md-6">
                              <label>Tipo de cliente: <?= $dato->Tipo_Cliente;?></label>
                              </div>
                        </div>
                         <div class="form-row">
                         <!--*******************************CAMPOS OCULTOS**********************************-->
                              <input type="hidden" name="Fk_Id_Cliente" value="<?php echo $dato->Id_Cliente; ?>">
                              <!--FIN DE CAMPOS OCULTOS-->
                                    <div class="form-group col-md-6">
                                          <label for="Nombre_Empresa">Nombre del negocio</label>
                                          <input type="text" class="form-control" id="Nombre_Empresa" name="Nombre_Negocio" placeholder="Nombre del negocio">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="NIT">NIT</label>
                                          <input type="text" class="form-control" id="NIT" name="NIT" placeholder="NIT" data-mask="9999-999999-999-9">
                                    </div>
                              </div>
                        <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="NRC">Número de Registro del Contribuyente(NRC)</label>
                                          <input type="text" class="form-control" id="NRC" name="NRC" placeholder="Número de Registro del Contibuyente" data-mask="9999-999999-999-9">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Giro">Giro</label>
                                          <input type="text" class="form-control" id="Giro" name="Giro" placeholder="Giro del negocio">
                                  </div>
                        </div>
                        <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="Direccion_Negocio">Dirección del negocio</label>
                                          <input type="text" class="form-control" id="Direccion_Negocio" name="Direccion_Negocio" placeholder="Dirección del negocio">
                                    </div>
                                    <div class="form-group col-md-6">
                                          <label for="Ingreso_Mensual">Ingreso Mensual</label>
                                          <input type="text" class="form-control" id="Ingreso_Mensual" name="Ingreso_Mensual" placeholder="Ingreso mensual">
                                    </div>
                        </div>
                         <div class="form-row">
                              <div class="form-group col-md-6">
                                          <label for="Tipo_Factura">Tipo de factura</label>
                                          <input type="text" class="form-control" id="Tipo_Factura" name="Tipo_Factura" placeholder="Tipo factura">
                                    </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">

                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
                          </div>
                           
                        </div>
                        
                        </form>
                        

                        <?php
                       }
                       ?>

                                    </div>  <!-- End panel-body -->
                                </div> <!-- End panel -->

                            </div> <!-- end col -->

                        </div>
                    </div>
              </div>
            



                                    
                       

                        

                     
                    
                          






            