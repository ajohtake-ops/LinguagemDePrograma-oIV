<?php
    require_once('cabecalho.php');
?>

<h1>Novo Evento</h1>
    <form method="post">
        <div class="mb-3">
              <label for="nome" class="form-label">Nome do Evento</label>
              <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
              <label for="local" class="form-label">Local</label>
              <input type="text" id="local" name="local" class="form-control">
        </div>
        <div class="mb-3">
              <label for="cidade" class="form-label">Cidade</label>
              <input type="text" id="cidade" name="cidade" class="form-control">
        </div>
        <div class="mb-3">
              <label for="estado" class="form-label">Estado</label>
              <input type="text" id="estado" name="estado" class="form-control">
        </div>
        <div class="mb-3">
              <label for="data_inicio" class="form-label">Data de Início</label>
              <input type="datetime-local" id="data_inicio" name="data_inicio" class="form-control">
        </div>
        <div class="mb-3">
              <label for="data_termino" class="form-label">Data de Término</label>
              <input type="datetime-local" id="data_termino" name="data_termino" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('conexao.php');
        $nome = $_POST['nome'];
        $local = $_POST['local'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $data_inicio = $_POST['data_inicio'];
        $data_termino = $_POST['data_termino'];
        try{
          $stmt = $pdo->prepare('INSERT INTO Evento (nome, local, cidade, estado, data_inicio, data_termino) VALUES (?, ?, ?, ?, ?, ?);');
          if($stmt->execute([$nome, $local, $cidade, $estado, $data_inicio, $data_termino])){
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