<?php 
include_once('header-login.php');  
include_once('menu.php'); ?>
			
	<div class="row main-row">	
		<div class="panel">
			
			<div class="row inner-header">
				<div class="eight columns title">
					<span class="redtext">Registro</span>
					<h2>Documentos: <?php echo $user->__get('user_name');?></h2>
				</div><!--/title-->
				
				<div class="four columns mini-nav-header">
					<dl class="sub-nav">
						<dd><a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html"></a>>Anterior</a></dd>
						<dd><a href="javascript:void(0);" onClick="document.getElementById('validable').submit();">Guardar</a></dd>
					</dl>	
				</div>
			</div><!--/row inner-header-->
			
			<hr />
			
			<div class="row form-data">	

				<div class="twelve columns">
					<form action="<?php echo APPLICATION_URL?>user.controller/uploadDocuments.html" id="validable" class="" method="post" enctype="multipart/form-data" onSubmit="return Validator.prototype.checkRequiredFields();">

					
					<?php include_once('inc-documentos-1.php'); ?>
						

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
						<dd><a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html">Anterior</a></dd>
						<dd><a href="javascript:void(0);" onClick="document.getElementById('validable').submit();">Guardar</a></dd>
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