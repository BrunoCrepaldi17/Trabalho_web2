<?php require_once("menu.php");  ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>listar produtos</title>
</head>
<body>
 <?php

 //EXCLUINDO REGISTRO DO BANCO
        $conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
        if (isset($_GET['id'])) {
          $sql = "delete from produtos where id_produto = " . $_GET['id'];
          mysqli_query($conexao, $sql);
          $mensagem = "registro excluido com sucesso.";
        }
$where = '';
        //FILTRANDO REGISTROS DO BANCO
        $filtro = "";
        if (isset($_POST['filtro'])) {
          $filtro = $_POST['filtro'];
        }
        $sql = "select * from produtos";
        if (!empty($filtro)) {
          $where = " where produtos.nome like '%$filtro%'";
          $sql = "select * from produtos where $where";
        }
        $sql = "select * from produtos";
        $resultado = mysqli_query($conexao, $sql);
?>
  <div class="container">
    <?php if (isset($mensagem)): ?>
      <div class="alert alert-success" role="alert"> 
        <?= $mensagem ?>
      </div>
      <?php endif; ?>

    <h1>Listagem de Produtos</h1>
    <a href="ProdutosCadastrar.php" onclick="return confirm('confirme a ação?')">
      <button type="button" class="btn btn-primary">Adicionar Novo</button>
    </a>
    <br>
    <br>
    <form method="POST" class="form-inline mb-4">
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control" name="filtro" placeholder="Filtrar por nome" value="<?= $filtro ?>">
       <br>
      <button type="submit" class="btn btn-dark mb-2">Filtrar</button>
    </div>
  </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">nome</th>
        </tr>
      </thead>
      <tbody>
       <?php
        while ($linha = mysqli_fetch_array($resultado)) {
        ?>
          <th><?= $linha['id_produto'] ?></th>
          <th><?= $linha['nome'] ?></th>
          <th>
          <a href="ProdutosAlterar.php?id=<?= $linha['id_produto'] ?>" onclick="return confirm('confirme alteração?')">
            <button type="button" class="btn btn-warning">Alterar</button>

            <a href="ProdutosListar.php?id=<?= $linha['id_produto'] ?>" onclick="return confirm('confirme exclusão?')">
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
