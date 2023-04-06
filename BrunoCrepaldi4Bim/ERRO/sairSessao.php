sair da sessão
<?php
 if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}


session_unset();
session_destroy();




//pagina de login
header("location:index.php");

?>