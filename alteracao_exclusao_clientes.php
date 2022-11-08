<?php
header("Content-Type: text/html; charset=utf-8", true);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title> The Burguer </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css" />

</head>
<body>
	<?php include_once 'cabecalho.php';


    // abre conexão com o banco
    require_once 'conexao.php';

$cpfCliente = $_GET['cpf_cliente'];

// só entrará neste bloco na segunda vez, quando o programa for chamado pelo formulário
switch ($_POST['form_operacao']) {
    case "alteracao":
        try
        {
            echo 'entrou no try';
            // recebe os dados do formulário

			$nomeCliente = $_POST['nomeCliente'];
            $endCliente = $_POST['endCliente'];
            $cepCliente = $_POST['cepCliente'];
            $telCliente = $_POST['telCliente'];
            $cpfCliente = $_POST['cpfCliente'];
            $tpPagamento = $_POST['tpPagamento'];
            $dtNasc = $_POST['dtNasc'];
            echo 'pegou os dados';
            var_dump($_POST);
	
            $stmt = $conn->prepare('UPDATE tb_clientes SET
                NULL = :cod_cliente,
                nomeCliente = :nome_cliente,
                endCliente = :end_cliente,
                cepCliente = :cep_cliente,
                telCliente = :tel_cliente,
                cpfCliente = :cpf_cliente,
                tpPagamento = :tipo_pagamento,
                dtNasc = :dt_nasc
                    WHERE cpfCliente  = :cpf_cliente ');
			
            $stmt->bindValue(':cod_cliente', NULL);
			$stmt->bindValue(':nome_cliente', $nomeCliente);
            $stmt->bindValue(':end_cliente', $endCliente);
            $stmt->bindValue(':cep_cliente', $cepCliente);
            $stmt->bindValue(':tel_cliente', $telCliente);
            $stmt->bindValue(':cpf_cliente', $cpfCliente);
            $stmt->bindValue(':tipo_pagamento', $tpPagamento);
            $stmt->bindValue(':dt_nasc', $dtNasc);
			$stmt->execute();

                echo 'executou a query';
   
			$destino = "function () {window.location='viewCliente.php';}";
            echo "<script>sendToastr('Time alterado com sucesso! Clique para continuar!','success',$destino)</script>";
            break;
        } catch (PDOException $e) {
            // caso ocorra uma exceção, exibe na tela
            echo 'executou a query';
            
			$destino = "function () {window.location='index.php';}";
			echo "<script>sendToastr($e->getMessage(),'error',$destino)</script>";
		    die();
        }
    case "exclusao":
        try
        {
            // recebe os dados do formulário
            $cpfCliente = $_POST['cpfCliente'];

            $stmt = $conn->prepare('DELETE from tb_clientes 
            WHERE cpfCliente  = :cpf_cliente ');

            $stmt->bindValue(':cpf_cliente', $cpfCliente);
            $stmt->execute();

            echo "executou a query";

			$destino = "function () {window.location='viewCliente.php';}";
            echo "<script>sendToastr('Time excluído com sucesso! Clique para seguir!','success',$destino)</script>";
	            break;

        } catch (PDOException $e) {

            // caso ocorra uma exceção, exibe na tela
			$destino = "function () {window.location='index.php';}";
			echo "<script>sendToastr($e->getMessage(),'error',$destino)</script>";
            die();

        }
}


// executa uma instrução SQL de consulta 
$ComandoSQL = "select * from tb_clientes where cpf_cliente =  '" . $cpfCliente . "'";
$result = $conn->query($ComandoSQL);

if (!$result) {
	$destino = "function () {window.location='index.php';}";
    echo "<script>sendToastr('Nenhum cliente foi encontrado! Clique para continuar!','error',$destino)</script>";
}

$row = $result->fetch(PDO::FETCH_OBJ);

?>


<script LANGUAGE="JavaScript">
// função que define qual operação será realizada, alteração ou exclusão. Ela depende do botão que o usuário pressionar  
	function define_operacao(operacao){
		if (operacao == "alt") {
		document.form_alteracao_exclusao_clientes.form_operacao.value = "alteracao";
		}
		if (operacao == "exc") {
		document.form_alteracao_exclusao_clientes.form_operacao.value = "exclusao";
		}
		document.form_alteracao_exclusao_clientes.submit();
	}
</script>  

<div class='card'>
    <?php
        include_once './cabecalho.php'; 
    ?>

    <div class='card-body'>
        <form method="POST" action="alteracao_exclusao_clientes.php" name="form_alteracao_exclusao_clientes">
            <div class="form-group titulo">
                <label>Clientes</label>
            </div>
            <div class="form-group">
                <label>Nome :</label>
                <input type="text" class="form-control" value="<?php echo $row->nome_cliente; 
                 ?>" name="nomeCliente" id="nomeCliente" placeholder="Nome" required />
            </div>

            <div class="form-group">
                <label class='form-label'>Endereço : </label>
                <input type="text" class="form-control" value="<?php echo $row->end_cliente; ?>" name="endCliente" id="endCliente" placeholder="Endereço" required />
            </div>

            <div class="form-group">
                <label class='form-label'>CEP : </label>
                <input type="text" class="form-control" value="<?php echo $row->cep_cliente; ?>" name="cepCliente" id="cepCliente" placeholder="_____-___" required />
            </div>

            <div class="form-group">
                <label class='form-label'>Telefone : </label>
                <input type="text" class="form-control" value="<?php echo $row->tel_cliente; ?>" name="telCliente" id="telCliente" placeholder="(__)____-____" required />
            </div>

            <div class="form-group">
                <label class='form-label'>CPF : </label>
                <input type="text" class="form-control" value="<?php echo $row->cpf_cliente; ?>" name="cpfCliente" id="cpfCliente" placeholder="CPF" required />
            </div>

            <div class="form-group">
                <label class='form-label'>Informe o seu metodo de pagamento </label>
                <select class="custom-select" name="tpPagamento" id="tpPagamento" title="Selecione" required >
                    <option value="dinheiro" <?php if ($row->tipo_pagamento=='dinheiro') echo ' selected="selected"'; ?>>Dinheiro</option>
                    <option value="pix" <?php if ($row->tipo_pagamento=='pix') echo ' selected="selected"'; ?>>Pix</option>
                    <option value="cartao" <?php if ($row->tipo_pagamento=='cartao') echo ' selected="selected"'; ?>>Cartão</option>
                </select>
            </div>

            <div class="form-group">
                <label class='form-label'>Data de nascimento : </label>
                <input type="date" value="<?php echo $row->dt_nasc; ?>" class="form-control" name="dtNasc" id="dtNasc" placeholder="Data de nascimento" required />
            </div>

            <div class="botoes">
                <input type="hidden" name="form_operacao" value="consulta">
                <a href="viewCliente.php">
                    <button type="button" class="btn btn-primary">
                        <span class="bi bi-reply"></span> 
                        Voltar
                    </button>
                </a>
                <button name="alterar" type="button" value="Alterar" onClick="define_operacao('alt');"
                class="btn btn-primary float-right ml-2">
                    <span class="bi bi-check-lg"></span> 
                        Alterar 
                </button>
                <button name="excluir" type="button" value="Excluir" onClick="define_operacao('exc');"
                class="btn btn-primary float-right">
                    <span class="bi bi-trash"></span> 
                        Excluir 
                </button>
            </div>
        </form>
	</div>

    <?php 
        include_once 'rodape.php';
    ?>
</div> 

</body>
</html>