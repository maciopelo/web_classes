<?php

// W long-pollingu nie można używać sesji bo by zamroziła przeglądarke
session_write_close();
// Jeżeli request zostanie zamnięty przez przeglądarke to kończymy wykonywanie skryptu
ignore_user_abort(false);
// Pozwalamy na wykonwanie sie nieskoczonej petli bez limitu czasu 
set_time_limit(0);


//Czas modyfikacji pliku
$file = realpath('messages.txt');
$file_m_time = filemtime($file);
$current_file_m_time = $file_m_time;


while ($file_m_time == $current_file_m_time && !isset($_GET['fetch'])) {
  // PHP domyślnie cachuje zapytania stat o dane pliku (np. czas modyfikacji)
  // Musimy wyczyścić cache bo inaczej nasza pętla nie dostanie informacji o zmianie
  // Przez jakieś 5 minut i tak sobie będziemy czekać XD
  clearstatcache();
  
  // Ustawiamy zmienną do której porównujemy oryginalny czas modyfikacji
  // na aktualny czas. Jeżeli plik się zmienił to i czas się zmienił i wyjdziemy z pętli 
  $file_m_time = filemtime($file);

  // Kładziemy PHP do spania bo się chłopak zmęczy
  // Jedna sekunda snu pozwoli nam zaoszczędzić kilkanaście tysięcy wykonań pętli
  // A raczej plik tak często nie będzie modyfikowany więc hehe
  sleep(1);
}

$all_messages = '';
$pointer = fopen($file, 'r');

if (flock($pointer, LOCK_SH)) {
  
  $all_messages = fread($pointer, filesize($file));
  
  flock($pointer, LOCK_UN);
}

fclose($pointer);

echo $all_messages;

?>