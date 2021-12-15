<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>PRODATA - chamados técnico</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

	<div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="assets/images/logo-icon.png" alt="logo icon">
		 	</div>
			
		  <div class="card-title text-uppercase text-center py-3">Cadastro</div>
		  <!-- formulário de cadastro -->
		    <form method="POST" action="processa_cad.php">
			  <div class="form-group">
			  <label for="nome" class="sr-only">Nome e Sobrenome</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="nome" name="nome" class="form-control input-shadow" placeholder="Digite seu nome completo" required>
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  
			  <div class="form-group">
			  <label for="usuario" class="sr-only">Usuário</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="usuario" name="usuario" class="form-control input-shadow" placeholder="Digite seu usuário para acessar ao sistema" required>
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>

			  <div class="form-group">
			   <label for="senha" class="sr-only">Senha</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="senha" name="senha" class="form-control input-shadow" placeholder="Digite sua senha" required>
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			  
			  <div class="form-group">
			  <label for="nivel">Setor de Acesso</label>
                <select class="form-control" id="nivel" name="nivel" required>
                    <option></option>
                    <option>Administração</option>
                    <option>Técnico</option>
                </select>
			  </div>
              <input type="submit" value="Cadastrar" name="SendCadas" class="btn btn-light">
			 </form>
		   </div>
		  </div>
	     </div>
		 
	</div><!--wrapper-->
	
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
