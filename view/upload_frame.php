<?php
//Get file upload progress information.
if($_GET[0] == 'pk') 
{
	$status = apc_fetch('upload_'.$_GET[0]);
	echo $status['current']/$status['total']*100;
	die;
}
//

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
<link href="<?php echo APPLICATION_URL?>view/style_progress.css" rel="stylesheet" type="text/css" />

<script>
$(document).ready(function() { 
//

	setInterval(function() 
		{
	$.get("<?php echo APPLICATION_URL?>upload_frame/pk/<?php echo $_GET[1]; ?>/"+ Math.random()+".html", { 
		//get request to the current URL (upload_frame.php) which calls the code at the top of the page.  It checks the file's progress based on the file id "progress_key=" and returns the value with the function below:
	},
		function(data)	//return information back from jQuery's get request
			{
				$('#progress_container').fadeIn(100);	//fade in progress bar	
				$('#progress_bar').width(data +"%");	//set width of progress bar based on the $status value (set at the top of this page)
				$('#progress_completed').html(parseInt(data) +"%");	//display the % completed within the progress bar
			}
		)},500);	//Interval is set at 500 milliseconds (the progress bar will refresh every .5 seconds)

});


</script>

<body style="margin:0px">
<!--Progress bar divs-->
<div id="progress_container">
	<div id="progress_bar">
  		 <div id="progress_completed"></div>
	</div>
</div>
<!---->
</body>