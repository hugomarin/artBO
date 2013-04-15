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
	<link rel="stylesheet" href="stylesheets/app.css">
	<link rel="stylesheet" href="stylesheets/new.css">
	<link rel="stylesheet" href="stylesheets/phase.css">
	<link rel="stylesheet" href="stylesheets/foundation-overrides.css">
	<link rel="stylesheet" href="stylesheets/ui-lightness/jquery-ui-1.8.18.custom.css">
	<link rel="stylesheet" href="stylesheets/jquery.mCustomScrollbar.css">
	<script src="javascripts/jquery.min.js"></script>    
	<script src="javascripts/jquery-ui-1.8.18.custom.min.js"></script>

	<script type="text/javascript" src="//use.typekit.net/fzq1qvs.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body class="bigpic3">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<div class="alert-box success">
				Correo enviado con &eacute;xito
				<a href="#" class="close">&times;</a>
			</div>
			<div class="panel">
				<h3>Restablecer clave</h3>
				<p>Hemos enviado un correo a <a class="bold" href="mailto:example@ex.com">example@ex.com </a> con instrucciones. Revise su carpeta de <strong>Spam</strong> si no lo encuentra.</p>
				<p>Para enviar nuevamente el correo haga clic <a href="login_build-recuperar-contrasena-0120.php" title="Restablecer clave"><strong>aquí</strong></a></p>
			</div>
			<div class="row">
				<div class="eight columns"></div>
				<div class="four columns"><a class="button radius right" href="login.html" title="Inicia Sesion">Inicia sesión</a></div>
			</div>
		</div>
	</div>
</div>	
<!-- 4. footer -->			

	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="javascripts/modernizr.foundation.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>	
    <script src="javascripts/jquery.mousewheel.min.js"></script>
    <script src="javascripts/jquery.mCustomScrollbar.min.js"></script>
    

	<!-- Included JS Files -->
	
	<script type="text/javascript">
		jQuery(function($){
			 var randomNum = Math.ceil(Math.random()*7);
			console.log(randomNum);
			 $('body').addClass("bigpic"+randomNum);
		});
	</script>


</body>
<!-- End Body -->
</html>

<!-- 4. End footer -->
 


