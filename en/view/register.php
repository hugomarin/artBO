<?php 
include_once('header-nologin2.php'); 
$error = '';
if ((isset($_GET[0])) && ($_GET[0] == 'norecord'))
	$error	= '<div class="alert-box error" id="alert">Estimado usuario lo invitamos a que lleve a cabo su registro.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
else
{
	if ((isset($_GET[0])) && ($_GET[1] == 0))
		$error	= '<div class="alert-box error" id="alert">Another user has already been registered with this information.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
	if ((isset($_GET[0])) && ($_GET[1] == 1))
		$error	= '<div class="alert-box error" id="alert">There is an error in the information you entered.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
}

?>

<body class="bigpic2">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<?php echo $error;?>
			<form action="<?php echo APPLICATION_URL?>user.controller/create.html" method="post" id="validable">
				<div class="panel">
					<h3>Register</h3>
					<!-- <p>Si nunca te haz registrado en artBO, incluida la última versión.<br />
					Ya te registráste en artBO, haz clic <a class="underline" href="login.html">aquí.</a></p> -->
				
					<label for="name"><span class="asterix">*</span>Gallery</label>
					<input type="text" name="gallery_name" title="Enter the gallery name"/>
					<label for="name"><span class="asterix">*</span>Name</label>
					<input type="text" name="user_name" title="Enter your name(s)"/>
					<label for="name"><span class="asterix">*</span>Last name</label>
					<input type="text" name="userlast_name" title="Enter your last name(s)"/>
					<label for="name"><span class="asterix">*</span>Email</label>
					<input type="email" name="user_email"  title="Enter your email"/>
					<label for="name"><span class="asterix">*</span>Confirm Email</label>
					<input type="email" name="user_email_confirm"  alt="email" title="Confirm your email"/>
					<label for="name"><span class="asterix">*</span>Password</label>
					<input type="password" name="user_password" title="Enter your password"/>
					<label for="name"><span class="asterix">*</span>Confirm password</label>
					<input type="password" name="user_password_confirm" alt="Confirm your password" title="Confirm your password"/>
				</div>
				<div class="row">
					<div class="six columns"><span class="whitetxt bold"><span class="asterix">*</span> Data required</span></div>
					<div class="six columns"><input type="submit" class="button radius right" value="Register" title="Register" onClick="javascript:void(0);"></div>
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
