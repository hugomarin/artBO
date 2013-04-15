<?php
$user	= new User($_GET[0]);
$dir			= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$imagenGaleria	= $dir.$user->__get('user_gallery_image');
$imagenDirector	= $dir.$user->__get('user_director_image');
$country		= new Country('country_id');
//STAND
$stand	= '';
switch ($user->__get('user_stand_type')):
	case '1':
		$stand	= 'Plus 63 mts';
	break;
	case '2':
		$stand	= '63 mts';
	break;	
	case '3':
		$stand	= '45 mts';
	break;		
	case '5':
		$stand	= '31,50 mts';
	break;
endswitch;
//EXPOSICIONES
//---------------------------
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " ORDER by exposition_year, exposition_month");
//FERIAS
//----------------------
$ferias		= FeriaHelper::retrieveFerias(" AND user_id = ". $user->__get('user_id'));
$artbo		= explode("|", $user->__get('user_artbo'));
if	(count($artbo) < 8)
for ($i=0; $i < 8; $i++)
	$artbo[$i]	= 0;
//ARTISTAS
//----------------------------------
$artists	= ArtistHelper::retrieveArtists(" AND user_id = ". $user->__get('user_id'));
//GET NEXT
$users 	= UserHelper::retrieveUsers($filter." AND user_finalizado = 1 ORDER by user_gallery_comname");
$i		= 0;
foreach ($users as $listusers)
{
	if ($user->__get('user_id') == $listusers->__get('user_id'))
		$selectedi	= $i;
	$i++;
}
$i	= $selectedi;
//PREV GALLERY
$prev	= ($i != 0) ? $users[$i-1] : $users[count($users)-1]; 
//NEXT GALLERY
$next	= ($i != count($users)-1) ? $users[$i+1] : $users[0];
$ext	= explode('.', $imagenGaleria);
$image	= new Image($imagenGaleria, false, '');
$image->newSize = array(600, 450);
$image->autocrop();
$image->save($dir.'imagenresize.'.$ext[count($ext)-1]);
$imagenGaleria	= $dir.'imagenresize.'.$ext[count($ext)-1];
?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>

	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<!-- <meta name="viewport" content="width=device-width" /> -->

	<title>artBO</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/app.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/new.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/phase.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/foundation-overrides.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/ui-lightness/jquery-ui-1.8.18.custom.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/jquery.mCustomScrollbar.css">
	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery.min.js"></script>    
	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>

	<script type="text/javascript" src="//use.typekit.net/fzq1qvs.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/ie.css">
	<![endif]-->


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>

<div class="encabezado">
		<!-- header artbo logo -->
	<div class="row superior-2">	
		<!-- columns 1/2 -->
		<div class="four columns">
				<img src="<?php echo APPLICATION_URL;?>images/resources/logo.png" height="76" width="278" alt="logo" />
		</div>
		<!-- END columns 1/2 -->
		
		<!-- columns 2/2 -->
		<div class="eight columns lateralder ">
			<div class="perfil-data">
				<div class="perfil second left">
                   	<a href="javascript:void(0);" class="imagenlogo"><img src="<?php echo APPLICATION_URL;?><?php echo $imagenGaleria;?>"  height="36" width="36" alt="perfil"/></a>
                    <p class="right"><strong><?php echo $user->__get('user_gallery_comname');?></strong><br />
					<a href="<?php echo APPLICATION_URL;?>panel.controller/startSession/<?php echo $user->__get('user_id');?>.html" title="Clic aquí para editar información de la galería" target="_blank">Editar perfil</a> | <a href="#" title="Salir">Salir</a></p>
                </div>
			</div>
		</div> 
		<!-- END columns 2/2 -->
	</div>
		<!-- END header artbo logo -->
</div>	

<!-- 2. Navigation -->
<div class="row breadcrumb">
	<div class="six columns">
		<a href="<?php echo APPLICATION_URL;?>indice-galerias.panel.html" class="getback"><span><img src="<?php echo APPLICATION_URL;?>images/smallarrow.png" alt="" width="17" height="16" /></span>INDICE DE GALERÍAS</a>
	</div>
	<div class="six columns">
		<ul class="main-menu no-bullet">
			<li><a href="javascript:void(0);" onClick="openDocuments();" class="activo"><span><img src="<?php echo APPLICATION_URL;?>images/smalldoc.png" alt="" width="12" height="18" /></span>DOCUMENTOS</a></li>
			<li><a href="<?php echo APPLICATION_URL.'index.php?generatepdf.control/'.$user->__get('user_id');?>"><span><img src="<?php echo APPLICATION_URL;?>images/smallfolder.png" alt="" width="17" height="16" /></span>DESCARGAR</a></li>
			<li><a  href="<?php echo APPLICATION_URL;?>panel.controller/startSession/<?php echo $user->__get('user_id');?>.html" target="_blank"><span><img src="<?php echo APPLICATION_URL;?>images/smalledit.png" alt="" width="17" height="19" /></span>EDITAR</a></li>
			<?php
			$action	= ($user->__get('user_state') == 'A') ? 'DESACTIVAR' : 'ACTIVAR';
			?>
			<li><a href="<?php echo APPLICATION_URL;?>panel.controller/changeState/<?php echo $user->__get('user_id');?>.html" class="activate"><span><img src="<?php echo APPLICATION_URL;?>images/smallcheck.png" alt="" width="18" height="17" /></span><?php echo $action;?></a></li>
		</ul>
	</div>
</div>
<br />


<!-- 2. End menu -->

	<div class="row main-row">	
		<div class="panel nopadding">
			<div class="documents-info" style="height:166px;" id="documents">
					<div class="container">
						<div class="row">
							<div class="twelve columns">
								<h3>Documentos</h3>
								<ul>
									<li><a href="<?php echo APPLICATION_URL.$dir.$user->__get('user_certificate');?>" target="_blank"><img src="<?php echo APPLICATION_URL;?>images/doc.png" alt="" width="37" height="55" /><span>CERTIFICADO DE EXISTENCIA</span></a></li>
									<li><a href="<?php echo APPLICATION_URL.$dir.$user->__get('user_rut');?>" target="_blank"><img src="<?php echo APPLICATION_URL;?>images/doc.png" alt="" width="37" height="55" /><span>RUT O IDENTIFICACIÓN FISCAL</span></a></li>
									<li><a href="<?php echo APPLICATION_URL.$dir.$user->__get('user_document');?>" target="_blank"><img src="<?php echo APPLICATION_URL;?>images/doc.png" alt="" width="37" height="55" /><span>DOCUMENTO DE IDENTIDAD</span></a></li>
									<li><a href="<?php echo APPLICATION_URL.$dir.$user->__get('user_payment');?>" target="_blank"><img src="<?php echo APPLICATION_URL;?>images/doc.png" alt="" width="37" height="55" /><span>REGISTRO DE PAGO</span></a></li>
								</ul>
							</div> 
							<a href="javascript:void(0);" onClick="openDocuments();" class="bigclose"> <img src="<?php echo APPLICATION_URL;?>images/bigclose.png" alt="" width="30" height="29" /> </a>
						</div>
					</div>
			</div>
			
			<div class="profile-resume">
				<img src="<?php echo APPLICATION_URL.$imagenGaleria;?>" alt="" width="597" height="447" /> 
				<!-- placeholder para implementar -->
				<!-- <img src="http://cambelt.co/597x447/<?php echo $user->__get('user_gallery_comname');?>?color=b2b2b2" /> -->
				<div class="resum">
					<h4><?php echo $user->__get('user_gallery_comname');?><sup><?php echo $user->__get('user_open_year');?></sup></h4> 
					<a href="<?php echo $user->__get('user_website');?>" target="_blank" class="website"><?php echo $user->__get('user_website');?></a>
					<h6>RESEÑA DE LA GALERÍA</h6>
					<p><?php echo $user->__get('user_abstract');?></p>
				</div>
			</div>
			
			<div class="specific">
				<div class="container">
					<div class="row">
						<div class="three columns">
							<img src="<?php echo APPLICATION_URL.$imagenDirector;?>" alt="" width="172" height="172" />
							<!-- placeholder para implementar -->
							<!-- <img src="http://cambelt.co/172x172/Director?color=b2b2b2" /> -->
						</div>
						<div class="nine columns">
							<ul>
								<li>
									<h6>DIRECTOR</h6>
									<span><?php echo $user->__get('user_director_name');?></span>
								</li>
								<li>
									<h6>ÁREA DE LA GALERÍA</h6>
									<span><?php echo $user->__get('user_area');?>mts2</span>
								</li>
								<li>
									<h6>TELÉFONO</h6>
									<span><?php echo $user->__get('user_phone');?></span>
								</li>
								<li>
									<h6>CORREO ELECTRÓNICO</h6>
									<span><?php echo $user->__get('user_director_email');?></span>
								</li>
								<li>
									<h6>IDENTIFICACIÓN</h6>
									<span><?php echo $user->__get('user_document_type');?> <?php echo $user->__get('user_gallery_document');?></span>
								</li>
								<li>
									<h6>MÓVIL</h6>
									<span><?php echo $user->__get('user_mobile');?></span>
								</li>
								<li>
									<h6>ESTILO</h6>
									<span><?php echo $user->__get('user_gallery_profile');?></span>
								</li>
								<li>
									<h6>DIRECCIÓN</h6>
									<span><?php echo $user->__get('user_address');?></span>
								</li>
								<li>
									<h6>STAND</h6>
									<span><?php echo $stand;?></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="participation">
				<div class="container">
					<div class="row">
						<div class="four columns">
							<h5>Participación en artBO</h5>
						</div>
						<div class="eight columns">
							<ul>
								<?php echo ($artbo[6] == 1) ? "<li><strong>artBO</strong><span>2012</span></li>" : '';
                                    echo ($artbo[0] == 1) ? "<li><strong>artBO</strong><span>2011</span></li>" : '';
                                    echo ($artbo[1] == 1) ? "<li><strong>artBO</strong><span>2010</span></li>" : '';
                                    echo ($artbo[2] == 1) ? "<li><strong>artBO</strong><span>2009</span></li>" : '';
                                    echo ($artbo[3] == 1) ? "<li><strong>artBO</strong><span>2008</span></li>" : '';
                                    echo ($artbo[4] == 1) ? "<li><strong>artBO</strong><span>2007</span></li>" : '';
                                    echo ($artbo[5] == 1) ? "<li><strong>artBO</strong><span>2006</span></li>" : '';
                                    echo ($artbo[7] == 1) ? "<li><strong>artBO</strong><span>2005</span></li>" : '';  
                                ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="exhibitandfairs">
				<div class="exhibits">
					<div class="container">
						<div class="row">
							<div class="twelve columns">
								<h3>Exposiciones</h3>
								<div class="real-expos">
									
									<ul>
										<li><h6>EXPOSICIÓN</h6></li>
                                        <?php
										foreach ($expositions as $exposition)
										{
										?>
											<li><span><?php echo $exposition->__get('exposition_month');?>/<?php echo $exposition->__get('exposition_year');?></span><strong><?php echo $exposition->__get('exposition_name');?></strong></li>
                                        <?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="fairs">
					<div class="container">
						<div class="row">
							<div class="twelve columns">
								<h3 class="mainh3">Ferias</h3>
								<div class="real-fairs">
									<ul>
                                    	<?php
										foreach ($ferias as $feria)
										{
											$country	= new Country($feria->__get('country_id'));
										?>
                                            <li>
                                                <h3><?php echo $feria->__get('feria_name');?><span><?php echo $feria->__get('feria_year');?></span></h3>
                                                <strong><?php echo $feria->__get('feria_city');?> /<?php echo utf8_encode($country->__get('country_name'));?></strong>
                                            </li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="proposal-artist">
				<div class="container">
					<div class="row">
						<div class="five columns">
							<div class="theproposal">
								<h3 class="whitetxt">Propuesta</h3>
								<div class="this">
                                	<p><?php echo $user->__get('user_gallery_proposal');?>
								</div>
							</div>
						</div>
						<div class="seven columns">
							<div class="theartists">
								<h3 class="whitetxt">Artistas</h3>
								<div class="thiso">
									<h6>ARTISTAS A REPRESENTAR EN ARTBO 2013</h6>
									<?php
									for($i = 1; $i <= count($artists); $i++)
									{
										$artist 	= $artists[($i - 1)]; 
										$artistWork	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));		
									?>
										<strong><?php echo $artist->__get('artist_name') . ' ' . $artist->__get('artist_surname');?>/</strong><span><?php echo $artist->__get('artist_nationality');?></span><a href="#" class="showArtist" rel="<?php echo md5($artist->__get('artist_name')).$i;?>"><img src="<?php echo APPLICATION_URL;?>images/mas.png" alt="" width="15" height="14" /></a>
									<?php
									}
									?>
									<div class="another">
										<h6>OTROS ARTISTAS REPRESENTADOS</h6>
										<p><?php echo $user->__get('user_represented_artists');?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="activar">
				<div class="container">
					<div class="row">
						<div class="twelve columns">
							<div class="gallery-name">
								<?php
                                $action	= ($user->__get('user_state') == 'A') ? 'desactivar' : 'activar';
                                ?>                            
								<span>Desea <?php echo $action;?> a: <strong><?php echo $user->__get('user_gallery_comname');?></strong></span>
								<a href="<?php echo APPLICATION_URL;?>panel.controller/changeState/<?php echo $user->__get('user_id');?>.html"><span><img src="<?php echo APPLICATION_URL;?>images/smallcheck.png" alt="" width="18" height="17" /></span><?php echo $action;?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- END Main: Panel -->
		<div class="footer-menu">
			<div class="row">
				<div class="four columns">
					<div class="left">
						<a href="<?php echo APPLICATION_URL;?>perfil-galeria.panel/<?php echo $prev->__get('user_id');?>.html"> < <?php echo $prev->__get('user_gallery_comname');?></a>
						<span class="right">ANTERIOR</span>
					</div>
				</div>
				<div class="four columns">
					<div class="middle text-center"> 
						<a href="<?php echo APPLICATION_URL;?>indice-galerias.panel.html"><img src="<?php echo APPLICATION_URL;?>images/smallmenu.png" alt="menu" width="15" height="14" />volver al indice</a>
					</div>
				</div>
				<div class="four columns">
					<div class="right">
						<a href="<?php echo APPLICATION_URL;?>perfil-galeria.panel/<?php echo $next->__get('user_id');?>.html"><?php echo $next->__get('user_gallery_comname');?> ></a>
						<span>SIGUIENTE</span>
					</div>
				</div>
			</div>
		</div>
	<!-- 3. END Row main --> 
	</div>
	
    <?php
	$dir2 	= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))) . '/artistas/';	
	for($i = 1; $i <= count($artists); $i++)
	{
		$artist 	= $artists[($i - 1)]; 
		$artistWork	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));		

	?>
	<div id="<?php echo md5($artist->__get('artist_name')).$i;?>" class="reveal-modal artistr">
		<div class="galleryfic">
			<div class="handlers">
				<a href="#" class="nav-anterior" rel="id<?php echo md5($artist->__get('artist_name')).$i;?>"><img src="<?php echo APPLICATION_URL;?>images/toleft.jpg" alt="" width="20" height="20" /></a>
                <a class="right nav-siguiente" rel="id<?php echo md5($artist->__get('artist_name')).$i;?>" href="#"><img src="<?php echo APPLICATION_URL;?>images/toright.jpg" alt="" width="20" height="20" /></a>
			</div>
            <div id="id<?php echo md5($artist->__get('artist_name')).$i;?>">
				<?php
                $first	= true;
                for($j=1; $j<=3; $j++)
                {	
                    if(isset($artistWork[($j - 1)]) && ($artistWork[($j - 1)]->__get('artist_work_file') != ''))
                    {			
                        $file = file_exists($dir2 . $artistWork[($j - 1)]->__get('artist_work_file')) ? $dir2 . $artistWork[($j - 1)]->__get('artist_work_file') : '';
                        if ($file != '')
                        {
                            $style	= ($first) ? '' : 'style="display:none"';
                        ?>
                            <img src="<?php echo APPLICATION_URL.$file;?>" title="<?php echo $artistWork[($j - 1)]->__get('artist_work_name');?>" alt="" width="700" height="466" <?php echo $style;?> />
                            <div class="resume" <?php echo $style;?>>
                                <?php echo $artistWork[($j - 1)]->__get('artist_work_name') . ' / ' . $artistWork[($j - 1)]->__get('artist_work_dimensions') . ' - ' .$artistWork[($j - 1)]->__get('artist_work_year');?>
                            </div>
                        <?php
                            $first	= false;
                        }
                    }
                }
                ?>
            </div>
		</div>
		<div class="row">
			<div class="four columns">
				<h3><?php echo $artist->__get('artist_name') . ' ' . $artist->__get('artist_surname');?></h3>
				<h6>FECHA DE NACIMIENTO</h6>
				<span><?php echo $artist->__get('artist_birthday');?></span>
				<h6>LUGAR DE NACIMIENTO</h6>
				<span><?php echo $artist->__get('artist_nationality');?></span>
			</div>
			<div class="eight columns">
				<h5>RESEÑA DEL ARTISTA</h5>
				<p><?php echo $artist->__get('artist_review');?></p>
			</div>
		</div>
		<a class="close-reveal-modal"><img src="<?php echo APPLICATION_URL;?>images/smallclose.png" alt="" width="21" height="20" /></a>
	</div>
	<?php
	}
	?>

<!-- 4. footer -->			

	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/app.js"></script>	
    <script src="<?php echo APPLICATION_URL;?>javascripts/jquery.mousewheel.min.js"></script>
    <script src="<?php echo APPLICATION_URL;?>javascripts/jquery.mCustomScrollbar.min.js"></script>
    

	<!-- Included JS Files -->

	
 	<script type="text/javascript" charset="utf-8">
	 	 $(document).ready(function() {
	 	
			 	 $(".showArtist").click(function(e) {
			 	 	e.preventDefault();
					var id = $(this).attr('rel');
			        $("#"+id).reveal();
			    });
				$(window).bind('load', function()
				{
				
					openDocuments();

					$('.nav-anterior').click(function(event) { 
						event.preventDefault();		
						var id			= $(this).attr('rel');
						var activeImg	=	$('#'+id+' img:visible');
						var prev		= activeImg.prev().prev();
						if (prev.get(0).tagName == 'img')
						{
							activeImg.fadeOut('slow', function() {
								prev.fadeIn('slow');
							});
							 activeImg.next().fadeOut('slow',  function() {
								prev.next().fadeIn('slow');
							}); 
						}
						//if (prev.tagName)
					});
				
					$('.nav-siguiente').click(function(event) { 
						event.preventDefault();					
						var id			= $(this).attr('rel');
						var activeImg	=	$('#'+id+' img:visible');
						var prev		= activeImg.next().next();
						if (prev.get(0).tagName != 'img')
						{
							activeImg.fadeOut('slow', function() {
								prev.fadeIn('slow');
							});
							 activeImg.next().fadeOut('slow',  function() {
								prev.next().fadeIn('slow');
							}); 							
						}
					});
				
				});

		});
		 
		 function openDocuments()
		 {
			if ($("#documents").height() == 0)
			{
				$("#documents").animate({ height:"166px" }, 1000, function() {
				});
			}
			else
			{
				$("#documents").animate({ height:"0px" }, 1000, function() {
				});	
			}			 
		 }

    (function($){
        $(window).load(function(){
            $(".resum, .real-expos ul, .real-fairs ul, .this, .artistr p").mCustomScrollbar({
            	scrollInertia: 150, 
            	advanced:{
			        updateOnContentResize: true
			    }
            });
        });
    })(jQuery);
	</script>

</body>
<!-- End Body -->
</html>

<!-- 4. End footer -->
 


