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
<?php endif;

  date_default_timezone_set('America/El_Salvador');
 ?>


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- <h4 class="pull-left page-title">Inicio</h4> -->
                    <ol class="breadcrumb pull-right">
                        <li><a href="">Configuración</a></li>
                        <li class="active">Backup</li>
                    </ol>
                </div>
            </div>
            <!-- Basic Form Wizard -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
	                      <div class="table-title">
	                        <div class="row">
	                          <div class="col-sm-5">
	                            <h3 class="panel-title">Gestión de Backup de base de datos</h3>
	                          </div>
	                          <div class="col-sm-7">
	                              <a title="Realizar&nbsp;Backup" href="database_backup" data-toggle="tooltip" class="btn btn-success waves-effect waves-light m-b-5"><i class="fa fa-cloud-download"></i><span> Backup Database<span></a>
	                          </div>
	                        </div>
	                      </div>
                        </div> 
                        <div class="panel-body">

						<?php
						$dirSystem = "C:/xampp/htdocs/www/fast-cash/";
						$dir = "db_backup/";
						// Abre un directorio conocido, y procede a leer el contenido
						if (is_dir($dir)) {
						    if ($dh = opendir($dir)) {?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="margn">
                                <table class="table">
                                  <thead class="thead-dark thead thead1">
                                    <tr class="tr">
                                      <th class="th" scope="col">URL</th>
                                      <th class="th" >Backup</th>
                                    </tr>
                                  </thead>
                                  <tbody class="tbody">
						        <?php while (false !== ($file = readdir($dh))) {?>
						        <?php

						        	if($file !="." AND $file !=".."){
								    echo "<tr class='tr tr1'>
                                            <td class='td td1' data-label='URL'>
                                               <i class='fa fa-windows fa-lg' style='color: blue;'></i> ".substr($dirSystem.$dir.$file, 0, -4).'.sql'
                                               ."
                                             </td>
                                             <td class='td td1' data-label='Backup'><i class='fa fa-database fa-lg' style='color: green;'></i> ".substr($file, 0, -4).'.sql'
                                               ."</td>
                                          </tr>";
									}

						        }?>
						          </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
						        <?php closedir($dh);
						    }
						}
						?>

                        </div>  <!-- End panel-body -->
                    </div> <!-- End panel -->
                </div> <!-- end col -->
            </div> <!-- End row -->

        </div> <!-- container -->           
    </div> <!-- content -->
</div>