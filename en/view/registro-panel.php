<?php
$countries	= CountryHelper::retrieveCountries(" AND country_activated = 1 ORDER by country_name");
$phone		= explode("-", $user->__get('user_phone'));
$mobile		= explode("-", $user->__get('user_mobile'));
?>
<!-- Panel Datos Contacto -->
<div class="six columns">
	<div class="panel-2"><!-- panel -->	
			
		<!-- País: Este campo se pregunta si la galería no tiene NiT, es decir si es extranjera -->
		<div class="mid-input">
			<label><strong>Country*</strong></label>	
				<select name="country_id">
					<option>Select</option>
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
		</div>
		<!-- End País -->
		
		<!-- Ciudad -->
		<div class="mid-input">
			<label><strong> City*</strong></label>	
			<input type="text" name="user_city" class="expand input-text" value="<?php echo $user->__get('user_city');?>"/>
		</div>
		<!-- End Ciudad -->
		
			
		<!-- Dirección -->
		<div class="mid-input">
			<label><strong> Address*</strong></label>	
			<input type="text"  name="user_address"  class="expand input-text" value="<?php echo $user->__get('user_address');?>"/>
		</div>
		<!-- End Dirección -->
		
		<!-- Código Postal: Este campo se pregunta si la galería no tiene NiT, es decir si es extranjera -->
		<div class="mid-input">
			<label><strong> Postal Code*</strong></label>	
			<input type="text"  name="user_postal_code" class="expand input-text" value="<?php echo $user->__get('user_postal_code');?>"/>
		</div>
		<!-- End Ciudad -->
		<!-- Teléfono -->
		<div class="mid-input">
		<strong>Telephone Number*</strong>
			<div class="row">
				<!-- columns 1/3 codigo pais -->
				<div class="four columns">
					<label>Country code</label>	
					<input type="text" placeholder="57" name="phone_0" class="small input-text" value="<?php echo (isset($phone[0])) ? $phone[0] : '';?>"/>
				</div>
				<!--END columns 1/3  codigo pais-->
				<!-- columns 2/3  Area-->
				<div class="four columns">
					<label>Area</label>	
					<input type="text" name="phone_1" class="small input-text" value="<?php echo (isset($phone[1])) ? $phone[1] : '';?>" />
				</div>
				<!-- END columns 2/3 Area-->
				<!-- columns 3/3 Telefono-->
				<div class="four columns">
					<label>Number</label>	
					<input type="text" name="phone_2" class="expand input-text" value="<?php echo (isset($phone[2])) ? $phone[2] : '';?>" />
				</div>
				<!--END columns 3/3 Telefono -->
			</div>
		</div>
		<!-- END telefono -->
		<!-- celular -->
		<strong>Mobile</strong>
		<!-- row -->
		<div class="row">
			<!-- columns 1/3 -->
			<div class="four columns">
				<label>Country code</label>	
				<input type="text" placeholder="57" name="mobile_0"  class="small input-text"  value="<?php echo (isset($mobile[0])) ? $mobile[0] : '';?>" />	
			</div>
			<!-- END columns 1/3 -->
			<!-- columns 2/3 -->
			<div class="four columns">
				<label>Area</label>	
				<input type="text"  class="small input-text" name="mobile_1"  value="<?php echo (isset($mobile[1])) ? $mobile[1] : '';?>" />
			</div>
			<!--END columns 2/3 -->
			<!-- columns 3/3 -->
			<div class="four columns">
				<label>Mobile number</label>	
				<input type="text" class="expand input-text" name="mobile_2" value="<?php echo (isset($mobile[2])) ? $mobile[2] : '';?>" />
			</div>
			<!-- END columns 3/3 -->
		</div>
		<!-- END row -->
		<!-- END celular -->
	</div><!-- End panel -->
	
	
	<!-- director panel -->
	<div class="panel-2"><!-- panel -->	
			
		<!-- Nombre del director -->
		<div class="mid-input">
			<label><strong>Name of the director*</strong></label>	
			<input type="text" name="user_director_name" class="expand input-text" value="<?php echo $user->__get('user_director_name');?>" />
		</div>
		<!-- End Nombre del director -->
		<label><strong>18.	Photo of director </strong></label>
		<?php
		if($user->__get('user_director_image') != '')
		{
			?>
			<img src="<?php echo APPLICATION_URL?>resources/images/50x50/<?php echo $user->__get('user_director_image');?>" class="left"  height="50" width="50" alt="profile"/>
			<?php
		}
		?>
		<input type="file" name="user_director_image" /><br />
		<span>Images can be uploaded in .jpg, .png or .gif files</span>
		<hr />
		
		<!-- Email del director -->
		<div class="mid-input">
			<label><strong>Email of the director*</strong></label>	
			<input type="text" name="user_director_email" class="expand input-text" value="<?php echo $user->__get('user_director_email');?>" />
		</div>
		<!-- End Email del director -->
			
		<!-- Nombre de contacto -->
		<div class="mid-input">
			<label><strong>Name of the contact*</strong></label>	
			<input type="text" name="user_contact_name" class="expand input-text" value="<?php echo $user->__get('user_contact_name');?>" />
		</div>
		<!-- End Nombre de contacto -->
		
		<!-- Email contacto -->
		<div class="mid-input">
			<label><strong>Email contact*</strong></label>	
			<input type="text" name="user_contact_email" class="expand input-text" value="<?php echo $user->__get('user_contact_email');?>" />
		</div>
		<!-- End Email contacto-->

		
	</div><!-- End panel -->
	<!-- END director panel -->
	
</div>	
<!-- End  Panel Datos Contacto -->
