<?php 
include_once('header-nologin2.php'); 
$error = '';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Un usuario ya ha sido registrado con estos datos.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Hay un error en los datos suministrados.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
?>

<body style="background-color:#000" class="bigpic1">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	 
		<div class="eight columns centered"><!-- six columns -->
		<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<header class="intro">
				<h2>Application Process artBO 2013</h2>
				<h5>Open until April 30th. This application is for galleries that are legally constituted.</h5>
			</header> 
			<div class="options">
				<div class="login">
					<h3>Login</h3>
					<h5>If you registered in artBO 2012 or artBO 2013.</h5>
					<a href="<?php echo APPLICATION_URL?>login.html" class="button radius">Login</a>
				</div>
				<div class="register">
					<h3>Register</h3>
					<h5>If you have never registered in artBO.</h5>
					<a href="<?php echo APPLICATION_URL?>register.html" class="button radius">Register</a>
				</div>
			</div>
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			

<?php include_once('randomizer.php'); ?>
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
