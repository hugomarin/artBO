<script src="<?php echo APPLICATION_URL?>javascripts/fileuploader.js" type="text/javascript"></script>
<div id="user_gallery_image">		
    <noscript>			
        <input type="file" name="user_gallery_image" id="user_gallery_image"  />
    </noscript>         
</div>				

<script>        
    function createUploader(){            
        var uploader = new qq.FileUploader({
            element: document.getElementById('user_gallery_image'),
            action: '<?php echo APPLICATION_URL?>uploading.controller',
            debug: true
        });           
    }
    
    // in your app create uploader as soon as the DOM is ready
    // don't wait for the window to load  
    window.onload = createUploader;     
</script>   