<?php 
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("User_Model");
	}


	public function index()
	{
		$data = array('datosUser' => $this->User_Model->obtenerUser(), 'datosEmpleados' => $this->User_Model->obtenerEmpleados(), 'datosRol' => $this->User_Model->obtenerRol());
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('User/Gestionar_User', $data);
		$this->load->view('Base/footer');
	}
	public function Guardar(){
		$datos=$this->input->POST();
		$bool=$this->User_Model->InsertarUser($datos);
		if($bool){
		    $this->session->set_flashdata("guardar","El usuario a sido <b>guardado</b> con éxito.");
			redirect(base_url()."User");
		}
		else{
			$this->session->set_flashdata("errorr","Error el usuario no se pudo <b>guardar</b>.");
			redirect(base_url()."User");
		}

	}
	
	public function Editar(){
		$datos=$this->input->POST();
		$bool=$this->User_Model->EditarUser($datos);
		if($bool){
			$this->session->set_flashdata("actualizado","El usuario a sido <b>actualizado</b> con éxito.");
			redirect(base_url()."User");
		}
		else{
			$this->session->set_flashdata("errorr","Error el usuario no se pudo <b>actualizar</b>.");
			redirect(base_url()."User");
		}

	}
	
	public function Eliminar(){
		$datos=$this->input->GET('id');
		$bool=$this->User_Model->OcultarUser($datos);
		if($bool){
			$this->session->set_flashdata("informa","El usuario a sido <b>eliminado</b> con éxito.");
			redirect(base_url()."User");
		}
		else{
			$this->session->set_flashdata("errorr","Error el usuario no pudo ser <b>eliminado</b>.");
			redirect(base_url()."User");
		}

	}

}

?>