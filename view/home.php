<?php 
include_once('header-nologin2.php'); 
$error = '';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Un usuario ya ha sido registrado con estos datos.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Hay un error en los datos suministrados.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
?>

<body style="background-color:#000" class="bigpic1">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="eight columns centered"><!-- six columns -->
		<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<span class="artBO">artBO</span><span class="ccB">CCB</span>
			<header class="intro">
				<h2>Proceso de aplicación a artBO 2013</h2>
				<h5>Abierto hasta el 30 de abril. Esta aplicación es para galerías nacionales e internacionales constituidas legalmente.</h5>
			</header>
			<div class="options">
				<div class="login">
					<h3>Inicio de sesión</h3>
					<h5>Si ya se registró para artBO 2012 o artBO 2013.</h5>
					<a href="<?php echo APPLICATION_URL?>login.html" class="button radius">Inicio de sesión</a>
				</div>
				<div class="register">
					<h3>Registro</h3>
					<h5>Si nunca se ha registrado en artBO.</h5>
					<a href="<?php echo APPLICATION_URL?>register.html" class="button radius">Registrarse</a>
				</div>
			</div>
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			

<?php include_once('randomizer.php'); ?>
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->