<?php 
class Reportes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Creditos_Model");
		$this->load->model("Reportes_Model");
	}
	public function index()
	{
		// $datos = $this->Creditos_Model->ObtenerCreditos();
		// $data = array('datos' => $datos );
		// $this->load->view('Base/header');
		// $this->load->view('Base/nav');
		// $this->load->view('Reportes/general', $data);
		// $this->load->view('Base/footer');
	}

	public function General($val)
	{
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		if ($val==1) 
		{
			$datos = $this->Creditos_Model->ObtenerCreditos();
			$data = array('datos' => $datos );
		}
		else{
			$datos = $this->input->post();
			$i = $datos['fechaInicial'];
			$f = $datos['fechaFinal'];
			$datos = $this->Reportes_Model->ObtenerCreditosFecha($i, $f);
			$data = array('datos' => $datos, 'i' => $i, 'f' => $f);
		}

		$this->load->view('Reportes/general', $data);
		$this->load->view('Base/footer');
	}


	public function ReporteGeneralPDF($val)
	{
	if ($val==1) 
	{
		$datos = $this->Creditos_Model->ObtenerCreditos();
	}
	else{
		$i = $_GET['i'];
		$f = $_GET['f'];
		$datos = $this->Reportes_Model->ObtenerCreditosFecha($i, $f);
	}
	if (sizeof($datos) != 0)
	{
	
	$html="
	<link href='".base_url()."plantilla/css/bootstrap.min.css' rel='stylesheet' />
	<script src='".base_url()."plantilla/js/jquery.min.js'></script>
	<script src='".base_url()."plantilla/js/bootstrap.min.js'></script>
	<style>
	img {
	    text-align:left;
	    float:left;
	    width: 120px;
	    height: 100px;

	}

	#cabecera{
		width: 1000px;
	}
	#img{
		float:left;
		margin-left: 20px;
		width: 150px;

	}
	.textoCentral{
		color: #000;
		font-weight: bold;
		float:right;
		padding-left: 30px;
		margin: 0 auto;
		text-align: center;
		line-height:: 50;
		line-height: 26px;
		width: 400px
	}
	#creditos{
	font-size:12px;
}
</style>
	 <div class='container'>
	    <div class='row' id='cabecera'>
	            <div class='col-md-4 pull-left' id='img'>
	                <img class='' width='' src='".base_url()."plantilla/images/fc_logoR.png'>
	            </div>
	            <div class='col-md-4 textoCentral' id=''>
	                <p>GOCAJAA GROUP SA DE CV <br>
	                MERCEDES UMAÑA, USULUTAN <br>
	                REPORTE GENERAL DE CRÉDITOS<br> 
	            </div>
	    </div>
	    <strong style='font-weight: bold;'></strong><br><br>
	    <div>
	        <table class='table table-bordered' id='creditos'>
	            <thead class=''>
	            	<tr>";
	         if (isset($i) && isset($f))
	            {
	                $html.="<td colspan='9' class='text-center'><strong>PROCESOS EFECTUADOS ENTRE EL ".$i." Y ".$f."</strong></td>";
	            }
	            else
	            {
					$html.= "<td colspan='9' class='text-center'><strong>REPORTE GENERAL DE CRÉDITOS HASTA EL ".date('d-m-Y')."</strong></td>";
	            }   			
	       $html .= "</tr>
	       			<tr>
	                  <th class='text-center'>Código de Cliente</th>
	                  <th class='text-center'>Cliente</th>
	                  <th class='text-center'>Tipo de Crédito</th>
	                  <th class='text-center'>Total a Pagar</th>
	                  <th class='text-center'>Total Abonado</th>
	                  <th class='text-center' >Intereses pagados</th>
                      <th class='text-center' >Intereses pendientes</th>
	                  <th class='text-center'>Estado</th>
	                </tr>
	              </thead>
	            <tbody>
	            ";
	foreach ($datos->result() as $creditos) {
		$i = $i +1;
		if ($creditos->estadoCredito != "Finalizado") {
        // if($creditos->estadoCredito=="Finalizado"){
          $datosExtras = $this->Reportes_Model->DatosAdicionalesRG($creditos->idCredito );

          $IP = 0;
          if ($datosExtras->interesesPagados != null)
          {
            $IP = $datosExtras->interesesPagados;
          }
		$html .= "	<tr>";
        $html .= "      <td class='text-center'> $creditos->Codigo_Cliente</td>";
        $html .= "      <td class='text-center'> $creditos->Nombre_Cliente    $creditos->Apellido_Cliente</td>";
        $html .= "      <td class='text-center'> $creditos->tipoCredito</td>";
        $html .= "      <td class='text-center'> $  $creditos->capital</td>";
        $html .= "      <td class='text-center'> $  $creditos->totalAbonado</td>";
        $html .= "      <td class='text-center'> $  $IP </td>";
        $html .= "      <td class='text-center'> $  $creditos->interesPendiente</td>";
        $html .= "      <td class='text-center'> $creditos->estadoCredito</td>";
        $html .= "  </tr>";
	}
	}
	    
	$html .= "</tbody>
	        </table>
	    </div>
	</div>";

     $pdfFilePath = "reporte_general_de_creditos.pdf";
     //load mPDF library
    $this->load->library('M_pdf');
    $mpdf = new mPDF('c', 'A4-L'); //Orientacion
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $mpdf->shrink_tables_to_fit = 1;
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, "I");

    }
    else
    {
    	echo '<script type="text/javascript">
			alert("No hay datos que mostrar !!!");
			window.close();
			self.location ="'.base_url().'Reportes/General/1"
			</script>';
    }

	}
	

	public function ReporteGeneralEXCEL($val)
	{
		if ($val==1) 
	{
		$creditos = $this->Creditos_Model->ObtenerCreditos()->result();
	}
	else{
		$i = $_GET['i'];
		$f = $_GET['f'];
		$creditos = $this->Reportes_Model->ObtenerCreditosFecha($i, $f)->result();
	}
    if(count($creditos) > 0){
        //Cargamos la librería de excel.
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Creditos');
        //Contador de filas
        $contador = 4;

        //Cabecera
		$styleArray = array(
			'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		);

		$this->excel->getActiveSheet()->getStyle('B1:G1')->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('B3:G3')->applyFromArray($styleArray);
        $this->excel->setActiveSheetIndex(0)->mergeCells('B1:G1');
        $this->excel->setActiveSheetIndex(0)->mergeCells('B2:G2');
        $this->excel->setActiveSheetIndex(0)->mergeCells('B3:G3');
        $this->excel->getActiveSheet()->setCellValue("B1", "GOCAJAA GROUP SA DE CV, MERCEDES UMAÑA, USULUTAN");
        $this->excel->getActiveSheet()->setCellValue("B2", "REPORTE GENERAL DE CRÉDITOS");
        if (isset($i) && isset($f))
        {
    		$this->excel->getActiveSheet()->setCellValue("B3", "REPORTE GENERAL DE CREDITOS ENTRE LAS FECHAS ".$i." Y ".$f);
        }
        else
        {
    		$this->excel->getActiveSheet()->setCellValue("B3", "REPORTE GENERAL DE CREDITOS HASTA EL ". date('d-m-Y'));
        }
        // Fin cabecera

        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Código del cliente');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Cliente');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Tipo de crédito');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Total a pagar');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Total abonado');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Intereses pagados');
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Intereses pendientes');
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Estado');
        //Definimos la data del cuerpo.        
        foreach($creditos as $credito){
           //Incrementamos una fila más, para ir a la siguiente.
           $contador++;
           if ($credito->estadoCredito != "Finalizado") {
        // if($creditos->estadoCredito=="Finalizado"){
          $datosExtras = $this->Reportes_Model->DatosAdicionalesRG($credito->idCredito );

          $IP = 0;
          if ($datosExtras->interesesPagados != null)
          {
            $IP = $datosExtras->interesesPagados;
          }
           //Informacion de las filas de la consulta.
           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $credito->Codigo_Cliente);
           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $credito->Nombre_Cliente." ".$credito->Apellido_Cliente);
           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $credito->tipoCredito); 
           $this->excel->getActiveSheet()->setCellValue("D{$contador}", $credito->capital);
           $this->excel->getActiveSheet()->setCellValue("E{$contador}", $credito->totalAbonado);
           $this->excel->getActiveSheet()->setCellValue("F{$contador}", $IP);
           $this->excel->getActiveSheet()->setCellValue("G{$contador}", $credito->interesPendiente);
           $this->excel->getActiveSheet()->setCellValue("H{$contador}", $credito->estadoCredito);
        }
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "reporte_general_creditos.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
     }
     else
     {
        echo 'No se han encontrado creditos';
        exit;        
     }
	}

	public function ReporteIva($val)
	{
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$p = $val;
		if ($p == 1)
		{
			$datos = $this->Reportes_Model->ReporteIva(null, null);
			$data = array('datos' => $datos );
		}
		else
		{
			$datos = $this->input->post();
			$i = $datos['fechaInicial'];
			$f = $datos['fechaFinal'];
			$datos = $this->Reportes_Model->ReporteIva($i, $f);
			$data = array('datos' => $datos, 'i' => $i, 'f' => $f);
		}
		$this->load->view('Reportes/iva', $data);
		$this->load->view('Base/footer');
	}

	public function ReporteIvaPDF($val)
	{
		$p = $val;
		if ($p == 1)
		{
			$datos = $this->Reportes_Model->ReporteIva(null, null);
		}
		else
		{
			$i = $_GET['i'];
			$f = $_GET['f'];
			$datos = $this->Reportes_Model->ReporteIva($i, $f);
		}
		if (sizeof($datos->result())>0)
		{
			$html="
			<link href='".base_url()."plantilla/css/bootstrap.min.css' rel='stylesheet' />
			<script src='".base_url()."plantilla/js/jquery.min.js'></script>
			<script src='".base_url()."plantilla/js/bootstrap.min.js'></script>
			<style>
			img {
			    text-align:left;
			    float:left;
			    width: 120px;
			    height: 100px;

			}

			#cabecera{
				width: 1000px;
			}
			#img{
				float:left;
				margin-left: 20px;
				width: 150px;

			}
			.textoCentral{
				color: #000;
				font-weight: bold;
				float:right;
				padding-left: 30px;
				margin: 0 auto;
				text-align: center;
				line-height:: 50;
				line-height: 26px;
				width: 400px
			}
			#creditos{
			font-size:12px;
		}
		</style>
			 <div class='container'>
			    <div class='row' id='cabecera'>
			            <div class='col-md-4 pull-left' id='img'>
			                <img class='' width='' src='".base_url()."plantilla/images/fc_logoR.png'>
			            </div>
			            <div class='col-md-4 textoCentral' id=''>
			                <p>GOCAJAA GROUP SA DE CV <br>
			                MERCEDES UMAÑA, USULUTAN <br>
			                REPORTE DE IVA<br> 
			            </div>
			    </div>
			    <strong style='font-weight: bold;'></strong><br><br>
			    <div>
			        <table class='table table-bordered' id='creditos'>
			            <thead class=''>
			            <tr>";
			            if (isset($i) && isset($f))
				            {
				                $html.="<td colspan='9' class='text-center'><strong>PROCESOS EFECTUADOS ENTRE EL ".$i." Y ".$f."</strong></td>";
				            }
				            else
				            {
								$html.= "<td colspan='9' class='text-center'><strong>ÚLTIMOS PROCESOS EFECTUADOS HASTA EL ".date('d-m-Y')."</strong></td>";
				            }
			      $html .= "</tr>
			      			<tr>
			                  <th class='text-center'>#</th>
                              <th class='text-center'>CÓDIGO CRÉDITO</th>
                              <th class='text-center'>CLIENTE</th>
                              <th class='text-center'>NETO</th>
                              <th class='text-center'>IVA</th>
                              <th class='text-center'>EXCENTO</th>
                              <th class='text-center'>IVA RETENIDO</th>
                              <th class='text-center'>TOTAL</th>
                              <th class='text-center'>OBSERVACIONES</th>
			                </tr>
			              </thead>
			            <tbody>
			            ";
			  $total = 0;
              $totalIVA = 0;
              $totalIntereses = 0;
			foreach ($datos->result() as $row) {
				$i = $i +1;
				$totalIVA = $totalIVA + $row->iva;
                $totalIntereses = $totalIntereses + $row->interes;
                $total = $total + $row->iva + $row->interes;
                $totalII = $row->iva + $row->interes; 
				$html .= "	<tr>";
		        $html .= "      <td class='text-center'> $i</td>";
		        $html .= "      <td class='text-center'> $row->codigoCredito</td>";
		        $html .= "      <td class='text-center'> $row->Nombre_Cliente    $row->Apellido_Cliente</td>";
		        $html .= "      <td class='text-center'> $".$row->interes."</td>";
		        $html .= "      <td class='text-center'> $".$row->iva."</td>";
		        $html .= "      <td class='text-center'> $0</td>";
		        $html .= "      <td class='text-center'> $0</td>";
		        $html .= "      <td class='text-center'>$".$totalII."</td>";
		        $html .= "      <td class='text-center'> --- </td>";
		        $html .= "  </tr>";
			}
			
			$html .= "	<tr>";
	        $html .= "      <td class='text-center' colspan='3'>TOTAL</td>";
	        $html .= "      <td class='text-center'>$ $totalIntereses</td>";
	        $html .= "      <td class='text-center'> $ $totalIVA</td>";
	        $html .= "      <td class='text-center'> </td>";
	        $html .= "      <td class='text-center'> </td>";
	        $html .= "      <td class='text-center'>$ $total</td>";
	        $html .= "      <td class='text-center'>".$row->iva + $row->interes."</td>";
	        $html .= "      <td class='text-center'> --- </td>";
	        $html .= "  </tr>";

			$html .= "</tbody>
			        </table>
			    </div>
			</div>";

		     $pdfFilePath = "reporte_iva.pdf";
		     //load mPDF library
		    $this->load->library('M_pdf');
		    $mpdf = new mPDF('c', 'A4-L'); //Orientacion
		    $mpdf->SetDisplayMode('fullpage');
		    $mpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		    $mpdf->shrink_tables_to_fit = 1;
		    $mpdf->WriteHTML($html);
		    $mpdf->Output($pdfFilePath, "I");
		}
		else
		{
			echo '<script type="text/javascript">
				alert("No hay datos que mostrar !!!");
				window.close();
				self.location ="'.base_url().'Reportes/ReporteIva/1"
				</script>';
		}
	}
	public function ReporteIvaEXCEL($val)
	{
		$p = $val;
		if ($p == 1)
		{
			$datos = $this->Reportes_Model->ReporteIva(null, null)->result();
		}
		else
		{
			$i = $_GET['i'];
			$f = $_GET['f'];
			$datos = $this->Reportes_Model->ReporteIva($i, $f)->result();
		}
	    if(count($datos) > 0){
	        //Cargamos la librería de excel.
	        $this->load->library('excel');
	        $this->excel->setActiveSheetIndex(0);
	        $this->excel->getActiveSheet()->setTitle('Creditos');
	        //Contador de filas
	        $contador = 4;

	        //Cabecera
			$styleArray = array(
				'alignment' => array(
			            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			        ),
			);

			$this->excel->getActiveSheet()->getStyle('B1:E1')->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle('B2:E2')->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle('B3:E3')->applyFromArray($styleArray);
	        $this->excel->setActiveSheetIndex(0)->mergeCells('B1:E1');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('B2:E2');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('B3:E3');
	        $this->excel->getActiveSheet()->setCellValue("B1", "GOCAJAA GROUP SA DE CV, MERCEDES UMAÑA, USULUTAN");
	        $this->excel->getActiveSheet()->setCellValue("B2", "REPORTE DE IVA");
	        // Fin cabecera
	        if (isset($i) && isset($f))
	            {
	        		$this->excel->getActiveSheet()->setCellValue("B3", "REPORTE DE IVA ENTRE LAS FECHAS ".$i." Y ".$f);
	            }
	            else
	            {
	        		$this->excel->getActiveSheet()->setCellValue("B3", "REPORTE DE IVA EN LOS ÚLTIMOS PROCESOS EFECTUADOS");
	            }
	        //Le aplicamos ancho las columnas.
	        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
	        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	        //Le aplicamos negrita a los títulos de la cabecera.
	        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
	        //Definimos los títulos de la cabecera.
	        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Código crédito');
	        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Cliente');
	        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Neto');
	        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Iva');
	        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Excento');
	        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Iva retenido');
	        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Total');
	        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Observaciones');
	        //Definimos la data del cuerpo.
	        $i = 0;
	        $total = 0;
	        $totalIVA = 0;
	        $totalIntereses = 0;        
	        foreach($datos as $row){
	           $contador++;
	           $totalIVA = $totalIVA + $row->iva;
	           $totalIntereses = $totalIntereses + $row->interes;
	           $total = $total + $row->iva + $row->interes;
	           $totalII = $row->iva + $row->interes; 
	           //Incrementamos una fila más, para ir a la siguiente.
	           //Informacion de las filas de la consulta.
	           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $row->codigoCredito);
	           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $row->Nombre_Cliente." ".$row->Apellido_Cliente);
	           $this->excel->getActiveSheet()->setCellValue("C{$contador}", "$".$row->interes); 
	           $this->excel->getActiveSheet()->setCellValue("D{$contador}", "$".$row->iva);
	           $this->excel->getActiveSheet()->setCellValue("E{$contador}", "$0");
	           $this->excel->getActiveSheet()->setCellValue("F{$contador}", "$0");
	           $this->excel->getActiveSheet()->setCellValue("G{$contador}", "$".$totalII);
	           $this->excel->getActiveSheet()->setCellValue("H{$contador}", "");
	        }
	        $contador = $contador + 1;
	        $this->excel->getActiveSheet()->setCellValue("A{$contador}", " ");
	        $this->excel->getActiveSheet()->setCellValue("B{$contador}", " ");
	        $this->excel->getActiveSheet()->setCellValue("C{$contador}", "$".$totalIntereses); 
	        $this->excel->getActiveSheet()->setCellValue("D{$contador}", "$".$totalIVA);
	        $this->excel->getActiveSheet()->setCellValue("E{$contador}", "$0");
	        $this->excel->getActiveSheet()->setCellValue("F{$contador}", "$0");
	        $this->excel->getActiveSheet()->setCellValue("G{$contador}", "$".$total);
	        $this->excel->getActiveSheet()->setCellValue("H{$contador}", "");

	        //Le ponemos un nombre al archivo que se va a generar.
	        $archivo = "reporte_general_creditos.xls";
	        header('Content-Type: application/vnd.ms-excel');
	        header('Content-Disposition: attachment;filename="'.$archivo.'"');
	        header('Cache-Control: max-age=0');
	        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	        //Hacemos una salida al navegador con el archivo Excel.
	        $objWriter->save('php://output');
	     }
	     else
	     {
	       echo '<script type="text/javascript">
				alert("No hay datos que mostrar !!!");
				window.close();
				self.location ="'.base_url().'Reportes/ReporteIva/1"
				</script>';      
	     }
	}

	public function ResumenIva($val)
	{
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$p = $val;
		if ($p == 1)
		{
			$data = array('si' => false );
		}
		else
		{
			$datos = $this->input->post();
			$i = $datos['fechaInicial'];
			$f = $datos['fechaFinal'];
			$datos = $this->Reportes_Model->ReporteIva($i, $f)->result();
			$data = array('datos' => $datos, 'si' => true, 'fi' => $i, 'ff' => $f );
		}

		$this->load->view('Reportes/resumen_iva', $data);
		$this->load->view('Base/footer');
	}

	public function ResumenIvaPDF()
	{
		$i = $_GET['i'];
		$f = $_GET['f'];
		$datos = $this->Reportes_Model->ReporteIva($i, $f);
		if (sizeof($datos->result())>0)
			{
				$html="
				<link href='".base_url()."plantilla/css/bootstrap.min.css' rel='stylesheet' />
				<script src='".base_url()."plantilla/js/jquery.min.js'></script>
				<script src='".base_url()."plantilla/js/bootstrap.min.js'></script>
				<style>
				img {
				    text-align:left;
				    float:left;
				    width: 120px;
				    height: 100px;

				}

				#cabecera{
					width: 1000px;
				}
				td, th{
					padding:10px;
				}
				#img{
					float:left;
					margin-left: 20px;
					width: 150px;

				}
				.textoCentral{
					color: #000;
					font-weight: bold;
					float:right;
					padding-left: 30px;
					margin: 0 auto;
					text-align: center;
					line-height:: 50;
					line-height: 26px;
					width: 400px
				}
				#creditos{
				font-size:12px;
			}
			</style>
				 <div class='container'>
				    <div class='row' id='cabecera'>
				            <div class='col-md-4 pull-left' id='img'>
				                <img class='' width='' src='".base_url()."plantilla/images/fc_logoR.png'>
				            </div>
				            <div class='col-md-4 textoCentral' id=''>
				                <p>GOCAJAA GROUP SA DE CV <br>
				                MERCEDES UMAÑA, USULUTAN <br>
				                REPORTE DE IVA<br> 
				            </div>
				    </div>
				    <strong style='font-weight: bold;'></strong><br><br>
				    <div class='col-md-12'>
	                  <p class='text-center'><strong>Libro de ventas a consumidores del $i al $f</strong></p>
	                </div>
				    <div>";
				  $contador=0;
                  $inicio = "";
                  $final = "";
                  $total = 0;
                  $totalIVA = 0;
                  $totalIntereses = 0;
                  foreach ($datos->result() as $row)
                  {
                    $totalIVA = $totalIVA + $row->iva;
                    $totalIntereses = $totalIntereses + $row->interes;
                    $total = $total + $row->iva + $row->interes; 
                    if ($contador == 0)
                    {
                      $inicio = $row->codigoSolicitud;
                    }
                    if ($contador == sizeof($datos))
                    {
                      $final = $row->codigoSolicitud;
                    }
                    $contador++;
                  }
				
				$html .= "<table class='table table-bordered' cellspacing='10'>
                  <thead>
                    <tr>
                      <th class='text-center' rowspan='2'>Fecha</th>
                      <th colspan='2' class='text-center'>Facturas</th>
                      <th class='text-center' rowspan='2'>Ventas no sujetas</th>
                      <th class='text-center' rowspan='2'>Ventas excentas</th>
                      <th colspan='4' class='text-center'>Ventas gravadas</th>
                      <th class='text-center' rowspan='2'>Ventas por terceros</th>
                    </tr>
                    <tr class='text-center'>
                      <td>Inicio</td>
                      <td>Fin</td>
                      <td>Locales</td>
                      <td>Exportaciones</td>
                      <td>IVA retenido</td>
                      <td>Venta Total</td>
                    </tr>
                    <tr class='text-center'>
                      <td>".date('d/m/Y')."</td>
                      <td>".$inicio ."</td>
                      <td>".$row->codigoSolicitud."</td>
                      <td>$ 0.00</td>
                      <td>$ 0.00</td>
                      <td>".$total."</td>
                      <td>$ 0.00</td>
                      <td>$ 0.00</td>
                      <td>$".$total."</td>
                      <td>---</td>
                    </tr>
                    <tr class='text-center'>
                      <td colspan='3'><strong>Totales</strong></td>
                      <td>$ 0.00</td>
                      <td>$ 0.00</td>
                      <td>$".$total."</td>
                      <td>$ 0.00</td>
                      <td>$ 0.00</td>
                      <td>$".$total."</td>
                      <td>$0</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class='text-center'>
                      <td colspan='3'><strong>Ventas no sujetas</strong></td>
                      <td colspan='2'>$ 0.00</td>
                      <td colspan='5'></td>
                    </tr>
                    <tr class='text-center'>
                      <td colspan='3'><strong>Excentas</strong></td>
                      <td colspan='2'>$ 0.00</td>
                      <td colspan='5'></td>
                    </tr>
                    <tr class='text-center'>
                      <td colspan='3'><strong>Exportaciones</strong></td>
                      <td colspan='2'>$ 0.00</td>
                      <td colspan='5'></td>
                    </tr>
                    <tr class='text-center'>
                      <td colspan='3'><strong>Locales</strong></td>
                      <td colspan='2'>$".$total."</td>
                      <td colspan='5'></td>
                    </tr>
                    <tr class='text-center'>
                      <td colspan='3'><strong>Neto</strong></td>
                      <td colspan='2'>$".$totalIntereses."</td>
                      <td colspan='5'></td>
                    </tr>
                    <tr class='text-center'>
                      <td colspan='3'>Impuesto</td>
                      <td colspan='2'><strong>$".$totalIVA."</strong></td>
                      <td colspan='5'></td>
                    </tr>
                    <tr class='text-center'>
                      <td colspan='3'><strong>(-) Iva retenido</strong></td>
                      <td colspan='2'>$000</td>
                      <td colspan='5'></td>
                    </tr>
                    <tr class='text-center'>
                      <td colspan='3'><strong>Total</strong></td>
                      <td colspan='2'>$".$total."</td>
                      <td colspan='4'></td>
                    </tr>
                  </tbody>
               </table>
               <!-- fin tabla -->
               <br><br><br>
              <p class='text-center'><strong>Nombre o firma del contribuyente </strong>________________________________________________</p>";

				$html .= "</div>
						</div>";

			     $pdfFilePath = "reporte_iva.pdf";
			     //load mPDF library
			    $this->load->library('M_pdf');
			    $mpdf = new mPDF('c', 'A4'); //Orientacion
			    $mpdf->SetDisplayMode('fullpage');
			    $mpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			    $mpdf->shrink_tables_to_fit = 1;
			    $mpdf->WriteHTML($html);
			    $mpdf->Output($pdfFilePath, "I");
			}
			else
			{
				echo '<script type="text/javascript">
					alert("No hay datos que mostrar !!!");
					window.close();
					self.location ="'.base_url().'Reportes/ReporteIva/1"
					</script>';
			}		
	}

	public function ResumenIvaEXCEL()
	{
		$i = $_GET['i'];
		$f = $_GET['f'];
		$datos = $this->Reportes_Model->ReporteIva($i, $f)->result();
		if(count($datos) > 0)
		{
	        //Cargamos la librería de excel.
	        $this->load->library('excel');
	        $this->excel->setActiveSheetIndex(0);
	        $this->excel->getActiveSheet()->setTitle('Iva');
	        //Contador de filas
	        $contador = 4;

	        //Cabecera
			$styleArray = array(
				'alignment' => array(
			            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			        ),
			);

			$this->excel->getActiveSheet()->getStyle('B1:E1')->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle('B2:E2')->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle('B3:E3')->applyFromArray($styleArray);
			for ($j=4; $j < 20; $j++)
			{ 
				$this->excel->getActiveSheet()->getStyle('A'.($j).':I'.($j))->applyFromArray($styleArray);
			}
	        $this->excel->setActiveSheetIndex(0)->mergeCells('D1:G1');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('D2:G2');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('D3:G3');
	        $this->excel->getActiveSheet()->setCellValue("D1", "GOCAJAA GROUP SA DE CV, MERCEDES UMAÑA, USULUTAN");
	        $this->excel->getActiveSheet()->setCellValue("D2", "REPORTE DE IVA");
	        // Fin cabecera
        	$this->excel->getActiveSheet()->setCellValue("D3", "Libro de ventas a consumidores del ".$i." al ".$f);
            
	        //Le aplicamos ancho las columnas.
	        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	        //Le aplicamos negrita a los títulos de la cabecera.
	        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
	        $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
	        
	        //Definimos los títulos de la cabecera.
	        $this->excel->setActiveSheetIndex(0)->mergeCells('B4:C4');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('F4:H4');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('A4:A5');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('D4:D5');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('E4:E5');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('J4:J5');

	        // primer fila
	        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Fecha');
	        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Facturas');
	        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Ventas excentas');
	        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Ventas no sujetas');
	        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Ventas gravadas');
	        $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Ventas por terceros');
	        // fin primer fila
	        
	        // segunda fila
	        $this->excel->getActiveSheet()->setCellValue("B5", 'Inicio');
	        $this->excel->getActiveSheet()->setCellValue("C5", 'Fin');
	        $this->excel->getActiveSheet()->setCellValue("F5", 'Locales');
	        $this->excel->getActiveSheet()->setCellValue("G5", 'Exportaciones');
	        $this->excel->getActiveSheet()->setCellValue("H5", 'Iva retenido');
	        $this->excel->getActiveSheet()->setCellValue("I5", 'Venta total');
	        // fin segunda fila

	          $contador=0;
	          $inicio = "";
	          $final = "";
	          $total = 0;
	          $totalIVA = 0;
	          $totalIntereses = 0;
	          foreach ($datos as $row)
	          {
	            $totalIVA = $totalIVA + $row->iva;
	            $totalIntereses = $totalIntereses + $row->interes;
	            $total = $total + $row->iva + $row->interes; 
	            if ($contador == 0)
	            {
	              $inicio = $row->codigoSolicitud;
	            }
	            $contador++;
	          }
	         $final = $row->codigoSolicitud;
	        // tercera fila
	       	$this->excel->getActiveSheet()->setCellValue("A6", date('d/m/Y'));
	        $this->excel->getActiveSheet()->setCellValue("B6", $inicio);
	        $this->excel->getActiveSheet()->setCellValue("C6", $final);
	        $this->excel->getActiveSheet()->setCellValue("D6", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("E6", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("F6", "$".$total);
	        $this->excel->getActiveSheet()->setCellValue("H6", "$".$total);
	        $this->excel->getActiveSheet()->setCellValue("G6", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("I6", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("J6", '---');
	        // fin tercera fila

	        // cuarta fila
	        $this->excel->setActiveSheetIndex(0)->mergeCells('A7:C7');

	       	$this->excel->getActiveSheet()->setCellValue("A7", "Totales");
	        $this->excel->getActiveSheet()->setCellValue("D7", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("E7", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("F7", "$ ".$total);
	        $this->excel->getActiveSheet()->setCellValue("G7", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("H7", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("I7", "$ ".$total);
	        $this->excel->getActiveSheet()->setCellValue("J7", "---");
	        // fin cuarta fila

	        // Quinta fila
	        	for ($i=8; $i <= 15; $i++)
	        	{  
	        	$this->excel->setActiveSheetIndex(0)->mergeCells('A'.($i).':C'.($i)); 
	        	$this->excel->setActiveSheetIndex(0)->mergeCells('D'.($i).':E'.($i)); 
	        	$this->excel->setActiveSheetIndex(0)->mergeCells('F'.($i).':J'.($i)); 
	        	}
	        // fin quinta fila


	        $this->excel->getActiveSheet()->setCellValue("A8", 'Ventas no sujetas');
	        $this->excel->getActiveSheet()->setCellValue("A9", 'Excentas');
	        $this->excel->getActiveSheet()->setCellValue("A10", 'Exportaciones');
	        $this->excel->getActiveSheet()->setCellValue("A11", 'Locales');
	        $this->excel->getActiveSheet()->setCellValue("A12", 'Neto');
	        $this->excel->getActiveSheet()->setCellValue("A13", 'Impuesto');
	        $this->excel->getActiveSheet()->setCellValue("A14", '(-)Iva retenido');
	        $this->excel->getActiveSheet()->setCellValue("A15", 'Total');

	        $this->excel->getActiveSheet()->setCellValue("D8", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("D9", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("D10", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("D11", "$ ".$total);
	        $this->excel->getActiveSheet()->setCellValue("D12", "$ ".$totalIntereses);
	        $this->excel->getActiveSheet()->setCellValue("D13", "$ ".$totalIVA);
	        $this->excel->getActiveSheet()->setCellValue("D14", '$ 0.00');
	        $this->excel->getActiveSheet()->setCellValue("D15", "$ ".$total);	        

	        $this->excel->setActiveSheetIndex(0)->mergeCells('A19:J20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('B19:B20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('C19:C20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('D19:D20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('E19:E20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('F19:F20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('G19:G20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('H19:H20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('I19:I20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('J19:J20');
	        $this->excel->setActiveSheetIndex(0)->mergeCells('A20:J20');
	        $this->excel->getActiveSheet()->setCellValue("A19", "Nombre o firma del contribuyente_______________________________________________________");	        



	        //Definimos la data del cuerpo.
	        // $i = 0;
	        // $total = 0;
	        // $totalIVA = 0;
	        // $totalIntereses = 0;        
	        // foreach($datos as $row){
	        //    $contador++;
	        //    $totalIVA = $totalIVA + $row->iva;
	        //    $totalIntereses = $totalIntereses + $row->interes;
	        //    $total = $total + $row->iva + $row->interes;
	        //    $totalII = $row->iva + $row->interes; 
	        //    //Incrementamos una fila más, para ir a la siguiente.
	        //    //Informacion de las filas de la consulta.
	        //    $this->excel->getActiveSheet()->setCellValue("A{$contador}", $row->codigoCredito);
	        //    $this->excel->getActiveSheet()->setCellValue("B{$contador}", $row->Nombre_Cliente." ".$row->Apellido_Cliente);
	        //    $this->excel->getActiveSheet()->setCellValue("C{$contador}", "$".$row->interes); 
	        //    $this->excel->getActiveSheet()->setCellValue("D{$contador}", "$".$row->iva);
	        //    $this->excel->getActiveSheet()->setCellValue("E{$contador}", "$0");
	        //    $this->excel->getActiveSheet()->setCellValue("F{$contador}", "$0");
	        //    $this->excel->getActiveSheet()->setCellValue("G{$contador}", "$".$totalII);
	        //    $this->excel->getActiveSheet()->setCellValue("H{$contador}", "");
	        // }
	        // $contador = $contador + 1;
	        // $this->excel->getActiveSheet()->setCellValue("A{$contador}", " ");
	        // $this->excel->getActiveSheet()->setCellValue("B{$contador}", " ");
	        // $this->excel->getActiveSheet()->setCellValue("C{$contador}", "$".$totalIntereses); 
	        // $this->excel->getActiveSheet()->setCellValue("D{$contador}", "$".$totalIVA);
	        // $this->excel->getActiveSheet()->setCellValue("E{$contador}", "$0");
	        // $this->excel->getActiveSheet()->setCellValue("F{$contador}", "$0");
	        // $this->excel->getActiveSheet()->setCellValue("G{$contador}", "$".$total);
	        // $this->excel->getActiveSheet()->setCellValue("H{$contador}", "");

	        //Le ponemos un nombre al archivo que se va a generar.
	        $archivo = "reporte_general_creditos.xls";
	        header('Content-Type: application/vnd.ms-excel');
	        header('Content-Disposition: attachment;filename="'.$archivo.'"');
	        header('Cache-Control: max-age=0');
	        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	        //Hacemos una salida al navegador con el archivo Excel.
	        $objWriter->save('php://output');
	     }
		else
		{
			echo '<script type="text/javascript">
				alert("No hay datos que mostrar !!!");
				window.close();
				self.location ="'.base_url().'Reportes/ReporteIva/1"
				</script>';
		}		
	}

	public function CreditosPendientes($val){
		$p = $val;
		if($p ==1){
			$datos = $this->Reportes_Model->CreditosProceso();
			$data = array('datos' => $datos );
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$this->load->view('Reportes/viewCreditosAprobados', $data);
			$this->load->view('Base/footer');
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$datos = $this->Reportes_Model->CreditosProcesoFecha($fechaInicial, $fechaFinal);
			$data = array('datos' => $datos );
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$this->load->view('Reportes/viewCreditosAprobados', $data);
			$this->load->view('Base/footer');
		}
	}
	public function ReportePendientesPDF($val)
	{
		$p = $val;
		if($p ==1){
			$datos = $this->Reportes_Model->CreditosProceso();
			$descripcion = "REPORTE DE CREDITOS PENDIENTES";
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$datos = $this->Reportes_Model->CreditosProcesoFecha($fechaInicial, $fechaFinal);
			$descripcion = "REPORTE DE CREDITOS PENDIENTES OTORGADOS DESDE LA FECHA: ".$fechaInicial." HASTA LA FECHA: ".$fechaFinal;
		}
	$html="
	<link href='".base_url()."plantilla/css/bootstrap.min.css' rel='stylesheet' />
	<script src='".base_url()."plantilla/js/jquery.min.js'></script>
	<script src='".base_url()."plantilla/js/bootstrap.min.js'></script>
	<style>
	img {
	    text-align:left;
	    float:left;
	    width: 120px;
	    height: 100px;

	}

	#cabecera{
		width: 1000px;
	}
	#img{
		float:left;
		margin-left: 20px;
		width: 150px;

	}
	.textoCentral{
		color: #000;
		font-weight: bold;
		float:right;
		padding-left: 30px;
		margin: 0 auto;
		text-align: center;
		line-height:: 50;
		line-height: 26px;
		width: 400px
	}
	#creditos{
	font-size:12px;
}
</style>
	 <div class='container'>
	    <div class='row' id='cabecera'>
	            <div class='col-md-4 pull-left' id='img'>
	                <img class='' width='' src='".base_url()."plantilla/images/fc_logoR.png'>
	            </div>
	            <div class='col-md-4 textoCentral' id=''>
	                <p>GOCAJAA GROUP SA DE CV <br>
	                MERCEDES UMAÑA, USULUTAN <br>
	                ".$descripcion."<br> 
	            </div>
	    </div>
	    <strong style='font-weight: bold;'></strong><br><br>
	    <div>
	        <table class='table table-bordered' id='creditos'>
	            <thead class=''>
	                <tr>
	                  <th class='text-center'>Código de Cliente</th>
	                  <th class='text-center'>Cliente</th>
	                  <th class='text-center'>Tipo de Crédito</th>
	                  <th class='text-center'>Total a Pagar</th>
	                  <th class='text-center'>Total Abonado</th>
	                  <th class='text-center'>Estado</th>
	                </tr>
	              </thead>
	            <tbody>
	            ";
	foreach ($datos->result() as $creditos) {
		$i = $i +1;
		$html .= "	<tr>";
        $html .= "      <td class='text-center'> $creditos->Codigo_Cliente</td>";
        $html .= "      <td class='text-center'> $creditos->Nombre_Cliente    $creditos->Apellido_Cliente</td>";
        $html .= "      <td class='text-center'> $creditos->tipoCredito</td>";
        $html .= "      <td class='text-center'> $  $creditos->capital</td>";
        $html .= "      <td class='text-center'> $  $creditos->totalAbonado</td>";
        $html .= "      <td class='text-center'> $creditos->estadoCredito</td>";
        $html .= "  </tr>";
	}
	    
	$html .= "</tbody>
	        </table>
	    </div>
	</div>";

     $pdfFilePath = "reporte_de_creditos_pendientes.pdf";
     //load mPDF library
    $this->load->library('M_pdf');
    $mpdf = new mPDF('c', 'A4-L'); //Orientacion
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $mpdf->shrink_tables_to_fit = 1;
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, "I");

	}
public function ReportePendientesEXCEL()
	{
    $p = $val;
		if($p ==1){
			$datos = $this->Reportes_Model->CreditosProceso();
			$descripcion = "REPORTE DE CREDITOS PENDIENTES";
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$datos = $this->Reportes_Model->CreditosProcesoFecha($fechaInicial, $fechaFinal);
			$descripcion = "REPORTE DE CREDITOS PENDIENTES OTORGADOS DESDE LA FECHA: ".$fechaInicial." HASTA LA FECHA: ".$fechaFinal;
		}
    if(count($creditos) > 0){
        //Cargamos la librería de excel.
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Creditos');
        //Contador de filas
        $contador = 3;

        //Cabecera
		$styleArray = array(
			'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		);
		$this->excel->getActiveSheet()->getStyle('B1:E1')->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('B2:E2')->applyFromArray($styleArray);
        $this->excel->setActiveSheetIndex(0)->mergeCells('B1:E1');
        $this->excel->setActiveSheetIndex(0)->mergeCells('B2:E2');
        $this->excel->getActiveSheet()->setCellValue("B1", "GOCAJAA GROUP SA DE CV, MERCEDES UMAÑA, USULUTAN");
        $this->excel->getActiveSheet()->setCellValue("B2", $descripcion);
        // Fin cabecera

        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Código del cliente');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Cliente');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Tipo de crédito');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Total a pagar');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Total abonado');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Estado');
        //Definimos la data del cuerpo.        
        foreach($creditos as $credito){
           //Incrementamos una fila más, para ir a la siguiente.
           $contador++;
           //Informacion de las filas de la consulta.
           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $credito->Codigo_Cliente);
           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $credito->Nombre_Cliente." ".$credito->Apellido_Cliente);
           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $credito->tipoCredito); 
           $this->excel->getActiveSheet()->setCellValue("D{$contador}", $credito->capital);
           $this->excel->getActiveSheet()->setCellValue("E{$contador}", $credito->totalAbonado);
           $this->excel->getActiveSheet()->setCellValue("F{$contador}", $credito->estadoCredito);
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "reporte_general_creditos.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
     }
     else
     {
        echo 'No se han encontrado creditos';
        exit;        
     }
	}

	public function CreditosSaldados($val){
		$p = $val;
		if($p ==1){
			$datos = $this->Reportes_Model->CreditosSaldados();
			$data = array('datos' => $datos );
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$this->load->view('Reportes/viewCreditosSaldados', $data);
			$this->load->view('Base/footer');
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$datos = $this->Reportes_Model->CreditosSaldadosFecha($fechaInicial, $fechaFinal);
			$data = array('datos' => $datos );
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$this->load->view('Reportes/viewCreditosSaldados', $data);
			$this->load->view('Base/footer');
		}
	}

	public function ReporteSaldadosPDF($val)
	{
	$p = $val;
		if($p ==1){
			$datos = $this->Reportes_Model->CreditosSaldados();
			$descripcion = "REPORTE DE CREDITOS FINALIZADOS";
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$datos = $this->Reportes_Model->CreditosSaldadosFecha($fechaInicial, $fechaFinal);
			$descripcion = "REPORTE DE CREDITOS FINALIZADOS OTORGADOS DESDE LA FECHA: ".$fechaInicial." HASTA LA FECHA: ".$fechaFinal;
		};
	$html="
	<link href='".base_url()."plantilla/css/bootstrap.min.css' rel='stylesheet' />
	<script src='".base_url()."plantilla/js/jquery.min.js'></script>
	<script src='".base_url()."plantilla/js/bootstrap.min.js'></script>
	<style>
	img {
	    text-align:left;
	    float:left;
	    width: 120px;
	    height: 100px;

	}

	#cabecera{
		width: 1000px;
	}
	#img{
		float:left;
		margin-left: 20px;
		width: 150px;

	}
	.textoCentral{
		color: #000;
		font-weight: bold;
		float:right;
		padding-left: 30px;
		margin: 0 auto;
		text-align: center;
		line-height:: 50;
		line-height: 26px;
		width: 400px
	}
	#creditos{
	font-size:12px;
}
</style>
	 <div class='container'>
	    <div class='row' id='cabecera'>
	            <div class='col-md-4 pull-left' id='img'>
	                <img class='' width='' src='".base_url()."plantilla/images/fc_logoR.png'>
	            </div>
	            <div class='col-md-4 textoCentral' id=''>
	                <p>GOCAJAA GROUP SA DE CV <br>
	                MERCEDES UMAÑA, USULUTAN <br>
	                ".$descripcion."<br> 
	            </div>
	    </div>
	    <strong style='font-weight: bold;'></strong><br><br>
	    <div>
	        <table class='table table-bordered' id='creditos'>
	            <thead class=''>
	                <tr>
	                  <th class='text-center'>Código de Cliente</th>
	                  <th class='text-center'>Cliente</th>
	                  <th class='text-center'>Tipo de Crédito</th>
	                  <th class='text-center'>Total a Pagar</th>
	                  <th class='text-center'>Total Abonado</th>
	                  <th class='text-center'>Estado</th>
	                </tr>
	              </thead>
	            <tbody>
	            ";
	foreach ($datos->result() as $creditos) {
		$i = $i +1;
		$html .= "	<tr>";
        $html .= "      <td class='text-center'> $creditos->Codigo_Cliente</td>";
        $html .= "      <td class='text-center'> $creditos->Nombre_Cliente    $creditos->Apellido_Cliente</td>";
        $html .= "      <td class='text-center'> $creditos->tipoCredito</td>";
        $html .= "      <td class='text-center'> $  $creditos->capital</td>";
        $html .= "      <td class='text-center'> $  $creditos->totalAbonado</td>";
        $html .= "      <td class='text-center'> $creditos->estadoCredito</td>";
        $html .= "  </tr>";
	}
	    
	$html .= "</tbody>
	        </table>
	    </div>
	</div>";

     $pdfFilePath = "reporte_de_creditos_pendientes.pdf";
     //load mPDF library
    $this->load->library('M_pdf');
    $mpdf = new mPDF('c', 'A4-L'); //Orientacion
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $mpdf->shrink_tables_to_fit = 1;
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, "I");

	}
	public function ReporteSaldadosEXCEL($val)
	{
    $p = $val;
		if($p ==1){
			$creditos = $this->Reportes_Model->CreditosSaldados()->result();
			$descripcion = "REPORTE DE CREDITOS FINALIZADOS";
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$creditos = $this->Reportes_Model->CreditosSaldadosFecha($fechaInicial, $fechaFinal)->result();
			$descripcion = "REPORTE DE CREDITOS FINALIZADOS OTORGADOS DESDE LA FECHA: ".$fechaInicial." HASTA LA FECHA: ".$fechaFinal;
		};
    if(count($creditos) > 0){
        //Cargamos la librería de excel.
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Creditos');
        //Contador de filas
        $contador = 3;
        //Cabecera
		$styleArray = array(
			'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		);
		$this->excel->getActiveSheet()->getStyle('B1:E1')->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('B2:E2')->applyFromArray($styleArray);
        $this->excel->setActiveSheetIndex(0)->mergeCells('B1:E1');
        $this->excel->setActiveSheetIndex(0)->mergeCells('B2:E2');
        $this->excel->getActiveSheet()->setCellValue("B1", "GOCAJAA GROUP SA DE CV, MERCEDES UMAÑA, USULUTAN");
        $this->excel->getActiveSheet()->setCellValue("B2", $descripcion);
        // Fin cabecera

        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Código del cliente');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Cliente');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Tipo de crédito');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Total a pagar');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Total abonado');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Estado');
        //Definimos la data del cuerpo.        
        foreach($creditos as $credito){
           //Incrementamos una fila más, para ir a la siguiente.
           $contador++;
           //Informacion de las filas de la consulta.
           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $credito->Codigo_Cliente);
           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $credito->Nombre_Cliente." ".$credito->Apellido_Cliente);
           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $credito->tipoCredito); 
           $this->excel->getActiveSheet()->setCellValue("D{$contador}", $credito->capital);
           $this->excel->getActiveSheet()->setCellValue("E{$contador}", $credito->totalAbonado);
           $this->excel->getActiveSheet()->setCellValue("F{$contador}", $credito->estadoCredito);
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "reporte_general_creditos.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
     }
     else
     {
        echo 'No se han encontrado creditos saldados';
        exit;        
     }
	}
	public function CreditosMorosos($val){
		$p = $val;
		if($p ==1){
			$datos = $this->Reportes_Model->CreditosMorosos();
			$datos2 = $this->Reportes_Model->obtenerCreditosParaMora();
			$data = array('datos' => $datos, 'datos2'=>$datos2);
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$this->load->view('Reportes/viewCreditosMorosos', $data);
			$this->load->view('Base/footer');
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$datos = $this->Reportes_Model->CreditosMorososFecha($fechaInicial, $fechaFinal);
			$data = array('datos' => $datos );
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$this->load->view('Reportes/viewCreditosMorosos', $data);
			$this->load->view('Base/footer');
		}	
	}
	public function ReporteMorososPDF($val){
		$p = $val;
		if($p ==1){
			$datos = $this->Reportes_Model->CreditosMorosos();
			$descripcion = "REPORTE DE CREDITOS EN MORA";
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$datos = $this->Reportes_Model->CreditosMorososFecha($fechaInicial, $fechaFinal);
			$descripcion = "REPORTE DE CREDITOS EN MORA OTORGADOS DESDE LA FECHA: ".$fechaInicial." HASTA LA FECHA: ".$fechaFinal;
		}
	$html="
	<link href='".base_url()."plantilla/css/bootstrap.min.css' rel='stylesheet' />
	<script src='".base_url()."plantilla/js/jquery.min.js'></script>
	<script src='".base_url()."plantilla/js/bootstrap.min.js'></script>
	<style>
	img {
	    text-align:left;
	    float:left;
	    width: 120px;
	    height: 100px;

	}

	#cabecera{
		width: 1000px;
	}
	#img{
		float:left;
		margin-left: 20px;
		width: 150px;

	}
	.textoCentral{
		color: #000;
		font-weight: bold;
		float:right;
		padding-left: 30px;
		margin: 0 auto;
		text-align: center;
		line-height:: 50;
		line-height: 26px;
		width: 400px
	}
	#creditos{
	font-size:12px;
}
</style>
	 <div class='container'>
	    <div class='row' id='cabecera'>
	            <div class='col-md-4 pull-left' id='img'>
	                <img class='' width='' src='".base_url()."plantilla/images/fc_logoR.png'>
	            </div>
	            <div class='col-md-4 textoCentral' id=''>
	                <p>GOCAJAA GROUP SA DE CV <br>
	                MERCEDES UMAÑA, USULUTAN <br>
	                ".$descripcion."<br> 
	            </div>
	    </div>
	    <strong style='font-weight: bold;'></strong><br><br>
	    <div>
	        <table class='table table-bordered' id='creditos'>
	            <thead class=''>
	                <tr>
	                  <th class='text-center'>Código de Cliente</th>
	                  <th class='text-center'>Cliente</th>
	                  <th class='text-center'>Tipo de Crédito</th>
	                  <th class='text-center'>Total a Pagar</th>
	                  <th class='text-center'>Total Abonado</th>
	                  <th class='text-center'>Estado</th>
	                </tr>
	              </thead>
	            <tbody>
	            ";
	foreach ($datos->result() as $creditos) {

		$tipoCredito = $creditos->tipoCredito;
		$fechaActual = date("Y-m-d");
		if($tipoCredito =="Crédito popular mixto" || $tipoCredito =="Crédito popular prendario" ||  $tipoCredito =="Crédito popular hipotecario" || $tipoCredito =="Crédito popular"){
			$fechaComparacion = $creditos->fechaVencimiento;
			if($fechaActual>$fechaComparacion){
				$html .= "	<tr>";
		        $html .= "      <td class='text-center'> $creditos->Codigo_Cliente</td>";
		        $html .= "      <td class='text-center'> $creditos->Nombre_Cliente    $creditos->Apellido_Cliente</td>";
		        $html .= "      <td class='text-center'> $creditos->tipoCredito</td>";
		        $html .= "      <td class='text-center'> $  $creditos->capital</td>";
		        $html .= "      <td class='text-center'> $  $creditos->totalAbonado</td>";
		        $html .= "      <td class='text-center'> En mora</td>";
		        $html .= "  </tr>";
			}
			}
			else if($tipoCredito =="Crédito personal mixto" || $tipoCredito =="Crédito personal prendario" ||  $tipoCredito =="Crédito personal hipotecario" || $tipoCredito =="Crédito personal"){
				$fechaComparacion = $creditos->fechaProximoPago;
				if($fechaActual<$fechaComparacion){
					$html .= "	<tr>";
			        $html .= "      <td class='text-center'> $creditos->Codigo_Cliente</td>";
			        $html .= "      <td class='text-center'> $creditos->Nombre_Cliente    $creditos->Apellido_Cliente</td>";
			        $html .= "      <td class='text-center'> $creditos->tipoCredito</td>";
			        $html .= "      <td class='text-center'> $  $creditos->capital</td>";
			        $html .= "      <td class='text-center'> $  $creditos->totalAbonado</td>";
			        $html .= "      <td class='text-center'> En mora</td>";
			        $html .= "  </tr>";

				}
			}
		$i = $i +1;
	}    
	$html .= "</tbody>
	        </table>
	    </div>
	</div>";

     $pdfFilePath = "reporte_de_creditos_pendientes.pdf";
     //load mPDF library
    $this->load->library('M_pdf');
    $mpdf = new mPDF('c', 'A4-L'); //Orientacion
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $mpdf->shrink_tables_to_fit = 1;
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, "I");

	}
	public function ReporteMorososEXCEL($val)
	{
     $p = $val;
		if($p ==1){
			$creditos = $this->Reportes_Model->CreditosMorosos()->result();
			$descripcion = "REPORTE DE CREDITOS FINALIZADOS";
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$creditos = $this->Reportes_Model->CreditosMorososFecha($fechaInicial, $fechaFinal)->result();
			$descripcion = "REPORTE DE CREDITOS FINALIZADOS OTORGADOS DESDE LA FECHA: ".$fechaInicial." HASTA LA FECHA: ".$fechaFinal;
		};
    if(count($creditos) > 0){
        //Cargamos la librería de excel.
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Creditos');
        //Contador de filas
        $contador = 3;

        //Cabecera
		$styleArray = array(
			'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		);
		$this->excel->getActiveSheet()->getStyle('B1:E1')->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('B2:E2')->applyFromArray($styleArray);
        $this->excel->setActiveSheetIndex(0)->mergeCells('B1:E1');
        $this->excel->setActiveSheetIndex(0)->mergeCells('B2:E2');
        $this->excel->getActiveSheet()->setCellValue("B1", "GOCAJAA GROUP SA DE CV, MERCEDES UMAÑA, USULUTAN");
        $this->excel->getActiveSheet()->setCellValue("B2", $descripcion);
        // Fin cabecera

        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Código del cliente');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Cliente');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Tipo de crédito');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Total a pagar');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Total abonado');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Estado');
        //Definimos la data del cuerpo.        
        foreach($creditos as $credito){
           //Incrementamos una fila más, para ir a la siguiente.
           $contador++;
           //Informacion de las filas de la consulta.

           	$tipoCredito = $credito->tipoCredito;
			$fechaActual = date("Y-m-d");
		if($tipoCredito =="Crédito popular mixto" || $tipoCredito =="Crédito popular prendario" ||  $tipoCredito =="Crédito popular hipotecario" || $tipoCredito =="Crédito popular"){
			$fechaComparacion = $creditos->fechaVencimiento;
			if($fechaActual>$fechaComparacion){
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $credito->Codigo_Cliente);
	           	$this->excel->getActiveSheet()->setCellValue("B{$contador}", $credito->Nombre_Cliente." ".$credito->Apellido_Cliente);
	           	$this->excel->getActiveSheet()->setCellValue("C{$contador}", $credito->tipoCredito); 
	           	$this->excel->getActiveSheet()->setCellValue("D{$contador}", $credito->capital);
	           	$this->excel->getActiveSheet()->setCellValue("E{$contador}", $credito->totalAbonado);
	           	$this->excel->getActiveSheet()->setCellValue("F{$contador}", "En mora");

			}
		}
		else if($tipoCredito =="Crédito personal mixto" || $tipoCredito =="Crédito personal prendario" ||  $tipoCredito =="Crédito personal hipotecario" || $tipoCredito =="Crédito personal"){
				$fechaComparacion = $credito->fechaProximoPago;
			if($fechaActual>$fechaComparacion){
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $credito->Codigo_Cliente);
	           	$this->excel->getActiveSheet()->setCellValue("B{$contador}", $credito->Nombre_Cliente." ".$credito->Apellido_Cliente);
	           	$this->excel->getActiveSheet()->setCellValue("C{$contador}", $credito->tipoCredito); 
	           	$this->excel->getActiveSheet()->setCellValue("D{$contador}", $credito->capital);
	           	$this->excel->getActiveSheet()->setCellValue("E{$contador}", $credito->totalAbonado);
	           	$this->excel->getActiveSheet()->setCellValue("F{$contador}", "En mora");
			}
        }
    }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "reporte_creditos_morosos.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
     }
     else
     {
        echo 'No se han encontrado creditos saldados';
        exit;        
     }
	}


	public function Infored()
	{
		$datos = $this->Reportes_Model->ReporteInfored(null, null);
		$data = array('datos' => $datos );
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("Reportes/infored", $data);
		$this->load->view('Base/footer');
	}
	public function ReporteInfored()
	{
		$datos = $this->input->post();
		$año = date('Y');
		$mes = $datos['mesInfored'];
		$dia = date('d');
		$inicio = $año."/".$mes."/01";
		$fin = $año."/".$mes."/31";


		// Inicio reporte infored
		
	$creditos = $this->Reportes_Model->ReporteInfored($inicio, $fin)->result();
	$creditosAdicionales = $this->Reportes_Model->InforedFaltantes($inicio, $fin)->result();
    if(count($creditos) > 0 || count($creditosAdicionales) > 0){
        //Cargamos la librería de excel.
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Creditos');
        //Contador de filas
        $contador = 1;


        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('AB')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('AC')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('AD')->setWidth(15);
        //Le aplicamos negrita a los títulos de la cabecera.

        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'año');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'mes');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'nombre');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'tipo_per');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'num_ptm');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'inst');
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'fec_otor');
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'monto');
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'plazo');
        $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'saldo');
        $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'mora');
        $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'forma_pag');
        $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'tipo_rel');
        $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'linea_cre');
        $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'dias');
        $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'ult_pag');
        $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'tipo_gar');
        $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'tipo_mon');
        $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'valcuota');
        $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'dia');
        $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'fechanac');
        $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'dui');
        $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'nit');
        $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'fecha_can');
        $this->excel->getActiveSheet()->setCellValue("Y{$contador}", 'fecha_ven');
        $this->excel->getActiveSheet()->setCellValue("Z{$contador}", 'ncuotascre');
        $this->excel->getActiveSheet()->setCellValue("AA{$contador}", 'calif_act');
        $this->excel->getActiveSheet()->setCellValue("AB{$contador}", 'activi_eco');
        $this->excel->getActiveSheet()->setCellValue("AC{$contador}", 'sexo');
        $this->excel->getActiveSheet()->setCellValue("AD{$contador}", 'estcredito');
        //Definimos la data del cuerpo.        
        foreach($creditos as $fila)
        {
           	//Incrementamos una fila más, para ir a la siguiente.
           	$contador++;
           	//Informacion de las filas de la consulta.

			$this->excel->getActiveSheet()->setCellValue("A{$contador}", date('Y') );
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", $mes);
	       	$this->excel->getActiveSheet()->setCellValue("C{$contador}", $fila->Nombre_Cliente." ".$fila->Apellido_Cliente);
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", "1");
	       	$this->excel->getActiveSheet()->setCellValue("E{$contador}", $fila->codigoCredito); 
	       	$this->excel->getActiveSheet()->setCellValue("F{$contador}", "");
	       	$this->excel->getActiveSheet()->setCellValue("G{$contador}", $fila->fechaApertura);
	       	$this->excel->getActiveSheet()->setCellValue("H{$contador}", $fila->capital);
	       	$this->excel->getActiveSheet()->setCellValue("I{$contador}", $fila->plazoMeses);

	       	// Otro proceso
            $cre = $this->Reportes_Model->DatosAdicionalesInfored($fila->idCredito);
            if (@$cre->capitalPendiente != null)
              {
	       		$this->excel->getActiveSheet()->setCellValue("J{$contador}", $cre->capitalPendiente);
              }
	          else
	          {
	       		$this->excel->getActiveSheet()->setCellValue("J{$contador}", $fila->capital);
	          }

             if (@$cre->capitalPendiente != null)
              {
	       		$this->excel->getActiveSheet()->setCellValue("K{$contador}", $cre->mora);
              }
              else
              {
	       		$this->excel->getActiveSheet()->setCellValue("K{$contador}", "0.00");
              } 
            // fin

             if (strlen(stristr($fila->tipoCredito,'popular'))>0) {
	       		$this->excel->getActiveSheet()->setCellValue("L{$contador}", "9");
              }
              else
              {
	       		$this->excel->getActiveSheet()->setCellValue("L{$contador}", "5");
              }

	       	$this->excel->getActiveSheet()->setCellValue("M{$contador}", "1");
	       	$this->excel->getActiveSheet()->setCellValue("N{$contador}", "COM");

	       	$hoy = date('Y-m-d');
	        $vencimiento = date($fila->fechaVencimiento);
	        $dTrancurridos = $this->dias_transcurridos($vencimiento, $hoy);
	        if ($vencimiento > $hoy)
	        {
	       		$this->excel->getActiveSheet()->setCellValue("O{$contador}", "0");
	        }
	        else
	        {
	       		$this->excel->getActiveSheet()->setCellValue("O{$contador}", $dTrancurridos);
	        }

	        if (@$cre->capitalPendiente != null)
              {
	       		$this->excel->getActiveSheet()->setCellValue("P{$contador}", $cre->fechaPago);
              }
              else
              {
	       		$this->excel->getActiveSheet()->setCellValue("P{$contador}", $fila->fechaApertura);
              }

              if (strlen(stristr($fila->tipoCredito,'prendario'))>0) {
	       		$this->excel->getActiveSheet()->setCellValue("Q{$contador}", "PR");
              }
              else
              {
                if (strlen(stristr($fila->tipoCredito,'hipotecario'))>0) {
	       			$this->excel->getActiveSheet()->setCellValue("Q{$contador}", "HI");
                  }
                  else{
	       			$this->excel->getActiveSheet()->setCellValue("Q{$contador}", "FP");
                  }
              }

	       	$this->excel->getActiveSheet()->setCellValue("R{$contador}", "02");
	       	$this->excel->getActiveSheet()->setCellValue("S{$contador}", $fila->pagoCuota);
	       	$this->excel->getActiveSheet()->setCellValue("T{$contador}", date('d'));
	       	$this->excel->getActiveSheet()->setCellValue("U{$contador}", $fila->Fecha_Nacimiento_Cliente );
	       	$this->excel->getActiveSheet()->setCellValue("V{$contador}", $fila->DUI_Cliente);
	       	$this->excel->getActiveSheet()->setCellValue("W{$contador}", $fila->NIT_Cliente);

	       	if (@$cre->capitalPendiente != null)
              {
                if ($fila->estadoCredito == "Finalizado") {
	       		  $this->excel->getActiveSheet()->setCellValue("X{$contador}", substr($cre->fechaRegistro, 0, 10));
                }
                else
                {
	       		  $this->excel->getActiveSheet()->setCellValue("X{$contador}", "Pendiente");
                }
              }
              else
              {
	       		  $this->excel->getActiveSheet()->setCellValue("X{$contador}", "Pendiente");
              }
	       	$this->excel->getActiveSheet()->setCellValue("Y{$contador}", $fila->fechaVencimiento);
	       	$this->excel->getActiveSheet()->setCellValue("Z{$contador}", $fila->cantidadCuota);

	       	$hoy = date('Y-m-d');
	       	$cadena = "";
            $vencimiento = date($fila->fechaVencimiento);
            if ($vencimiento >= $hoy)
              {
                $cadena = "A1";
              }
            else
              {
                $numero =  $this->dias_transcurridos($vencimiento, $hoy);
                if ($fila->destinoCredito==1)
                {
                	
	                switch ($numero)
	                {
	                  case $numero > 0 && $numero <= 7:
	                      $cadena = "A1";
	                    break;
	                  case $numero > 7 && $numero <= 14:
	                      $cadena = "A2";
	                    break;
	                  case $numero > 14 && $numero <= 30:
	                      $cadena = "B";
	                    break;
	                  case $numero > 30 && $numero <= 90:
	                      $cadena = "C1";
	                    break;
	                  case $numero > 90 && $numero <= 120:
	                      $cadena = "C2";
	                    break;
	                  case $numero > 120 && $numero <= 150:
	                      $cadena = "D1";
	                    break;
	                  case $numero > 150 && $numero <= 180:
	                      $cadena = "D2";
	                    break;
	                  case $numero > 180:
	                      $cadena = "E";
	                    break;
	                  
	                  default:
	                    # code...
	                    break;
	                }
                }
                else
                {
                	if ($fila->destinoCredito==2)
	                {
	                	
		                switch ($numero)
		                {
		                  case $numero > 0 && $numero <= 7:
		                      $cadena = "A1";
		                    break;
		                  case $numero > 7 && $numero <= 30:
		                      $cadena = "A2";
		                    break;
		                  case $numero > 30 && $numero <= 90:
		                      $cadena = "B";
		                    break;
		                  case $numero > 90 && $numero <= 120:
		                      $cadena = "C1";
		                    break;
		                  case $numero > 120 && $numero <= 180:
		                      $cadena = "C2";
		                    break;
		                  case $numero > 180 && $numero <= 270:
		                      $cadena = "D1";
		                    break;
		                  case $numero > 270 && $numero <= 360:
		                      $cadena = "D2";
		                    break;
		                  case $numero > 360:
		                      $cadena = "E";
		                    break;
		                  
		                  default:
		                    # code...
		                    break;
		                }
	                }
	                else
	                {
	                	if ($fila->destinoCredito==3)
		                {
		                	
			                switch ($numero)
			                {
			                  case $numero > 0 && $numero <= 7:
			                      $cadena = "A1";
			                    break;
			                  case $numero > 7 && $numero <= 30:
			                      $cadena = "A2";
			                    break;
			                  case $numero > 30 && $numero <= 60:
			                      $cadena = "B";
			                    break;
			                  case $numero > 60 && $numero <= 90:
			                      $cadena = "C1";
			                    break;
			                  case $numero > 90 && $numero <= 120:
			                      $cadena = "C2";
			                    break;
			                  case $numero > 120 && $numero <= 150:
			                      $cadena = "D1";
			                    break;
			                  case $numero > 150 && $numero <= 180:
			                      $cadena = "D2";
			                    break;
			                  case $numero > 180:
			                      $cadena = "E";
			                    break;
			                  
			                  default:
			                    # code...
			                    break;
			                }
		                }
	                }
                }
              }
	       	$this->excel->getActiveSheet()->setCellValue("AA{$contador}", $cadena);
	       	$this->excel->getActiveSheet()->setCellValue("AB{$contador}", "Comerciante");

	       	$sexo ="";
	       	if ($fila->Genero_Cliente == "Masculino") {
                $sexo = "M";
              }
              else
              {
              	if ($fila->Genero_Cliente == "Femenino") {
	                $sexo = "F";
              	}
              	else
              	{
	                $sexo = "O";
              	}
              }
	       	$this->excel->getActiveSheet()->setCellValue("AC{$contador}", $sexo);

	       	$eCredito = "";
	       	switch ($fila->estadoCredito) {
                case 'Proceso':
                      $eCredito = "1";
                  break;
                case 'Vencido':
                      $eCredito = "1";
                  break;
                case 'Finalizado':
                      $eCredito = "3";
                  break;
                case 'Saneado':
                      $eCredito = "4 ";
                  break;
                
                default:
                  
                  break;
              }
	       	$this->excel->getActiveSheet()->setCellValue("AD{$contador}", $eCredito);
    	}	// Fin del foreach

    	$contador = $contador;
    	foreach($creditosAdicionales as $fila)
        {
           	//Incrementamos una fila más, para ir a la siguiente.
           	$contador++;
           	//Informacion de las filas de la consulta.

			$this->excel->getActiveSheet()->setCellValue("A{$contador}", date('Y') );
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", $mes);
	       	$this->excel->getActiveSheet()->setCellValue("C{$contador}", $fila->Nombre_Cliente." ".$fila->Apellido_Cliente);
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", "1");
	       	$this->excel->getActiveSheet()->setCellValue("E{$contador}", $fila->codigoCredito); 
	       	$this->excel->getActiveSheet()->setCellValue("F{$contador}", "");
	       	$this->excel->getActiveSheet()->setCellValue("G{$contador}", $fila->fechaApertura);
	       	$this->excel->getActiveSheet()->setCellValue("H{$contador}", $fila->capital);
	       	$this->excel->getActiveSheet()->setCellValue("I{$contador}", $fila->plazoMeses);
	       	$this->excel->getActiveSheet()->setCellValue("J{$contador}", $fila->capital);
	       	$this->excel->getActiveSheet()->setCellValue("K{$contador}", "0.00");
	       	// Otro proceso

	         if (strlen(stristr($fila->tipoCredito,'popular'))>0) {
	       		$this->excel->getActiveSheet()->setCellValue("L{$contador}", "9");
	          }
	          else
	          {
	       		$this->excel->getActiveSheet()->setCellValue("L{$contador}", "5");
	          }

	       	$this->excel->getActiveSheet()->setCellValue("M{$contador}", "1");
	       	$this->excel->getActiveSheet()->setCellValue("N{$contador}", "COM");

	       	$hoy = date('Y-m-d');
	        $vencimiento = date($fila->fechaVencimiento);
	        $dTrancurridos = $this->dias_transcurridos($vencimiento, $hoy);
	        if ($vencimiento > $hoy)
	        {
	       		$this->excel->getActiveSheet()->setCellValue("O{$contador}", "0");
	        }
	        else
	        {
	       		$this->excel->getActiveSheet()->setCellValue("O{$contador}", $dTrancurridos);
	        }

	       	$this->excel->getActiveSheet()->setCellValue("P{$contador}", $fila->fechaApertura);
	        
              if (strlen(stristr($fila->tipoCredito,'prendario'))>0) {
	       		$this->excel->getActiveSheet()->setCellValue("Q{$contador}", "PR");
              }
              else
              {
                if (strlen(stristr($fila->tipoCredito,'hipotecario'))>0) {
	       			$this->excel->getActiveSheet()->setCellValue("Q{$contador}", "HI");
                  }
                  else{
	       			$this->excel->getActiveSheet()->setCellValue("Q{$contador}", "FP");
                  }
              }

	       	$this->excel->getActiveSheet()->setCellValue("R{$contador}", "02");
	       	$this->excel->getActiveSheet()->setCellValue("S{$contador}", $fila->pagoCuota);
	       	$this->excel->getActiveSheet()->setCellValue("T{$contador}", date('d'));
	       	$this->excel->getActiveSheet()->setCellValue("U{$contador}", $fila->Fecha_Nacimiento_Cliente );
	       	$this->excel->getActiveSheet()->setCellValue("V{$contador}", $fila->DUI_Cliente);
	       	$this->excel->getActiveSheet()->setCellValue("W{$contador}", $fila->NIT_Cliente);
	       	$this->excel->getActiveSheet()->setCellValue("X{$contador}", "Pendiente");
	       	$this->excel->getActiveSheet()->setCellValue("Y{$contador}", $fila->fechaVencimiento);
	       	$this->excel->getActiveSheet()->setCellValue("Z{$contador}", $fila->cantidadCuota);

	       	$hoy = date('Y-m-d');
	       	$cadena = "";
            $vencimiento = date($fila->fechaVencimiento);
            if ($vencimiento >= $hoy)
              {
                $cadena = "A1";
              }
            else
              {
                $numero =  $this->dias_transcurridos($vencimiento, $hoy);
                if ($fila->destinoCredito==1)
                {
                	
	                switch ($numero)
	                {
	                  case $numero > 0 && $numero <= 7:
	                      $cadena = "A1";
	                    break;
	                  case $numero > 7 && $numero <= 14:
	                      $cadena = "A2";
	                    break;
	                  case $numero > 14 && $numero <= 30:
	                      $cadena = "B";
	                    break;
	                  case $numero > 30 && $numero <= 90:
	                      $cadena = "C1";
	                    break;
	                  case $numero > 90 && $numero <= 120:
	                      $cadena = "C2";
	                    break;
	                  case $numero > 120 && $numero <= 150:
	                      $cadena = "D1";
	                    break;
	                  case $numero > 150 && $numero <= 180:
	                      $cadena = "D2";
	                    break;
	                  case $numero > 180:
	                      $cadena = "E";
	                    break;
	                  
	                  default:
	                    # code...
	                    break;
	                }
                }
                else
                {
                	if ($fila->destinoCredito==2)
	                {
	                	
		                switch ($numero)
		                {
		                  case $numero > 0 && $numero <= 7:
		                      $cadena = "A1";
		                    break;
		                  case $numero > 7 && $numero <= 30:
		                      $cadena = "A2";
		                    break;
		                  case $numero > 30 && $numero <= 90:
		                      $cadena = "B";
		                    break;
		                  case $numero > 90 && $numero <= 120:
		                      $cadena = "C1";
		                    break;
		                  case $numero > 120 && $numero <= 180:
		                      $cadena = "C2";
		                    break;
		                  case $numero > 180 && $numero <= 270:
		                      $cadena = "D1";
		                    break;
		                  case $numero > 270 && $numero <= 360:
		                      $cadena = "D2";
		                    break;
		                  case $numero > 360:
		                      $cadena = "E";
		                    break;
		                  
		                  default:
		                    # code...
		                    break;
		                }
	                }
	                else
	                {
	                	if ($fila->destinoCredito==3)
		                {
		                	
			                switch ($numero)
			                {
			                  case $numero > 0 && $numero <= 7:
			                      $cadena = "A1";
			                    break;
			                  case $numero > 7 && $numero <= 30:
			                      $cadena = "A2";
			                    break;
			                  case $numero > 30 && $numero <= 60:
			                      $cadena = "B";
			                    break;
			                  case $numero > 60 && $numero <= 90:
			                      $cadena = "C1";
			                    break;
			                  case $numero > 90 && $numero <= 120:
			                      $cadena = "C2";
			                    break;
			                  case $numero > 120 && $numero <= 150:
			                      $cadena = "D1";
			                    break;
			                  case $numero > 150 && $numero <= 180:
			                      $cadena = "D2";
			                    break;
			                  case $numero > 180:
			                      $cadena = "E";
			                    break;
			                  
			                  default:
			                    # code...
			                    break;
			                }
		                }
	                }
                }
              }
	       	$this->excel->getActiveSheet()->setCellValue("AA{$contador}", $cadena);
	       	$this->excel->getActiveSheet()->setCellValue("AB{$contador}", "Comerciante");

	       	$sexo ="";
	       	if ($fila->Genero_Cliente == "Masculino") {
                $sexo = "M";
              }
              else
              {
              	if ($fila->Genero_Cliente == "Femenino") {
	                $sexo = "F";
              	}
              	else
              	{
	                $sexo = "O";
              	}
              }
	       	$this->excel->getActiveSheet()->setCellValue("AC{$contador}", $sexo);

	       	$eCredito = "";
	       	switch ($fila->estadoCredito) {
                case 'Proceso':
                      $eCredito = "1";
                  break;
                case 'Vencido':
                      $eCredito = "1";
                  break;
                case 'Finalizado':
                      $eCredito = "3";
                  break;
                case 'Saneado':
                      $eCredito = "4 ";
                  break;
                
                default:
                  
                  break;
              }
	       	$this->excel->getActiveSheet()->setCellValue("AD{$contador}", $eCredito);
    	}	// Fin del foreach
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "reporte_infored.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
     }
     else
     {
        echo '<script type="text/javascript">
			alert("No hay datos que mostrar !!!");
			window.close();
			self.location ="'.base_url().'Reportes/Infored"
			</script>';;
        exit;        
     }

     // Fin infored
	}

	public function ReporteCalificacion($val){

		$p = $val;
		if($p ==1){
			$datos = $this->Reportes_Model->Calificacion();
			$data = array('datos' => $datos );
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$this->load->view('Reportes/viewCalificacion', $data);
			$this->load->view('Base/footer');
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$datos = $this->Reportes_Model->CalificacionFecha($fechaInicial, $fechaFinal);
			$data = array('datos' => $datos );
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$this->load->view('Reportes/viewCalificacion', $data);
			$this->load->view('Base/footer');	
	}
	}
	public function CalificacionEXCEL($val)
	{
    $p = $val;

		if($p ==1){
			$creditos = $this->Reportes_Model->Calificacion()->result();
			$descripcion = "REPORTE DE CREDITOS FINALIZADOS";
		}
		else if($p == 2){
			$fechaInicial = $this->input->GET('fechaInicial');
			$fechaFinal = $this->input->GET('fechaFinal');
			$creditos = $this->Reportes_Model->CalificacionFecha($fechaInicial, $fechaFinal)->result();
			$descripcion = "REPORTE DE CALIFICACION DE CREDITOS OTORGADOS DESDE LA FECHA: ".$fechaInicial." HASTA LA FECHA: ".$fechaFinal;
		};
    if(count($creditos) > 0){
        //Cargamos la librería de excel.
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Creditos');
        //Contador de filas
        $contador = 3;
        //Cabecera
		$styleArray = array(
			'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		);
		$this->excel->getActiveSheet()->getStyle('B1:E1')->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('B2:E2')->applyFromArray($styleArray);
        $this->excel->setActiveSheetIndex(0)->mergeCells('B1:E1');
        $this->excel->setActiveSheetIndex(0)->mergeCells('B2:E2');
        $this->excel->getActiveSheet()->setCellValue("B1", "GOCAJAA GROUP SA DE CV, MERCEDES UMAÑA, USULUTAN");
        $this->excel->getActiveSheet()->setCellValue("B2", $descripcion);
        // Fin cabecera

        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);

        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'codigo');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'nombre');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'cuenta');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'fechaap');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'fechault');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'vence');
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'monto');
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'saldo');
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'calif');
        $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'intcte');

        //Definimos la data del cuerpo.        
        foreach($creditos as $credito){
           //Incrementamos una fila más, para ir a la siguiente.
           $contador++;
           //Informacion de las filas de la consulta.
           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $credito->Codigo_Cliente);
           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $credito->Nombre_Cliente." ".$credito->Apellido_Cliente);
           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $credito->codigoCredito); 
           $this->excel->getActiveSheet()->setCellValue("D{$contador}", $credito->fechaApertura);
           $this->excel->getActiveSheet()->setCellValue("E{$contador}", $credito->fechaPago);
           $this->excel->getActiveSheet()->setCellValue("F{$contador}", $credito->fechaVencimiento);
           $this->excel->getActiveSheet()->setCellValue("G{$contador}", $credito->capital);

           $tipoCredito=$credito->tipoCredito;
           $pendiente = $credito->capital - $credito->totalAbonado;
           $diasFalt=0;
           if($tipoCredito =="Crédito popular mixto" || $tipoCredito =="Crédito popular prendario" ||  $tipoCredito =="Crédito popular hipotecario" || $tipoCredito =="Crédito popular"){
			$fechaComparacion = $credito->fechaVencimiento;
			if($val==2){
				$fechaActual=$this->input->GET('fechaFinal');
			}
			else{
				$fechaActual = date("Y-m-d");
			}
			
			if($fechaActual>$fechaComparacion){
				$inicio = strtotime($fechaActual);
                $fin = strtotime($fechaComparacion);
                $dif = $inicio - $fin;
                $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
			}
			else{
				$diasFalt =1;
			}
			}
			else if($tipoCredito =="Crédito personal mixto" || $tipoCredito =="Crédito personal prendario" ||  $tipoCredito =="Crédito personal hipotecario" || $tipoCredito =="Crédito personal"){
			$fechaComparacion = $credito->fechaProximoPago;
			if($val==2){
				$fechaActual=$this->input->GET('fechaFinal');
			}
			else{
				$fechaActual = date("Y-m-d");
			}
			
			if($fechaActual>$fechaComparacion){
				$inicio = strtotime($fechaActual);
                $fin = strtotime($fechaComparacion);
                $dif = $fin- $inicio;
                $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
			}
			else{
				$diasFalt =1;
			}
			}
           $this->excel->getActiveSheet()->setCellValue("H{$contador}", $pendiente);
           $this->excel->getActiveSheet()->setCellValue("I{$contador}",$diasFalt);
           $this->excel->getActiveSheet()->setCellValue("J{$contador}", "aa");
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "reporte_general_creditos.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
     }
     else
     {
        echo 'No se han encontrado creditos saldados';
        exit;        
     }
	}


	public function dias_transcurridos($fecha_i,$fecha_f)
      {
        $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
        $dias   = abs($dias); $dias = floor($dias);   
        return $dias;
      }

      public function CreditosVencidos($val)
      {
      	$this->load->view('Base/header');
		$this->load->view('Base/nav');
		if ($val==1) 
		{
			$datos = $this->Creditos_Model->ObtenerCreditos();
			$data = array('datos' => $datos );
		}
		else{
			$datos = $this->input->post();
			$i = $datos['fechaInicial'];
			$f = $datos['fechaFinal'];
			$datos = $this->Reportes_Model->ObtenerCreditosFecha($i, $f);
			$data = array('datos' => $datos, 'i' => $i, 'f' => $f);
		}

		$this->load->view('Reportes/vencidos', $data);
		$this->load->view('Base/footer');
      }

      public function GeneralPorCliente()
		{
			$datos = $this->input->post();
			$nombre = $datos['nombreCliente'];
			$this->load->view('Base/header');
			$this->load->view('Base/nav');
			$datos = $this->Reportes_Model->ObtenerCreditosCliente($nombre);
			$data = array('datos' => $datos, "cliente" => $nombre );
			$this->load->view('Reportes/porCliente', $data);
			$this->load->view('Base/footer');
		}
	public function ReporteGeneralClientePDF($val)
	{

		$datos = $this->Reportes_Model->ObtenerCreditosCliente($val);
		if (sizeof($datos) != 0)
		{
		
		$html="
		<link href='".base_url()."plantilla/css/bootstrap.min.css' rel='stylesheet' />
		<script src='".base_url()."plantilla/js/jquery.min.js'></script>
		<script src='".base_url()."plantilla/js/bootstrap.min.js'></script>
		<style>
		img {
		    text-align:left;
		    float:left;
		    width: 120px;
		    height: 100px;

		}

		#cabecera{
			width: 1000px;
		}
		#img{
			float:left;
			margin-left: 20px;
			width: 150px;

		}
		.textoCentral{
			color: #000;
			font-weight: bold;
			float:right;
			padding-left: 30px;
			margin: 0 auto;
			text-align: center;
			line-height:: 50;
			line-height: 26px;
			width: 400px
		}
		#creditos{
		font-size:12px;
	}
	</style>
		 <div class='container'>
		    <div class='row' id='cabecera'>
		            <div class='col-md-4 pull-left' id='img'>
		                <img class='' width='' src='".base_url()."plantilla/images/fc_logoR.png'>
		            </div>
		            <div class='col-md-4 textoCentral' id=''>
		                <p>GOCAJAA GROUP SA DE CV <br>
		                MERCEDES UMAÑA, USULUTAN <br>
		                REPORTE DE CRÉDITOS POR CLIENTE<br> 
		            </div>
		    </div>
		    <strong style='font-weight: bold;'></strong><br><br>
		    <div>
		        <table class='table table-bordered' id='creditos'>
		            <thead class=''>
		            	<tr>";
			   $html.= "<td colspan='9' class='text-center'><strong>REPORTE DE CRÉDITOS POR CLIENTE</strong></td>";
		       $html .= "</tr>
		       			<tr>
		                  <th class='text-center'>Código de Cliente</th>
		                  <th class='text-center'>Cliente</th>
		                  <th class='text-center'>Tipo de Crédito</th>
		                  <th class='text-center'>Total a Pagar</th>
		                  <th class='text-center'>Total Abonado</th>
		                  <th class='text-center' >Intereses pagados</th>
	                      <th class='text-center' >Intereses pendientes</th>
		                  <th class='text-center'>Estado</th>
		                </tr>
		              </thead>
		            <tbody>
		            ";
		foreach ($datos->result() as $creditos) {
			$i = $i +1;
			if ($creditos->estadoCredito != "Finalizado") {
	        // if($creditos->estadoCredito=="Finalizado"){
	          $datosExtras = $this->Reportes_Model->DatosAdicionalesRG($creditos->idCredito );

	          $IP = 0;
	          if ($datosExtras->interesesPagados != null)
	          {
	            $IP = $datosExtras->interesesPagados;
	          }
			$html .= "	<tr>";
	        $html .= "      <td class='text-center'> $creditos->Codigo_Cliente</td>";
	        $html .= "      <td class='text-center'> $creditos->Nombre_Cliente    $creditos->Apellido_Cliente</td>";
	        $html .= "      <td class='text-center'> $creditos->tipoCredito</td>";
	        $html .= "      <td class='text-center'> $  $creditos->capital</td>";
	        $html .= "      <td class='text-center'> $  $creditos->totalAbonado</td>";
	        $html .= "      <td class='text-center'> $  $IP </td>";
	        $html .= "      <td class='text-center'> $  $creditos->interesPendiente</td>";
	        $html .= "      <td class='text-center'> $creditos->estadoCredito</td>";
	        $html .= "  </tr>";
		}
		}
		    
		$html .= "</tbody>
		        </table>
		    </div>
		</div>";

	     $pdfFilePath = "reporte_de_creditos_por_cliente.pdf";
	     //load mPDF library
	    $this->load->library('M_pdf');
	    $mpdf = new mPDF('c', 'A4-L'); //Orientacion
	    $mpdf->SetDisplayMode('fullpage');
	    $mpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	    $mpdf->shrink_tables_to_fit = 1;
	    $mpdf->WriteHTML($html);
	    $mpdf->Output($pdfFilePath, "I");

	    }
	    else
	    {
	    	echo '<script type="text/javascript">
				alert("No hay datos que mostrar !!!");
				window.close();
				self.location ="'.base_url().'Reportes/General/1"
				</script>';
	    }

	}

	public function ReporteGeneralClienteEXCEL($val)
	{
	$creditos = $this->Reportes_Model->ObtenerCreditosCliente($val)->result();
    if(count($creditos) > 0){
        //Cargamos la librería de excel.
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Creditos');
        //Contador de filas
        $contador = 3;

        //Cabecera
		$styleArray = array(
			'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		);

		$this->excel->getActiveSheet()->getStyle('B1:G1')->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($styleArray);
        $this->excel->setActiveSheetIndex(0)->mergeCells('B1:G1');
        $this->excel->setActiveSheetIndex(0)->mergeCells('B2:G2');
        $this->excel->getActiveSheet()->setCellValue("B1", "GOCAJAA GROUP SA DE CV, MERCEDES UMAÑA, USULUTAN");
        $this->excel->getActiveSheet()->setCellValue("B2", "REPORTE DE CRÉDITOS POR CLIENTE");
        // Fin cabecera

        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Código del cliente');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Cliente');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Tipo de crédito');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Total a pagar');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Total abonado');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Intereses pagados');
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Intereses pendientes');
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Estado');
        //Definimos la data del cuerpo.        
        foreach($creditos as $credito){
           //Incrementamos una fila más, para ir a la siguiente.
           $contador++;
           if ($credito->estadoCredito != "Finalizado") {
        // if($creditos->estadoCredito=="Finalizado"){
          $datosExtras = $this->Reportes_Model->DatosAdicionalesRG($credito->idCredito );

          $IP = 0;
          if ($datosExtras->interesesPagados != null)
          {
            $IP = $datosExtras->interesesPagados;
          }
           //Informacion de las filas de la consulta.
           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $credito->Codigo_Cliente);
           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $credito->Nombre_Cliente." ".$credito->Apellido_Cliente);
           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $credito->tipoCredito); 
           $this->excel->getActiveSheet()->setCellValue("D{$contador}", $credito->capital);
           $this->excel->getActiveSheet()->setCellValue("E{$contador}", $credito->totalAbonado);
           $this->excel->getActiveSheet()->setCellValue("F{$contador}", $IP);
           $this->excel->getActiveSheet()->setCellValue("G{$contador}", $credito->interesPendiente);
           $this->excel->getActiveSheet()->setCellValue("H{$contador}", $credito->estadoCredito);
        }
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "reporte_de_creditos_por_cliente.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
     }
     else
     {
        echo 'No se han encontrado creditos';
        exit;        
     }
	}	
}
?>