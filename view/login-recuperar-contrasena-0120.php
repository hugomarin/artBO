
<?php include_once('header-nologin.php'); 
$email = urldecode($_GET[0]);
?>

		
<!-- content -->
<div class="container superior">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
		<div class="panel"><!-- Panel -->
			<h3>Restablecer contraseña</h3>
			    	
			    	<div class="alert-box success">
						Correo enviado con &eacute;xito
						<a href="" class="close">&times;</a>
					</div>
					
					<p>Hemos enviado un correo a <a href="mailto:<?php echo $email?>"><?php echo $email?> </a> con instrucciones. Recuerda revisar en tu carpeta de <strong>Spam</strong> si no lo encuentras.<br /><br />  En todo caso puedes <a href="<?php echo APPLICATION_URL?>login-recuperar-contrasena-0110.html" title="Restablecer contraseña">enviarlo nuevamente.</a></p>

			</div>  <!-- End Panel -->
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

