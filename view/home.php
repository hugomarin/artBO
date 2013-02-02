<?php 
include_once('header-nologin.php'); 
$error = '';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Un usuario ya ha sido registrado con estos datos.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Hay un error en los datos suministrados.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';

?>
<!-- content -->
<div class="container superior">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			
			
			<!-- Login register -->
				<dl class="tabs">
				  <dd><a href="#simple1" class="active" title="Inicio de sesi&oacute;n">Inicio de sesi&oacute;n</a></dd>
				  <dd><a href="#simple2" title="Registrarse">Registrarse</a></dd>
				</dl>
			<!-- END Login register -->	
				
				
				<ul class="tabs-content">
				  <!-- login -->
				  <li class="active" id="simple1Tab">
				  	<div class="panel"><!-- Panel -->
				  	<!-- <h3>Inicio de sesi&oacute;n</h3> -->
					<!-- login form -->
                    <?php echo $error;?>
					<form action="<?php echo APPLICATION_URL?>user.controller/login.html"  method="post" class="nice"> 
					    	<hr />
					    	<legend>Iniciar sesi&oacute;n</legend>
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Correo electr&oacute;nico</label>
					        	<input type="mail" class="expand input-text email" name="user_email" title="Correo electr&oacute;nico" required="required">
					    	</div>
					    	
					    
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Contrase&ntilde;a</label>
					    		<input type="password" class="expand input-text" name="user_password" title="Contrase&ntilde;a" required="required">
					    	</div>
					    	
					    
					    	<!--  Input Button & Recuperar Contrase&ntilde;a-->
					    		<input type="submit" class="button round" title="Ingresar" value="Ingresar">
					    		<a href="<?php echo APPLICATION_URL?>login-recuperar-contrasena-0110.html" title="Restablecer contraseña">Olvido su contraseña?</a>	
					    	<!--  END Input Button & Recuperar Contrase&ntilde;a-->		
					   
					</form>
					<!-- END login form -->
						</div>  <!-- End Panel -->
				  </li>
				  <!-- END login -->
				  
				  
				  <li id="simple2Tab">
				  	<div class="panel">
				  	
					<!-- register form -->
					<form  action="<?php echo APPLICATION_URL?>user.controller/create.html"  method="post" class="nice" id="validable"> 
					  	
					    	<legend>Registrarse</legend>
					    						    
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Correo electr&oacute;nico</label>
					        	<input type="mail" name="user_email" class="expand input-text email" title="Correo electr&oacute;nico">
					    	</div>
					    	
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Confirmar correo electr&oacute;nico</label>
					        	<input type="mail" name="user_email_confirm" class="expand input-text retype" alt="email" title="Correo electr&oacute;nico (repetir)">
					    	</div>
					    
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Contrase&ntilde;a</label>
					    		<input type="password" name="user_password" class="expand input-text" title="Contrase&ntilde;a">
					    	</div>
					    	
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Confirmar contrase&ntilde;a</label>
					    		<input type="password" name="user_password_confirm" class="expand input-text retype" alt="password" title="Contrase&ntilde;a (repetir)">
					    	</div>
					    
					    	<!--  Input Button -->
					    		<input type="submit" class="button round" value="Registrarse" title="Registrarse" onClick="javascript:void(0);">
					    	
					    	<!--  END Input Button -->		
						
					</form>
					<!-- END register form -->
					</div><!-- panel -->
				  </li>
				 
				</ul>
				
		
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

