<?php
if(isset($_FILES['file'])){
	$file=$_FILES['file'];
	//print_r($file);
	$filename=$file['name'];
	$filetmp=$file['tmp_name'];
	$filesize=$file['size'];
	$fileerror=$file['error'];
	
	$file_ext=explode('.',$filename);
	$file_ext=strtolower(end($file_ext));
	//print_r($file_ext);
	
	$allowedfiles=array('docx','txt','pdf','ppt');
	
	if(in_array($file_ext,$allowedfiles)){
		if($fileerror==0){
			if($filesize<=2097152){
				$filenamenew=uniqid('',true).'.'.$file_ext;
				$filedest='SRS/'.$filenamenew;
				if(move_uploaded_file($filetmp,$filedest)){
					echo $filedest;
				}else
					echo "File not uploaded";
			}else echo "File too large";
		}else echo "Upload error please try again";
	}else echo "File not supported";
}
?>
<html>
<body>
<form action="upload.php" enctype="multipart/form-data" method="post">
<input type="file" name="file">
<button type="submit" >Upload</button>
</form>
</body>
</html>

