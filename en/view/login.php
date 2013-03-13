<?php 
include_once('header-nologin2.php'); 
if (isset($_GET[0]))
	$error	= '<div class="alert-box error" id="alert">Data does not match.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';

?>

<body class="bigpic3">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
		<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<form action="<?php echo APPLICATION_URL?>user.controller/login.html"  method="post">
				<div class="panel radius">
					<h3>Login</h3>
					 <p>If you have never registered in artBO, including the latest version,
					 click <a class="underline" href="<?php echo APPLICATION_URL?>register.html">here.</a></p>
					<?php if (isset($error)) echo $error;?>
					<label for="name">Email</label>
					<input type="email"  name="user_email" title="Enter your email" required="required"/>
					<label for="name">Password</label>
					<input type="password" name="user_password" title="Enter your password" required="required"/>
				</div>
				<div class="row">
					<div class="six columns"><a href="<?php echo APPLICATION_URL?>login-recuperar-contrasena-0110.html" title="Click here to start your session" class="whitetxt bold">&iquest;Forgot your password?</a></div>
					<div class="six columns"><input type="submit" class="button radius right" title="Haga clic aquí para iniciar sesión" value="Login"></div>
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