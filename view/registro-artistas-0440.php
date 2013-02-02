<?php 
include_once('header-login.php'); 
$artists	= ArtistHelper::retrieveArtists(" AND user_id = ". $user->__get('user_id'));
include_once('menu.php'); 
?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row main-row">	
		<div class="panel">
			
			<div class="row inner-header">
				<div class="eight columns title">
					<span class="redtext">Registro</span>
					<h2><span> Artistas:</span> <?php echo $user->__get('user_name');?></h2>	
				</div>
			
				<div class="four columns mini-nav-header">
					<dl class="sub-nav">
						<dd><a title="Registro Ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Anterior</a></dd>
						<dd><a title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
						<dd><a title="Registro espacio" href="<?php echo APPLICATION_URL?>registro-espacio-0450.html" >Siguiente</a></dd>
					</dl>	
				</div>
				
			</div>	<!-- END titulo row -->
				<hr />
			<div class="row form-data">	
				<div class="twelve columns">
	                <p><em>Recuerde que su propuesta de artistas para Artbo 2013 debe ser acorde al tamaño del stand  que ha seleccionado. Por cada 10 mts², sólo podrá exhibir un artista.</em></p>
	                <p><em>Artistas a representar en artBO 2013</em></p>
	                
					<form action="<?php echo APPLICATION_URL?>user.controller/createArtist.html" id="validable" class="" method="post">
						<?php include_once('inc-artistas-1.php'); ?>
					</form>
					
					 <p><em>Artistas representados</em></p>
					 <form action="registro-artistas-0440_submit" method="get" accept-charset="utf-8">
						<textarea name="Name" rows="8" cols="40" placeholder="Digite la información correspondiente a artistas representados"></textarea>
					 </form>
				</div>
			</div>
            <hr />
            <div class="row inner-footer">
				<div class="eight columns note">
					<span><strong><span class="asterix">*</span>Datos requeridos</strong></span>
				</div><!--/note-->
				
				<div class="four columns mini-nav-footer">
					<dl class="sub-nav">
						<dd><a title="Registro ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Anterior</a></dd>
						<dd><a title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
						<dd><a title="Registro espacios" href="<?php echo APPLICATION_URL?>registro-espacio-0450.html">Siguiente</a></dd>
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
			</div><!--/inner-footer-->
		</div>
		<!-- End Row -->
	</div><!-- END Main: Row  -->
<!-- 2. End content -->
<!-- modal del artista -->
<?php include_once 'modal.php'; ?>
<!-- END modal del artista -->
<!-- 3. footer -->		
<script language="javascript">
var counterArtist;
$(document).ready(function() 
						   {
							   
// nueva expo
counterArtist = <?php echo (count($artists) > 0) ? count($artists)+1 : 2; ?>;
$("#add-artist").click(function(){

$(".link_list").hide().append('<li class="link_default"><div class="row"><div class="three columns"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"><label><span class="asterix">*</span>Nombre</label></div></div></li>').fadeIn(1000);
	$(".revealer-new").each(function(item){
		$(this).click(function () {
			$("#artist_name").val($("#artist_name_" + (counterArtist - 1)).val());
			$("#artist_surname").val($("#artist_surname_" + (counterArtist - 1)).val());
			$("#artist_nationality").val($("#artist_nationality_" + (counterArtist - 1)).val());
			var toggle = true;
			if(this.nodeName.toLowerCase() == 'input')
			{
				if(!$(this).attr("checked"))
					toggle = false;
			}
			if(toggle) {
				
				$('#artista-new').reveal();
			}	
			$(".revelar-a").slideToggle();	
		});
	});	
counterArtist = counterArtist+1;						
});							
// end nueva expo

});


</script>	
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

