<?php 
class Pagos_Model extends CI_Model{
	public function ObtenerUltimoPago($id){
		$sql="SELECT  c.Nombre_Cliente, c.Apellido_Cliente, a.capital, a.tasaInteres,a.plazoMeses,a.pagoCuota, cr.fechaApertura, cr.fechaVencimiento,cr.totalAbonado, cr.estadoCredito,cr.interesPendiente as i, p.* FROM tbl_detallepagos AS p INNER JOIN tbl_creditos as cr on p.idCredito= cr.idCredito INNER JOIN tbl_amortizaciones AS a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes AS s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE p.idCredito = $id ORDER BY p.idDetallePago DESC LIMIT 1 ";
		$data = $this->db->query($sql);
		return $data;
	}
	public function InsertarPago($datos=null){
		if($datos!=null){
			$data  = array(
				'totalPago' => $datos['pagoReal2'],
				'iva'=>$datos['iva'],
				'interes'=>$datos['interes'],
				'abonoCapital'=>$datos['abonoCapital'],
				'capitalPendiente'=>$datos['capitalPendiente'],
				'diasPagados'=>$datos['diasPagados'],
				'mora'=>$datos['cobroMora'],
				'fechaPago'=>$datos['fechaPago'],
				'fechaProximoPago'=>$datos['fechaProximoPago'],
				'estadoFacturacion'=>$datos['estadoFacturacion'],
				'estado'=>1,
				'idCredito'=>$datos['idCredito']
			 );
			if($this->db->insert('tbl_detallepagos', $data)){
				//return true;
				$idCredito = $datos['idCredito'];
				$interesPendiente = $datos['interesPendiente'];
				$sql3="UPDATE tbl_creditos SET interesPendiente = '$interesPendiente' WHERE idCredito=$idCredito";
				$this->db->query($sql3);
				$totalAbonado = $datos['totalAbonado'];
				$id=$datos['idCredito'];
				$capitalPendiente = $datos['capitalPendiente'];
				if($capitalPendiente==0){
					$sql = "UPDATE tbl_creditos SET totalAbonado = '$totalAbonado', estadoCredito='Finalizado' WHERE idCredito=$id";
				}
				else{
					$sql = "UPDATE tbl_creditos SET totalAbonado = '$totalAbonado' WHERE idCredito=$id";

				}
				$id = $datos['idCredito'];
				if($this->db->query($sql)){
					//return true;
					$saldo = $datos['saldo']+$datos['pagoReal2'];
						$caja  = array(
							'detalleProceso' =>'Pago de credito del cliente '.$datos['Cliente'],
							'fechaProceso'=>$datos['fechaCajaChica'],
							'entrada'=>$datos['pagoReal2'],
							'saldo'=>$saldo,
							'idCajaChica'=>$datos['idCajaChica'],
							'idTIpoPago'=>1
							 );
						if($this->db->insert('tbl_cajageneral_procesos', $caja)){

							if($datos['identificador']==2){
								$pago = $datos['abonoCapital']+$datos['interes']+$datos['cobroMora'];
							$factura = array(
								'noAfecta'=>$datos['abonoCapital'],
								'ventasGravadas'=>$datos['interes'],
								'saldoAnterior'=>$datos['capitalPendiente1'],
								'saldoActual'=>$datos['capitalPendiente'],
								'iva'=>0,
								'pago'=>$pago,
								'fechaAplicacion'=>$datos['fechaPago'],
								'intMora'=>$datos['cobroMora'],
								'estadoFactura'=>1,
								'id_Credito'=>$datos['idCredito']
								);
							if($this->db->insert('tbl_factura', $factura)){
								return true;
								//echo "INserto";
							}
							else{
								return false;
							}

							}
							else{
								return true;
							}
						}
						else{
							return false;
						}
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
	}
	public function ObtenerPagosCredito($id){
		$sql="SELECT * FROM tbl_detallepagos WHERE idCredito=$id ORDER BY idDetallePago ASC";
		$data = $this->db->query($sql);
		return $data;
	}
	public function obtenerNumPago($id){
		$sql = "SELECT count(*) AS nPagos FROM tbl_detallepagos AS p INNER JOIN tbl_creditos as cr on p.idCredito= cr.idCredito INNER JOIN tbl_amortizaciones AS a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes AS s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE p.idCredito = $id ORDER BY p.idDetallePago";
		$result= $this->db->query($sql);
		return $result;
	}
}
?>