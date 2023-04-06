<?php
$conexao = mysqli_connect('127.0.0.1', 'root','','web2');

$sql = "delete from grupousuario where id_grupoUsuario = ". $_GET['id'];
mysqli_query($conexao, $sql);

mysqli_close($conexao);

echo "registro EXCLUIDO com sucesso";

?>