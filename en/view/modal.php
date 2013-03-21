<!-- modal general -->
<script>
	uploaders = new Array();
</script>
<?php
$dir = 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))) . '/artistas/';
for($i = 1; $i <= count($artists); $i++)
{
	$artist 	= $artists[($i - 1)]; 
	$artistWork	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));
	?>
<div id="artista-<?php echo $i?>" class="reveal-modal" style="display: block;">


	<a class="close-reveal-modal">×</a><!-- modal close tag -->
		<h3><?php echo $artist->__get('artist_name')?></h3>
		<!-- row -->
		
		<!-- END columns 1/2 -->
		<form id="artist_form_<?php echo $artist->__get('artist_id')?>" class="" enctype="multipart/form-data" action="<?php echo APPLICATION_URL?>user.controller.html" method="post">
		<input type="hidden" name="artist_id" value="<?php echo $artist->__get('artist_id')?>">
		<input type="hidden" name="action" value="updateArtist">
		<div class="row">
			<!-- columns 2/2 -->
			<!-- reseña de artista -->
			<div class="six columns">
				<label>Name</label>
				<input type="text" name="artist_name" id="artist_name__<?php echo $i?>"  value="<?php echo $artist->__get('artist_name');?>" class="small"/>
				<label>Last name</label>
				<input type="text" name="artist_surname" id="artist_surname__<?php echo $i?>"  value="<?php echo $artist->__get('artist_surname');?>" class="small"/>
				<label>Nationality</label>
				<input type="text" name="artist_nationality" id="artist_nationality__<?php echo $i?>" value="<?php echo $artist->__get('artist_nationality');?>" class="small"/>
				<label>Date of birth (YYYY-MM-DD)</label>
				<input type="text" name="artist_birthday" value="<?php echo $artist->__get('artist_birthday')?>" class="small datepicker"/>
				<label>Residence location</label>
				<input type="text" name="artist_residency" value="<?php echo $artist->__get('artist_residency')?>" class="small"/>
			</div>

			<div class="six columns">
			
				<label>Review of the artist<label>
				<i>(CV of the artist with outstanding exhibitions since 2007, works in collections, etc.) (500 words maximum)</i>
				<textarea class="grande" name="artist_review" rows="7"><?php echo $artist->__get('artist_review')?></textarea>
			</div>
			
			
			<!-- END reseña de artista -->
		</div>
		<!-- END columns 2/2 -->
		
		<div class="row">
			<!-- columns 1/2 -->
			<div class="twelve columns">
				<h5>Images of the work</h5>
				<!-- panel de imagen -->
				<div class="panel">
				<div class="row">
					<?php
					for($j=1; $j<=3; $j++)
					{
						$file = '';
						if(isset($artistWork[($j - 1)]) && ($artistWork[($j - 1)]->__get('artist_work_file') != ''))
						{
							
							$file = file_exists($dir . $artistWork[($j - 1)]->__get('artist_work_file')) ? APPLICATION_URL . $dir . $artistWork[($j - 1)]->__get('artist_work_file') : '';
						}
						else
							$artistWork[($j - 1)] = new ArtistWork();
						$key 		= ($artistWork[($j - 1)]->__get('artist_work_key') != '') ? $artistWork[($j - 1)]->__get('artist_work_key') : md5(date('YmdHis') . $i . '-' . $j);
						?>
						<input type="hidden" name="artist_work_key_<?php echo $j?>" value="<?php echo $key?>">
						<div class="four columns obra">
							<?php
							if($file != '')
							{
								?>
								<img src="<?php echo $file?>" /><br />
								<?php
							}
							?>
							<label>Name of the work</label>
							<input type="text" title="Nombre de la obra <?php echo $j?>" name="artist_work_name_<?php echo $j?>" value="<?php echo $artistWork[($j - 1)]->__get('artist_work_name')?>">
							<label>Media</label>
							<input type="text" title="Técnica <?php echo $j?>" name="artist_work_technique_<?php echo $j?>" value="<?php echo $artistWork[($j - 1)]->__get('artist_work_technique')?>">
							<label>Dimensions</label>
							<input type="text" title="Dimensiones <?php echo $j?>" name="artist_work_dimensions_<?php echo $j?>" value="<?php echo $artistWork[($j - 1)]->__get('artist_work_dimensions')?>">
							<label>Year</label>
							<input type="text" title="Año de realización <?php echo $j?>" name="artist_work_year_<?php echo $j?>" value="<?php echo $artistWork[($j - 1)]->__get('artist_work_year')?>">
							<div id="artist_work_file_<?php echo $key . '_' . $j?>" name="artist_work_file_<?php echo $key . '_' . $j?>"></div>
						</div>
						<script>
					      $(document).ready(function() {
					      	eval('var uploaders<?php echo $key?> = { uploader<?php echo $j?>: null };');
					      	eval('var currentUploader = uploaders<?php echo $key?>.uploader<?php echo $j?>;');
					        var currentUploader = uploaders[<?php echo $i . $j?>] = new qq.FineUploader({
							  debug: true, 												 
					          element: $('#artist_work_file_<?php echo $key . '_' . $j?>')[0],
					          request: {
					            endpoint: '<?php echo APPLICATION_URL;?>upload_works.controller/<?php echo $_SESSION['user_id'];?>/artist_<?php echo $key?>_image_<?php echo $j?>/<?php echo $key?>.html'
					          },
					          autoUpload: true,
					          text: {
					            uploadButton: '<i class="icon-plus icon-white"></i> Select file'
					          }
					        });	
					      });
					   </script>  
						<?php
					}
					?>
				<span>You can upload up to three images in.jpg, .png or .gif files (1000KB maximum)</span>
				</div>
				<!-- END panel de imagen -->
				
			</div>
		</div>
		</form>	

			<hr />
			<a href="javascript:void(0);" class="nice radius button right save-artist" onclick="document.getElementById('artist_form_<?php echo $artist->__get('artist_id')?>').submit()">Save</a>
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
		<h3>Artist</h3>
		<!-- row -->
		<form class="" id="new_artist_form" enctype="multipart/form-data" action="<?php echo APPLICATION_URL?>user.controller.html" method="post">
		<input type="hidden" name="action" value="insertArtist">	
		<!-- END columns 1/2 -->
		<div class="row">
			<!-- columns 2/2 -->
			<!-- reseña de artista -->
			<div class="six columns">
						<label>Name</label>
						<input type="text" name="artist_name"  id="artist_name_new"   class="small"/>
						<label>Last name</label>
						<input type="text" name="artist_surname" id="artist_surname_new"    class="small"/>
						<label>Nationality</label>
						<input type="text" name="artist_nationality" id="artist_nationality_new"   class="small"/>
							
							<label>Date of birth (YYYY-MM-DD)</label>
							<input type="text" name="artist_birthday" value="" class="small datepicker"/>
							<label>Residence location</label>
							<input type="text" name="artist_residency" value="" class="small"/>
						</div>
						<div class="six columns">
						
							<label>Review of the artist<label>
							<i>(CV of the artist with outstanding exhibitions since 2007, works in collections, etc.) (500 words maximum)</i>
							<textarea class="grande" name="artist_review" rows="7"></textarea>
						</div>
			
			<!-- END reseña de artista -->
		</div>
		<!-- END columns 2/2 -->
		
		<div class="row">
			<!-- columns 1/2 -->
			<div class="twelve columns">
				<h5>Images of the work</h5>
				<!-- panel de imagen -->
				<div class="panel">
				<div class="row">

					<?php
					for($j=1; $j<=3; $j++)
					{
						$key 		= md5(date('YmdHis') . 'new' . $j);
						?>
						<input type="hidden" name="artist_work_key_<?php echo $j?>" value="<?php echo $key?>">
						<div class="four columns obra">
							<label>Name</label>
							<input type="text" title="Nombre de la obra <?php echo $j?>" name="artist_work_name_<?php echo $j?>">
							<label>Media</label>
							<input type="text" title="Técnica <?php echo $j?>" name="artist_work_technique_<?php echo $j?>">
							<label>Dimensions</label>
							<input type="text" title="Dimensiones <?php echo $j?>" name="artist_work_dimensions_<?php echo $j?>">
							<label>Year</label>
							<input type="text" title="Año de realización <?php echo $j?>" name="artist_work_year_<?php echo $j?>">
							<div name="artist_work_file_<?php echo $key . '_' . $j?>" id="artist_work_file_<?php echo $key . '_' . $j?>"></div>
						</div>
						<script>
					      $(document).ready(function() {
					      	eval('var uploaders<?php echo $key?> = { uploader<?php echo $j?>: null };');
					      	eval('var currentUploader = uploaders<?php echo $key?>.uploader<?php echo $j?>;');
					        var currentUploader = new qq.FineUploader({
							  debug: true, 												 
					          element: $('#artist_work_file_<?php echo $key . '_' . $j?>')[0],
					          request: {
					            endpoint: '<?php echo APPLICATION_URL;?>upload_works.controller/<?php echo $_SESSION['user_id'];?>/artist_<?php echo $key?>_image_<?php echo $j?>/<?php echo $key?>.html'
					          },
					          autoUpload: true,
					          text: {
					            uploadButton: '<i class="icon-plus icon-white"></i> Select file'
					          }
					        });	
					      });
					   </script> 
						<?php
					}
					?>

				<span>You can upload up to three images in.jpg, .png or .gif files (1000KB maximum)</span>
				</div>
				<!-- END panel de imagen -->
				
			</div>
		</div>
		</form>

			<hr />
			<a href="javascript:void(0);" class="nice radius button right save-artist" onclick="document.getElementById('new_artist_form').submit()">Save</a>
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
