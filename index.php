<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>PRODATA - chamados técnico</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">
<?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>

  <!-- start loader -->
  <div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
      <div class="loader-wrapper-inner">
        <div class="loader"></div>
      </div>
    </div>
  </div>
  <!-- end loader -->

  <!-- Start wrapper-->
  <div id="wrapper">

    <div class="loader-wrapper">
      <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <div class="card card-authentication1 mx-auto my-5">
      <div class="card-body">
        <div class="card-content p-2">
          <div class="text-center">
            <img src="assets/images/logo-icon.png" alt="logo icon">
          </div>
          <div class="card-title text-uppercase text-center py-3"></div>
          <form action="validacao.php" method="POST">
            <div class="form-group">
              <label for="exampleInputUsername" class="sr-only">Usuário</label>
              <div class="position-relative has-icon-right">
                <input type="text" name="usuario" id="exampleInputUsername" class="form-control input-shadow" placeholder="Entre com seu usuário">
                <div class="form-control-position">
                  <i class="icon-user"></i>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword" class="sr-only">Senha</label>
              <div class="position-relative has-icon-right">
                <input type="password" name="senha" id="exampleInputPassword" class="form-control input-shadow" placeholder="Digite sua senha">
                <div class="form-control-position">
                  <i class="icon-lock"></i>
                </div>
              </div>
            </div>
            <div class="form-group">
              
                <select class="form-control" name="nivel" >
                  <option>Setor de Acesso</option>
                  <option>Administração</option>
                  <option>Técnico</option>
                </select>
              
            </div>
            <div class="form-row">
              <div class="form-group col-6">
                <div class="icheck-material-white">

                </div>
              </div>
              <div class="form-group col-6 text-right">
                <a href="reset-password.html"></a>
              </div>
            </div>
            <button type="submit" class="btn btn-light btn-block" href="index.php">Acessar</button>
            <div class="text-center mt-3"></div>
          </form>
        </div>
      </div>
	  <center><p class="text-warning mb-0">Não tem uma conta? <a href="cadastro.php"> Cadastre-se</a></p></center><br>
      <div class="card-footer text-center py-3">
        <p> Desenvolvido por Vinicius Pereira - 2021 Prodata mobility Brasil </p>
      </div>
    </div>


    <!--end color switcher-->

  </div>
  <!--wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>

  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

</body>

</html>