<?php

// wyświetlanie ewentualnych errorow 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$user = $_POST['username'];
$msg = $_POST['message'];

if (empty($user) && empty($msg)) {
    echo 'Nie podano nazwy użytkownika lub wiadomości!';
    return;
}


//Ograniczona ilosc wiadomosci w pliku
$max_messages_num = 20;

//Liczenie lini pliku wiadomosci
$filename = fopen('messages.txt', "r+");
$linecount = 0;
while(!feof($filename)){
    $line = fgets($filename);
    $linecount++;
}

$message = $user.': '.$msg."\n";
fputs($filename, $message);

//Jesli przekracza usun najstarsza wiadomosc
if($linecount>$max_messages_num){
    $lines = file("messages.txt");
    rewind($filename);
    ftruncate($filename, 0);
    for($i = 1; $i<count($lines); $i++){
        fputs($filename,$lines[$i]);
    }
}
fclose($filename);



?>