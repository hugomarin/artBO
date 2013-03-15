<?php
$dir			= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$html			= '<img src="http://www.activemgmd.com/ccb/ccb-galerias/images/logo-bw.jpg">';
// FIRST
$imagenGaleria	= APPLICATION_FULL_URL.$dir.$user->__get('user_gallery_image');
$imagenDirector	= APPLICATION_FULL_URL.$dir.$user->__get('user_director_image');
$country		= new Country('country_id');

$html	.= "<h3>Gallery</h3>

<br>
<h1>artBO 2013 Application</h1>
<br>
<br>
<p>
<strong>Image gallery</strong>: <em>$imagenGaleria</em><br>
<strong>Gallery name</strong>: <em> ".$user->__get('user_gallery_comname')." </em><br>
<strong>Gallery name</strong>: <em> ".$user->__get('user_gallery_razon')." </em><br>
<strong>Document type</strong>: <em> ".$user->__get('user_document_type')." </em><br>
<strong>Document number</strong>: <em> ".$user->__get('user_gallery_document')." </em><br>
<strong>Country</strong>: <em>".$country->__get('country_id')."</em><br>
<strong>City</strong>: <em> ".$user->__get('user_city')." </em><br>
<strong>Address</strong>: <em> ".$user->__get('user_address')." </em><br>
<strong>ZIP</strong>: <em> ".$user->__get('user_postal_code')." </em><br>
<strong>Gallery Review</strong>: <em> ".$user->__get('user_gallery_comname')." </em><br>
<strong>Phone</strong>: <em> ".$user->__get('user_phone')." </em><br>
<strong>Hours open to the public (0:00 - 24:00)</strong>: <em> ".$user->__get('user_open_time')." </em><br>
<strong>Exhibition area of ​​the gallery (m2)</strong>: <em> ".$user->__get('user_gallery_comname')." </em><br>
<strong>Year</strong>: <em>".$user->__get('user_area')." </em><br>
<strong>Gallery Profile</strong>: <em> ".$user->__get('user_gallery_profile')."</em><br>
<strong>Director Photo:</strong> <em>".$imagenDirector." </em><br>
<strong>Director(s) Name</strong>: <em>".$user->__get('user_director_name')." </em><br>
<strong>Director(s) Email</strong>: <em>".$user->__get('user_director_email')." </em><br>
<strong>Contact Name</strong>: <em>".$user->__get('user_contact_name')." </em><br>
<strong>Contact Email</strong>: <em>".$user->__get('user_contact_email')." </em><br>
</p>
";
//EXPOSICIONES
//---------------------------
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " ORDER by exposition_year, exposition_month");

$html	.=  "<h3>Exhibitions</h3>";
foreach ($expositions as $exposition)
{
	$html	.= "
	<p>
	<em>".$exposition->__get('exposition_name')."</em>,
	<em>".$exposition->__get('exposition_year')."</em>,
	<em>".$exposition->__get('exposition_month')."</em>
	</p>";
}
//FERIAS
//----------------------
$ferias		= FeriaHelper::retrieveFerias(" AND user_id = ". $user->__get('user_id'));
$artbo		= explode("|", $user->__get('user_artbo'));
if	(count($artbo) < 8)
for ($i=0; $i < 8; $i++)
	$artbo[$i]	= 0;
	
$html	.= "<h3>Fairs</h3>";

$html	.= "<p>
<strong>Participation in artBO</strong> <em> ";
	$html	.= ($artbo[6] == 1) ? "2012<br>" : '';
	$html	.= ($artbo[0] == 1) ? "2011<br>" : '';
	$html	.= ($artbo[1] == 1) ? "2010<br>" : '';
	$html	.= ($artbo[2] == 1) ? "2009<br>" : '';
	$html	.= ($artbo[3] == 1) ? "2008<br>" : '';
	$html	.= ($artbo[4] == 1) ? "2007<br>" : '';
	$html	.= ($artbo[5] == 1) ? "2006<br>" : '';
	$html	.= ($artbo[7] == 1) ? "2005<br>" : '';
$html	.= "</em>,
</p>";

$html	.= "<h4>Participation in other fairs</h4>";

foreach ($ferias as $feria)
{
	$country	= new Country($feria->__get('country_id'));
	$html	.= "
	<p><!--Esto por cada feria-->
	<em>".$feria->__get('feria_name')."</em>,
	<em>".$feria->__get('feria_city')."</em>,
	<em>".$country->__get('country_id')."</em>,
	<em>".$feria->__get('feria_year')." </em>,
	</p>";
}

//ARTISTAS
//----------------------------------
$artists	= ArtistHelper::retrieveArtists(" AND user_id = ". $user->__get('user_id'));
$html	.= "<h3>Artist</h3>";

$html	.= "

<p>
<strong>Artistic Proposal for artBO 2013:</strong> <em>".$user->__get('user_gallery_proposal')." </em>,
</p>";

$html	.= "<h4>Represented Artists Proposed for artBO 2013</h4>";
$dir2 	= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))) . '/artistas/';	

for($i = 1; $i <= count($artists); $i++)
{
	$artist 	= $artists[($i - 1)]; 
	$artistWork	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));
$html	.= "
	<p>
	<strong>Name</strong>: <em> </em><br>
	<strong>Last Name</strong>: <em> </em><br>
	<strong>Nationality</strong>: <em> </em><br>
	<strong>Date of birth</strong>: <em>".$artist->__get('artist_birthday')." </em><br>
	<strong>Location</strong>: <em>". $artist->__get('artist_residency')." </em><br>
	<strong>Artist Review</strong>: <em>".$artist->__get('artist_review')." </em><br>";

	for($j=1; $j<=3; $j++)
	{		
		$file = '';
		if(isset($artistWork[($j - 1)]) && ($artistWork[($j - 1)]->__get('artist_work_file') != ''))
		{
			
			$file = file_exists($dir2 . $artistWork[($j - 1)]->__get('artist_work_file')) ? APPLICATION_FULL_URL . $dir2 . $artistWork[($j - 1)]->__get('artist_work_file') : '';
			$html	.= "Work name: <em>".$artistWork[($j - 1)]->__get('artist_work_name')."</em><br>
			<strong>Media</strong>: <em>".$artistWork[($j - 1)]->__get('artist_work_technique')."</em><br>
			<strong>Dimensions</strong>: <em>".$artistWork[($j - 1)]->__get('artist_work_dimensions')."</em><br>
			<strong>Year</strong>: <em>". $artistWork[($j - 1)]->__get('artist_work_year')."</em><br>
			<strong>Image</strong>: <em>". $file."</em><br>";
		}		
	}
	$html	. = "</p>";
}

$html	.= "<h4>Other artists represented by the Gallery</h4>";

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


$html	.= "<h3>Type of Stand</h3>";

$html	.= "<p>

<strong>Type of Stand</strong>: <em>".$stand."</em><br>
<strong>Name with which you wish to appear on your stand</strong>: <em>".$user->__get('user_space_name')."</em>,
</p>
";

//DOCUMENTOS
//-----------------------
$html	.= "<h3>Documents</h3>";

$html	.= "<p>
<strong>Certificate of incorporation</strong>: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_certificate')."</em><br>
<strong>Tax Identification</strong>: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_rut')."</em><br>
<strong>Identity Document</strong>: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_document')."</em><br>
<strong>Copy of payment</strong>: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_payment')."</em><br>
</p>
";

?>