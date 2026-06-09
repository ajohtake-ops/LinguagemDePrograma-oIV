<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro — Venda de Ingressos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body class="auth-page">

<div class="auth-wrapper">
  <div class="auth-card">

    <div class="auth-logo">
      <div class="auth-logo-icon">🎟</div>
      <h1>Criar conta</h1>
      <p>Venda de Ingressos</p>
    </div>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nome completo</label>
        <input type="text" name="nome" class="form-control" placeholder="Seu nome" required>
      </div>
      <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" placeholder="seu@email.com" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" placeholder="Mínimo 6 caracteres" required>
      </div>
      <button type="submit" class="btn-auth">Criar conta</button>
    </form>

    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('Conexao.php');
        $nome  = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
        try{
          $stmt = $pdo->prepare('INSERT INTO Usuario (nome, email, senha) VALUES (?, ?, ?)');
          if($stmt->execute([$nome, $email, $senha])){
            echo "<div class='auth-alert' style='background:rgba(34,197,94,0.12);border-color:rgba(34,197,94,0.3);color:#86efac;'>
                    ✅ Conta criada! <a href='Index.php' style='color:#4ade80;font-weight:700;'>Faça login</a>
                  </div>";
          } else {
            echo "<div class='auth-alert'>Erro ao cadastrar. Tente novamente.</div>";
          }
        } catch(Exception $e){
          echo "<div class='auth-alert'>Erro: ".$e->getMessage()."</div>";
        }
      }
    ?>

    <div class="auth-footer">
      Já tem conta? <a href="Index.php">Fazer login</a>
    </div>

  </div>
</div>

</body>
</html>