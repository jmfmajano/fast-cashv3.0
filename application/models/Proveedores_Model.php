<?php 

class Proveedores_Model extends CI_Model
{

	public function ObtenerProveedores()
	{ 
		$this->db->order_by("idProveedor", "desc");
		$datos= $this->db->get("tbl_proveedores");
		return $datos;
	}

	public function GuardarProveedor($datos)
	{
		if ($datos != null)
		{
			$proveedor = $datos['nombre_proveedor'];
			$empresa = $datos['nombre_empresa'];
			$rubro = $datos['rubro_empresa'];
			$telefono = $datos['telefono_empresa'];
			$correo = $datos['correo_empresa'];
			$direccion = $datos['direccion_empresa'];
			$descripcion = $datos['descripcion_empresa'];
			$sql = "INSERT INTO tbl_proveedores(nombreCompleto, nombreEmpresa, rubro, telefono, email, direccionEmpresa, descripcion, estado) VALUES('$proveedor', '$empresa', '$rubro', '$telefono', '$correo',
				'$direccion', '$descripcion', '1')";
			
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

	public function ActualizarProveedor($datos)
	{
		if ($datos != null)
		{
			$id = $datos['id_proveedor'];
			$proveedor = $datos['nombre_proveedor'];
			$empresa = $datos['nombre_empresa'];
			$rubro = $datos['rubro_empresa'];
			$telefono = $datos['telefono_empresa'];
			$correo = $datos['correo_empresa'];
			$direccion = $datos['direccion_empresa'];
			$descripcion = $datos['descripcion_empresa'];
			$sql = "UPDATE tbl_proveedores SET nombreCompleto='$proveedor', nombreEmpresa='$empresa', rubro='$rubro', telefono='$telefono', email='$correo', direccionEmpresa='$direccion', descripcion='$descripcion' 
				WHERE idProveedor='$id'";
			
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

	public function EliminarProveedor($id)
	{
		$sql = "UPDATE tbl_proveedores SET estado='0' WHERE idProveedor='$id'";
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
?>