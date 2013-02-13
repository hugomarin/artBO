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
                                    <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                </li>
                                <!-- nombre -->
                                <li>
                                    <input type="text" name="artist_name_<?php echo $i;?>" value="<?php echo $artist->__get('artist_name');?>" />
                                </li>
                                <!-- /nombre -->
                                <!-- Apellido -->
                                <li>
                                    <input type="text" name="artist_surname_<?php echo $i;?>" value="<?php echo $artist->__get('artist_surname');?>" />
                                </li>
                                <!-- /Apellido -->
                                <!-- checkboxes -->
                                <li>
                                    <!-- nacionalidad -->
                                    <input type="text" class="no-margin" name="artist_nationality_<?php echo $i;?>" value="<?php echo $artist->__get('artist_nationality');?>" />
                                    <!-- END nacionalidad -->
                                    <!-- <label for="checkbox3a"><input class="revealer" type="checkbox" name="artist_artbo_<?php echo $i;?>" <?php if ($artist->__get('artist_artbo') == 1) echo 'checked="CHECKED"';?>  id="checkbox-<?php echo $i?>"> <strong>Este artista participará en Artbo</strong></label> -->
                                    <!-- boton para modal de artista -->
                                    <a href="#" class="revelar-a <?php if ($artist->__get('artist_artbo') != 1) echo 'hidden"';?> revealer " id="link-<?php echo $i?>" data-reveal-id="artista" >Más información sobre el artista</a>
                                    <!-- END boton para modal de artista -->
                                </li>
                                <li class="handler">
                                	<a href="#"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
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
                                    <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                               </li>
                               <li>
                                    <input type="text" name="artist_name_1" />
								</li>
                                <!-- END nombre -->
                                <!-- Apellido -->
                                <li>
                                    <input type="text" name="artist_surname_1" />
                                </li>
                                <!-- END Apellido --> 
                                <!-- checkboxes -->
                                <li>
                                    <input type="text" class="no-margin" name="artist_nationality_1" />
                                    <!-- END nacionalidad -->
                                    <!-- <label for="checkbox3a"><input class="revealer-new" type="checkbox" id="checkbox-1" name="artist_artbo_1"><strong>Este artista participará en Artbo</strong></label> -->
                                    <!-- boton para modal de artista -->
                                    <!-- END boton para modal de artista -->
                                </li>
                                <li class="handler">
                                	<a href="#"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
                               	</li>
							</ul>
                        </li>  
				   <?php
                    }
                    ?>                                          
			<!-- END artista -->  
			</ul>	