<?php
require_once("menu.php");
if (isset($_POST['cadastrar'])) {
    


// conectar no banco de dados
$conexao = mysqli_connect('127.0.0.1','root','', 'web2');

//echo "Conectou...";
// pega dados do formulario
$nome = $_POST['nome'];
// SQL linguagem para manipular banco de dados

$sql = "insert into grupousuario (nome)
                
                values('{$nome}')";

    mysqli_query($conexao, $sql);//executar a instrucao sql no bd

    mysqli_close($conexao);// fecha conexao
    $mensagem = "Inserido com sucesso";
    //echo "Registro inserido com sucesso";
      }
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Usuario</title>

   
</head>
<body>
    <div class = "container">
      <?php

      if(isset($mensagem)):
      echo "
        <div class=\"alert alert-success\" role=\"alert\">
        $mensagem
        </div>";

    endif;
       
      ?>
        <h1>Cadastro de Grupo Usuario</h1>
        
<form method = "post">
  <div class="form-group">
  
  <label for="nome">Nome</label>
<input name = "nome"type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome">
    
  </div>
  <button name="cadastrar" type="submit" class="btn btn-primary">Cadastrar</button> 
  <a href="GrupoUsuariosListar.php" onclick="return confirm('confirme a ação ?')">
            <button type="button" class="btn btn-warning">Voltar</button>
</form>
</body>
</html>