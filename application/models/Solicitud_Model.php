<?php 

class Solicitud_Model extends CI_Model
{
	public function obtenerPlazos()
	{
		$this->db->order_by("id_plazo", "asc");
		$plazos= $this->db->get("tbl_plazos_prestamos");
		return $plazos;
	}

	public function guardarPlazo($datos)
	{
		if ($datos != null)
		{
			$plazo= $datos['tiempo_plazo'];
			$sql = "INSERT INTO tbl_plazos_prestamos VALUES('', '$plazo', NOW(), '1')";
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

	public function actualizarPlazo($datos)
	{
		if ($datos != null)
		{
			$plazo= $datos['tiempo_plazo'];
			$idPlazo= $datos['id_plazo'];

			$sql = "UPDATE tbl_plazos_prestamos SET tiempo_plazo='$plazo' WHERE id_plazo = '$idPlazo'";
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

	public function eliminarPlazo($id)
	{
		if ($id != null)
		{
			$sql = "UPDATE tbl_plazos_prestamos SET estado_plazo='0' WHERE id_plazo = '$id'";
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

	public function obtenerClientes()
	{
	    $this->db->order_by("Id_Cliente", "desc");
		$clientes= $this->db->get("tbl_clientes");
		return $clientes;
	}

	public function GuardarSolicitud($datos)
	{
		// Datos para la solicitud
	   $codigoSolicitud = $datos['numero_solicitud'];
	   $fechaRecibido = $datos['fecha_recibido'];
	   $observaciones = $datos['observaciones'];
	   $tipoC = $datos['tipoCredito'];
	   $estado = 1;
	   $idCliente = $datos['id_cliente'];
	   $idLineaPlazo = $datos['tipo_prestamo'];
	   $destinoCredito = $datos['destino_prestamo'];
	   $mora = $datos['cobra_mora'];
	   $idEstadoSolicitud = '1';

	   // Datos Amortizacion
	   $nombreCredito = "";

	   $capital = $datos['monto_dinero'];
	   $totalInteres = $datos['intereses_pagar'];
	   $totalIva = $datos['iva_pagar'];
	   $ivaInteresCapital = $datos['total_pagar'];
	   $plazoMeses = $datos['numero_meses'];
	   $pagoCuota = $datos['cuota_diaria'];
	   $cantidadCuota = $datos['numero_cuotas'];
	   $estado = 1;

	   // Datos del Fiador
	   if (isset($datos['nombreFiador'], $datos['apellidoFiador'], $datos['duiFiador'], $datos['nitFiador']))
		{
			$existeFiador = true;
		    $nombreFiador = $datos['nombreFiador'];
			$apellidoFiador = $datos['apellidoFiador'];
			$duiFiador = $datos['duiFiador'];
			$nitFiador = $datos['nitFiador'];
			$telefonoFiador = $datos['telefonoFiador'];
			$emailFiador = $datos['emailFiador'];
			$direccionFiador = $datos['direccionFiador'];
			$generoFiador = $datos['generoFiador'];
			$nacimientoFiador = $datos['nacimientoFiador'];
			$ingresoFiador = $datos['ingresoFiador'];
			$estadoFiador = 1;
		}

		// Datos de la prenda
		if (isset($datos['nombrePrenda'], $datos['precioPrenda'], $datos['descripcionPrenda']))
		{
			$existePrenda = true;
		    $nombrePrenda = $datos['nombrePrenda'];
			$precioPrenda = $datos['precioPrenda'];
			$descripcionPrenda = $datos['descripcionPrenda'];
			$estadoPrenda = 1;
		}

		// Datos de la hipoteca
		if (isset($datos['nombreHipoteca'], $datos['precioHipoteca'], $datos['descripcionHipoteca']))
		{
			$existeHipoteca = true;
		    $nombreHipoteca = $datos['nombreHipoteca'];
			$precioHipoteca = $datos['precioHipoteca'];
			$descripcionHipoteca = $datos['descripcionHipoteca'];
			$estadoHipoteca= 1;
		}

if ($tipoC == "Crédito popular")
	   {
	   	$tasaInteres = $datos['tasa_interes']*12;
	   	if (isset($existeFiador) && isset($existePrenda) &&  !isset($existeHipoteca))
			{
				$nombreCredito = "Crédito popular mixto";
			}
			else
			{
				if (isset($existeFiador) && isset($existeHipoteca) &&  !isset($existePrenda))
				{
					$nombreCredito = "Crédito popular mixto";
				}
				else
				{
					if (isset($existeHipoteca) && isset($existePrenda) &&  !isset($existeFiador))
						{
							$nombreCredito = "Crédito popular mixto";
						}
					else
					{
						if (isset($existeFiador) && !isset($existePrenda) && !isset($existeHipoteca))
						{
							$nombreCredito = "Crédito popular";
						}
						else
							{
								if (!isset($existeFiador) && isset($existePrenda) && !isset($existeHipoteca))
								{
									$nombreCredito = "Crédito popular prendario";
								}
								else
									{
										if (!isset($existeFiador) && !isset($existePrenda) && isset($existeHipoteca))
										{
											$nombreCredito = "Crédito popular hipotecario";
										}
										else
										{
											$nombreCredito = "Crédito popular";
										}
									}
							}
					}
				}
			}

	   }
	   else
	   {
	   	    $tasaInteres = $datos['tasa_interes'];
			// definiendo tipo de credito
			if (isset($existeFiador) && isset($existePrenda) &&  !isset($existeHipoteca))
			{
				$nombreCredito = "Crédito personal mixto";
			}
			else
			{
				if (isset($existeFiador) && isset($existeHipoteca) &&  !isset($existePrenda))
				{
					$nombreCredito = "Crédito personal mixto";
				}
				else
				{
					if (isset($existeHipoteca) && isset($existePrenda) &&  !isset($existeFiador))
						{
							$nombreCredito = "Crédito personal mixto";
						}
					else
					{
						if (isset($existeFiador) && !isset($existePrenda) && !isset($existeHipoteca))
						{
							$nombreCredito = "Crédito personal";
						}
						else
							{
								if (!isset($existeFiador) && isset($existePrenda) && !isset($existeHipoteca))
								{
									$nombreCredito = "Crédito personal prendario";
								}
								else
									{
										if (!isset($existeFiador) && !isset($existePrenda) && isset($existeHipoteca))
										{
											$nombreCredito = "Crédito personal hipotecario";
										}
										else
										{
											$nombreCredito = "Crédito personal";
										}
									}
							}
					}
				}
			}
			// fin	   	   
	   }
	   // Guardando la solicitud
	   $sql = "INSERT INTO tbl_solicitudes(codigoSolicitud, fechaRecibido, observaciones, estadoSolicitud, cobraMora, tipoCredito, destinoCredito, idCliente, idLineaPlazo, idEstadoSolicitud)
	   		   VALUES('$codigoSolicitud', '$fechaRecibido', '$observaciones', '$estado', '$mora', '$nombreCredito', $destinoCredito ,'$idCliente', '$idLineaPlazo', '$idEstadoSolicitud')";
	    if ($this->db->query($sql))
		{
			//Buscando el ultimo Id
			$sql2 = "SELECT MAX(idSolicitud) as iSoli FROM tbl_solicitudes WHERE codigoSolicitud = '".$codigoSolicitud."' LIMIT 1";
			$resultado = $this->db->query($sql2);
			foreach ($resultado->result() as $filaResultado)
			{
				$idSoli = $filaResultado->iSoli; //Dato para la amortizacion
			}
			// Guardando datos de la amortizacion
			$sql3 = "INSERT INTO tbl_amortizaciones(tasaInteres, capital, totalInteres, totalIva, ivaInteresCapital, plazoMeses, pagoCuota, cantidadCuota, estadoAmortizacion, idSolicitud)
			VALUES('$tasaInteres', '$capital', '$totalInteres', '$totalIva', '$ivaInteresCapital', '$plazoMeses', '$pagoCuota', '$cantidadCuota', '$estado', '$idSoli')";
			if ($this->db->query($sql3))
			{
				if (isset($existeFiador))
				{
					for ($i=0; $i < sizeof($nombreFiador) ; $i++)
					{ 
					$sql4 = "INSERT INTO tbl_fiadores(nombre, apellido, dui, nit, telefono, email, direccion, genero, fechaNacimiento, ingreso, estado, idSolicitud)
	    					VALUES('$nombreFiador[$i]', '$apellidoFiador[$i]', '$duiFiador[$i]', '$nitFiador[$i]', '$telefonoFiador[$i]', '$emailFiador[$i]', '$direccionFiador[$i]',
	    			   		'$generoFiador[$i]', '$nacimientoFiador[$i]', '$ingresoFiador[$i]', '$estadoFiador', '$idSoli')";
						$this->db->query($sql4);
					}
				}
				if (isset($existePrenda))
				{
					for ($i=0; $i < sizeof($nombrePrenda) ; $i++) 
					{ 
						$sql5 = "INSERT INTO tbl_garantias(nombre, valorado, descripcion, estado, idSolicitud)
		    					VALUES('$nombrePrenda[$i]', '$precioPrenda[$i]', '$descripcionPrenda[$i]', '$estadoPrenda', '$idSoli')";
						$this->db->query($sql5);
					}
				}

				if (isset($existeHipoteca))
				{
					for ($i=0; $i < sizeof($nombreHipoteca) ; $i++) 
					{ 
						$sql6 = "INSERT INTO tbl_hipotecas(nombre, valorado, descripcion, estado, idSolicitud)
		    					VALUES('$nombreHipoteca[$i]', '$precioHipoteca[$i]', '$descripcionHipoteca[$i]', '$estadoHipoteca', '$idSoli')";
						$this->db->query($sql6);
					}
				}

				return true;
			}
			else{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function ObtenerSolicitudes()
	{
		/*$datos= $this->db->get("tbl_solicitud");
		return $datos;*/
		$this->db->select('*');
		$this->db->from('tbl_solicitudes');
		$this->db->join('tbl_amortizaciones', 'tbl_amortizaciones.idSolicitud = tbl_solicitudes.idSolicitud');
		$this->db->join('tbl_clientes', 'tbl_clientes.Id_Cliente = tbl_solicitudes.idCliente');
		$this->db->join('tbl_plazos_prestamos', 'tbl_plazos_prestamos.id_plazo = tbl_solicitudes.idLineaPlazo');
		$this->db->join('tbl_estados_solicitud', 'tbl_estados_solicitud.id_estado = tbl_solicitudes.idEstadoSolicitud');
	    $this->db->order_by('tbl_solicitudes.idSolicitud', 'desc');
		$datos = $this->db->get();
		return $datos;
	}

	public function EliminarSolicitud($id)
	{
		$sql1 = "UPDATE tbl_solicitudes SET estadoSolicitud='0' WHERE idSolicitud='$id'";
		if ($this->db->query($sql1))
		{
			$sql2 = "UPDATE tbl_amortizaciones SET estadoAmortizacion='0' WHERE idSolicitud='$id'";
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

	public function DetalleSolicitud($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_solicitudes');
		$this->db->join('tbl_amortizaciones', 'tbl_amortizaciones.idSolicitud = tbl_solicitudes.idSolicitud');
		$this->db->join('tbl_clientes', 'tbl_clientes.Id_Cliente = tbl_solicitudes.idCliente');
		$this->db->join('tbl_plazos_prestamos', 'tbl_plazos_prestamos.id_plazo = tbl_solicitudes.idLineaPlazo');
		$this->db->join('tbl_estados_solicitud', 'tbl_estados_solicitud.id_estado = tbl_solicitudes.idEstadoSolicitud');
		$this->db->where('tbl_solicitudes.idSolicitud', $id);
		$datos = $this->db->get();
		return $datos;
	}

	public function ObtenerFiadores($id)
	{
		$sql = "SELECT * FROM tbl_fiadores WHERE idSolicitud='$id' ORDER BY idFiador DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function ObtenerGarantias($id)
	{
		$sql = "SELECT * FROM tbl_garantias WHERE idSolicitud='$id' ORDER BY idGarantia DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function ObtenerHipoteca($id)
	{
		$sql = "SELECT * FROM tbl_hipotecas WHERE idSolicitud='$id' ORDER BY idHipoteca DESC";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function actualizarESolicitud($tipo, $id)
	{
		$sql = "UPDATE tbl_solicitudes SET tipoCredito='$tipo' WHERE idSolicitud = '$id'";
		$datos = $this->db->query($sql);
		return $datos;
	}

	public function actualizarSolicitud($datos)
	{
		// Datos para la solicitud
	   $idSolicitud = $datos['id_solicitud'];
	   $codigoSolicitud = $datos['numero_solicitud'];
	   $fechaRecibido = $datos['fecha_recibido'];
	   $observaciones = $datos['observaciones'];
	   $idLineaPlazo = $datos['tipo_prestamo'];
	   //$idCliente = $datos['id_cliente'];
	   //$estado = 1;
	  // $idEstadoSolicitud = '1';

	   // Datos Amortizacion
	   $tasaInteres = $datos['tasa_interes'];
	   $capital = $datos['monto_dinero'];
	   $totalInteres = $datos['intereses_pagar'];
	   $totalIva = $datos['iva_pagar'];
	   $ivaInteresCapital = $datos['total_pagar'];
	   $plazoMeses = $datos['numero_meses'];
	   $pagoCuota = $datos['cuota_diaria'];
	   $cantidadCuota = $datos['numero_cuotas'];
	   $cobraMora = $datos['cobra_mora'];
	   $estado = 1;

	   // Guardando la solicitud
	   $sql1 = "UPDATE tbl_solicitudes SET codigoSolicitud='$codigoSolicitud', fechaRecibido='$fechaRecibido', observaciones='$observaciones', idLineaPlazo = '$idLineaPlazo', cobraMora='$cobraMora' WHERE idSolicitud= '$idSolicitud'";
	   if ($this->db->query($sql1))
		{
			$sql2 = "UPDATE tbl_amortizaciones SET tasaInteres='$tasaInteres', capital='$capital', totalInteres='$totalInteres',
							totalIva='$totalIva', ivaInteresCapital='$ivaInteresCapital', plazoMeses='$plazoMeses', pagoCuota='$pagoCuota',
							cantidadCuota='$cantidadCuota' WHERE idSolicitud= '$idSolicitud'";
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

	public function ActualizarEstadoSolicitud($id, $i)
	{
		switch ($i) {
			case '1':
				$sql = "UPDATE tbl_solicitudes SET idEstadoSolicitud='2' WHERE idSolicitud = '$id'";
				break;
			case '2':
				$sql = "UPDATE tbl_solicitudes SET idEstadoSolicitud='4' WHERE idSolicitud = '$id'";
				break;
			default:
				break;
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


	public function obtenerSolicitud($id)
	{
		$sql= "SELECT am.idAmortizacion, am.tasaInteres, am.capital, am.totalInteres, am.totalIva, am.totalIva, am.ivaInteresCapital, am.plazoMeses, am.pagoCuota, am.cantidadCuota, am.estadoAmortizacion, am.fechaRegistro, am.idSolicitud, cl.Nombre_Cliente, cl.Apellido_Cliente, so.tipoCredito FROM tbl_amortizaciones as am INNER JOIN tbl_solicitudes as so ON(am.idSolicitud = so.idSolicitud) INNER JOIN tbl_clientes as cl ON(so.idCliente = cl.Id_Cliente) WHERE am.idSolicitud='$id'";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function GuardarCredito($datos)
	{
		if ($datos != null)
		{
			$idSolicitud = $datos['id_solicitud'];
			$codigoCredito = $datos['codigo_credito'];
			$tipoCredito = $datos['tipo_credito'];
			$codigoTipoCredito = " ";
			$montoTotal = $datos['monto_dinero'];
			$totalAbonado = 0;
			$estadoCredito = "Proceso";
			$fechaApertura = $datos['fecha_apertura'];
			$fechaVencimiento = $datos['fecha_de_vencimiento'];
			$estado = 1;
			$idAmortizacion = $datos['amortizacion'];
			$sql = "INSERT INTO tbl_creditos(codigoCredito, tipoCredito, codigoTipoCredito, montoTotal, totalAbonado, estadoCredito, fechaApertura, fechaVencimiento, estado, idAmortizacion)
				VALUES('$codigoCredito', '$tipoCredito', '$codigoTipoCredito', '$montoTotal', '$totalAbonado', '$estadoCredito', '$fechaApertura', '$fechaVencimiento', '$estado', '$idAmortizacion')";
			if ($this->db->query($sql))
			{
				$sql2 = "UPDATE tbl_solicitudes SET idEstadoSolicitud='3' WHERE idSolicitud='$idSolicitud'";
				if ($this->db->query($sql2))
					{
						return true;
					}
				return false;
			}
			else
			{
				return false;
			}	
		}
		else{
			return false;
		}
	}

	public function AgregarFiador($datos)
	{
		if ($datos != null)
		{
		    $idSolicitud = $datos['id_solicitud'];
		    $nombreFiador = $datos['nombre_fiador'];
			$apellidoFiador = $datos['apellido_fiador'];
			$duiFiador = $datos['dui_fiador'];
			$nitFiador = $datos['nit_fiador'];
			$telefonoFiador = $datos['telefono_fiador'];
			$emailFiador = $datos['email_fiador'];
			$direccionFiador = $datos['direccion_fiador'];
			$generoFiador = $datos['genero_fiador'];
			$nacimientoFiador = $datos['nacimiento_fiador'];
			$ingresoFiador = $datos['ingreso_fiador'];
			$estadoFiador = 1;
			$sql = "INSERT INTO tbl_fiadores(nombre, apellido, dui, nit, telefono, email, direccion, genero, fechaNacimiento, ingreso, estado, idSolicitud)
	    					VALUES('$nombreFiador', '$apellidoFiador', '$duiFiador', '$nitFiador', '$telefonoFiador', '$emailFiador', '$direccionFiador',
	    			   		'$generoFiador', '$nacimientoFiador', '$ingresoFiador', '$estadoFiador', '$idSolicitud')";
			if ($this->db->query($sql))
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

	public function ActualizarFiador($datos)
	{
		if ($datos != null)
		{
		    $idFiador= $datos['id_fiador'];
		    $idSolicitud = $datos['id_solicitud'];
		    $nombreFiador = $datos['nombre_fiador'];
			$apellidoFiador = $datos['apellido_fiador'];
			$duiFiador = $datos['dui_fiador'];
			$nitFiador = $datos['nit_fiador'];
			$telefonoFiador = $datos['telefono_fiador'];
			$emailFiador = $datos['email_fiador'];
			$direccionFiador = $datos['direccion_fiador'];
			$nacimientoFiador = $datos['nacimiento_fiador'];
			$ingresoFiador = $datos['ingreso_fiador'];
			// $generoFiador = $datos['genero_fiadorA'];

			$sql = "UPDATE tbl_fiadores SET nombre='$nombreFiador', apellido='$apellidoFiador', dui='$duiFiador', nit='$nitFiador',
											telefono='$telefonoFiador', email='$emailFiador', direccion='$direccionFiador',
											fechaNacimiento='$nacimientoFiador', ingreso='$ingresoFiador' WHERE idFiador='$idFiador'";
			if ($this->db->query($sql))
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

	public function AgregarPrenda($datos)
	{
		if ($datos != null)
		{
		    $idSolicitud = $datos['id_solicitud'];
		    $nombrePrenda = $datos['nombre_prenda'];
			$precioPrenda = $datos['precio_valorado'];
			$descripcionPrenda = $datos['descripcion_prenda'];
			$estadoPrenda = 1;

			$sql = "INSERT INTO tbl_garantias(nombre, valorado, descripcion, estado, idSolicitud)
		    					VALUES('$nombrePrenda', '$precioPrenda', '$descripcionPrenda', '$estadoPrenda', '$idSolicitud')";
			if ($this->db->query($sql))
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

	public function ActualizarPrenda($datos)
	{
		if ($datos != null)
		{
		    $idPrenda = $datos['id_prenda'];
		    $nombrePrenda = $datos['nombre_prenda'];
			$precioPrenda = $datos['precio_valorado'];
			$descripcionPrenda = $datos['descripcion_prenda'];
			// $generoFiador = $datos['genero_fiadorA'];

			$sql = "UPDATE tbl_garantias SET nombre='$nombrePrenda', valorado='$precioPrenda', descripcion='$descripcionPrenda'
					WHERE idGarantia='$idPrenda'";
			if ($this->db->query($sql))
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

	public function AgregarHipoteca($datos)
	{
		if ($datos != null)
		{
		    $idSolicitud = $datos['id_solicitud'];
		    $nombreHipoteca = $datos['nombre_hipoteca'];
			$precioHipoteca = $datos['precio_hipoteca'];
			$descripcionHipoteca = $datos['descripcion_hipoteca'];
			$estadoHipoteca = 1;

			$sql = "INSERT INTO tbl_hipotecas(nombre, valorado, descripcion, estado, idSolicitud)
		    					VALUES('$nombreHipoteca', '$precioHipoteca', '$descripcionHipoteca', '$estadoHipoteca', '$idSolicitud')";
			if ($this->db->query($sql))
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


	public function ActualizarHipoteca($datos)
	{
		if ($datos != null)
		{
		    $idHipoteca = $datos['id_hipoteca'];
		    $nombreHipoteca = $datos['nombre_hipoteca'];
			$precioHipoteca = $datos['precio_hipoteca'];
			$descripcionHipoteca = $datos['descripcion_hipoteca'];
			// $generoFiador = $datos['genero_fiadorA'];

			$sql = "UPDATE tbl_hipotecas SET nombre='$nombreHipoteca', valorado='$precioHipoteca', descripcion='$descripcionHipoteca'
					WHERE idHipoteca='$idHipoteca'";
			if ($this->db->query($sql))
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

?>