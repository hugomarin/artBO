<?php 
include_once('header-login.php');  
include_once('menu.php'); ?>
			
<div class="row main-row">	
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
				<div class="eight columns title">
					<span class="redtext">Registro</span>
					<h2>Documentos: <?php echo $user->__get('user_name');?></h2>
				</div><!--/title-->
				
				<div class="four columns mini-nav-header">
					<dl class="sub-nav">
						<dd><a class="prev" href="<?php echo APPLICATION_URL?>registro-espacio-0450.html">Anterior</a></dd>
						<dd><h4>6/6</h4></dd>
						<dd><a class="save" href="javascript:void(0);" onClick="document.getElementById('validable').submit();">Guardar</a></dd>
					</dl>
				</div>
			</div><!--/row inner-header-->
			
		<div class="container">
			<div class="row form-data">	
				<div class="twelve columns">
					<form action="<?php echo APPLICATION_URL?>user.controller/uploadDocuments.html" id="validable" class="" method="post" enctype="multipart/form-data" onSubmit="return Validator.prototype.checkRequiredFields();">
					<?php include_once('inc-documentos-1.php'); ?>
					</form>
				</div><!--/twelve columns-->
			</div><!--/form-data-->
		</div>
		</div>
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="eight columns">
							<strong><span class="asterix">*</span>Datos requeridos</strong>
						</div>
						<div class="four columns">
							<div class="right">
								<a href="<?php echo APPLICATION_URL?>registro-artistas-0440.html" class="graytxt">Anterior</a>  <a  href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="button radius nulled">Guardar</a>
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


<?php 
if (isset($_GET[0]))
{
?>
<script language="JavaScript">
	alert('Al hacer click declaro conocer y aceptar las condiciones y el reglamento de participaciónen artBO. Ha terminado de registrar su galería. Muchas gracias.');
</script>
<?php
}
?>