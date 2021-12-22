function ajx(){
    var ajax = new XMLHttpRequest(); // cria o objeto XHR
    ajax.onreadystatechange = function(){
       // verifica quando o Ajax for completado
       if(ajax.readyState == 4 && ajax.status == 200){
          document.getElementById("empTable").innerHTML = ajax.responseText; // atualiza o span
          setTimeout(ajx, 60000); // chama a função novamente após 2 segundos
       }
    }
    ajax.open("GET", "tableAtm.php"); // página a ser requisitada
    ajax.send(); // envia a requisição
 }
 ajx();
 
 function ajxval(){
    var ajax = new XMLHttpRequest(); // cria o objeto XHR
    ajax.onreadystatechange = function(){
       // verifica quando o Ajax for completado
       if(ajax.readyState == 4 && ajax.status == 200){
          document.getElementById("tabela").innerHTML = ajax.responseText; // atualiza o span
          setTimeout(ajxval, 60000); // chama a função novamente após 2 segundos
       }
    }
    ajax.open("GET", "tablevalidador.php"); // página a ser requisitada
    ajax.send(); // envia a requisição
 }
 ajxval();
 
 function ajxvalTermAtm(){
    var ajax = new XMLHttpRequest(); // cria o objeto XHR
    ajax.onreadystatechange = function(){
       // verifica quando o Ajax for completado
       if(ajax.readyState == 4 && ajax.status == 200){
          document.getElementById("empTableTerm").innerHTML = ajax.responseText; // atualiza o span
          setTimeout(ajxvalTermAtm, 60000); // chama a função novamente após 2 segundos
       }
    }
    ajax.open("GET", "tableAtmTerm.php"); // página a ser requisitada
    ajax.send(); // envia a requisição
 }
 ajxvalTermAtm();
 
 function ajxvalTermVal(){
    var ajax = new XMLHttpRequest(); // cria o objeto XHR
    ajax.onreadystatechange = function(){
       // verifica quando o Ajax for completado
       if(ajax.readyState == 4 && ajax.status == 200){
          document.getElementById("empTableTermVal").innerHTML = ajax.responseText; // atualiza o span
          setTimeout(ajxvalTermVal, 60000); // chama a função novamente após 2 segundos
       }
    }
    ajax.open("GET", "tableAtmTermVal.php"); // página a ser requisitada
    ajax.send(); // envia a requisição
 }
 ajxvalTermVal();

 function ajxvalAceitador(){
    var ajax = new XMLHttpRequest(); // cria o objeto XHR
    ajax.onreadystatechange = function(){
       // verifica quando o Ajax for completado
       if(ajax.readyState == 4 && ajax.status == 200){
          document.getElementById("aceitador").innerHTML = ajax.responseText; // atualiza o span
          setTimeout(ajxvalAceitador, 60000); // chama a função novamente após 2 segundos
       }
    }
    ajax.open("GET", "tableAceitador.php"); // página a ser requisitada
    ajax.send(); // envia a requisição
 }
 ajxvalAceitador();
 
  function ajxvalPinpad(){
      var ajax = new XMLHttpRequest(); // cria o objeto XHR
      ajax.onreadystatechange = function(){
         // verifica quando o Ajax for completado
         if(ajax.readyState == 4 && ajax.status == 200){
            document.getElementById("pinpad").innerHTML = ajax.responseText; // atualiza o span
            setTimeout(ajxvalPinpad, 60000); // chama a função novamente após 2 segundos
         }
      }
      ajax.open("GET", "tablePinpad.php"); // página a ser requisitada
      ajax.send(); // envia a requisição
   }
   ajxvalPinpad();

  function ajxvalAceitadorTerm(){
      var ajax = new XMLHttpRequest(); // cria o objeto XHR
      ajax.onreadystatechange = function(){
         // verifica quando o Ajax for completado
         if(ajax.readyState == 4 && ajax.status == 200){
            document.getElementById("aceitadorTerm").innerHTML = ajax.responseText; // atualiza o span
            setTimeout(ajxvalAceitadorTerm, 60000); // chama a função novamente após 2 segundos
         }
      }
      ajax.open("GET", "tableAceitadorTerm.php"); // página a ser requisitada
      ajax.send(); // envia a requisição
   }
   ajxvalAceitadorTerm();

   function ajxvalPinpadTerm(){
    var ajax = new XMLHttpRequest(); // cria o objeto XHR
    ajax.onreadystatechange = function(){
       // verifica quando o Ajax for completado
       if(ajax.readyState == 4 && ajax.status == 200){
          document.getElementById("pinpadTerm").innerHTML = ajax.responseText; // atualiza o span
          setTimeout(ajxvalPinpadTerm, 60000); // chama a função novamente após 2 segundos
       }
    }
    ajax.open("GET", "tablePinpadTerm.php"); // página a ser requisitada
    ajax.send(); // envia a requisição
 }
 ajxvalPinpadTerm();