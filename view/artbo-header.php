<?php
$default	= 'http://cambelt.co/icon/camera/480x360?color=b71632,fefefe';
$dir		= 'resources/galerias/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/'
?>
<div class="encabezado">
		<!-- header artbo logo -->
	<div class="row superior-2">	
		<!-- columns 1/2 -->
		<div class="four columns">
				<img src="<?php echo APPLICATION_URL?>images/resources/logo.png" height="76" width="278" alt="logo" />
		</div>
		<!-- END columns 1/2 -->
		
		<!-- columns 2/2 -->
		<div class="eight columns lateralder ">
			<div class="perfil-data">
				<div class="perfil left">
					<?php 
					if (isset($user)) 
					{
					?>
                    <!-- <a href="<?php echo APPLICATION_URL?>datos-galeria-0300.html"><img src="<?php echo APPLICATION_FULL_URL?>resources/images/26x26/<?php echo $user->__get('user_image');?>" class="left"  height="36" width="36" alt="perfil"/></a> -->
                    <?php
					$image	= (($user->__get('user_gallery_image') != '') && (!file_exists(APPLICATION_URL.$dir.$user->__get('user_gallery_image')))) ? APPLICATION_URL.$dir.$user->__get('user_gallery_image') : $default;
					?>        
                    	<a href="<?php echo APPLICATION_URL?>datos-galeria-0300.html"><img src="<?php echo $image?>" class="left"  height="36" width="36" alt="perfil"/></a>
                    <p class="left"><?php echo '<strong>'.$user->__get('user_gallery_comname').'</strong>';?><br />
					<a href="<?php echo APPLICATION_URL?>datos-galeria-0300.html" title="Clic aquí para editar información de la galería">Editar perfil</a> | <a href="<?php echo APPLICATION_URL?>exit.html" title="Salir">Salir</a></p>
					<?php
					}
					?>
                </div>
				<div class="idiomas left">
					<p>Español | <a href="<?php echo APPLICATION_URL?>en/<?php echo str_replace("view/", "", $path);?>.html" title="artBO English">English</a></p>
				</div>
			</div>
		</div>
		<!-- END columns 2/2 -->
	</div>
		<!-- END header artbo logo -->
</div>	