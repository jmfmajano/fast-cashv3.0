<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Empresa_Model");
	}
	public function index()
	{
		$datos = $this->Empresa_Model-> ObtenerEmpresa();
		$data = array('datos' => $datos );
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("Empresa/index", $data);
		$this->load->view('Base/footer');
	}

	public function GuardarEmpresa()
	{
		$datos = $this->input->post();
		$bool = $this->Empresa_Model->GuardarEmpresa($datos);
		if($bool){
				$this->session->set_flashdata("guardar","Los datos de la empresa se <b>guardaron</b> con éxito.");
				redirect(base_url()."Empresa/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error los datos de la empresa no se pudieron <b>guardar</b>.");
			redirect(base_url()."Empresa/");

		}
	}

	public function ActualizarEmpresa()
	{
		$datos = $this->input->post();
		$bool = $this->Empresa_Model->ActualizarEmpresa($datos);
		if($bool){
				$this->session->set_flashdata("actualizado","Los datos de la empresa se <b>actualizaron</b> con éxito.");
				redirect(base_url()."Empresa/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error los datos de la empresa no se pudieron <b>actualizar</b>.");
			redirect(base_url()."Empresa/");

		}
	}

	public function EliminarEmpresa()
	{
		$id = $_GET['idEmpresa'];
		$bool = $this->Empresa_Model->EliminarEmpresa($id);
		if($bool){
				$this->session->set_flashdata("informa","Los datos de la empresa se <b>eliminaron</b> con éxito.");
				redirect(base_url()."Empresa/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error los datos de la empresa no se pudieron <b>eliminar</b>.");
			redirect(base_url()."Empresa/");

		}
	}

}
?>