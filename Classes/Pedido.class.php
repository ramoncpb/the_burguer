<?php

class Pedido{

    public $codPedido;
    public $ingredientePedido;
    public $valorPedido;

    function __construct($codPedido, $ingredientePedido, $valorPedido){
        $this->codigo = $codPedido;
        $this->ingrediente = $ingredientePedido;
        $this->valor = $valorPedido;
    }

    function getCodigo() {
        return $this->codigo;
    }
    
    function getIngrediente() {
        return $this->ingrediente;
    }

    function getValor() {
        return $this->valor;
    }

    function setCodigo($codPedido) {
        $this->codigo = $codPedido;
    }

    function setIngrediente($ingredientePedido) {
        $this->ingrediente = $ingredientePedido;
    }

    function setValor($valorPedido) {
        $this->codigo = $valorPedido;
    }

    function __toString() {
        return "($this->codigo),($this->ingrediente),($this->valor)";
    }

    function inserir($nome,$email){          

        $sql = "INSERT INTO 
                    nome_tabela 
                    (campos,campos) 
                VALUES 
                    ('$valores',
                    '$valores',
                    )";    

        db_query($sql);
    }
}