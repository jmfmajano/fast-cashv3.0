<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CajaChica extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("CajaChica_Model");
	}
	public function index()
	{
		$datos = $this->CajaChica_Model->ObtenerCajaActiva();
		$tipoPago = $this->CajaChica_Model->ObtenerTiposDePago();
		$data = array('datos'=>$datos, 'tipoPago'=>$tipoPago);

		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("CajaChica/index", $data);
		$this->load->view('Base/footer');
	}

	public function AperturarCaja()
	{
		$datos = $this->input->post();
		$bool = $this->CajaChica_Model->AperturarCaja($datos);
		if($bool){
				$this->session->set_flashdata("guardar","Se aperturo caja general, <b>proceso</b> con éxito.");
				redirect(base_url()."CajaChica/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error en el <b>preceso</b> de aperturar caja chica.");
			redirect(base_url()."CajaChica/");

		}
	}

	public function GuardarProcesoCG()
	{
		$datos = $this->input->post();
		$bool = $this->CajaChica_Model->GuardarProcesoCG($datos);
		if($bool){
				$this->session->set_flashdata("guardar","Proceso <b>registrado</b> correctamente en caja general.");
				redirect(base_url()."CajaChica/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error al <b>registrar</b> el proceso en caja.");
			redirect(base_url()."CajaChica/");

		}
	}

	public function CerrarCajaGeneral()
	{
		$datos = $this->input->post();
		$id=$datos['id_cc'];
		$bool = $this->CajaChica_Model->CerrarCajaGeneral($datos);
		if($bool){
				$this->session->set_flashdata("informa","Se cerro caja general !!!");
				redirect(base_url()."CajaChica/DetalleCajaGeneral/$id"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error al registrar el proceso");
			redirect(base_url()."CajaChica/");

		}
	}

	public function DetalleCajaGeneral($id)
	{
		$datos = $this->CajaChica_Model->DetalleCajaGeneral($id);
		// $tipoPago = $this->CajaChica_Model->ObtenerTiposDePago();
		$data = array('datos'=>$datos);

		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("CajaChica/detalle_caja_general", $data);
		$this->load->view('Base/footer');
	}

	public function HistorialCajas()
	{
		$datos = $this->CajaChica_Model->HistorialCajaGeneral();
		$CC = $this->CajaChica_Model->HistorialCajaChica();
		$data = array('datos'=>$datos, 'cajaChica'=>$CC);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("CajaChica/historial_cajas", $data);
		$this->load->view('Base/footer');
	}

	public function CajaChica()
	{
		$datos = $this->CajaChica_Model->ObtenerCajaCActiva();
		$tipoPago = $this->CajaChica_Model->ObtenerTiposDePago();
		$data = array('datos'=>$datos, 'tipoPago'=>$tipoPago);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("CajaChica/caja_chica", $data);
		$this->load->view('Base/footer');	
	}


	public function AperturarCajaChica()
	{
		$datos = $this->input->post();
		$bool = $this->CajaChica_Model->AperturarCajaChica($datos);
		if($bool){
				$this->session->set_flashdata("guardar","Se aperturo caja chica, <b>proceso</b> con éxito.");
				redirect(base_url()."CajaChica/CajaChica"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error en el <b>preceso</b> de aperturar caja chica.");
			redirect(base_url()."CajaChica/CajaChica");

		}
	}

	public function GuardarProcesoCC()
	{
		$datos = $this->input->post();
		$bool = $this->CajaChica_Model->GuardarProcesoCC($datos);
		if($bool){
				$this->session->set_flashdata("guardar","Proceso <b>registrado</b> correctamente en caja chica.");
				redirect(base_url()."CajaChica/CajaChica"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error al <b>registrar</b> el proceso en caja.");
			redirect(base_url()."CajaChica/CajaChica");

		}
	}

	public function CerrarCajaChica()
	{
		$datos = $this->input->post();
		$id=$datos['id_cc'];
		$bool = $this->CajaChica_Model->CerrarCajaChica($datos);
		if($bool){
				$this->session->set_flashdata("informa","Se cerro caja chica !!!");
				redirect(base_url()."CajaChica/DetalleCajaChica/$id"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error al registrar el proceso");
			redirect(base_url()."CajaChica/CajaChica");

		}
	}

	public function DetalleCajaChica($id)
	{
		$datos = $this->CajaChica_Model->DetalleCajaChica($id);
		// $tipoPago = $this->CajaChica_Model->ObtenerTiposDePago();
		$data = array('datos'=>$datos);

		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("CajaChica/detalle_caja_chica", $data);
		$this->load->view('Base/footer');
	}

}
?>