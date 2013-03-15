
<?php 
include_once(SITE_VIEW.'header-login.php'); 
$dir		= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
?>




<div class="row main-row">	
	<div class="panel nopadding">
		<div class="inner-header">
			<div class="row">
				<div class="twelve columns">
					<h3>Gracias por participar en la convocatoria par galerías artBO 2013</h3> 
					
					<p>A continuación puede ver los datos registrados. Para futuras referencias, <strong>recuerde imprimir esta pantalla pues no es posible acceder a ella ni a su perfil nuevamente. El listado de las galerías seleccionadas se publicará en <a href="http://www.artboonline.com" target="_blank">www.artboonline.com</a>.</strong></p>					
				</div>
			</div>
			<?php
			echo '<h2>Su registro es el n&uacute;mero '.$user->__get('user_id').'</h2>';
           // require_once(SITE_VIEW.'endmail2.php');
            //echo utf8_decode($html);
			echo '<p><a href="'.$dir.'finalizar.pdf">Descargue su pdf</a>';
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