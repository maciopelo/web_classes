<?php

for ($i=0; $i<5; $i++) {
    echo date("H:i:s ");
    ob_flush(); 
    flush();
    sleep(2);}
    
?>