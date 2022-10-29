<?php

class Cliente{

    public $codCliente;
    public $nomeCliente;
    public $cpfCliente;
    public $dtNasc;
    public $telCliente;
    public $endCliente;
    public $cepCliente;
    public $tpPagamento;

    function __construct($codCliente, $nomeCliente, $cpfCliente, $dtNasc, $telCliente, $endCliente, $cepCliente, $tpPagamento){
        $this->codigo = $codCliente;
        $this->nome = $nomeCliente;
        $this->cpf = $cpfCliente;
        $this->nascimento = $dtNasc;
        $this->telefone = $telCliente;
        $this->endereco = $endCliente;
        $this->cep = $cepCliente;
        $this->pagamento = $tpPagamento;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getCPF() {
        return $this->cpf;
    }

    function getNascimento() {
        return $this->nascimento;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCEP() {
        return $this->cep;
    }

    function getPagamento() {
        return $this->pagamento;
    }

    function setCodigo($codCliente) {
        $this->codigo = $codCliente;
    }

    function setNome($nomeCliente) {
        $this->nome = $nomeCliente;
    }

    function setCPF($cpfCliente) {
        $this->cpf = $cpfCliente;
    }

    function setNascimento($dtNasc) {
        $this->nascimento = $dtNasc;
    }

    function setTelefone($telCliente) {
        $this->telefone = $telCliente;
    }

    function setEndereco($endCliente) {
        $this->endereco = $endCliente;
    }

    function setCEP($cepCliente) {
        $this->cep = $cepCliente;
    }

    function setPagamento($tpPagamento) {
        $this->pagamento = $tpPagamento;
    }

    function __toString() {
        return "($this->codigo),($this->nome),($this->cpf),($this->nascimento),($this->telefone),($this->endereco),($this->cep),($this->pagamento)";
    }
}
?>