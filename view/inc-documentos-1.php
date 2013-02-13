<p>Adjunte copias de los documentos en formato JPG o PDF únicamente. Con un peso máximo de 1000KB</p>
	
	<div class="row">
		<div class="twelve columns">
		<ul class="documents no-bullet">	
			<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span> Certificado de existencia</h4>
						<p>Expedido por la Cámara de Comercio de Bogotá (Original, no mayor a 90 días de expedición) o documento correspondiente de constitución expedido por el ente respectivo de su país.</p>
	            	</div>
	            	<div class="five columns">
	            		<img src="http://placehold.it/235x150" class="images" title="Imagen del director">
	            		<input type="file" name="user_certificate">
	            		 <?php if ($user->__get('user_certificate') != '') { ?><p><a href="<?php echo APPLICATION_URL;?>resources/documents/<?php echo $user->__get('user_certificate');?>">Documento actual</a></p><?php } ?>	
	            	</div>
				</div>
	        </li>
	        
	        <li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span> RUT o Identificación Fiscal</h4>
						<p>El RUT es un documento exigido paras las Galerías colombianas, Las extranjeras deben enviar identificación fiscal.</p>
	            	</div>
	            	<div class="five columns">
	            		<img src="http://placehold.it/235x150" class="images" title="Imagen del director">
	            		<input type="file" name="user_rut">
	            		  <?php if ($user->__get('user_rut') != '') { ?><p><a href="<?php echo APPLICATION_URL;?>resources/documents/<?php echo $user->__get('user_rut');?>">Documento actual</a></p><?php } ?>	
	            	</div>
				</div>
	        </li>
	        
	       	<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span> Documento de identidad</h4>
						<p>Documento de identidad del responsable legal de la galería (c&eacute;dula de ciudadanía o de extranjer&iacute;a para las galerías colombianas, el pasaporte para las galerías internacionales).</p>
	            	</div>
	            	<div class="five columns">
	            		<img src="http://placehold.it/235x150" class="images" title="Imagen del director">
	            		<input type="file" name="user_document">
	            		 <?php if ($user->__get('user_document') != '') { ?><p><a href="<?php echo APPLICATION_URL;?>resources/documents/<?php echo $user->__get('user_document');?>">Documento actual</a></p><?php } ?>	
	            	</div>
				</div>
	        </li>
	       	
	       	<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span> Registro de pago</h4>
						<p>Copia del pago de los derechos de inscripción por USD $160</p>
	            	</div>
	            	<div class="five columns">
	            		<img src="http://cambelt.co/icon/camera/235x150?color=b71632,fefefe" class="images" title="Registro de pago" />
	            		<input type="file" name="user_payment">
	            		 <?php if ($user->__get('user_payment') != '') { ?><p><a href="<?php echo APPLICATION_URL;?>resources/documents/<?php echo $user->__get('user_payment');?>">Documento actual</a></p><?php } ?>	
	            	</div>
				</div>
	        </li>	        

		</ul>
		</div>
	</div>
	<br />
	<!-- aceptación de terminos -->
	<div class="panel-2">
	<p> Yo <input type="text" class="medium" placeholder="Nombre del Director o Representante legal" name="user_name_accept" value="<?php echo $user->__get('user_name_accept');?>" /> Identificado con
		<input type="text" class="small" placeholder="Número de Cédula" name="user_document_accept" value="<?php echo $user->__get('user_document_accept');?>"   /> 
	declaro conocer y aceptar <a href="documentos/Reglamento.pdf" title="Reglamento de participación en artBO" target="_blank">las condiciones y el reglamento de participación</a> en artBO.
	</p>
	
	<input type="checkbox" name="user_accept" value="1" <?php if($user->__get('user_accept') == 1) { echo 'checked="checked"'; }?> /><span> Acepto las condiciones y el reglamento de participación en artBO</span>
	</div>
