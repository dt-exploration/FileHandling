<?php

//Citanje sadrzaja fajla
echo readfile("D:/xampp/htdocs/symphart/public/Files/info.txt");

//Metoda za informaciju o velicini fajla (u bajtovima)
$file_size = filesize("D:/xampp/htdocs/symphart/public/Files/info.txt");

//Metoda za informaciju o ekstenziji fajla
$target_file = "D:/xampp/htdocs/symphart/public/Files/info.txt";
$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);

//Metoda za proveru postojanja fajla (non void metoda, vraca true ako postoji fajl)
file_exists("D:/xampp/htdocs/symphart/public/Files/info.txt");

//Metode kojae se cesce koriste za manipulaciju fajlova - fopen + fread/fwrite

//READ
$file = fopen("D:/xampp/htdocs/symphart/public/Files/info.txt","r") or die();
echo fread($file,$file_size);
fclose($file);

//WRITE
$file = fopen("D:/xampp/htdocs/symphart/public/Files/dt1.txt","a") or die();
$text_to_write="To je tacna informacija";
fwrite($file,$text_to_write);
fclose($file);

//Ukljucivanje 3rd party scripta / fajla sa 2 razlicite metode
include "D:/xampp/htdocs/symphart/public/Files/incl.php";
require "D:/xampp/htdocs/symphart/public/Files/incl.php";

?>
