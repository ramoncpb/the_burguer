<?php

    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

    if( isset($INSERIR) && !empty($INSERIR) ){
        
        inserir($valor,$valor);
        
    } 

    if( isset($ALTERAR)){     
        alterar($id,$valor,$valor);    
    }

    if (isset($DELETAR)) {  
        deletar($id);   
    }

?>
 <script>window.location.href='index.php'></script>