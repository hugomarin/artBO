<?php 
include_once('header-login.php'); 
$ferias		= FeriaHelper::retrieveFerias(" AND user_id = ". $user->__get('user_id'));
$artbo		= explode("|", $user->__get('user_artbo'));
if	(count($artbo) < 6)
for ($i=0; $i < 6; $i++)
	$artbo[$i]	= 0;
$countries	= CountryHelper::retrieveCountries(" AND country_activated = 1 ORDER by country_name");
include_once('menu.php'); 
?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row main-row">	
		<div class="panel">
			<div class="row inner-header">
				<div class="eight columns title">
					<span class="redtext">Registro</span>
					<h2><span>Ferias:</span>  <?php echo $user->__get('user_name');?> </h2>	
				</div>
	
				<div class="four columns mini-nav-header">
					<dl class="sub-nav">
						<dd><a  title="Registro Exposiciones" href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html">Anterior</a></dd>
						<dd><a title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
						<dd><a title="Registro Artistas" href="<?php echo APPLICATION_URL?>registro-artistas-0440.html" >Siguiente</a></dd>
					</dl>	
				</div>
			</div>	<!-- END titulo row -->
			<hr />
			<div class="row form-data">	
				<div class="twelve columns">
					<!-- formulario -->
					<form action="<?php echo APPLICATION_URL?>user.controller/createFeria.html" id="validable" class="" method="post">
						<?php include_once('inc-ferias-1.php'); ?>
					</form>
					<a href="#" id="add-feria" title="Agregar Feria">Agregar una nueva feria +</a>
				</div>
			</div>
			<!-- END formulario -->
			<hr />
			<!-- botones anterior guardar siguiente -->
			 <div class="row inner-footer">
				<div class="eight columns note">
					<span><strong><span class="asterix">*</span>Datos requeridos</strong></span>
				</div><!--/note-->
				<div class="four columns mini-nav-footer">
					<dl class="sub-nav">
						<dd><a title="Registro Exposiciones" href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html">Anterior</a></dd>
						<dd><a title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
						<dd><a title="Registro Artistas" href="<?php echo APPLICATION_URL?>registro-artistas-0440.html">Siguiente</a></dd>
					</dl>
				<?php 
					if (isset($_GET[0]))
					{
					?>
				<p class="text-center bluetxt">Su registro ha sido guardado</p>
				<?php
					}
					?>
				</div><!--/mini-nav-->
			</div>
		</div><!--/inner-footer-->
	<!-- /botones anterior guardar siguiente -->
	</div><!-- END Main: Panel -->
	<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra" /><!-- Sombra final del panel -->
</div>	<!-- 3. END Main: Row -->
<script language="javascript">
$(document).ready(function() 
						   {
							   
							// nueva expo
							var counterFeria 	= <?php echo (count($ferias) > 0) ? count($ferias)+1 : 2; ?>;
							// nueva feria
							var countryOptions	= '<?php foreach($countries as $country) {?><option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option><?php } ?>';
							$("#add-feria").click(function(){
							$(".link_list").hide().append('<!-- expo --><li class="link_default"><div class="row"><div class="one columns"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">	</div>	<!-- nombre --><div class="four columns"><label>*Nombre de la feria</label><select name="feria_year_'+counterFeria+'"><option value="2012">2012</option><option value="2011">2011</option><option>2010</option></select></div><!-- END Año --></li><!-- end Expo --> ').fadeIn(1000);
							counterFeria = counterFeria + 1;
							});// end nueva feria

						   
						    });
</script>
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->


