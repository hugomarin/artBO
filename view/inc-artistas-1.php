<ul class="link_list ui-sortable">
			<!-- artista -->
				<?php
                if (count($artists) > 0)
                {
                    $i = 1;
                    foreach ($artists as $artist)
                    {
                    ?>            
                        <li class="link_default">
                           <ul class="no-bullet artist">
                                <li class="handler">
                                    <img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                </li>
                                <!-- nombre -->
                                <li>
                                    <label><span class="asterix">*</span>Nombre</label>	
                                    <input type="text" name="artist_name_<?php echo $i;?>" value="<?php echo $artist->__get('artist_name');?>" />
                                </li>
                                <!-- /nombre -->
                                <!-- Apellido -->
                                <li>
                                    <label><span class="asterix">*</span>Apellido</label>
                                    <input type="text" name="artist_surname_<?php echo $i;?>" value="<?php echo $artist->__get('artist_surname');?>" />
                                </li>
                                <!-- /Apellido -->
                                <!-- checkboxes -->
                                <li>
                                    <!-- nacionalidad -->
                                    <label><span class="asterisk">*</span>Nacionalidad</label>
                                    <input type="text" name="artist_nationality_<?php echo $i;?>" value="<?php echo $artist->__get('artist_nationality');?>" />
                                    <!-- END nacionalidad -->
                                    <!-- <label for="checkbox3a"><input class="revealer" type="checkbox" name="artist_artbo_<?php echo $i;?>" <?php if ($artist->__get('artist_artbo') == 1) echo 'checked="CHECKED"';?>  id="checkbox-<?php echo $i?>"> <strong>Este artista participará en Artbo</strong></label> -->
                                    <!-- boton para modal de artista -->
                                    <a href="#" class="revelar-a <?php if ($artist->__get('artist_artbo') != 1) echo 'hidden"';?> revealer " id="link-<?php echo $i?>" data-reveal-id="artista" >Más información sobre el artista</a>
                                    <!-- END boton para modal de artista -->
                                </li>
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
                             <ul class="no-bullet artist">
                                <!-- nombre -->
                               <li class="handler">
                                    <img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                               </li>
                               <li>
                                    <label><span class="asterix">*</span>Nombre</label><br />	
                                    <input type="text" name="artist_name_1" />
								</li>
                                <!-- END nombre -->
                                <!-- Apellido -->
                                <li>
                                    <label><span class="asterix">*</span>Apellido</label><br />	
                                    <input type="text" name="artist_surname_1" />
                                </li>
                                <!-- END Apellido -->
                                <!-- checkboxes -->
                                <li>
                                    <!-- nacionalidad -->
                                    <label><span class="asterisk">*</span>Nacionalidad</label><br />	
                                    <input type="text" name="artist_nationality_1" />
                                    <!-- END nacionalidad -->
                                    <!-- <label for="checkbox3a"><input class="revealer-new" type="checkbox" id="checkbox-1" name="artist_artbo_1"><strong>Este artista participará en Artbo</strong></label> -->
                                    <!-- boton para modal de artista -->
                                    <!-- END boton para modal de artista -->
                                </li>
                                <li class="handler">
                                	<a href="#"><img src="http://cambelt.co/icon/minus/35x35?color=F2F2F2" alt="caneca" title="caneca" /></a>
                               	</li>
							</ul>
                        </li>  
				   <?php
                    }
                    ?>                                          
			<!-- END artista -->  
			</ul>	
			<a href="#" id="add-artist"><strong>+</strong> Agregar un nuevo artista </a> <!-- agregar una nueva expo -->