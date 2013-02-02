<div class="six columns">
	<!-- reseña -->
	<strong><span class="asterix">*</span>Reseña de la galería</strong>
	<label>Un breve texto (máx 500 palabras) sobre la Galería</label>
	<textarea name="user_abstract"  class="expand" rows="10" ><?php echo $user->__get('user_abstract');?></textarea>
	<!-- /reseña -->

	<br />
	
	<div class="row">
		<div class="six columns">
			<!-- horario -->
			<strong><span class="asterix">*</span>Horario de apertura al publico (0:00 - 24:00)</strong>
			<input name="user_open_time" type="text" value="<?php echo $user->__get('user_open_time');?>" class="small input-text expand" />
			<!-- /horario -->
		</div>
		<div class="six columns">	
			<!-- mts -->
			<strong><span class="asterix">*</span>Área de exposición de la galería (m2)</strong>
			<input name="user_area" type="text" value="<?php echo $user->__get('user_area');?>" class="small input-text expand" />
			<!-- /mts -->
		</div>
	</div>
	<!-- año apertura -->
	<strong><span class="asterix">*</span>Año de apertura</strong>
	<select name="user_open_year">
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
	<!-- /año apertura -->

	
</div>