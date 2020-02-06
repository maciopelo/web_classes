<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>

	<title>Dodaj wpis</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />

</head>

<body>
<?php include 'menu.php'; ?>

	<h1> Dodaj wpis </h1>
	
	<form  action="wpis.php" method="POST" ENCTYPE="multipart/form-data">
		Podaj nazwę użytkownika: <input type="text" name="user_name"/>
		<br/>
		<br/>
		
		Podaj hasło: <input type="password" name="pass"/>
		<br/>
		<br/>
		
		Dodaj wpis: 
		<br/>
		<textarea name="content" rows="15" cols="40"></textarea>
		<br/>
		<br/>
		
		
		Wprowadź datę:
		<input type="text" value="<?php echo date('Y-m-d'); ?>" name="date" />
		
		Wprowadź godzinę:
		<input type="text" value="<?php echo date('G:i'); ?>"  name="hour"/>
		<br/>

	
	
		<h2>Prześlij pliki (max. 3)</h2>
		<input type="file" name="plik1"/><br/>
		<input type="file" name="plik2"/><br/>
		<input type="file" name="plik3"/><br/><br/>
        <input type="submit" value="Wyślij"/>
 
     </form>
	
	
	
</body>
</html>