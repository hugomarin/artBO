<?php require_once('session_header.php'); 
$users = UserHelper::retrieveUsers();
?>
<div id="contenido">
	<h2>Usuarios</h2>
	<div class="divider" style="background:none;">
	<div class="clear"></div>
    <div id="mainContent">
		<div id="alertBox">
 	       <?php 
		   $alert = (isset($alert)) ? $alert : array();
		   AlertHelper::placeAlerts($alert); 
		   ?>  
        </div>
		<?php 
            echo $create;
        ?>
        <h3>Listado de Usuarios</h3>
        <div class="ruta">
           <a href="index.php?home.control">Inicio</a> &gt; <a href="index.php?user_list.control">Usuarios</a>
        </div>
        <form action="index.php?export.control" method="post">
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
            	<td>
                	Palabra Clave
                </td>
     			<td>
                	<input type="text" name="palabra" value="" />
                </td>
			</tr>
            <tr>
            	<td>
                	Rango de Fecha 
                </td>
     			<td>
                	de: <input type="text" name="fecha_de" value="" />
                    a: <input type="text" name="fecha_" value="" />
                </td>
			</tr>
            <tr>
            	<td colspan="2"><input type="submit" name="exportar" />
            </tr>            
        </table> 
        </form>       
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th>&nbsp;</th>
                <th><a href="index.php?user_list.control/user_full_name">Nombre</a></th>
                <th><a href="index.php?user_list.control/user_email">E-mail</a></th>
                <th>Acciones</th>
            </tr>
            <?php
            foreach($users as $user)
            {
				
            
            ?>
               <tr>
                    <td class="table03"><img src="imgcontrol/ico_tree2.gif" width="12" height="12" /></td>
                    <td><?php echo $user->__get('user_name')?></a></td>
                    <td><?php echo $user->__get('user_email')?></td>
                    <td>Exportar: <a href="index.php?user_export.control/<?php echo $user->__get('user_id')?>" target="_blank">Usuario</a> | <a href="index.php?artistas_export.control/<?php echo $user->__get('user_id')?>" target="_blank">Artistas</a> | <a href="index.php?expositions_export.control/<?php echo $user->__get('user_id')?>" target="_blank">Exposiciones</a> | <a href="index.php?feria_export.control/<?php echo $user->__get('user_id')?>" target="_blank">Ferias</a></td>

                </tr>
            <?php
            }
            ?>
        </table>
    </div>
	</div>
</div>
<?php require_once('footer.php'); ?>