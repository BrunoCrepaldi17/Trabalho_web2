<?php


session_cache_expire(15);
// tempo da sessão está 15 minutos(opcional), se não informado o padrão é 180(3hrs)

if(session_status()!== PHP_SESSION_ACTIVE){// verifica se já tem sessão ativa, duas no mesmo navegador não pode
//inicia a sessão
    session_start(require_once("inicio.php"));
}

// atribui valore a sessão
$_SESSION['nome'] = "Bruno Crepaldi";
$_SESSION['cidade'] = "Nova Olímpia";
$_SESSION['estado'] = "PR";

echo "Variaveis de sessão criados com sucesso.";

?>