<input type="hidden" name="user_stand_type" value="<?php echo $user->__get('user_stand_type')?>" id="selectedStand" />
                
<div class="row">
	<div class="twelve columns">
	<ul class="block-grid five-up stand-items">
	
    <?php
	if ($user->__get('user_gallery_type') != 2)
	{
	?>
        <li>
            <img src="<?php echo APPLICATION_URL?>images/63.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 1) echo 'style="border-color:#FF0000;"'; ?>/>
                
            <h4 id="h4-1">Plus 63 mts2</h4>
            <p>USD$15.498.00</p>
	            
	            <div class="mid-input standname-data">
					<label>Nombre para la cornisa del stand</label>	
					<input type="text" name="" class="expand input-text" title="Indique el nombre que deberá aparecer en la cornisa del stand" value="" />
				</div><!--/directorname-data-->
				
            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='1'; document.getElementById('validable').submit(); " class="round small button">Seleccionar</a>
        </li>
        
         <li>
            <img src="<?php echo APPLICATION_URL?>images/63.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 2) echo 'style="border-color:#FF0000;"'; ?>/>
                
            <h4>63 mts2</h4>
            <p>USD$14.301.00</p>
            
	            <div class="mid-input standname-data">
					<label>Nombre para la cornisa del stand</label>	
					<input type="text" name="" class="expand input-text" title="Indique el nombre que deberá aparecer en la cornisa del stand" value="" />
				</div><!--/directorname-data-->
            
            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='2'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
        </li>

        <li>
            <img src="<?php echo APPLICATION_URL?>images/45.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 3) echo 'style="border-color:#FF0000;"'; ?>/>
                
            <h4>45 mts2</h4>
            <p>USD$10.215.00</p>
            
	            <div class="mid-input standname-data">
					<label>Nombre para la cornisa del stand</label>	
					<input type="text" name="" class="expand input-text" title="Indique el nombre que deberá aparecer en la cornisa del stand" value="" />
				</div><!--/directorname-data--> 
           
            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='3'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
         </li>
        
        
        
         <li>
            <img src="<?php echo APPLICATION_URL?>images/33.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 4) echo 'style="border-color:#FF0000;"'; ?>/>
                
            <h4>33.75 mts2</h4>
            <p>USD$7.661.00</p>
            
 	            <div class="mid-input standname-data">
					<label>Nombre para la cornisa del stand</label>	
					<input type="text" name="" class="expand input-text" title="Indique el nombre que deberá aparecer en la cornisa del stand" value="" />
				</div><!--/directorname-data-->
            
            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='4'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
         </li>
         
         
         <li>
            <img src="<?php echo APPLICATION_URL?>images/31.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 5) echo 'style="border-color:#FF0000;"'; ?>/>
                
            <h4>31,50 mts2</h4>
            <p>USD$ 7.749.00</p>
            
 	            <div class="mid-input standname-data">
					<label>Nombre para la cornisa del stand</label>	
					<input type="text" name="" class="expand input-text" title="Indique el nombre que deberá aparecer en la cornisa del stand" value="" />
				</div><!--/directorname-data-->
            
            
            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='5'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
        </li>
	<?php
	}
	
	
	else
	{
	?>
	
		<li>
			<img src="<?php echo APPLICATION_URL?>images/21.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 6) echo 'style="border-color:#FF0000;"'; ?>/>	
				
				
			<h4>21 mts2</h4>
			<p>USD$ 5.166.00</p>
			
	            <div class="mid-input standname-data">
					<label>Nombre para la cornisa del stand</label>	
					<input type="text" name="" class="expand input-text" title="Indique el nombre que deberá aparecer en la cornisa del stand" value="" />
				</div><!--/directorname-data-->
			
			<a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='6'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
		</li>
	<?php
	}
	?>
	</ul>
	</div><!--/twelve columns-->
</div><!--/row-->
