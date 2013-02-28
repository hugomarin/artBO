<?php
$default	= 'http://cambelt.co/icon/camera/480x360?color=b71632,fefefe';
?>
	<h5>Adjunte copias de los documentos en formato JPG o PDF únicamente. Con un peso máximo de 1000KB</h5>
	
	<div class="row">
		<div class="twelve columns">
		<ul class="documents no-bullet">	
			<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span>Certificado de existencia</h4>
						<p>Expedido por la Cámara de Comercio de Bogotá (Original, no mayor a 90 días de expedición) o documento correspondiente de constitución expedido por el ente respectivo de su país.</p>
	            	</div>
	            	<div class="five columns">
						<?php
                        $image	= ($user->__get('user_certificate') != '') ? APPLICATION_URL.$dir.$user->__get('user_certificate') : $default;
						if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/camera/480x360?color=3fc46b,fefefe';
                            
                        ?>	            		
                        <img src="<?php echo $image;?>" class="images right" title="Imagen del director">
 						<div id="user_certificate"></div>	            	
                    </div>
				</div>
	        </li>
	        
	        <li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span>RUT o Identificación Fiscal</h4>
						<p>El RUT es un documento exigido paras las Galerías colombianas, Las extranjeras deben enviar identificación fiscal.</p>
	            	</div>
	            	<div class="five columns">
						<?php
                        $image	= ($user->__get('user_rut') != '') ? APPLICATION_URL.$dir.$user->__get('user_rut') : $default;
						if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/camera/480x360?color=3fc46b,fefefe';
                            
                        ?>	                    
	            		<img src="<?php echo $image;?>" class="images right" title="Imagen del director">
                        <div id="user_rut"></div>	
	            	</div>
				</div>
	        </li>
	        
	       	<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span>Documento de identidad</h4>
						<p>Documento de identidad del responsable legal de la galería (c&eacute;dula de ciudadanía o de extranjer&iacute;a para las galerías colombianas, el pasaporte para las galerías internacionales).</p>
	            	</div>
	            	<div class="five columns">
						<?php
                        $image	= ($user->__get('user_document') != '') ? APPLICATION_URL.$dir.$user->__get('user_document') : $default;
						if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/camera/480x360?color=3fc46b,fefefe';
                            
                        ?>	                    
	            		<img src="<?php echo $image;?>" class="images right" title="Imagen del director">
                        <div id="user_document"></div>                                            
	            	</div>
				</div>
	        </li>
	       	
	       	<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span>Registro de pago</h4>
						<p>Copia del pago de los derechos de inscripción por USD $160</p>
	            	</div>
	            	<div class="five columns">
						<?php
                        $image	= ($user->__get('user_payment') != '') ? APPLICATION_URL.$dir.$user->__get('user_payment') : $default;
						if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/camera/480x360?color=3fc46b,fefefe';
                            
                        ?>	                    
	            		<img src="<?php echo $image;?>" class="images right" title="Imagen del director">
                        <div id="user_payment"></div>                                              
	            	</div>
				</div>
	        </li>	        

		</ul>
		</div>
	</div>
	<br />
	<!-- aceptación de terminos -->
	<div class="panel-2">
	<p> Yo <input type="text" class="legal" placeholder="Nombre del Director o Representante legal" name="user_name_accept" value="<?php echo $user->__get('user_name_accept');?>" /> Identificado con
		<input type="text" class="doc" placeholder="Número de Cédula" name="user_document_accept" value="<?php echo $user->__get('user_document_accept');?>"   /> 
	declaro conocer y aceptar <a href="documentos/Reglamento.pdf" title="Reglamento de participación en artBO" target="_blank">las condiciones y el reglamento de participación</a> en artBO.
	</p>
	
	<input type="checkbox" name="user_accept" value="1" <?php if($user->__get('user_accept') == 1) { echo 'checked="checked"'; }?> /><span> Acepto las condiciones y el reglamento de participación en artBO</span>
	</div>

	<script>
      $(document).ready(function() {
        var manualuploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_certificate')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_certificate.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });
        var seconduploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_rut')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_rut.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });	
        var thirduploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_document')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_document.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });			
        var thirduploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_payment')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_payment.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });				
      });
    </script> 