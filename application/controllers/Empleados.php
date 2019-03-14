<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empleados extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Empleados_Model");
	}

	public function Index()
	{
		$registros=$this->Empleados_Model->ListaEmpleados();
		$datos = array('registros'=>$registros);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view("Empleados/Index", $datos);
		$this->load->view('Base/footer');
	}

	public function ViewInsertarEmpleados()
	{		
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Empleados/ViewInsertarEmpleados');
		$this->load->view('Base/footer');
	}

	public function InsertarEmpleados()
	{
		$datos = $this->input->POST();
		$bool = $this->Empleados_Model->InsertarEmleados($datos);
		if($bool)
		{
		    $this->session->set_flashdata("guardar","El empleado a sido <b>guardado</b> con éxito.");
			redirect(base_url()."Empleados/Index");
		}
		else
		{
			$this->session->set_flashdata("errorr","Error el empleado no se pudo <b>guardar</b>.");
			redirect(base_url()."Empleados/Index");
		}
	}

	public function ViewActualizarEmpleado()
	{
		$id = $this->input->GET('id');
		$query = $this->Empleados_Model->ObtenerEmpleadoID($id);
		$data = array("data" => $query);

		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Empleados/ViewActualizarEmpleados', $data);
		$this->load->view('Base/footer');
	}

	public function ActualizarEmpleados()
	{
		$data=$this->input->POST();
		$bool=$this->Empleados_Model->ActualizarEmleados($data);
		if($bool){
				$this->session->set_flashdata("actualizado","El empleado a sido <b>actualizado</b> con éxito.");
				redirect(base_url()."Empleados/Index");
		}
		else
		{
				$this->session->set_flashdata("errorr","Error el empleado no se pudo <b>actualizar</b>.");
				redirect(base_url()."Empleados/Index");
		}
	}

	public function EliminarEmpleados()
	{
		$id=$this->input->GET('id');
		$bool=$this->Empleados_Model->EliminarEmpleados($id);
		if($bool){
				$this->session->set_flashdata("informa","El empleado a sido <b>eliminado</b> con éxito.");
				redirect(base_url()."Empleados/Index");
		}
		else
		{
				$this->session->set_flashdata("errorr","Error el empleado no pudo ser <b>eliminado</b>.");
			    redirect(base_url()."Empleados/Index");
		}
	}

	public function DetalleEmpleado()
	{
		if($this->input->is_ajax_request())
		{
			$id = $this->input->POST("id");
			$datos = $this->Empleados_Model->DetalleEmpleado($id);
			echo json_encode($datos);
		}
		else
		{
			echo "error";
		}
	}
}
?>
