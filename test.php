<html>
<head>
<title>File Uploading Form</title>
</head>
<body>
<h3>File Upload:</h3>
Select a file to upload: <br />
<form action="test.php" method="post"
                        enctype="multipart/form-data">
<input type="file" name="file1" size="50" />
<br />
<input type="submit" value="Upload File" name="ced" />
</form>
</body>
</html>
<?php
function upload($name,$target_dir,$maxsize=NULL,$allowed_type=NULL)
 {
  $mime = "application/pdf; charset=binary";
  
  if(!file_exists($target_dir))
     {
	   mkdir($target_dir,$mode=0777);   
	 }
	 $target_dir=$target_dir."/";
	 $target_file = $target_dir . basename($_FILES[$name]["name"]);
	if ($_FILES["file1"]["error"] > 0)
	   {
        echo "Error: " . $_FILES[$name]["error"] . "<br />";
       } 
	else 
	   {
		 $check = getimagesize($_FILES[$name]["tmp_name"]);
             if($check !== false)
			   {
                 echo "File is an image - " . $check["mime"] . ".";
                 $uploadOk = 1;
               }
	      else 
		       {
                 echo "File is not an image.";
                 $uploadOk = 0;
               }
        echo "Upload: " . $_FILES[$name]["name"] . "<br />";
        echo "Type: " . $_FILES[$name]["type"] . "<br />";
        echo "Size: " . ($_FILES[$name]["size"] / 1024) . " Kb<br />";
        echo "Stored in: " . $_FILES[$name]["tmp_name"];
		move_uploaded_file($_FILES[$name]["tmp_name"],$target_file);
       }  
 }
if(isset($_POST["ced"]))
   {
	   $name="file1";
	   upload($name,"TSET");
	   
    
   }
?>
