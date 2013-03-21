<?php 
include_once('header-login.php');
// include_once('header-nologin.php');  
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " ORDER by exposition_year, exposition_month");
include_once('menu.php'); 
?>
<!-- 2. End menu -->
	<div class="row main-row">
		 <!-- <div class="alert-box error">
	    	<a href="#" class="close">×</a>
		</div> -->
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<strong class="redtext bold">Exposiciones</strong>
						<h2><?php echo $user->__get('user_gallery_comname');?></h2>
					</div>
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onclick="$('#validable2').attr('action','<?php echo APPLICATION_URL?>user.controller/createExpo/stay.html'); $('#validable2').submit();">Guardar</a></dd>
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
						<h5>Registre las exposiciones realizadas entre el 2011 y el 2013, en orden cronológico, incluyendo las exposiciones que tiene planeadas para el próximo año.</h5>
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
						<form action="<?php echo APPLICATION_URL?>user.controller/createExpo.html" id="validable2" method="post">		
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
								<a href="#" class="graytxt">Anterior</a>  <a href="javascript:void(0);" onclick="$('#validable2').submit();" class="button radius">Siguiente: Ferias</a>
							</div>
						</div>
					</div>
				</div>
			</div><!--/inner-footer-->
	</div><!-- END Main: Panel -->
	<div class="advisory">
		<span>Recomendamos visualizar en: IE 9.0 - Firefox 10.0 - Safari 5.1 - Chrome 17.0
		Optimizada 1024 x 768</span>
		<span><a href="http://www.artboonline.com/documentos/2130_reglamento_participacion_2013.pdf" target="_blank">Términos y Condiciones</a> del sitio</span>
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
	//(event.preventDefault) ? event.preventDefault() : event.returnValue = false; 
$(".link_list").hide().append('<!-- expo --><li class="link_default"><ul class="no-bullet expo"><li class="handler"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="50" height="51" class="image_handle nsr"></li><li><input name="expo_nombre_'+counterExpo+'" class="large input-text alert" type="text"  /></li><li class="date"><select name="expo_fecha_'+counterExpo+'"><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option></select></li><li class="date"><select name="expo_mes_'+counterExpo+'"><option value="01" >01</option><option value="02" >02</option><option value="03" >03</option><option value="04" >04</option><option value="05" >05</option><option value="06" >06</option><option value="07" >07</option><option value="08" >08</option><option value="09" >09</option><option value="10" >10</option><option value="11">11</option><option value="12" >12</option></select></li><li class="handler"><a href="javascript:void(0)" onClick=" $(this).parent().parent().parent().remove(); Validator();"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a></li></ul></li><!-- end Expo --> ').fadeIn(1000);							  
	counterExpo++;
	validInst = new Validator(1, '', true);
	});
	// end nueva expo
   
});

function callValidator() 
{
	validInst = new Validator(1, "", true);	
}
</script>


