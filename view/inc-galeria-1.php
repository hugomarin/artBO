<?php
$countries	= CountryHelper::retrieveCountries(" AND country_activated = 1 ORDER by country_name");
$phone		= explode("-", $user->__get('user_phone'));
$mobile		= explode("-", $user->__get('user_mobile'));
$dir		= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$default	= 'http://cambelt.co/icon/camera/480x360?color=b71632,fefefe';
//VER CAMPOS REQUERIDOS
$required	= array();
$fields		= UserFieldHelper::retrieveUserFields();
foreach ($fields as $field)
	$required[$field->__get('field_name')]	= 1;
// VALIDAR ERRORES
$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 1");
function decide($field, $required, $user)
{
	if (!isset($required[$field]))
		return '';
	else
	{
		if (($user->__get($field) == '') || ($user->__get($field) == '0') || ($user->__get($field) == "NULL"))
			return 'error';
		else
			return '';
	}
}
?>
 
	<div class="row">
		<div class="six columns">
			<div class="mid-input gallery-image">
				<label title="Cargue la imagen correspondiente a su galería"><span class="asterix">*</span>Imagen de la galería</label>
				<!-- <i>Imagen del espacio expositivo</i>
				<br /> -->
                <?php
				$image	= (($user->__get('user_gallery_image') != '') && (!file_exists(APPLICATION_URL.$dir.$user->__get('user_gallery_image')))) ? APPLICATION_URL.$dir.$user->__get('user_gallery_image') : $default;
				?>
				<img src="<?php echo $image;?>" class="images" title="Imagen de la Galería">                
				<caption class="caption">Puede subir imagen de la última exposición realizada en su galería en .JPG, .PDF o .PNG. El archivo no debe superar los 1000 KB.</caption><br />
                <div id="user_gallery_image"></div>
                                            
                <br />
			</div><!--/gallery-image-->
			
		</div><!--/six columns-->
		
		<div class="six columns">
			<div class="mid-input galleryname-data">
				<label><span class="asterix">*</span>Nombre comercial de la galería</label>	
				<input type="text" name="user_gallery_comname" class="expand input-text <?php echo decide('user_gallery_comname', $required, $user);?>" value="<?php echo $user->__get('user_gallery_comname');?>" title="Digite el nombre comercial de la galería"/>
			</div><!--/ galleryname-data-->
			
			
				<div class="mid-input companyname-data">
					<label><span class="asterix">*</span>Nombre de la empresa o razón social</label>	
					<input type="text" name="user_gallery_razon" class="expand input-text <?php echo decide('user_gallery_razon', $required, $user);?>" value="<?php echo $user->__get('user_gallery_razon');?>" title="Digite el nombre de la empresa o razón social"/>
					<caption class="caption"><strong>Nota:</strong> Con esta información se procederá a realizar la facturación correspondiente.</caption>
				</div><!--/companyname-data-->
			<div class="block">	
				<div class="mid-input doctype-data">
					<label><span class="asterix">*</span>Tipo de documento</label>	
					<select name="user_document_type" class="<?php echo decide('user_document_type', $required, $user);?>">
						<option value="NULL">Seleccione</option>
						<option value="NIT" <?php if ($user->__get('user_document_type') == 'NIT') echo 'selected="SELECTED"';?>>NIT</option>
						<option value="RUT" <?php if ($user->__get('user_document_type') == 'RUT') echo 'selected="SELECTED"';?>>No. de identificación fiscal de su país</option>
					</select>
				</div><!--/doctype-data-->
			
				<div class="mid-input docnumber-data">
					<label><span class="asterix">*</span> Número de documento</label>	
					<input type="text" name="user_gallery_document" class="expand input-text <?php echo decide('user_gallery_document', $required, $user);?>" value="<?php echo $user->__get('user_gallery_document');?>" title="Digite el número del documento"/>
				</div><!--/companyname-data-->
			</div>
			<p class="caption"><strong>Nota:</strong> Tenga en cuenta que con número de identificación, también se registrará el ingreso de mercancía de sus obras, equipos y otros a Corferias.</p>
			
			<div class="mid-input website-data">
				<label>Página web</label>	
				<input type="text" name="user_gallery_website" class="expand input-text" value="<?php echo $user->__get('user_gallery_website');?>" title="Digite la dirección electrónica de su página web"/>
			</div><!--/website-data-->
		</div><!--/six columns-->
	</div><!--/row-->
	<hr />
	<div class="row">
		<div class="six columns">
			
			<div class="mid-input country-data">
			<label><span class="asterix">*</span>País</label>	
				<select name="country_id" title="Seleccione el país" class="<?php echo decide('country_id', $required, $user);?>">
					<option value="NULL">Seleccione</option>
					<?php
					foreach ($countries as $country)
					{
						$selected = ($country->__get('country_id') == $user->__get('country_id')) ? 'selected="selected"' : '';
					?>
			        	<option value="<?php echo $country->__get('country_id')?>" <?php echo $selected;?>><?php echo utf8_encode($country->__get('country_name'));?></option>
			        <?php
					}
					?>
				</select>
			</div><!--/country-data-->
			
			<div class="mid-input city-data">
				<label><span class="asterix">*</span>Ciudad</label>	
				<input type="text" name="user_city" class="expand input-text <?php echo decide('user_city', $required, $user);?>" value="<?php echo $user->__get('user_city');?>" title="Digite la ciudad"/>
			</div><!--/city-data-->
			
				
			<div class="mid-input address-data">
				<label><span class="asterix">*</span>Direcci&oacute;n</label>	
				<input type="text"  name="user_address"  class="expand input-text <?php echo decide('user_address', $required, $user);?>" value="<?php echo $user->__get('user_address');?>" title="Digite la dirección"/>
			</div><!--/address-date-->
			
			<div class="mid-input postalcode-data">
				<label><span class="asterix">*</span>Código postal</label>	
				<input type="text"  name="user_postal_code" class="expand input-text <?php echo decide('user_postal_code', $required, $user);?>" value="<?php echo $user->__get('user_postal_code');?>" title="Digite el código postal" 
				/>
			</div><!--/postalcode-data-->

		</div><!--/six columns-->
		
		<div class="six columns">
			<div class="mid-input telephone-data">
				<label><span class="asterix">*</span>Teléfono</label>
				<div class="row">
					<div class="four columns">
						<label>Código país</label>	
						<input type="text" placeholder="57" name="phone_0" class="small input-text <?php echo decide('user_phone', $required, $user);?>" title="Digite el código de país" value="<?php echo (isset($phone[0])) ? $phone[0] : '';?>"/>
					</div>
					<div class="four columns">
						<label>Área</label>	
						<input type="text" name="phone_1" class="small input-text <?php echo decide('user_phone', $required, $user);?>" title="Digite el código de área" value="<?php echo (isset($phone[1])) ? $phone[1] : '';?>" />
					</div>
					<div class="four columns">
						<label>Número de teléfono</label>	
						<input type="text" name="phone_2" class="expand input-text <?php echo decide('user_phone', $required, $user);?>" title="Digite el número de teléfono" value="<?php echo (isset($phone[2])) ? $phone[2] : '';?>" />
					</div>
				</div>
			</div><!--/telephone-data-->
			
			<div class="mid-input mobil-data">
				<label>Móvil</label>
				<div class="row">
					<div class="four columns">
						<label>Código país</label>	
						<input type="text" placeholder="57" name="mobile_0"  class="small input-text" title="Digite el código de país" value="<?php echo (isset($mobile[0])) ? $mobile[0] : '';?>" />	
					</div>
					<div class="four columns">
						<label>Área</label>	
						<input type="text"  class="small input-text" name="mobile_1" title="Digite el código de área" value="<?php echo (isset($mobile[1])) ? $mobile[1] : '';?>" />
					</div>
					<div class="four columns">
						<label>Número móvil</label>	
						<input type="text" class="expand input-text" name="mobile_2" title="Digite el número de teléfono" value="<?php echo (isset($mobile[2])) ? $mobile[2] : '';?>" />
					</div>
				</div>
			</div><!--/mobil-data-->
		
		</div><!--/six columns-->
		
	</div><!--/row-->


	<div class="row">
	
		<div class="six columns">
			<div class="mid-input review-data">
				<label><span class="asterix">*</span>Reseña de la galería</label>
				<span class="caption"><strong>Nota: </strong>Un breve texto (máximo 500 palabras) sobre la Galería</span>
				<textarea name="user_abstract" title="Digite el texto correspondiente a la reseña de la galería"  class="expand <?php echo decide('user_abstract', $required, $user);?>" rows="10" ><?php echo $user->__get('user_abstract');?></textarea>
			</div><!--/review-data-->
		</div><!--/six columns-->
		
		<div class="six columns">
			<div class="row">
				<div class="six columns">
					<div class="mid-input schedule-data">
						<label><span class="asterix">*</span>Horario de apertura al público (0:00 - 24:00)</label>
						<input name="user_open_time" type="text" title="Digite los horarios de apertura <?php echo decide('user_abstract', $required, $user);?>" value="<?php echo $user->__get('user_open_time');?>" class="small input-text expand" />
					</div><!--/schedule-data-->
				</div>
				<div class="six columns">	
					<div class="mid-input area-data">
						<label><span class="asterix">*</span>Área de exposición de la galería (mts<sup>2</sup>)</label>
						<input name="user_area" type="text" title=": Indique el área de exposición de la galería" value="<?php echo $user->__get('user_area');?>" class="small input-text expand <?php echo decide('user_area', $required, $user);?>" />
					</div><!--/area-data-->
				</div>
			</div><!--/row-->
			
			<div class="row">
				<div class="six columns">
					<div class="mid-input year-data">
						<label><span class="asterix">*</span>Año de apertura</label>
						<select name="user_open_year" title="Seleccione el año de apertura">
						  <option SELECTED>Seleccione</option>
					      <?php 
						  for ($i = 2012; $i > 1960; $i--)
						  {
							  $selected = ($i == $user->__get('user_open_year')) ? 'selected="selected"' : ''; 
						  ?>
					      	<option value="<?php echo $i;?>" <?php echo $selected;?>><?php echo $i;?></option>
					      <?php	
						  }
						  ?>
						</select>
					</div><!--/year-data-->
				</div>

				<div class="six columns">
					<div class="mid-input galleryprofile-data">
						<label><span class="asterix">*</span>Perfil  de la galería</label>
						<select name="user_gallery_profile" title="Seleccione el perfil de la galería" class="<?php echo decide('user_gallery_profile', $required, $user);?>" onchange="if (this.value == 'Otro') { document.getElementById('hiddenField').style.display=''; } else { document.getElementById('hiddenField').style.display='none'; } ">
						  <option value="NULL">Seleccione</option>
                          <option value="Moderno" <?php if ($user->__get('user_gallery_profile') == 'Moderno') echo 'SELECTED="SELECTED"';?>>Moderno</option>
                          <option value="Contemporáneo" <?php if ($user->__get('user_gallery_profile') == 'Contemporáneo') echo 'SELECTED="SELECTED"';?>>Contemporáneo</option>
                          <option value="Fotografía" <?php if ($user->__get('user_gallery_profile') == 'Fotografía') echo 'SELECTED="SELECTED"';?>>Fotografía</option>
                          <option value="Experimental/nuevos medios" <?php if ($user->__get('user_gallery_profile') == 'Experimental/nuevos medios') echo 'SELECTED="SELECTED"';?>>Experimental/nuevos medios</option>
                          <option value="Otro" <?php if ($user->__get('user_gallery_profile') == 'Otro') echo 'SELECTED="SELECTED"';?>>Otro</option>
						</select>
                        <div id="hiddenField" <?php if ($user->__get('user_gallery_profile') != 'Otro') { echo 'style="display:none;"'; } ?>>
						<label><span class="asterix">*</span>¿Cuál?</label>
						<input name="user_other" type="text" title="" value="<?php echo $user->__get('user_other');?>" class="small input-text expand" />
						</div>
                    </div><!--/year-data-->
				</div>
				
			</div><!--/row-->
		</div><!--/six columns-->
		
	</div><!--/row-->

	<div class="row">
			<div class="six columns">
				<div class="mid-input director-image">
					<label><span class="asterix">*</span>Foto del director</label>
					<?php
                    $image	= (($user->__get('user_director_image') != '') && (!file_exists(APPLICATION_URL.$dir.$user->__get('user_director_image')))) ? APPLICATION_URL.$dir.$user->__get('user_director_image') : $default;
                        
                    ?>
                    <img src="<?php echo $image;?>" class="images" title="Imagen del director">                
                    <caption class="caption">Puede subir imagen de la última exposición realizada en su galería en .JPG, .PDF o .PNG. El archivo no debe superar los 1000 KB.</caption><br />
                    <div id="user_director_image"></div>                    
				</div><!--/gallery-image-->
			</div><!--/six columns-->
			
			<div class="six columns">
				<div class="mid-input directorname-data">
					<label><span class="asterix">*</span>Nombre(s) completo del director</label>	
					<input type="text" name="user_director_name" class="expand input-text <?php echo decide('user_director_name', $required, $user);?>" title="Digite el nombre completo del director" value="<?php echo $user->__get('user_director_name');?>" />
					<caption class="caption">Nota: Si hay más de un director o persona de contacto, separe los datos con comas.</caption>
				</div><!--/directorname-data-->
					
				<div class="mid-input emaildirector-data">
					<label><span class="asterix">*</span>Correo(s) electrónico del director</label>	
					<input type="text" name="user_director_email" class="expand input-text <?php echo decide('user_director_email', $required, $user);?>" title="Digite el correo electrónico del director" value="<?php echo $user->__get('user_director_email');?>" />
				</div><!--/emaildirector-data-->
					
				<div class="mid-input contactname-data">
					<label><span class="asterix">*</span>Nombre(s) persona contacto</label>	
					<input type="text" name="user_contact_name" class="expand input-text <?php echo decide('user_contact_name', $required, $user);?>" title="Digite el(los) nombre(s) de la persona contacto" value="<?php echo $user->__get('user_contact_name');?>" />
				</div><!--/contactname-data-->
				
				<div class="mid-input contactmail-data">
					<label><span class="asterix">*</span>Correo(s) electrónico contacto</label>	
					<input type="text" name="user_contact_email" class="expand input-text <?php echo decide('user_contact_email', $required, $user);?>" title="Correo electrónico persona contacto" value="<?php echo $user->__get('user_contact_email');?>" />
				</div><!--/contactmail-data-->
			</div><!--/six columns-->
	
	</div><!--/row-->
	<script>
      $(document).ready(function() {
        var manualuploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_gallery_image')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_gallery_image.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });
        var seconduploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_director_image')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_director_image.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });		
      });
   </script>  
	
	
	
	
