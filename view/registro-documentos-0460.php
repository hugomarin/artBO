<?php 
include_once('header-login.php'); 
include_once('menu.php'); 
?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<div class="row"><!-- titulo row -->
				<div class="nine columns">
					<span class="rojo">Registro</span>
					<h2><span class="quitarH2">  Documentos:</span> <?php echo $user->__get('user_name');?></h2>	
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
			<p>Adjunte copias de los documentos en formato JPG o PDF únicamente. Con un peso máximo de 1000KB</p>
				
				<!-- row -->
				<div class="row">
				
					<!-- Col 1/4-->				
					<div class="three columns">
							
						<h4>Certificado de existencia*</h4>
						<input type="file" name="user_certificate">
						<p>Expedido por la Cámara de Comercio de Bogotá (Original, no mayor a 90 días de expedición) o documento correspondiente de constitución expedido por el ente respectivo de su país.</p>
                        <?php if ($user->__get('user_certificate') != '') { ?><p><a href="<?php echo APPLICATION_URL;?>resources/documents/<?php echo $user->__get('user_certificate');?>">Documento actual</a></p><?php } ?>
						
                    </div>
					<!-- End Col 1/4 -->
					<!-- Col 2/4-->				
					<div class="three columns">
							
						<h4>RUT o Identificación Fiscal*</h4>
						<input type="file" name="user_rut">
						<p>El RUT es un documento exigido paras las Galerías colombianas, Las extranjeras deben enviar identificación fiscal.</p>
                        <?php if ($user->__get('user_rut') != '') { ?><p><a href="<?php echo APPLICATION_URL;?>resources/documents/<?php echo $user->__get('user_rut');?>">Documento actual</a></p><?php } ?>
                        
					</div>
					<!-- End Col 2/4 -->
					<!-- Col 3/4-->				
					<div class="three columns">
							
						<h4>Documento de identidad*</h4>
						<input type="file" name="user_document">
                        <p>Documento de identidad del responsable legal de la galería (c&eacute;dula de ciudadanía o de extranjer&iacute;a para las galerías colombianas, el pasaporte para las galerías internacionales).</p>
                        <?php if ($user->__get('user_document') != '') { ?><p><a href="<?php echo APPLICATION_URL;?>resources/documents/<?php echo $user->__get('user_document');?>">Documento actual</a></p><?php } ?>
				
                	</div>
					<!-- End Col 3/4 -->
					<!-- Col 4/4-->				
					<div class="three columns">
							
						<h4>Registro de pago*</h4>
						<input type="file" name="user_payment">
						<p>Copia del pago de los derechos de inscripción por USD $160</p>
                        <?php if ($user->__get('user_payment') != '') { ?><p><a href="<?php echo APPLICATION_URL;?>resources/documents/<?php echo $user->__get('user_payment');?>">Documento actual</a></p><?php } ?>
                        
					</div>
					<!-- End Col 4/4 -->
				
				</div>
				<br />
				<!-- aceptación de terminos -->
				<div class="panel-2">
				<p> Yo <input type="text" class="medium" placeholder="Nombre del Director o Representante legal" name="user_name_accept" value="<?php echo $user->__get('user_name_accept');?>" /> Identificado con
					<input type="text" class="small" placeholder="Número de Cédula" name="user_document_accept" value="<?php echo $user->__get('user_document_accept');?>"   /> 
				declaro conocer y aceptar <a href="documentos/Reglamento.pdf" title="Reglamento de participación en artBO" target="_blank">las condiciones y el reglamento de participación</a> en artBO.
				</p>
				
				<input type="checkbox" name="user_accept" value="1" <?php if($user->__get('user_accept') == 1) { echo 'checked="checked"'; }?> /><span> Acepto</span>
				</div>
				<!-- aceptación de terminos -->

				<!-- END row -->
                </form>
				<hr />
				<span><strong>*Datos requeridos</strong></span>
			<!-- botones anterior guardar siguiente -->
					<div class="row">
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html">Anterior</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Terminar</a>
								</div><!-- END guardar -->
							</td>
						</tr>
                        <?php 
						if (isset($_GET[0]))
						{
						?>
						<tr>
							<td colspan="3"><p class="text-center azul">Su registro ha sido guardado</p></td>
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
	alert('Al hacer click declaro conocer y aceptar las condiciones y el reglamento de participaciónen artBO. Ha terminado de registrar su galería. Muchas gracias.');
</script>
<?php
}
?>