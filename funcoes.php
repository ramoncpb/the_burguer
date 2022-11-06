<?php

    include_once './dadosCliente.php';
    include_once './dadosPedido.php';

    // function inserir($nome,$email){          

    //     $sql = "INSERT INTO 
    //                 nome_tabela 
    //                 (campos,campos) 
    //             VALUES 
    //                 ('$valores',
    //                 '$valores',
    //                 )";    

    //     db_query($sql);
    // }

    // function exibir(){
    //     $sql =  "SELECT 
    //                 campos,
    //                 campos
    //             FROM 
    //                 nome da tabela
    //             ORDER BY id DESC ";

        
    //      return $sql;
    
    // }

    // function alterar($idCliente,$valor){
        
    //     $sql = "UPDATE samara
    //             SET
    //             campo = '{$valor}',
    //             campo = '{$valor}'
    //             WHERE 
    //             id={$idCliente}";

    //     db_query($sql);
        
    // }

    // function deletar($idCliente){
        
    //     $sql = "DELETE FROM nome da tabela WHERE id={$idCliente}";
    //     db_query($sql);

    // }

    //pega os valores dos cliente no banco 

    function pegarClientes(){

        $sql =  "SELECT 
                    *
                FROM 
                    tb_clientes
                WHERE 
                    cod_cliente = $idCliente
                ORDER BY ";

        
         return $sql; 
    }

?>