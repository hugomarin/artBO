
<!-- 1. header -->
<?php include_once('header-login.php'); ?>
<!-- 1. End header -->

		<!-- ingresar  Row-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<h2>Tipo de aplicación</h2>
			<p>Seleccione para iniciar el proceso</p>
			<hr />
				<div class="row">
				
					<!-- Col 1/3 -->				
					<div class="six columns">
							
						<h3>Galerías</h3>
						<p class="min-height">Esta sección principal es para galerías con más de tres años de trayectoria que cumplen con los criterios de calidad que la organización ha determinado. En esta sección se pueden encontrar stands de Plus 63 mts², 63 mts², 45mts², 33.75 mts² y 31.5 mts².</p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/1.html" class="round  button" title="Seleccionar">Seleccionar</a>
					</div>
					<!-- End Col 1/3 -->
					<!-- Col 2/3 -->				
					<div class="six columns">
							
						<h3>Nuevas Galerías</h3>
						<p class="min-height">Este sección es para galerías que representa artistas emergentes con menos de tres años de actividades y que cumplen con los criterios de calidad que la organización ha determinado. Los stands son de 21 m² y sólo se asignará un espacio por galería.</p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/2.html" class="round  button" title="Seleccionar">Seleccionar</a>
					</div>
					<!-- End Col 2/3 -->
					<!-- Col 3/3 -->				
					<!--
<div class="four columns">
							
						<h3>Proyectos individuales</h3>
						<p class="min-height">Los espacios de esta sección sólo serán asignados por invitación directa del curador designado por artBO.</p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/3.html" class="round  button" title="Seleccionar">Seleccionar</a>
					</div>
-->
					<!-- End Col 4/4 -->

				</div>
		</div>
		<!-- panel -->
	
	</div>
	<!-- END ingresar Row -->

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

