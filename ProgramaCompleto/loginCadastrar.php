<?php

// conectar no banco de dados
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');

if (isset($_POST['cadastrar'])) {
  // pega dados do formulario
  $nome = $_POST['nome'];
  $sexo = $_POST['sexo'];
  $email = $_POST['email'];
  $grupoUsuario_id = $_POST['grupoUsuario_id'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // criptografa a senha

  // SQL linguagem para manipular banco de dados
  $sql = "INSERT INTO usuario (nome, sexo, email, senha, grupoUsuario_id) 
          VALUES ('{$nome}', '{$sexo}', '{$email}', '{$senha}', {$grupoUsuario_id})";

  mysqli_query($conexao, $sql); // executar a instrucao sql no bd

  mysqli_close($conexao); // fecha conexao
  $mensagem = "Inserido com sucesso";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Usuario</title>
</head>

<body>
  <div class="container">
    <?php
    if (isset($mensagem)) :
      echo "
        <div class=\"alert alert-success\" role=\"alert\">
        $mensagem
        </div>";
    endif;
    ?>
    <h1>Cadastro de Usuario</h1>
    <br>
    <a href="login.php" onclick="return confirm('confirme a ação ?')">
      <button type="button" class="btn btn-dark">Voltar</button>
    </a>
    <br>
    <br>
    <form method="post">
      <div class="form-group">
        <label for="nome">Nome</label>
        <br>
        <input name="nome" type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome">
        <br>
        <label for="sexo">sexo</label>
        <br>
        <select name="sexo" id="sexo" class="form-select " aria-label="Default select example">
          <option selected>Selecione o Sexo</option>
          <option value="M">masculino</option>
          <option value="F">feminino</option>
          <option value="O">outros</option>
        </select>
        <br>
        <br>
        <label for="email">Email</label>
        <br>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Seu email">
        <br>
        <label for="grupoUsuario_id">Grupo de Usuario</label>
        <br>
        <select class="form-select" name="grupoUsuario_id" id="grupoUsuario_id" aria-label="Default select example">
          <option selected>Selecione o grupo de usuario</option>
          <?php
          $sql = "select * from grupousuario order by nome";
          $resultado = mysqli_query($conexao, $sql);
          while ($linha = mysqli_fetch_array($resultado)) {
            $id_grupoUsuario = $linha['id_grupoUsuario'];
            $nome = $linha['nome'];
            $selecionado = ($id_grupoUsuario == $grupoUsuario_id) ? 'selected' : '';
            echo "<option {$selecionado} value='{$id_grupoUsuario}'>{$nome}</option>";
          }
          ?>
        </select>
        <br>
        <br>
        <div class="form-group">
          <label for="senha">Senha</label>
          <br>
          <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha">
          <br>
          <button name="cadastrar" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</body>

</html>