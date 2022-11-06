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
                include_once './cabecalho.php';
            ?>

            <div class='card-body'>
                <form action='dadosPedido.php' method='POST'>
                    <div class="form-group titulo">
                        <label>Faça seu pedido</label>
                    </div>

                    <div class="form-group">
                        <label class='form-label'>CPF : </label>
                        <input type="text" class="form-control" name="cpfCliente" id="cpfCliente" placeholder="CPF" required />
                    </div>

                    <div class="form-group titulo">
                        <label class='form-label'>Ingredientes : </label>
                    </div>

                    <div class="form-group">
                        <label class='form-label'>Pão</label>
                        <input type="checkbox" class="form-control" name="pao" id="pao" />
                    </div>

                    <div class="form-group">
                        <label class='form-label'>Bife Bovino </label>
                        <input type="checkbox" class="form-control" name="bifebovino" id="bifebovino" />
                    </div>

                    <div class="form-group">
                        <label class='form-label'>Bife Bovino </label>
                        <input type="checkbox" class="form-control" name="bifefrango" id="bifefrango" />
                    </div>

                    <div class="form-group">
                        <label class='form-label'>Bacon </label>
                        <input type="checkbox" class="form-control" name="bacon" id="bacon" />
                    </div>

                    <div class="form-group">
                        <label class='form-label'>Mussarela </label>
                        <input type="checkbox" class="form-control" name="mussarela" id="mussarela" />
                    </div>

                    <div class="form-group">
                        <label class='form-label'>Presunto </label>
                        <input type="checkbox" class="form-control" name="presunto" id="presunto" />
                    </div>

                    <div class="form-group">
                        <label class='form-label'>Ovo </label>
                        <input type="checkbox" class="form-control" name="ovo" id="ovo" />
                    </div>


                    <div class="botoes">
                        <a href="index.php">
                            <button type="button" class="btn btn-primary">
                                <span class="bi bi-reply"></span> 
                                Voltar
                            </button>
                        </a>

                        <button type="submit" name="form_operacao" value="inclusao_pedido" 
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