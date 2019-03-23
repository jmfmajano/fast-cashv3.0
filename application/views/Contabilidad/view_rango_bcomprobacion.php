<div class="content-page">
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb pull-right">
            <li><a href="<?= base_url() ?>Reportes/">Reportes</a></li>
            <li class="active">infored</li>
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
                    <h3 class="panel-title">Reporte Infored</h3>                 
                  </div>
                </div>
              </div>
            </div>
              <div class="row" style="padding-left: 50px; padding-right: 50px;">
                <div class="col-md-12 text-center">
                    <form class="form-inline" id="buscrPorFecha" method="post" action="<?= base_url() ?>Contabilidad/DetalleBalanceComprobacion">
                      <div class="margn">
                        <div class="form-group">
                          <label for="fechaInicio">Inicio </label>
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control DateTime" name="fechaInicial" id="fechaInicio" placeholder="Fecha inicial" required data-parsley-required-message="Por favor, digite fecha de inicio" data-mask="9999/99/99">
                          </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-group">
                          <label for="fechaFinal">Final </label>
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control DateTime" name="fechaFinal" id="fechaFinal" placeholder="Fecha final" required data-parsley-required-message="Por favor, digite fecha final" data-mask="9999/99/99">
                          </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        <a href="<?= base_url();?>Contabilidad/BalanceComprobacion" class="btn btn-warning refres"><i class="fa fa-refresh"></i></a>
                      </div>
                    </form>
                  </div>
              </div> <br>  
            <div class="panel-body">
             
              </div>
            </div>
            </div>
          </div>
        </div>
      </div> <!-- End Row -->

    </div>
  </div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
