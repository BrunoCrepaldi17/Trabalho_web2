<?php
$conexao = mysqli_connect('127.0.0.1', 'root','','web2');

$sql = "delete from estado where id_estado = ". $_GET['id'];
mysqli_query($conexao, $sql);

mysqli_close($conexao);

echo "registro EXCLUIDO com sucesso";

?>