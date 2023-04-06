<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="">B.C</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav mr-auto">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastros
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="usuarioCadastrar.php">Usuário</a></li>
            <li><a class="dropdown-item" href="grupoUsuarioCadastrar.php">Grupo Usuario</a></li>
            <li><a class="dropdown-item" href="produtosCadastrar.php">Produto</a></li>
            <li><a class="dropdown-item" href="clienteCadastrar.php">Cliente</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Listagens
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="listagemUsuarios.php">Usuários</a></li>
            <li><a class="dropdown-item" href="GrupoUsuariosListar.php">Grupo Usuarios</a></li>
            <li><a class="dropdown-item" href="produtosListar">Produtos</a></li>
            <li><a class="dropdown-item" href="clientesListar">Clientes</a></li>
            <li><hr class="dropdown-divider">
          </li>
</ul>
<li>
  <div class="collapse navbar-collapse" id="navbarText">
        <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="pesquise aqui" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Pesquisar</button>
    </form>
 </li>     
</div>
</nav>
</body>
</html>