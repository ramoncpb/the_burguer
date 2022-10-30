<?php
    include_once './Classes/Cliente.class.php';
    include_once './Classes/Ingredientes.class.php';
    include_once './Classes/Pedido.class.php';

    $clienteTeste = new Cliente('1','2','3','4','5','6','7','8');
    $ingredienteTeste = new Ingrediente('1','2','3');
    $pedidoTeste = new Pedido('1','2','3');

    var_dump($clienteTeste,$ingredienteTeste,$pedidoTeste);
?>