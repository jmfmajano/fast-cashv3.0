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
                    <li class="active">Creditos</li>
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
                            <h3 class="panel-title">Registro de créditos</h3>
                          </div>
                          <div class="col-sm-6">
                            <a title="Nuevo" data-toggle="tooltip" href="<?= base_url();?>Solicitud/" class="btn btn-primary waves-effect waves-light m-b-5"><i class="fa fa-plus-circle"></i> <span>Nuevo Crédito<span></a>
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
                                      <th class="th th1" scope="col">Cliente</th>
                                      <th class="th th1" >Tipo de Crédito</th>
                                      <th class="th th1" >Total a Pagar</th>
                                      <th class="th th1" >Total Abonado</th>
                                      <th  class="th th1">Acción</th>
                                    </tr>
                                  </thead>
                                  <tbody class="tbody tbody1">
                                   <?php  
                                    $i = 0;
                                    if(!empty($registros)){
                                    foreach ($registros->result() as $creditos) {
                                    $i = $i +1;
                                    if($creditos->estadoCredito=="Finalizado"){
                                    ?>
                                    <tr class="tr tr1" style="background-color:#F8F9F9;">
                                      <td class="td td1" data-label="#" style="min-width: 10px; width: auto;"><b><?= $i;?></b></td>
                                      <td class="td td1" data-label="Código de Cliente"><?= $creditos->Codigo_Cliente?></td>
                                      <td class="td td1" data-label="Cliente"><?= $creditos->Nombre_Cliente?>  <?=  $creditos->Apellido_Cliente?></td>

                                      <?php 
                                        if ($creditos->tipoCredito == "Crédito popular")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #626567;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($creditos->tipoCredito == "Crédito popular mixto")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #DC7633;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($creditos->tipoCredito == "Crédito popular prendario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #0B5345;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($creditos->tipoCredito == "Crédito popular hipotecario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #2980B9;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($creditos->tipoCredito == "Crédito personal")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #666699;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }                                        
                                        if ($creditos->tipoCredito == "Crédito personal hipotecario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #3F51B5;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                        if ($creditos->tipoCredito == "Crédito personal prendario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #AFB42B;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                        if ($creditos->tipoCredito == "Crédito personal mixto")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #9C640C;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                      ?>

                                      <td class="td td1" data-label="Total a Pagar"><span class="label label-success" style="font-size: 1.2rem; font-family: Arial;">$ <?= $creditos->capital?></span></td>
                                      <td class="td td1" data-label="Total Abonado"><span class="label label-success" style="font-size: 1.2rem; font-family: Arial;">$ <?= $creditos->totalAbonado?></span></td>
                                      <td class="td td1" data-label="Acción" style="min-width: 90px;">
                                        <a href="<?= base_url()?>Creditos/DetalleCredito?id=<?= $creditos->idCredito?>&cc=<?= $creditos->codigoCredito?>" title='Ver crédito' data-toggle="tooltip" class='waves-effect waves-light ver'><i class='fa fa-folder'></i></a>
                                      </td>
                                    </tr>
                                    <?php
                                  }
                                  else{
                                    ?>
                                     <tr class="tr tr1">
                                      <td class="td td1" data-label="#" style="min-width: 10px; width: auto;"><b><?= $i;?></b></td>
                                      <td class="td td1" data-label="Código de Cliente"><?= $creditos->Codigo_Cliente?></td>
                                      <td class="td td1" data-label="Cliente"><?= $creditos->Nombre_Cliente?>  <?=  $creditos->Apellido_Cliente?></td>
                                      
                                      <?php 
                                        if ($creditos->tipoCredito == "Crédito popular")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #626567;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($creditos->tipoCredito == "Crédito popular mixto")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #DC7633;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($creditos->tipoCredito == "Crédito popular prendario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #0B5345;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($creditos->tipoCredito == "Crédito popular hipotecario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #2980B9;"><i class="fa fa-id-card-o fa-lg" ></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                        }
                                        if ($creditos->tipoCredito == "Crédito personal")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #666699;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }                                        
                                        if ($creditos->tipoCredito == "Crédito personal hipotecario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #3F51B5;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                        if ($creditos->tipoCredito == "Crédito personal prendario")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #AFB42B;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                        if ($creditos->tipoCredito == "Crédito personal mixto")
                                        {
                                          echo '<td class="td td1" data-label="Tipo crédito"><span class="label label-success" style="background-color: #9C640C;"><i class="fa fa-id-card-o fa-lg"></i>&nbsp;'.$creditos->tipoCredito.'<span></td>'; // Poner icono
                                          
                                        }
                                      ?>

                                      <td class="td td1" data-label="Total a Pagar"><span class="label label-default" style="font-size: 1.2rem; font-family: Arial;">$ <?= $creditos->capital?></span></td>
                                      <td class="td td1" data-label="Total Abonado"><span class="label label-warning" style="font-size: 1.2rem; font-family: Arial;">$ <?= $creditos->totalAbonado?></span></td>
                                      <td class="td td1" data-label="Acción" style="min-width: 90px;">
                                        <a href="<?= base_url()?>Creditos/DetalleCredito?id=<?= $creditos->idCredito?>&cc=<?= $creditos->codigoCredito?>" title='Ver crédito' data-toggle="tooltip" class='waves-effect waves-light ver'><i class='fa fa-folder'></i></a>
                                         <a style="display: none;" href="<?= base_url()?>Pagos/PagarCredito?Id=<?= $creditos->idCredito?>" title='Realizar&nbsp;pago' data-toggle="tooltip" class='waves-effect waves-light agregar'><i class='fa fa-money'></i></a>
                                      </td>
                                    </tr>
                                    <?php
                                  }
                                  }} ?>
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
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
