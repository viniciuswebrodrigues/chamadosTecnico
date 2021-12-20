<?php
include_once '../conexao.php';

if ($_SESSION['logado'] != 1) {
    echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
    echo "<script>window.location.href = '../logout.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Ficha de Intervenção Técnica</title>
    <!-- loader-->
	<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>

    <!-- Bootstrap core CSS-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="../assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-12 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">FICHA DE INTERVENÇÃO TÉCNICA</div>
                            <form method="POST" action="proc_ronda.php">

                                <div class="form-group">
                                    <label for="opcao">Escolha opção do atendimento:</label>
                                    <select type="text" name="opcao" class="form-control" id="opcao">
                                        <option required></option>
                                        <option>Ronda</option>
										<option>Status</option>
                                        <option>Limpeza preventiva</option>
                                        <option>Instalação</option>
                                        <option>Vistoria</option>
                                        <option>Reparo</option>
                                        <option>Manutenção de câmeras</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <div class="autocomplete">
                                    <label for="equipamento">Estação:</label>
                                    <input id="myInput" type="text" name="estacao" class="form-control">
                                </div>
                                </div>

                                <div class="form-group">
                                    <label for="equipamento">Id-Equipamento:</label>
                                    <input type="text" name="equipamento" class="form-control" id="equipamento" required>
                                </div>

                                <div class="form-group">
                                    <label for="data">Data do atendimento:</label>
                                    <input type="date" name="data" class="form-control" id="data" required>
                                </div>

                                <div class="form-group">
                                    <label for="hora_inicio">Hora início:</label>
                                    <input type="time" name="hora_inicio" class="form-control" id="hora_inicio" required>
                                </div>

                                <div class="form-group">
                                    <label for="hora_termino">Hora término:</label>
                                    <input type="time" name="hora_termino" class="form-control" id="hora_termino" required>
                                </div>

                                <div class="form-group">
                                    <label for="obs">Observação:</label>
                                    <input type="text" name="obs" class="form-control" id="obs" required>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Enviar" name="SendCadas" class="btn btn-light">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["AACD-Servidor","Adolfo Pinheiro"," Alto da Boa Vista","Alto do Ipiranga","Ana Rosa","Anhangabaú Falcão","Artur Alvim","Barra Funda","Brás","Brigadeiro","Brigadeiro Leste","Brigadeiro Oeste","Brooklin","Butantã - ViaQuatro","Camilo Haddad","Campo Limpo","Capão Redondo","Carandiru","Chácara Klabin","Clínicas","Conceição","Consolação","Fazenda Da Juta","Giovanni Gronchi","Itaquera","Jabaquara","Jardim Planalto","Largo Treze","Liberdade","Luz","Luz - ViaQuatro","Marechal Deodoro","Moema","Oratório Monotrilho","Paraíso","Pedro II","Praça da Árvore","República","Sacomã","Santa Cecília","Santa Cruz","Santana","Santos Imigrantes","São Bento","São Joaquim","São Judas","São Lucas","São Mateus","Sapopemba","Saúde","Sé","Sumaré","Tamanduateí","Tietê","Tiradentes","Trianon Leste","Tucuruvi","Vergueiro","Vila Madalena","Vila Mariana","Vila Tolstoi","Vila União","Eucalipto L 5","Faria Lima - ViaQuatro","H. Mackenzie- ViaQuatro","Butanta - Linha Amarela","Morumbi - Linha Amarela","Oscar Freire- ViaQuatro","Paulista- ViaQuatro","Vila Prudente  L.2 Verde"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
</body>

</html>
