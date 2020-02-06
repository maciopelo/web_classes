var current_date = new Date();
var attach_num = 1;


/* po zaladnowaniu strony uzupelnia pola */
function check() {
    update_date();
    update_hour();
 }

 
 /*aktualizacaj daty na poprawny format */
 function update_date(){
    var given_date = document.getElementById('data_wpisu');
    var day = current_date.getDate();
    var month = current_date.getMonth()+1;
    var year = current_date.getFullYear();

    if(day < 10) {
       day = '0' + day;
    }
   
    if(month < 10) {
       month = '0' + month;
    }
    
    var proper_date = year + '-' + month + '-' + day;
    given_date.value = proper_date;
 }

 
 /*sprawdzwanie poprawnosci daty */
 function check_date() {
    var given_date = document.getElementById('data_wpisu').value;
    var date_regexp = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
    

    if (date_regexp.test(given_date)) {
        
        var params = given_date.split('-');
        var year = params[0];
        var month = params[1];
        var day = params [2];

        /*czy nie z przyszlosci */
        var date = new Date(year,month-1,day);
        if(date>current_date){
            alert("Błędna data !");
            update_date();
        }


        /*czy przestepny*/ 
        if( (parseInt(year)%4==0 && parseInt(year)%100!=0) || parseInt(year)%400==0 ){
            month_days = [31,29,31,30,31,30,31,31,30,31,30,31];
        }
        else{
            month_days = [31,28,31,30,31,30,31,31,30,31,30,31];
        }
        
        /*czy ilosc dni w miesicu ok*/
        if(day>month_days[parseInt(month-1)]){
            alert("Błędna data !");
            update_date();
        }


    }

    else{
        alert("Błędna data !");
        update_date();  
    }
 }
 

 /* aktualizacaja godziny  */
 function update_hour() {
    var given_hour = document.getElementById('godzina_wpisu');
    var hours = current_date.getHours();
    var minutes = current_date.getMinutes();

    if(minutes < 10){
       minutes = '0' + minutes;
    }
    given_hour.value = hours + ":" + minutes;
 }


 /*sprawdzanie poprawnosci godziny */
 function check_hour() {
   var given_hour = document.getElementById('godzina_wpisu').value;
   var time = given_hour.split(':');
   var regexp_godziny = /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/gi;
   var given_date = document.getElementById('data_wpisu').value;
   var params = given_date.split('-');
   var year = params[0];
   var month = params[1];
   var day = params [2];

   /*czy godzina tego samego dnia nie wieksza niz obecnie */
    if (regexp_godziny.test(given_hour)) {
   
      if(parseInt(year)==current_date.getFullYear() && parseInt(month)==current_date.getMonth()+1 && parseInt(day)==current_date.getDate()){
         if(parseInt(time[0])>current_date.getHours()){
            alert("Błędna godzina !");
            update_hour();
         }
         else{
            if(parseInt(time[1])>current_date.getMinutes()){
               alert("Błędna godzina !");
               update_hour();
            }
         }
         
      }
    }
    else{
      alert("Błędna godzina !");
      update_hour(); 
    }
 }


 /*dynamiczne dodwanie plikow */
 function create_attachment() {
       var p = document.getElementById("zalaczniki");
       attach_num ++;
       var para = document.createElement("p");
       var new_attach = document.createElement("input");
       new_attach.setAttribute("type", "file");
       new_attach.setAttribute("name", "plik"+attach_num);
       para.appendChild(new_attach)
       p.appendChild(para);

 }

 

 





