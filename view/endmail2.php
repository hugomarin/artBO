<?php
$dir			= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$html			= '<img src="http://www.activemgmd.com/ccb/ccb-galerias/images/logo-bw.jpg">';
// FIRST
$imagenGaleria	= APPLICATION_FULL_URL.$dir.$user->__get('user_gallery_image');
$imagenDirector	= APPLICATION_FULL_URL.$dir.$user->__get('user_director_image');
$country		= new Country('country_id');

$html	.= "<h3>Informaci&oacute;n de la galer&iacute;a</h3>
<p>
<strong>Imagen de la galer&iacute;a</strong>: <em>$imagenGaleria</em><br>
<strong>Nombre comercial de la galer&iacute;a</strong>: <em> ".$user->__get('user_gallery_comname')." </em><br>
<strong>Nombre de la empresa o raz&oacute;n social</strong>: <em> ".$user->__get('user_gallery_razon')." </em><br>
<strong>Tipo de documento</strong>: <em> ".$user->__get('user_document_type')." </em><br>
<strong>N&uacute;mero de documento</strong>: <em> ".$user->__get('user_gallery_document')." </em><br>
<strong>Pa&iacute;s</strong>: <em>".$country->__get('country_id')."</em><br>
<strong>Ciudad</strong>: <em> ".$user->__get('user_city')." </em><br>
<strong>Direcci&oacute;n</strong>: <em> ".$user->__get('user_address')." </em><br>
<strong>C&oacute;digo postal</strong>: <em> ".$user->__get('user_postal_code')." </em><br>
<strong>Rese&ntilde;a de la galer&iacute;a</strong>: <em> ".$user->__get('user_gallery_comname')." </em><br>
<strong>Tel&eacute;fono</strong>: <em> ".$user->__get('user_phone')." </em><br>
<strong>Horario de apertura al p&uacute;blico (0:00 - 24:00)</strong>: <em> ".$user->__get('user_open_time')." </em><br>
<strong>&aacute;rea de exposici&oacute;n de la galer&iacute;a (mts2)</strong>: <em> ".$user->__get('user_gallery_comname')." </em><br>
<strong>A&ntilde;o de apertura</strong>: <em>".$user->__get('user_area')." </em><br>
<strong>Perfil de la galer&iacute;a</strong>: <em> ".$user->__get('user_gallery_profile')."</em><br>
<strong>Foto del director</strong>: <em>".$imagenDirector." </em><br>
<strong>Nombre(s) completo del director</strong>: <em>".$user->__get('user_director_name')." </em><br>
<strong>Correo(s) electr&oacute;nico del director</strong>: <em>".$user->__get('user_director_email')." </em><br>
<strong>Nombre(s) persona contacto</strong>: <em>".$user->__get('user_contact_name')." </em><br>
<strong>Correo(s) electr&oacute;nico contacto</strong>: <em>".$user->__get('user_contact_email')." </em><br>
</p>
";
//EXPOSICIONES
//---------------------------
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " ORDER by exposition_year, exposition_month");

$html	.=  "<h3>Exposiciones</h3>";
foreach ($expositions as $exposition)
{
	$html	.= "
	<p>
	<strong>Nombre de la exposici&oacute;n</strong>: <em>".$exposition->__get('exposition_name')."</em>
	<strong>A&ntilde;o</strong>: <em>".$exposition->__get('exposition_year')."</em>
	<strong>Mes</strong>: <em>".$exposition->__get('exposition_month')."</em>
	</p>";
}
//FERIAS
//----------------------
$ferias		= FeriaHelper::retrieveFerias(" AND user_id = ". $user->__get('user_id'));
$artbo		= explode("|", $user->__get('user_artbo'));
if	(count($artbo) < 8)
for ($i=0; $i < 8; $i++)
	$artbo[$i]	= 0;
	
$html	.= "<h3>Ferias</h3>";

$html	.= "<p>
<strong>Participaci&oacute;n en artBO</strong>: <em> ";
	$html	.= ($artbo[6] == 1) ? "2012<br>" : '';
	$html	.= ($artbo[0] == 1) ? "2011<br>" : '';
	$html	.= ($artbo[1] == 1) ? "2010<br>" : '';
	$html	.= ($artbo[2] == 1) ? "2009<br>" : '';
	$html	.= ($artbo[3] == 1) ? "2008<br>" : '';
	$html	.= ($artbo[4] == 1) ? "2007<br>" : '';
	$html	.= ($artbo[5] == 1) ? "2006<br>" : '';
	$html	.= ($artbo[7] == 1) ? "2005<br>" : '';
$html	.= "</em>
</p>";

$html	.= "<h4>Participaci&oacute;n en otras ferias</h4>";

foreach ($ferias as $feria)
{
	$country	= new Country($feria->__get('country_id'));
	$html	.= "
	<p><!--Esto por cada feria-->
	<strong>Nombre de la feria</strong>: <em>".$feria->__get('feria_name')."</em>,
	<strong>Ciudad</strong>: <em>".$feria->__get('feria_city')."</em>,
	<strong>Pa&iacute;s</strong>: <em>".$country->__get('country_id')."</em>,
	<strong>A&ntilde;o</strong>: <em>".$feria->__get('feria_year')." </em>,
	</p>";
}

//ARTISTAS
//----------------------------------
$artists	= ArtistHelper::retrieveArtists(" AND user_id = ". $user->__get('user_id'));
$html	.= "<h3>Artistas</h3>";

$html	.= "

<p>
<strong>Propuesta art&iacute;stica para artBO 2013</strong>: <em>".$user->__get('user_gallery_proposal')." </em>,
</p>";

$html	.= "<h4>Artistas representados propuestos para artBO</h4>";
$dir2 	= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))) . '/artistas/';	

for($i = 1; $i <= count($artists); $i++)
{
	$artist 	= $artists[($i - 1)]; 
	$artistWork	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));
$html	.= "
	<p>
	<strong>Nombre</strong>: <em> </em><br>
	<strong>Apellido</strong>: <em> </em><br>
	<strong>Nacionalidad</strong>: <em> </em><br>
	<strong>Fecha de nacimiento</strong>: <em>".$artist->__get('artist_birthday')." </em><br>
	<strong>Lugar de residencia</strong>: <em>". $artist->__get('artist_residency')." </em><br>
	<strong>Rese&ntilde;a del artista</strong>: <em>".$artist->__get('artist_review')." </em><br>";

	for($j=1; $j<=3; $j++)
	{		
		$file = '';
		if(isset($artistWork[($j - 1)]) && ($artistWork[($j - 1)]->__get('artist_work_file') != ''))
		{
			
			$file = file_exists($dir2 . $artistWork[($j - 1)]->__get('artist_work_file')) ? APPLICATION_FULL_URL . $dir2 . $artistWork[($j - 1)]->__get('artist_work_file') : '';
			$html	.= "<strong>Nombre de la obra</strong>: <em>".$artistWork[($j - 1)]->__get('artist_work_name')."</em><br>
			<strong>T&eacute;cnica</strong>: <em>".$artistWork[($j - 1)]->__get('artist_work_technique')."</em><br>
			<strong>Dimensiones</strong>: <em>".$artistWork[($j - 1)]->__get('artist_work_dimensions')."</em><br>
			<strong>A&ntilde;o de realizaci&oacute;n</strong>: <em>". $artistWork[($j - 1)]->__get('artist_work_year')."</em><br>
			<strong>Imagen</strong>: <em>". $file."</em><br>";
			
		}		
	}
	$html	.= "</p>";
}

$html	.= "<h4>Otros artistas representados por la galer&iacute;a</h4>";

$html	.= "<p><em>".$user->__get('user_represented_artists')."</em></p>";

//STANDS
//-----------------------
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


$html	.= "<h3>Tipo de Stands</h3>";

$html	.= "<p>

Tipo de stand: <em>".$stand."</em><br>
<strong>Nombre para la cornisa del stand</strong>: <em>".$user->__get('user_space_name')."</em>
</p>
";

//DOCUMENTOS
//-----------------------
$html	.= "<h3>Documentos</h3>";

$html	.= "<p>
<strong>Certificado de existencia</strong>: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_certificate')."</em><br>
<strong>RUT o identificaci&oacute;n fiscal</strong>: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_rut')."</em><br>
<strong>Documento de identidad</strong>: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_document')."</em><br>
<strong>Registro de pago</strong>: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_payment')."</em><br>
</p>
";

?>