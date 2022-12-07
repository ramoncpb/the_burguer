<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Burguer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
    <div class='card'>

        <?php 

            include_once 'cabecalho.php';

            try
            {

                // abre conexão com o banco
                require_once 'conexao.php';

                // executa uma instrução SQL de consulta
                $result = $conn->query("SELECT * FROM tb_clientes");
                $count = $result->rowCount();
        ?>


            <div class='card-body'>
                <form>
                    <div class="form-group">
                        <label class='form-label'><h5>Filtro </h5></label>
                        <input type="text" class="form-control" name="cepCliente" id="cepCliente" placeholder="Digite um parametro" />
                    </div>
                </form>

                <h1> Clientes </h1>

        <?php

            if ($count > 0) {
                // percorre os resultados via fetch(), caso tenha pelo menos um registro
                echo "<table>";
                echo "</td>\n";
                echo "<td>\n";
                echo "<b>Nome</b>\n";
                echo "</td>\n";
                echo "<td>\n";
                echo "<b>Endereço</b>\n";
                echo "</td>\n";
                echo "<td>\n";
                echo "<b>CEP</b>\n";
                echo "</td>\n";
                echo "<td>\n";
                echo "<b>Telefone</b>\n";
                echo "</td>\n";
                echo "<td>\n";
                echo "<b>CPF</b>\n";
                echo "</td>\n";
                echo "<td>\n";
                echo "<b>Forma de pagamento</b>\n";
                echo "</td>\n";
                echo "<td>\n";
                echo "<b>Data de nascimento</b>\n";
                echo "</td>\n";
                echo "</tr>\n";
                echo "<tr class='tr_div'><td colspan='8'></td></tr>\n";

                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    // exibe os dados na tela, acessando o objeto retornado
                    echo "</td>\n";
                    echo "<td class='td_l'>\n";
                    echo $row->nomeCliente . "&nbsp;\n";
                    echo "</td>\n";
                    echo "<td class='td_l'>\n";
                    echo $row->endCliente . "&nbsp;\n";
                    echo "</td>\n";
                    echo "<td class='td_l'>\n";
                    echo $row->cepCliente . "&nbsp;\n";
                    echo "</td>\n";
                    echo "<td class='td_l'>\n";
                    echo $row->telCliente . "&nbsp;\n";
                    echo "</td>\n";
                    echo "<td class='td_l'>\n";
                    echo $row->cpfCliente . "&nbsp;\n";
                    echo "</td>\n";
                    echo "<td class='td_l'>\n";
                    echo $row->tpPagamento . "&nbsp;\n";
                    echo "</td>\n";
                    echo "<td class='td_l'>\n";
                    echo $row->dtNasc . "&nbsp;\n";
                    echo "</td>\n";
                    echo "<td>\n";

                    // cria o link para o programa alteracao_clientes.php passando o código do time a ser alterado/excluída 

                    echo "<a href='alteracao_exclusao_clientes.php?cpfCliente=" . $row->cpfCliente . "'>";
                    echo "<img src='img/b_edit.png' border='0' height='20'  width='20'><img src='img/b_drop.png' border='0' height='20'  width='15'></a>&nbsp;\n";
                    echo "</td>\n";
                    echo "</tr>\n";

                }
            } else {
                $destino = "function () {window.location='index.php';}";
                echo "<script>sendToastr('Nenhum time foi encontrado! <br /> Clique para continuar!','error',$destino)</script>";
            }
            echo "</table>";

            // fecha a conexão
            $conn = null;

        } catch (PDOException $e) {
            $destino = "function () {window.location='index.php';}";
            echo "<script>sendToastr($e->getMessage(),'error',$destino)</script>";
            die(); // interrompe o processamento do lado do servidor
        }
        ?>

                
        </div>

        <?php
            include_once 'rodape.php';
        ?>
    </div>
</body>
</html>