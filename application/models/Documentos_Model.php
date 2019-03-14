<?php
class Documentos_Model extends CI_Model{

	public function InsertarDocumento($datos=null){
		if($datos!=null){
			if($this->db->Insert("tbl_documentos", $datos)){
				return true;
			}
			else{
				return false;
			}

		}
	}
	public function ObtenerDocumentos($c){
		$sql= "SELECT * FROM tbl_documentos WHERE codigo='$c' AND estado =1";
		$datos= $this->db->query($sql);
		return $datos;
	}
}


?>