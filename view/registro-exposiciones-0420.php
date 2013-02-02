<?php 
include_once('header-login.php'); 
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " ORDER by exposition_year, exposition_month");
include_once('menu.php'); 
?>
<!-- 2. End menu -->
			
	<div class="row main-row">	
		<div class="panel">
			
			<div class="row inner-header">
				<div class="eight columns title">
					<span class="rojo">Registro</span>
					<h2><span class="quitarH2"> Exposiciones:</span> <?php echo $user->__get('user_name');?></h2>
				</div>
				<div class="four columns mini-nav-header">
					<dl class="sub-nav">
						<dd><a title="Registro Galerias" href="<?php echo APPLICATION_URL?>registro-galerias-0410.html">Anterior</a></dd>
						<dd><a title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();">Guardar</a></dd>
						<dd><a title="Registro Ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Siguiente</a></dd>
					</dl>	
				</div>
			</div>	<!-- END titulo row -->
			<hr />
			<div class="row form-data">	
				<div class="twelve columns">
					<p><em>*Registrar las exposiciones realizadas entre el 2011 y el 2013 en orden cronológico, incluyendo las exposiciones que tiene planeadas para el próximo año</em></p>
					<!-- formulario -->
					<form action="<?php echo APPLICATION_URL?>user.controller/createExpo.html" id="validable" class="" method="post">		
						<?php include_once('inc-exposiciones-1.php'); ?>
					</form>
					<!-- /formulario -->
					<a href="#" id="add-expo"><strong>+</strong> Agregar una nueva exposición</a>
				</div>
			</div>
			<hr />
			<!-- botones anterior guardar siguiente -->
			<div class="row inner-footer">
				<div class="eight columns note">
					<span><strong><span class="asterix">*</span>Datos requeridos</strong></span>
				</div><!--/note-->
				
				<div class="four columns mini-nav-footer">
					<dl class="sub-nav">
						<dd><a title="Registro Galerías" href="<?php echo APPLICATION_URL?>registro-galerias-0410.html">Anterior</a></dd>
						<dd><a title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
						<dd><a title="Registro Ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Siguiente</a></dd>
					</dl>
				<?php 
					if (isset($_GET[0]))
					{
					?>
				<p class="text-center bluetxt">Su registro ha sido guardado</p>
				<?php
					}
					?>
				</div><!--/mini-nav-->
			</div><!--/inner-footer-->
	</div><!-- END Main: Panel -->
	<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra"/><!-- Sombra final del panel -->
</div><!-- 3. END Main: Row -->
<!-- 3. footer -->
<script language="javascript">
$(document).ready(function() 
						   {
							   
	// nueva expo
	var counterExpo = <?php echo (count($expositions) > 0) ? count($expositions)+1 : 2; ?>;
	$("#add-expo").click(function(){
	$(".link_list").hide().append('<!-- expo --><li class="link_default"><div class="row"><!-- move img --><div class="one columns"><img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></div><!-- END move img --><!-- nombre --><div class="six columns"><label><strong><span class="asterix">*</span>Nombre de la exposición</strong></label>	<input class="large input-text" type="text"  name="expo_nombre_'+counterExpo+'" /></div><!-- END nombre --><!-- Año --><div class="two columns offset-by-three"><label>Año</label>	<select name="expo_fecha_'+counterExpo+'"><option value="2012">2012</option><option value="2011">2011</option></select></div><!-- END Año --><div class="two columns offset-by-three">  <label>Mes</label>	  <select name="expo_mes_'+counterExpo+'">   <option value="01">01</option>   <option value="02">02</option>   <option value="03">03</option>   <option value="04">04</option>   <option value="05">05</option>   <option value="06">06</option>   <option value="07">07</option>   <option value="08">08</option>   <option value="09">09</option>   <option value="10">10</option>   <option value="11">11</option>   <option value="12">12</option>  </select> </div>	</li><!-- end Expo --> ').fadeIn(1000);
	counterExpo = counterExpo+1;});
	// end nueva expo
   
    });
</script>
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->



