<?php require_once("menu.php");  ?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Usuario</title>
</head>

<body>
  <?php

  //EXCLUINDO REGISTRO DO BANCO
  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
  if (isset($_GET['id'])) {
    $sql = "delete from usuario where id_usuario = " . $_GET['id'];
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

    <h1>Listagem de Usuarios</h1>
    <a href="usuarioCadastrar.php" onclick="return confirm('confirme a ação?')">
      <button type="button" class="btn btn-primary">Adicionar Novo</button>
    </a>
    <br>
    <br>
    <h3>Filtros de usuario</h3>
    <form method="GET">
      <div class="container">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($_GET['nome']) ? $_GET['nome'] : '' ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= isset($_GET['email']) ? $_GET['email'] : '' ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="grupoUsuario">Grupo de Usuário:</label>
            <select class="form-control" id="grupoUsuario" name="grupoUsuario">
              <option value="">Selecione...</option>
              <?php
              $sql = "SELECT * FROM grupousuario";
              $resultado = mysqli_query($conexao, $sql);
              while ($linha = mysqli_fetch_array($resultado)) {
                $selected = isset($_GET['grupoUsuario']) && $_GET['grupoUsuario'] == $linha['id_grupoUsuario'] ? 'selected' : '';
              ?>
                <option value="<?= $linha['id_grupoUsuario'] ?>" <?= $selected ?>><?= $linha['nome'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-dark">Filtrar</button>
      </div>
    </form>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">nome</th>
          <th scope="col">sexo</th>
          <th scope="col">email</th>
          <th scope="col">Grupo Usuario</th>
          <th scope="col">opções</th>
        </tr>
      <tbody>
        <?php
        //LISTANDO CADASTROS DO BANCO
        $conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
        $sql = "SELECT usuario.id_usuario, usuario.nome, usuario.sexo, usuario.email, usuario.grupoUsuario_id, grupousuario.nome AS nome_grupo_usuario FROM usuario 
         INNER JOIN grupousuario ON usuario.grupoUsuario_id = grupousuario.id_grupoUsuario;";
        $resultado = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_array($resultado)) {
        ?>
          <tr>
            <th><?= $linha['id_usuario'] ?></th>
            <th><?= $linha['nome'] ?></th>
            <th><?= $linha['sexo'] ?></th>
            <th><?= $linha['email'] ?></th>
            <th><?= $linha['nome_grupo_usuario'] ?></th>
            <th>
              <a href="usuarioAlterar.php?id=<?= $linha['id_usuario'] ?>" onclick="return confirm('confirme alteração?')">
                <button type="button" class="btn btn-warning">Alterar</button>
              </a>
              <a href="listagemUsuarios.php?id=<?= $linha['id_usuario'] ?>" onclick="return confirm('confirme exclusão?')">
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























