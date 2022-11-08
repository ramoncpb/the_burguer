<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="img/favicon.png"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Burguer</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css" />
    </head>
    <body>

        <?php 
            include_once 'cabecalho.php'; 
        ?>

        <img src='img/banner.jpg' class='banner' width='100' />

        <div class='card-body'>
            <div class="grid">
                <img src='img/01.jpg' alt='imagem ilustrativa' class='img_index'/>

                <img src='img/02.jpg' alt='imagem ilustrativa' class='img_index'/>

                <img src='img/03.png' alt='imagem ilustrativa' class='img_index'/>

                <img src='img/04.jpg' alt='imagem ilustrativa' class='img_index'/>

                <img src='img/05.jpg' alt='imagem ilustrativa' class='img_index'/>

                <img src='img/06.jpg' alt='imagem ilustrativa' class='img_index'/>
            </div>
        </div>

        <?php
            include_once 'rodape.php';
         ?>
    </body>
</html>
