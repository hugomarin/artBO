<?php 
include_once('header-login.php'); 
$artists	= ArtistHelper::retrieveArtists(" AND user_id = ". $user->__get('user_id'));
include_once('menu.php'); 
?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
				
	<div class="row main-row">	
		<!-- <div class="alert-box success">
	    	Sus datos han sido guardados
	    	<a href="" class="close">×</a>
		</div> -->
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<span class="redtext bold">Artistas</span>
						<h2><?php echo $user->__get('user_name');?></h2>	
					</div>
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
							<dd><a class="prev" title="Registro Ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Anterior</a></dd>
							<dd><h4>4/6</h4></dd>
							<dd><a class="next" title="Registro espacio" href="<?php echo APPLICATION_URL?>registro-espacio-0450.html" >Siguiente</a></dd>
						</dl>	
					</div>
				</div>
			</div>	<!-- END titulo row -->
			<div class="container">
				<div class="row form-data">	
					<div class="twelve columns">
						<h5>Recuerde que su propuesta de artistas para Artbo 2013 debe ser acorde al tamaño del stand  que ha seleccionado. Por cada 10 mts², sólo podrá exhibir un artista.</h5>
						<h5>Artistas a representar en artBO 2013:</h5><br />
						<div class="intitle">
							<!-- .row>.one.column+.four.columns+three.columns+.three.columns+.one.columns -->
							<ul class="artistas">
								<li>
									<span class="asterix">*</span><strong>Nombre</strong>
								</li>
								<li>
									<span class="asterix">*</span><strong>Apellido</strong>
								</li>
								<li>
									<span class="asterix">*</span><strong>Nacionalidad</strong>
								</li>
							</ul>
						</div>
						<form action="<?php echo APPLICATION_URL?>user.controller/createArtist.html" id="validable" class="" method="post">
							<?php include_once('inc-artistas-1.php'); ?>
						</form>
						<a href="#" id="add-artist" class="label secondary round">Agregar un nuevo artista </a>
						<br /><br />
						<h5>Propuesta de la galeria:</h5>
						<form action="registro-artistas-0440_propuesta" method="post">
						  <textarea name="Name" rows="8" cols="40"></textarea>
						</form> 
						<br /><br />
						 <h5>Otros Artistas representados:</h5>
						 <form action="registro-artistas-0440_submit" method="get" accept-charset="utf-8">
							<textarea name="Name" rows="8" cols="40" placeholder="Digite la información correspondiente a artistas representados"></textarea>
						 </form>
					</div>
				</div>
			</div>
			
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="eight columns">
							<strong><span class="asterix">*</span>Datos requeridos</strong>
						</div>
						<div class="four columns">
							<div class="right">
								<a title="Registro ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html" class="graytxt">Anterior</a>  <a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html" title="Registro Tipo de Stand" class="button radius">Siguiente: Tipo de Stand</a>
							</div>
						</div>
					</div>
				</div>
			</div><!--/inner-footer-->
		</div><!-- END Main: Panel -->
		<div class="advisory">
			<span>Recomendamos visualizar en: IE 9.0 - Firefox 10.0 - Safari 5.1 - Chrome 17.0     |     Optimizada 1024 x 768</span>
			<span><a href="#">Términos y Condiciones</a> del Sitio</span>
		</div>
	</div><!--/row main-row-->
<!-- 2. End content -->
<!-- modal del artista -->
<?php include_once 'modal.php'; ?>
<!-- END modal del artista -->
<!-- 3. footer -->		
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<script language="javascript">
var counterArtist;
$(document).ready(function() {
// nueva expo
counterArtist = <?php echo (count($artists) > 0) ? count($artists)+1 : 2; ?>;
$("#add-artist").click(function(){

$(".link_list").hide().append('<li class="link_default"><ul class="no-bullet artist"><li class="handler"><img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></li><li><input type="text" name="artist_name_<?php echo $i;?>" value="<?php echo $artist->__get('artist_name');?>" /></li><li><input type="text" name="artist_surname_<?php echo $i;?>" value="<?php echo $artist->__get('artist_surname');?>" /></li><li><input type="text" class="no-margin" name="artist_nationality_<?php echo $i;?>" value="<?php echo $artist->__get('artist_nationality');?>" /><a href="#" class="revelar-a <?php if ($artist->__get('artist_artbo') != 1) echo 'hidden"';?> revealer " id="link-<?php echo $i?>" data-reveal-id="artista" >Más información sobre el artista</a></li><li class="handler"><a href="#"><img src="images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a></li></ul></li>').fadeIn(1000);
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

