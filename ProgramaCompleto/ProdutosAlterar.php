<?php
require_once("menu.php");
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
//o usuario não pode ser aberto na url, deve ser chamado do listagemUsuarios.php



if (isset($_POST['alterar'])) {
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $medida = $_POST['medida'];
    $categoriaproduto_id = $_POST['categoriaproduto_id'];


    $sql = "update produtos set nome = '{$nome}', sigla ='{$sigla}' , medida = '{$medida}', categoriaproduto_id = {$categoriaproduto_id}
where id_produto = " . $_POST['id'];
    $resultado = mysqli_query($conexao, $sql);
    $mensagem = "registro salvo com sucesso.";
}

//buscando usuario pelo id
$sql = "select * from produtos where id_produto = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);


$produto = mysqli_fetch_array($resultado);
//print $sql;
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Alterar Produto</title>


</head>

<body>
    <div class="container">
        <h1>Alterar Cadastro de Produto</h1>

        <form method="post">
            <input type="hidden" name="id" value="<?= $produto['id_produto'] ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome" required value="<?= $produto['nome'] ?>">
                <br>
                <label for="sigla">Sigla</label>
                <input name="sigla" type="sigla" class="form-control" id="sigla" aria-describedby="email" placeholder="Sua sigla" required value="<?= $produto['sigla'] ?>">
                <br>
                <div class="input-group">
                    <input name="medida" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" required value="<?= $produto['medida'] ?>">
                    <span class="input-group-text">$</span>
                    <span class="input-group-text">0.00</span>
                </div>
                    <br>
                    <br>
                    <label for="categoriaproduto_id">Categoria do Produto</label>
                    <select class="form-select" name="categoriaproduto_id" id="categoriaproduto_id" aria-label="Default select example" required value="<?= $produto['categoriaproduto_id'] ?>">
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
            <a href="ProdutosListar.php" onclick="return confirm('confirme a ação ?')">
                <button type="button" class="btn btn-warning">Voltar</button>
                <button name="alterar" type="submit" class="btn btn-primary">alterar</button>
        </form>
</body>

</html>