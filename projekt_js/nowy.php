<?php

    $nazwaBloga = $_POST['blog_name'];
    $nazwaUzytkownika = $_POST['user_name'];
    $haslo = $_POST['pass'];
    $opis = $_POST['content'];


   if (!file_exists($nazwaBloga)){

      $oldMask = umask(0);
      mkdir($nazwaBloga, 0777, true);
      umask($oldMask);

      $sciezka_pliku_txt = $nazwaBloga."/info.txt";
      $plik = fopen($sciezka_pliku_txt, 'w');

      if(flock($plik, LOCK_EX)) {
      fputs($plik, $nazwaUzytkownika."\n");
      fputs($plik, md5($haslo)."\n");
      fputs($plik, $opis);
      }

      flock($plik, LOCK_UN);
      fclose($plik);

   } 
   else{

      echo "Katalog zajety!<br/>";
      
   }

    
?>
