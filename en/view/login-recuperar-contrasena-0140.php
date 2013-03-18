
<?php include_once('header-nologin2.php');  ?>

		
		
<!-- content -->
<div class="container">
	<div class="row "><!-- Row -->	
		<div class="six columns centered ">
		<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<div class="alert-box success">
				Your password has been changed.
				<a href="" class="close" title="Cerrar">&times;</a>
			</div>
			<div class="panel"><!-- Panel -->
				<h3>Reset password</h3>
				<p>You may now login.</p>
			</div>  <!-- End Panel -->
			<a href="<?php echo APPLICATION_URL?>login.html" title="login" class="button radius right">Login</a>
		</div> <!-- end six columns -->
	</div><!-- End Row -->
</div>
<!-- End content -->
			

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>