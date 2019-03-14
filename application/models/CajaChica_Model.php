<?php 

class CajaChica_Model extends CI_Model{

	public function ObtenerCajaActiva()
	{
		$sql = "SELECT cc.idCajaChica, cc.estadoCajaChica, cc.fechaCajaChica, cc.cantidadApertura, ccp.saldo, ccp.idProceso FROM tbl_caja_general AS cc INNER JOIN tbl_cajageneral_procesos AS ccp ON(cc.idCajaChica=ccp.idCajaChica) WHERE estadoCajaChica='1' ORDER BY ccp.idProceso DESC LIMIT 1";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function ObtenerTiposDePago()
	{
		$sql = "SELECT * FROM tbl_tipo_pago";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function AperturarCaja($datos)
	{
		if ($datos != null)
		{
			$fecha = $datos['fecha_apertura'];
			$cantidad = $datos['cantidad_apertura'];
			$sql = "INSERT INTO tbl_caja_general VALUES('', '1', '$fecha', '$cantidad')";
			if ($this->db->query($sql))
			{
				$sql2 = "SELECT MAX(idCajaChica) as idC FROM tbl_caja_general WHERE fechaCajaChica = '".$fecha."' LIMIT 1";
					$resultado = $this->db->query($sql2);
					foreach ($resultado->result() as $filaResultado)
					{
						$idCaja = $filaResultado->idC; //Dato para la amortizacion
					}

				$sql3 = "INSERT INTO tbl_cajageneral_procesos VALUES('', 'Apertura de caja general', '$fecha', '$cantidad', '', 
					'$cantidad', '$idCaja', '1')";
					if ($this->db->query($sql3))
					{
						return true;
					}
					else
					{
						return false;
					}
			}
			else
			{
				return false;
			}
			
		}
	}

	public function GuardarProcesoCG($datos)
	{
		if ($datos != null)
		{
			$detalle = $datos['detalle_proceso'];
			$fecha = $datos['fecha_proceso'];
			$tipoProceso = $datos['tipo_proceso'];
			$cantidadDinero	 = $datos['cantidad_dinero'];
			$saldo = $datos['saldo_cc'];
			$idCC	 = $datos['id_cc'];
			$idTP	 = $datos['forma_pago'];
			if ($tipoProceso == "Entrada")
			{
				$saldoTotal = $saldo + $cantidadDinero;
				$sql = "INSERT INTO tbl_cajageneral_procesos VALUES('', '$detalle', '$fecha', '$cantidadDinero', '', '$saldoTotal', '$idCC', '$idTP')";
			}
			else
			{
				if ($tipoProceso == "Salida")
				{
					$saldoTotal = $saldo - $cantidadDinero;
					$sql = "INSERT INTO tbl_cajageneral_procesos VALUES('', '$detalle', '$fecha', '', '$cantidadDinero', '$saldoTotal', '$idCC', '$idTP')";
				}
			}
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

	public function CerrarCajaGeneral($datos)
	{
	   if ($datos != null)
	   {
	   		$idCC = $datos['id_cc'];
	   		$detalle ="Cierre de caja chica";
	   		$saldo = $datos['saldo_cc'];
	   		$fecha = $datos['fecha_cc'];
	   		$sql = "UPDATE tbl_caja_general SET estadoCajaChica='0' WHERE idCajaChica = '$idCC'";
			if ($this->db->query($sql))
			{
				$sql2 = "INSERT INTO tbl_cajageneral_procesos VALUES('','$detalle','$fecha','','','$saldo','$idCC','3')";
				if ($this->db->query($sql2))
				{
					return true;
				}
			}
			else
			{
				return false;
			}
	   }
	}

	public function DetalleCajaGeneral($id)
	{
		$sql = "SELECT cc.idCajaChica, cc.estadoCajaChica, cc.fechaCajaChica, cc.cantidadApertura, ccp.idProceso ,ccp.detalleProceso,
ccp.entrada, ccp.salida, ccp.saldo, ccp.idProceso, ccp.idTipoPago, tp.detalle FROM tbl_caja_general AS 
cc INNER JOIN tbl_cajageneral_procesos AS ccp ON(cc.idCajaChica=ccp.idCajaChica) INNER JOIN tbl_tipo_pago as tp ON(ccp.idTipoPago = tp.idTipo) WHERE cc.idCajaChica = '$id' ORDER BY ccp.idProceso ASC";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function HistorialCajaGeneral()
	{
		$sql = "SELECT * FROM tbl_caja_general ORDER BY idCajaChica DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}


	// Metodo para obtener caja chica activa
	public function ObtenerCajaCActiva()
	{
		$sql = "SELECT cc.idCajaC, cc.estadoCajaC, cc.fechaCajaC, cc.cantidadAperturaCC, ccp.saldo, ccp.idProceso FROM tbl_caja_chica AS cc INNER JOIN tbl_cajachica_procesos AS ccp ON(cc.idCajaC=ccp.idCajaChica) WHERE estadoCajaC='1' ORDER BY ccp.idProceso DESC LIMIT 1";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function AperturarCajaChica($datos)
	{
		if ($datos != null)
		{
			$fecha = $datos['fecha_apertura'];
			$cantidad = $datos['cantidad_apertura'];
			$sql = "INSERT INTO tbl_caja_chica VALUES('', '1', '$fecha', '$cantidad')";
			if ($this->db->query($sql))
			{
				$sql2 = "SELECT MAX(idCajaC) as idC FROM tbl_caja_chica WHERE fechaCajaC = '".$fecha."' LIMIT 1";
					$resultado = $this->db->query($sql2);
					foreach ($resultado->result() as $filaResultado)
					{
						$idCaja = $filaResultado->idC; //Dato para la amortizacion
					}

				$sql3 = "INSERT INTO tbl_cajachica_procesos VALUES('', 'Apertura de caja chica', '$fecha', '$cantidad', '', 
					'$cantidad', '$idCaja', '1')";
					if ($this->db->query($sql3))
					{
						return true;
					}
					else
					{
						return false;
					}
			}
			else
			{
				return false;
			}
			
		}
	}

	public function GuardarProcesoCC($datos)
	{
		if ($datos != null)
		{
			$detalle = $datos['detalle_proceso'];
			$fecha = $datos['fecha_proceso'];
			$tipoProceso = $datos['tipo_proceso'];
			$cantidadDinero	 = $datos['cantidad_dinero'];
			$saldo = $datos['saldo_cc'];
			$idCC	 = $datos['id_cc'];
			$idTP	 = $datos['forma_pago'];
			if ($tipoProceso == "Entrada")
			{
				$saldoTotal = $saldo + $cantidadDinero;
				$sql = "INSERT INTO tbl_cajachica_procesos VALUES('', '$detalle', '$fecha', '$cantidadDinero', '', '$saldoTotal', '$idCC', '$idTP')";
			}
			else
			{
				if ($tipoProceso == "Salida")
				{
					$saldoTotal = $saldo - $cantidadDinero;
					$sql = "INSERT INTO tbl_cajachica_procesos VALUES('', '$detalle', '$fecha', '', '$cantidadDinero', '$saldoTotal', '$idCC', '$idTP')";
				}
			}
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


	public function CerrarCajaChica($datos)
	{
	   if ($datos != null)
	   {
	   		$idCC = $datos['id_cc'];
	   		$detalle ="Cierre de caja chica";
	   		$saldo = $datos['saldo_cc'];
	   		$fecha = $datos['fecha_cc'];
	   		$sql = "UPDATE tbl_caja_chica SET estadoCajaC='0' WHERE idCajaC = '$idCC'";
			if ($this->db->query($sql))
			{
				$sql2 = "INSERT INTO tbl_cajachica_procesos VALUES('','$detalle','$fecha','','','$saldo','$idCC','3')";
				if ($this->db->query($sql2))
				{
					return true;
				}
			}
			else
			{
				return false;
			}
	   }
	}

	public function DetalleCajaChica($id)
	{
		$sql = "SELECT cc.idCajaC, cc.estadoCajaC, cc.fechaCajaC, cc.cantidadAperturaCC, ccp.idProceso ,ccp.detalleProceso,
				ccp.entrada, ccp.salida, ccp.saldo, ccp.idProceso, ccp.idTipoPago, tp.detalle FROM tbl_caja_chica AS 
				cc INNER JOIN tbl_cajachica_procesos AS ccp ON(cc.idCajaC=ccp.idCajaChica) INNER JOIN tbl_tipo_pago as tp ON(ccp.idTipoPago = tp.idTipo) WHERE cc.idCajaC = '$id' ORDER BY ccp.idProceso ASC";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function HistorialCajaChica()
	{
		$sql = "SELECT * FROM tbl_caja_chica ORDER BY idCajaC DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}


}
?>