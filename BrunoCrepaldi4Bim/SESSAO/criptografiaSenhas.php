OBS: 
1- no banco de dados mudar o campo senha para 255.

2- colar na autenticação este codigo:
 $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

3- depois de colocado a criptografia os usuário não criptografados não entram mais, excluir todos do banco.

4-  código autenticação atualizado:
<?
// verifico no banco se o usuario existe
$sql = "select * from usuario
where email = '{$email}'";

//conexao ...
//resultado...

$numLinhas = mysqli_num_rows($resultado);

$usuario = mysqli_fetch_array($resultado);

if (($numLinhas == 1)&&(password_verify ($senha,$usuario['senha']))) {
   // Não precisa mais // $linha = mysqli_fetch_array($resultado);

// gravo os dados em seção
      session_start();
$_SESSION['id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];
$_SESSION['email'] = $usuario['email'];
 header("location: principal.php");
}else{
     // redirecione para o login
     header("location: loginSessao.php");

}
?>