<?php 
class Reportes_Model extends CI_Model
{
	public function ReporteIva($i, $f)
	{
		if (isset($i) && isset($f)) {
			$sql = "SELECT SUM(dp.interes) as interes, SUM(dp.iva) as iva, c.idCredito, c.codigoCredito, c.tipoCredito, c.fechaVencimiento, cl.Codigo_Cliente, cl.Nombre_Cliente, cl.Apellido_Cliente, s.codigoSolicitud FROM tbl_detallepagos as dp INNER JOIN tbl_creditos as c ON(dp.idCredito = c.idCredito) INNER JOIN tbl_amortizaciones as a ON(c.idAmortizacion = a.idAmortizacion) INNER JOIN tbl_solicitudes as s ON(a.idSolicitud = s.idSolicitud) INNER JOIN tbl_clientes as cl ON(s.idCliente = cl.Id_Cliente) WHERE DATE(dp.fechaPago) BETWEEN '$i' AND '$f' GROUP BY dp.idCredito";
		}
		else
		{
		$sql = "SELECT SUM(dp.interes) as interes, SUM(dp.iva) as iva, c.idCredito, c.codigoCredito, c.tipoCredito, c.fechaVencimiento, cl.Codigo_Cliente, cl.Nombre_Cliente, cl.Apellido_Cliente FROM tbl_detallepagos as dp INNER JOIN tbl_creditos as c ON(dp.idCredito = c.idCredito) INNER JOIN tbl_amortizaciones as a ON(c.idAmortizacion = a.idAmortizacion) INNER JOIN tbl_solicitudes as s ON(a.idSolicitud = s.idSolicitud) INNER JOIN tbl_clientes as cl ON(s.idCliente = cl.Id_Cliente) GROUP BY dp.idCredito";
		}
		//$sql = "SELECT dp.idDetallePago, dp.totalPago, dp.interes, dp.iva, c.idCredito, c.codigoCredito, c.tipoCredito, c.fechaVencimiento, cl.Codigo_Cliente, cl.Nombre_Cliente, cl.Apellido_Cliente FROM tbl_detallepagos as dp INNER JOIN tbl_creditos as c ON(dp.idCredito = c.idCredito) INNER JOIN tbl_amortizaciones as a ON(c.idAmortizacion = a.idAmortizacion) INNER JOIN tbl_solicitudes as s ON(a.idSolicitud = s.idSolicitud) INNER JOIN tbl_clientes as cl ON(s.idCliente = cl.Id_Cliente)";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function CreditosSaldados(){
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.estadoCredito = 'Finalizado'  ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function CreditosProceso(){
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.estadoCredito = 'Proceso'  ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function CreditosMorosos(){
		//$sql ="SELECT dp.fechaProximoPago, c.idCredito, c.codigoCredito, c.tipoCredito,c.totalAbonado, c.fechaVencimiento,a.capital, cl.Codigo_Cliente, cl.Nombre_Cliente, cl.Apellido_Cliente FROM tbl_detallepagos as dp INNER JOIN tbl_creditos as c ON(dp.idCredito = c.idCredito) INNER JOIN tbl_amortizaciones as a ON(c.idAmortizacion = a.idAmortizacion) INNER JOIN tbl_solicitudes as s ON(a.idSolicitud = s.idSolicitud) INNER JOIN tbl_clientes as cl ON(s.idCliente = cl.Id_Cliente) WHERE dp.idDetallePago IN (SELECT MAX(idDetallePago) FROM tbl_detallepagos) GROUP BY dp.idCredito";
		$sql = "SELECT dp.fechaProximoPago, c.idCredito, c.codigoCredito, c.tipoCredito,c.totalAbonado, c.fechaVencimiento,a.capital, cl.Codigo_Cliente, cl.Nombre_Cliente, cl.Apellido_Cliente FROM tbl_detallepagos as dp INNER JOIN tbl_creditos as c ON(dp.idCredito = c.idCredito) INNER JOIN tbl_amortizaciones as a ON(c.idAmortizacion = a.idAmortizacion) INNER JOIN tbl_solicitudes as s ON(a.idSolicitud = s.idSolicitud) INNER JOIN tbl_clientes as cl ON(s.idCliente = cl.Id_Cliente) WHERE c.estadoCredito ='Proceso' GROUP BY dp.idCredito";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function CreditosSaldadosFecha($fechaInicio, $fechaFin){
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.estadoCredito = 'Finalizado' AND cr.fechaApertura BETWEEN '$fechaInicio' AND '$fechaFin'  ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function CreditosProcesoFecha($fechaInicio, $fechaFin){
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.estadoCredito = 'Proceso'  AND cr.fechaApertura BETWEEN '$fechaInicio' AND '$fechaFin' ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function CreditosMorososFecha($fechaInicio, $fechaFin){
		$sql ="SELECT dp.fechaProximoPago, c.idCredito, c.codigoCredito, c.tipoCredito,c.totalAbonado, c.fechaVencimiento,a.capital, c.fechaApertura, cl.Codigo_Cliente, cl.Nombre_Cliente, cl.Apellido_Cliente FROM tbl_detallepagos as dp INNER JOIN tbl_creditos as c ON(dp.idCredito = c.idCredito) INNER JOIN tbl_amortizaciones as a ON(c.idAmortizacion = a.idAmortizacion) INNER JOIN tbl_solicitudes as s ON(a.idSolicitud = s.idSolicitud) INNER JOIN tbl_clientes as cl ON(s.idCliente = cl.Id_Cliente) WHERE dp.idDetallePago IN (SELECT MAX(idDetallePago) FROM tbl_detallepagos) AND c.fechaApertura BETWEEN '$fechaInicio' AND '$fechaFin' GROUP BY dp.idCredito";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function ObtenerCreditosFecha($i, $f)
	{
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado, cr.interesPendiente, cr.fechaVencimiento FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE DATE(cr.fechaApertura) BETWEEN '$i' AND '$f' ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function ReporteInfored($inicio, $fin)
	{
		$sql = "SELECT dt.fechaPago, c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, c.Tipo_Cliente, c.DUI_Cliente, c.NIT_Cliente,c.Fecha_Nacimiento_Cliente, c.Genero_Cliente, a.capital, a.ivaInteresCapital, a.plazoMeses,a.pagoCuota, a.cantidadCuota , cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado, cr.montoTotal, cr.fechaApertura, cr.fechaVencimiento, s.destinoCredito  FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente INNER JOIN tbl_detallepagos as dt ON(cr.idCredito = dt.idCredito) WHERE dt.fechaPago BETWEEN '$inicio' AND '$fin' GROUP BY cr.idCredito ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function DatosAdicionalesInfored($id)
	{
		$sql = "SELECT idDetallePago, iva, capitalPendiente, mora, fechaPago, fechaProximoPago, capitalPendiente, fechaRegistro FROM tbl_detallepagos WHERE idCredito='$id' AND idDetallePago = (SELECT MAX(idDetallePago) FROM tbl_detallepagos WHERE idCredito='$id') LIMIT 1";
		$result= $this->db->query($sql);
		if ($result->num_rows() > 0)
		 {
			return $result->row();
		 }
		return null;
		
	}

	public function InforedFaltantes($inicio, $fin)
	{
		
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, c.Tipo_Cliente, c.DUI_Cliente, c.NIT_Cliente,c.Fecha_Nacimiento_Cliente, c.Genero_Cliente, a.capital, a.ivaInteresCapital, a.plazoMeses,a.pagoCuota, a.cantidadCuota , cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado, cr.montoTotal, cr.fechaApertura, cr.fechaVencimiento, s.destinoCredito FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON(s.idCliente = c.Id_Cliente) WHERE cr.fechaApertura BETWEEN '$inicio' AND '$fin' AND cr.totalAbonado='0' GROUP BY cr.idCredito ORDER BY cr.idCredito DESC ";
		$datos = $this->db->query($sql);
		return $datos;
	}


	public function Calificacion(){
		$sql= "SELECT dp.*, dp.fechaProximoPago, c.idCredito, c.codigoCredito, c.tipoCredito,c.totalAbonado, c.fechaVencimiento,a.capital, c.fechaApertura, cl.Codigo_Cliente, cl.Nombre_Cliente, cl.Apellido_Cliente FROM tbl_detallepagos as dp INNER JOIN tbl_creditos as c ON(dp.idCredito = c.idCredito) INNER JOIN tbl_amortizaciones as a ON(c.idAmortizacion = a.idAmortizacion) INNER JOIN tbl_solicitudes as s ON(a.idSolicitud = s.idSolicitud) INNER JOIN tbl_clientes as cl ON(s.idCliente = cl.Id_Cliente) WHERE dp.idDetallePago IN (SELECT MAX(idDetallePago) FROM tbl_detallepagos) GROUP BY dp.idCredito";
		$result = $this->db->query($sql);
		return $result;
	}
	public function CalificacionFecha($fechaInicio, $fechaFin){
		$sql= "SELECT dp.*, dp.fechaProximoPago, c.idCredito, c.codigoCredito, c.tipoCredito,c.totalAbonado, c.fechaVencimiento,a.capital, c.fechaApertura, cl.Codigo_Cliente, cl.Nombre_Cliente, cl.Apellido_Cliente FROM tbl_detallepagos as dp INNER JOIN tbl_creditos as c ON(dp.idCredito = c.idCredito) INNER JOIN tbl_amortizaciones as a ON(c.idAmortizacion = a.idAmortizacion) INNER JOIN tbl_solicitudes as s ON(a.idSolicitud = s.idSolicitud) INNER JOIN tbl_clientes as cl ON(s.idCliente = cl.Id_Cliente) WHERE dp.idDetallePago IN (SELECT MAX(idDetallePago) FROM tbl_detallepagos) AND c.fechaApertura BETWEEN '$fechaInicio' AND '$fechaFin' GROUP BY dp.idCredito";
		$result = $this->db->query($sql);
		return $result;
	}

	public function DatosAdicionalesRG($id)
	{
		$sql = "SELECT a.totalInteres, SUM(dt.interes) as interesesPagados FROM tbl_amortizaciones as a INNER JOIN tbl_creditos as cr ON(a.idAmortizacion = cr.idAmortizacion) INNER JOIN tbl_detallepagos as dt ON(cr.idCredito = dt.idCredito) WHERE cr.idCredito='$id'  LIMIT 1";
		$result= $this->db->query($sql);
		if ($result->num_rows() > 0)
		 {
			return $result->row();
		 }
		return null;
		
	}

	public function ObtenerCreditosCliente($nombre)
	{
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado, cr.interesPendiente, cr.fechaVencimiento FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE c.Nombre_Cliente LIKE '%$nombre%' ORDER BY cr.idCredito DESC ";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function obtenerCreditosParaMora(){
		$sql = "SELECT c.Codigo_Cliente, c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.fechaVencimiento, cr.totalAbonado, cr.interesPendiente, cr.fechaApertura FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE totalAbonado=0 AND interesPendiente = 0 ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}
	

}
?>