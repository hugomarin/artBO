
<?php
include_once('header-nologin2.php'); 
$email = urldecode($_GET[0]);
?>

<body class="bicpic5">		
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<div class="alert-box success">
				Email has been sent
				<a href="#" class="close">&times;</a>
			</div>
			<div class="panel">
				<h3>Reset password</h3>
				<p>
				We have sent you an email at <a class="bold" href="mailto:<?php echo $email?>"><?php echo $email?> </a> with instructions. Please check your spam folder if you cannot find it.</p>
				<p>Click <a href="<?php echo APPLICATION_URL?>login-recuperar-contrasena-0110.html" title="Reset password"><strong>here</strong></a> to be sent another email.</p>
			</div>
			<div class="row">
				<div class="eight columns"></div>
				<div class="four columns"><a class="button radius right" href="<?php echo APPLICATION_URL?>login.html" title="Login">Login</a></div>
			</div>
		</div>
	</div>
</div>	
			
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>