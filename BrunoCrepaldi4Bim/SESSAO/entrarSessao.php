<!DOCTYPE html>
<html lang="pt">
      <h2> seja bem vindo, </h2>
    <?php 
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
       echo $_SESSION['nome'] ;
    }
    ?>
    </div>
</div>
</body>
</html>