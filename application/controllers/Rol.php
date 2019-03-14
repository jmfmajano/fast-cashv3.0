<?php 
class Rol extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Rol_Model");
	}


	public function index()
	{
		$data = array('datosPermisos' => $this->Rol_Model->obtenerPermisos(), 'datosMenu' => $this->Rol_Model->obtenerMenu(), 'datosRol' => $this->Rol_Model->obtenerRol());
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Rol/Gestionar_Rol', $data);
		$this->load->view('Base/footer');
	}

	public function Crear()
	{
		$data = array('datosRol' => $this->Rol_Model->obtenerRol(), 'datosMenu' => $this->Rol_Model->obtenerMenu());
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Rol/insertarPermiso', $data);
		$this->load->view('Base/footer');
	}

	public function Guardar(){
		$datos=$this->input->POST();
		$bool=$this->Rol_Model->InsertarPermisos($datos);
		if($bool){
		    $this->session->set_flashdata("guardar","Los permisos seleccionados se <b>guardaron</b> con éxito.");
			redirect(base_url()."Rol");
		}
		else{
			$this->session->set_flashdata("errorr","Error los permisos seleccionados no se pudieron <b>guardar</b>.");
			redirect(base_url()."Rol");
		}

	}
	public function validarPermisos(){
		$id=$this->input->GET("Id");
		$bool=$this->Rol_Model->validarPermiso($id);
		echo json_encode($bool->result());
	}

	public function Detalle(){
		$id=$this->input->GET("Id");
		$bool=$this->Rol_Model->DetallePermisos($id);
		echo json_encode($bool->result());
	}
	
	// public function Editar(){
	// 	$datos=$this->input->POST();
	// 	$bool=$this->User_Model->EditarUser($datos);
	// 	if($bool){
	// 		$this->session->set_flashdata("actualizado","Registro a sido actualizado con exito.");
	// 		redirect(base_url()."User");
	// 	}
	// 	else{
	// 		$this->session->set_flashdata("errorr","Error el registro no pudo ser actualizado.");
	// 		redirect(base_url()."User");
	// 	}

	// }
	
	public function Eliminar(){
		$datos=$this->input->GET('id');
		$bool=$this->Rol_Model->EliminarRol($datos);
		if($bool){
			$this->session->set_flashdata("informa","El permiso se <b>elimino</b> con éxito.");
			redirect(base_url()."Rol");
		}
		else{
			$this->session->set_flashdata("errorr","Error el permiso no se pudo <b>eliminar</b>.");
			redirect(base_url()."Rol");
		}

	}

}

?>