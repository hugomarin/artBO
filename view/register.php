<?php 
include_once('header-nologin2.php'); 
$error = '';
if ((isset($_GET[0])) && ($_GET[0] == 'norecord'))
	$error	= '<div class="alert-box error" id="alert">Estimado usuario lo invitamos a que lleve a cabo su registro.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
else
{
	if ((isset($_GET[0])) && ($_GET[1] == 0))
		$error	= '<div class="alert-box error" id="alert">Un usuario ya ha sido registrado con estos datos.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
	if ((isset($_GET[0])) && ($_GET[1] == 1))
		$error	= '<div class="alert-box error" id="alert">Hay un error en los datos suministrados.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
}

?>

<body class="bigpic2">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
		<div class="languages"><span class="label round"><a href="<?php echo APPLICATION_URL?>en/register.html">English</a> | Español</span></div>
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<?php echo $error;?>
			<form action="<?php echo APPLICATION_URL?>user.controller/create.html" method="post" id="validable">
				<div class="panel">
					<h3>Registro</h3>
					<!-- <p>Si nunca te haz registrado en artBO, incluida la última versión.<br />
					Ya te registráste en artBO, haz clic <a class="underline" href="login.html">aquí.</a></p> -->
				
					<label for="name"><span class="asterix">*</span>Nombre de la galería</label>
					<input type="text" name="gallery_name" title="Digite el nombre de la galería"/>
					<label for="name"><span class="asterix">*</span>Nombre</label>
					<input type="text" name="user_name" title="Digite su(s) nombre(s)"/>
					<label for="name"><span class="asterix">*</span>Apellido</label>
					<input type="text" name="userlast_name" title="Digite su(s) apellido(s)"/>
					<label for="name"><span class="asterix">*</span>Correo electrónico</label>
					<input type="email" name="user_email"  title="Digite el correo electrónico"/>
					<label for="name"><span class="asterix">*</span>Confirmar correo electrónico</label>
					<input type="email" name="user_email_confirm"  alt="email" title="Confirme el correo electrónico digitado"/>
					<label for="name"><span class="asterix">*</span>Clave</label>
					<input type="password" name="user_password" title="Digite su clave"/>
					<label for="name"><span class="asterix">*</span>Confirmar clave</label>
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
