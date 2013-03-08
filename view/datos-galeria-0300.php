<?php include_once('header-login.php'); ?>
<script language="javascript">
function validate()
{
	var ret	= true;
	if (document.getElementById("rep_contrasena").value != document.getElementById('contrasena').value) 
	{ 
		alert ('Las claves no coinciden.'); 
		ret	= false; 
	}
	else if (document.getElementById('contrasena').value == '')
	{
		alert ('Escribe una contraseña.');
		ret = false;
	}
	return ret;
}
<?php 
if (isset($_GET[0]))
	echo 'alert ("Sus datos fueron actualizados");';
?>
</script>
	<div class="row contenido"><!-- Row -->	
		<!-- columna 1/2 -->
		<div class="six columns centered">
			<form action="<?php echo APPLICATION_URL;?>user.controller/changePassword.html" method="post" accept-charset="utf-8">
				<div class="panel"><!-- panel -->
					<h2>Editar su perfil</h2>
					<label for="contraseña">Nueva clave</label>
					<input type="password" name="contrasena" value="" id="contrasena"/>
					<label for="Repetir contraseña">Repetir clave</label>
					<input type="password" name="rep_contrasena" value="" id="rep_contrasena"/>
				</div>
				<div class="row">
					<div class="six columns"><a class="bold" title="volver" href="<?php echo APPLICATION_URL?>registro-inicio-0400.html">Volver</a></div>
					<div class="six columns"><input title="guardar" onClick="return validate();" type="submit" name="cambiar" value="Guardar" class="button radius right"/></div>
				</div>
			</form>
			<!-- <form action="<?php echo APPLICATION_URL?>user.controller/basic.html" id="validable" class="" method="post" enctype="multipart/form-data">
				
				<div class="row">
				
					<div class="twelve columns">
				
						<label><strong>Imagen de la Galería</strong></label>
						<br />
						<div class="text-center">
						<?php
							$image	= ($user->__get('user_image') != '') ? $user->__get('user_image') : 'perfil.png';
						?>	
					<img src="<?php echo APPLICATION_URL?>images/resources/perfil.png" alt="perfil" width="200" height="200" class="images"><br />
					
							<input type="file" name="user_image" class=""/><br /><br/>
							<p>Puede subir imagen  de la última exposición realizada en su  galería en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</p>
							<hr />
						</div>
						
						
						<div class="mid-input">
							<label><strong>Nombre de la Galería*</strong></label>
							<input type="text" name="user_name" class="expand input-text only" value="<?php echo $user->__get('user_name');?>" />
						</div>
						
						<label><strong>Pagina web</strong> </label>
						<input type="text" name="user_website" class="expand input-text only" value="<?php echo $user->__get('user_website');?>" />
						
						<br />
						
						<div class="row">
						
							<div class="seven columns">
							<label><strong>Tipo de documento*</strong></label>
							<select name="user_document_type">
								<option value="NULL">Seleccione</option>
								<option value="NIT" <?php if ($user->__get('user_document_type') == 'NIT') echo 'selected="SELECTED"';?>>NIT</option>
								<option value="RUT" <?php if ($user->__get('user_document_type') == 'RUT') echo 'selected="SELECTED"';?>>No. de identificación fiscal de su país</option>
							</select>
							</div>
						
							<div class="five columns ">
								<label><strong>Número de Documento*</strong></label>
								<input type="text" name="user_gallery_document" class="small input-text" value="<?php echo $user->__get('user_gallery_document');?>" />
							</div>
						
						</div>
					
						
						<span>Nota: Tenga en cuenta que con el mismo número de identificación también registrará el ingreso de mercancía de sus obras, equipos y otros a Corferias.</span><br /><br />
						<span><strong>*Datos requeridos</strong></span>
						
						<hr />
						<div class="text-center">
							<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="button round">Siguiente</a>
						</div>
						
						<br />
					</div>
				</div>
			</form>	 -->
	
		</div><!-- END columna 1/2 -->
	</div><!-- End Row -->
			
<?php include_once('footer.php'); ?>