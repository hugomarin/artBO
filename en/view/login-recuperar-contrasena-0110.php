<?php 
include_once('header-nologin2.php'); 
?>

<body class="bigpic4">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
		<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<!-- casilla de alerta -->
	        <?php
			if (isset($_GET[0]))
			{
			?>
	            <div class="alert-box error">
	                Nuestro sistema no tiene registro del correo electrónico.<a href="" class="close">&times;</a>
	            </div>
	        <?php
			}
			?>
			<form action="<?php echo APPLICATION_URL?>user.controller/recover_password.html" class="nice" method="post" id="validable">
				<div class="panel"><!-- Panel -->
					<h3>Reset password</h3>
					<p>Introduzca el correo electrónico que utiliza para su cuenta de artBO y le enviaremos un enlace para restablecer su clave.</p>
			    	<div class="mid-input-div"><!-- Div Input -->
			    		<label>Email</label>
			        	<input type="email" class="expand input-text" name="user_email" title="Digite el correo electrónico" required="required">
			    	</div>
				</div>
				<div class="row">
					<div class="six columns"><a class="whitetxt bold" href="<?php echo APPLICATION_URL?>login.html" title="Volver al inicio">Volver al inicio</a></div>
					<div class="six columns"><input type="submit" class="button radius right" value="Reset password"></div>
				</div>
			</form>
		</div><!-- six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>