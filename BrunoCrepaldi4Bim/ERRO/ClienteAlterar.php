<?php
require_once("menu.php");
//o usuario não pode ser aberto na url, deve ser chamado do listagemUsuarios.php

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
if (isset($_POST['alterar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $status = $_POST['status'];

    $sql = "update cliente set nome = '{$nome}', cpf = '{$cpf}', email ='{$email}, telefone = '{$telefone}', endereco = '{$endereco}', numero = '{$numero}', cidade = '{$cidade}', estado = '{$estado}', status = '{$status}'
where id_cliente = " . $_POST['id'];
    $resultado = mysqli_query($conexao, $sql);
    $mensagem = "registro salvo com sucesso.";
}

//buscando usuario pelo id
$sql = "select * from cliente where id_cliente = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
mysqli_close($conexao);

$cliente = mysqli_fetch_array($resultado);
//print $sql;
/*
$erro = " digite apenas S ou N";
       if($cliente ['status'] !== "S" or "N"):
          return null ;
          echo "
            <div class=\"alert alert-success\" role=\"alert\">
           
            $erro;
            </div>";
          endif;*/
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>alterar cadastro de cliente</title>
</head>
<body>
    <div class="container">
        <h1>Alterar Cadastro de Cliente</h1>

        <form method="post">
            <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome" required value="<?= $cliente['nome'] ?>">

                <label for="cpf">CPF/CNPJ</label>
                <input name="cpf" type="cpf" class="form-control" id="cpf" aria-describedby="email" placeholder="Seu cpf" required value="<?= $cliente['cpf'] ?>">
                
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Seu email" required value="<?= $cliente['email'] ?>">
            
                <label for="telefone">Telefone</label>
                <input name="telefone" type="telefone" class="form-control" id="telefone" aria-describedby="email" placeholder="Seu telefone" required value="<?= $cliente['telefone'] ?>">

                <label for="endereco">Endereco</label>
                <input name="endereco" type="endereco" class="form-control" id="endereco" aria-describedby="email" placeholder="Seu endereco" required value="<?= $cliente['endereco'] ?>">

                <label for="numero">Numero</label>
                <input name="numero" type="numero" class="form-control" id="numero" aria-describedby="email" placeholder="Seu numero" required value="<?= $cliente['numero'] ?>">
            
                <label for="cidade">Cidade</label>
                <input name="cidade" type="cidade" class="form-control" id="cidade" aria-describedby="email" placeholder="Seu cidade" required value="<?= $cliente['cidade'] ?>">
            
                <label for="estado">Estado</label>
                <input name="estado" type="estado" class="form-control" id="estado" aria-describedby="email" placeholder="Seu estado" required value="<?= $cliente['estado'] ?>">

                <label for="status">Status</label>
                <input name="status" type="status" class="form-control" id="status" aria-describedby="email" placeholder="Seu status" required value="<?= $cliente['status'] ?>">
            </div>
            <a href="ClienteListar.php" onclick="return confirm('confirme a ação ?')">
            <button type="button" class="btn btn-warning">Voltar</button>
            <button name="alterar" type="submit" class="btn btn-primary">alterar</button>
        </form>
</body>
</html>