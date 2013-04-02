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
		<a href="#" class="getback"><span><img src="images/smallarrow.png" alt="" width="17" height="16" /></span>INDICE DE GALERÍAS</a>
	</div>
	<div class="six columns">
		<ul class="main-menu no-bullet">
			<li><a href="#" class="activo"><span><img src="images/smalldoc.png" alt="" width="12" height="18" /></span>DOCUMENTOS</a></li>
			<li><a href="#"><span><img src="images/smallfolder.png" alt="" width="17" height="16" /></span>DESCARGAR</a></li>
			<li><a href="#"><span><img src="images/smalledit.png" alt="" width="17" height="19" /></span>EDITAR</a></li>
			<li><a href="#" class="activate"><span><img src="images/smallcheck.png" alt="" width="18" height="17" /></span>ACTIVAR</a></li>
		</ul>
	</div>
</div>
<br />

