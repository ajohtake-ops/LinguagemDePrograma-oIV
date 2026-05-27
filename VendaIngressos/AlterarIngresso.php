<?php
    require_once('Cabecalho.php');
    require_once('Conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $evento = $_POST['evento'];
        $cliente = $_POST['cliente'];
        $valor = $_POST['valor'];
        $status = $_POST['status'];
        $data_venda = $_POST['data_venda'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $id = $_GET['id'];
        try{
          $sql = "UPDATE Ingresso SET status = ?, valor = ?, Cliente_id = ?, Evento_id = ?, data_venda = ?, forma_pagamento = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$status, $valor, $cliente, $evento, $data_venda, $forma_pagamento, $id])){
            $mensagem = "<p>Alteração realizada!</p>";
          } else {
            $mensagem = "<p>Erro ao alterar! Tente novamente</p>";
          }
        } catch(Exception $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    try{
        $stmt = $pdo->prepare("SELECT * from Ingresso WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }
    try{
      $stmt_eventos = $pdo->query('SELECT * FROM Evento');
      $eventos = $stmt_eventos->fetchAll();
      
      $stmt_clientes = $pdo->query('SELECT * FROM Cliente');
      $clientes = $stmt_clientes->fetchAll();
    } catch(Exception $e){
      die("Erro: ".$e->getMessage());
    }
?>

<h1>Alterar Ingresso</h1>
    <form method="post" 
        action="AlterarIngresso.php?id=<?= $resultado['id']?>">
        <div class="mb-3">
              <label for="evento" class="form-label">Selecione o Evento</label>
              <select required name="evento" id="evento" class="form-select">
                <?php foreach($eventos as $e): 
                        $selected = ($e['id'] == $resultado['Evento_id']) ? "selected" : "";
                ?>
                  <option value="<?= $e['id'] ?>" <?= $selected ?>><?= $e['nome'] ?></option>
                <?php endforeach; ?>
              </select>
        </div>
        <div class="mb-3">
              <label for="cliente" class="form-label">Selecione o Cliente</label>
              <select required name="cliente" id="cliente" class="form-select">
                <?php foreach($clientes as $c): 
                        $selected = ($c['id'] == $resultado['Cliente_id']) ? "selected" : "";
                ?>
                  <option value="<?= $c['id'] ?>" <?= $selected ?>><?= $c['nome'] ?></option>
                <?php endforeach; ?>
              </select>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input value="<?= $resultado['valor']?>" type="text" id="valor" name="valor" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="Disponível" <?= ($resultado['status'] == "Disponível") ? "selected" : "" ?>>Disponível</option>
                <option value="Vendido" <?= ($resultado['status'] == "Vendido") ? "selected" : "" ?>>Vendido</option>
                <option value="Reservado" <?= ($resultado['status'] == "Reservado") ? "selected" : "" ?>>Reservado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="data_venda" class="form-label">Data da Venda</label>
            <input value="<?= $resultado['data_venda']?>" type="date" id="data_venda" name="data_venda" class="form-control">
        </div>
        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
            <select name="forma_pagamento" id="forma_pagamento" class="form-select">
                <option value="" <?= ($resultado['forma_pagamento'] == "") ? "selected" : "" ?>>Selecione...</option>
                <option value="Dinheiro" <?= ($resultado['forma_pagamento'] == "Dinheiro") ? "selected" : "" ?>>Dinheiro</option>
                <option value="Cartão de Crédito" <?= ($resultado['forma_pagamento'] == "Cartão de Crédito") ? "selected" : "" ?>>Cartão de Crédito</option>
                <option value="Cartão de Débito" <?= ($resultado['forma_pagamento'] == "Cartão de Débito") ? "selected" : "" ?>>Cartão de Débito</option>
                <option value="PIX" <?= ($resultado['forma_pagamento'] == "PIX") ? "selected" : "" ?>>PIX</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      echo $mensagem;
    ?>

<?php
    require_once('Rodape.php');
