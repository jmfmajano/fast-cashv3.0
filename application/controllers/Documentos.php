<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Documentos_Model");
	}
	public function SubirDocumentos(){
		$data = $this->input->POST();
		$c =$data["codigo"];
		$file = $_FILES["file"]["name"];
		$filetype = $_FILES["file"]["type"];
		$filesize = $_FILES["file"]["size"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "plantilla/Docs/".$c.$file);
		$datos=array("nombre"=>$file,
			"url"=>"plantilla/Docs/".$c.$file,
			"tipoDocumento"=>"1",
			"codigo"=>$c,
			"estado"=>1);
		$bool=$this->Documentos_Model->InsertarDocumento($datos);
		if($bool){
			return true;

		}
		else{
			return false;

		}
	}

}
?>