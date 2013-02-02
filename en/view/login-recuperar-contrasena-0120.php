
<?php include_once('header-nologin.php'); 
$email = urldecode($_GET[0]);
?>

		
<!-- content -->
<div class="container superior">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
		<div class="panel"><!-- Panel -->
			<h3>Reset Password </h3>
			    	
			    	<div class="alert-box success">
						Congratulations. You have reset your password.
						<a href="" class="close">&times;</a>
					</div>
					
					<p>We have sent an email to <a href="mailto:<?php echo $email?>"><?php echo $email?> </a> with instructions. Remember to check your Spam file if you don’t find it.<br /><br />  In any case <a href="<?php echo APPLICATION_URL?>login-recuperar-contrasena-0110.html" title="Reset password">you can send it again.</a></p>

			</div>  <!-- End Panel -->
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

