<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
        if (isset($_GET['id'])) {
          $sql = "delete from cliente where id_cliente = " . $_GET['id'];
          mysqli_query($conexao, $sql);
          $mensagem = "registro excluido com sucesso.";
        }

?>
