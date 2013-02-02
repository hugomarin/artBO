

<?php include_once('header-login.php'); ?>


		
<!-- 2.menu-->
<?php include_once('menu.php'); ?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<div class="row"><!-- titulo row -->
				<div class="nine columns">
					<span class="rojo">Registration</span>
					<h2><span class="quitarH2">  Documents:</span> <?php echo $user->__get('user_name');?></h2>	
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-one">
					<a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html"class="back"></a>
					<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
			<hr />
			<form action="<?php echo APPLICATION_URL?>user.controller/uploadDocuments.html" id="validable" class="" method="post" enctype="multipart/form-data" onSubmit="return Validator.prototype.checkRequiredFields();">
			<p>Upload a copy of the following documents in .jpg, .pdf or .png formats and not exceeding 1000KB.</p>
				
				<!-- row -->
				<div class="row">
				
					<!-- Col 1/4-->				
					<div class="three columns">
							
						<h4>Certificate of incorporation*</h4>
						<input type="file" name="user_certificate">
						<p>The certificate of incorporation issued by the respective authority of your country.</p>
					</div>
					<!-- End Col 1/4 -->
					<!-- Col 2/4-->				
					<div class="three columns">
							
						<h4>Tax Identification*</h4>
						<input type="file" name="user_rut">
						<p>The tax identification issued by the respective authority of your country.</p>
					</div>
					<!-- End Col 2/4 -->
					<!-- Col 3/4-->				
					<div class="three columns">
							
						<h4>Identity Document*</h4>
						<input type="file" name="user_document">
                        <p>The passport of the legal representative of the gallery.</p>
					</div>
					<!-- End Col 3/4 -->
					<!-- Col 4/4-->				
					<div class="three columns">
							
						<h4>Copy of payment*</h4>
						<input type="file" name="user_payment">
						<p>Receipt of payment for the application fee in the amount of USD $160.</p>
					</div>
					<!-- End Col 4/4 -->
				
				</div>
				<br />
				<!-- aceptación de terminos -->
				<div class="panel-2">
				<p> I <input type="text" class="medium" placeholder="Representative" name="user_name_accept" value="<?php echo $user->__get('user_name_accept');?>" /> Identified with
					<input type="text" class="small" placeholder="Number of identity" name="user_document_accept" value="<?php echo $user->__get('user_document_accept');?>"   /> 
				declare to have knowledge and accept <a href="documentos/Reglamento.pdf" title="Reglamento de participación en Artbo" target="_blank">the conditions and participation regulations </a> of Artbo.
				</p>
				
				<input type="checkbox" name="user_accept" value="1" <?php if($user->__get('user_accept') == 1) { echo 'checked="checked"'; }?> /><span> Acepto</span>
				</div>
				<!-- aceptación de terminos -->

				<!-- END row -->
                </form>
				<hr />
				<span><strong>*Data required</strong></span>
			<!-- botones anterior guardar siguiente -->
					<div class="row">
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html">Back</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="Finish">Finish</a>
								</div><!-- END guardar -->
							</td>
						</tr>
                        <?php 
						if (isset($_GET[0]))
						{
						?>
						<tr>
							<td colspan="3"><p class="text-center azul">Your registration has been saved</p></td>
						</tr>
                        <?php
						}
						?>
					</table>
					</div>	
					<!-- END botones anterior guardar siguiente -->
		
			
	
	</div><!-- END Main: Panel -->
	<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra" /><!-- Sombra final del panel -->
</div>	><!-- 3. END Main: Row -->

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

<?php 
if (isset($_GET[0]))
{
?>
<script language="JavaScript">
	alert('You declare to have knowledge and accept the conditions and participation regulations of Artbo.You has finished registering your gallery. Thank you very much.');
</script>
<?php
}
?>