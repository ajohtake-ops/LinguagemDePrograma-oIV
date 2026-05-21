<?php
    require_once('cabecalho.php');
?>

<h1>Novo Cliente</h1>
    <form method="post">
        <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
              <label for="cpf" class="form-label">CPF</label>
              <input type="number" id="cpf" name="cpf" class="form-control" required="">
        </div>
        <div class="mb-3">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="number" id="telefone" name="telefone" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('conexao.php');
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        try{
          $stmt = $pdo->prepare('INSERT INTO Cliente (nome, cpf, telefone) VALUES (?, ?, ?);');
          if($stmt->execute([$nome, $cpf, $telefone])){
            echo "<p>Cadastro realizado!</p>";
          } else {
            echo "<p>Erro ao cadastrar! Tente novamente</p>";
          }
        } catch(Exception $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    ?>

<?php
    require_once('rodape.php');