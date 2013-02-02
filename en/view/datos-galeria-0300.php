<?php include_once('header-login.php'); ?>

	<div class="row contenido"><!-- Row -->	
		
		<!-- columna 1/2 -->
		<div class="six columns centered">
			<div class="panel"><!-- panel -->
				<h2 class="text-center">Create your profile</h2>
				<hr />
				<h4 class="text-center">Gallery</h4>
                <form action="<?php echo APPLICATION_URL?>user.controller/basic.html" id="validable" class="" method="post" enctype="multipart/form-data">
				<!-- row -->
				<div class="row">
					<!-- columna 1/1 -->
					<div class="twelve columns">
						<!-- imagen galeria -->
						<label><strong>Image of the Gallery</strong></label>
						<br />
						<div class="text-center">
							
							
					<img src="<?php echo APPLICATION_URL?>images/resources/200X200/perfil.png" alt="perfil" width="200" height="200" class="images"><br />
					
							<input type="file" name="user_image" class=""/><br /><br/>
							<p>You can upload an image of the last exhibition in your gallery in.jpg, .png or .gif. The file must not exceed 1000 KB.</p>
							<hr />
						</div>
						
						<!-- END imagen galeria -->
						<!-- Nombre de la galería -->
						<div class="mid-input">
							<label><strong>Name of the Gallery *</strong></label>
							<input type="text" name="user_name" class="expand input-text only" />
						</div>
						<!-- End Nombre de la galería -->
						<!-- pagina web -->
						<label><strong>Web page </strong> </label>
						<input type="text" name="user_website" class="expand input-text only" />
						<!-- END pagina web -->
						<br />
						<!-- documento -->
						<div class="row">
							<!-- columns 1/2 -->
							<div class="seven columns">
							<label><strong>Type of document*</strong></label>
							<select name="user_document_type">
								<option value="NULL">Select</option>
								<option value="RUT">Tax identification number in your country</option>
							</select>
							</div>
							<!-- END columns 1/2 -->
							<!-- columns 2/2 -->
							<div class="five columns ">
								<label><strong>Number of the Document*</strong></label>
								<input type="text" name="user_gallery_document" class="small input-text" />
							</div>
							<!-- END columns 2/2 -->
						</div>
					
						<!-- END documento -->
						<span>Note: Remember that with this number you will register the entry of the works, goods and equipment to Corferias, the fair venue.</span><br /><br />
						<span><strong>*Data required</strong></span>
						<!-- botones -->
						<hr />
						<div class="text-center">
							<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="button round">Next</a>
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