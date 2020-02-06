<?php


$pseudonim = $_POST['pseudonim'];
$trescKomentarza = $_POST['content'];
$typKomentarza = $_POST['comment_type'];

$chosen = $_POST['choose'];
$comment_dir =basename($chosen,'.txt').'.k';
$path = getcwd()."/".dirname($chosen)."/".$comment_dir;


if(!file_exists($path)){
    $oldMask = umask(0);
    mkdir($path, 0755, true);
    umask($oldMask);
}

$comment_index = 0;
while (file_exists($path . "/" . $comment_index.".txt")) {
    $comment_index = $comment_index + 1;
 }

$plikKomentarza = fopen($path."/".$comment_index.".txt", "w");
fputs($plikKomentarza, $typKomentarza . "\n");
$znacznikCzasu = date("Y-m-d H:i:s");
fputs($plikKomentarza, $znacznikCzasu . "\n");
fputs($plikKomentarza, $pseudonim . "\n");
fputs($plikKomentarza, $trescKomentarza);
fclose($plikKomentarza);







?>
