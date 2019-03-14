<?php 

class User_Model extends CI_Model{

	public function obtenerEmpleados()
	{
		$this->db->where("tbl_empleados.estado", 1);
		$empleados= $this->db->get("tbl_empleados");
		return $empleados;
	}


	public function obtenerRol()
	{
		$this->db->where("tbl_accesos.estado", 1);
		$rol= $this->db->get("tbl_accesos");
		return $rol;
	}


	public function obtenerUser()
	{
		$this->db->select("
							tbl_users.*, 
							tbl_accesos.*,
							tbl_accesos.estado as estadoAcceso,
							tbl_empleados.*
						");
		$this->db->from("tbl_users");
		$this->db->join("tbl_accesos", "tbl_users.idAcceso = tbl_accesos.idAcceso");
		$this->db->join("tbl_empleados", "tbl_users.idEmpleado = tbl_empleados.idEmpleado");
		$this->db->where("tbl_users.estado", 1);
		$this->db->order_by("idUser", "desc");
		$user = $this->db->get();
		return $user;
	}

	public function InsertarUser($datos=null){
		if($datos!=null){
			$fecha = date("Y/m/d");
			$verificar = $datos['txtUsuario'];			
			$this->db->where("tbl_users.user", $verificar);
			$result = $this->db->get("tbl_users");
			if($result->num_rows() > 0)
			{				
				return false;
			}
			else
			{
				$data =array(
					'user' => $datos['txtUsuario'],
					'pass' => $datos['txtpass'],
					'idEmpleado' => $datos['cbbEmpleados'],
					'idAcceso' => $datos['cbbRol'],
					'estado'=>1,
					'fechaRegistro' => $fecha
					);
				if($this->db->insert('tbl_users', $data))
				{
					return true;
				}
				else
				{
					return false;
				}
			}

			}
			else{
				return false;
			}

	}
	public function EditarUser($datos=null)
	{
		if($datos!=null)
		{
			$id = $datos['txtIdUser'];
			$user = $datos['txtuser'];
			$pass = $datos['txtpassword'];
			$idacceso = $datos['cbbRol1'];
			$sql = "UPDATE tbl_users SET user = '$user', pass = '$pass', idAcceso = '$idacceso' WHERE idUser = $id";
			if ($this->db->query($sql))
			{
				return true;
			}
			else
			{
				return false;
			}

		}
	}
	public function OcultarUser($id){
	
			
			$datos = array('estado'=>0);
			$this->db->where('idUser', $id);
			if($this->db->update('tbl_users', $datos))
			{
				return true;
			}
			else{
				return false;
			}

		}
}
?>