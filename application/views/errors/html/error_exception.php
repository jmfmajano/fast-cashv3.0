
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Desarrollo de sistemas.">
        <meta name="author" content="jireh">

        <title>FAST CASH</title>
<style type="text/css">
/* vietnamese */
@font-face {
  font-family: 'Inconsolata';
  font-style: normal;
  font-weight: 400;
  src: local('Inconsolata Regular'), local('Inconsolata-Regular'), url(https://fonts.gstatic.com/s/inconsolata/v16/QldKNThLqRwH-OJ1UHjlKGlW5qhWxg.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Inconsolata';
  font-style: normal;
  font-weight: 400;
  src: local('Inconsolata Regular'), local('Inconsolata-Regular'), url(https://fonts.gstatic.com/s/inconsolata/v16/QldKNThLqRwH-OJ1UHjlKGlX5qhWxg.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Inconsolata';
  font-style: normal;
  font-weight: 400;
  src: local('Inconsolata Regular'), local('Inconsolata-Regular'), url(https://fonts.gstatic.com/s/inconsolata/v16/QldKNThLqRwH-OJ1UHjlKGlZ5qg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

html {
  min-height: 100%;
}

body {
  overflow-x:hidden;
  box-sizing: border-box;
  height: 100%;
  background-color: #000000;
  background-image: radial-gradient(#11581E, #041607);
  font-family: 'Inconsolata', Helvetica, sans-serif;
  font-size: 1.0rem;
  color: rgba(128, 255, 128, 0.8);
  text-shadow:
      0 0 1ex rgba(51, 255, 51, 1),
      0 0 2px rgba(255, 255, 255, 0.8);
}
@media(max-width: 678px){
	body {
        overflow-x:scroll;
    }
}

body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 0px;
    background-color: rgba(128, 255, 128, 0.8);
}
body::-webkit-scrollbar {
    width: 8px;
    background-color: rgba(128, 255, 128, 0.8);
}
body::-webkit-scrollbar-thumb {
    border-radius: 20px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color:#616A6B;
}

.terminal {
  box-sizing: inherit;
  /*position: absolute;*/
  height: auto;
  width: auto;
  /*max-width: 100%;*/
  padding: 4rem;
  text-transform: uppercase;
}
@media(max-width: 678px){
	.terminal {
	  padding: 0rem;
	}
}
.output {
  color: rgba(128, 255, 128, 0.8);
  text-shadow:
      0 0 1px rgba(51, 255, 51, 0.4),
      0 0 2px rgba(255, 255, 255, 0.8);
}

.output::before {
  content: "> ";
}

.enla {
  color: #fff;
  text-decoration: none;
}
.errorcode {
  color: white;
}
</style>
</head>
<body>
<!-- <div class="overlay"></div> -->
<div class="terminal">
  <h1><span class="errorcode">Se encontró una excepción no detectada.</span></h1>
    <p class="output"><font class="enla">Type:</font> <?php echo get_class($exception); ?></p>
	<p class="output"><font class="enla">Message:</font> <?php echo $message; ?></p>
	<p class="output"><font class="enla">Filename:</font> <?php echo $exception->getFile(); ?></p>
	<p class="output"><font class="enla">Line Number:</font> <?php echo $exception->getLine(); ?></p>

  <?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
  <h1><span class="errorcode">Backtrace:</span></h1>
	   <?php foreach ($exception->getTrace() as $error): ?>
			<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

				<p class="output"><font class="enla">File:</font> <?php echo $error['file']; ?></p>
				<p class="output"><font class="enla">Line:</font> <?php echo $error['line']; ?></p>
				<p class="output"><font class="enla">Function:</font> <?php echo $error['function']; ?></p>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
</div>
</body>
</html>