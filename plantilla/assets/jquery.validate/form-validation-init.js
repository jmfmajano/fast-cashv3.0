
!function($) {
    "use strict";

    var FormValidator = function() {
        //####################### FORMULARIO DE CLIENTE #######################
        this.$FormCliente = $("#basic-form");
        this.$FormClienteEmpleado = $("#DLaborales");
        this.$FormClienteEmpresario = $("#DNegocio");
        this.$FormClienteEmpleadoRe = $("#DLaboralesRe");
        this.$FormClienteEmpresarioRe = $("#DNegocioRe");
        //##################### FIN FORMULARIO DE CLIENTE #####################

        //####################### FORMULARIO DE PLAZOS #######################
        this.$FormNuevoPlazo = $("#FormNuevoPlazo");
        this.$FormEditarPlazo = $("#FormEditarPlazo");
        //##################### FIN FORMULARIO DE PLAZOS #####################

        //####################### FORMULARIO DE GESTION DE SOLICITUD #######################
        this.$FormNuevoEstadoSolicitud = $("#FormNuevoEstadoSolicitud");
        this.$FormEditarEstadoSolicitud = $("#FormEditarEstadoSolicitud");
        this.$FormNuevaSolicitud = $("#formNuevaSolicitud");
        this.$FormNuevaSolicitudModalFiador = $("#FormNuevaSolicitudModalFiador");
        this.$FormEditarSolicitudModalFiadorA = $("#FormEditarSolicitudModalFiadorA");
        
        this.$FormNuevaSolicitudModalPrenda = $("#FormNuevaSolicitudModalPrenda");
        this.$FormNuevaSolicitudModalHipoteca = $("#FormNuevaSolicitudModalHipoteca");
        this.$FormEditarSolicitudModalHipotecaA = $("#FormEditarSolicitudModalHipotecaA");
        this.$FormEditarSolicitudModalPrenda = $("#FormEditarSolicitudModalPrendaA");
        this.$validarFormAprobarCredito = $("#validarFormAprobarCredito");
        //##################### FIN FORMULARIO DE GESTION DE SOLICITUD #####################

        //####################### FORMULARIO DE GESTION DE ACCESO AL SISTEMA #######################
        this.$FormNuevoAccesoSistema = $("#FormNuevoAccesoSistema");
        this.$FormEditarAccesoSistema = $("#FormEditarAccesoSistema");
        //##################### FIN FORMULARIO DE GESTION DE ACCESO AL SISTEMA #####################

        //####################### FORMULARIO DE GESTION DE EMPLEADOS #######################
        this.$FormNuevoEmpleado = $("#FormNuevoEmpleado");
        this.$FormEditarEmpleado = $("#FormEditarEmpleado");
        //##################### FIN FORMULARIO DE GESTION DE EMPLEADOS #####################

       //####################### FORMULARIO DE GESTION DE USUARIOS #######################
        this.$FormNuevoUsuario = $("#FormNuevoUsuario");
        this.$FormEditarUsuario = $("#FormEditarUsuario");
        //##################### FIN FORMULARIO DE GESTION DE USUARIOS #####################

        //####################### FORMULARIO DE GESTION DE EMPRESA #######################
        this.$FormEmpresa = $("#DProcesoCC");
        //##################### FIN FORMULARIO DE GESTION DE EMPRESA #####################

        //####################### FORMULARIO DE GESTION DE PROVEEDOR #######################
        this.$FormNuevoProveedor = $("#DProveedor");
        this.$FormEditarProveedor = $(".DProveedor");
        //##################### FIN FORMULARIO DE GESTION DE PROVEEDOR #####################

        //####################### FORMULARIO DE GESTION DE PAGOS #######################
        this.$FormPago = $("#FormPago");
        //##################### FIN FORMULARIO DE GESTION DE PAGOS #####################        

        //####################### FORMULARIO DE CAJA CHICA #######################
        this.$FormAperturarCaja = $("#formAperturar");
        this.$FormAperturarCaja2 = $("#DProcesoCC2");
        //##################### FIN FORMULARIO DE CAJA CHICA #####################

        //####################### FORMULARIO DE NUEVO PERMISO #######################
        this.$FormNuevoPermiso = $("#FormNuevoPermiso");
        //##################### FIN FORMULARIO DE NUEVO PERMISO #####################
    };

    //init
    FormValidator.prototype.init = function() {
        //####################### FORMULARIO DE CLIENTE #######################
        // VALIDACION DE FORMULARIO NUEVO CLIENTE
        this.$FormCliente.validate({
            rules: {
                Ingreso_Mensual: "required",
                Codigo_Cliente: "required",
                Nombre_Cliente: "required",
                Apellido_Cliente: "required",
                Dui_Cliente: "required",
                Fecha_Nacimiento: "required",                
                Celular_Cliente: "required",
                Email: { email: true },
                cbbDepartamentos: "required",
                cbbMunicipios: "required", 
                Profesion_Cliente: "required",
            },
            messages: {
                Ingreso_Mensual: "",                
                Codigo_Cliente: "",                
                Nombre_Cliente: "",                
                Apellido_Cliente: "",
                Dui_Cliente: "",
                Fecha_Nacimiento: "",                
                Celular_Cliente: "",
                Email: "Por favor, escriba el email del cliente correctamente",
                cbbDepartamentos: "",
                cbbMunicipios: "",
                Domicilio_Cliente: "",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO NUEVO CLIENTE EMPLEADO
        this.$FormClienteEmpleado.validate({
            rules: {
                Nombre_Empresa: "required",
                Telefono: "required",
                Direccion: "required",
            },
            messages: {
                Nombre_Empresa: "",
                Telefono: "",
                Direccion: "",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO NUEVO CLIENTE EMPRESARIO
        this.$FormClienteEmpresario.validate({
            rules: {
                Nombre_Negocio: "required",
                Direccion_Negocio: "required",
            },
            messages: {
                Nombre_Negocio: "",
                Direccion_Negocio: "",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
                // VALIDACION DE FORMULARIO NUEVO CLIENTE EMPLEADO
        this.$FormClienteEmpleadoRe.validate({
            rules: {
                Nombre_Empresa: "required",
                Telefono: "required",
                Direccion: "required",
            },
            messages: {
                Nombre_Empresa: "Por favor, escriba el nombre de la empresa",
                Telefono: "Por favor, digite un teléfono",
                Direccion: "Por favor, escriba una dirección",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO NUEVO CLIENTE EMPRESARIO
        this.$FormClienteEmpresarioRe.validate({
            rules: {
                Nombre_Negocio: "required",
                Direccion_Negocio: "required",
            },
            messages: {
                Nombre_Negocio: "Por favor, escriba un nombre",
                Direccion_Negocio: "Por favor, escriba una dirección",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO DE CLIENTE #####################

        //####################### FORMULARIO DE PLAZOS #######################
        // VALIDACION DE FORMULARIO NUEVO PLAZO
        this.$FormNuevoPlazo.validate({
            rules: {
                tiempo_plazo: "required",
            },
            messages: {
                tiempo_plazo: "Por favor, digite un tiempo de plazo",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO EDITAR PLAZO
        this.$FormEditarPlazo.validate({
            rules: {
                tiempo_plazo: "required",
            },
            messages: {
                tiempo_plazo: "Por favor, digite un tiempo de plazo",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO DE PLAZOS #####################

        //####################### FORMULARIO GESTION DE SOLICITUD #######################
        // VALIDACION DE FORMULARIO NUEVO ESTADO DE SOLICITUD
        this.$FormNuevoEstadoSolicitud.validate({
            rules: {
                nombreEstado: "required",
            },
            messages: {
                nombreEstado: "Por favor, escriba un nombre del estado de solicitud",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO EDITAR ESTADO DE SOLICITUD
        this.$FormEditarEstadoSolicitud.validate({
            rules: {
                nombreEstado: "required",
            },
            messages: {
                nombreEstado: "Por favor, escriba un nombre del estado de solicitud",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });


        // VALIDACION DE FORMULARIO NUEVA SOLICITUD
        this.$FormNuevaSolicitud.validate({
            rules: {
                nombre_cli: "required",
                tipo_prestamo: "required",
                fecha_recibido: "required",
                tasa_interes: "required",
                monto_dinero: "required",
            },
            messages: {
                nombre_cli: "Por favor, seleccione un nombre de cliente",
                tipo_prestamo: "Por favor, seleccione una linea de tiempo",
                fecha_recibido: "Por favor, digite una fecha recibido del prestamo",
                tasa_interes: "Por favor, digite una tasa de interes del prestamo",
                monto_dinero: "Por favor, digite un monto de dinero",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO NUEVA SOLICITUD MODAL FIADOR
        this.$FormNuevaSolicitudModalFiador.validate({
            rules: {
                nombre_fiador: "required",
                apellido_fiador: "required",
                dui_fiador: "required",
                nit_fiador: "required",
                telefono_fiador: "required",
                email_fiador: { email: true },
                nacimiento_fiador: "required",
                genero_fiador: "required",
                ingreso_fiador: "required",
                direccion_fiador: "required",
            },
            messages: {
                nombre_fiador: "Por favor, escriba el nombre",
                apellido_fiador: "Por favor, escriba el apellido",
                dui_fiador: "Por favor, digite un número de DUI",
                nit_fiador: "Por favor, digite un número de NIT",
                telefono_fiador: "Por favor, digite un número de teléfono",
                email_fiador: "Escriba correctamente el email",
                nacimiento_fiador: "Por favor, digite una fecha de nacimiento",
                genero_fiador: "Por favor, seleccione un genero",
                ingreso_fiador: "Por favor, digite una cantidad de ingreso",
                direccion_fiador: "Por favor, escriba una dirección",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        // VALIDACION DE FORMULARIO NUEVA SOLICITUD MODAL PRENDA
        this.$FormNuevaSolicitudModalPrenda.validate({
            rules: {
                nombre_prenda: "required",
                precio_valorado: "required",
                descripcion_prenda: "required",
            },
            messages: {
                nombre_prenda: "Por favor, escriba el nombre de la prenda",
                precio_valorado: "Por favor, digite el precio de la prenda",
                descripcion_prenda: "Por favor, escriba una descripción de la prenda",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        this.$FormNuevaSolicitudModalHipoteca.validate({
            rules: {
                nombre_hipoteca: "required",
                precio_hipoteca: "required",
                descripcion_hipoteca: "required",
            },
            messages: {
                nombre_hipoteca: "Por favor, escriba el nombre de la hipoteca",
                precio_hipoteca: "Por favor, digite el precio de la hipoteca",
                descripcion_hipoteca: "Por favor, escriba una descripción de la hipoteca",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        this.$FormEditarSolicitudModalHipotecaA.validate({
            rules: {
                nombre_hipoteca: "required",
                precio_hipoteca: "required",
                descripcion_hipoteca: "required",
            },
            messages: {
                nombre_hipoteca: "Por favor, escriba el nombre de la hipoteca",
                precio_hipoteca: "Por favor, digite el precio de la hipoteca",
                descripcion_hipoteca: "Por favor, escriba una descripción de la hipoteca",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        this.$FormEditarSolicitudModalPrenda.validate({
            rules: {
                nombre_prenda: "required",
                precio_valorado: "required",
                descripcion_prenda: "required",
            },
            messages: {
                nombre_prenda: "Por favor, escriba el nombre de la prenda",
                precio_valorado: "Por favor, digite el precio de la prenda",
                descripcion_prenda: "Por favor, escriba una descripción de la prenda",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        // VALIDACION DE FORMULARIO EDITAR SOLICITUD MODAL FIADOR
        this.$FormEditarSolicitudModalFiadorA.validate({
            rules: {
                nombre_fiador: "required",
                apellido_fiador: "required",
                dui_fiador: "required",
                nit_fiador: "required",
                telefono_fiador: "required",
                email_fiador: { email: true },
                nacimiento_fiador: "required",
                genero_fiador: "required",
                ingreso_fiador: "required",
                direccion_fiador: "required",
            },
            messages: {
                nombre_fiador: "Por favor, escriba el nombre",
                apellido_fiador: "Por favor, escriba el apellido",
                dui_fiador: "Por favor, digite un número de DUI",
                nit_fiador: "Por favor, digite un número de NIT",
                telefono_fiador: "Por favor, digite un número de teléfono",
                email_fiador: "Escriba correctamente el email",
                nacimiento_fiador: "Por favor, digite una fecha de nacimiento",
                genero_fiador: "Por favor, seleccione un genero",
                ingreso_fiador: "Por favor, digite una cantidad de ingreso",
                direccion_fiador: "Por favor, escriba una dirección",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        this.$validarFormAprobarCredito.validate({
            rules: {
                codigo_credito: "required",
                tipo_credito: "required",
                fecha_apertura: "required",
            },
            messages: {
                codigo_credito: "Por favor, digite un código",
                tipo_credito: "Por favor, seleccione un crédito",
                fecha_apertura: "Por favor, digite una fecha de apertura",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO GESTION DE SOLICITUD #####################

        //####################### FORMULARIO GESTION DE ACCESO AL SISTEMA #######################
        // VALIDACION DE FORMULARIO NUEVO ACCESO AL SISTEMA
        this.$FormNuevoAccesoSistema.validate({
            rules: {
                tipoAcceso: "required",
            },
            messages: {
                tipoAcceso: "Por favor, escriba un nombre de acceso",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO EDITAR ACCESO AL SISTEMA
        this.$FormEditarAccesoSistema.validate({
            rules: {
                tipoAcceso: "required",
            },
            messages: {
                tipoAcceso: "Por favor, escriba un nombre de acceso",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO GESTION DE ACCESO AL SISTEMA #####################

        //####################### FORMULARIO GESTION DE USUARIO AL SISTEMA #######################
        // VALIDACION DE FORMULARIO NUEVO USUARIO AL SISTEMA
        this.$FormNuevoUsuario.validate({
            rules: {
                cbbEmpleados: "required",
                txtUsuario: {
                    required: true,
                    minlength: 5
                },
                txtpass: {
                    required: true,
                    minlength: 5
                },
                txtConfirmar: {
                    required: true,
                    minlength: 5,
                    equalTo: "#txtpass"
                },
                cbbRol: "required",
            },
            messages: {
                cbbEmpleados: "Por favor, seleccione un empleado",
                txtUsuario: {
                    required: "Por favor, escriba un nombre de usuario",
                    minlength: "Su nombre de usuario debe tener cómo mínimo 5 caracteres"
                },
                txtpass: {
                    required: "Por favor ingrese una contraseña",
                    minlength: "Su contraseña debe tener cómo mínimo 5 digitos"
                },
                txtConfirmar: {
                    required: "Por favor ingrese la misma contraseña",
                    minlength: "Su contraseña debe tener cómo mínimo 5 digitos",
                    equalTo: "Por favor confirmar la misma contraseña"
                },
                cbbRol: "Por favor, seleccione un tipo de acceso",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO EDITAR USUARIO AL SISTEMA
        this.$FormEditarUsuario.validate({
            rules: {
                txtuser: {
                    required: true,
                    minlength: 5
                },
                txtpassword: {
                    required: true,
                    minlength: 5
                },
                txtpassConfirmar: {
                    required: true,
                    minlength: 5,
                    equalTo: "#txtpassword"
                },
            },
            messages: {
                txtuser: {
                    required: "Por favor, escriba un nombre de usuario",
                    minlength: "Su nombre de usuario debe tener cómo mínimo 5 caracteres"
                },
                txtpassword: {
                    required: "Por favor ingrese una contraseña",
                    minlength: "Su contraseña debe tener cómo mínimo 5 digitos"
                },
                txtpassConfirmar: {
                    required: "Por favor ingrese la misma contraseña",
                    minlength: "Su contraseña debe tener cómo mínimo 5 digitos",
                    equalTo: "Por favor confirmar la misma contraseña"
                },
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO GESTION DE USUARIO AL SISTEMA #####################


        //####################### FORMULARIO GESTION DE EMPLEADOS AL SISTEMA #######################
        // VALIDACION DE FORMULARIO NUEVO EMPLEADO AL SISTEMA
        this.$FormNuevoEmpleado.validate({
            rules: {
                txtNombre: "required",
                txtApellido: "required",
                txtFechaNacimiento: "required",
                cboGenero: "required",
                txtDui: "required",
                txtCargo: "required",
                txtTelefono: "required",
                txtEmail: { email: true },
                txtDireccion: "required",
            },
            messages: {
                txtNombre: "Por favor, escriba el nombre del empleado",
                txtApellido: "Por favor, escriba el apellido del empleado",
                txtFechaNacimiento: "Por favor, digite la fecha de nacimiento del empleado",
                cboGenero: "Por favor, seleccione un genero del empleado",
                txtDui: "Por favor, digite el número de dui del empleado",
                txtCargo: "Por favor, escriba el cargo del empleado",
                txtTelefono: "Por favor, digite el número de teléfono del empleado",
                txtEmail: "Por favor, escriba el email del empleado correctamente",
                txtDireccion: "Por favor, escriba la dirección del empleado",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO EDITAR EMPLEADO AL SISTEMA
        this.$FormEditarEmpleado.validate({
            rules: {
                txtNombre: "required",
                txtApellido: "required",
                txtFechaNacimiento: "required",
                cboGenero: "required",
                txtDui: "required",
                txtCargo: "required",
                txtTelefono: "required",
                txtEmail: { email: true },
                txtDireccion: "required",
            },
            messages: {
                txtNombre: "Por favor, escriba el nombre del empleado",
                txtApellido: "Por favor, escriba el apellido del empleado",
                txtFechaNacimiento: "Por favor, digite la fecha de nacimiento del empleado",
                cboGenero: "Por favor, seleccione un genero del empleado",
                txtDui: "Por favor, digite el número de dui del empleado",
                txtCargo: "Por favor, escriba el cargo del empleado",
                txtTelefono: "Por favor, digite el número de teléfono del empleado",
                txtEmail: "Por favor, escriba el email del empleado correctamente",
                txtDireccion: "Por favor, escriba la dirección del empleado",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO GESTION DE EMPLEADOS AL SISTEMA #####################

        //####################### FORMULARIO GESTION DE EMPRESA #######################
        // VALIDACION DE FORMULARIO EMPRESA
        this.$FormEmpresa.validate({
            rules: {
                nombre_empresa: "required",
                telefono_empresa: "required",
                nrc_empresa: "required",
                correo_empresa: { email: true },
                giro_empresa: "required",
                direccion_empresa: "required",
            },
            messages: {
                nombre_empresa: "Por favor, escriba el nombre de la empresa",
                telefono_empresa: "Por favor, digite el número de teléfono de la empresa",
                nrc_empresa: "Por favor, digite el NRC de la empresa",
                correo_empresa: "Por favor, escriba el email de la empresa correctamente",
                giro_empresa: "Por favor, seleccione un giro de la empresa",
                direccion_empresa: "Por favor, escriba una dirección de la empresa",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO GESTION DE EMPRESA #####################

        //####################### FORMULARIO GESTION DE PROVEEDOR #######################
        // VALIDACION DE FORMULARIO NUEVO PROVEEDOR
        this.$FormNuevoProveedor.validate({
            rules: {
                nombre_proveedor: "required",
                nombre_empresa: "required",
                rubro_empresa: "required",
                telefono_empresa: "required",
                correo_empresa: { email: true },
                direccion_empresa: "required",
                descripcion_empresa: "required",
            },
            messages: {
                nombre_proveedor: "Por favor, escriba el nombre del proveedor",
                nombre_empresa: "Por favor, escriba el nombre de la empresa",
                rubro_empresa: "Por favor, seleccione un rubro de la empresa",
                telefono_empresa: "Por favor, digite el número de teléfono de la empresa",
                correo_empresa: "Por favor, escriba el email de la empresa correctamente",
                direccion_empresa: "Por favor, escriba una dirección de la empresa",
                descripcion_empresa: "Por favor, escriba una descripción de la empresa",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO EDITAR PROVEEDOR
        this.$FormEditarProveedor.validate({
            rules: {
                nombre_proveedor: "required",
                nombre_empresa: "required",
                telefono_empresa: "required",
                correo_empresa: { email: true },
                direccion_empresa: "required",
                descripcion_empresa: "required",
            },
            messages: {
                nombre_proveedor: "Por favor, escriba el nombre del proveedor",
                nombre_empresa: "Por favor, escriba el nombre de la empresa",
                telefono_empresa: "Por favor, digite el número de teléfono de la empresa",
                correo_empresa: "Por favor, escriba el email de la empresa correctamente",
                direccion_empresa: "Por favor, escriba una dirección de la empresa",
                descripcion_empresa: "Por favor, escriba una descripción de la empresa",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO GESTION DE PROVEEDOR #####################

        //####################### FORMULARIO GESTION DE PAGOS #######################
        // VALIDACION DE FORMULARIO PAGOS
        this.$FormPago.validate({
            rules: {
                idCredito: "required",
                fechaPago: "required",
                totalPago: "required",
            },
            messages: {
                idCredito: "Por favor, seleccione un crédito",
                fechaPago: "Por favor, digite una fecha de pago",
                totalPago: "Por favor, digite un pago",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO GESTION DE PAGOS #####################

        //####################### FORMULARIO CAJA CHICA #######################
        // VALIDACION DE FORMULARIO APERTURAR CAJA
        this.$FormAperturarCaja.validate({
            rules: {
                fecha_apertura: "required",
                cantidad_apertura: "required",
            },
            messages: {
                fecha_apertura: "Por favor, digite una fecha de apertura",
                cantidad_apertura: "Por favor, digite una cantidad",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });

        // VALIDACION DE FORMULARIO APERTURAR CAJA2
        this.$FormAperturarCaja2.validate({
            rules: {
                cantidad_dinero: "required",
                tipo_proceso: "required",
                forma_pago: "required",
                detalle_proceso: "required",
            },
            messages: {
                cantidad_dinero: "Por favor, digite una cantidad de dinero",
                tipo_proceso: "Por favor, seleccione un tipo de proceso",
                forma_pago: "Por favor, seleccione una forma de pago",
                detalle_proceso: "Por favor, escriba un detalle del proceso",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO CAJA CHICA #####################

        //####################### FORMULARIO DE NUEVO PERMISO #######################
        // VALIDACION DE FORMULARIO NUEVO PERMISO
        this.$FormNuevoPermiso.validate({
            rules: {
                idPermiso: "required",
            },
            messages: {
                idPermiso: "Por favor, seleccione un tipo de acceso para el permiso",
            },
            highlight: function(element) { $(element).closest('.form-group').addClass('has-error'); },
            unhighlight: function(element) { $(element).closest('.form-group').removeClass('has-error'); }
        });
        //##################### FIN FORMULARIO DE NUEVO PERMISO #####################

    },
    //init
    $.FormValidator = new FormValidator, $.FormValidator.Constructor = FormValidator
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.FormValidator.init()
}(window.jQuery);