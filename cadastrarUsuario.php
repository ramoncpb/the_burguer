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
            ?>

            <div class='card-body'>
                <form action='dadosCliente.php' method='POST'>
                    <input type="hidden" id="id" name="id" />

                    <div class="form-group titulo">
                        <label>Cadastro de Usuarios</label>
                    </div>
                    <div class="form-group">
                        <label>Login :</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Login" required />
                    </div>

                    <div class="form-group">
                        <label class='form-label'>Senha : </label>
                        <input type="text" class="form-control" name="senha" id="senha" placeholder="Senha" required />
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
                    </div>

                </form>
            </div>

            <?php
                include_once 'rodape.php';
            ?>
        </div>
    </body>
</html>
