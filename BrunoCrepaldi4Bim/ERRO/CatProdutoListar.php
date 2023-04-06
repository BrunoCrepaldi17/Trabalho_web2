<?php require_once("menu.php");  ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Grupo Usuario</title>
</head>
<body>
 <?php

 //EXCLUINDO REGISTRO DO BANCO
        $conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
        if (isset($_GET['id'])) {
          $sql = "delete from categoriaproduto where id_categoriaproduto = " . $_GET['id'];
          mysqli_query($conexao, $sql);
          $mensagem = "registro excluido com sucesso.";
        }
?>
  <div class="container">
    <?php if (isset($mensagem)): ?>
      <div class="alert alert-success" role="alert"> 
        <?= $mensagem ?>
      </div>
      <?php endif; ?>

    <h1>Listagem de Categoria de Produtos</h1>
    <a href="CatProdutoCadastrar.php" onclick="return confirm('confirme a ação?')">
      <button type="button" class="btn btn-primary">Adicionar Novo</button>
    </a>
   <br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">nome</th>
        </tr>
      </thead>
      <tbody>
       <?php
       //LISTANDO CADASTROS DO BANCO
        $conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
        $sql = "select * from categoriaproduto";
        $resultado = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_array($resultado)) {
        ?>
          <th><?= $linha['id_categoriaproduto'] ?></th>
          <th><?= $linha['nome'] ?></th>
          <th>
          <a href="CatProdutoAlterar.php?id=<?= $linha['id_categoriaproduto'] ?>" onclick="return confirm('confirme alteração?')">
            <button type="button" class="btn btn-warning">Alterar</button>

            <a href="CatProdutoListar.php?id= <?= $linha['id_categoriaproduto'] ?>" onclick="return confirm('confirme exclusão?')">
              <button type="button" class="btn btn-danger">Excluir</button>
              
              </a>
          </th>     
          </tr>  
        <?php     
        }
        ?>
      </tbody>
    </table>
</body>
</html>