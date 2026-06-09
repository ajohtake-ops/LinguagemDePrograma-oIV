<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Entrar — Venda de Ingressos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body class="auth-page">

<div class="auth-wrapper">
  <div class="auth-card">

    <div class="auth-logo">
      <div class="auth-logo-icon">🎟</div>
      <h1>Venda de Ingressos</h1>
      <p>Sistema de Gestão</p>
    </div>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input name="email" type="email" class="form-control" placeholder="seu@email.com" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input name="senha" type="password" class="form-control" placeholder="••••••••" required>
      </div>
      <button type="submit" class="btn-auth">Entrar</button>
    </form>

    <?php
      require_once('Conexao.php');
      session_start();
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        try{
          $stmt = $pdo->prepare("SELECT * FROM Usuario WHERE email = ?");
          $stmt->execute([$email]);
          $usuario = $stmt->fetch();
          $senha_correta = password_verify($senha, $usuario['senha']);
          if($usuario && $senha_correta){
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['acesso'] = true;
            header('Location: Principal.php');
          } else {
            echo "<div class='auth-alert'>⚠️ E-mail ou senha incorretos. Tente novamente.</div>";
          }
        } catch(Exception $e){
          echo "<div class='auth-alert'>Erro: ". $e->getMessage() ."</div>";
        }
      }
    ?>

    <div class="auth-footer">
      Não tem conta? <a href="Cadastro.php">Cadastre-se gratuitamente</a>
    </div>

  </div>
</div>

</body>
</html>