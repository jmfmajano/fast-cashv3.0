<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{		
	public function obtenerPermisos()
	{   
	$idAcceso = $this->session->userdata("idAcceso");
	$query = "SELECT m.*, p.*, a.* FROM tbl_permisos as p INNER JOIN tbl_accesos as a ON p.idAcceso = a.idAcceso INNER JOIN tbl_menu as m ON p.idMenu = m.idMenu WHERE p.idAcceso = '$idAcceso' AND p.permiso = '1'";
		$data =  $this->db->query($query);
		return $data;	
	}
	public function Login($user, $pass)
	{
		$this->db->where("user", $user);
		$this->db->where("pass", $pass);
		$this->db->where("estado", 1);
		$resultado = $this->db->get("tbl_users");
		if($resultado->num_rows() > 0)
		{
			$this->db->select("tbl_accesos.idAcceso,
							   tbl_empleados.idEmpleado, 
							   tbl_empleados.nombreEmpleado, 
							   tbl_empleados.apellidoEmpleado,
							   tbl_accesos.tipoAcceso
							   ");
			$this->db->from("tbl_users");
			$this->db->join("tbl_empleados", "tbl_users.idEmpleado = tbl_empleados.idEmpleado");
			$this->db->join("tbl_accesos", "tbl_users.idAcceso = tbl_accesos.idAcceso");
			$this->db->where("tbl_users.idEmpleado", $resultado->row()->idEmpleado);
			$this->db->where("tbl_users.idAcceso", $resultado->row()->idAcceso);
			$this->db->where("tbl_accesos.estado", 1);
			$result = $this->db->get();
			return $result->row();
		}
		else
		{
		 	return false;
		}		
	}	
}
?>