<?php 

class Estados_Model extends CI_Model{

public function GetEstados(){
		$this->db->order_by("id_estado", "desc");
		$this->db->where('estado', 1);
		$res=$this->db->GET('tbl_estados_solicitud');
		return $res;
	}
	public function InsertarEstado($datos=null){
		if($datos!=null){
			$fecha = date("Y/m/d");
			$data =array(
				'nombreEstado'=> $datos['nombreEstado'],
				//'fecha_registro' => $fecha,
				'estado'=>1
				);
			if($this->db->insert('tbl_estados_solicitud', $data)){
				return true;
			}
			else{
				return false;
			}

		}
		else{
			return false;
		}

	}
	public function EditarEstado($datos=null){
		if($datos!=null){
			//$fecha = date("Y/m/d");
			$id = $datos['id_estado'];
			$this->db->where('id_estado', $id);
			if($this->db->update('tbl_estados_solicitud', $datos)){
				return true;
			}
			else{
				return false;
			}

		}
		else{
			return false;
		}

	}
	public function ocultarEstado($id){
	
			$datos = array('estado'=>0);
			$this->db->where('id_estado', $id);
			if($this->db->update('tbl_estados_solicitud', $datos))
			{
				return true;
			}
			else{
				return false;
			}

		}


}


?>