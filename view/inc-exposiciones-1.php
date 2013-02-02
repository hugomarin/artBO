 <ul class="link_list ui-sortable">
                    <!-- expo -->
                    	<?php
						if (count($expositions) > 0)
						{
							$i = 1;
							foreach ($expositions as $exposition)
							{
							?>
							<li class="link_default">
                                <ul class="no-bullet expo">
	                                <!-- move img -->
	                                <li class="handler">
	                                    <img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
	                                </li>
	                                <!-- END move img -->
	                                <!-- nombre -->
	                                <li>
	                                    <label><span class="asterix">*</span>Nombre de la exposición</label>	
	                                    <input name="expo_nombre_<?php echo $i?>" class="large input-text" type="text" value="<?php echo $exposition->__get('exposition_name');?>" />
	                                </li>
	                                <!-- END nombre -->
	                                <!-- Año -->
	                                <li class="date">
	                                    <label>Año</label>	
	                                    <select name="expo_fecha_<?php echo $i?>">
	                                        <option value="2012" <?php if ($exposition->__get('exposition_year') == 2012) echo 'selected="selected"';?>>2012</option>
	                                        <option value="2011" <?php if ($exposition->__get('exposition_year') == 2011) echo 'selected="selected"';?>>2011</option>
	                                    </select>
	                                </li>
	                                <li class="date">
	                                    <label>Mes</label>	
	                                    <select name="expo_mes_<?php echo $i?>">
	                                        <option value="01" <?php if ($exposition->__get('exposition_month') == 1) echo 'selected="selected"';?>>01</option>
	                                        <option value="02" <?php if ($exposition->__get('exposition_month') == 2) echo 'selected="selected"';?>>02</option>
	                                        <option value="03" <?php if ($exposition->__get('exposition_month') == 3) echo 'selected="selected"';?>>03</option>
	                                        <option value="04" <?php if ($exposition->__get('exposition_month') == 4) echo 'selected="selected"';?>>04</option>
	                                        <option value="05" <?php if ($exposition->__get('exposition_month') == 5) echo 'selected="selected"';?>>05</option>
	                                        <option value="06" <?php if ($exposition->__get('exposition_month') == 6) echo 'selected="selected"';?>>06</option>
	                                        <option value="07" <?php if ($exposition->__get('exposition_month') == 7) echo 'selected="selected"';?>>07</option>
	                                        <option value="08" <?php if ($exposition->__get('exposition_month') == 8) echo 'selected="selected"';?>>08</option>
	                                        <option value="09" <?php if ($exposition->__get('exposition_month') == 9) echo 'selected="selected"';?>>09</option>
	                                        <option value="10" <?php if ($exposition->__get('exposition_month') == 10) echo 'selected="selected"';?>>10</option>
	                                        <option value="11" <?php if ($exposition->__get('exposition_month') == 11) echo 'selected="selected"';?>>11</option>
	                                        <option value="12" <?php if ($exposition->__get('exposition_month') == 12) echo 'selected="selected"';?>>12</option>
	                                    </select>
	                                </li>
	                                <li class="handler">
	                                	<a href="#"><img src="http://cambelt.co/icon/minus/35x35?color=F2F2F2" alt="caneca" title="caneca" /></a>
	                                </li>
	                                <!-- END Año -->
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
                                <div class="row">
                                <!-- move img -->
                                <div class="one columns">
                                    <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                </div>
                                <!-- END move img -->
                                <!-- nombre -->
                                <div class="six columns">
                                    <label><span class="asterix">*</span>Nombre de la exposición</label>	
                                    <input name="expo_nombre_1" class="large input-text" type="text" />
                                </div>
                                <!-- END nombre -->
                                <!-- Año -->
                                <div class="two columns offset-by-three">
                                    <label>Año</label>	
                                    <select name="expo_fecha_1">
                                        <option>2012</option>
                                        <option>2011</option>
                                    </select>
                                </div>
                                <!-- END Año -->
                                <div class="two columns offset-by-three">
                                    <label>Mes</label>	
                                    <select name="expo_mes_1">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>                                  
                                </div>	
                            </li>                        
                        <?php
						}
						?>
                    <!-- end Expo --> 
                    </ul>	