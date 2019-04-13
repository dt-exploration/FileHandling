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

if (isset($_POST["submit"])) {

    $target_url="D:/xampp/htdocs/symphart/public/UploadedFiles/".$_FILES["fileToUpload"]["name"];
    $uploaded_file_url=$_FILES["fileToUpload"]["tmp_name"];

    //Prirucnik:
    //Do not use getimagesize() to check that a given file is a valid image. Use a purpose-built
    //solution such as the Fileinfo (finfo_open  finfo_file)
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $s=finfo_file($finfo, $uploaded_file_url);
    finfo_close($finfo);

    //0 => tip, 1 => ekstenzija
    $file_info_matrix = explode("/", $s);
    $file_info_matrix[1] = strtolower($file_info_matrix[1]);

    if ($file_info_matrix[0] != "image") {
        echo "Fajl koji zelite da uploadujete nije slika";
        die();
    }

    if (file_exists($target_url)){
        echo "Fajl pod tim imenom vec postoji !";
        die();
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Fajl je preveliki i ne moze biti uploadovan !";
        die();
    }

    if ($file_info_matrix[1] != "jpg" and $file_info_matrix[1] != "jpeg" and
    $file_info_matrix[1] != "png" and $file_info_matrix[1] != "gif" ) {

        echo "Nazalost samo JPG, JPEG, PNG & GIF fajlovi su dozvoljeni.";
        die();
    }

    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_url)) {
        echo "Fajl je uspesno uploadovan !";
    } else {
        echo "Izvinite, dogodila se greska tokom uploadovanja. Pokusajte ponovo.";
    }

}
?>
