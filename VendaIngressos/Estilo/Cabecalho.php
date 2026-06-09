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
  <title>Sistema — Venda de Ingressos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">

    <a class="navbar-brand" href="Principal.php">
      <span class="brand-icon">🎟</span>
      Ingressos<span class="brand-dot">.</span>
    </a>

    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMain"
            aria-controls="navbarMain"
            aria-expanded="false"
            aria-label="Alternar navegação"
            style="border-color:rgba(255,107,0,0.4);filter:invert(1);">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="Principal.php">Início</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"
             id="ddGerenciamento" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Gerenciamento
          </a>
          <ul class="dropdown-menu" aria-labelledby="ddGerenciamento">
            <li><a class="dropdown-item" href="Eventos.php">🎪 Eventos</a></li>
            <li><a class="dropdown-item" href="Ingressos.php">🎟 Ingressos</a></li>
            <li><a class="dropdown-item" href="Clientes.php">👤 Clientes</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"
             id="ddRelatorios" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Relatórios
          </a>
          <ul class="dropdown-menu" aria-labelledby="ddRelatorios">
            <li><a class="dropdown-item" href="RelatorioVendas.php">📊 Relatório de Vendas</a></li>
          </ul>
        </li>

      </ul>

      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <span class="nav-link" style="color:rgba(255,255,255,0.45) !important;font-size:0.82rem;">
            Olá, <strong style="color:rgba(255,255,255,0.8)"><?= htmlspecialchars($_SESSION['nome']) ?></strong>
          </span>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-logout" href="Logout.php">Sair</a>
        </li>
      </ul>
    </div>

  </div>
</nav>

<div class="container py-3">