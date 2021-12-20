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
                            <div class="card-title">FICHA DE INTERVENÇÃO TÉCNICA</div>
                            <form method="POST" action="proc_fit.php">
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" value="<?php if (isset($row_cont['id'])) {
                                                                                                    echo $row_cont['id'];
                                                                                                } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="id">Id/Equip:</label>
                                    <input type="text" name="ide" class="form-control" value="<?php if (isset($row_cont['ide'])) {
                                                                                                    echo $row_cont['ide'];
                                                                                                } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="terminal">Terminal:</label>
                                    <input type="text" name="terminal" class="form-control" value="<?php if (isset($row_cont['terminal'])) {
                                                                                                        echo $row_cont['terminal'];
                                                                                                    } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="modelo">Equipamento:</label>
                                    <input type="text" name="modelo" class="form-control" value="<?php if (isset($row_cont['modelo'])) {
                                                                                                        echo $row_cont['modelo'];
                                                                                                    } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="opcao">Escolha a opção do atendimento:</label>
                                    <select type="text" name="opcao" class="form-control" id="opcao">
                                        <option required></option>
                                        <option>Solicitações</option>
                                        <option>Falta de usuàrios</option>
                                        <option>Teamviewer</option>
                                        <option>Necessário abrir chamado(VIVO, UNITELCO E HOSTFIBER)</option>
                                        <option>Instalação</option>
                                        <option>Vistoria</option>
                                        <option>Reparo</option>
                                        <option>Manutenção de câmeras</option>
                                    </select>
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
                                    <label for="falha_alegada">Falha Alegada:</label><br>
                                    <input type="radio" class="form-group" name="falha_alegada" value="sem venda"> <label> Sem venda</label><br>
                                    <input type="radio" class="form-group" name="falha_alegada" value="nao aceita debito"> <label> Não aceita débito</label><br>
                                    <input type="radio" class="form-group" name="falha_alegada" value="nao aceita dinheiro"> <label> Não aceita dinheiro</label><br>
                                    <input type="radio" class="form-group" name="falha_alegada" value="sem comunicacao"> <label> Sem comunicação</label><br>
                                    <input type="radio" class="form-group" name="falha_alegada" value="equipamento vandalizado"> <label> Equipamento vandalizado</label><br>
                                    <input type="radio" class="form-group" name="falha_alegada" value="falta de usuarios"> <label> Falta de usuàrios</label><br>

                                    <label for="alegada_outro">Outro:</label>
                                    <input type="text" name="alegada_outro" class="form-control" id="alegada_outro">
                                </div>


                                <div class="form-group">
                                    <label for="falha_constatada">Falha Constatada:</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="nota presa"> <label> Nota presa</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="sistema tef travado"> <label> Sistema tef travado</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="sem comunicacao"> <label> Sem comunicação</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="aplicacao travada"> <label> Aplicação travada</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="aceitador travado"> <label> Aceitador travado</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="leitora RF travada"> <label> Leitora RF travada</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="aceitador travado"> <label> Aceitador travado</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="abrir chamado"> <label> Necessário Abrir Chamado (VIVO, UNITELCO e HOSTFIBER)</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="equipamento vandalizado"> <label> Equipamento vandalizado</label><br>
                                    <input type="radio" class="form-group" name="falha_constatada" value="falta de usuarios"> <label> Falta de usuàrios</label><br>

                                    <label for="constatada_outro">Outro:</label>
                                    <input type="text" name="constatada_outro" class="form-control" id="constatada_outro">
                                </div>

                                <div class="form-group">
                                    <label for="acao_corretiva">Ação Corretiva:</label><br>
                                    <input type="radio" class="form-group" name="acao_corretiva" value="reiniciado o windows"> <label> </label>Reiniciado o windows<br>
                                    <input type="radio" class="form-group" name="acao_corretiva" value="nota retirada e enviada ao cofre"> <label> Nota retirada e enviada ao cofre</label><br>
                                    <input type="radio" class="form-group" name="acao_corretiva" value="falta de usuàrios"> <label> Falta de usuàrios</label><br>
                                    <input type="radio" class="form-group" name="acao_corretiva" value="reiniciado equipamentos de rede"> <label> Reiniciado equipamentos de rede</label><br>
                                    <input type="radio" class="form-group" name="acao_corretiva" value="reiniciado leitora RF via USB"> <label> Reiniciado Leitora RF via USB</label><br>
                                    <input type="radio" class="form-group" name="acao_corretiva" value="falta de usuarios"> <label> Falta de usuàrios</label><br>

                                    <label for="corretiva_outro">Outro:</label>
                                    <input type="text" name="corretiva_outro" class="form-control" id="corretiva_outro">
                                </div>

                                <div class="form-group">
                                    <label for="conjunta">Conjunta/Agendar Retorno:</label>
                                    <select type="text" name="conjunta" class="form-control" id="conjunta">
                                        <option></option>
                                        <option>Brinks</option>
                                        <option>Imply</option>
                                        <option>Integral</option>
                                        <option>Diebold</option>
                                        <option>Marvel</option>
                                        <option>Quiwi</option>
                                        <option>Unitelco</option>
                                        <option>Vivo</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="atendimento">Situação do atendimento:</label>
                                    <select type="text" name="atendimento" class="form-control" id="atendimento">
                                        <option required></option>
										<option>concluido</option>
                                        <option id="pendente" value="pendente">pendente</option>
                                    </select>
                                </div>
                               
                                <div id="hidden_div" style="display: none;">
                                    <label for="atendimento">Pendência:</label>
                                    <input type="text" name="pendencia" id="pendencia" style="width: 100%; padding: 8px 16px; margin: 8px 0; box-sizing: border-box; border: 2px solid red; border-radius: 4px; background-color: transparent; color: white;"><br><br>
                                </div>                                                                                            

                                <div class="form-group">
                                    <input type="submit" value="Enviar" name="SendCadCont" class="btn btn-light">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    window.onload = function() {
        document.getElementById('atendimento').addEventListener('change', function() {
            var style = this.value == 'pendente' ? 'block' : 'none';
            document.getElementById('hidden_div').style.display = style;
        });
    }
</script>