<?php
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

    function exibir(){
        $sql =  "SELECT 
                    campos,
                    campos
                FROM 
                    nome da tabela
                ORDER BY id DESC ";

        
         return $sql;
    
    }

    function alterar($id,$valor){
        
        $sql = "UPDATE samara
                SET
                campo = '{$valor}',
                campo = '{$valor}'
                WHERE 
                id={$id}";

        db_query($sql);
        
    }

    function deletar($id){
        
        $sql = "DELETE FROM nome da tabela WHERE id={$id}";
        db_query($sql);

    }

?>