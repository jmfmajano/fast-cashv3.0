<style>
  a{
    cursor: pointer;
  }
  #CC{
    display: none;
  }
</style>
<!-- contenedor -->
<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Home/Main">Inicio</a></li>
            <li class="active">Caja general</li>
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
                    <h3 class="panel-title">Historial de cajas</h3>                 
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
                <div class="row" align="center">
                  <div class="col-md-12" align="center">
                    <div class="margn">
                     <div class="btn-group">
                      <button type="button" class="btn btn-primary" id="btnCG"><strong><i class="fa fa-id-card fa-lg"></i> Caja general</strong></button>
                      <button type="button" class="btn btn-default" id="btnCC"><strong><i class="fa fa-address-card-o fa-lg"></i> Caja chica</strong></button>
                     </div> 
                   </div>
                </div>
              </div>
              <br>
            <!-- Inicio caja general -->
      				<div class="row" id="CG">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="margn">
                  <?php 
                      if (sizeof($datos->result()) != 0) {
                  ?>
                    <table id="datatable" class="table">
                      <thead class="thead-dark thead thead1">
                        <tr class="tr tr1">
                          <th class="th th1" scope="col">#</th>
                          <th class="th th1" scope="col">Fecha caja general</th>
                          <th class="th th1" scope="col">Saldo de apertura</th>
                          <th class="th th1" scope="col">Estado</th>
                          <th class="th th1" scope="col">Acción</th>
                        </tr>
                      </thead>
                      <tbody class="tbody tbody1">
                     	  <?php 
                        $estado= "";
                        $i = 0;
                        if(!empty($datos)){
                          foreach ($datos->result() as $caja)
                          {
                            if ($caja->estadoCajaChica == 1) {
                               $estado = "<span class='label label-warning'>Abierta</span>";
                            }
                            else{
                               $estado = "<span class='label label-info'>Cerrada</span>";
                            }
                        ?>
                          <tr>
                            <td class="td td1"><?= $i = $i +1; ?></td>
                            <td class="td td1"><?= $caja->fechaCajaChica ?></td>
                            <td class="td td1">$ <?= $caja->cantidadApertura?></td>
                            <td class="td td1"><?= $estado?></td>
                            <td class="td td1" align="right">
                              <a href="<?= base_url() ?>CajaChica/DetalleCajaGeneral/<?= $caja->idCajaChica ?>" title="Ver detalles" class="waves-effect waves-light agregar"  data-toggle="tooltip"><i class="fa fa-folder-open"></i></a>
                            </td>
                          </tr>
                        <?php }} ?>
                      </tbody>
                    </table>
                    <?php
                    }
                    else
                    {
                    ?>
                    <p><h4 class="text-center text-danger">No hay datos que mostrar</h4></p>
                    <?php } ?>
                  </div>
                </div>
            </div>
            <!-- Fin caja general -->

            <!-- Inicio caja chica -->
              <div class="row" id="CC">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="margn">
                  <?php 
                      if (sizeof($cajaChica->result()) != 0) {
                  ?>
                    <table id="datatable" class="table">
                      <thead class="thead-dark thead thead1">
                        <tr class="tr tr1">
                          <th class="th th1" scope="col">#</th>
                          <th class="th th1" scope="col">Fecha caja chica</th>
                          <th class="th th1" scope="col">Saldo de apertura</th>
                          <th class="th th1" scope="col">Estado</th>
                          <th class="th th1" scope="col">Acción</th>
                        </tr>
                      </thead>
                      <tbody class="tbody tbody1">
                        <?php 
                        $estado= "";
                        $i = 0;
                        if(!empty($datos)){
                          foreach ($cajaChica->result() as $caja)
                          {
                            if ($caja->estadoCajaC == 1) {
                               $estado = "<span class='label label-warning'>Abierta</span>";
                            }
                            else{
                               $estado = "<span class='label label-info'>Cerrada</span>";
                            }
                        ?>
                          <tr>
                            <td class="td td1"><?= $i = $i +1; ?></td>
                            <td class="td td1"><?= $caja->fechaCajaC ?></td>
                            <td class="td td1">$ <?= $caja->cantidadAperturaCC?></td>
                            <td class="td td1"><?= $estado?></td>
                            <td class="td td1" align="right">
                              <a href="<?= base_url() ?>CajaChica/DetalleCajaChica/<?= $caja->idCajaC ?>" title="Ver detalles" class="waves-effect waves-light agregar"  data-toggle="tooltip"><i class="fa fa-folder-open"></i></a>
                            </td>
                          </tr>
                        <?php }} ?>
                      </tbody>
                    </table>
                    <?php
                    }
                    else
                    {
                    ?>
                    <p><h4 class="text-center text-danger">No hay datos que mostrar</h4></p>
                    <?php } ?>
                  </div>
                </div>
            </div>
            <!-- Fin caja chica -->
            </div>
          </div>
        </div>
      </div> <!-- End Row -->

    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<script>
  $(document).on("ready", main);
  function main()
  {
    $("#btnCG").on("click", mostrarCG);
    $("#btnCC").on("click", mostrarCC);

  }

  function mostrarCG()
  {
    $("#CG").show();
    $("#CC").hide();
    $( "#btnCG" ).last().addClass( "btn-primary" );
    $( "#btnCC" ).last().removeClass( "btn-primary" );
  }

  function mostrarCC()
  {
    $("#CC").show();
    $("#CG").hide();
    $( "#btnCC" ).last().addClass( "btn-primary" );
    $( "#btnCG" ).last().removeClass( "btn-primary" );
  }
</script>