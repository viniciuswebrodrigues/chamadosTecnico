<?php
include_once "../conexao.php";

if ($_SESSION['logado'] != 1) {
  echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
  echo "<script>window.location.href = '../logout.php';</script>";
  exit();
}
?>
    <?php
		//Verica se a session têm permissão para aceesar 
        if($_SESSION['nivel'] != 'Administração' ){
            echo "<script>alert('Você não têm permissão para acessar esta área.')</script>";
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
  <title>PRODATA - chamados técnico</title>
  <!-- loader-->
  <link href="../assets/css/pace.min.css" rel="stylesheet" />
  <script src="../assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- simplebar CSS-->
  <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!-- Bootstrap core CSS-->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="../assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Sidebar CSS-->
  <link href="../assets/css/sidebar-menu.css" rel="stylesheet" />
  <!-- Custom Style-->
  <link href="../assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

  <!-- Start wrapper-->
  <div id="wrapper">

    <!--Start sidebar-wrapper-->
      <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
        <a href="../administrativo/">
          <img src="../assets/images/logo-icon.png" alt="logo icon">
        </a>
      </div>
      <ul class="sidebar-menu do-nicescrol">
	    <li>
          <a href="../administrativo/">
            <i class="zmdi zmdi-view-dashboard"></i> <span>Metrô</span>
          </a>
        </li>
		
        <li>
          <a href="terminal.php">
            <i class="zmdi zmdi-bus"></i> <span>Terminal</span>
          </a>
        </li>

      </ul>

    </div>
    <!--End sidebar-wrapper-->

    <!--Start topbar header-->
    <header class="topbar-nav">
      <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link toggle-menu" href="javascript:void();">
              <i class="icon-menu menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
          <?= $_SESSION['nome'];?>, <?= $_SESSION['nivel'];?>
          </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
          <li class="nav-item">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="../assets/images/icon.jpg" class="img-circle" alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-divider"></li>
              <li class="dropdown-divider"></li>
              <a href="../logout.php"><li class="dropdown-item"><i class="icon-power mr-2"></i> Sair</li></a>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper">
      <div class="container-fluid">
	    <div class="col-12 col-lg-12">
          <div class="alert alert-success">
              <?php
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
              ?>
          </div>
          </div>

        <!--Start Dashboard Content-->

        <div class="row">
		<div class="container box">
          <div class="ccol-12 col-lg-12">
            <div class="card">
              <div class="card-header">ABERTURA DE SOLICITAÇÕES
                <div class="card-action">
                </div>
              </div>
              <div class="table-responsive">
                <div class="icon col-sm-2" data-code="f10d" data-name="attachment-alt">
                  <i class="zmdi zmdi-attachment-alt"></i><span>Upload Exel</span><br><br>
                </div>
				<!-- Formulário para abrir solicitações -->
                <form method="POST" action="solicitacoes.php" class="form-group" enctype="multipart/form-data">
                  <input type="file" name="arquivo"><br></br>
                  <input type="submit" class="btn btn-light" value="Enviar">
                </form><br>
              </div>
            </div>
          </div>
        </div>

        <!--Start footer-->
        <footer class="footer">
          <div class="container">
            <div class="text-center">
			  Desenvolvido por Vinicius Pereira - 2021 Prodata mobility Brasil
            </div>
          </div>
        </footer>
        <!--End footer-->


      </div>
      <!--End wrapper-->

      <!-- Bootstrap core JavaScript-->
      <script src="../assets/js/popper.min.js"></script>
      <script src="../assets/js/bootstrap.min.js"></script>

      <!-- simplebar js -->
      <script src="../assets/plugins/simplebar/js/simplebar.js"></script>
      <!-- sidebar-menu js -->
      <script src="../assets/js/sidebar-menu.js"></script>
      <!-- loader scripts -->
      <script src="../assets/js/jquery.loading-indicator.js"></script>
      <!-- Custom scripts -->
      <script src="../assets/js/app-script.js"></script>
      <!-- Chart js -->

      <script src="../assets/plugins/Chart.js/Chart.min.js"></script>

      <!-- Index js -->
      <script src="../assets/js/index.js"></script>


</body>

</html>
