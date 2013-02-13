<?php 
include_once('header-login.php');
// include_once('header-nologin.php');  
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " ORDER by exposition_year, exposition_month");
include_once('menu.php'); 
?>
<!-- 2. End menu -->
	<div class="row main-row">
		<div class="alert-box success">
	    	Sus datos han sido guardados
	    	<a href="" class="close">×</a>
		</div>	
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<strong class="redtext">Exposiciones</strong>
						<h2><?php echo $user->__get('user_name');?></h2>
					</div>
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();">Guardar</a></dd>
							<dd><a class="prev" title="Registro Galerias" href="<?php echo APPLICATION_URL?>registro-galerias-0410.html">Anterior</a></dd>
							<dd><h4>2/6</h4></dd>
							<dd><a class="next" title="Registro Ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Siguiente</a></dd>
						</dl>	
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row form-data">	
					<div class="twelve columns">
						<h5>Registrar las exposiciones realizadas entre el 2011 y el 2013 en orden cronológico, incluyendo las exposiciones que tiene planeadas para el próximo año</h5>
						<div class="intitle">
							<!-- .row>.one.column+.four.columns+three.columns+.three.columns+.one.columns -->
							<ul class="expos">
								<li>
									<span class="asterix">*</span><strong>Nombre de la exposición</strong>
								</li>
								<li>
									<span class="asterix">*</span><strong>Año</strong>
								</li>
								<li>
									<span class="asterix">*</span><strong>Mes</strong>
								</li>
							</ul>
						</div>
						<!-- formulario -->
						<form action="<?php echo APPLICATION_URL?>user.controller/createExpo.html" id="validable" method="post">		
							<?php include_once('inc-exposiciones-1.php'); ?>
						</form>
						<!-- /formulario -->
						<a href="#" id="add-expo" class="label secondary round">Agregar una nueva exposición</a>
					</div>
				</div>
			</div>
			<br />
			<!-- botones anterior guardar siguiente -->
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="eight columns">
							<strong><span class="asterix">*</span>Datos requeridos</strong>
						</div>
						<div class="four columns">
							<div class="right">
								<a href="#" class="graytxt">Anterior</a>  <a href="#" class="button radius">Siguiente: Ferias</a>
							</div>
						</div>
					</div>
				</div>
			</div><!--/inner-footer-->
	</div><!-- END Main: Panel -->
	<div class="advisory">
		<span>Recomendamos visualizar en: IE 9.0 - Firefox 10.0 - Safari 5.1 - Chrome 17.0     |     Optimizada 1024 x 768</span>
		<span><a href="#">Términos y Condiciones</a> del Sitio</span>
	</div>
</div><!-- 3. END Main: Row -->
<!-- 3. footer -->
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<script language="javascript">
$(document).ready(function() 
						   {
							   
	// nueva expo
	var counterExpo = <?php echo (count($expositions) > 0) ? count($expositions)+1 : 2; ?>;
	$("#add-expo").click(function(){
	$(".link_list").hide().append('<!-- expo --><li class="link_default"><ul class="no-bullet expo"><li class="handler"><img src="images/drag_handle.gif" alt="drag_handle" width="50" height="51" class="image_handle nsr"></li><li><input name="expo_nombre_<?php echo $i?>" class="large input-text alert" type="text" value="<?php echo $exposition->__get('exposition_name');?>" /></li><li class="date"><select name="expo_fecha_<?php echo $i?>"><option value="2012" <?php if ($exposition->__get('exposition_year') == 2012) echo 'selected="selected"';?>>2012</option><option value="2011" <?php if ($exposition->__get('exposition_year') == 2011) echo 'selected="selected"';?>>2011</option></select></li><li class="date"><select name="expo_mes_<?php echo $i?>"><option value="01" <?php if ($exposition->__get('exposition_month') == 1) echo 'selected="selected"';?>>01</option><option value="02" <?php if ($exposition->__get('exposition_month') == 2) echo 'selected="selected"';?>>02</option><option value="03" <?php if ($exposition->__get('exposition_month') == 3) echo 'selected="selected"';?>>03</option><option value="04" <?php if ($exposition->__get('exposition_month') == 4) echo 'selected="selected"';?>>04</option><option value="05" <?php if ($exposition->__get('exposition_month') == 5) echo 'selected="selected"';?>>05</option><option value="06" <?php if ($exposition->__get('exposition_month') == 6) echo 'selected="selected"';?>>06</option><option value="07" <?php if ($exposition->__get('exposition_month') == 7) echo 'selected="selected"';?>>07</option><option value="08" <?php if ($exposition->__get('exposition_month') == 8) echo 'selected="selected"';?>>08</option><option value="09" <?php if ($exposition->__get('exposition_month') == 9) echo 'selected="selected"';?>>09</option><option value="10" <?php if ($exposition->__get('exposition_month') == 10) echo 'selected="selected"';?>>10</option><option value="11" <?php if ($exposition->__get('exposition_month') == 11) echo 'selected="selected"';?>>11</option><option value="12" <?php if ($exposition->__get('exposition_month') == 12) echo 'selected="selected"';?>>12</option></select></li><li class="handler"><a href="#"><img src="images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a></li></ul></li><!-- end Expo --> ').fadeIn(1000);
	counterExpo = counterExpo+1;});
	// end nueva expo
   
    });
</script>


