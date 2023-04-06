SESSÃO EXCLUIR

<?php

if(session_status()!== PHP_SESSION_ACTIVE){// verifica se já tem sessão ativa, duas no mesmo navegador não pode
    //inicia a sessão
        session_start();
    }

// apaga a sessão nome
//tira a memoria da variável nome
    unset($_SESSION['nome']);
// apaga todos os dados da sessão
session_unset();

// destrói a sessão
session_destroy();

?>

sessão excluída com sucesso
