<?php 
include_once('header-login.php');  
include_once('menu.php'); ?>
			
	<div class="row main-row">	
		<div class="panel">
			
			<div class="row inner-header">
				<div class="eight columns title">
					<span class="redtext">Registro</span>
					<h2>Tipo de stand: <?php echo $user->__get('user_name');?></h2>
					<h5>Descargue pdf con información sobre los stands de artBO.</h5>
				</div><!--/title-->
				
				<div class="four columns mini-nav-header">
					<dl class="sub-nav">
						<dd><a href="<?php echo APPLICATION_URL?>registro-artistas-0440.html">Anterior</a></dd>
						<dd><a title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();">Guardar</a></dd>
						<dd><a href="<?php echo APPLICATION_URL?>registro-documentos-0460.html">Siguiente</a></dd>
					</dl>	
				</div>
			</div><!--/row inner-header-->
			
			
			<div class="row form-data">	

				<div class="twelve columns">
					<form action="<?php echo APPLICATION_URL?>user.controller/selectStand.html" id="validable" class="" method="post">

					
					<?php include_once('inc-stand-1.php'); ?>
						

					</form>
				</div><!--/twelve columns-->
			</div><!--/form-data-->
				
			<hr />
				
			<div class="row inner-footer">
				<div class="eight columns note">
					<span><strong><span class="asterix">*</span>Datos requeridos</strong></span>
				</div><!--/note-->
				
				<div class="four columns mini-nav-footer">
					<dl class="sub-nav">
						<dd><a href="<?php echo APPLICATION_URL?>registro-artistas-0440">Anterior</a></dd>
						<dd><a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Guardar</a></dd>
						<dd><a href="<?php echo APPLICATION_URL?>registro-documentos-0460.html">Siguiente</a></dd>
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
			
		</div><!--panel-->
	</div><!--/row main-row-->
			
<?php include_once('footer.php'); ?>