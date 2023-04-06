<?php

if(session_status()!== PHP_SESSION_ACTIVE){// verifica se já tem sessão ativa, duas no mesmo navegador não pode
    //inicia a sessão
        session_start();
    }
    echo "<b> Dados de sessão</b><br>";
    echo "ID da sessão: ". session_id()   . "<br>";
    echo "Nome: " . $_SESSION['nome']     . "<br>";
    echo "Cidade: " . $_SESSION['cidade'] . "<br>";
    echo "Estado: " . $_SESSION['estado'] . "<br>";

 // mostra os dados por print_r
    print_r($_SESSION);

