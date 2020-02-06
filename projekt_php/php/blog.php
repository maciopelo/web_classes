<?php
        include 'menu.php';

        $nazwaBloga = "";
		if (isset($_GET['nazwa'])) {
			$nazwaBloga = $_GET['nazwa'];
        }
        
        

        if ($nazwaBloga == ""){
            $dir = new DirectoryIterator(dirname("php"));
			foreach ($dir as $filename) {
                if(is_dir($filename) && $filename!="." && $filename!=".."){
                    echo sprintf("<a href=\"?nazwa=%s\">%s</a><br />", $filename,$filename);
                }
                
				
			}

        }
        else{
			$czyIstnieje = false;
			if (file_exists($nazwaBloga)) {
				$czyIstnieje = true;
				$plikOpisBloga = fopen($nazwaBloga."\info.txt", 'r');
                $numerLinii = 1;
                echo "<h1>Tytuł: </strong>" . $nazwaBloga . "</h1>";
				while (($linia = fgets($plikOpisBloga)) !== false) {
					if ($numerLinii == 1) {
						echo "<h2>Autor bloga: </strong>" . $linia . "</h2>";
					} else if ($numerLinii == 3) {
						echo "<h2>Opis bloga:</h2>" . $linia . "";
					}
					if ($numerLinii >= 4) {
						echo $linia . "<br />";
					}
					$numerLinii = $numerLinii + 1;
				}
                fclose($plikOpisBloga);
				
			

            

        
        }

        if (!$czyIstnieje) {
			echo "<h1>Nie znaleziono blogu ! </h1><br />";
		}
    }

    
  
?>