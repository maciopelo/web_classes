//Wszystko co najwazniejsze z czatu :D 
var checkbox = document.getElementById('checkbox');
var chat_area = document.getElementById('chat_area');
var username = document.getElementById('username');
var message = document.getElementById('message');
var send_button = document.getElementById('button');
var chat_form = document.getElementById('chat__form');
var pollXhr = null;

chat_form.addEventListener('submit', on_message_submit);

// ON/OFF dla czatu za pomoca checkbox
function onchange_checkbox(){
    

    // Dla ON pobieramy odrazu tresc czatu z serwera i odpalamy long-polling
    if(checkbox.checked){
        username.disabled = false;
        message.disabled = false;
        send_button.disabled = false;
        get_messages();
        poll_messages();
    }
    // Dla OFF zrywamy połączenie i nie wyswietlamy czatu
    else{
        set_chat_text('');
        pollXhr.abort();
        username.disabled = true;
        message.disabled = true;
        send_button.disabled = true;

    }
}

// Funkcja pomocnicza ustawiajaca tresc czatu
function set_chat_text (messages) {
  chat_area.value = messages;
}


// Wysyalmy zapytanie do long_poll.php z param fetch=true
// przez odrazu dostajemy wiadomosci i nie wykonujmey nieskonczonej petli
// podczas czekania na aktualizacje pliku.
function get_messages() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'long_poll.php?fetch=true');
  xhr.send();

  xhr.onload = function () {
    if (xhr.status != 200) {
      alert('Błąd ' + xhr.status + ': ' + xhr.statusText);
    } else {
      set_chat_text(xhr.responseText);
    }
  };
  xhr.onerror = function () {
    alert('Błąd podczas wysyłania zapytania');
  };
}


// Tutaj wysyłamy zapytanie na serwera, a on wpada w nieskonczona petle 
// utrzymujac otwarte tylko jedno polaczanie z uzytkownikiem  i czeka na
// spelnienie warunku aby zwrocic nam odpowiedz ( zmiana modyfiakcji messages.txt ).
// Kiedy warunek sie spelni to polaczenie sie zamyka, ale my je znow odpalamy i tak w 
// kolko.
function poll_messages() {
  pollXhr = new XMLHttpRequest();
  pollXhr.open('GET', 'long_poll.php');
  pollXhr.send();

  pollXhr.onload = function () {
    if (pollXhr.status != 200) {
      alert('Błąd ' + pollXhr.status + ': ' + pollXhr.statusText);
    } else {
      
      set_chat_text(pollXhr.responseText);

      poll_messages();
    }
  };

  pollXhr.onerror = function () {
    alert('Błąd podczas wysyłania zapytania');
    poll_messages();
  };
}


// Po wcisniecu guzika wyslij
// nie refreshuj strony
// uaktualnia messages.txt
function on_message_submit (event) {
  event.preventDefault();

  if (!username.value || !message.value) {
    alert('Pola nazwa użytkownika i wiadomość nie mogą być puste!');
    return;
  }

  var formData = new FormData(event.target);
  var xhr = new XMLHttpRequest();

  xhr.open('POST', 'chat.php');
  xhr.send(formData);

  chat_area.value += username.value + ': ' + message.value;

  message.value = '';
  
}

