	<!-- panel 2 -->
					<div>
						<h2>artBO</h2>
						
						<label>Indique en qué ediciones de artBO ha participado</label>
						<div class="row">
							<!-- columns artBo 1/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_11" <?php if ($artbo[0] == 1) echo 'checked="checked"';?>/> artBO 2011
							</div>
							<!-- END columns artBo 1/4 -->
							<!-- columns artBo 2/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_10" <?php if ($artbo[1] == 1) echo 'checked="checked"';?>/> artBO 2010
							</div>
							<!-- END columns artBo 2/4 -->
							<!-- columns artBo 3/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_09" <?php if ($artbo[2] == 1) echo 'checked="checked"';?>/> artBO 2009
							</div>
							<!-- columns artBo 3/4 -->
							<!-- END columns artBo 4/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_08" <?php if ($artbo[3] == 1) echo 'checked="checked"';?>/> artBO 2008
							</div>
							<!-- END columns artBo 4/4 -->
						</div>	
						<div class="row">
							<!-- columns artBo 1/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_07" <?php if ($artbo[4] == 1) echo 'checked="checked"';?>/> artBO 2007
							</div>
							<!-- END columns artBo 1/4 -->
								<!-- columns artBo 2/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_06" <?php if ($artbo[5] == 1) echo 'checked="checked"';?>/> artBO 2006
							</div>
							<!-- END columns artBo 2/4 -->
							<!-- columns artBo 3/4 -->
							<div class="three columns">
							</div>
							<!-- END columns artBo 3/4 -->
							<!-- columns artBo 4/4 -->
							<div class="three columns">
							</div>
							<!-- END columns artBo 4/4 -->
						</div>	
					</div>
						<hr />
					<!-- END panel 2 -->
					<h2>Participación en otras ferias</h2>
					<p><em>Registrar las ferias en las que participó entre 2011 y 2012</em></p>
				<!-- END formulario -->
			<ul class="link_list ui-sortable">
			  
			<!-- expo -->
                    	<?php
						if (count($ferias) > 0)
						{
							$i = 1;
							foreach ($ferias as $feria)
							{
						?>            
                                <li class="link_default">
                                     <ul class="no-bullet fairs">
                                        <li class="handler">
                                            <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">	
                                        </li>	
                                    <!-- nombre -->
                                        <li class="name">
                                            <label>*Nombre de la feria</label>	
                                            <input class="expand input-text" type="text" name="feria_name_<?php echo $i;?>" value="<?php echo $feria->__get('feria_name');?>"/>
                                        </li>
                                    <!-- END nombre -->
                                    <!-- ciudad -->
                                        <li>
                                            <label>*Ciudad</label>	
                                            <input type="text"  name="feria_city_<?php echo $i;?>" class="expand input-text" value="<?php echo $feria->__get('feria_city');?>"/>
                                        </li>
                                    <!-- END ciudad -->
                                    <!-- pais-->
                                        <li>
                                            <label>País</label>	
                                            <select name="country_id_<?php echo $i;?>">
                                                <?php
                                                foreach ($countries as $country)
                                                {
                                                    $selected = ($country->__get('country_id') == $feria->__get('country_id')) ? 'selected="selected"' : '';
                                                ?>
                                                    <option value="<?php echo $country->__get('country_id')?>" <?php echo $selected;?>><?php echo utf8_encode($country->__get('country_name'));?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                    <!-- END País -->
                                    <!-- Año-->
                                        <li>
                                            <label>Año</label>	
                                            <select name="feria_year_<?php echo $i;?>">
                                                <option value="2012" <?php if ($feria->__get('feria_year') == 2012)  echo 'selected="selected"';?>>2012</option>
                                                <option value="2011" <?php if ($feria->__get('feria_year') == 2011)  echo 'selected="selected"';?>>2011</option>
                                                <option value="2011" <?php if ($feria->__get('feria_year') == 2010)  echo 'selected="selected"';?>>2010</option>
                                            </select>
                                        </li>
                                        <!-- /Año -->
                                         <li class="handler">
		                                	<a href="#"><img src="http://cambelt.co/icon/minus/35x35?color=F2F2F2" alt="caneca" title="caneca" /></a>
		                               	</li>
                                    </ul>
                                </li>
                    	<?php
								$i++;
							}
						}
						else
						{
						?>
								<li class="link_default">
									<ul class="no-bullet fairs">
                                        <li class="handler">
                                            <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">	
                                        </li>	
                                    <!-- nombre -->
                                        <li class="name">
                                            <label>*Nombre de la feria</label>	
                                            <input class="expand input-text" type="text" name="feria_name_1" />
                                        </li>
                                    <!-- END nombre -->
                                    <!-- ciudad -->
                                        <li>
                                            <label>*Ciudad</label>	
                                            <input type="text"  name="feria_city_1" class="expand input-text"/>
                                        </li>
                                    <!-- END ciudad -->
                                    <!-- pais-->
                                        <li>
                                            <label>País</label>	
                                            <select name="country_id_1">
                                                <?php
                                                foreach ($countries as $country)
                                                {
                                                ?>
                                                    <option value="<?php echo $country->__get('country_id')?>"><?php echo utf8_encode($country->__get('country_name'));?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                    <!-- END País -->
                                    <!-- Año-->
                                        <li class="two columns">
                                            <label>Año</label>	
                                            <select name="feria_year_1">
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                            </select>
                                        </li>
                                <!-- / Año -->
                                  		<li class="handler">
		                                	<a href="#"><img src="http://cambelt.co/icon/minus/35x35?color=F2F2F2" alt="caneca" title="caneca" /></a>
		                               	</li>
                                    </ul>
                                </li>                        
                        <?php
						}
						?>            
			<!-- end Expo --> 
			</ul>	