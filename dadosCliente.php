<?php 

    if($_POST['form_operacao'] == 'inclusao_cliente'){
        try{
            
            // abre conexão com o banco
            require_once 'conexao.php';
            
            // recebe os dados do formulário
    
            $nomeCliente = $_POST['nomeCliente'];
            $endCliente = $_POST['endCliente'];
            $cepCliente = $_POST['cepCliente'];
            $telCliente = $_POST['telCliente'];
            $cpfCliente = $_POST['cpfCliente'];
            $tpPagamento = $_POST['tpPagamento'];
            $dtNasc = $_POST['dtNasc'];

            // verifica se já existe um registro na tabela para o código informado (chave duplicada)

            $result = $conn->query("SELECT * FROM tb_clientes where cpf_cliente = '$cpfCliente'");
            //echo ("SELECT * FROM tb_clientes where cpf_cliente = '$cpfCliente'");
            $count = $result->rowCount();
            if ($count > 0) {
                $destino = "function () {window.location='cadastrarCliente.php';}";
                echo "<script>sendToastr('Código de cliente já cadastrado!<br />Clique para continuar!','error',$destino)</script>";
            }

            $stmt = $conn->prepare('INSERT INTO tb_clientes VALUES	(:cod_cliente,:nome_cliente,:end_cliente,
            :cep_cliente,:tel_cliente,:cpf_cliente,:tipo_pagamento,:dt_nasc)');
            $stmt->bindValue(':cod_cliente', NULL);
            $stmt->bindValue(':nome_cliente', $nomeCliente);
            $stmt->bindValue(':end_cliente', $endCliente);
            $stmt->bindValue(':cep_cliente', $cepCliente);
            $stmt->bindValue(':tel_cliente', $telCliente);
            $stmt->bindValue(':cpf_cliente', $cpfCliente);
            $stmt->bindValue(':tipo_pagamento', $tpPagamento);
            $stmt->bindValue(':dt_nasc', $dtNasc);

            $stmt->execute();

        }catch (PDOException $e) {
            // caso ocorra uma exceção, exibe na tela

            $destino = "function () {window.location='cadastrarCliente.php';}";
            echo "<script>'error',$destino</script>";
            die();
        }
    } 

    // if( isset($ALTERAR)){     
    //     alterar($idCliente,$valor,$valor);    
    // }

    // if (isset($DELETAR)) {  
    //     deletar($idCliente);   
    // }



?>