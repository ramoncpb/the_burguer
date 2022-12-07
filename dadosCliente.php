<?php 

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

    if($_POST['form_operacao'] == 'inclusao_cliente'){
        try{

            // verifica se já existe um registro na tabela para o código informado (chave duplicada)

            $result = $conn->query("SELECT * FROM tb_clientes where cpfCliente = '$cpfCliente'");
            $count = $result->rowCount();
            if ($count > 0) {
                $destino = "function () {window.location='cadastrarCliente.php';}";
                echo "<script>sendToastr('Código de cliente já cadastrado!<br />Clique para continuar!','error',$destino)</script>";
            }

            $stmt = $conn->prepare('INSERT INTO tb_clientes VALUES	(:nomeCliente, :endCliente,
            :cepCliente,:telCliente,:cpfCliente,:tpPagamento,:dtNasc)');

            $stmt->bindValue(':nomeCliente', $nomeCliente);
            $stmt->bindValue(':endCliente', $endCliente);
            $stmt->bindValue(':cepCliente', $cepCliente);
            $stmt->bindValue(':telCliente', $telCliente);
            $stmt->bindValue(':cpfCliente', $cpfCliente);
            $stmt->bindValue(':tpPagamento', $tpPagamento);
            $stmt->bindValue(':dtNasc', $dtNasc);
            $stmt->execute();

           
            // colocar um modal para exibir sucesso e redirecionar 

        }catch (PDOException $e) {
            // caso ocorra uma exceção, exibe na tela

            $destino = "function () {window.location='cadastrarCliente.php';}";
            echo "<script>'error',$destino</script>";
            die();
        }
    }

    // só entrará neste bloco na segunda vez, quando o programa for chamado pelo formulário
    switch ($_POST['form_operacao']) {
        case "alteracao":
            try
            {
                
                $stmt = $conn->prepare("UPDATE tb_clientes SET
                    nomeCliente = :nomeCliente,
                    endCliente = :endCliente,
                    cepCliente = :cepCliente,
                    telCliente = :telCliente,
                    cpfCliente = :cpfCliente,
                    tpPagamento = :tpPagamento,
                    dtNasc = :dtNasc
                    where cpfCliente =  '" . $cpfCliente . "'");
                
                $stmt->bindValue(':nomeCliente', $nomeCliente);
                $stmt->bindValue(':endCliente', $endCliente);
                $stmt->bindValue(':cepCliente', $cepCliente);
                $stmt->bindValue(':telCliente', $telCliente);
                $stmt->bindValue(':cpfCliente', $cpfCliente);
                $stmt->bindValue(':tpPagamento', $tpPagamento);
                $stmt->bindValue(':dtNasc', $dtNasc);
                $stmt->execute();
       
                break;
            } catch (PDOException $e) {
                // caso ocorra uma exceção, exibe na tela
                     
                $destino = "function () {window.location='index.php';}";
                echo "<script>sendToastr($e->getMessage(),'error',$destino)</script>";
                die();
            }
        case "exclusao":
            try
            {
                // recebe os dados do formulário
                $cpfCliente = $_POST['cpfCliente'];
    
                $stmt = $conn->prepare("DELETE from tb_clientes 
                where cpfCliente =  '" . $cpfCliente . "'");
    
                $stmt->bindValue(':cpfCliente', $cpfCliente);
                $stmt->execute();
    
                    break;
    
            } catch (PDOException $e) {
                
                echo "ERRO";
                die();
                
            }
    }
    
?>

<script LANGUAGE="JavaScript">
   window.location.href = "index.php";
</script> 