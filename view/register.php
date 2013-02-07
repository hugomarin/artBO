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
				<h3>Registro</h3>
				<p>Si nunca te haz registrado en artBO, incluida la última versión.
				Ya te registráste en artBO, haz clic <a class="underline" href="#">aquí.</a></p>
				
				<form action="register_submit" method="get" accept-charset="utf-8">
					<label for="name"><span class="asterisk">*</span>Nombre</label>
					<input type="text" name="some_name" value="" id="some_name"/>
					<label for="name"><span class="asterisk">*</span>Apellido</label>
					<input type="text" name="some_name" value="" id="some_name"/>
					<label for="name"><span class="asterisk">*</span>Nombre de la Galeria</label>
					<input type="text" name="some_name" value="" id="some_name"/>
					<label for="name"><span class="asterisk">*</span>Correo Electronico</label>
					<input type="email" name="some_name" value="" id="some_name"/>
					<label for="name"><span class="asterisk">*</span>Confirmación correo Electronico</label>
					<input type="email" name="some_name" value="" id="some_name"/>
					<label for="name"><span class="asterisk">*</span>Clave</label>
					<input type="password" name="some_name" value="" id="some_name"/>
					<label for="name"><span class="asterisk">*</span>Confirmación Clave</label>
					<input type="password" name="some_name" value="" id="some_name"/>
				</form>
			</div>
			<div class="row">
				<div class="six columns"><span class="whitetxt">* Datos requeridos</span></div>
				<div class="six columns"><a href="#" class="button radius right">Registrarse</a></div>
			</div>
			<br />
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

