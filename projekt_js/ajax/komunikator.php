<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Chatbox</title>
</head>
<body>
  
  
    <h1>Chatbox</h1>
    <label for="chat__activate"> Aktywuj chat </label>
    <input type="checkbox" id="checkbox" onclick="onchange_checkbox();"> <br>
    
    
    
    <textarea id="chat_area" rows="20" cols="50" disabled></textarea>
    
    <form id="chat__form">
      
    <br> <label for="message">Wiadomość:</label> <br>
        
    <textarea rows="4" cols="50" id="message" name="message" class="chat__message" disabled></textarea> <br>

    
    <br> <label for="username">Nazwa użytkownika:</label><br>
    <input id="username" name="username" type="text" disabled ><br>
      
    <br> <button role="submit" id="button" disabled>Wyślij</button>
      
    </form>
  

  <script src="skrypt.js"></script>
</body>
</html>