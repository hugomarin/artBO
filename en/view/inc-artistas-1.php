<ul class="link_list ui-sortable">
			<!-- artista -->
				<?php
                if (count($artists) > 0)
                {
                    $i = 1;
                    foreach ($artists as $artist)
                    {
						$class = ($artist->__get('artist_name') == '') ? 'error' : '';
                    ?>            
                        <li class="link_default">
                           <ul class="no-bullet artist">
                                <li class="handler">
                                    <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                </li>
                                <!-- nombre -->
                                <li>
                                    <input type="text" name="artist_name_<?php echo $i;?>"  id="artist_name_<?php echo $i;?>"  value="<?php echo $artist->__get('artist_name');?>" class="<?php echo $class;?>" />
                                </li>
                                <!-- /nombre -->
                                <!-- Apellido -->
                                <li>
                                    <input type="text" name="artist_surname_<?php echo $i;?>" id="artist_surname_<?php echo $i;?>" value="<?php echo $artist->__get('artist_surname');?>" class="<?php echo $class;?>" />
                                </li>
                                <!-- /Apellido -->
                                <!-- checkboxes -->
                                <li>
                                    <!-- nacionalidad -->
                                    <input type="text" class="no-margin <?php echo $class;?>" name="artist_nationality_<?php echo $i;?>" id="artist_nationality_<?php echo $i;?>"  value="<?php echo $artist->__get('artist_nationality');?>"  />
                                    <input type="hidden" id="artist_id_<?php echo $i;?>" class="no-margin" name="artist_id_<?php echo $i;?>" value="<?php echo $artist->__get('artist_id')?>" />
                                    
                                    <input type="hidden" id="artist_birthday_<?php echo $i;?>" class="no-margin" name="artist_birthday_<?php echo $i;?>" value="<?php echo $artist->__get('artist_birthday')?>" />
                                    <input type="hidden" id="artist_residency_<?php echo $i;?>" class="no-margin" name="artist_residency_<?php echo $i;?>" value="<?php echo $artist->__get('artist_residency')?>" />
                                    <input type="hidden" id="artist_review_<?php echo $i;?>" class="no-margin" name="artist_review_<?php echo $i;?>" value="<?php echo $artist->__get('artist_review')?>" />
                                    <!-- END nacionalidad -->
                                    <!-- boton para modal de artista -->
                                    <a href="#" class="revelar-a revealer" id="link-<?php echo $i?>" data-reveal-id="artista" >Add more information about the artist</a>
                                    <!-- END boton para modal de artista -->
                                </li>
                                <li class="handler">
                                	<a href="#" class="delete-artist"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="Delete artist" title="Delete artist" width="37" height="37" /></a>
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
                                    <input type="text" id="artist_name_1" name="artist_name_1" class="error" />
								</li>
                                <!-- END nombre -->
                                <!-- Apellido -->
                                <li>
                                    <input type="text" id="artist_surname_1" name="artist_surname_1" class="error" />
                                </li>
                                <!-- END Apellido --> 
                                <!-- checkboxes -->
                                <li>
                                    <input type="text" id="artist_nationality_1" class="no-margin" name="artist_nationality_1" class="error" />
                                    <input type="hidden" id="artist_id_1" class="no-margin error" name="artist_id_1" value="" />
                                    
                                    <input type="hidden" id="artist_birthday_1" class="no-margin" name="artist_birthday_1" value="" />
                                    <input type="hidden" id="artist_residency_1" class="no-margin" name="artist_residency_1" value="" />
                                    <input type="hidden" id="artist_review_1" class="no-margin" name="artist_review_1" value="" />
                                    <!-- END nacionalidad -->
                                    <!-- <label for="checkbox3a"><input class="revealer-new" type="checkbox" id="checkbox-1" name="artist_artbo_1"><strong>Este artista participará en artBO</strong></label> -->
                                    <!-- boton para modal de artista -->
                                    <a href="#" class="revelar-a revealer-new " id="link-<?php echo $i?>" data-reveal-id="artista" >Add more information about the artist</a>
                                    <!-- END boton para modal de artista -->
                                </li>
                                <li class="handler">
                                	<a href="#" class="delete-artist"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="Delete artist" title="Delete artist" width="37" height="37" /></a>
                               	</li>
							</ul>
                        </li>  
				   <?php
                    }
                    ?>                                          
			<!-- END artista -->  
			</ul>	