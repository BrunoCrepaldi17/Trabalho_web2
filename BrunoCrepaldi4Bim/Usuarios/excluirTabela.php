<?php
$conexao = mysqli_connect('127.0.0.1', 'root','','ifpr_web2');

$sql = "delete from usuario where id = {$id}";
mysqli_query($conexao, $sql);

mysqli_close($conexao);

echo "registro EXCLUIDO com sucesso";

?>