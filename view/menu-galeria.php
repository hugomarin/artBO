<?php
  $day   = 30;     // Day of the countdown
  $month = 04;      // Month of the countdown
  $year  = 2013;   // Year of the countdown
  $hour  = 23;     // Hour of the day (east coast time)

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time())/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);
?>
<!-- 2. Navigation -->
<div class="row breadcrumb">
	<div class="six columns">
		<a href="#"><span>A</span>INDICE DE GALERÍAS</a>
	</div>
	<div class="six columns">
		<ul class="main-menu no-bullet">
			<li><a href="#"><span>F</span>DOCUMENTOS</a></li>
			<li><a href="#"><span>D</span>DESCARGAR</a></li>
			<li><a href="#"><span>W</span>EDITAR</a></li>
			<li><a href="#"><span>F</span>ACTIVAR</a></li>
		</ul>
	</div>
</div>
<br />

