<!-- Script para mensaje de error Login -->
<?php if($this->session->flashdata("error")){?>
    <script type="text/javascript">
      $(document).ready(function(){
        $.Notification.autoHideNotify('error', 'top right', 'Aviso!', '<?php echo $this->session->flashdata("error")?>');
      });
    </script>
  <?php } ?>
<!-- fin script -->
        <div class="limiter">
           <!-- <div class="container-login100"> -->
                <!-- Top Bar Start -->
                <div class="topbar">
                    <!-- LOGO -->
                    <div class="topbar-left">
                        <div class="text-center">
                           <span class="margin-logo">
                           <a href="#" class="logo"><i><img src="<?= base_url() ?>plantilla/images/fc_logo.png" width="48" alt="Logo"></i> <span><img src="<?= base_url() ?>plantilla/images/fast_cash.png" width="120" alt="Logo"></span></a>
                            </span>
                        </div>
                    </div>
                    <div class="navbar navbar-default" role="navigation">
                        <div class="container">
                        </div>
                    </div>
                </div>

                <!-- Top Bar End -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-color panel-primary panel-pages bord">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div align="center" class="mar-logo-login js-tilt"> 
                                            <img src="<?= base_url() ?>plantilla/images/original.png" class="img-responsive img-thumbnail imgwrapper" alt="Logo">
                                            <h4 id="messageLabel"></h4>
                                        </div> 
                                    </div>
                                    <div class="col-sm-6 bordr-right">
                                        <form action="<?= base_url() ?>Home/validarLogin" method="post" autocomplete="off">

                                            <h3 class="h3-title-login"> <label class="label-title-login">Iniciar sesión</label> </h3>

                                            <div class="row m-t-40">
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img src="<?= base_url()?>plantilla/images/bloquear1.png"></span>
                                                            <input class="form-control input-lg" type="text" name="user" id="user" required="" placeholder="Usuario">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><img src="<?= base_url()?>plantilla/images/bloquear.png"></span>
                                                            <input class="form-control input-lg" type="password" name="pass" id="pass" required="" placeholder="Contraseña">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group text-center m-t-30">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-default btn-lg w-lg waves-effect waves-light" type="submit"><img src="<?= base_url()?>plantilla/images/entrar.png"><b> ENTRAR</b></button>
                                                </div>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>                                 
                            <img src="<?= base_url() ?>plantilla/images/pie.png" class="img-responsive pie-login" alt="Logo">
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            <!-- </div> -->
        </div>
            <!-- </div> -->

<script type="text/javascript">
    // mensaje de bienvenida login
var message = "GOCAJAA GROUP, S.A.DE C.V.";
var msgCount = 0;
var blinkCount = 0;
var blinkFlg = 0;
var timer1, timer2;
var messageLabel = document.getElementById("messageLabel");

function textFun() {
   messageLabel.innerHTML = message.substring(0, msgCount);
   
   if (msgCount == message.length) {
      // Stop Timer
      clearInterval(timer1);
      
      // Start blinking animation!
      timer2 = setInterval("blinkFun()", 200);
      
   } else {
      msgCount++;
   }
}

function blinkFun() {
   
   // Blink 5 times
   if (blinkCount < 3) {
      if(blinkFlg == 0) {
         messageLabel.innerHTML = message;
         blinkFlg = 1;
         blinkCount++;
      } else {
         messageLabel.innerHTML = "";
         blinkFlg = 0;
      }
   } else {
      // Stop Timer
      clearInterval(timer2);
      
   }
}
timer1 = setInterval("textFun()", 150); // Every 150 milliseconds

</script>