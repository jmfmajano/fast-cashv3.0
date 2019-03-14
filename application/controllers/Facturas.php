<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturas extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Factura_Model");
		$this->load->model("Creditos_Model");		
	}
	public function index(){
		$data = $this->Factura_Model->cargarFacturas();
		$datos = array('factura'=>$data);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Facturas/viewFactura', $datos);
		$this->load->view('Base/footer');
	}
	public function DetalleFactura($id){

		$data = $this->Factura_Model->cargarFacturasById($id);
		$datos = array('factura'=>$data);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Facturas/viewDetalleFactura', $datos);
		$this->load->view('Base/footer');
	}
	public function FacturarCreditosPopulares(){
		$data=$this->Creditos_Model->ObtenerCreditosPopulares();
		$datos = array('populares'=>$data);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Facturas/viewFacturarCreditosPopulares', $datos);
		$this->load->view('Base/footer');
	}
	public function ObtenerCreditoCodigo(){
		$codigo= $this->input->GET('Codigo');
		$data = $this->Factura_Model->ObtenerCreditoId($codigo);
		echo json_encode($data);
	}
	public function calcularFactura(){
		$id= $this->input->GET('Id');
		$FechaInicio= $this->input->GET('fechaInicio');
		$FechaFin = $this->input->GET('fechaFin');
		$data = $this->Factura_Model->CalcularFactura($id, $FechaInicio, $FechaFin);
		echo json_encode($data);
	}
	public function insertarFactura(){
		$datos = $this->input->POST();
		$bool= $this->Factura_Model->InsertarFactura($datos);
		if($bool){
			echo "insetado";
		}
		else{
			echo "no insertado";
		}

	}
	public function filtrarFactura($filtro){
		if($filtro == 1){
			$nombre = $this->input->get('Nombre');
			$datos = $this->Factura_Model->filtrosNombre($nombre);
		}
		else if($filtro == 2){
			$fecha1 = $this->input->get('fecha1');
			$fecha2 = $this->input->get('fecha2');
			$datos = $this->Factura_Model->filtrosFecha($fecha1, $fecha2);
		}
		else if($filtro == 3){
			$nFactura = $this->input->get('nFactura');
			$datos = $this->Factura_Model->filtrosCodigoFactura($nFactura);
		}
		else {
			$datos = $this->Factura_Model->cargarFacturas()->result();
		}

		echo json_encode($datos);
	}

	public function facturarMes(){
		$fecha1 = $this->input->get('fecha1');
		$fecha2 = $this->input->get('fecha2');
		$datos = $this->Factura_Model->generarFacturasMes($fecha1, $fecha2);
		echo json_encode($datos);
	}
}
?>