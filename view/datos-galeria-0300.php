<?php include_once('header-login.php'); ?>

	<div class="row contenido"><!-- Row -->	
		
		<!-- columna 1/2 -->
		<div class="six columns centered">
			<div class="panel"><!-- panel -->
				<h2 class="text-center">Cree su perfil</h2>
				<hr />
				<h4 class="text-center">Galería</h4>
                <form action="<?php echo APPLICATION_URL?>user.controller/basic.html" id="validable" class="" method="post" enctype="multipart/form-data">
				<!-- row -->
				<div class="row">
					<!-- columna 1/1 -->
					<div class="twelve columns">
						<!-- imagen galeria -->
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
						
						<!-- END imagen galeria -->
						<!-- Nombre de la galería -->
						<div class="mid-input">
							<label><strong>Nombre de la Galería*</strong></label>
							<input type="text" name="user_name" class="expand input-text only" value="<?php echo $user->__get('user_name');?>" />
						</div>
						<!-- End Nombre de la galería -->
						<!-- pagina web -->
						<label><strong>Pagina web</strong> </label>
						<input type="text" name="user_website" class="expand input-text only" value="<?php echo $user->__get('user_website');?>" />
						<!-- END pagina web -->
						<br />
						<!-- documento -->
						<div class="row">
							<!-- columns 1/2 -->
							<div class="seven columns">
							<label><strong>Tipo de documento*</strong></label>
							<select name="user_document_type">
								<option value="NULL">Seleccione</option>
								<option value="NIT" <?php if ($user->__get('user_document_type') == 'NIT') echo 'selected="SELECTED"';?>>NIT</option>
								<option value="RUT" <?php if ($user->__get('user_document_type') == 'RUT') echo 'selected="SELECTED"';?>>No. de identificación fiscal de su país</option>
							</select>
							</div>
							<!-- END columns 1/2 -->
							<!-- columns 2/2 -->
							<div class="five columns ">
								<label><strong>Número de Documento*</strong></label>
								<input type="text" name="user_gallery_document" class="small input-text" value="<?php echo $user->__get('user_gallery_document');?>" />
							</div>
							<!-- END columns 2/2 -->
						</div>
					
						<!-- END documento -->
						<span>Nota: Tenga en cuenta que con el mismo número de identificación también registrará el ingreso de mercancía de sus obras, equipos y otros a Corferias.</span><br /><br />
						<span><strong>*Datos requeridos</strong></span>
						<!-- botones -->
						<hr />
						<div class="text-center">
							<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="button round">Siguiente</a>
						</div>
						<!-- END botones -->
						<br />
					</div>
					<!-- END columna 1/1 -->
				</div>
				<!-- END row -->
				</form>	
	
			</div><!-- End panel -->
			<div class="shadow>"><img src="<?php echo APPLICATION_URL?>images/resources/sombraFinalDatos.png" class="top-sombra" width="470" height="12" alt="sombra"/></div><!-- Sombra final del panel -->
		</div><!-- END columna 1/2 -->
	</div><!-- End Row -->
			
<?php include_once('footer.php'); ?>