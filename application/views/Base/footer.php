
        </div>
    	<!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?= base_url() ?>plantilla/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>plantilla/js/waves.js"></script>
        <script src="<?= base_url() ?>plantilla/js/wow.min.js"></script>
        <script src="<?= base_url() ?>plantilla/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>plantilla/js/jquery.scrollTo.min.js"></script>

        <script src="<?= base_url() ?>plantilla/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/jquery-detectmobile/detect.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/fastclick/fastclick.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/jquery-blockui/jquery.blockUI.js"></script>

        <!-- sweet alerts -->
        <script src="<?= base_url() ?>plantilla/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/sweet-alert/sweet-alert.init.js"></script>

        <!-- Counter-up -->
        <script src="<?= base_url() ?>plantilla/assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>plantilla/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- Modal-Effect -->
        <script src="<?= base_url() ?>plantilla/assets/modal-effect/js/classie.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/modal-effect/js/modalEffects.js"></script>

        <!-- Notifications -->
        <script src="<?= base_url() ?>plantilla/assets/notifications/notify.min.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/notifications/notify-metro.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/notifications/notifications.js"></script>
        
        <!-- CUSTOM JS -->
        <script src="<?= base_url() ?>plantilla/js/jquery.app.js"></script>
        <!-- Calendario -->
        <script src="<?= base_url() ?>plantilla/assets/timepicker/bootstrap-datepicker.js"></script>
        <!-- SELECT -->
        <script src="<?= base_url() ?>plantilla/assets/select2/select2.min.js" type="text/javascript"></script>
        <!-- Mascaras -->
        <script src="<?= base_url() ?>plantilla/assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <!--Dropzone-->
        <script src="<?= base_url() ?>plantilla/js/dropzone.js"></script>

        <!--form validation-->
        <script src="<?= base_url() ?>plantilla/assets/jquery.validate/jquery.validate.min.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/jquery.validate/form-validation-init.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/jquery.validate/parsley.min.js"></script>

        <!-- Data table -->
        <script src="<?= base_url() ?>plantilla/assets/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>plantilla/assets/datatables/dataTables.bootstrap.js"></script>
        <script src="<?= base_url() ?>plantilla/js/tilt.jquery.min.js"></script>

        <footer class="footer text-right">
           Copyright © <?php echo date('Y');?> <font color="#0080FF">JIREH</font>.
        </footer>
    </body>
</html>


<!-- SCRIPT CALENDARIO -->
<script>
    jQuery('.js-tilt').tilt({
        scale: 1.0
    });

    jQuery(document).ready(function() {

        // $('#datatable').dataTable();
        $('#datatable').dataTable( 
        // {
            // "ordering": false,
            // "order": [[ 0,'desc' ]]
                // "aaSorting": [[ 0, "desc" ]],
                // "order": [
                    // [0, "desc"]
                // ],
        // } 
        );

        jQuery('.counter').counterUp({
            delay: 100,
            time: 1200
        });

        jQuery(".validaTel").keypress( function (e){
          telefo = (document.all) ? e.keyCode : e.which;
          telefo = String.fromCharCode(telefo)
          return /^[0-9\()\-\+]+$/.test(telefo);
        });

        jQuery(".validaDigit").keypress( function (e){
          digits = (document.all) ? e.keyCode : e.which;
          digits = String.fromCharCode(digits)
          return /^[0-9\.]+$/.test(digits);
        });

        !function(a){a.fn.datepicker.dates.es={
              days:["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"],
              daysShort:["Dom","Lun","Mar","Mie","Jue","Vie","Sab","Dom"],
              daysMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa","Do"],
              months:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
              monthsShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
              today:"Hoy",
              clear:"Borrar",
              weekStart:1,
              format:"yyyy/mm/dd"
              }
        }(jQuery);

        // Date Picker
        jQuery('.DateTime').datepicker({
              format: 'yyyy/mm/dd',
              todayHighlight: true,
              autoclose: true,
              language: 'es',
              orientation: 'auto top'
        });

        // Select2
        jQuery(".select").select2({
            width: '100%'
        });
    });
</script>