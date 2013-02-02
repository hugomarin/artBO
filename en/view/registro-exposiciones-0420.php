<?php 
include_once('header-login.php'); 
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " ORDER by exposition_year, exposition_month");
include_once('menu.php'); 
?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
				
			<div class="row"><!-- titulo row -->
				<div class="eight columns">
					<span class="rojo">Registration</span>
					<h2><span class="quitarH2"> Exhibitions:</span> <?php echo $user->__get('user_name');?></h2>
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-two">
					<a title="Registro Galerias" href="<?php echo APPLICATION_URL?>registro-galerias-0410.html" class="back"></a>
					<a title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
					<a title="Registro Ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html" class="forward"></a>
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
				<hr />
				<p><em>List exhibitions the gallery held in 2011 and 2012 in chronological order.</em></p>
				
				<!-- formulario -->
				<form action="<?php echo APPLICATION_URL?>user.controller/createExpo.html" id="validable" class="" method="post">		
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
                                <div class="row">
                                <!-- move img -->
                                <div class="one columns">
                                    <img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                </div>
                                <!-- END move img -->
                                <!-- nombre -->
                                <div class="six columns">
                                    <label><strong> Name of the exhibition</strong> </label>	
                                    <input name="expo_nombre_<?php echo $i?>" class="large input-text" type="text" value="<?php echo $exposition->__get('exposition_name');?>" />
                                </div>
                                <!-- END nombre -->
                                <!-- Año -->
                                <div class="two columns offset-by-three">
                                    <label>Year</label>	
                                    <select name="expo_fecha_<?php echo $i?>">
                                        <option value="2012" <?php if ($exposition->__get('exposition_year') == 2012) echo 'selected="selected"';?>>2012</option>
                                        <option value="2011" <?php if ($exposition->__get('exposition_year') == 2011) echo 'selected="selected"';?>>2011</option>
                                    </select>
                                </div>
                                <div class="two columns offset-by-three">
                                    <label>Month</label>	
                                    <select name="expo_mes_<?php echo $i?>">
                                        <option value="01" <?php if ($exposition->__get('exposition_month') == 01) echo 'selected="selected"';?>>01</option>
                                        <option value="02" <?php if ($exposition->__get('exposition_month') == 02) echo 'selected="selected"';?>>02</option>
                                        <option value="03" <?php if ($exposition->__get('exposition_month') == 03) echo 'selected="selected"';?>>03</option>
                                        <option value="04" <?php if ($exposition->__get('exposition_month') == 04) echo 'selected="selected"';?>>04</option>
                                        <option value="05" <?php if ($exposition->__get('exposition_month') == 05) echo 'selected="selected"';?>>05</option>
                                        <option value="06" <?php if ($exposition->__get('exposition_month') == 06) echo 'selected="selected"';?>>06</option>
                                        <option value="07" <?php if ($exposition->__get('exposition_month') == 07) echo 'selected="selected"';?>>07</option>
                                        <option value="08" <?php if ($exposition->__get('exposition_month') == 08) echo 'selected="selected"';?>>08</option>
                                        <option value="09" <?php if ($exposition->__get('exposition_month') == 09) echo 'selected="selected"';?>>09</option>
                                        <option value="10" <?php if ($exposition->__get('exposition_month') == 10) echo 'selected="selected"';?>>10</option>
                                        <option value="11" <?php if ($exposition->__get('exposition_month') == 11) echo 'selected="selected"';?>>11</option>
                                        <option value="12" <?php if ($exposition->__get('exposition_month') == 12) echo 'selected="selected"';?>>12</option>
                                    </select>
                                </div>                                
                                <!-- END Año -->
                                </div>	
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
                                    <label><strong> Name of the exhibition</strong> </label>	
                                    <input name="expo_nombre_1" class="large input-text" type="text" />
                                </div>
                                <!-- END nombre -->
                                <!-- Año -->
                                <div class="two columns offset-by-three">
                                    <label>Year</label>	
                                    <select name="expo_fecha_1">
                                        <option>2012</option>
                                        <option>2011</option>
                                    </select>
                                </div>
                                <!-- END Año -->
                                <div class="two columns offset-by-three">
                                    <label>Month</label>	
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
				</form>
				<!-- END formulario -->
			<a href="#" id="add-expo"><strong>+</strong> Add a new exhibition</a>
			<hr />
		
			<!-- botones anterior guardar siguiente -->
					<div class="row">
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a title="Registro Galerías" href="<?php echo APPLICATION_URL?>registro-galerias-0410.html">Back</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a  title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Save</a>
								</div><!-- END guardar -->
							</td>
							<td>
								<div class="siguiente left"><!-- siguiente -->
									<a title="Registro Ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Next</a>
								</div> <!-- END siguiente -->
							</td>
						</tr>
                        <?php 
						if (isset($_GET[0]))
						{
						?>
						<tr>
							<td colspan="3"><p class="text-center azul">Your registration has been saved</p></td>
						</tr>
                        <?php
						}
						?>
					</table>
					</div>	
					<!-- END botones anterior guardar siguiente -->
	
	</div><!-- END Main: Panel -->
	<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra"/><!-- Sombra final del panel -->
</div><!-- 3. END Main: Row -->
<!-- 3. footer -->
<script language="javascript">
$(document).ready(function() 
						   {
							   
							// nueva expo
							var counterExpo = <?php echo (count($expositions) > 0) ? count($expositions)+1 : 2; ?>;
							$("#add-expo").click(function(){
							$(".link_list").hide().append('<!-- expo --><li class="link_default"><div class="row"><!-- move img --><div class="one columns"><img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></div><!-- END move img --><!-- nombre --><div class="six columns"><label><strong> Name of the exhibition</strong></label>	<input class="large input-text" type="text"  name="expo_nombre_'+counterExpo+'" /></div><!-- END nombre --><!-- Año --><div class="two columns offset-by-three"><label>Year</label>	<select name="expo_fecha_'+counterExpo+'"><option value="2012">2012</option><option value="2011">2011</option></select></div><!-- END Año --><div class="two columns offset-by-three">  <label>Month</label>	  <select name="expo_mes_'+counterExpo+'">   <option value="01">01</option>   <option value="02">02</option>   <option value="03">03</option>   <option value="04">04</option>   <option value="05">05</option>   <option value="06">06</option>   <option value="07">07</option>   <option value="08">08</option>   <option value="09">09</option>   <option value="10">10</option>   <option value="11">11</option>   <option value="12">12</option>  </select> </div>	</li><!-- end Expo --> ').fadeIn(1000);
							counterExpo = counterExpo+1;});
							// end nueva expo
						   
						    });
</script>
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->



