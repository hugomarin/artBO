<?php 
include_once('header-login.php');  
include_once('menu.php'); ?>
			
<div class="row main-row">	
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<span class="redtext bold">Tipo de <em>stand</em></span>
						<h2><?php echo $user->__get('user_gallery_comname');?></h2>
					</div><!--/title-->
					
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a title="Save" class="save" href="javascript:void(0);" onClick="$('#validable2').attr('action','<?php echo APPLICATION_URL?>user.controller/selectStand/stay.html'); $('#validable2').submit();">Save</a></dd>
							<dd><a title="Registro Artistas" class="prev" href="<?php echo APPLICATION_URL?>registro-artistas-0440.html">Previous</a></dd>
							<dd><h4>5/6</h4></dd>
							<dd><a title="Registro Documentos" class="next" href="<?php echo APPLICATION_URL?>registro-documentos-0460.html">Next</a></dd>
						</dl>	
					</div>
				</div><!--/row inner-header-->
			</div>
			
		<div class="container">
			<div class="row form-data">	
					<div class="twelve columns">
						<h5>Descargue <a href="#">pdf</a> con información sobre los <em>stands</em> de artBO.</h5>
						<form action="<?php echo APPLICATION_URL?>user.controller/selectStand.html" id="validable2" class="" method="post">	
						<?php include_once('inc-stand-1.php'); ?>
						</form>
					</div><!--/twelve columns-->
				</div><!--/form-data-->
			</div>
				
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="eight columns">
							<strong><span class="asterix">*</span>Datos requeridos</strong>
						</div>
						<div class="four columns">
							<div class="right">
								<a title="Registro Artistas" href="<?php echo APPLICATION_URL?>registro-artistas-0440.html" class="graytxt">Previous</a>  
                                <a title="Registro Documentos" href="javascript:void(0);" onclick=" $('#validable2').submit();" class="button radius">Next: Documentos</a>
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