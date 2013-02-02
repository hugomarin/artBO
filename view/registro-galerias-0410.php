<?php 
include_once('header-login.php');  
include_once('menu.php'); ?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<div class="row"><!-- titulo row -->
				<div class="eight columns">
					<span class="rojo">Registro</span>
					<h2><span class="quitarH2"> Galería:</span> <?php echo $user->__get('user_name');?></h2>
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-two">
					<a href="<?php echo APPLICATION_URL?>registro-inicio-0400.html" class="back"></a>
					<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
					<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html" class="forward"></a>
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
				<hr />
					<!-- row -->
					<div class="row">	
						<!-- formulario -->
						<form action="<?php echo APPLICATION_URL?>user.controller/first.html" id="validable" class="" method="post" enctype="multipart/form-data">
						<!-- formulario izq columns 1/2-->	
						<?php include_once('registro-panel.php'); ?>
						<!-- END formulario izq  columns 1/2-->
						
						<!-- formulario der columns 2/2-->
						<div class="six columns">
							<!-- reseña -->
							<strong><span class="asterix">*</span>Reseña de la galería</strong>
							<label>Un breve texto (máx 500 palabras) sobre la Galería</label>
							<textarea name="user_abstract"  class="expand" rows="10" ><?php echo $user->__get('user_abstract');?></textarea>
							<!-- END reseña -->
		
							<br />
							
							<div class="row">
								<div class="six columns">
									<!-- horario -->
									<strong><span class="asterix">*</span>Horario de apertura al publico (0:00 - 24:00)</strong>
									<input name="user_open_time" type="text" value="<?php echo $user->__get('user_open_time');?>" class="small input-text expand" />
									<!-- END horario -->
								</div>
								<div class="six columns">	
									<!-- mts -->
									<strong><span class="asterix">*</span>Área de exposición de la galería (m2)</strong>
									<input name="user_area" type="text" value="<?php echo $user->__get('user_area');?>" class="small input-text expand" />
									<!-- END mts -->
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
							<!-- END año apertura -->
		
							
						</div>	
						<!-- END formulario der columns 2/2-->			
						</form>	

						<!-- END formulario -->
						
						<hr />
						
						<span><strong><span class="asterix">*</span>Datos requeridos</strong></span>
			<!-- botones anterior guardar siguiente -->
					<div class="row">
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-inicio-0400.html">Anterior</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Guardar</a>
								</div><!-- END guardar -->
							</td>
							<td>
								<div class="siguiente left"><!-- siguiente -->
									<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html">Siguiente</a>
								</div> <!-- END siguiente -->
							</td>
						</tr>
                        <?php 
						if (isset($_GET[0]))
						{
						?>
						<tr>
							<td colspan="3"><p class="text-center azul">Su registro ha sido guardado</p></td>
						</tr>
                        <?php
						}
						?>
					</table>
					</div>	
					<!-- END botones anterior guardar siguiente -->
				</div>	
				<!-- END row -->
			</div>  <!-- End Panel -->
			<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra"/><!-- Sombra final del panel -->					
		</div><!-- END six columns -->
<!-- End content -->
			
<?php include_once('footer.php'); ?>