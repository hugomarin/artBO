<form action="<?php echo APPLICATION_URL;?>user.controller/uploadFile.html" method="post" enctype="multipart/form-data">
	<input type="file" name="<?php echo $_GET[0];?>" /> <input type="submit" />	
</form>