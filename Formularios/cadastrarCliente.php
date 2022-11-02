<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Burguer</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body class='card'>

        <?php 
            include_once '../cabecalho.php'; 
        ?>

        <?php    
            // recebe os dados do formulário]

            $nomeCliente = $_POST['nomeCliente'];
            $endCliente = $_POST['endCliente'];
            $cepCliente = $_POST['cepCliente'];
            $telCliente = $_POST['telCliente'];
            $cpfCliente = $_POST['cpfCliente'];
            $tpPagamento = $_POST['tpPagamento'];
            $dtNasc = $_POST['dtNasc'];


            // verifica se já existe um registro na tabela para o código informado (chave duplicada)		
                // $result = $conn->query("SELECT * FROM tb_clientes where cpf_cliente = '$cpfCliente'");

                // $count = $result->rowCount();
                // if ($count > 0) {
                //     $destino = "function () {window.location='./Formularios/cadastrarCliente.php';}";
                //     echo "<script>sendToastr('Código de cliente já cadastrado!<br />Clique para continuar!','error',$destino)</script>";
                // }
            

            if(isset($INSERIR_CLIENTE) && !empty($INSERIR_CLIENTE)){
                try{
                    // abre conexão com o banco
                    require_once '../conexao.php';
                    
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
        
                    $stmt = $conn->prepare('INSERT INTO tb_clientes VALUES	(:nome_cliente,:end_cliente,:cep_cliente,:tel_cliente,:cpf_cliente,:tipo_pagamento,:dt_nasc)');
                    $stmt->bindValue(':nome_cliente', $nomeCliente);
                    $stmt->bindValue(':end_cliente', $endCliente);
                    $stmt->bindValue(':cep_cliente', $cepCliente);
                    $stmt->bindValue(':tel_cliente', $telCliente);
                    $stmt->bindValue(':cpf_cliente', $cpfCliente);
                    $stmt->bindValue(':tipo_pagamento', $tpPagamento);
                    $stmt->bindValue(':dt_nasc', $dt_nasc);
                    // $sql = "INSERT INTO tb_clientes (nome_cliente,end_cliente,cep_cliente,tel_cliente,cpf_cliente,tipo_pagamento,dt_nasc)VALUES ('$nomeCliente','$endCliente','$cepCliente','$telCliente','$cpfCliente','$if(isset($INSERIR_CLIENTE) && !empty($INSERIR_CLIENTE)){tpPagamento','$dtNasc')";
        
                    // $stmt = $conn->prepare($sql);
                        
                    $stmt->execute();
                    
                }catch (PDOException $e) {
                    // caso ocorra uma exceção, exibe na tela
                
        
                    $destino = "function () {window.location='cadastrarCliente.php';}";
                    echo "<script>'error',$destino)</script>";
                    die();
                }
            } 



            // if( isset($ALTERAR)){     
            //     alterar($id,$valor,$valor);    
            // }

            // if (isset($DELETAR)) {  
            //     deletar($id);   
            // }

        ?>

        <div class='card-body'>
            <form action='cadastrarCliente.php' method='POST'>
            <div class="form-group">
                    <label>Identificador :</label>
                    <input type="text" class="form-control" name="id_cliente" id="id_cliente" placeholder="Id" required />
                </div>

                <div class="form-group">
                    <label>Nome :</label>
                    <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" placeholder="Nome" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>Endereço : </label>
                    <input type="text" class="form-control" name="endCliente" id="endCliente" placeholder="Endereço" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>CEP : </label>
                    <input type="text" class="form-control" name="cepCliente" id="cepCliente" placeholder="_____-___" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>Telefone : </label>
                    <input type="text" class="form-control" name="telCliente" id="telCliente" placeholder="(__)____-____" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>CPF : </label>
                    <input type="text" class="form-control" name="cpfCliente" id="cpfCliente" placeholder="CPF" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>Informe o seu metodo de pagamento </label>
                    <select class="custom-select" name="tpPagamento" id="tpPagamento" title="Selecione" required >
                        <option value="dinheiro">Dinheiro</option>
                        <option value="pix">Pix</option>
                        <option value="cartao">Cartão</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class='form-label'>Data de nascimento : </label>
                    <input type="date" class="form-control" name="dtNasc" id="dtNasc" placeholder="Data de nascimento" required />
                </div>

                <div class="botoes">
                    <a href="index.php">
                        <button type="button" class="btn btn-primary">
                            <span class="bi bi-reply"></span> 
                            Voltar
                         </button>
                    </a>

                    <button type="submit" name="form_operacao" value="inclusao_cliente" 
                    class="btn btn-primary float-right">
                        <span class="bi bi-check-lg"> Cadastrar</span>
                    </button>

            </form>
        </div>

        <?php
            include_once '../rodape.php';
         ?>
    </body>
</html>
