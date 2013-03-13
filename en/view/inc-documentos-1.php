<?php
$default	= 'http://cambelt.co/icon/document/230x170?color=b71632,fefefe';
$dir		= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
?>
	<h5>Upload a copy of the following documents in .jpg, .pdf or .png formats and not exceeding 1000KB.</h5>
	
	<div class="row">
		<div class="twelve columns">
		<ul class="documents no-bullet">	
			<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span>Certificate of incorporation</h4>
						<p>The certificate of incorporation issued by the respective authority of your country.</p>
	            	</div>
	            	<div class="five columns">
						<?php
                        $image	= ($user->__get('user_certificate') != '') ? APPLICATION_URL.$dir.$user->__get('user_certificate') : $default;
						if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/document/230x170?color=3fc46b,fefefe';
                            
                        ?>	            		
                        <img src="<?php echo $image;?>" class="images right" title="Certificate of incorporation">
 						<div id="user_certificate"></div>	            	
                    </div>
				</div>
	        </li>
	        
	        <li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span>Tax Identification</h4>
						<p>The tax identification issued by the respective authority of your country.</p>
	            	</div>
	            	<div class="five columns">
						<?php
                        $image	= ($user->__get('user_rut') != '') ? APPLICATION_URL.$dir.$user->__get('user_rut') : $default;
						if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/document/230x170?color=3fc46b,fefefe';
                            
                        ?>	                    
	            		<img src="<?php echo $image;?>" class="images right" title="Tax Identification">
                        <div id="user_rut"></div>	
	            	</div>
				</div>
	        </li>
	        
	       	<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span>Identity Document</h4>
						<p>The passport of the legal representative of the gallery.</p>
	            	</div>
	            	<div class="five columns">
						<?php
                        $image	= ($user->__get('user_document') != '') ? APPLICATION_URL.$dir.$user->__get('user_document') : $default;
						if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/document/230x170?color=3fc46b,fefefe';
                            
                        ?>	                    
	            		<img src="<?php echo $image;?>" class="images right" title="Identity Document">
                        <div id="user_document"></div>                                            
	            	</div>
				</div>
	        </li>
	       	
	       	<li>
				<div class="row">
					<div class="seven columns">		
						<h4><span class="asterix">*</span>Copy of payment</h4>
						<p>Receipt of payment for the application fee in the amount of USD $160.</p>
	            	</div>
	            	<div class="five columns">
						<?php
                        $image	= ($user->__get('user_payment') != '') ? APPLICATION_URL.$dir.$user->__get('user_payment') : $default;
						if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/document/230x170?color=3fc46b,fefefe';
                            
                        ?>	                    
	            		<img src="<?php echo $image;?>" class="images right" title="Copy of payment">
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
	<p> I <input type="text" class="legal" placeholder="Name of Director or Legal representative" name="user_name_accept" value="<?php echo $user->__get('user_name_accept');?>" />Identified with
		<input type="text" class="doc" placeholder="Identity Document" name="user_document_accept" value="<?php echo $user->__get('user_document_accept');?>"   /> 
	declare to have knowledge and accept<a href="documentos/Reglamento.pdf" title="Consult the Terms and Conditions of Participation" target="_blank"> the Terms and Conditions of Participation regulations </a> of artBO.
	</p>
	
	<input type="checkbox" name="user_accept" value="1" <?php if($user->__get('user_accept') == 1) { echo 'checked="checked"'; }?> /><span> I accept the terms and conditions of participation of artBO.</span>
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
            uploadButton: '<i class="icon-plus icon-white"></i> Select file'
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
            uploadButton: '<i class="icon-plus icon-white"></i> Select file'
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
            uploadButton: '<i class="icon-plus icon-white"></i> Select file'
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
            uploadButton: '<i class="icon-plus icon-white"></i> Select file'
          }
        });				
      });
    </script> 