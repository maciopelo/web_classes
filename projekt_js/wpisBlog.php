<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>

	<title>Dodaj wpis</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<script type="text/javascript" src="skrypt.js"> </script>

</head>

<body onload="check()">
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
		<input id="data_wpisu" type="text" name="data" onchange="check_date()">
		<br/>
		
		Wprowadź godzinę:
		<input id="godzina_wpisu" type="text" name="godzina" onchange="check_hour()">
		<br/>

	
		
		<div id="zalaczniki">
			<h2>Prześlij pliki </h2>
			<p> <input type="file" name="plik1"/> </p>
		</div>
		<input type="button" value="Dodaj plik" onclick="create_attachment()"/> <br/><br/><br/>
        <input type="submit" id='button' value="Stwórz blog"/>
 
     </form>
	
	
	
</body>
</html>