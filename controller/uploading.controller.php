<?php
/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {    
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
        
        $target = fopen($path, "w");        
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
        return true;
    }
    function getName() {
		$tempProjectID	= explode('|',$_GET[0]);	
        return $tempProjectID[0];
    }
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];            
        } else {
            throw new Exception('Getting content length is not supported.');
        }      
    }   
}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {  
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {
        if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)){
            return false;
        }
        return true;
    }
    function getName() {
        return $_FILES['qqfile']['name'];
    }
    function getSize() {
        return $_FILES['qqfile']['size'];
    }
}

class qqFileUploader {
    private $allowedExtensions = array();
    private $sizeLimit = 524288000;//500mb
    private $file;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 524288000){        
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
        $this->checkServerSettings();       

        if (isset($_GET[0])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false; 
        }
    }
    
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        /*if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'Tama&ntilde;o m&aacute;ximo permitido es de $size'}");
        }*/      
    }
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
        if (!is_writable($uploadDirectory)){
            return array('error' => "Server error. Upload directory isn't writable.");
        }
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        
        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }
        
        $pathinfo = pathinfo($this->file->getName());
        $filename = $pathinfo['filename'];
        //$filename = md5(uniqid());
        $ext = $pathinfo['extension'];

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'Solo se permiten los siguientes archivos: '. $these . '.');
        }
        
        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            $filename = md5(date('YmDHis'));
			while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                $filename .= rand(10, 99);
            }
			$tempProjectID	= explode('|',$_GET[0]);
			if((isset($tempProjectID[2])) && (strlen($tempProjectID[2])>0))
				$tempProjectID[1] = $tempProjectID[2];
			$cart  			= new Cart();
			$productVars 	= $cart->cartVars[$tempProjectID[1]];
			if(!isset($productVars['filesName']))
				$productVars['filesName']  		 = $filename. '.' . $ext;
			else
				$productVars['filesName']  		 .= '|'.$filename. '.' . $ext;
			$cart->addItem($tempProjectID[1],$productVars);
        }
        
        if ($this->file->save($uploadDirectory . $filename . '.' . $ext)){
            return array('success'=>true);
        } else {
            return array('error'=> 'No se pudo guardar el archivo. '.
                 'La carga ha sido cancelada, o encontr&oacute; alg&uacute;n error en el archivo');
        }
    }    
}
$user	= new User($_GET[0]);
// list of valid extensions, ex. array("jpeg", "xml", "bmp")
$allowedExtensions = array("pdf","jpg","jpeg","gif","png");
// max file size in bytes
$sizeLimit =  1024 * 1024;
$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
if(!file_exists('resources/documents/' . makeUrlClear(utf8_decode($user->__get('user_name')))))
{
	mkdir('resources/documents/' . makeUrlClear(utf8_decode($user->__get('user_name'))), 0755);
}
$dir	= 'resources/documents/' . makeUrlClear(utf8_decode($user->__get('user_name')));
$result = $uploader->handleUpload($_SERVER['DOCUMENT_ROOT'].APPLICATION_URL.$dir);
// to pass data through iframe you will need to encode all html tags
echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
