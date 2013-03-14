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
						<span class="redtext bold">Artist</span>
						<h2><?php echo $user->__get('user_gallery_comname');?></h2>	
					</div>
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onclick="$('#validable2').attr('action','<?php echo APPLICATION_URL?>user.controller/createArtist/stay.html'); $('#validable2').submit();" >Save</a></dd>
							<dd><a class="prev" title="Registro Ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Anterior</a></dd>
							<dd><h4>4/6</h4></dd>
							<dd><a class="next" title="Registro espacio" href="<?php echo APPLICATION_URL?>registro-espacio-0450.html" >Next</a></dd>
						</dl>	
					</div>
				</div>
			</div>	<!-- END titulo row -->
			<div class="container">
				<div class="row form-data">	
                <form action="<?php echo APPLICATION_URL?>user.controller/createArtist.html" id="validable2" class="" method="post">
					<div class="twelve columns">
						<h5>The number of artists you propose for artBO 2013 should be in accordance to the size of stand you have selected. For every 10mt2 you can display an artist.</h5>
						
						
						<h6>Artistic Proposal for artBO 2013 (optional, 250 words maximum)</h6>
						
												  <textarea name="user_gallery_proposal" placeholder="Description of your artistic proposal for your stand artBO 2013" rows="8" cols="40"><?php echo $user->__get('user_gallery_proposal')?></textarea>
						
						<br />
						<br />
						<br />
						<h6>Represented Artists Proposed for artBO 2013<h6>
						
						<div class="intitle">
							<!-- .row>.one.column+.four.columns+three.columns+.three.columns+.one.columns -->
							<ul class="artistas">
								<li>
									<span class="asterix">*</span><strong>Name</strong>
								</li>
								<li>
									<span class="asterix">*</span><strong>Last Name</strong>
								</li>
								<li>
									<span class="asterix">*</span><strong>Nationality</strong>
								</li>
							</ul>
						</div>
						
							<?php include_once('inc-artistas-1.php'); ?>

						<a href="#" id="add-artist" class="label secondary round">Add a new artist</a>
						<br />
						<br />
						<br />

						<h6>Other artists represented by the Gallery</h6>

							<textarea name="user_represented_artists" rows="8" cols="40" placeholder="List other artists represented by the gallery"><?php echo $user->__get('user_represented_artists');?></textarea>
						</form>

					</div>
				</div>
			</div>
			
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="eight columns">
							<strong><span class="asterix">*</span>Data required</strong>
						</div>
						<div class="four columns">
							<div class="right">
								<a title="Registro ferias" href="<?php echo APPLICATION_URL?>registro-ferias-0430.html" class="graytxt">Previous</a>  <a href="javascript:void(0);" onclick="$('#validable2').submit();" title="Registro Tipo de Stand" class="button radius">Next: Type of stand</a>
							</div>
						</div>
					</div>
				</div>
			</div><!--/inner-footer-->
		</div><!-- END Main: Panel -->
		<div class="advisory">
						<span>We recommend viewing in: IE 9.0 - 10.0 Firefox - Safari 5.1 - 17.0 Chrome | 1024 x 768 Optimized</span>
			<span>Site <a href="#">Site Terms and Conditions</a></span>
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

$(".link_list").hide().append('<li class="link_default"><ul class="no-bullet artist"><li class="handler"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></li><li><input type="text" name="artist_name_'+counterArtist+'" id="artist_name_'+counterArtist+'"  /></li><li><input type="text" name="artist_surname_'+counterArtist+'" id="artist_surname_'+counterArtist+'" /></li><li><input type="text" class="no-margin" name="artist_nationality_'+counterArtist+'" id="artist_nationality_'+counterArtist+'" /><a href="#" class="revelar-a revealer-new " id="link-'+counterArtist+'" data-reveal-id="artista" >Add more information about the artist</a></li><li class="handler"><a href="#" class="delete-artist"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="Delete artist" title="Delete artsit" width="37" height="37" /></a></li></ul></li>').fadeIn(1000);
	$(".revealer-new").each(function(item){
		$(this).unbind('click');
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
			//$(".revelar-a").slideToggle();	
		});
		$('.delete-artist').unbind('click');
		$('.delete-artist').click(function () {
			$(this).parent().parent().parent().remove();
			$(document).ready(function () { validInst = new Validator(1, '', true); });
		});
	});	
counterArtist = counterArtist+1;						
});							
// end nueva expo
});
</script>	