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
    <body>

        <?php 
            include_once 'cabecalho.php'; 
        ?>

        <div class='card-body'>
            <form action='dados.php' method='POST'>
                <div class="form-group">
                    <label>Nome :</label>
                    <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" placeholder="Nome" required />
                </div>
                <div class="form-group">
                    <label class='form-label'>CPF : </label>
                    <input type="text" class="form-control" name="cpfCliente" id="cpfCliente" placeholder="CPF" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>Data de nascimento : </label>
                    <input type="date" class="form-control" name="dtNasc" id="dtNasc" placeholder="Data de nascimento" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>Telefone : </label>
                    <input type="text" class="form-control" name="telCliente" id="telCliente" placeholder="(__)____-____" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>Endereço : </label>
                    <input type="text" class="form-control" name="endCliente" id="endCliente" placeholder="Endereço" required />
                </div>

                <div class="form-group">
                    <label class='form-label'>CEP : </label>
                    <input type="text" class="form-control" name="cepCliente" id="cepCliente" placeholder="_____-___" required />
                </div>

                <div class="input-group">
                    <label class='form-label'>Informe o seu metodo de pagamento </label>
                    <select class="custom-select" name="tpPagamento" id="tpPagamento" title="Selecione" required >
                        <option value="dinheiro">Dinheiro</option>
                        <option value="pix">Pix</option>
                        <option value="cartao">Cartão</option>
                    </select>
                </div>

                <div class="botoes">
                    <a href="index.php">
                        <button type="button" class="btn btn-primary">
                            <span class="bi bi-reply"></span> 
                            Voltar
                         </button>
                    </a>

                    <button type="submit" name='INSERIR_CLIENTE' 
                    class="btn btn-primary float-right" value='INSERIR_CLIENTE'>
                        <span class="bi bi-check-lg"> Cadastrar</span>
                    </button>
                </div>
            </form>
        </div>

        <?php
            include_once 'rodape.php';
         ?>
    </body>
</html>
