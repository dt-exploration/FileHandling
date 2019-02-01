<!DOCTYPE html>
<html>
<body>




<form action="uploadfile.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php

$target_file="D:/xampp/htdocs/symphart/public/UploadedFiles/".$_FILES["fileToUpload"]["name"];
//$image_file_type=pathinfo($target_file,PATHINFO_EXTENSION);
$_FILES["fileToUpload"]["tmp_name"];

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$s=finfo_file($finfo, $_FILES["fileToUpload"]["tmp_name"]);
finfo_close($finfo);

$file_info_matrix=print_r(explode("/",$s));
?>
