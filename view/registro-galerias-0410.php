<?php 
include_once('header-login.php');  
include_once('menu.php'); ?>
			
	<div class="row main-row">	
		<!-- <div class="alert-box success">
	    	Sus datos han sido guardados
	    	<a href="" class="close">×</a>
		</div> -->
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<strong class="redtext bold">Galería</strong>
						<h2><?php echo $user->__get('user_gallery_comname');?></h2>
					</div><!--/title-->
					
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a title="Guardar" class="save" href="javascript:void(0);" onclick="$('#validable').attr('action','<?php echo APPLICATION_URL?>user.controller/first/stay.html'); $('#validable').submit();">Guardar</a></dd>
							<dd><a title="Inicio" class="prev" href="<?php echo APPLICATION_URL?>registro-inicio-0400.html">Anterior</a></dd>
							<dd><h4>1/6</h4></dd>
							<dd><a title="Registro Exposiciones" class="next" href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html">Siguiente</a></dd>
						</dl>	
					</div>
				</div><!--/row inner-header-->
			</div>
		<div class="container">
			<div class="row form-data">	
				<div class="twelve columns">
					<form action="<?php echo APPLICATION_URL?>user.controller/first.html" id="validable" method="post" enctype="multipart/form-data" onsubmit="alert ('ok');">
					<?php include_once('inc-galeria-1.php'); ?>
					</form>
				</div><!--/twelve columns-->
			</div><!--/form-data-->
		</div>
			<!-- botones anterior guardar siguiente -->
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="eight columns">
							<strong><span class="asterix">*</span>Datos requeridos</strong>
						</div>
						<div class="four columns">
							<div class="right">
								<a title="Anterior" href="<?php echo APPLICATION_URL;?>registro-inicio-0400.html" class="graytxt">Anterior</a>  <a href="javascript:void(0);" onclick="$('#validable').submit();" title="Siguiente: Exposiciones" class="button radius">Siguiente: Exposiciones</a>
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
	</div><!--/row main-row-->
	
<?php include_once('footer.php'); ?>