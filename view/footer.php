
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/app.js"></script>	
	<script src="<?php echo APPLICATION_URL?>javascripts/validator.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/util.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/button.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/ajax.requester.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/deletefile.ajax.requester.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/handler.base.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/window.receive.message.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/handler.form.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/handler.xhr.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/uploader.basic.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/dnd.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/uploader.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/fileuploader/jquery-plugin.js"></script>
	<?php $name = explode("/", $path); ?>

	<!-- Included JS Files -->
	<script type="text/javascript">
	var ApplicationUrl = '<?php echo APPLICATION_URL?>';	
	$(function() {
		
		if ($(".datepicker").is('*')) {

		$( ".datepicker" ).datepicker({
			showOn: "button",
			buttonImage: ApplicationUrl + "images/calendar.png",
			buttonImageOnly: true,
			dateFormat: "yy-mm-dd" 
		});
 
		}else if ($("#sortable").is('*')) {
			
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
			
		}else if ($(".link_list").is('*')) {
			
		$(".link_list").sortable({
			placeholder: "ui-state-highlight"
		});
		$(".link_list").disableSelection();
			
		}else if  ($(".link_list").is('*')) {
		
		$( ".products-li" ).sortable();
		$( ".products-li" ).disableSelection();		
		
		}
		
	});
	
	
	
	 $(document).ready(function() {
	 	
	 	
	
		$('a[title$="url"]').click(function (){
			
		$(".url-m").slideToggle();
		console.log("enviado");
		}); 
		
	
		

		$("#link").click(function (){
			
		$(".link").slideToggle();	
			
		}); 
		
		$("#export-orders").click(function (){
			
		$(".e-order").slideToggle();	
			
		}); 
		
		$("#export-clients").click(function (){
			
		$(".e-client").slideToggle();	
			
		}); 
		
		$("#export-products").click(function (){
		
		//alert("tocado");	
		$(".e-product").slideToggle();	
			
		});
		
		
		$(".var-edit").click(function(){

			$(".var-edit-new").slideToggle();	
			
		});
		
		$("#var-cancel").click(function(){

		$(".var-edit-new").slideToggle();	

		});
		
		$(".edit-var").click(function(){

		$(".variant-edit").slideToggle();	

		});
		
		$(".edit-var-detalle").click(function(){

		$(".variant-edit").slideToggle();	
		
		});
		
		$(".admin").click(function(){

		$(".new-admin").slideToggle();	

		});
		
		// revelar reveal registro-artistas
		$(".revealer").each(function(item){
			$(this).click(function () {
				var toggle = true;
				if(this.nodeName.toLowerCase() == 'input')
				{
					if(!$(this).attr("checked"))
						toggle = false;
				}
				if(toggle) {	
					$('#artista-' + this.id.split('-')[1]).reveal();
				}	
				//$("#link-" + this.id.split('-')[1]).slideToggle();
			});

		});
		
		$(".revealer-new").each(function(item){
			$(this).click(function () {
				$("#artist_name_new").val($("#artist_name_" + (counterArtist - 1)).val());
				$("#artist_surname_new").val($("#artist_surname_" + (counterArtist - 1)).val());
				$("#artist_nationality_new").val($("#artist_nationality_" + (counterArtist - 1)).val());
				var toggle = true;
				if(this.nodeName.toLowerCase() == 'input')
				{
					if(!$(this).attr("checked"))
						toggle = false;
				}
				if(toggle) {
					
					$('#artista-new').reveal();
				}	
				//$("#link-" + (counterArtist - 1)).slideToggle();
			});
		});
		
		// END revelar reveal registro-artistas
		
		// datos - galeria slide to 
		$("#galeria-next").click(function(){

		$(".contenido").hide().load("datos-artista.php").fadeIn(1000);
		
		});
		
		// datos - galeria slide to 
		
		// nuevo artista 

		// end nuevo artista
		
		
		console.log(<?php echo isset($user) ?>);
		
		
		
		
		switch ('<?php echo $name[1] ?>' ) {
			case 'registro-inicio-0400':$('#0').addClass('active');
			break;	
			case 'registro-ferias-0430':$('#3').addClass('active');
			break;
			case 'registro-exposiciones-0420':$('#2').addClass('active');
			break;
			case 'registro-galerias-0410':$('#1').addClass('active');
			break;
			case 'registro-artistas-0440':$('#4').addClass('active');
			break;
			case 'registro-espacio-0450':$('#5').addClass('active');
			break;
			case 'registro-documentos-0460':$('#6').addClass('active');
			break;
			
			}
			
		
	 });
	</script>
	
	
		

</body>
<!-- End Body -->
</html>
