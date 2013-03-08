<?php
  $day   = 12;     // Day of the countdown
  $month = 06;      // Month of the countdown
  $year  = 2013;   // Year of the countdown
  $hour  = 23;     // Hour of the day (east coast time)

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time())/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);
?>
<!-- 2. Navigation -->
<div class="row">
	<div class="twelve columns">
		<div class="right">
			El registro de <span class="redtxt">Galerías </span> vence en el <span class="red label radius"><?php //echo $days ?> 30</span>  de <strong><!-- días -->  Abril</strong>
		</div>
	</div>
</div>

<div class="row"><!-- Row -->	

	<ul class="nav-bar">
		<li id="0">
			<a href="<?php echo APPLICATION_URL?>registro-inicio-0400.html" class="main" title="Inicio">INSTRUCCIONES </a>
		</li>
		<li id="1">
			<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-galerias-0410.html" class="main" title="Galerías"><span class="number-menu">1</span>Galería </a>
	    </li>
	    <li id="2">
	    	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html" class="main" title="Exposiciones"><span class="number-menu">2</span>Exposiciones</a>
	    </li>
	    <li id="3">
	    	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-ferias-0430.html" class="main" title="Ferias"><span class="number-menu">3</span>Ferias</a>
	    </li>
	    <li id="4">
	    	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-artistas-0440.html" class="main" title="Artistas"><span class="number-menu">4</span>Artistas</a>
	    </li>
	     <li id="5">
	     	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html" class="main" title="Tipo de Stand"><span class="number-menu">5</span>Tipo de Stand</a>
	    </li>
	    <li id="6">
	    	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-documentos-0460.html" class="main" title="Documentos"><span class="number-menu">6</span>Documentos</a>
	    </li>
	</ul>
</div><!-- End Row -->
<!-- 2. End Navigation -->

