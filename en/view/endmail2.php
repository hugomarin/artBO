<?php
$dir			= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$html			= '';
// FIRST
$imagenGaleria	= APPLICATION_FULL_URL.$dir.$user->__get('user_gallery_image');
$imagenDirector	= APPLICATION_FULL_URL.$dir.$user->__get('user_director_image');
$country		= new Country('country_id');

$html	.= "<h3>Gallery</h3>
<p>
Image gallery: <em>$imagenGaleria</em><br>
Gallery name: <em> ".$user->__get('user_gallery_comname')." </em><br>
Gallery name: <em> ".$user->__get('user_gallery_razon')." </em><br>
Document type: <em> ".$user->__get('user_document_type')." </em><br>
Document number: <em> ".$user->__get('user_gallery_document')." </em><br>
Country: <em>".$country->__get('country_id')."</em><br>
City: <em> ".$user->__get('user_city')." </em><br>
Address: <em> ".$user->__get('user_address')." </em><br>
ZIP: <em> ".$user->__get('user_postal_code')." </em><br>
Gallery Review: <em> ".$user->__get('user_gallery_comname')." </em><br>
Phone: <em> ".$user->__get('user_phone')." </em><br>
Hours open to the public (0:00 - 24:00): <em> ".$user->__get('user_open_time')." </em><br>
Exhibition area of ​​the gallery (m2): <em> ".$user->__get('user_gallery_comname')." </em><br>
Year: <em>".$user->__get('user_area')." </em><br>
Gallery Profile: <em> ".$user->__get('user_gallery_profile')."</em><br>
Director Photo: <em>".$imagenDirector." </em><br>
Director(s) Name: <em>".$user->__get('user_director_name')." </em><br>
Director(s) Email: <em>".$user->__get('user_director_email')." </em><br>
Contact Name: <em>".$user->__get('user_contact_name')." </em><br>
Contact Email: <em>".$user->__get('user_contact_email')." </em><br>
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
	Name of the exhibition: <em>".$exposition->__get('exposition_name')."</em>,
	Year: <em>".$exposition->__get('exposition_year')."</em>,
	Month: <em>".$exposition->__get('exposition_month')."</em>,
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
Participation in artBO <em> ";
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
	Name of the Fair: <em>".$feria->__get('feria_name')."</em>,
	City: <em>".$feria->__get('feria_city')."</em>,
	Country: <em>".$country->__get('country_id')."</em>,
	Year: <em>".$feria->__get('feria_year')." </em>,
	</p>";
}

//ARTISTAS
//----------------------------------
$artists	= ArtistHelper::retrieveArtists(" AND user_id = ". $user->__get('user_id'));
$html	.= "<h3>Artist</h3>";

$html	.= "

<p>
Artistic Proposal for artBO 2013: <em>".$user->__get('user_gallery_proposal')." </em>,
</p>";

$html	.= "<h4>Represented Artists Proposed for artBO 2013</h4>";
$dir2 	= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))) . '/artistas/';	

for($i = 1; $i <= count($artists); $i++)
{
	$artist 	= $artists[($i - 1)]; 
	$artistWork	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));
$html	.= "
	<p>
	Name: <em> </em><br>
	Last Name: <em> </em><br>
	Nationality: <em> </em><br>
	Date of birth: <em>".$artist->__get('artist_birthday')." </em><br>
	Location: <em>". $artist->__get('artist_residency')." </em><br>
	Artist Review: <em>".$artist->__get('artist_review')." </em><br>";

	for($j=1; $j<=3; $j++)
	{		
		$file = '';
		if(isset($artistWork[($j - 1)]) && ($artistWork[($j - 1)]->__get('artist_work_file') != ''))
		{
			
			$file = file_exists($dir2 . $artistWork[($j - 1)]->__get('artist_work_file')) ? APPLICATION_FULL_URL . $dir2 . $artistWork[($j - 1)]->__get('artist_work_file') : '';
			$html	.= "Work name: <em>".$artistWork[($j - 1)]->__get('artist_work_name')."</em><br>
			Media: <em>".$artistWork[($j - 1)]->__get('artist_work_technique')."</em><br>
			Dimensions: <em>".$artistWork[($j - 1)]->__get('artist_work_dimensions')."</em><br>
			Year: <em>". $artistWork[($j - 1)]->__get('artist_work_year')."</em><br>
			Image: <em>". $file."</em><br>
			
			</p>";
		}		
	}
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

Type of Stand: <em>".$stand."</em><br>
Name with which you wish to appear on your stand: <em>".$user->__get('user_space_name')."</em>,
</p>
";

//DOCUMENTOS
//-----------------------
$html	.= "<h3>Documents</h3>";

$html	.= "<p>
Certificate of incorporation: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_certificate')."</em><br>
Tax Identification: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_rut')."</em><br>
Identity Document: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_document')."</em><br>
Copy of payment: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_payment')."</em><br>
</p>
";

?>