<?php 
include_once('header-nologin2.php'); 
$error = '';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Un usuario ya ha sido registrado con estos datos.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Hay un error en los datos suministrados.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';

?>

<body>
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<span class="artBO">Artbo</span><span class="ccB">CCB</span>
			<?php echo $error;?>
			<form action="<?php echo APPLICATION_URL?>user.controller/create.html" method="post" id="validable">
				<div class="panel">
					<h3>Registro</h3>
					<p>Si nunca te haz registrado en artBO, incluida la última versión.<br />
					Ya te registráste en artBO, haz clic <a class="underline" href="login.html">aquí.</a></p>
				
					<label for="name"><span class="asterix">*</span>Nombre</label>
					<input type="text" name="user_name" title="Digite su(s) nombre(s)"/>
					<label for="name"><span class="asterix">*</span>Apellido</label>
					<input type="text" name="userlast_name" title="Digite su(s) apellido(s)"/>
					<label for="name"><span class="asterix">*</span>Nombre de la Galeria</label>
					<input type="text" name="gallery_name" title="Digite el nombre de la galería"/>
					<label for="name"><span class="asterix">*</span>Correo Electronico</label>
					<input type="email" name="user_email"  title="Digite el correo electrónico"/>
					<label for="name"><span class="asterix">*</span>Confirmación correo Electronico</label>
					<input type="email" name="user_email_confirm"  alt="email" title="Confirme el correo electrónico digitado"/>
					<label for="name"><span class="asterix">*</span>Clave</label>
					<input type="password" name="user_password" title="Digite su contraseña"/>
					<label for="name"><span class="asterix">*</span>Confirmación Clave</label>
					<input type="password" name="user_password_confirm" alt="Confirme la clave digitada" title="Contrase&ntilde;a (repetir)"/>
				</div>
				<div class="row">
					<div class="six columns"><span class="whitetxt bold"><span class="asterix">*</span> Datos requeridos</span></div>
					<div class="six columns"><input type="submit" class="button radius right" value="Registrarse" title="Registrarse" onClick="javascript:void(0);"></div>
				</div>
			</form>
			<br />
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>
