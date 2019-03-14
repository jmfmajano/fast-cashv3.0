<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadosSolicitud extends CI_Controller {	

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->model("Estados_Model");
		$datos = $this->Estados_Model->GetEstados();
		$data = array('datos' => $datos);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('EstadosSolicitud/Gestionar_EstadosSolicitud', $data);
		$this->load->view('Base/footer');
	}
	public function Guardar(){
		$datos=$this->input->POST();
		$this->load->model('Estados_Model');
		$bool=$this->Estados_Model->InsertarEstado($datos);
		if($bool){
			$this->session->set_flashdata("guardar","El estado de solicitud a sido <b>guardado</b> con éxito.");
			redirect(base_url()."EstadosSolicitud");
		}
		else{
			$this->session->set_flashdata("errorr","Error el estado de solicitud no se pudo <b>guardar</b>.");
			redirect(base_url()."EstadosSolicitud");
		}

	}
	public function Editar(){
		$datos=$this->input->POST();
		$this->load->model('Estados_Model');
		$bool=$this->Estados_Model->EditarEstado($datos);
		if($bool){
				$this->session->set_flashdata("actualizado","El estado de solicitud a sido <b>actualizado</b> con éxito.");
				redirect(base_url()."EstadosSolicitud");
		}
		else{
				$this->session->set_flashdata("errorr","Error el estado de solicitud no se pudo <b>actualizar</b>.");
				redirect(base_url()."EstadosSolicitud");
		}

	}
	public function Eliminar(){
		$datos=$this->input->GET('id');
		$this->load->model('Estados_Model');
		$bool=$this->Estados_Model->OcultarEstado($datos);
		if($bool){
				$this->session->set_flashdata("informa","El estado de solicitud a sido <b>eliminado</b> con éxito.");
				redirect(base_url()."EstadosSolicitud");
		}
		else{
			    $this->session->set_flashdata("errorr","Error el estado de solicitud no pudo ser <b>eliminado</b>.");
			    redirect(base_url()."EstadosSolicitud");
		}

	}
}