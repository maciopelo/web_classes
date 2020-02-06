<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>

	<title>Stwórz swojego bloga !</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />

</head>

<body>
	
	<?php include 'menu.php'; ?>

	<h1> Stwórz swój pierwszy blog </h1>
	
	<form  action="nowy.php" method="POST">
	
		Podaj nazwę bloga: <input type="text" name="blog_name"/>
		<br/>
		<br/>
		
		Podaj nazwę użytkownika: <input type="text" name="user_name"/>
		<br/>
		<br/>
		
		Utwórz hasło: <input type="password" name="pass"/>
		<br/>
		<br/>
		
		Czego bedzię dotyczył blog ?
		<br/>
		<textarea name="content" rows="15" cols="40"></textarea><br><br>
		
		<input type="reset" value="Wyczyść" name="clear" />
		
		
		<input type="submit" value="Stwórz bloga " >
	
	</form>
	
</body>
</html>