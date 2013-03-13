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
				<label title="Upload Gallery image"><span class="asterix">*</span>Gallery image</label>
				<!-- <i>Imagen del espacio expositivo</i>
				<br /> -->
                <?php
				$image	= (($user->__get('user_gallery_image') != '') && (!file_exists(APPLICATION_URL.$dir.$user->__get('user_gallery_image')))) ? APPLICATION_URL.$dir.$user->__get('user_gallery_image') : $default;
				?>
				<img src="<?php echo $image;?>" class="images" title="Gallery image">                
				<p class="caption">You can upload an image of the last exhibition held at your gallery in .jpg, .png or .gif. The file must not exceed 1000 KB.</p><br />
                <div id="user_gallery_image"></div>
                                            
                <br />
			</div><!--/gallery-image-->
			
		</div><!--/six columns-->
		
		<div class="six columns">
			<div class="mid-input galleryname-data">
				<label><span class="asterix">*</span>Commercial Name of the Gallery</label>	
				<input type="text" name="user_gallery_comname" class="expand input-text <?php echo decide('user_gallery_comname', $required, $user);?>" value="<?php echo $user->__get('user_gallery_comname');?>" title="Enter the commercial name of the gallery"/>
			</div><!--/ galleryname-data-->
			
			
				<div class="mid-input companyname-data">
					<label><span class="asterix">*</span>Company Name or Business Name</label>	
					<input type="text" name="user_gallery_razon" class="expand input-text <?php echo decide('user_gallery_razon', $required, $user);?>" value="<?php echo $user->__get('user_gallery_razon');?>" title="Enter the company name or business name"/>
					<p class="caption"><strong>Note:</strong> This name will be used for billing.</p>
				</div><!--/companyname-data-->
			<div class="block">	
				<div class="mid-input doctype-data">
					<label><span class="asterix">*</span>Type of Document</label>	
					<select name="user_document_type" class="<?php echo decide('user_document_type', $required, $user);?>">
						<option value="NULL">Select Tax identification</option>
						<option value="NIT" <?php if ($user->__get('user_document_type') == 'NIT') echo 'selected="SELECTED"';?>>NIT</option>
						<option value="RUT" <?php if ($user->__get('user_document_type') == 'RUT') echo 'selected="SELECTED"';?>>Number in your country</option>
					</select>
				</div><!--/doctype-data-->
			
				<div class="mid-input docnumber-data">
					<label><span class="asterix">*</span> Number of the Document</label>	
					<input type="text" name="user_gallery_document" class="expand input-text <?php echo decide('user_gallery_document', $required, $user);?>" value="<?php echo $user->__get('user_gallery_document');?>" title="Enter the number of your document"/>
				</div><!--/companyname-data-->
			</div>
			<p class="caption"><strong>Note:</strong>This number will be used to register the entry of the works, goods and equipment to Corferias, the fair venue.</p>
			
			<div class="mid-input website-data">
				<label>Webpage</label>
				<input type="text" name="user_gallery_website" class="expand input-text" value="<?php echo $user->__get('user_gallery_website');?>" title="Enter the webpage"/>
			</div><!--/website-data-->
		</div><!--/six columns-->
	</div><!--/row-->
	<hr />
	<div class="row">
		<div class="six columns">
			
			<div class="mid-input country-data">
			<label><span class="asterix">*</span>Country</label>	
				<select name="country_id" title="Enter the country" class="<?php echo decide('country_id', $required, $user);?>">
					<option value="NULL">Select</option>
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
				<label><span class="asterix">*</span>City</label>	
				<input type="text" name="user_city" class="expand input-text <?php echo decide('user_city', $required, $user);?>" value="<?php echo $user->__get('user_city');?>" title="Enter the city"/>
			</div><!--/city-data-->
			
				
			<div class="mid-input address-data">
				<label><span class="asterix">*</span>Address</label>	
				<input type="text"  name="user_address"  class="expand input-text <?php echo decide('user_address', $required, $user);?>" value="<?php echo $user->__get('user_address');?>" title="Enter the address"/>
			</div><!--/address-date-->
			
			<div class="mid-input postalcode-data">
				<label><span class="asterix">*</span>Postal Code</label>	
				<input type="text"  name="user_postal_code" class="expand input-text <?php echo decide('user_postal_code', $required, $user);?>" value="<?php echo $user->__get('user_postal_code');?>" title="Enter the ZIP code" 
				/>
			</div><!--/postalcode-data-->

		</div><!--/six columns-->
		
		<div class="six columns">
			<div class="mid-input telephone-data">
				<label><span class="asterix">*</span>Telephone Number</label>
				<div class="row">
					<div class="four columns">
						<label>Country code</label>	
						<input type="text" placeholder="57" name="phone_0" class="small input-text <?php echo decide('user_phone', $required, $user);?>" title="Enter the country code" value="<?php echo (isset($phone[0])) ? $phone[0] : '';?>"/>
					</div>
					<div class="four columns">
						<label>Area</label>	
						<input type="text" name="phone_1" class="small input-text <?php echo decide('user_phone', $required, $user);?>" title="Enter the area code" value="<?php echo (isset($phone[1])) ? $phone[1] : '';?>" />
					</div>
					<div class="four columns">
						<label>Number</label>	
						<input type="text" name="phone_2" class="expand input-text <?php echo decide('user_phone', $required, $user);?>" title="Enter the telephone number" value="<?php echo (isset($phone[2])) ? $phone[2] : '';?>" />
					</div>
				</div>
			</div><!--/telephone-data-->
			
			<div class="mid-input mobil-data">
				<label>Mobile</label>
				<div class="row">
					<div class="four columns">
						<label>Country Code</label>	
						<input type="text" placeholder="57" name="mobile_0"  class="small input-text" title="Enter the country code" value="<?php echo (isset($mobile[0])) ? $mobile[0] : '';?>" />	
					</div>
					<div class="four columns">
						<label>Area</label>	
						<input type="text"  class="small input-text" name="mobile_1" title="Enter the area code" value="<?php echo (isset($mobile[1])) ? $mobile[1] : '';?>" />
					</div>
					<div class="four columns">
						<label>Mobile Number</label>	
						<input type="text" class="expand input-text" name="mobile_2" title="Enter the telephone number" value="<?php echo (isset($mobile[2])) ? $mobile[2] : '';?>" />
					</div>
				</div>
			</div><!--/mobil-data-->
		
		</div><!--/six columns-->
		
	</div><!--/row-->


	<div class="row">
	
		<div class="six columns">
			<div class="mid-input review-data">
				<label><span class="asterix">*</span>Gallery Review</label>
				<span class="caption"><strong>Note: </strong>A brief text (500 words maximum) on the gallery</span>
				<textarea name="user_abstract" title="Enter Gallery Review"  class="expand <?php echo decide('user_abstract', $required, $user);?>" rows="10" ><?php echo $user->__get('user_abstract');?></textarea>
			</div><!--/review-data-->
		</div><!--/six columns-->
		
		<div class="six columns">
			<div class="row">
				<div class="six columns">
					<div class="mid-input schedule-data">
						<label><span class="asterix">*</span>Hours open to the public (0:00 - 24:00)</label>
						<input name="user_open_time" type="text" title="Enter Hours open to the public <?php echo decide('user_abstract', $required, $user);?>" value="<?php echo $user->__get('user_open_time');?>" class="small input-text expand" />
					</div><!--/schedule-data-->
				</div>
				<div class="six columns">	
					<div class="mid-input area-data">
						<label><span class="asterix">*</span>Exhibition area of the gallery (mts<sup>2</sup>)</label>
						<input name="user_area" type="text" title="Enter Exhibition area of the gallery" value="<?php echo $user->__get('user_area');?>" class="small input-text expand <?php echo decide('user_area', $required, $user);?>" />
					</div><!--/area-data-->
				</div>
			</div><!--/row-->
			
			<div class="row">
				<div class="six columns">
					<div class="mid-input year-data">
						<label><span class="asterix">*</span>Opening year</label>
						<select name="user_open_year" title="Enter opening year">
						  <option SELECTED>Select</option>
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
						<label><span class="asterix">*</span>Gallery profile</label>
						<select name="user_gallery_profile" title="enter Gallery profile" class="<?php echo decide('user_gallery_profile', $required, $user);?>" onchange="if (this.value == 'Otro') { document.getElementById('hiddenField').style.display=''; } else { document.getElementById('hiddenField').style.display='none'; } ">
						  <option value="NULL">Select</option>
                          <option value="Modern" <?php if ($user->__get('user_gallery_profile') == 'Moderno') echo 'SELECTED="SELECTED"';?>>Modern</option>
                          <option value="Contemporary" <?php if ($user->__get('user_gallery_profile') == 'Contemporáneo') echo 'SELECTED="SELECTED"';?>>Contemporary</option>
                          <option value="Photography" <?php if ($user->__get('user_gallery_profile') == 'Fotografía') echo 'SELECTED="SELECTED"';?>>Photography</option>
                          <option value="Experimental/Media arts" <?php if ($user->__get('user_gallery_profile') == 'Experimental/nuevos medios') echo 'SELECTED="SELECTED"';?>>Experimental/Media arts</option>
                          <option value="Other" <?php if ($user->__get('user_gallery_profile') == 'Otro') echo 'SELECTED="SELECTED"';?>>Other</option>
						</select>
                        <div id="hiddenField" <?php if ($user->__get('user_gallery_profile') != 'Otro') { echo 'style="display:none;"'; } ?>>
						<label><span class="asterix">*</span>¿Which one?</label>
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
					<label><span class="asterix">*</span>Photo of Director</label>
					<?php
                    $image	= (($user->__get('user_director_image') != '') && (!file_exists(APPLICATION_URL.$dir.$user->__get('user_director_image')))) ? APPLICATION_URL.$dir.$user->__get('user_director_image') : $default;
                        
                    ?>
                    <img src="<?php echo $image;?>" class="images" title="Imagen del director">                
                    <p class="caption">Images can be uploaded in .jpg, .png or .gif files</p><br />
                    <div id="user_director_image"></div>                    
				</div><!--/gallery-image-->
			</div><!--/six columns-->
			
			<div class="six columns">
				<div class="mid-input directorname-data">
					<label><span class="asterix">*</span>Name(s) of the Director</label>	
					<input type="text" name="user_director_name" class="expand input-text <?php echo decide('user_director_name', $required, $user);?>" title="Enter the full name of the directo" value="<?php echo $user->__get('user_director_name');?>" />
					<p class="caption"><strong>Note:</strong> If there is more than one director or contact person, please separate the data with comas</p>
				</div><!--/directorname-data-->
					
				<div class="mid-input emaildirector-data">
					<label><span class="asterix">*</span>Email(s) of the Director</label>	
					<input type="text" name="user_director_email" class="expand input-text <?php echo decide('user_director_email', $required, $user);?>" title="Enter the email of the director" value="<?php echo $user->__get('user_director_email');?>" />
				</div><!--/emaildirector-data-->
					
				<div class="mid-input contactname-data">
					<label><span class="asterix">*</span>Name(s) of the Contact</label>	
					<input type="text" name="user_contact_name" class="expand input-text <?php echo decide('user_contact_name', $required, $user);?>" title="Enter the name of the contact person" value="<?php echo $user->__get('user_contact_name');?>" />
				</div><!--/contactname-data-->
				
				<div class="mid-input contactmail-data">
					<label><span class="asterix">*</span>Email Contact</label>	
					<input type="text" name="user_contact_email" class="expand input-text <?php echo decide('user_contact_email', $required, $user);?>" title="Enter the email of the contact person" value="<?php echo $user->__get('user_contact_email');?>" />
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
            uploadButton: '<i class="icon-plus icon-white"></i> Select File'
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
            uploadButton: '<i class="icon-plus icon-white"></i> Select file'
          }
        });		
      });
   </script>  
	
	
	
	