
<?php include_once(SITE_VIEW.'header-login.php'); ?>




<div class="row main-row">	
	<div class="panel nopadding">
		<div class="inner-header">
			<div class="row">
				<div class="twelve columns">
					<h3>Gracias por participar en la convocatoria de <strong> artBO 2013.</strong></h3> 
					
					<p>En breve, recibira un correo electrónico de confirmación. de su proceso de registro.</p>					
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
	<div class="advisory">
		<span>Recomendamos visualizar en: IE 9.0 - Firefox 10.0 - Safari 5.1 - Chrome 17.0     |     Optimizada 1024 x 768</span>
		<span><a href="http://www.artboonline.com/documentos/2129_reglamento_convocatoria_artecamara2013.pdf" target="_blank">Términos y Condiciones</a> del Sitio</span>
	</div>
</div>
	<!-- 3. END Row main -->

<!-- 4. footer -->			
<?php include_once('footer.php'); 
session_destroy();
?>
<!-- 4. End footer -->