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
	<div class="twelve columns">
		<h5 class="redtext">Galerías</h5>
		<h3>Indice de galerías</h3>
		<h5>Este es el registro de todas las galerías registradas para artBO 2013</h5>
	</div>
</div>
<br />

