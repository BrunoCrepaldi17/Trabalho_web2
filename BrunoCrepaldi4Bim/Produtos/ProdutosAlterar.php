<?php
 require_once("menu.php"); 
//o usuario não pode ser aberto na url, deve ser chamado do listagemUsuarios.php

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
if(isset($_POST['alterar'])){
    $nome = $_POST['nome'];

$sql = "update produtos set nome = '{$nome}'
where id_produto = " . $_POST['id'];
$resultado = mysqli_query($conexao, $sql);
$mensagem = "registro salvo com sucesso.";
}

//buscando usuario pelo id
$sql = "select * from produtos where id_produto = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
mysqli_close($conexao);

$produto = mysqli_fetch_array($resultado);
//print $sql;
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Alterar Produto</title>


</head>

<body>
    <div class="container">
        <h1>Alterar Cadastro de Produto</h1>

        <form method="post">
            <input type="hidden" name="id" value="<?= $produto['id_produto'] ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome" required value="<?= $produto['nome'] ?>">

            <a href="ProdutosListar.php" onclick="return confirm('confirme a ação ?')">
            <button type="button" class="btn btn-warning">Voltar</button>
            <button name="alterar" type="submit" class="btn btn-primary">alterar</button>
        </form>
</body>

</html>