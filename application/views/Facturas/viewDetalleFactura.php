<style type="text/css">

	#divEncabezado{
		width: 100%;
		height: 85.04px;
		padding: 2px;
		margin: 1px;
	}
	#divDetalle{
		width: 100%;
		height: 226.77px;
		padding: 5px;
	}
	#divFooter{
		width: 100%;
		height: 56.69px;
	}
</style>
<!-- contenedor -->
<?php
	foreach ($factura->result() as $fact) {}
?>
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
                            <h3 class="panel-title">Detalle de Factura</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
						<div  style="width:100%; height:368.5px;">
						<div id="divEncabezado">
						<div class="row">
						<div class="col-md-4">
						<img src="<?= base_url()?>plantilla/images/fc_logoR.png" style="height:80px; width:85px;">
						</div>
						<div class="col-md-4">
						<p style="font-size:10px; text-align:center; font-family:Arial;"><strong>GOCAJAA GRPOUP, S.A. DE C.V.</strong><br><b>SOCIEDAD ANONIMA DE CAPITAL VARIABLE</b> <br><b>Giro: </b> Servicios multiples <br>3a. Av. sur Barrio Concepcion Mercedes Uma;a <br>usulutan, El Salvador, Centro America Tel. 2626-5217</p>
						</div>
							<div class="col-md-4">
								<div style="border:solid; border-width:1px; border-radius:15px; width:60%; align:center;">
									<p style="font-size:10px; text-align:center; font-family:Arial;"><strong>Factura <?= $fact->id_factura?></strong><br>
									<b>Registro: </b> Servicios multiples <br>
									NIT: 11111111 <br>
									usulutan, El Salvador, Centro America Tel. 2626-5217
								</p>
								</div>
							</div>
						</div>
							
						</div>
							<div id="divDetalle">
							<table style="width:100%; font-size:10px;">
								<tr>
									<td>No. Prestamo : <?= $fact->codigoCredito?></td>
									<td>Monto: <?= $fact->capital?></td>
									<td>Fecha Aplicacion: <?= $fact->fechaAplicacion?></td>
								</tr>
								<tr>
									<td>Nombre: <?= $fact->Nombre_Cliente?></td>
									<td>fecha Otorgamiento: <?= $fact->fechaApertura?></td>
									<td>fecha vencimiento: <?= $fact->fechaVencimiento?></td>
									
								</tr>
								<tr>
									<td>Cuota: <?= $fact->pagoCuota?></td>
									<td>Fecha Ultimo Pago:<?= $fact->fechaAplicacion?></td>
								</tr>
								<tr>
									<td>Saldo Anterior: <?= $fact->saldoAnterior?></td>
									<td>Saldo Actual: <?= $fact->saldoActual?></td>
								</tr>
							</table>
							<div style="border:solid; border-width:1px; border-radius:15px; padding:10px;">
							<table style="width:100%; font-size:10px;">
								<tr>
									<td>pago &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
									<td>No afectas</td>
									<td>ventas excentas</td>
									<td>Ventas Gravadas</td>
								</tr>
								<tr>
									<td>capital &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
									<td><?= $fact->noAfecta?></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>interes &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
									<td></td>
									<td></td>
									<td><?= $fact->ventasGravadas?></td>
								</tr>
								<tr>
									<td>Int. por Mora &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td></td><td></td><td><?= $fact->intMora?></td></tr>
								<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td></td><td></td><td></td></tr><br>
								<tr>
									<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;sumas</td>
									<td><?= $fact->noAfecta?></td>
									<td>0</td>
									<?php
									$totalInt=$fact->ventasGravadas+$fact->intMora;
									?>
									<td><?=$totalInt?></td>
								</tr>
								<tr>
									<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total</td>
									<td></td>
									<td></td>
									<td>
									<hr>
									<?php
									echo $fact->ventasGravadas+$fact->noAfecta+$fact->intMora;
									?></td>
								</tr>
							</table>
							</div>
							</div>
							<div id="divFooter">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

