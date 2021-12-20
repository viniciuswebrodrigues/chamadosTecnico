<?php

require_once '../conexao.php';
	
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);
	
	//Receber os dados do formulário
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
				$ide = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				echo "ide: $ide <br>";
				
				$terminal = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				echo "Terminal: $terminal <br>";
				
				$modelo = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				echo "Modelo: $modelo <br>";

				$ultima_venda = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				echo "Ultima venda: $ultima_venda <br>";

				$sonda = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				echo "Sonda: $sonda <br>";
				
				$periferico = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				echo "Periferico: $periferico <br>";
				
				echo "<hr>";

				//Converter a data e hora para o formato do BD.
				$ultima_venda = explode(" ", $ultima_venda);
				list($date, $hora) = $ultima_venda;
				$data_sem_barra = array_reverse(explode("/", $date));
				$data_sem_barra = implode("-", $data_sem_barra);
				$data_sem_barra = $data_sem_barra . " " . $hora;

				$sonda = explode(" ", $sonda);
				list($date, $hora) = $sonda;
				$data_sem_barra_sonda = array_reverse(explode("/", $date));
				$data_sem_barra_sonda = implode("-", $data_sem_barra_sonda);
				$data_sem_barra_sonda = $data_sem_barra_sonda . " " . $hora;
				

				//Inserir solicitações no BD
				$sql = "INSERT INTO metroatm (ide, terminal, modelo, ultima_venda, sonda, periferico, criado) VALUES (:ide, :terminal, :modelo, :ultima_venda, :sonda, :periferico, DATE_SUB(NOW(), INTERVAL 3 HOUR))";
				$sql = $conexao->prepare($sql);
				$sql->bindParam(':ide', $ide);
				$sql->bindParam(':terminal', $terminal);
				$sql->bindParam(':modelo', $modelo);
				$sql->bindParam(':ultima_venda', $data_sem_barra);
				$sql->bindParam(':sonda', $data_sem_barra_sonda);
				$sql->bindParam(':periferico', $periferico);
				
				if ($sql->execute()){
					$_SESSION['msg'] = "<div class'alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'>&times</button><div class='alert-icon'><i class='icon-info'></i></div><div class='alert-message'><span>Solicitação enviada com sucesso!</span></div>";
					header("location: ../administrativo/abrir_sol.php");
				} else {
					$_SESSION['msg'] = "<div class'alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'>&times</button><div class='alert-icon'><i class='icon-info'></i></div><div class='alert-message'><span>Solicitação enviada com sucesso!</span></div>";
					header("location: ../administrativo/");
				}

			}
			$primeira_linha = false;
		}
	}
?>