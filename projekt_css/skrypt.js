function onload() {
    create_styles_list();
    checkCookie();
 }
 
 function create_styles_list() {
    var styles = document.getElementsByTagName("link");
    var where = document.getElementById("punkty");
    //wyspuje sie nw czemu jak tego nie ma xd przy pierwszym odpaleniu 
    for(var i = 1; i<styles.length;i++){
      styles[i].disabled = 'persistant';
    }
    for (var i = 0 ; i < styles.length ; i++) {
       var point = document.createElement('li');
       var name = styles[i].title;
       point.innerHTML = name;
       point.setAttribute("onclick", "choose_style(\"" + name + "\")");
       where.appendChild(point);
    }
 
 }
 
 function choose_style(name) {
    var styles = document.getElementsByTagName("link");
     for (var i = 0; i < styles.length; i++) {
       if (styles[i].getAttribute("title") == name) {
          styles[i].disabled = false;
       } else {
          styles[i].disabled = true;
       }
     }

     setCookie("style",name,31);
 
 }


 /* obsługa ciasteczek */
 function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }


  function checkCookie() {
    var style = getCookie("style");
    if (style != "") {
     choose_style(style);
    } 
  }

  

