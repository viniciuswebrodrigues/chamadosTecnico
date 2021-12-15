<?php
include_once '../conexao.php';

if ($_SESSION['logado'] != 1) {
    echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
    echo "<script>window.location.href = '../metro/';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>A caminho</title>
    <!-- loader-->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>

    <!-- Bootstrap core CSS-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="../assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <?php
    //Seleciona os registros da tabela solicitações e aloca o id na variável id
    //O input id stado como hidden recebe o id da tabela de solictações

    // váriavel id recebe o id do proc_metro.php 
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_edit = "SELECT * FROM metroatm WHERE id = $id";

    $resultado_edit = $conexao->prepare($result_edit);
    $resultado_edit->execute();
    $row_cont = $resultado_edit->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-12 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Informe que está a caminho do atendimento</div>
                            <form method="POST" action="acaminho.php">
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" value="<?php if (isset($row_cont['id'])) {
                                                                                                    echo $row_cont['id'];
                                                                                                } ?>">
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Enviar" name="SendCad" class="btn btn-light">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
            <!--End Row-->

            <!--start overlay-->

            <!--end overlay-->

        </div>
        <!-- End container-fluid-->
    </div>

    <!--start color switcher-->

    <!--end color switcher-->

    <!--End wrapper-->
    <!-- Bootstrap core JavaScript-->

</body>

</html>