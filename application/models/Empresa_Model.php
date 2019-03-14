<?php 
class Empresa_Model extends CI_Model
{
	public function ObtenerEmpresa()
	{
		$datos= $this->db->get("tbl_empresa");
		return $datos;
	}

	public function GuardarEmpresa($datos)
	{
		if ($datos != null)
		{
			$empresa = $datos['nombre_empresa'];
			$giro = $datos['giro_empresa'];
			$email = $datos['correo_empresa'];
			$telefono = $datos['telefono_empresa'];
			$direccion = $datos['direccion_empresa'];
			$nrc = $datos['nrc_empresa'];
			$sql = "INSERT INTO tbl_empresa(nombreEmpresa, giro, email, telefono, direccion, nrc, estado)
				VALUES('$empresa', '$giro', '$email', '$telefono', '$direccion', '$nrc', '1')";
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

	public function ActualizarEmpresa($datos)
	{
		if ($datos != null)
		{
			$id = $datos['id_empresa'];
			$empresa = $datos['nombre_empresa'];
			$giro = $datos['giro_empresa'];
			$email = $datos['correo_empresa'];
			$telefono = $datos['telefono_empresa'];
			$direccion = $datos['direccion_empresa'];
			$nrc = $datos['nrc_empresa'];
			$sql = "UPDATE tbl_empresa SET nombreEmpresa='$empresa', giro='$giro', email='$email', telefono='$telefono', direccion='$direccion', nrc='$nrc' WHERE idEmpresa='$id'";
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

	public function EliminarEmpresa($id)
	{
		$sql = "UPDATE tbl_empresa SET estado='0' WHERE idEmpresa='$id'";
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