<?php 

class Rol_Model extends CI_Model{

	public function obtenerMenu()
	{
		$menu= $this->db->get("tbl_menu");
		return $menu;
	}


	public function obtenerRol()
	{
		$this->db->where("tbl_accesos.estado", 1);
		$this->db->order_by("tbl_accesos.idAcceso", "DESC");
		$rol= $this->db->get("tbl_accesos");
		return $rol;
	}


	public function obtenerPermisos()
	{	
		$query = "SELECT p.idPermiso, p.permiso,a.descripcion, a.tipoAcceso, a.idAcceso, a.estado, m.idMenu, count(*) AS 'NumeroMenus' FROM tbl_permisos as p INNER JOIN tbl_accesos as a ON p.idAcceso = a.idAcceso INNER JOIN tbl_menu as m ON p.idMenu = m.idMenu GROUP BY a.idAcceso ORDER BY p.idPermiso DESC";
		$data =  $this->db->query($query);
		return $data;
	}

	public function validarPermiso($id)
	{	
		$query = "SELECT * from tbl_permisos where idAcceso = '$id'";
		$data =  $this->db->query($query);
		return $data;
	}
	public function DetallePermisos($id)
	{	
		$query = "SELECT permiso.*, rol.*, menu.* FROM tbl_permisos as permiso 
		INNER JOIN tbl_accesos as rol ON permiso.idAcceso = rol.idAcceso 
		INNER JOIN tbl_menu as menu ON permiso.idMenu = menu.idMenu 
		WHERE permiso.idAcceso = '$id'";
		$data =  $this->db->query($query);
		return $data;
	}

	public function InsertarPermisos($datos = null)
	{	
		$array = $datos["menu"];
		$idAcceso = $datos["idPermiso"];
		$cont = 0;
		for ($i=0; $i < sizeof($array); $i++) { 
			# code...
			$query = "INSERT INTO tbl_permisos(permiso, estado, idMenu, idAcceso) VALUES('1', '1', '$array[$i]', '$idAcceso')";
			$data =  $this->db->query($query);
			$cont = $cont + 1;
		}
		if($cont == sizeof($array))
		{
		 return true;
		}
		else
		{			
		 return false;		
		}
	}
	// public function InsertarUser($datos=null){
	// 	if($datos!=null){
	// 		$fecha = date("Y/m/d");
	// 		$data =array(
	// 			'user' => $datos['txtUsuario'],
	// 			'pass' => $datos['txtpass'],
	// 			'idEmpleado' => $datos['cbbEmpleados'],
	// 			'idAcceso' => $datos['cbbRol'],
	// 			'estado'=>1,
	// 			'fechaRegistro' => $fecha
	// 			);
	// 		if($this->db->insert('tbl_users', $data)){
	// 			return true;
	// 		}
	// 		else{
	// 			return false;
	// 			}

	// 		}
	// 		else{
	// 			return false;
	// 		}

	// }
	// public function EditarUser($datos=null)
	// {
	// 	if($datos!=null)
	// 	{
	// 		$id = $datos['txtIdUser'];
	// 		$user = $datos['txtuser'];
	// 		$pass = $datos['txtpassword'];
	// 		$idacceso = $datos['cbbRol1'];
	// 		$sql = "UPDATE tbl_users SET user = '$user', pass = '$pass', idAcceso = '$idacceso' WHERE idUser = $id";
	// 		if ($this->db->query($sql))
	// 		{
	// 			return true;
	// 		}
	// 		else
	// 		{
	// 			return false;
	// 		}

	// 	}
	// }
	public function EliminarRol($id){	
			$this->db->where('tbl_permisos.idAcceso', $id);
			if($this->db->delete('tbl_permisos'))
			{
				return true;
			}
			else{
				return false;
			}

		}
}
?>