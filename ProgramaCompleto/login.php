<?php

session_set_cookie_params(900); // 15 minutos
session_start();

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');

if (isset($_SESSION['nome']) && isset($_SESSION['email'])) {
  header("location: inicio.php");
  exit;
}

if (isset($_SESSION['last_access']) && time() - $_SESSION['last_access'] > 900) {
  session_destroy();
  header("location: login.php");
  exit;
}

if (isset($_POST['entrar'])) {
  // Verificar no bd se existe o usuário
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Verifica se a senha está criptografada
  $sql = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
  $resultado = mysqli_query($conexao, $sql);
  $numLinhas = mysqli_num_rows($resultado);

  if ($numLinhas == 0) {
    // Verifica se a senha está sem criptografia
    $sql = "SELECT senha FROM usuario WHERE email = '{$email}'";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    $senhaArmazenada = $linha['senha'];

    if (password_verify($senha, $senhaArmazenada)) {
      $sql = "SELECT * FROM usuario WHERE email = '{$email}'";
      $resultado = mysqli_query($conexao, $sql);
      $linha = mysqli_fetch_array($resultado);

      $_SESSION['nome'] = $linha['nome'];
      $_SESSION['email'] = $linha['email'];
      $_SESSION['last_access'] = time();

      header("location: inicio.php");
      exit;
    }
  } else {
    $linha = mysqli_fetch_array($resultado);

    $_SESSION['nome'] = $linha['nome'];
    $_SESSION['email'] = $linha['email'];
    $_SESSION['last_access'] = time();

    header("location: inicio.php");
    exit;
  }

  $mensagem = "Usuário e senha inválidos";
  header("location: login.php?mensagem={$mensagem}");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Tela de Login no Sistema</title>
</head>

<body>

</body>

<div class="container">

  <h1>Tela de Login no Sistema</h1>

  <!-- Login Form -->
  <form method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Seu email">
      </label>
      <br>
      <label for="senha">Senha</label>
      <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha">
      </label>
      <br>
      <button name="entrar" type="submit" class="btn btn-primary">Entrar</button>
      <a href="loginCadastrar.php" onclick="return confirm('Quer criar um usuario para acessar o sistema ?')">
        <button type="button" class="btn btn-dark">Cadastrar</button>
    </div>
  </form>
</div>
</form>
</div>

</html>