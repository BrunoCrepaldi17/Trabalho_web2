<?php require_once("menu.php");
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
$sql = "SELECT cliente.id_cliente, cliente.nome, cliente.cpf, cliente.email, cliente.telefone, cliente.endereco, cliente.numero,
cliente.cidade, cliente.status, cliente.estado_id, estado.nome 
AS nome_estado FROM cliente 
 INNER JOIN estado ON cliente.estado_id = estado.id_estado;";
$resultado = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($resultado);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>clientes</title>
</head>

<body>
  <?php

  //EXCLUINDO REGISTRO DO BANCO
  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
  if (isset($_GET['id'])) {
    $sql = "delete from cliente where id_cliente = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "registro excluido com sucesso.";
  }
  ?>
  <div class="container">
    <?php if (isset($mensagem)) : ?>
      <div class="alert alert-success" role="alert">
        <?= $mensagem ?>
      </div>
    <?php endif; ?>

    <h1>Listagem de Clientes</h1>
    <a href="ClienteCadastrar.php" onclick="return confirm('confirme a ação?')">
      <button type="button" class="btn btn-primary">Adicionar Novo</button>
    </a>
    <br>
    <div class="container"><p class="card-text"><?= $qtd ?> Registros encontrados.</p></div> 
   <br>
    <!DOCTYPE html>
    <html lang="pt">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </head>

    <body>
      <?php
      //Conexão com o banco de dados
      $conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');

      //Filtro
      $filtro_nome = isset($_POST['filtro_nome']) ? $_POST['filtro_nome'] : '';
      $filtro_cpf_cnpj = isset($_POST['filtro_cpf_cnpj']) ? $_POST['filtro_cpf_cnpj'] : '';
      $filtro_estado = isset($_POST['filtro_estado']) ? $_POST['filtro_estado'] : '';

      //Construção da consulta SQL com base no filtro
      $sql = "SELECT * FROM cliente WHERE 1=1";
      if (!empty($filtro_nome)) {
        $sql .= " AND nome LIKE '%" . $filtro_nome . "%'";
      }
      if (!empty($filtro_cpf_cnpj)) {
        $sql .= " AND cpf LIKE '%" . $filtro_cpf_cnpj . "%' OR cnpj LIKE '%" . $filtro_cpf_cnpj . "%'";
      }
      if (!empty($filtro_estado)) {
        $sql .= " AND estado = '" . $filtro_estado . "'";
      }

      //Execução da consulta
      $resultado = mysqli_query($conexao, $sql);

      //Exibição da tabela de listagem
      ?>
      <div class="container">
        <form method="POST" action="">
          <div class="form-row">
            <div class="col-md-4">
              <label for="filtro_nome">Nome:</label>
              <input type="text" class="form-control" id="filtro_nome" name="filtro_nome" value="<?= $filtro_nome ?>">
            </div>
            <div class="col-md-4">
              <label for="filtro_cpf_cnpj">CPF/CNPJ:</label>
              <input type="text" class="form-control" id="filtro_cpf_cnpj" name="filtro_cpf_cnpj" value="<?= $filtro_cpf_cnpj ?>">
            </div>
            <div class="col-md-4">
              <label for="filtro_estado">Estado:</label>
              <select class="form-select" name="filtro_estado" id="estado_id" value="<?= $filtro_estado ?>">
                <option selected>Selecione o Estado</option>
                <?php
                $sql = "select * from estado order by nome";
                $resultado = mysqli_query($conexao, $sql);
                while ($linha = mysqli_fetch_array($resultado)) {
                  $id_estado = $linha['id_estado'];
                  $nome = $linha['nome'];
                  $selecionado = ($id_estado == $estado_id) ? 'selected' : '';
                  echo "<option {$selecionado} value='{$id_estado}'>{$nome}</option>";
                }
                ?>
              </select>

            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-dark mb-2">Filtrar</button>
          <br>
          <br>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">CPF/CNPJ</th>
                <th scope="col">email</th>
                <th scope="col">telefone</th>
                <th scope="col">endereco</th>
                <th scope="col">numero</th>
                <th scope="col">cidade</th>
                <th scope="col">estado</th>
                <th scope="col">status</th>
                <th scope="col">opções</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
              $sql = "SELECT cliente.id_cliente, cliente.nome, cliente.cpf, cliente.email, cliente.telefone, cliente.endereco, cliente.numero,
          cliente.cidade, cliente.status, cliente.estado_id, estado.nome 
              AS nome_estado FROM cliente 
               INNER JOIN estado ON cliente.estado_id = estado.id_estado;";
              $resultado = mysqli_query($conexao, $sql);
        $qtd = mysqli_num_rows($resultado);
              while ($linha = mysqli_fetch_array($resultado)) {
              ?>

                <th><?= $linha['id_cliente'] ?></th>
                <th><?= $linha['nome'] ?></th>
                <th><?= $linha['cpf'] ?></th>
                <th><?= $linha['email'] ?></th>
                <th><?= $linha['telefone'] ?></th>
                <th><?= $linha['endereco'] ?></th>
                <th><?= $linha['numero'] ?></th>
                <th><?= $linha['cidade'] ?></th>
                <th><?= $linha['nome_estado'] ?></th>
                <th><?= $linha['status'] ?></th>
                <th>
                  <a href="ClienteAlterar.php?id=<?= $linha['id_cliente'] ?>" onclick="return confirm('confirme alteração?')">
                    <button type="button" class="btn btn-warning">Alterar</button>

                    <a href="ClienteListar.php?id= <?= $linha['id_cliente'] ?>" onclick="return confirm('confirme exclusão?')">
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