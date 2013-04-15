<?php 
$filter	= '';
if (isset($_POST['user_gallery_comname']))
	$filter	= ' AND user_gallery_comname like "%'.escape($_POST['user_gallery_comname']).'%"';
$order	= 'user_gallery_comname';
if (isset($_GET[0]))
{
	$_GET[0]	= urldecode($_GET[0]);
	$order		= escape($_GET[0]);
}
if (isset($_POST['registers']))
	$_SESSION['size']	= $_POST['registers'];
$size		= isset($_SESSION['size']) ? $_SESSION['size'] : '5';
$page		= isset($_GET[1]) ? $_GET[1] : 1;
$userResult = UserHelper::selectUsers($filter." AND user_finalizado = 1");
$pager  	= new PanelPager($order, '', '', APPLICATION_URL . 'indice-galerias.panel', $size, $userResult["num_rows"], $page);

$limit 		= ' LIMIT ' . $pager->arrayStartNumber . ',' . $pager->resultSize; 
$users 	= UserHelper::retrieveUsers($filter." AND user_finalizado = 1 ORDER by ".$order. $limit);
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
	
	
	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery.min.js"></script>

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
                </div>
			</div>
		</div>
		<!-- END columns 2/2 -->
	</div>
		<!-- END header artbo logo -->
</div>	

<body>
<div class="row breadcrumb">
	<div class="twelve columns">
		<h5 class="redtext">Galerías</h5>
		<h3>Indice de galerías</h3>
		<h5>Este es el registro de todas las galerías registradas para artBO 2013</h5>
	</div>
</div>
<br />


	<div class="row main-row">	
		<div class="panel nopadding mtop20">
			<div class="first-header">
				
					<div class="row">
						<div class="six columns">
							<form action="<?php echo APPLICATION_URL;?>indice-galerias.panel.html" method="post" accept-charset="utf-8">
								<input type="text" name="user_gallery_comname" value="" id="search" placeholder="Buscar"/>
							</form>
						</div>
						<div class="six columns">
							<form action="<?php echo APPLICATION_URL;?>indice-galerias.panel.html" method="post" accept-charset="utf-8" id="frm">
								<div class="whomany">
									<span>Mostrar</span>
									<select name="registers" id="" onChange="$('#frm').submit();">
										<option value="5" <?php if ($size == 5) echo 'selected="SELECTED"';?>>5</option>
										<option value="10" <?php if ($size == 10) echo 'selected="SELECTED"';?>>10</option>
										<option value="20" <?php if ($size == 20) echo 'selected="SELECTED"';?>>20</option>
									</select>
									<span>registros</span>
								</div>
							</form>
						</div>
					</div>
				
			</div>
			<div class="inner-header watch">
				<div class="row">
			 		<div class="twelve columns">
						<table border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
                                	<?php
									$var = 'user_gallery_comname';
									$icon	=	'▼';
									if ($order	== 'user_gallery_comname')
									{
										$var	= 'user_gallery_comname DESC';
										$icon	= '▲';
									}
									?>
									<th>Nombre de la galería <a href="<?php echo APPLICATION_URL;?>indice-galerias.panel/<?php echo $var;?>.html"><?php echo $icon;?></a> </th>
									<th>Contacto</th>
									<th>Documento</th>
                                	<?php
									$var 	= 'country_id';
									$icon	=	'▼';
									if ($order	== 'country_id')
									{
										$var	= 'country_id DESC';
										$icon	= '▲';
									}										
									?>                                    
									<th>Pais <a href="<?php echo APPLICATION_URL;?>indice-galerias.panel/<?php echo $var;?>.html">▼</a></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
                            <?php
							foreach ($users as $user)
							{
								$country	= new Country($user->__get('country_id'));
								$label		= ($user->__get('user_state') == 'A') ? 'red' : 'gray';
								$estado		= ($user->__get('user_state') == 'A') ? 'Activo' : 'Inactivo';
							?>
                                <tr>
                                    <td><a href="<?php echo APPLICATION_URL;?>perfil-galeria.panel/<?php echo $user->__get('user_id');?>.html"><?php echo $user->__get('user_gallery_comname');?></a></td>
                                    <td><a href="mailto:<?php echo $user->__get('user_email');?>"><?php echo $user->__get('user_email');?></a></td>
                                    <td><?php echo $user->__get('user_document_type');?> <?php echo $user->__get('user_gallery_document');?></td>
                                    <td><?php echo utf8_encode($country->__get('country_name'));?></td>
                                    <td><span class="label <?php echo $label;?>"><?php echo $estado;?></span></td>
                                    <td><a href="<?php echo APPLICATION_URL;?>perfil-galeria.panel/<?php echo $user->__get('user_id');?>.html"><img src="<?php echo APPLICATION_URL;?>images/view.png" alt="" width="24" height="24" /></a></td>
                                </tr>
							<?php
							}
							?>
							
						</table>
					</div>
				</div>
		</div>
		<!-- panel -->
	

			<div class="inner-footer change">
						<div class="container">
							<div class="row">
								<div class="six columns centered">
									<div class="pag">
										<ul class="pagination">
										   <?php $pager->display(); ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div><!--/inner-footer-->
				</div><!-- END Main: Panel -->
				<div class="advisory">
					<span>Recomendamos visualizar en: IE 9.0 - Firefox 10.0 - Safari 5.1 - Chrome 17.0
					Optimizada 1024 x 768</span>
					<span><a href="http://www.artboonline.com/documentos/2130_reglamento_participacion_2013.pdf" target="_blank">Términos y Condiciones</a> del sitio</span>
				</div>
		</div>
	<!-- 3. END Row main --> 
		

	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/app.js"></script>	

	<!-- Included JS Files -->

	 <script>
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


