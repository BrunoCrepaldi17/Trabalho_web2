<?php
 require_once("menu.php"); 
$conexao = mysqli_connect('127.0.0.1','root','', 'web2');



if (isset($_POST['cadastrar'])) {
  
// conectar no banco de dados

//echo "Conectou...";
// pega dados do formulario
$nome = $_POST['nome'];
$sigla = $_POST['sigla'];
$medida = $_POST['medida'];
$categoriaproduto_id = $_POST['categoriaproduto_id'];


// SQL linguagem para manipular banco de dados

$sql = "insert into produtos (nome, sigla, medida, categoriaproduto_id)
                
                values('{$nome}','{$sigla}','{$medida}', {$categoriaproduto_id})";

    mysqli_query($conexao, $sql);//executar a instrucao sql no bd

    mysqli_close($conexao);// fecha conexao
    $mensagem = "Inserido com sucesso";
    //echo "Registro inserido com sucesso";
      }
   ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>cadastro de produtos</title>

   
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
        <h1>Cadastro de Produtos</h1>
        
<form method = "post">
  <div class="form-group">
  
  <label for="nome">Nome</label>
<input name = "nome"type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome">
<br>
<label for="sigla">Sigla</label>
<input name = "sigla"type="sigla" class="form-control" id="sigla" aria-describedby="email" placeholder="Sua sigla">
<br>
 <div class="input-group">
  <input name = "medida" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
  <span class="input-group-text">$</span>
  <span class="input-group-text">0.00</span>
</div>
<br> 

<label for="categoriaproduto_id">Categoria do Produto</label>
        <select class="form-select" name="categoriaproduto_id" id="categoriaproduto_id" aria-label="Default select example">
          <option selected>Selecione a Categoria</option>
          <?php 
          $sql = "select * from categoriaproduto order by nome";
          $resultado = mysqli_query($conexao, $sql);
          while ($linha = mysqli_fetch_array($resultado)) {
            $id_categoriaproduto = $linha['id_categoriaproduto'];
            $nome = $linha['nome'];
            $selecionado = ($id_categoriaproduto == $categoriaproduto_id) ? 'selected' : '';
            echo "<option {$selecionado} value='{$id_categoriaproduto}'>{$nome}</option>";
          }
          ?>
        </select>

</div>
  <button name="cadastrar" type="submit" class="btn btn-primary">Cadastrar</button> 
  <a href="ProdutosListar.php" onclick="return confirm('confirme a ação ?')">
            <button type="button" class="btn btn-warning">Voltar</button>
</form>
</body>
</html>