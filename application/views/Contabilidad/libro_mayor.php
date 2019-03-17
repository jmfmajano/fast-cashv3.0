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
                          <?php
                            $totalDebe=0;
                            $totalHaber=0;
                            foreach ($datos as $cuenta)
                            {
                              $totalDebe=0;
                              $totalHaber=0;
                          ?>
                                <div class="col-md-6">
                                  <table class="table table-bordered">
                                    <tr>
                                      <th colspan="2" class="text-center"><?= $cuenta->NombreCuenta ?></th>
                                    </tr>
                                    
                                    <tr>
                                      <td><strong>Debe</strong></td>
                                      <td><strong>Haber</strong></td>
                                    </tr>
                                    <?php 
                                        $detalle = $this->PartidasModel->LibroMayorExtra($cuenta->idCuenta)->result();
                                        foreach ($detalle as $det)
                                        {
                                          $totalDebe = $totalDebe + $det->debe;
                                          $totalHaber = $totalHaber + $det->haber;
                                    ?>
                                        <tr>
                                          <td>$<?= $det->debe ?></td>
                                          <td>$<?= $det->haber ?></td>
                                        </tr>
                                    <?php }?>
                                      <tr>
                                        <td class="alert-warning"><strong>$<?= $totalDebe ?></strong></td>
                                        <td class="alert-warning"><strong>$<?= $totalHaber ?></strong></td>
                                      </tr>             
                                    <?php 
                                      if ($totalDebe> $totalHaber)
                                        {
                                    ?>
                                          <tr>
                                            <td>$<?= $totalHaber ?></td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td class="alert-success">$<?= $totalDebe - $totalHaber ?></td>
                                            <td class="alert-success"></td>
                                          </tr>
                                    <?php 
                                        }
                                        else
                                        {
                                    ?>
                                          <tr>
                                            <td></td>
                                            <td><?= $totalDebe ?></td>
                                          </tr>

                                          <tr>
                                            <td class="alert-success"></td>
                                            <td class="alert-success">$<?= $totalHaber - $totalDebe ?></td>
                                          </tr>
                                    <?php 
                                          
                                        }
                                    ?>
                                  </table>
                                </div>
                          <?php 
                            }
                          ?>
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
