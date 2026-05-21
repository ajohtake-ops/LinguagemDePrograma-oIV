<?php
    session_start();
    if (!isset($_SESSION['acesso']) || $_SESSION['acesso'] == false){
        header('Location: Index.php');
        exit();
    }
?>

<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Venda de Ingressos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">      
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Principal.php">Início</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gerenciamento
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown2">
                <li><a class="dropdown-item" href="Eventos.php">Eventos</a></li>
                <li><a class="dropdown-item" href="Ingressos.php">Ingressos</a></li>
                <li><a class="dropdown-item" href="Clientes.php">Clientes</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Relatórios
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown3">
                <li><a class="dropdown-item" href="#">Relatório de Vendas</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Logout.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container py-3">