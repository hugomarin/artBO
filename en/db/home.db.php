<?php
if (isset($_GET['user']))
{
	
}
else
{
?>
<center>
	<table width="300" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td>
            	Usuario	
            </td>
            <td>
            	<input name="user" value="" />
            </td>
        </tr>
        <tr>
        	<td colspan="2">
        		<input type="submit" value="enviar" />
            </td>
        </tr>
    </table>    
</center>
<?php
}
?>