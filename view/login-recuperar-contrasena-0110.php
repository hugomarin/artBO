
<?php include_once('header-nologin.php'); ?>
<!-- content -->
<div class="container superior">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<div class="panel"><!-- Panel -->
			
				<h3>Restablecer contraseña</h3>
				<!-- login form -->
				<form action="<?php echo APPLICATION_URL?>user.controller/recover_password.html" class="nice" method="post" id="validable"> 
				    	
						<p>Introduce el correo electrónico que utilizas para tu cuenta de artBO y te enviaremos un enlace para restablecer tu contraseña.</p>
				    	
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
				    	<!-- END  casilla de alerta -->
				    
				    	<div class="mid-input-div"><!-- Div Input -->
				    		<label>Correo electrónico</label>
				        	<input type="text" class="expand input-text" name="user_email" title="Digite el correo electrónico">
				    	</div>
				    
				    	<!--  Input Button & Recuperar Contrase&ntilde;a-->
				    		<input type="submit" class="button radius" value="Restablecer clave">
				    		<a href="<?php echo APPLICATION_URL?>home.html" title="Volver al inicio">Volver al inicio</a>	
				    	<!--  END Input Button & Recuperar Contrase&ntilde;a-->		
				</form>
				<!-- END login form -->
				    			
	
			</div>  <!-- End Panel -->
								
		</div><!-- six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

