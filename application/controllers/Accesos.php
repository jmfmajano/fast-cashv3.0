<?php 
class Accesos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->model("Accesos_Model");
		$datos = $this->Accesos_Model->obtenerAccesos();
		$data = array('datos' => $datos);
		$this->load->view('Base/header');
		$this->load->view('Base/nav');
		$this->load->view('Accesos/Gestionar_Accesos', $data);
		$this->load->view('Base/footer');
	}
	public function Guardar(){
		$datos=$this->input->POST();
		$this->load->model('Accesos_Model');
		$bool=$this->Accesos_Model->InsertarAcceso($datos);
		if($bool){
		    $this->session->set_flashdata("guardar","El acceso a sido <b>guardado</b> con éxito.");
			redirect(base_url()."Accesos");
		}
		else{
			$this->session->set_flashdata("errorr","Error el acceso no se pudo <b>guardar</b>.");
			redirect(base_url()."Accesos");
		}

	}
	public function Editar(){
		$datos=$this->input->POST();
		$this->load->model('Accesos_Model');
		$bool=$this->Accesos_Model->EditarAcceso($datos);
		if($bool){
			$this->session->set_flashdata("actualizado","El acceso a sido <b>actualizado</b> con éxito.");
			redirect(base_url()."Accesos");
		}
		else{
			$this->session->set_flashdata("errorr","Error el acceso no se pudo <b>actualizar</b>.");
			redirect(base_url()."Accesos");
		}

	}
	public function Eliminar(){
		$datos=$this->input->GET('id');
		$this->load->model('Accesos_Model');
		$bool=$this->Accesos_Model->OcultarAcceso($datos);
		if($bool){
			$this->session->set_flashdata("informa","El acceso a sido <b>eliminado</b> con éxito.");
			redirect(base_url()."Accesos");
		}
		else{
			$this->session->set_flashdata("errorr","Error el acceso no pudo ser <b>eliminado</b>.");
			redirect(base_url()."Accesos");
		}

	}

	public function Habilitar(){
		$habilitar=$this->input->GET('idH');
		$this->load->model('Accesos_Model');
		$bool=$this->Accesos_Model->HabilitarAcceso($habilitar);
		if($bool){
			$this->session->set_flashdata("guardar","El acceso a sido <b>habilitado</b> con éxito.");
			redirect(base_url()."Accesos");
		}
		else{
			$this->session->set_flashdata("errorr","Error el acceso no pudo ser <b>habilitado</b>.");
			redirect(base_url()."Accesos");
		}

	}

}

?>