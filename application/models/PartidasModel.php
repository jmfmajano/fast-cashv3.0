<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PartidasModel extends CI_Model
{		
	public function obtenerCuentas()
	{   
		$sql = "SELECT * FROM tbl_cuenta";
		$datos =  $this->db->query($sql);
		return $datos;	
	}

	public function GuardarPartida($datos=null, $id)
	{
		if ($datos != null)
		{
			$fecha = $datos['fechaPartida'];
			$cuenta = $datos['cuenta'];	// Estos son arreglos
			$debe = $datos['debe'];	// Estos son arreglos
			$haber = $datos['haber'];	// Estos son arreglos
			$totalDebe = $datos['totalDebe'];
			$totalHaber = $datos['totalHaber'];
			$detalle = $datos['detalle_proceso'];

			$sql = "INSERT INTO tbl_partida VALUES('', '$id', '$totalDebe', '$totalHaber', '$detalle', '$fecha')";
			if ($this->db->query($sql))
			{
				//Buscando el ultimo Id
				$sql2 = "SELECT MAX(idPartida) as idPartida FROM tbl_partida LIMIT 1";
				$resultado = $this->db->query($sql2);
				foreach ($resultado->result() as $filaResultado)
				{
					$idParti = $filaResultado->idPartida; //Dato de la partida
				}

				$contador = 0;
				for ($i=0; $i < sizeof($cuenta) ; $i++)
				{
					if ($debe[$i] == 0)
					{
						$sql3 = "INSERT INTO tbl_partida_cuentas VALUES('', '$cuenta[$i]', '$idParti', '0', '$haber[$i]', '$fecha')";
						if ($this->db->query($sql3))
						{
							$contador++;
						}
					}
					else
					{
						$sql3 = "INSERT INTO tbl_partida_cuentas VALUES('', '$cuenta[$i]', '$idParti', '$debe[$i]', '0', '$fecha')";
						if ($this->db->query($sql3))
						{
							$contador++;
						}	
					}
				}
				return true;
			}
			else
			{
				return false;
			}
		}

	}

	public function LibroDiario($i, $f)
	{
		$sql = "SELECT * FROM tbl_partida WHERE DATE(fecha) BETWEEN '$i' AND '$f'";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function LibroDiarioExtra($id)
	{
		$sql = "SELECT c.idCuenta, c.NombreCuenta, c.codigoCuenta, pc.debe, pc.haber, c.idSubcategoria, p.idPartida FROM tbl_partida_cuentas as pc INNER JOIN tbl_cuenta as c ON(pc.idCuenta=c.idCuenta) INNER JOIN tbl_partida as p ON(pc.idPartida = p.idPartida) WHERE pc.idPartida='$id'";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function LibroMayor($i, $f)
	{
		// $sql = "SELECT c.idCuenta, c.NombreCuenta, c.codigoCuenta, pc.debe, pc.haber, c.idSubcategoria, p.idPartida FROM tbl_partida_cuentas as pc INNER JOIN tbl_cuenta as c ON(pc.idCuenta=c.idCuenta) INNER JOIN tbl_partida as p ON(pc.idPartida = p.idPartida) WHERE pc.idPartida='$id'";
		$sql ="SELECT DISTINCT(pc.idCuenta), pc.idPartida, c.NombreCuenta FROM tbl_partida_cuentas as pc INNER JOIN tbl_cuenta as c ON(pc.idCuenta = c.idCuenta) WHERE DATE(pc.fecha) BETWEEN '$i' AND '$f' GROUP BY pc.idCuenta";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function LibroMayorExtra($id, $i, $f)
	{
		// $sql = "SELECT pc.idCuenta, c.NombreCuenta, pc.idPartida, pc.debe, pc.haber, pc.fecha FROM tbl_partida_cuentas as pc INNER JOIN tbl_cuenta as c ON(pc.idCuenta = c.idCuenta) WHERE pc.idPartida= '$id'";
		$sql ="SELECT * FROM tbl_partida_cuentas WHERE idCuenta='$id' AND DATE(fecha) BETWEEN '$i' AND '$f'";
		$datos = $this->db->query($sql);
		return $datos;
	}

	
	
}
?>