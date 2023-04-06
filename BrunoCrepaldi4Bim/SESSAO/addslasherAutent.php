colocar ADDSLASHER na autenticação 

if(isset($_POST['entrar'])):

// pegar dados do formulario
$email = addcslashes($_POST['email']);
$senha = addcslashes($_POST['senha']);

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