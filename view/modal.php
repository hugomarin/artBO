
<!-- modal general -->
<?php
for($i = 1; $i <= count($artists); $i++)
{
	$artist 	= $artists[($i - 1)]; 
	$artistWork	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));
	?>
<div id="artista-<?php echo $i?>" class="reveal-modal" style="display: block;">


	<a class="close-reveal-modal">×</a><!-- modal close tag -->
		<h2><?php echo $artist->__get('artist_name')?></h2>
		<hr />
		<!-- row -->
		
		<!-- END columns 1/2 -->
		<form id="artist_form_<?php echo $artist->__get('artist_id')?>" class="" enctype="multipart/form-data" action="<?php echo APPLICATION_URL?>user.controller.html" method="post">
		<input type="hidden" name="artist_id" value="<?php echo $artist->__get('artist_id')?>">
		<input type="hidden" name="action" value="updateArtist">
		<div class="row">
			<!-- columns 2/2 -->
			<!-- reseña de artista -->
			<div class="twelve columns">
			<!-- formulario -->

				<label><strong>Fecha de nacimiento (YYYY-MM-DD)</strong></label>
				<input type="text" name="artist_birthday" value="<?php echo $artist->__get('artist_birthday')?>" class="small datepicker"/><br/>
				<label><strong>Lugar de residencia</strong></label>
				<input type="text" name="artist_residency" value="<?php echo $artist->__get('artist_residency')?>" class="small"/><br/>
				<br />
				<span><strong>Reseña del artista</strong></span><br />
				<em>(Descripción de la propuesta artística, exposiciones destacadas desde el 2007, obras en colecciones. Máximo 500 palabras)</em>
				<textarea class="grande" name="artist_review" rows="7"><?php echo $artist->__get('artist_review')?></textarea>
				
			</div>
			<!-- END reseña de artista -->
		</div>
		<!-- END columns 2/2 -->
		
		<div class="row">
			<!-- columns 1/2 -->
			<div class="twelve columns">
				<h5>Imágenes de la obra</h5>
				<!-- panel de imagen -->
				<div class="panel">
				<div class="row">
					<?php
					for($j=1; $j<=3; $j++)
					{
						$file = '';
						if(isset($artistWork[($j - 1)]))
						{
							$file = APPLICATION_FULL_URL . 'resources/images/' . $artistWork[($j - 1)]->__get('artist_work_file');
						}
						else
							$artistWork[($j - 1)] = new ArtistWork();
						?>
						<div class="six columns obra">
							<?php
							if($file != '')
							{
								?>
								<img src="<?php echo $file?>" /><br />
								<?php
							}
							?>
							<label><strong>Nombre de la obra</strong></label>
							<input type="text" title="Nombre de la obra <?php echo $j?>" name="artist_work_name_<?php echo $j?>" value="<?php echo $artistWork[($j - 1)]->__get('artist_work_name')?>"><br />
							<label><strong>Técnica</strong></label>
							<input type="text" title="Técnica <?php echo $j?>" name="artist_work_technique_<?php echo $j?>" value="<?php echo $artistWork[($j - 1)]->__get('artist_work_technique')?>"><br />
							<label><strong>Dimensiones</strong></label>
							<input type="text" title="Dimensiones <?php echo $j?>" name="artist_work_dimensions_<?php echo $j?>" value="<?php echo $artistWork[($j - 1)]->__get('artist_work_dimensions')?>"><br />
							<label><strong>Año de realización</strong></label>
							<input type="text" title="Año de realización <?php echo $j?>" name="artist_work_year_<?php echo $j?>" value="<?php echo $artistWork[($j - 1)]->__get('artist_work_year')?>"><br />
							<input type="file" title="Archivo <?php echo $j?>" name="artist_work_file_<?php echo $j?>" />
						</div>
						<?php
					}
					?>
				<span>Puede subir máximo tres imagenes de sus obras en .jpg, .png o .gif</span>
				</div>
				<!-- END panel de imagen -->
				
			</div>
		</div>
		</form>	

			<hr />
			<a href="javascript:void(0);" class="nice radius button right save-artist" onclick="document.getElementById('artist_form_<?php echo $artist->__get('artist_id')?>').submit()">Guardar</a>
			<div class="loading">icon</div>
		</div>
		<!-- END modal general -->
		</div>
		<!-- END modal general -->
	<?php
}
?>
		
<!-- modal general -->
<div id="artista-new" class="reveal-modal" style="display: block;" >

	<a class="close-reveal-modal">×</a><!-- modal close tag -->
		<h2>Artista</h2>
		<hr />
		<!-- row -->
		<form class="" id="new_artist_form" enctype="multipart/form-data" action="<?php echo APPLICATION_URL?>user.controller.html" method="post">
		<input type="hidden" name="action" value="insertArtist">		
		<!-- END columns 1/2 -->
		<div class="row">
			<!-- columns 2/2 -->
			<!-- reseña de artista -->
			<div class="twelve columns">
			<!-- formulario -->
				<label><strong>Nombre</strong></label>
				<input type="text" id="artist_name_new" name="artist_name" value="">
				<label><strong>Apellido</strong></label>
				<input type="text" id="artist_surname_new" name="artist_surname" value="">
				<label><strong>Nacionalidad</strong></label>
				<input type="text" id="artist_nationality_new" name="artist_nationality" value="">
				<label><strong>Fecha de nacimiento (YYYY-MM-DD)</strong></label>
				<input type="text" name="artist_birthday"  value="" class="small datepicker"/><br/>
				<label><strong>Lugar de residencia</strong></label>
				<input type="text" name="artist_residency" value="" class="small"/><br/>
				<br />
				<span><strong>Reseña del artista</strong></span><br />
				<em>(Descripción de la propuesta artística, exposiciones destacadas desde el 2007, obras en colecciones. Máximo 500 palabras)</em>
				<textarea class="grande" name="artist_review" rows="7"></textarea>
				
			</div>
			<!-- END reseña de artista -->
		</div>
		<!-- END columns 2/2 -->
		
		<div class="row">
			<!-- columns 1/2 -->
			<div class="twelve columns">
				<h5>Imágenes de la obra</h5>
				<!-- panel de imagen -->
				<div class="panel">
				<div class="row">

					<?php
					for($i=1; $i<=3; $i++)
					{
						?>
						<div class="six columns obra">
							<label><strong>Nombre de la obra</strong></label>
							<input type="text" title="Nombre de la obra <?php echo $i?>" name="artist_work_name_<?php echo $i?>"><br />
							<label><strong>Técnica</strong></label>
							<input type="text" title="Técnica <?php echo $i?>" name="artist_work_technique_<?php echo $i?>"><br />
							<label><strong>Dimensiones</strong></label>
							<input type="text" title="Dimensiones <?php echo $i?>" name="artist_work_dimensions_<?php echo $i?>"><br />
							<label><strong>Año de realización</strong></label>
							<input type="text" title="Año de realización <?php echo $i?>" name="artist_work_year_<?php echo $i?>"><br />
							<input type="file" title="Archivo <?php echo $i?>" name="artist_work_file_<?php echo $i?>" />
						</div>
						<?php
					}
					?>

				<span>Puede subir máximo tres imagenes de sus obras en .jpg, .png o .gif</span>
				</div>
				<!-- END panel de imagen -->
				
			</div>
		</div>
		</form>

			<hr />
			<a href="javascript:void(0);" class="nice radius button right save-artist" onclick="document.getElementById('new_artist_form').submit()">Guardar</a>
			<div class="loading">icon</div>
		</div>
		
		<!-- END modal general -->
		</div>
		<!-- END modal general -->
		
<script languaje="javascript">

$(function() {

$('.loading').hide();
$('.save-artist').click(function(event){
	$('.loading').show();

})
	
});


</script>
