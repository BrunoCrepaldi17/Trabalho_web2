<?php require_once("menu.php"); ?>
<?php

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'web2');
//o usuario não pode ser aberto na url, deve ser chamado do listagemUsuarios.php

if (isset($_POST['alterar'])) {
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $grupoUsuario_id = $_POST['grupoUsuario_id'];

    $sql = "update usuario set nome = '{$nome}', sexo = '{$sexo}', email ='{$email}', grupoUsuario_id = {$grupoUsuario_id}
where id_usuario = " . $_POST['id'];
    $resultado = mysqli_query($conexao, $sql);
    $mensagem = "registro salvo com sucesso.";
}

//buscando usuario pelo id
$sql = "select * from usuario where id_usuario = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);


$usuario = mysqli_fetch_array($resultado);

//print $sql;
?>


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
    <div class="container">
        <h1>Alterar Cadastro de Usuario</h1>

        <form method="post">
            <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="nome" class="form-control" id="nome" aria-describedby="email" placeholder="Seu nome" required value="<?= $usuario['nome'] ?>">

                <label for="sexo">sexo</label>
                <select name="sexo" id="sexo" class="form-select" aria-label="Default select example" placeholder="Seu nome" required value="<?= $sexo['sexo'] ?>">>
                    <option selected>Selecione o Sexo</option>
                    <option value="M">masculino</option>
                    <option value="F">feminino</option>
                    <option value="O">outros</option>
                </select>

                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Seu email" required value="<?= $usuario['email'] ?>">
            </div>

            <label for="grupousuario">Grupo de Usuario</label>
            <select class="form-select" name="grupoUsuario_id" id="grupoUsuario_id" aria-label="Default select example" placeholder="Seu nome" required value="<?= $grupoUsuario_id['grupoUsuario_id'] ?>">
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
                mysqli_close($conexao);
                ?>
            </select>
            <br>
            <a href="listagemUsuarios.php" onclick="return confirm('confirme a ação ?')"></a>
                <button type="button" class="btn btn-warning">Voltar</button>
                
            <button name="alterar" type="submit" class="btn btn-primary">alterar</button>
        </form>
</body>

</html>