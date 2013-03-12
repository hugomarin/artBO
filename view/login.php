<?php 
include_once('header-nologin2.php'); 
if (isset($_GET[0]))
	$error	= '<div class="alert-box error" id="alert">Sus datos no coinciden.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';

?>

<body class="bigpic3">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
		<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<span class="artBO">artBO</span><span class="ccB">CCB</span>
			<form action="<?php echo APPLICATION_URL?>user.controller/login.html"  method="post">
				<div class="panel radius">
					<h3>Inicio de Sesión</h3>
					 <p>Si nunca se ha registrado en artBO, incluida la última versión, 
					haga clic <a class="underline" href="<?php echo APPLICATION_URL?>register.html">aquí.</a></p>
					<?php if (isset($error)) echo $error;?>
					<label for="name">Correo electrónico</label>
					<input type="email"  name="user_email" title="Digite el correo electrónico" required="required"/>
					<label for="name">Clave</label>
					<input type="password" name="user_password" title="Digite su clave" required="required"/>
				</div>
				<div class="row">
					<div class="six columns"><a href="<?php echo APPLICATION_URL?>login-recuperar-contrasena-0110.html" title="Haga clic aquí para recordar su clave" class="whitetxt bold">&iquest;Olvidó su clave?</a></div>
					<div class="six columns"><input type="submit" class="button radius right" title="Haga clic aquí para iniciar sesión" value="Inicio de sesión"></div>
				</div>
			</form>
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>