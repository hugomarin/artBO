<div class="encabezado">
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
                    <img src="<?php echo APPLICATION_FULL_URL?>resources/images/26x26/<?php echo $user->__get('user_image');?>" class="left"  height="26" width="26" alt="Avatar"/>
					<p class="left"><strong><?php echo $user->__get('user_name');?></strong><br />
											<?php echo $user->__get('user_director_name');?><br />
					<a href="<?php echo APPLICATION_URL?>exit.html" title="Salir"><strong>Salir</strong></a></p>
					<?php
					}
					?>
                </div>

				<div class="idiomas left">
					<p><a href="<?php echo APPLICATION_URL?>../home.html" title="artBO English">Español</a> / English</p>
				</div>
			</div>
		</div>
		<!-- END columns 2/2 -->
	</div>
		<!-- END header artbo logo -->
</div>	