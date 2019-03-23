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
                            <h3 class="panel-title">Libro diario</h3> 
                        </div> 
                        <div class="panel-body"> 
                            <?php 
                                if (sizeof($datos->result()) > 0) 
                                {
                            ?>

                            <div class="row">
                              <div class="col-sm-12">
                                  <div class="pull-left"><h5>Resumen del <?=  $i ?> hasta <?=  $f ?></h5></div>
                                  <div class="pull-right">
                                    <a href="<?=  base_url() ?>Contabilidad/DetalleLibroMayor?i=<?=  $i ?>&&f=<?= $f ?>" class="btn btn-success">Ver Libro Mayor</a>
                                    <a href="<?=  base_url() ?>Contabilidad/DetalleBalanceComprobacion?i=<?=  $i ?>&&f=<?= $f ?>" class="btn btn-danger">Ver balance de comprobacion</a>
                                  </div>
                              </div>
                          </div>
                              <table class="table table-hovered">
                                  <tr>
                                      <th class="text-center alert-success"><strong>FECHA</strong></th>
                                      <th class="text-center alert-success"><strong>CUENTA</strong></th>
                                      <th class="text-center alert-success"><strong>DEBE</strong></th>
                                      <th class="text-center alert-success"><strong>HABER</strong></th>
                                  </tr>
                                  <?php
                                  $totalDebe=0; 
                                  $totalHaber=0; 
                                    foreach ($datos->result() as $fila)
                                    {
                                        $totalDebe = $totalDebe + $fila->debe;
                                        $totalHaber = $totalHaber + $fila->haber;
                                  ?>
                                    <tr>
                                        <td class="alert-warning"><strong><?= $fila->fecha ?></strong></td>
                                        <td colspan="4" class="text-center alert-warning"><strong>Detalle: <?= $fila->descripcion ?></strong></td>
                                    </tr>
                                  <?php 
                                        $detalle = $this->PartidasModel->LibroDiarioExtra($fila->idPartida)->result();
                                        foreach ($detalle as $det)
                                        {
                                  ?>
                                        <tr>
                                            <td></td>
                                            <td class="text-center"><?= $det->NombreCuenta ?></td>
                                            <td class="text-center"><?= $det->debe ?></td>
                                            <td class="text-center"><?= $det->haber ?></td>
                                        </tr>
                                  <?php 
                                            
                                        }
                                    }
                                  ?>

                                  <tr>
                                      <td class="text-center" colspan="2"><strong>TOTALES</strong></td>
                                      <td class="text-center"><strong><?= $totalDebe ?></strong></td>
                                      <td class="text-center"><strong><?= $totalHaber ?></strong></td>
                                  </tr>
                              </table>     
                            <?php 
                                }
                                else
                                {
                                    echo "no hay datos que mostrar";
                                }
                            ?>
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
