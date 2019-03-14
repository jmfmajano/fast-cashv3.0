<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	    if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Proveedores_Model");
	}
	public function index()
	{
		$datos = $this->Proveedores_Model->ObtenerProveedores();
		$data = array('datos' => $datos );
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("Proveedores/index", $data);
		$this->load->view('Base/footer');
	}

	public function GuardarProveedor()
	{
		$datos = $this->input->post();
		$bool = $this->Proveedores_Model->GuardarProveedor($datos);
		if($bool){
				$this->session->set_flashdata("guardar","El proveedor a sido <b>guardado</b> con éxito.");
				redirect(base_url()."Proveedores/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error el proveedor no se pudo <b>guardar</b>.");
			redirect(base_url()."Proveedores/");

		}
	}

	public function ActualizarProveedor()
	{
		$datos = $this->input->post();
		$bool = $this->Proveedores_Model->ActualizarProveedor($datos);
		if($bool){
				$this->session->set_flashdata("actualizado","El proveedor a sido <b>actualizado</b> con éxito.");
				redirect(base_url()."Proveedores/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error el proveedor no se pudo <b>actualizar</b>.");
			redirect(base_url()."Proveedores/");

		}
	}

	public function EliminarProveedor()
	{
		$id = $_GET['id'];
		$bool = $this->Proveedores_Model->EliminarProveedor($id);
		if($bool){
				$this->session->set_flashdata("informa","El proveedor a sido <b>eliminado</b> con éxito.");
				redirect(base_url()."Proveedores/"); 
		}
		else{
			$this->session->set_flashdata("errorr","Error el proveedor no pudo ser <b>eliminado</b>.");
			redirect(base_url()."Proveedores/");

		}
	}

}
?>