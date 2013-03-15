
<?php 
include_once(SITE_VIEW.'header-login.php'); 
$dir		= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';

?>




<div class="row main-row">	
	<div class="panel nopadding">
		<div class="inner-header">
			<div class="row">
				<div class="twelve columns">
					<h3>Thank you for participating in <strong> ArtBo 2013.</strong></h3> 
					
					<p>The list of selected galleries will be published in <a href="http://www.artboonline.com" target="_blank">www.artboonline.com</a>.</p>					
				</div>
			</div>
			<?php
			echo '<h2>Your registry number is '.$user->__get('user_id').'</h2>';
            //require_once(SITE_VIEW.'endmail2.php');
            //echo utf8_decode($html);
			echo '<h5><strong><a href="'.$dir.'finalizar.pdf">Download your registry info</a></strong>';
            ?>            
		</div>
		<div class="inner-footer">
			<div class="container">
				<div class="row">
					<div class="twelve columns">
						
					</div>
				</div>
			</div>
		</div><!--/inner-footer-->
	</div><!-- END Main: Panel -->
	
</div>
	<!-- 3. END Row main -->

<!-- 4. footer -->			
<?php include_once('footer.php'); 
//session_destroy();
?>
<!-- 4. End footer -->