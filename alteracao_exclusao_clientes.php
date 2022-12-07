<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title> The Burguer </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css" />

</head>
<body>
	<?php include_once 'cabecalho.php'; ?>

<div class='card'>
    <?php
        // abre conexão com o banco
        require_once 'conexao.php';

        $cpfCliente = $_GET['cpfCliente'];

        // executa uma instrução SQL de consulta
        $ComandoSQL = ("SELECT * FROM tb_clientes where cpfCliente = '$cpfCliente'");
        $result = $conn->query($ComandoSQL);
        if (!$result) {
            $destino = "function () {window.location='index.php';}";
            echo "<script>sendToastr('Nenhum time foi encontrado! Clique para continuar!','error',$destino)</script>";
        }
        $row = $result->fetch(PDO::FETCH_OBJ)
    ?>

    <div class='card-body'>
        <form method="POST" action="dadosCliente.php" name="form_alteracao_exclusao_clientes">
            <div class="form-group titulo">
                <label>Clientes</label>
            </div>
            <div class="form-group">
                <label>Nome :</label>
                <input type="text" class="form-control" value="<?php echo $row->nomeCliente; 
                 ?>" name="nomeCliente" id="nomeCliente" placeholder="Nome" required />
            </div>

            <div class="form-group">
                <label class='form-label'>Endereço : </label>
                <input type="text" class="form-control" value="<?php echo $row->endCliente; ?>" name="endCliente" id="endCliente" placeholder="Endereço" required />
            </div>

            <div class="form-group">
                <label class='form-label'>CEP : </label>
                <input type="text" class="form-control" value="<?php echo $row->cepCliente; ?>" name="cepCliente" id="cepCliente" placeholder="_____-___" required />
            </div>

            <div class="form-group">
                <label class='form-label'>Telefone : </label>
                <input type="text" class="form-control" value="<?php echo $row->telCliente; ?>" name="telCliente" id="telCliente" placeholder="(__)____-____" required />
            </div>

            <div class="form-group">
                <label class='form-label'>CPF : </label>
                <input type="text" class="form-control" value="<?php echo $row->cpfCliente; ?>" name="cpfCliente" id="cpfCliente" placeholder="CPF" required />
            </div>

            <div class="form-group">
                <label class='form-label'>Informe o seu metodo de pagamento </label>
                <select class="custom-select" name="tpPagamento" id="tpPagamento" title="Selecione" required >
                    <option value="dinheiro" <?php if ($row->tpPagamento=='dinheiro') echo ' selected="selected"'; ?>>Dinheiro</option>
                    <option value="pix" <?php if ($row->tpPagamento=='pix') echo ' selected="selected"'; ?>>Pix</option>
                    <option value="cartao" <?php if ($row->tpPagamento=='cartao') echo ' selected="selected"'; ?>>Cartão</option>
                </select>
            </div>

            <div class="form-group">
                <label class='form-label'>Data de nascimento : </label>
                <input type="date" value="<?php echo $row->dtNasc; ?>" class="form-control" name="dtNasc" id="dtNasc" placeholder="Data de nascimento" required />
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
        </form>
	</div>

    <?php 
        include_once 'rodape.php';
    ?>
</div> 

</body>
</html>