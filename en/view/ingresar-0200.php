
<!-- 1. header -->
<?php include_once('header-login.php'); ?>
<!-- 1. End header -->

		<!-- ingresar  Row-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<h2>Type of application</h2>
			<p>Select to begin the process</p>
			<hr />
				<div class="row">
				
					<!-- Col 1/3 -->				
					<div class="six columns">
							
						<h3>Galleries</h3>
						<p class="min-height">This main section is for galleries that have more than 3 years of operations and comply with the organization’s quality criteria. The stands available in this section are Plus 63mt², 63 mt², 45mt², 33.75 mt² y 31.5 mt².</p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/1.html" class="round  button" title="Select">Select</a>
					</div>
					<!-- End Col 1/3 -->
					<!-- Col 2/3 -->				
					<div class="six columns">
							
						<h3>New Galleries</h3>
						<p class="min-height">This section is for galleries that represent emerging artists, have less than 3 years of operation and comply with the organization’s quality criteria. The stand measures 21 m².  Only one will be assigned per gallery.</p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/2.html" class="round  button" title="Select">Select</a>
					</div>
					<!-- End Col 2/3 -->
					<!-- Col 3/3 -->				
					<!--
<div class="four columns">
							
						<h3>Individual Projects</h3>
						<p class="min-height">Spaces in this section will be assigned by invitation only by the curator designated by the organization. </p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/3.html" class="round  button" title="Select">Select</a>
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

