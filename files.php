<?php

//Citanje sadrzaja fajla
echo readfile("D:/xampp/htdocs/symphart/public/Files/info.txt");

//Metoda za informaciju o velicini fajla (u bajtovima)
$file_size=filesize("D:/xampp/htdocs/symphart/public/Files/info.txt");

//Metode koja se cesce koristi za manipulaciju fajlova - fopen + fread/fwrite

//READ
$file=fopen("D:/xampp/htdocs/symphart/public/Files/info.txt","r") or die();
echo fread($file,$file_size);
fclose($file);

//WRITE
$file=fopen("D:/xampp/htdocs/symphart/public/Files/dt1txt","a") or die();
$text_to_write="To je tacna informacija";
fwrite($file,$text_to_write);
fclose($file);






?>
