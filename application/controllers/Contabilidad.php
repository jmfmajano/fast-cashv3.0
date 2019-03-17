<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contabilidad extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("PartidasModel");
	}

	public function index()
	{
		$datos = $this->PartidasModel->obtenerCuentas();
		$data = array('datos' => $datos);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Contabilidad/crear_partida', $data);
		$this->load->view('Base/footer');
	}

	public function LibroDiario()
	{
		$datos = $this->PartidasModel->LibroDiario();
		$data = array('datos' => $datos );
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Contabilidad/libro_diario', $data);
		$this->load->view('Base/footer');
	}

	public function LibroMayor()
	{
		$datos = $this->PartidasModel->LibroMayor()->result();
		$data = array('datos' => $datos );
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Contabilidad/libro_mayor', $data);
		$this->load->view('Base/footer');
	}

	public function BalanceComprobacion()
	{
		$datos = $this->PartidasModel->LibroMayor()->result();
		$data = array('datos' => $datos );
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Contabilidad/balance_comprobacion', $data);
		$this->load->view('Base/footer');
	}

	public function GuardarPartida()
	{
		$datos = $this->input->post();
		$bool = $this->PartidasModel->GuardarPartida($datos, $this->session->userdata('idAcceso'));
		if($bool){
				$this->session->set_flashdata("guardar","La partida se guardo correctamente");
				redirect(base_url()."Contabilidad/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error al guardar la solicitud");
			redirect(base_url()."Contabilidad/");

		}
		// var_dump($datos);
	}


}
