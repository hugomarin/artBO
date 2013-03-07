<?php
$action = isset($_POST['action']) ? $_POST['action'] : $_GET[0];

switch ($action):
	case 'create':
		$users	= UserHelper::retrieveUsers(" AND user_email = '" . escape($_POST['user_email']) . "'");
		if (count($users) == 0)
		{
			$user 	= (isset($_POST['user_id'])) ? new User($_POST['user_id']) : new User();
			foreach ($_POST as $key => $value)
				$user->__set($key, $value);
			$user->__set('user_password', md5($_POST['user_password']));
			$user->__set('user_date_creation', formatDate());			
			$user->__set('user_state', 'A');
			$insert	= $user->save();
			$_SESSION['user_id']	= $insert['insert_id'];
			redirectUrl(APPLICATION_URL.'registro-inicio-0400.html');
			$html 		= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Le damos la Bienvenida al proceso de aplicación de artBO 2013</h1><p style="margin-bottom:30px;">A partir de ahora, usted podr&aacute; adelantar su proceso de registro e inscripci&oacute;n en el pabell&oacute;n de su inter&eacute;s</p><p>Gracias,</p>artBO</div></div>'; 
			$subject	= utf8_decode('Registro exitoso');
			$from		= 'info@artbo.co';
			$to			= $user->__get('user_email');
			$fromName	= 'CCB artBO';
			$replyTo	= 'info@artbo.co';
			$args 		= array('html'		=> $html,
								'from'		=> $from,
								'to'		=> $to,
								'subject'	=> $subject,
								'fromName'	=> $fromName,
								'replyTo'	=> $replyTo);	

			EmailHelper::sendMail($args);
			
		}
		else
		{
			redirectUrl(APPLICATION_URL.'register/error/0.html');
		}
	break;
	case 'recover_password':
		$users	= UserHelper::retrieveUsers(" AND user_email = '" . escape($_POST['user_email']) . "'");
		if (count($users) == 1)
		{
			
			$password 	= substr(md5(date('YmdHis')), 0, 8);
			$user 		=& $users[0];
			$user->__set('user_verification', md5($password));
			$user->update();
			$html  	   .= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Recordar Clave</h1><p style="margin-bottom:30px;">Hemos recibido una petici&oacute;n para restablecer su contrase&ntilde;a. Para completar el proceso de reestablecer contrase&ntilde;a visite la siguiente url:</p><a style="text-decoration: none; color: #3a6cdd;" href="http://activemgmd.com/ccb/ccb-galerias/restablecer-contrasena/'.md5($password).'.html">http://activemgmd.com/ccb/ccb-galerias/restablecer-contrasena/'.md5($password).'.html</a><br /><p>Si usted no ha solicitado este cambio por favor ignore este correo.</p><p>Gracias,</p><span>Soporte </span>artBO</div></div>'; 
			$subject	= utf8_decode('Recuperar contraseña');
			$from		= 'info@artbo.co';
			$to			= $user->__get('user_email');
			$fromName	= 'CCB artBO';
			$replyTo	= 'info@artbo.co';
			$args 		= array('html'		=> $html,
								'from'		=> $from,
								'to'		=> $to,
								'subject'	=> $subject,
								'fromName'	=> $fromName,
								'replyTo'	=> $replyTo);	

			EmailHelper::sendMail($args);

			redirectUrl(APPLICATION_URL.'login-recuperar-contrasena-0120/' . urlencode($user->__get('user_email')) . '.html');
		}
		else
		{
			redirectUrl(APPLICATION_URL.'login-recuperar-contrasena-0110/error.html');
		}
	break;
	case 'basic':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		if($_FILES["user_image"]["name"] != "")
		{
			if ($_FILES['user_image']['size'] < 1048576)
			{
				$ext	= getFileExtension($_FILES["user_image"]['name']);
				$name 	= md5(date("YmdHis")) . $ext;
			
				if(uploadFile('resources/images/', $_FILES["user_image"]['tmp_name'], $name))
				{
					$accept = array('jpg', 'gif', 'png', 'jpeg');
					$medio 	= new Medio($name , $accept, 'resources/images/');  
					$user->__set('user_image', $name);						
				}				
			}
			else 
			{
			?>
            	<script language="javascript">
					alert('El archivo cargado excede 1000kb');
					window.history.go(-1);
                </script>
            <?
				die();
			}
		}	
		$user->update();
		redirectUrl(APPLICATION_URL.'ingresar-0200.html');
	break;
	case 'gallerySelect':
		$user 		= new User($_SESSION['user_id']);
		$user->__set('user_gallery_type', $_GET[1]);
		$user->update();
		redirectUrl(APPLICATION_URL.'registro-galerias-0410.html');
	break;
	case 'first':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		$user->__set('user_phone', $_POST['phone_0'].'-'.$_POST['phone_1'].'-'.$_POST['phone_2']);
		$user->__set('user_mobile', $_POST['mobile_0'].'-'.$_POST['mobile_1'].'-'.$_POST['mobile_2']);		
		if($_FILES["user_director_image"]["name"] != "")
		{
			if ($_FILES['user_director_image']['size'] < 1048576)
			{			
				$ext	= getFileExtension($_FILES["user_director_image"]['name']);
				$name 	= md5(date("YmdHis")) . $ext;
			
				if(uploadFile('resources/images/', $_FILES["user_director_image"]['tmp_name'], $name))
				{
					$accept = array('jpg', 'gif', 'png', 'jpeg');
					$medio 	= new Medio($name , $accept, 'resources/images/');  
					$user->__set('user_director_image', $name);						
				}	
			}
			else 
			{
			?>
            	<script language="javascript">
					alert('El archivo cargado excede 1000kb');
					window.history.go(-1);
                </script>
            <?
				die();
			}
				
		}																						   
		$user->update();
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 1");
		if ($userForms['num_rows'] == 0)
		{
			$accept		= true;
			$fields		= UserFieldHelper::retrieveUserFields();
			foreach ($fields as $field)
			{
				if (($user->__get($field) == '') || ($user->__get($field) == 0) || ($user->__get($field) == 'NULL'))
				$accept	= false;
			}
			if ($accept)
			{
				$form	= new UserForm();
				$form->__set('user_id', $_SESSION['user_id']);
				$form->__set('form_number', 1);
				$form->save();
			}
		}
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-exposiciones-0420/saved.html');
		else
			redirectUrl(APPLICATION_URL.'registro-galerias-0410/saved.html');		
	break;
	case 'createExpo':
		$connection  = Connection::getInstance();
		$deleteSQL   = "DELETE FROM user_expositions WHERE user_id = " . $_SESSION['user_id'];
		$connection->query($deleteSQL);		
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, 'expo_nombre_') !== false)
			{
				$string	= str_replace('expo_nombre_', '', $key);
				$expo	= new Exposition();
				$expo->__set('exposition_name', $value);
				$expo->__set('exposition_year', $_POST['expo_fecha_'.$string]);
				$expo->__set('exposition_month', $_POST['expo_mes_'.$string]);
				$expo->__set('user_id', $_SESSION['user_id']);
				$expo->save();
			}
		}
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 2");
		if ($userForms['num_rows'] == 0)
		{
			$form	= new UserForm();
			$form->__set('user_id', $_SESSION['user_id']);
			$form->__set('form_number', 2);
			$form->save();
		}		
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-ferias-0430/saved.html');
		else
			redirectUrl(APPLICATION_URL.'registro-exposiciones-0420/saved.html');				
	break;
	case 'createFeria':
		$connection  = Connection::getInstance();
		$deleteSQL   = "DELETE FROM user_ferias WHERE user_id = " . $_SESSION['user_id'];
		$connection->query($deleteSQL);		
		$user		= new User($_SESSION['user_id']);
		$string		= '';	
		$string		.= (isset($_POST['artbo_11'])) ? '1|' : '0|'; 
		$string		.= (isset($_POST['artbo_10'])) ? '1|' : '0|'; 
		$string		.= (isset($_POST['artbo_09'])) ? '1|' : '0|'; 
		$string		.= (isset($_POST['artbo_08'])) ? '1|' : '0|'; 
		$string		.= (isset($_POST['artbo_07'])) ? '1|' : '0|'; 
		$string		.= (isset($_POST['artbo_06'])) ? '1|' : '0|'; 
		$string		.= (isset($_POST['artbo_12'])) ? '1|' : '0|'; 
		$string		.= (isset($_POST['artbo_05'])) ? '1' : '0'; 			
		$user->__set('user_artbo', $string);
		$user->update();
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, 'feria_name_') !== false)
			{
				$string	= str_replace('feria_name_', '', $key);
				$feria	= new Feria();
				$feria->__set('feria_name', $value);
				$feria->__set('feria_year', $_POST['feria_year_'.$string]);
				$feria->__set('country_id', $_POST['country_id_'.$string]);
				$feria->__set('feria_city', $_POST['feria_city_'.$string]);
				$feria->__set('user_id', $_SESSION['user_id']);
				$feria->save();
			}
		}
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 3");
		if ($userForms['num_rows'] == 0)
		{
			$form	= new UserForm();
			$form->__set('user_id', $_SESSION['user_id']);
			$form->__set('form_number', 3);
			$form->save();
		}	
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-artistas-0440/saved.html');
		else
			redirectUrl(APPLICATION_URL.'registro-ferias-0430/saved.html');				
	break;	
	case 'createArtist':
		$connection  = Connection::getInstance();
		$deleteSQL   = "DELETE FROM user_artists WHERE user_id = " . $_SESSION['user_id'];
		$connection->query($deleteSQL);		
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, 'artist_name_') !== false)
			{
				$string	= str_replace('artist_name_', '', $key);
				$artist	= new Artist();
				$artist->__set('artist_name', $value);
				$artist->__set('artist_surname', $_POST['artist_surname_'.$string]);
				$artist->__set('artist_nationality', $_POST['artist_nationality_'.$string]);
				$artist->__set('artist_birthday', $_POST['artist_birthday_'.$string]);
				$artist->__set('artist_residency', $_POST['artist_residency_'.$string]);
				$artist->__set('artist_review', $_POST['artist_review_'.$string]);
				if (isset($_POST['artist_artbo_'.$string]))
					$artist->__set('artist_artbo', 1);				
				$artist->__set('user_id', $_SESSION['user_id']);
				
				$result = $artist->save();
				
				$artistWorks = ArtistWorkHelper::retrieveArtistWorks("AND artist_id = '" . $_POST['artist_id_'.$string] . "'");
				foreach($artistWorks as $artistWork)
				{
					$artistWork->updateField('artist_id', $result["insert_id"]);
				}
			}
		}
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		$user->update();		
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 4");
		if ($userForms['num_rows'] == 0)
		{
			$form	= new UserForm();
			$form->__set('user_id', $_SESSION['user_id']);
			$form->__set('form_number', 4);
			$form->save();
		}		
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-espacio-0450/saved.html');
		else
			redirectUrl(APPLICATION_URL.'registro-artistas-0440/saved.html');				

	break;
	case 'updateArtist':

		$artist = new Artist($_POST['artist_id']);
		$user	= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$artist->__set($key, $value);
		
		$artist->__set('artist_artbo', 1);
		
		$artistWorks	= ArtistWorkHelper::retrieveArtistWorks("AND artist_id = " . $artist->__get('artist_id'));
		
		for($i = 1; $i <= 3; $i++)
		{
			$artistWork = isset($artistWorks[($i - 1)]) ? $artistWorks[($i - 1)] : new ArtistWork();
			if(!isset($artistWorks[($i - 1)]))
			{
				$artistWorks	= ArtistWorkHelper::retrieveArtistWorks("AND artist_work_key = '" . $_POST["artist_work_key_" . $i] . "'");
				if(count($artistWorks) > 0)
					$artistWork = $artistWorks[0];
			}
			else
			{
				$artistWorks	= ArtistWorkHelper::retrieveArtistWorks("AND artist_work_key = '" . $_POST["artist_work_key_" . $i] . "' AND artist_work_id != " . $artistWork->__get('artist_work_id'));
				if(count($artistWorks) > 0)
				{
					$artistWork->delete();
					$artistWork = $artistWorks[0];
				}
			}
			foreach($_POST as $key => $value)
			{
				if(strpos($key, '_' . $i) !== false)
				{
					$artistWork->__set(str_replace('_' . $i, '', $key), $value);
				}
			}
			$artistWork->__set('artist_id', $_POST["artist_id"]);
			if($artistWork->__get('artist_work_id') != '')
				$artistWork->update();
			else
				$artistWork->save();
		}
		$artist->update();
		//print_r($_POST);
		redirectUrl(APPLICATION_URL.'registro-artistas-0440/saved.html');
		break;
	case 'insertArtist':
		$artist = new Artist();
		$user	= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$artist->__set($key, $value);
		$artist->__set('user_id', $_SESSION['user_id']);
		$artist->__set('artist_artbo', 1);
		$result = $artist->save();
		for($i = 1; $i <= 3; $i++)
		{
			$artistWorks	= ArtistWorkHelper::retrieveArtistWorks("AND artist_work_key = '" . $_POST["artist_work_key_" . $i] . "'");
			$artistWork = isset($artistWorks[0]) ? $artistWorks[0] : new ArtistWork();	
			
			foreach($_POST as $key => $value)
			{
				if(strpos($key, '_' . $i) !== false)
				{
					$artistWork->__set(str_replace('_' . $i, '', $key), $value);
				}
			}

			$artistWork->__set('artist_id', $result["insert_id"]);
			if($artistWork->__get('artist_work_id') != '')
				$artistWork->update();
			else
				$artistWork->save();

		}
		
		
		redirectUrl(APPLICATION_URL.'registro-artistas-0440/saved.html');
		break;
	case 'selectStand':
		$user 		= new User($_SESSION['user_id']);
		$cornisa	= '';
		for ($i = 0; $i < 6; $i++)
		{
			if ((isset($_POST['cornisa_'.$i])) && ($_POST['cornisa_'.$i] != ''))
				$cornisa	 = $_POST['cornisa_'.$i];							  
		}
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		$user->__set('user_space_name', $cornisa); 
		$user->update();
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 5");
		if ($userForms['num_rows'] == 0)
		{
			$form	= new UserForm();
			$form->__set('user_id', $_SESSION['user_id']);
			$form->__set('form_number', 5);
			$form->save();
		}			
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-documentos-0460.html');
		else
			redirectUrl(APPLICATION_URL.'registro-espacio-0450/saved.html');			
	break;
	case 'uploadDocuments':
		$user 		= new User($_SESSION['user_id']);
		$finish		= true;
		if ($user->__get('user_certificate') == '')
			$finish	= false;
		if ($user->__get('user_rut') == '')
			$finish	= false;
		if ($user->__get('user_document') == '')
			$finish	= false;
		if ($user->__get('user_payment') == '')
			$finish	= false;
		if ($finish)
		{
			$html		= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Ha finalizado su registro</h1><p  style="margin-bottom:30px;">Usted ha completado el proceso de registro de artBO 2013. <br />Agradecemos su participaci&oacute;n en la convocatoria.</p><br /><p>Gracias,</p>artBO</div></div>';
			$subject	= utf8_decode('Finalizado registro');
			$from		= 'info@artbo.co';
			$to			= $user->__get('user_email');
			$fromName	= 'CCB artBO';
			$replyTo	= 'info@artbo.co';
			$args 		= array('html'		=> $html,
								'from'		=> $from,
								'to'		=> $to,
								'subject'	=> $subject,
								'fromName'	=> $fromName,
								'replyTo'	=> $replyTo);	
	
			EmailHelper::sendMail($args);		
			redirectUrl(APPLICATION_URL.'registro-documentos-0460/saved.html');
		}
		else
		{
		?>
			<script language="javascript">
                alert ('Debe subir todos los documentos solicitados en esta página');
                window.location.href="<?php echo APPLICATION_URL;?>registro-documentos-0460.html";
            </script>
        <?php
		}
	break;
	case 'update':
		$user 	=  new User($_POST['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);
		$user->__set('user_password', md5($_POST['user_password']));
		$user->__set('user_datetime_update', formatDate());
		$user->__set('user_validation', '');
		//Logo
		if( (isset($_FILES["user_avatar"]["name"])) && ($_FILES["user_avatar"]["name"] != ""))
		{
			$ext = getFileExtension($_FILES["user_avatar"]['name']);
			$name = md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/', $_FILES["user_avatar"]['tmp_name'], $name))
			{
				$accept = array('jpg', 'gif', 'png', 'jpeg');
				$medio = new Medio($name , $accept, 'resources/images/');  
				$user->__set('user_image', $name);						
			}				
		}	
		if ($_POST['user_id'] == $_SESSION['user_id'])
			$user->update();
			
		//Genero el log de creacion de universidad
		$nameUsers	= $user->__get('user_names').' '.$user->__get('user_surnames');
		$controlUser = new ControlUser($_SESSION['control_user_id']);
		$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Se actualizo el usuario: '.$nameUsers;
		$newLog		= new CoreLog();
		$newLog->__set('object_id',$_POST['user_id']);
		$newLog->__set('log_action_name',$nameUsers);
		$newLog->__set('log_content',$msgLog);
		$newLog->__set('log_date',date('Y-m-d H:i:s'));
		$newLog->save();
		
		redirectUrl(APPLICATION_URL.'user_thanks.html');
	break;
	case 'add':
		$user 			= (isset($_POST['user_id'])) ? new User($_POST['user_id']) : new User();
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);
		$user->__set('user_creation_datetime', formatDate());			
		$user->__set('user_datetime_update', formatDate());
		$user->__set('user_state', 'A');
		//Logo
		$send	= true;
		if($_FILES["user_avatar"]["name"] != "")
		{
			if ($_FILES['user_avatar']['size'] < 1048576)
			{				
				$ext = getFileExtension($_FILES["user_avatar"]['name']);
				$name = md5(date("YmdHis")) . $ext;
			
				if(uploadFile('resources/images/', $_FILES["user_avatar"]['tmp_name'], $name))
				{
					$accept = array('jpg', 'gif', 'png', 'jpeg');
					$medio = new Medio($name , $accept, 'resources/images/');  
					$user->__set('user_image', $name);						
				}
			}
			else
				$send = false;
				
		}	
		if (!isset($_POST['user_id']))
		{
			$validate	=	md5(date("YmdHis"));
			$user->__set('user_validation', $validate); 
			$user2		= new User($_SESSION['user_id']);	//SESSION USER
			$type		= ($user->__get('company_id') != 0) ? 'C' : 'G';
			$html		= MailHelper::invitationMail($type, $user->__get('user_names'), APPLICATION_FULL_URL.'user_invite/'.$validate.'.html', $user2->__get('user_names'));
			$args = array('to'	=> $user->__get('user_email'),
						'from'    	=> 'contactenos@creatic.org.co',
						'html'     	=> $html,
						'subject'  	=> 'Bienvenido a CreaTiC',
						'fromName' 	=> 'CreaTiC',
						'replyTo'  	=> 'contactenos@creatic.org.co');	
			EmailHelper::sendMail($args);
		}
		$action	= 'creado';
		$controlUser = new ControlUser($_SESSION['control_user_id']);
		if (isset($_POST['user_id']))
		{
			$user->update();
			$nameUsers	= $user->__get('user_names').' '.$user->__get('user_surnames');
			$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario modificado: '.$nameUsers;
			$action	= 'modificado';
		}
		else 
		{
			$save = $user->save();		
			$nameUsers	=  $_POST['user_names'].' '.$_POST['user_surnames'];
			$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario Creado: '.$nameUsers;
		}
		$_POST['user_id'] = isset($_POST['user_id']) ? $_POST['user_id'] : $save['insert_id'];
		//Genero el log de creacion de universidad
		$newLog		= new CoreLog();
		$newLog->__set('object_id',$_POST['user_id']);
		$newLog->__set('log_action_name',$nameUsers);
		$newLog->__set('log_content',$msgLog);
		$newLog->__set('log_date',date('Y-m-d H:i:s'));
		$newLog->save();
		
		if (isset($_POST['company_id'])) 
			redirectUrl(APPLICATION_URL.'user_list_b2/'.$action.'.html');
		else
			redirectUrl(APPLICATION_URL.'user_list_c2/'.$action.'.html');
	break;
	case 'deactivate':
		$deactivate		= true;
		$userPrimary 	= new User($_SESSION['user_id']);
		if ($userPrimary->__get('user_primary') == 0)
			$deactivate	= false;
		$user 	= new User($_GET[1]);
		if ($userPrimary->__get('group_id') != $user->__get('group_id'))
			$deactivate	= false;
		if ($userPrimary->__get('company_id') != $user->__get('company_id'))
			$deactivate	= false;
		$user->__set('user_state', 'D');
		$user->__set('user_datetime_update', formatDate());
		if ($deactivate)
			$save = $user->update();
		$action		= 'eliminado';
		
		//Genero el log de creacion de universidad
		$nameUsers	= $userPrimary->__get('user_names').' '.$userPrimary->__get('user_surnames');
		$controlUser = new ControlUser($_SESSION['control_user_id']);
		$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario eliminado : '.$nameUsers;
		$newLog		= new CoreLog();
		$newLog->__set('object_id',escape($_GET[0]));
		$newLog->__set('log_action_name',$userPrimary->__get('user_id'));
		$newLog->__set('log_content',$msgLog);
		$newLog->__set('log_date',date('Y-m-d H:i:s'));
		$newLog->save();
		
		if ($userPrimary->__get('company_id') != 0) 
			redirectUrl(APPLICATION_URL.'user_list_b2/'.$action.'.html');
		else
			redirectUrl(APPLICATION_URL.'user_list_c2/'.$action.'.html');	
	break;	
	case 'updateProfile':
		$user 	=  new User($_POST['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);
		$user->__set('user_datetime_update', formatDate());
		//Logo
		if( (isset($_FILES["user_avatar"]["name"])) && ($_FILES["user_avatar"]["name"] != ""))
		{
			$ext = getFileExtension($_FILES["user_avatar"]['name']);
			$name = md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/', $_FILES["user_avatar"]['tmp_name'], $name))
			{
				$accept = array('jpg', 'gif', 'png', 'jpeg');
				$medio = new Medio($name , $accept, 'resources/images/');  
				$user->__set('user_image', $name);						
			}				
		}	
		if ($_POST['user_id'] == $_SESSION['user_id'])
			$user->update();
		//Genero el log
		$nameUsers	= $user->__get('user_names').' '.$user->__get('user_surnames');
		$controlUser = new ControlUser($_SESSION['control_user_id']);
		$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario actualizo su perfil : '.$nameUsers;
		$newLog		= new CoreLog();
		$newLog->__set('object_id',escape($_GET[0]));
		$newLog->__set('log_action_name',$user->__get('user_id'));
		$newLog->__set('log_content',$msgLog);
		$newLog->__set('log_date',date('Y-m-d H:i:s'));
		$newLog->save();
		redirectUrl(APPLICATION_URL.'user_profile_update/modificado.html');
	break;	
	case 'updatePassword':
		$user 	=  new User($_POST['user_id']);
		$change	= ($user->__get('user_password') == md5($_POST['old_password'])) ? true : false;
		if ($change)
		{

			$user->__set('user_password', md5($_POST['user_password']));	
			$user->__set('user_datetime_update', formatDate());
			if ($_POST['user_id'] == $_SESSION['user_id'])
				$user->update();
			//Genero el log
			$nameUsers	= $user->__get('user_names').' '.$user->__get('user_surnames');
			$controlUser = new ControlUser($_SESSION['control_user_id']);
			$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario cambio contraseña : '.$nameUsers;
			$newLog		= new CoreLog();
			$newLog->__set('object_id',escape($_GET[0]));
			$newLog->__set('log_action_name',$user->__get('user_id'));
			$newLog->__set('log_content',$msgLog);
			$newLog->__set('log_date',date('Y-m-d H:i:s'));
			$newLog->save();
		}
		redirectUrl(APPLICATION_URL.'user_profile_update/modificado.html');
	break;		
	case 'login':
		$user 	= UserHelper::retrieveUsers("AND user_email = '".escape($_POST['user_email']). "' AND user_password = '" .md5($_POST['user_password']) . "'");
		if(count($user) > 0)
		{
			if ($user[0]->__get('user_id') != '')	//user_users user
			{
				$_SESSION['user_id']	= $user[0]->__get('user_id');
				redirectUrl(APPLICATION_URL.'registro-inicio-0400.html');
			}
		}
		else
		{
			$user 	= UserHelper::retrieveUsers("AND user_email = '".escape($_POST['user_email'])."'");
			if(count($user) > 0)
			{			
				redirectUrl(APPLICATION_URL."login/error.html");
			}
			else
				redirectUrl(APPLICATION_URL."register/norecord.html");
		}
	break;	
	case 'changePassword':
		$user 	=  new User($_SESSION['user_id']);	
		$user->__set('user_password', md5($_POST['contrasena']));
		$user->update();
		redirectUrl(APPLICATION_URL."datos-galeria-0300/exito.html");
	break;
	case 'changePasswordOC':
		$user 	=  new User($_SESSION['user_id']);	
		$user->__set('user_verification', '');
		$user->__set('user_password', md5($_POST['contrasena']));
		$user->update();
		redirectUrl(APPLICATION_URL."login-recuperar-contrasena-0140/exito.html");
	break;	
	case 'RememberPassword':
		$userExist	= UserHelper::retrieveUsers(' AND user_email = "'.trim($_POST['user_email']).'"');
		if(count($userExist)>0)
		{
			$newPassword = base64_encode(strftime('%d%H%S'));
			$changeUser = new user($userExist[0]->__get('user_id'));
			$changeUser->__set('user_password',md5($newPassword));
			$changeUser->update();
			//Envio notificacion al usuario
			$name 			= $changeUser->__get('user_names').' '.$changeUser->__get('user_surnames');
			$email 			= $changeUser->__get('user_email');
			/* DESTINATARIO */
			$asunto 	= 'Recuperar clave CreaTiC';
			$mensaje 	= "Coordial saludo: $name <br />Su nueva clave es: ".$newPassword . "<br>Equipo CreaTiC";
			$headers 	=  "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($email, $asunto, $mensaje, $headers);
			
			//Genero el log
			$nameUsers	= $changeUser->__get('user_names').' '.$changeUser->__get('user_surnames');
			$controlUser = new ControlUser($_SESSION['control_user_id']);
			$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Recuperar contraseña : '.$nameUsers;
			$newLog		= new CoreLog();
			$newLog->__set('object_id',escape($_GET[0]));
			$newLog->__set('log_action_name',$changeUser->__get('user_id'));
			$newLog->__set('log_content',$msgLog);
			$newLog->__set('log_date',date('Y-m-d H:i:s'));
			$newLog->save();
			
			redirectUrl(APPLICATION_URL.'user_remember/Send/'.urlencode($email).'.html');
		}
		else
		{
			redirectUrl(APPLICATION_URL.'user_remember/Error.html');
		}
	break;
	
	case 'RegisterUser':
		//verifico la existencia de un usuario facebook
		if(strlen(trim($_POST['facebook_id'])) > 1)
			$exisUser	= UserHelper::retrieveUsers(' AND facebook_id = "'.trim($_POST['facebook_id']).'"');
		else	
			$exisUser	= UserHelper::retrieveUsers(' AND user_names LIKE "%'.trim($_POST['user_names']).'%" AND user_surnames LIKE "%'.trim($_POST['user_surnames']).'%"');
		
		//verifico si guardo o actualizo
		$validSave	= (count($exisUser)>0) ? true : false; 
		$newUser	= (count($exisUser)>0) ? $exisUser[0] : new User();	
		
		//Guardo la información
		foreach($_POST as $key => $value)
			$newUser->__set($key,$value);
		
		if(count($exisUser)>0)	//Actualiza
		{
			$newUser->__set('user_datetime_update',date('Y-m-d H:i:s'));
			$newUser->update();
			redirectUrl(APPLICATION_URL.'registro_finalizado.html');
		}
		else //Guarda
		{
			$validateCode	= md5(date('Y-m-d H:i:s'));
			$newUser->__set('user_date_creation',date('Y-m-d H:i:s'));
			$newUser->__set('user_verification_code',$validateCode);	
			$newUser->__set('user_state','I');	
			$newUser->save();
			$html = 'Para confirmar su registro en GZGG haz clic <a href="'.APPLICATION_FULL_URL.'validacion_registro/'.urlencode($validateCode).'.html">aqu&iacute;</a>';
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";				
			$headers .= "From: GZGG <GZGG@GZGG.com>\r\n";
			mail($_POST['user_email'],'Activar cuenta GZGG',$html,$headers);
			redirectUrl(APPLICATION_URL.'finalizando_registro.html');
		}
	break;
	
	case 'updateUser':
		$updateUser = new User($_POST['user_id']);
		$redirect = true;
		foreach($_POST as $key => $value)
			$updateUser->__set($key,$value);
		$updateUser->__set('user_datetime_update',date('Y-m-d H:i:s'));	
		//verifico si solicito cambio de contraseña
		$updateUser->update();
		if(isset($_POST['user_password1']) && $_POST['user_password1'] != '')
		{
			if(isset($_POST['user_password1']) && $_POST['user_password1'] != '')
			{
				if($updateUser->__get('user_password') == "")
				{
					if($_POST['user_passwordNew'] != $_POST['user_passwordRetype'])
					{
						redirectUrl(APPLICATION_URL.'actualizar/Error.html');
						$redirect = false;
					}
					else
					{
						$updateUser->__set('user_password',md5($_POST['user_passwordNew']));
						$updateUser->update();
					}
				}
			}
		}
		if($redirect)
			redirectUrl(APPLICATION_URL.'actualizar/Update.html');
	break;
	case 'deleteA':
		$user 		= new User($_GET[1]);
		$user->__set('user_state', 'D');	
		$user->update();
		redirectUrl(APPLICATION_URL.'index.php?home.control');
	break;	
endswitch;
?>