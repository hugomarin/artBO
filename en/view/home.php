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
				  <dd><a href="#simple1" class="active" title="Inicio de sesi&oacute;n">Login</a></dd>
				  <dd><a href="#simple2" title="Registrarse">Register</a></dd>
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
					    	<legend>Login</legend>
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Email</label>
					        	<input type="text" class="expand input-text email" name="user_email" title="Email" required="required">
					    	</div>
					    	
					    
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Password</label>
					    		<input type="password" class="expand input-text" name="user_password" title="Password">
					    	</div>
					    	
					    
					    	<!--  Input Button & Recuperar Contrase&ntilde;a-->
					    		<input type="submit" class="button round" title="Login" value="Login">
					    		<a href="<?php echo APPLICATION_URL?>login-recuperar-contrasena-0110.html" title="Forgot your password?">Forgot your password?</a>	
					    	<!--  END Input Button & Recuperar Contrase&ntilde;a-->		
					   
					</form>
					<!-- END login form -->
						</div>  <!-- End Panel -->
				  </li>
				  <!-- END login -->
				  
				  
				  <li id="simple2Tab">
				  	<div class="panel">
				  	<!-- <h3>Registrarse</h3> -->
					<!-- register form -->
					<form  action="<?php echo APPLICATION_URL?>user.controller/create.html"  method="post" class="nice" id="validable"> 
					  	
					    	<legend>Sign In</legend>
					    						    
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Email</label>
					        	<input type="mail" name="user_email" class="expand input-text email" title="Email" required="required">
					    	</div>
					    	
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Confirm Email</label>
					        	<input type="mail" name="user_email_confirm" class="expand input-text retype" alt="email" title="Email" required="required">
					    	</div>
					    
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Password</label>
					    		<input type="password" name="user_password" class="expand input-text" title="Password" required="required">
					    	</div>
					    	
					    	<div class="mid-input-div"><!-- Div Input -->
					    		<label>Confirm password</label>
					    		<input type="password" name="user_password_confirm" class="expand input-text retype" alt="password" title="Confirm Password" required="required">
					    	</div>
					    
					    	<!--  Input Button -->
					    		<input type="submit" class="button round" value="Register" title="Register" onClick="javascript:void(0);">
					    	
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

