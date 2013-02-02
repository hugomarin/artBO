<?php require_once('session_header.php'); 
$_GET[0] = isset($_GET[0]) ? escape($_GET[0]) : 'specie_name';
$page = isset($_GET[1]) ? $_GET[1] : 1;
$filter = " ORDER by  " . $_GET[0] ;
$species = ControlSpecieHelper::selectSpecies($filter);
$system_name = 'especies_';
//permissions
$create = 	(PermissionHelper::checkPermission($system_name.'_create') !== false) ? "<a href=\"index.php?control_specie.controller/create\" class=\"cont_administrar2\">Crear Especie</a>" : '';
$update = PermissionHelper::checkPermission($system_name.'_update');
$order 	= PermissionHelper::checkPermission($system_name.'_order');
$delete = PermissionHelper::checkPermission($system_name.'_delete');
$pager = new Pager($_GET[0], '', '', 'index.php?especies_list.control', 20, $species['num_rows'], $page); 
$limit = ' LIMIT ' . $pager->arrayStartNumber . ',' . $pager->resultSize; 
$species = ControlSpecieHelper::retrieveSpecies($filter . $limit);
?>
<div id="contenido">
	<h2>Librer&iacute;a de especies</h2>
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
        <h3>Listado de especies</h3>
        <div class="ruta">
           <a href="index.php?home.control">Inicio</a> &gt; <a href="index.php?especies_list.control">Especies</a>
        </div>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th class="table03">&nbsp;</th>
                <th class="width80px"><a href="index.php?specie_list.control/specie_id">ID</a></th>
                <th><a href="index.php?specie_list.control/specie_name">Nombre</a></th>
                <th class="width80px"><a href="index.php?specie_list.control/specie_state">Estado</a></th>
                <th class="widthacciones">Acciones</th>
            </tr>
            <?php
            foreach($species as $specie)
            {
                $state 			= ($specie->__get('specie_state') ==  'A') ? 'Activo' : 'Inactivo';
                $state_action 	= "SimpleAJAXCall('index.php?control_specie.controller/changeState/".$specie->__get('specie_id')."', updateAlert, 'GET', 'u_state_".$specie->__get('specie_id')."');";
				$state_display 	= ($order !== false) ? '<a href="javascript:void(0)" onClick="'.$state_action.'">'.$state.'</a>' : $state;
                $edit_display  	= ($update !== false) ? '<a href="index.php?specie_expand.control/'.$specie->__get('specie_id').'" class="edit2" title="Editar"><span>Editar</span></a>' : ""; 	
                $delete_display	= ($delete !== false) ? '<a href="index.php?control_specie.controller/delete/'.$specie->__get('specie_id').'" class="itemdel2" onClick="return confirm(\'Esta seguro que desea borrar esta especie?\')" title="Borrar"><span>Eliminar</span></a>' : ""; 
				$edit_link	   	= ($update !== false) 	? '<a href="index.php?specie_expand.control/'.$specie->__get('specie_id').'">'.$specie->__get('specie_name').'</a>' : $specie->__get('specie_name');
            
            ?>
               <tr>
                    <td class="table03"><img src="imgcontrol/ico_tree2.gif" width="12" height="12" /></td>
                    <td><?php echo $specie->__get('specie_id')?></td>
                    <td><?php echo $edit_link?></a></td>
                    <td class="table01 width80px"><div id="u_state_<?php echo $specie->__get('specie_id')?>"><?php echo $state_display ?></div></td>
                    <td class="widthacciones"><?php echo $delete_display?><?php echo $edit_display?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php $pager->display() ?>
    </div>
	</div>
</div>
<?php require_once('footer.php'); ?>