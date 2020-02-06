<?php 



$user = $_POST['user_name'];
$password  = $_POST['pass'];
$wpis = $_POST['content'];
$data = $_POST['date'];
$godzina = $_POST['hour'];


$found_user = FALSE;
$current = NULL;


$dir = new DirectoryIterator(dirname("php"));
foreach ($dir as $filename) {
    if(is_dir($filename) && file_exists("$filename/info.txt")){
	echo $filename;        
	$lines = file("$filename/info.txt");

        for($i=0; $i<2;$i++){
            $poss_user = $lines[0];
            $poss_pass = $lines[1];
        }
    
        if($user."\n"==$poss_user && md5($password)."\n"==$poss_pass){
            $found_user = TRUE;
            $current = getcwd()."/".$filename;
        } 
	 
    }
        
       
}


if($found_user){
    $converted_date = str_replace("-", "", $data);
	$converted_hour = str_replace(":", "", $godzina);
	$seconds = date("s");
    $uniq_num = mt_rand(1, 99);
    $comment_file = $converted_date.$converted_hour.$seconds.$uniq_num;
    $new_file = fopen($current."/".$comment_file.".txt", 'w');
	fputs($new_file, $wpis);
    fclose($new_file);
}



$zalaczniki = array();
for ($i = 1 ; $i <= sizeof($_FILES) ; $i++) {
    $nazwa_zalacznika = 'plik' . $i;
    $obecny_zalacznik = $_FILES[$nazwa_zalacznika];
    array_push($zalaczniki, $obecny_zalacznik);
}

$numerObecnegoZalacznika = 1;

foreach($zalaczniki as $zalacznik) {
    $rozszerzenie = pathinfo($zalacznik['name'], PATHINFO_EXTENSION);
    $plikDocelowy = $current."/". $converted_date . $converted_hour . $seconds .
    $uniq_num . $numerObecnegoZalacznika . "." . $rozszerzenie;


    if (file_exists($plikDocelowy)) {
        echo "Plik " . $zalacznik['name'] . "juz istnieje! <br />";
    } else {
        if (move_uploaded_file($zalacznik["tmp_name"], $plikDocelowy)) {
            echo "Pomyślnie dodano plik " . $zalacznik['name'] . "<br />";
        }
    }
    $numerObecnegoZalacznika = $numerObecnegoZalacznika + 1;
}



?>
