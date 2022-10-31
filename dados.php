<?php    
    // abre conexão com o banco
    require_once 'conexao.php';
    
    // recebe os dados do formulário]

    $nomeCliente = $_POST['nomeCliente'];
    $endCliente = $_POST['endCliente'];
    $cepCliente = $_POST['cepCliente'];
    $telCliente = $_POST['telCliente'];
    $cpfCliente = $_POST['cpfCliente'];
    $tpPagamento = $_POST['tpPagamento'];
    $dtNasc = $_POST['dtNasc'];

    //  var_dump($_POST);
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
            $sql = "INSERT INTO tb_clientes (nome_cliente,end_cliente,cep_cliente,tel_cliente,cpf_cliente,tipo_pagamento,dt_nasc)VALUES ('$nomeCliente','$endCliente','$cepCliente','$telCliente','$cpfCliente','$tpPagamento','$dtNasc')";

            $stmt = $conn->prepare($sql);
                
            $stmt->execute();
            
        }catch (PDOException $e) {
            // caso ocorra uma exceção, exibe na tela
        

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
 <script>window.location.href='index.php'</script>