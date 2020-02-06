<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>

	<title>Stwórz swojego bloga !</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />

</head>

<body>
<?php include 'menu.php'; ?>
	
	<form action="koment.php" method="POST">
		Wybierz, który wpis chcesz skomentować: <br> <br>
		
		<select name="choose">

			<?php

			
			$dir = new DirectoryIterator(dirname("php"));
			foreach ($dir as $filename) {
				if(is_dir($filename) && $filename!='.' && $filename!='..' ){
					$fileList = glob($filename."/*");
					foreach($fileList as $file){
						if($file!=$filename."/info.txt" && !is_dir($file)){
							echo "<option > $file </option>";
						}
							
					}

				}
				
			}
			
		?>
		</select>
	
      <h1>Dodaj komentarz do wpisu </h1>

        Podaj treść komentarza:
		<br/>
        <textarea name="content" rows="10" cols="40"></textarea>
		<br/>
		<br/>

		Podaj pseudonim:
		<input type="text" name="pseudonim">
		<br/>
		<br/>
		
        Wybierz rodzaj komentarza:
		<select name="comment_type">
		  <option>Pozytywny</option>
		  <option>Neutralny</option>
		  <option>Negatywny</option>
		</select>
		<br><br>
		<input type="submit" value="Wyślij" name="set" />
        <input type="reset" value="Wyczyść" name="wyczysc" />
	</form>
	
</body>
</html>
