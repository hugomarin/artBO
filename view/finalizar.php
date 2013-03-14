
<?php include_once(SITE_VIEW.'header-login.php'); ?>




<div class="row main-row">	
	<div class="panel nopadding">
		<div class="inner-header">
			<div class="row">
				<div class="twelve columns">
					<h3>Gracias por participar en la convocatoria de <strong> artBO 2013.</strong></h3> 
					
					<p>A continuación, puede ver los datos registrados. Para futuras referencias, <strong>recuerde imprimir esta pantalla pues no es posible acceder a ella ni a su perfil nuevamente</strong></p>					
				</div>
			</div>
			<?php
			echo '<h2>Su registro es el n&uacute;mero '.$user->__get('user_id').'</h2>';
            require_once(SITE_VIEW.'endmail2.php');
            echo utf8_decode($html);

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
session_destroy();
?>
<!-- 4. End footer -->