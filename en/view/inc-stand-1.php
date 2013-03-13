<input type="hidden" name="user_stand_type" value="<?php echo $user->__get('user_stand_type')?>" id="selectedStand" />
                
<div class="row">
	<div class="twelve columns">
	<ul class="block-grid four-up stand-items">
	
    <?php
	if ($user->__get('user_gallery_type') != 2)
	{
	?>
        <li>
            <img src="<?php echo APPLICATION_URL?>images/63.jpg" class="images <?php if ($user->__get('user_stand_type') == 1) echo 'selected'; ?>" width="200" height="200" alt="default"/>
                
            <h4 id="h4-1">Plus 63 mts<sup>2</sup>(Corner)</h4>
            <p>USD$15,498.00</p>
	            
	            <div class="mid-input standname-data">
					<label>Name with which you wish to appear on your stand</label>	
					<input type="text" name="cornisa_1" class="expand input-text" value="<?php echo $user->__get('user_space_name');?>" title="Name with which you wish to appear on your stand"  />
				</div><!--/directorname-data-->
				
            <a href="javascript:void(0);" data-stand="1" class="round small button <?php if ($user->__get('user_stand_type') == 1) echo 'nulled'; ?>">Select</a>
        </li>
        
         <li>
            <img src="<?php echo APPLICATION_URL?>images/63.jpg" class="images <?php if ($user->__get('user_stand_type') == 2) echo 'selected'; ?>" width="200" height="200" alt="default"/>
                
            <h4>63 mts<sup>2</sup></h4>
            <p>USD$14,301.00</p>
            
	            <div class="mid-input standname-data">
					<label>Name with which you wish to appear on your stand</label>	
					<input type="text" name="cornisa_2" class="expand input-text" value="<?php echo $user->__get('user_space_name');?>" title="Name with which you wish to appear on your stand"  />
				</div><!--/directorname-data-->
            
            <a href="javascript:void(0);" data-stand="2" class="round small button  <?php if ($user->__get('user_stand_type') == 2) echo 'nulled'; ?>">Select</a>
        </li>

        <li>
            <img src="<?php echo APPLICATION_URL?>images/45.jpg" class="images <?php if ($user->__get('user_stand_type') == 3) echo 'selected'; ?>" width="200" height="200" alt="default"/>
                
            <h4>45 mts<sup>2</sup></h4>
            <p>USD$10,215.00</p>
            
	            <div class="mid-input standname-data">
					<label>Name with which you wish to appear on your stand</label>	
					<input type="text" name="cornisa_3" class="expand input-text" value="<?php echo $user->__get('user_space_name');?>" title="Name with which you wish to appear on your stand"  />
				</div><!--/directorname-data--> 
           
            <a href="javascript:void(0);" data-stand="3" class="round small button <?php if ($user->__get('user_stand_type') == 3) echo 'nulled'; ?>">Select</a>
         </li>
        
         
         <li>
            <img src="<?php echo APPLICATION_URL?>images/31.jpg" class="images <?php if ($user->__get('user_stand_type') == 5) echo 'selected'; ?>" width="200" height="200" alt="default" />
            <h4>31,50 mts<sup>2</sup></h4>
            <p>USD$ 7,749.00</p>
 	            <div class="mid-input standname-data">
					<label>Name with which you wish to appear on your stand</label>	
					<input type="text" name="cornisa_5" class="expand input-text" value="<?php echo $user->__get('user_space_name');?>" title="Name with which you wish to appear on your stand"  />
				</div><!--/directorname-data-->
            <a href="javascript:void(0);" data-stand="5" class="round small button <?php if ($user->__get('user_stand_type') == 5) echo 'nulled'; ?>">Select</a>
        </li>
	<?php
	}
	else
	{
	?>
		<li>
			<img src="<?php echo APPLICATION_URL?>images/21.jpg" class="images <?php if ($user->__get('user_stand_type') == 6) echo 'selected'; ?>" width="200" height="200" alt="default"/>	
			<h4>21 mts2</h4>
			<p>USD$ 5.166.00</p>
			<div class="mid-input standname-data">
				<label>Nombre para la cornisa del <em>stand</em></label>	
				<input type="text" name="cornisa_1" class="expand input-text" value="<?php echo $user->__get('user_space_name');?>" title="Name with which you wish to appear on your stand"  />
			</div>
			<a href="javascript:void(0);" data-stand="6" class="round small button <?php if ($user->__get('user_stand_type') == 6) echo 'nulled'; ?>">Select</a>
		</li>
	<?php
	}
	?>
	</ul>
	</div><!--/twelve columns-->
</div><!--/row-->
