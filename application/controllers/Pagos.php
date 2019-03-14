<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Pagos_Model");
		$this->load->model("Creditos_Model");
		$this->load->model("CajaChica_Model");		
	}
	public function index(){
		$data = $this->Creditos_Model-> ObtenerCreditosPopulares();
		$data2 = $this->CajaChica_Model->ObtenerCajaActiva();
		$datos = array('creditos'=>$data, 'caja'=>$data2);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Pagos/InsertarPagos', $datos);
		$this->load->view('Base/footer');
	}
	public function CargarDetallePago(){
		$id= $this->input->GET('Id');
		$data = $this->Creditos_Model->obtenerDetalleCredito($id);
		echo json_encode($data->result());
	}
	public function CargarUltimoPago(){
		$id= $this->input->GET('Id');
		$data = $this->Pagos_Model->obtenerUltimoPago($id);
		echo json_encode($data->result());
	}
	public function InsertarPago(){
		$datos = $this->input->post();
		$data2 = $this->CajaChica_Model->ObtenerCajaActiva();
		$bool=$this->Pagos_Model->InsertarPago($datos);
		if($bool){
			$this->session->set_flashdata("guardar","El pago se <b>realizo</b> con éxito.");
			redirect(base_url()."Creditos");
		}
		else{
			$this->session->set_flashdata("errorr","Error el pago no se pudo <b>realizar</b>.");
			redirect(base_url()."Creditos");
		}
	}
	public function PagarCredito(){
		//$data = $this->Creditos_Model->ObtenerCreditos();
		$data2 = $this->CajaChica_Model->ObtenerCajaActiva();
		$id= $this->input->GET('Id');
		$data = $this->Pagos_Model->obtenerUltimoPago($id);
		
		if(sizeof($data->result())==0){
			$data = $this->Creditos_Model->obtenerDetalleCredito($id);
			//echo json_encode($data);

		}
		$datos = array('creditos'=>$data, 'caja'=>$data2);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Pagos/viewPagoDirecto', $datos);
		$this->load->view('Base/footer');
	}
	public function CreditosPersonales(){
		//$this->load->model('Creditos_Model');
		$data = $this->Creditos_Model->ObtenerCreditosPersonales();
		$data2 = $this->CajaChica_Model->ObtenerCajaActiva();
		$datos = array('creditos'=>$data, 'caja'=>$data2);
		//echo json_encode($datos->result());
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Pagos/PagosCreditosPersonales', $datos);
		$this->load->view('Base/footer');

	}
	public function CargarNumPago(){
		$id = $this->input->GET('Ide');
		$data = $this->Pagos_Model->obtenerNumPago($id);
		echo json_encode($data->result());

	}
	
}
?>