<?php 

class Creditos_Model extends CI_Model{

	public function ObtenerCreditos(){
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.fechaVencimiento, cr.totalAbonado, cr.interesPendiente FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function ObtenerCreditoId($id){
		$sql="SELECT c.urlImg,c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, c.Dui_cliente, c.Tipo_Cliente,c.Domicilio_Cliente,c.Telefono_Celular_Cliente, s.codigoSolicitud, s.estadoSolicitud, s.idLineaPlazo, a.idAmortizacion, a.tasaInteres, a.capital, a.ivaInteresCapital, a.totalInteres, a.pagoCuota, a.cantidadCuota, a.totalIva,  cr.interesPendiente as i, cr.* FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.idCredito=$id";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function obtenerDetalleCredito($id){
		$sql ="SELECT  c.urlImg,c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente, c.Dui_cliente, c.Tipo_Cliente,c.Domicilio_Cliente,c.Telefono_Celular_Cliente, s.codigoSolicitud, s.estadoSolicitud, s.idLineaPlazo, a.idAmortizacion, a.tasaInteres, a.capital, a.ivaInteresCapital, a.totalInteres, a.pagoCuota, a.cantidadCuota, a.totalIva, a.tasaInteres,a.plazoMeses,cr.fechaApertura AS fechaPago,  cr.interesPendiente as i, cr.* FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.idCredito=$id";
		$datos=$this->db->query($sql);
		return $datos;
	}
	public function ObtenerCreditosPersonales(){
		$sql = "SELECT  c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital,a.pagoCuota, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.tipoCredito LIKE 'Crédito personal%'  ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function ObtenerCreditosPopulares(){
		$sql = "SELECT c.Codigo_Cliente, c.Nombre_Cliente, c.Apellido_Cliente,a.capital, a.ivaInteresCapital, cr.idCredito,cr.codigoCredito,cr.estadoCredito, cr.tipoCredito, cr.totalAbonado FROM tbl_creditos as cr INNER JOIN tbl_amortizaciones as a ON cr.idAmortizacion = a.idAmortizacion INNER JOIN tbl_solicitudes as s ON a.idSolicitud = s.idSolicitud INNER JOIN tbl_clientes as c ON s.idCliente = c.Id_Cliente WHERE cr.tipoCredito LIKE 'Crédito popular%'  ORDER BY cr.idCredito DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function contadorCreditosAsignadosPopular(){
		$sql = "SELECT * FROM tbl_creditos WHERE (tipoCredito='Crédito popular' OR tipoCredito='Crédito popular mixto' OR tipoCredito='Crédito popular prendario' OR tipoCredito='Crédito popular hipotecario' AND estado='1' AND estadoCredito = 'Proceso')";
		$datos = $this->db->query($sql);
		return $datos->num_rows();
	}

	public function contadorCreditosEnMoraPopular(){
		date_default_timezone_set('America/El_Salvador');
		$fecha = date("Y-m-d");
		$querysql = "SELECT * FROM tbl_creditos
						WHERE (tipoCredito = 'Crédito popular' OR tipoCredito = 'Crédito popular mixto' OR tipoCredito = 'Crédito popular prendario' OR tipoCredito = 'Crédito popular hipotecario') AND estado='1' AND estadoCredito = 'Proceso' AND fechaVencimiento < '$fecha' AND totalAbonado < montoTotal"; 
		$datos = $this->db->query($querysql);
		return $datos->num_rows();
	}

	public function contadorCreditosAsignadosPersonal(){
		$sql = "SELECT * FROM tbl_creditos WHERE (tipoCredito='Crédito personal' OR tipoCredito='Crédito personal hipotecario' OR tipoCredito='Crédito personal prendario' OR tipoCredito='Crédito personal mixto' AND estado='1' AND estadoCredito = 'Proceso')";
		$datos = $this->db->query($sql);
		return $datos->num_rows();
	}

	public function contadorCreditosEnMoraPersonal(){
		date_default_timezone_set('America/El_Salvador');
		$fecha1 = date("Y-m-d");
		$querysql = "SELECT * FROM tbl_creditos
						WHERE (tipoCredito='Crédito personal' OR tipoCredito='Crédito personal hipotecario' OR tipoCredito='Crédito personal prendario' OR tipoCredito='Crédito personal mixto') AND estado='1' AND estadoCredito = 'Proceso' AND fechaVencimiento < '$fecha1' AND totalAbonado < montoTotal"; 
		$datos = $this->db->query($querysql);
		return $datos->num_rows();
	}
}
?>