<?php
$user			= new User(383);
$dir			= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$html			= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Ha finalizado su registro</h1><p  style="margin-bottom:30px;">Usted ha completado el proceso de registro de artBO 2013. <br />Agradecemos su participaci&oacute;n en la convocatoria.</p><p>artBO, Feria Internacional de Arte de Bogot&aacute;</p></div><h3>Galer&iacute;a</h3>';
// FIRST
$imagenGaleria	= APPLICATION_FULL_URL.$dir.$user->__get('user_gallery_image');
$imagenDirector	= APPLICATION_FULL_URL.$dir.$user->__get('user_director_image');
$country		= new Country('country_id');

$html	.= "
<p>
Imagen de la galer&iacute;a: <em>$imagenGaleria</em><br>
Nombre comercial de la galer&iacute;a: <em> ".$user->__get('user_gallery_comname')." </em><br>
Nombre de la empresa o raz&oacute;n social: <em> ".$user->__get('user_gallery_razon')." </em><br>
Tipo de documento: <em> ".$user->__get('user_document_type')." </em><br>
N&uacute;mero de documento: <em> ".$user->__get('user_gallery_document')." </em><br>
Pa&iacute;s: <em>".$country->__get('country_id')."</em><br>
Ciudad: <em> ".$user->__get('user_city')." </em><br>
Direcci&oacute;n: <em> ".$user->__get('user_address')." </em><br>
C&oacute;digo postal: <em> ".$user->__get('user_postal_code')." </em><br>
Rese&ntilde;a de la galer&iacute;a: <em> ".$user->__get('user_gallery_comname')." </em><br>
Tel&eacute;fono: <em> ".$user->__get('user_phone')." </em><br>
Horario de apertura al p&uacute;blico (0:00 - 24:00): <em> ".$user->__get('user_open_time')." </em><br>
&aacute;rea de exposici&oacute;n de la galer&iacute;a (mts2): <em> ".$user->__get('user_gallery_comname')." </em><br>
A&ntilde;o de apertura: <em>".$user->__get('user_area')." </em><br>
Perfil de la galer&iacute;a: <em> ".$user->__get('user_gallery_profile')."</em><br>
Foto del director: <em>".$imagenDirector." </em><br>
Nombre(s) completo del director: <em>".$user->__get('user_director_name')." </em><br>
Correo(s) electr&oacute;nico del director: <em>".$user->__get('user_director_email')." </em><br>
Nombre(s) persona contacto: <em>".$user->__get('user_contact_name')." </em><br>
Correo(s) electr&oacute;nico contacto: <em>".$user->__get('user_contact_email')." </em><br>
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
	Nombre de la exposici&oacute;n: <em>".$exposition->__get('exposition_name')."</em>,
	A&ntilde;o: <em>".$exposition->__get('exposition_year')."</em>,
	Mes: <em>".$exposition->__get('exposition_month')."</em>,
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
Participaci&oacute;n en artBO <em> ";
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

$html	.= "<h4>Participaci&oacute;n en otras ferias</h4>";

foreach ($ferias as $feria)
{
	$country	= new Country($feria->__get('country_id'));
	$html	.= "
	<p><!--Esto por cada feria-->
	Nombre de la feria: <em>".$feria->__get('feria_name')."</em>,
	Ciudad: <em>".$feria->__get('feria_city')."</em>,
	Pa&iacute;s: <em>".$country->__get('country_id')."</em>,
	A&ntilde;o: <em>".$feria->__get('feria_year')." </em>,
	</p>";
}

//ARTISTAS
//----------------------------------
$artists	= ArtistHelper::retrieveArtists(" AND user_id = ". $user->__get('user_id'));
$html	.= "<h3>Artistas</h3>";

$html	.= "

<p>
Propuesta art&iacute;stica para artBO 2013 (opcional, m&aacute;ximo 250 palabras): <em>".$user->__get('user_gallery_proposal')." </em>,
</p>";

$html	.= "<h4>Artistas representados propuestos para artBO</h4>";
$dir2 	= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))) . '/artistas/';	

for($i = 1; $i <= count($artists); $i++)
{
	$artist 	= $artists[($i - 1)]; 
	$artistWork	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));
$html	.= "
	<p>
	Nombre: <em> </em><br>
	Apellido: <em> </em><br>
	Nacionalidad: <em> </em><br>
	Fecha de nacimiento: <em>".$artist->__get('artist_birthday')." </em><br>
	Lugar de residencia: <em>". $artist->__get('artist_residency')." </em><br>
	Rese&ntilde;a del artista: <em>".$artist->__get('artist_review')." </em><br>";

	for($j=1; $j<=3; $j++)
	{		
		$file = '';
		if(isset($artistWork[($j - 1)]) && ($artistWork[($j - 1)]->__get('artist_work_file') != ''))
		{
			
			$file = file_exists($dir2 . $artistWork[($j - 1)]->__get('artist_work_file')) ? APPLICATION_FULL_URL . $dir2 . $artistWork[($j - 1)]->__get('artist_work_file') : '';
			$html	.= "Nombre de la obra: <em>".$artistWork[($j - 1)]->__get('artist_work_name')."</em><br>
			T&eacute;cnica: <em>".$artistWork[($j - 1)]->__get('artist_work_technique')."</em><br>
			Dimensiones: <em>".$artistWork[($j - 1)]->__get('artist_work_dimensions')."</em><br>
			A&ntilde;o de realizaci&oacute;n: <em>". $artistWork[($j - 1)]->__get('artist_work_year')."</em><br>
			Imagen: <em>". $file."</em><br>
			
			</p>";
		}		
	}
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

Tipo de stand: <em>".$stand."</em>,
Nombre para la cornisa del stand: <em>".$user->__get('user_space_name')."</em>,
</p>
";

//DOCUMENTOS
//-----------------------
$html	.= "<h3>Documentos</h3>";

$html	.= "<p>
Certificado de existencia: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_certificate')."</em>,
RUT o identificaci&oacute;n fiscal: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_rut')."</em>,
Documento de identidad: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_document')."</em>,
Registro de pago: <em>".APPLICATION_FULL_URL.$dir.$user->__get('user_payment')."</em>,
</p>
";

echo $html;
?>





