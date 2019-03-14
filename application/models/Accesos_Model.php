<?php 

class Accesos_Model extends CI_Model{

	public function obtenerAccesos()
	{
		$this->db->order_by("idAcceso", "desc");
		// $this->db->where('estado',1);
		$departamentos = $this->db->get("tbl_accesos");
		return $departamentos;
	}

	public function InsertarAcceso($datos=null){
		if($datos!=null){
			$fecha = date("Y/m/d");
			$data =array(
				'tipoAcceso' => $datos['tipoAcceso'],
				'descripcion' => $datos['descripcion'],
				'estado'=>1,
				'fechaRegistro' => $fecha
				);
			if($this->db->insert('tbl_accesos', $data)){
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
	public function EditarAcceso($datos=null){
		if($datos!=null){
			//$fecha = date("Y/m/d");
			$id = $datos['idAcceso'];
			$this->db->where('idAcceso', $id);
			if($this->db->update('tbl_accesos', $datos)){
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
	public function ocultarAcceso($id){
	
			
			$datos = array('estado'=>0);
			$this->db->where('idAcceso', $id);
			if($this->db->update('tbl_accesos', $datos))
			{
				return true;
			}
			else{
				return false;
			}

		}

	public function HabilitarAcceso($idH){

	
	$data = array('estado'=>1);
	$this->db->where('idAcceso', $idH);
	if($this->db->update('tbl_accesos', $data))
	{
		return true;
	}
	else{
		return false;
	}

}
}
?>