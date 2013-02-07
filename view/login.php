<?php 
include_once('header-nologin2.php'); 
?>

<body class="bigpic">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			
			<div class="image-logos"></div>
			
			<div class="panel radius">
				<h3>Inicio de Sesión</h3>
				<p>Si nunca te haz registrado en artBO, incluida la última versión.
				Ya te registráste en artBO, haz clic <a class="underline" href="#">aquí.</a></p>
				
				<form action="login_submit" method="get" accept-charset="utf-8">
					<label for="name">Correo Electronico</label>
					<input type="email" name="some_name" value="" id="some_name"/>
					<label for="name">Clave</label>
					<input type="password" name="some_name" value="" id="some_name"/>
				</form>
			</div>
			<div class="row">
				<div class="six columns"><a href="#" class="whitetxt bold">&iquest;Olvidó su contraseña?</a></div>
				<div class="six columns"><a href="#" class="button radius right">Inicio de sesión</a></div>
			</div>

		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

