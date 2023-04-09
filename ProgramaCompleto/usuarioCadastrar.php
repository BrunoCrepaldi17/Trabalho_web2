<?php
require_once("menu.php");

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');

// conectar no banco de dados
if (isset($_POST['cadastrar'])) {

  $foto = "";
  if (!empty($_FILES['foto']['name'])) {
      $foto = move_uploaded_file($_FILES['foto']['name'], $_FILES['foto']['tmp_name']);
  }

  // Pegar os dados do formulário
  $nome = $_POST['nome'];
  $sexo = $_POST['sexo'];
  $email = $_POST['email'];
  $foto = $_POST['foto'];
  $grupoUsuario_id = $_POST['grupoUsuario_id'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

  if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $foto = $_FILES['foto']['name'];
    $diretorio = 'uploads\\' . $foto;
    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio);
  } else {
    $foto = '';
    $diretorio = '';
  }

  /*Upload da imagem
  $target_dir = "uploads\\ ". $foto;
  $target_file = $target_dir . basename($_FILES["foto"]["name"]);
  move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
  $foto = $target_file;
*/

  // Inserir os dados no banco de dados
  $sql = "INSERT INTO usuario (nome, email, sexo, senha, foto, grupoUsuario_id)
   VALUES ('{$nome}', '{$email}', '{$sexo}','{$senha}', '{$foto}', {$grupoUsuario_id})";
  mysqli_query($conexao, $sql);

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
    <form method="post">
      <div class="form-group">
        <label for="foto">Foto</label>
        <br>
        <input type="file" name="foto" id="foto">
        <br>
        <br>
        <label for="nome">Nome</label>
        <input name="nome" type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome">
        <br>
        <label for="sexo">sexo</label>
        <select name="sexo" id="sexo" class="form-select " aria-label="Default select example">
          <option selected>Selecione o Sexo</option>
          <option value="M">masculino</option>
          <option value="F">feminino</option>
          <option value="O">outros</option>
        </select>
        <br>
        <label for="email">Email</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Seu email">
        <br>
        <label for="grupoUsuario_id">Grupo de Usuario</label>
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
        <div class="form-group">
          <label for="senha">Senha</label>
          <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha">
          <br>
          <button name="cadastrar" type="submit" class="btn btn-primary">Cadastrar</button>
          <a href="listagemUsuarios.php" onclick="return confirm('confirme a ação ?')">
            <button type="button" class="btn btn-warning">Voltar</button>
        </div>
      </div>
    </form>
</body>

</html>