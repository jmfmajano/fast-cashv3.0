<?php if($this->session->flashdata("guardar")):?>
  <script type="text/javascript">
    $(document).ready(function(){
    $.Notification.autoHideNotify('success', 'top center', 'Aviso!', '<?php echo $this->session->flashdata("guardar")?>');
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
                    <h4 class="pull-left page-title">Inicio</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active"><i class="fa fa-bookmark fa-lg"></i></li>
                    </ol>
                </div>
            </div>

            

            <!-- Basic Form Wizard -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">Libro mayor</h3> 
                        </div> 
                        <div class="panel-body"> 
                        <div class="row">
                          <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                  <th colspan="3" class="text-center">Balance de comprobación Fast Cash</th>
                                </tr>
                                
                                <tr>
                                  <td><strong>Cuenta</strong></td>
                                  <td><strong>Debe</strong></td>
                                  <td><strong>Haber</strong></td>
                                </tr>
                                  <?php
                                    $totalDebe=0;
                                    $totalHaber=0;
                                    $finalDebe=0;
                                    $finalHaber=0;
                                    foreach ($datos as $cuenta)
                                    {
                                      $totalDebe=0;
                                      $totalHaber=0;
                                  ?>
                                      <?php 
                                          $detalle = $this->PartidasModel->LibroMayorExtra($cuenta->idCuenta)->result();
                                          foreach ($detalle as $det)
                                          {
                                            $totalDebe = $totalDebe + $det->debe;
                                            $totalHaber = $totalHaber + $det->haber;
                                      ?>
                                      <?php }?> <!-- Aqui termina el segundo foreach -->

                                      <?php 
                                      if ($totalDebe> $totalHaber)
                                        {
                                          $finalDebe = $finalDebe + ($totalDebe - $totalHaber);
                                          $finalHaber = $finalHaber + 0;
                                    ?>
                                          <tr>
                                            <td><?= $cuenta->NombreCuenta  ?></td>
                                            <td>$<?= $totalDebe - $totalHaber  ?></td>
                                            <td>$0</td>
                                          </tr>
                                    <?php 
                                        }
                                        else
                                        {
                                          $finalDebe = $finalDebe + 0;
                                          $finalHaber = $finalHaber + ($totalHaber - $totalDebe);
                                    ?>
                                          <tr>
                                            <td><?= $cuenta->NombreCuenta  ?></td>
                                            <td>$0</td>
                                            <td>$<?= $totalHaber - $totalDebe  ?></td>
                                          </tr>
                                    <?php 
                                          
                                        }
                                  ?>
                                                                                      
                                  <?php 
                                    }
                                  ?>
                                  <tr>
                                    <td class="text-center alert-warning"><strong>SALDOS</strong></td>
                                    <td class="text-center alert-warning"><strong>$<?= $finalDebe ?></strong></td>
                                    <td class="text-center alert-warning"><strong>$<?= $finalHaber ?></strong></td>
                                  </tr>
                                  </table>
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
