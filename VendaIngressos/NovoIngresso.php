<?php
    require_once('Cabecalho.php');
    require_once('Conexao.php');
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
        <div class="mb-3">
              <label for="data_venda" class="form-label">Data da Venda</label>
              <input type="date" id="data_venda" name="data_venda" class="form-control">
        </div>
        <div class="mb-3">
              <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
              <select name="forma_pagamento" id="forma_pagamento" class="form-select">
                  <option value="">Selecione...</option>
                  <option value="Dinheiro">Dinheiro</option>
                  <option value="Cartão de Crédito">Cartão de Crédito</option>
                  <option value="Cartão de Débito">Cartão de Débito</option>
                  <option value="PIX">PIX</option>
              </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('Conexao.php');
        $evento = $_POST['evento'];
        $cliente = $_POST['cliente'];
        $valor = $_POST['valor'];
        $status = $_POST['status'];
        $data_venda = $_POST['data_venda'];
        $forma_pagamento = $_POST['forma_pagamento'];
        try{
          $stmt = $pdo->prepare('INSERT INTO Ingresso (status, valor, Cliente_id, Evento_id, data_venda, forma_pagamento) VALUES (?, ?, ?, ?, ?, ?);');
          if($stmt->execute([$status, $valor, $cliente, $evento, $data_venda, $forma_pagamento])){
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
    require_once('Rodape.php');
