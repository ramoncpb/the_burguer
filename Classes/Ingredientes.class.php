<?php

class Ingrediente{

    public $codIngrediente;
    public $nomeIngrediente;
    public $precoIngrediente;

    function __construct($codIngrediente, $nomeIngrediente, $precoIngrediente){
        $this->codigo = $codIngrediente;
        $this->ingrediente = $nomeIngrediente;
        $this->preco = $precoIngrediente;
    }

    function getCodigo() {
        return $this->codigo;
    }
    
    function getIngrediente() {
        return $this->ingrediente;
    }

    function getPreco() {
        return $this->preco;
    }

    function setCodigo($codIngrediente) {
        $this->codigo = $codIngrediente;
    }

    function setIngrediente($nomeIngrediente) {
        $this->ingrediente = $nomeIngrediente;
    }

    function setPreco($precoIngrediente) {
        $this->preco = $precoIngrediente;
    }

    function __toString() {
        return "($this->codigo),($this->ingrediente),($this->preco)";
    }

}