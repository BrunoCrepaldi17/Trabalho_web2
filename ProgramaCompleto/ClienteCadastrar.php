<?php
require_once("menu.php");
$conexao = mysqli_connect('127.0.0.1','root','', 'web2');

if (isset($_POST['cadastrar'])) {
    


// conectar no banco de dados


//echo "Conectou...";
// pega dados do formulario
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$cidade = $_POST['cidade'];
$estado_id = $_POST['estado_id'];
$status = $_POST['status'];

// SQL linguagem para manipular banco de dados

$sql = "insert into cliente (nome, cpf, email, telefone, endereco, numero, cidade, estado_id, status)
                
  values('{$nome}','{$cpf}','{$email}','{$telefone}','{$endereco}','{$numero}','{$cidade}','{$estado_id}','{$status}')";


         
    mysqli_query($conexao, $sql);//executar a instrucao sql no bd

    mysqli_close($conexao);// fecha conexao
    $mensagem = "Inserido com sucesso";
    //$erro = "digite S para ativo e N para inativo";
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
    <title>Cadastro de Clientes</title>

   
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
        /*
  if (str_contains(($status), 'S' or 'N')) {
}
else {
  $status = null;
 echo "<div class=\"alert alert-success\" role=\"alert\">
        $erro
        </div>";
} */
      ?> 
 

        <h1>Cadastro de Clientes</h1>
        
<form method = "post">
  <div class="form-group">
  
  <label for="nome">Nome</label>
<input name = "nome"type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome">
<h1></h1>
<label for="cpf">CPF/CNPJ</label>
    <input name = "cpf"type="cpf" class="form-control" id="email" aria-describedby="cpf/cnpj" placeholder="Seu cpf/cnpj">
    <h1></h1>
    <label for="email">Email</label>
    <input name = "email"type="email" class="form-control" id="email" aria-describedby="email" placeholder="Seu email">
    <h1></h1>
    <label for="Telefone">telefone</label>
    <input name = "telefone"type="telefone" class="form-control" id="telefone" aria-describedby="telefone" placeholder="Seu Telefone">
    <h1></h1>
    <label for="endereco">Endereco</label>
    <input name = "endereco"type="endereco" class="form-control" id="endereco" aria-describedby="endereco" placeholder="Seu Endereco">
    <h1></h1>
    <label for="numero">Numero</label>
    <input name = "numero"type="numero" class="form-control" id="numero" aria-describedby="numero" placeholder="Seu Numero">
    <h1></h1>
    <label for="cidade">Cidade</label>
    <input name = "cidade"type="cidade" class="form-control" id="cidade" aria-describedby="cidade" placeholder="Sua Cidade">
    <h1></h1>
    <label for="estado_id">Estado</label>
        <select class="form-select" name="estado_id" id="estado_id" aria-label="Default select example">
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


    <label for="Status">Status</label>
    <select name = "status" id="status"class="form-select" aria-label="Default select example">
  <option selected>Selecione S para Ativo e N para Inativo</option>
  <option value="S">Ativo</option>
  <option value="N">inativo</option>
</select>
    <br>
    <br>
  <button name="cadastrar" type="submit" class="btn btn-primary">Cadastrar</button> 
  <a href="ClienteListar.php" onclick="return confirm('confirme a ação ?')">
<button type="button" class="btn btn-warning">Voltar</button>
</form>
</body>
</html>