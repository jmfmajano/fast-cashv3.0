<?php 

class Factura_Model extends CI_Model{

	public function cargarFacturas(){
		$sql = "SELECT f.*,c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, a.capital, a.totalInteres, a.pagoCuota, a.cantidadCuota, cr.* FROM tbl_factura AS f INNER JOIN tbl_creditos as cr ON f.id_Credito = cr.idCredito INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente";
		$result = $this->db->query($sql);
		return $result;
	}
	public function cargarFacturasById($id){
		$sql = "SELECT f.*,c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, a.capital, a.totalInteres, a.pagoCuota, a.cantidadCuota, cr.* FROM tbl_factura AS f INNER JOIN tbl_creditos as cr ON f.id_Credito = cr.idCredito INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE id_factura = $id";
		$result = $this->db->query($sql);
		return $result;
	}
	public function ObtenerCreditoId($codigo){
		$sql="SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.tipoCredito LIKE 'Crédito popular%' AND cr.codigoCredito='$codigo' ORDER BY cr.idCredito DESC";
		$resul =$this->db->query($sql);
		return $resul->result();
	}
	
	public function CalcularFactura($id, $fechaInicio, $fechaFin){
		$sql ="SELECT sum(p.abonoCapital) as noAfectas, sum(p.interes) as ventasGravadas, sum(p.mora) AS rMora, p.fechaPago, c.Nombre_Cliente, c.Apellido_Cliente, a.capital,a.pagoCuota, cr.codigoCredito, cr.fechaApertura, cr.fechaVencimiento,cr.totalAbonado FROM tbl_detallepagos AS p INNER JOIN tbl_creditos as cr on p.idCredito= cr.idCredito INNER JOIN tbl_amortizaciones AS a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes AS s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.idCredito=$id AND p.estadoFacturacion = 1 AND p.fechaPago BETWEEN '$fechaInicio' AND '$fechaFin' group by cr.idCredito";
		$resul = $this->db->query($sql);
		return $resul->result();
	}
	public function InsertarFactura($datos=null){

		$pago = $datos['noAfectas']+$datos['ventasGravadas']+$datos['intMora'];

		$insert = array(
			'noAfecta'=>$datos['noAfectas'],
			'ventasGravadas'=>$datos['ventasGravadas'],
			'saldoAnterior'=>0,
			'saldoActual'=>0,
			'iva'=>0,
			'pago'=>$pago,
			'fechaAplicacion'=>$datos['fechaAplicacion'],
			'intMora'=>$datos['intMora'],
			'estadoFactura'=>1,
			'id_Credito'=>$datos['idCredito']);
		if($this->db->insert('tbl_factura', $insert)){

			$idC = $datos['idCredito'];
			$fechaI=$datos['fechaI'];
			$fechaF = $datos['fechaF'];
			$sql = "UPDATE tbl_detallepagos SET estadoFacturacion = 2 WHERE idCredito = $idC AND fechaPago BETWEEN '$fechaI' AND '$fechaF'";
			$bool=$this->db->query($sql);
			if($bool){
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
	public function filtrosNombre($Nombre){
		$sql = "SELECT f.*,c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, a.capital, a.totalInteres, a.pagoCuota, a.cantidadCuota, cr.* FROM tbl_factura AS f INNER JOIN tbl_creditos as cr ON f.id_Credito = cr.idCredito INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE c.Nombre_Cliente = '$Nombre'";
		$resul = $this->db->query($sql);
		return $resul->result();
	}
	public function filtrosFecha($fechaInicio, $fechaFin){
		$sql = "SELECT f.*,c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, a.capital, a.totalInteres, a.pagoCuota, a.cantidadCuota, cr.* FROM tbl_factura AS f INNER JOIN tbl_creditos as cr ON f.id_Credito = cr.idCredito INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE f.fechaAplicacion BETWEEN '$fechaInicio' AND '$fechaFin'";
		$resul = $this->db->query($sql);
		return $resul->result();
	}
	public function filtrosCodigoFactura($idFactura){
		$sql = "SELECT f.*,c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, a.capital, a.totalInteres, a.pagoCuota, a.cantidadCuota, cr.* FROM tbl_factura AS f INNER JOIN tbl_creditos as cr ON f.id_Credito = cr.idCredito INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE id_factura = '$idFactura'";
		$resul = $this->db->query($sql);
		return $resul->result();
	}

	public function generarFacturasMes($fechaInicio, $fechaFin){

		$sql ="SELECT sum(p.abonoCapital) as noAfectas, sum(p.interes) as ventasGravadas, sum(p.mora) AS rMora, p.fechaPago, c.Nombre_Cliente, c.Apellido_Cliente, a.capital,a.pagoCuota,cr.idCredito, cr.codigoCredito, cr.fechaApertura, cr.fechaVencimiento,cr.totalAbonado FROM tbl_detallepagos AS p INNER JOIN tbl_creditos as cr on p.idCredito= cr.idCredito INNER JOIN tbl_amortizaciones AS a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes AS s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE p.estadoFacturacion = 1 AND p.fechaPago BETWEEN '$fechaInicio' AND '$fechaFin' group by cr.idCredito";
		//echo $sql;
		$resul = $this->db->query($sql);
		//echo json_encode($resul->result());
		//$miArreglo=array($resul->result());
		//var_dump($miArreglo);
		foreach ($resul->result() as $insertar) {
			//echo "dentro del for";
			$pago = $insertar->noAfectas+$insertar->ventasGravadas+$insertar->rMora;
			$fechaApl = date('Y-m-d');
			$insert = array(
			'noAfecta'=>$insertar->noAfectas,
			'ventasGravadas'=>$insertar->ventasGravadas,
			'saldoAnterior'=>0,
			'saldoActual'=>0,
			'iva'=>0,
			'pago'=>$pago,
			'fechaAplicacion'=>$fechaApl,
			'intMora'=>$insertar->rMora,
			'estadoFactura'=>1,
			'id_Credito'=>$insertar->idCredito);

			if($this->db->insert('tbl_factura', $insert)){
				//echo "bine guardado";
				
				$idC= $insertar->idCredito;
				$sql2 = "UPDATE tbl_detallepagos SET estadoFacturacion = 2 WHERE idCredito = $idC AND fechaPago BETWEEN '$fechaInicio' AND '$fechaFin'";
				//echo $sql2;
				$bool=$this->db->query($sql2);
			}
			else{
				//return false;
				//echo "mal guardado";
			}
		}
		return $resul->result();

	}

}

?>