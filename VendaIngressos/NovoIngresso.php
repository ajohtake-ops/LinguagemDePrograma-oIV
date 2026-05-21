<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
      $stmt_eventos = $pdo->query("SELECT * FROM Evento");
      $eventos = $stmt_eventos->fetchAll();
      
      $stmt_clientes = $pdo->query("SELECT * FROM Cliente");
      $clientes = $stmt_clientes->fetchAll();
    } catch(Exception $e){
      die("Erro: ". $e->getMessage());
    }
?>

<h1>Novo Ingresso</h1>
    <form method="post">
        <div class="mb-3">
              <label for="evento" class="form-label">Selecione o Evento</label>
              <select required name="evento" id="evento" class="form-select">
                <?php foreach($eventos as $e): ?>
                  <option value="<?= $e['id'] ?>"><?= $e['nome'] ?></option>
                <?php endforeach; ?>
              </select>
        </div>
        <div class="mb-3">
              <label for="cliente" class="form-label">Selecione o Cliente</label>
              <select required name="cliente" id="cliente" class="form-select">
                <?php foreach($clientes as $c): ?>
                  <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
                <?php endforeach; ?>
              </select>
        </div>
        <div class="mb-3">
              <label for="valor" class="form-label">Valor</label>
              <input type="text" id="valor" name="valor" class="form-control" required="">
        </div>
        <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select">
                  <option value="Disponível">Disponível</option>
                  <option value="Vendido">Vendido</option>
                  <option value="Reservado">Reservado</option>
              </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('conexao.php');
        $evento = $_POST['evento'];
        $cliente = $_POST['cliente'];
        $valor = $_POST['valor'];
        $status = $_POST['status'];
        try{
          $stmt = $pdo->prepare('INSERT INTO Ingresso (status, valor, Cliente_id, Evento_id) VALUES (?, ?, ?, ?);');
          if($stmt->execute([$status, $valor, $cliente, $evento])){
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