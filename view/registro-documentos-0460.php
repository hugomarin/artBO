<?php 
include_once('header-login.php');  
include_once('menu.php'); 
$userForms	= UserFormHelper::retrieveUserForms(" AND user_id = ".escape($_SESSION['user_id']));
$class		= 'nulled';
if (count($userForms) == 5)
{
	$action		= "document.getElementById('validable2').submit();";
	$class		= '';
}
else
	$action		= "alertNotYet()";
	
?>
<script language="javascript">
function alertNotYet()
{
	alert ('Debe completar los pasos anteriores antes de finalizar su registro.');
}
</script>
<div class="row main-row">	
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
				<div class="eight columns title">
					<span class="redtext bold">Documentos</span>
					<h2><?php echo $user->__get('user_gallery_comname');?></h2>
				</div><!--/title-->
				
				<div class="four columns mini-nav-header">
					<dl class="sub-nav">
						<dd><a title="Anterior" class="prev" href="<?php echo APPLICATION_URL?>registro-espacio-0450.html">Anterior</a></dd>
						<dd><h4>6/6</h4></dd>
						<dd><a title="Guardar" class="save" href="javascript:void(0);" onClick="$('#validable2').attr('action','<?php echo APPLICATION_URL?>user.controller/saveDocuments.html'); document.getElementById('validable2').submit();">Guardar</a></dd>
					</dl>
				</div>
			</div><!--/row inner-header-->
			
			<div class="row form-data">	
				<div class="twelve columns">
					<form action="<?php echo APPLICATION_URL?>user.controller/uploadDocuments.html" id="validable2" class="" method="post" enctype="multipart/form-data" onSubmit="return Validator.prototype.checkRequiredFields();">
					<?php include_once('inc-documentos-1.php'); ?>
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
								<a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html" class="graytxt">Anterior</a>  
                                <a  href="javascript:void(0);" onClick="<?php echo $action;?>" class="button radius <?php echo $class;?>">Finalizar</a>
							</div>
						</div>
					</div>
				</div>
			</div><!--/inner-footer-->
		</div><!-- END Main: Panel -->
		<div class="advisory">
			<span>Recomendamos visualizar en: IE 9.0 - Firefox 10.0 - Safari 5.1 - Chrome 17.0
			Optimizada 1024 x 768</span>
			<span><a href="http://english.artboonline.com/documentos/2131_terms_and_conditions_galleries.pdf" target="_blank">Términos y Condiciones del </a> del sitio</span>
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