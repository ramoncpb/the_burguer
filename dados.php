<?php    
    // abre conexão com o banco
    require_once 'conexao.php';
    
    // recebe os dados do formulário
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

    //   var_dump($_POST);
    //  exit();

    // verifica se já existe um registro na tabela para o código informado (chave duplicada)		
		 $result = $conn->query("SELECT * FROM tb_clientes where cpf_cliente = '$cpfCliente'");

		 $count = $result->rowCount();
		 if ($count > 0) {
		 	$destino = "function () {window.location='./Formularios/cadastrarCliente.php';}";
		 	echo "<script>sendToastr('Código de cliente já cadastrado!<br />Clique para continuar!','error',$destino)</script>";
		 }
     

    if(isset($INSERIR_CLIENTE) && !empty($INSERIR_CLIENTE)){
        try{
            
            $stmt = $conn->prepare("INSERT INTO tb_clientes VALUES(:nome_cliente,:end_cliente,:cep_cliente,:tel_cliente,:cpf_cliente,:tipo_pagamento,:dt_nasc)");
                $stmt->bindValue(':nome_cliente', $nomeCliente);
                $stmt->bindValue(':end_cliente', $endCliente);
                $stmt->bindValue(':cep_cliente', $cepCliente);
                $stmt->bindValue(':tel_cliente', $telCliente);
                $stmt->bindValue(':cpf_cliente', $cpfCliente);
                $stmt->bindValue(':tipo_pagamento', $tpPagamento);
                $stmt->bindValue(':dt_nasc', $dtNasc);
                $stmt->execute();

                echo 'executou a query';
            
        }catch (PDOException $e) {
            // caso ocorra uma exceção, exibe na tela
            echo 'nao executou a query';

            $destino = "function () {window.location='cadastrarCliente.php';}";
            echo "<script>'error',$destino)</script>";
            die();
        }
    } 



    if( isset($ALTERAR)){     
        alterar($id,$valor,$valor);    
    }

    if (isset($DELETAR)) {  
        deletar($id);   
    }

?>
 <script>window.location.href='.index.php'</script>