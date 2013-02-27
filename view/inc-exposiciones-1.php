
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
	                                    <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="50" height="51" class="image_handle nsr">
	                                </li>
	                                <li>
	                                    <input name="expo_nombre_<?php echo $i?>" class="large input-text" type="text" value="<?php echo $exposition->__get('exposition_name');?>" />
	                                </li>
	                                <!-- END nombre -->
	                                <!-- Año -->
	                                <li class="date">
	                                    <!-- <label><span class="asterix">*</span>Año</label>	 -->
	                                    <select name="expo_fecha_<?php echo $i?>">
	                                        <option value="2012" <?php if ($exposition->__get('exposition_year') == 2013) echo 'selected="selected"';?>>2013</option>
	                                        <option value="2012" <?php if ($exposition->__get('exposition_year') == 2012) echo 'selected="selected"';?>>2012</option>
	                                        <option value="2011" <?php if ($exposition->__get('exposition_year') == 2011) echo 'selected="selected"';?>>2011</option>
	                                    </select>
	                                </li>
	                                <li class="date">
	                                    <!-- <label><span class="asterix">*</span>Mes</label> -->	
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
	                                	<a href="#"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
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
                                 <ul class="no-bullet expo">
                                <!-- move img -->
                                 <li class="handler">
	                                    <img src="images/drag_handle.gif" alt="drag_handle" width="50" height="51" class="image_handle nsr">
                                 </li>
                                <!-- END move img -->
                                <!-- nombre -->
                                <li>
                                    <input name="expo_nombre_1" class="large input-text" type="text"  />
                                </li>
                                <!-- END nombre -->
                                <!-- Año -->
                               <li class="date">
                                    <select name="expo_fecha_1">
                                        <option>2013</option>
                                        <option>2012</option>
                                        <option>2011</option>
                                    </select>
                                </li>
                                <!-- END Año -->
                                <li class="date">
                                    <select name="expo_mes_1">
                                        <option value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </li>
                                <li class="handler">
                                	<a href="#"><img src="images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
                                </li>
                                </ul>	
                            </li>                        
                        <?php
						}
						?>
                    <!-- end Expo --> 
                    </ul>	