<?php
    require_once('Cabecalho.php');
    require_once('Conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $local = $_POST['local'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $data_inicio = $_POST['data_inicio'];
        $data_termino = $_POST['data_termino'];
        $id = $_GET['id'];
        try{
          $sql = "UPDATE Evento SET nome = ?, local = ?, cidade = ?, estado = ?, data_inicio = ?, data_termino = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$nome, $local, $cidade, $estado, $data_inicio, $data_termino, $id])){
            $mensagem = "<p>Alteração realizada!</p>";
          } else {
            $mensagem = "<p>Erro ao alterar! Tente novamente</p>";
          }
        } catch(Exception $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    try{
        $stmt = 
            $pdo->prepare("SELECT * from Evento WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Alterar Evento</h1>
    <form method="post" 
        action="AlterarEvento.php?id=<?= $resultado['id']?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Evento</label>
            <input value="<?= $resultado['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Local</label>
            <input value="<?= $resultado['local']?>" type="text" id="local" name="local" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input value="<?= $resultado['cidade']?>" type="text" id="cidade" name="cidade" class="form-control">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input value="<?= $resultado['estado']?>" type="text" id="estado" name="estado" class="form-control">
        </div>
        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input value="<?= date('Y-m-d\TH:i', strtotime($resultado['data_inicio']))?>" type="datetime-local" id="data_inicio" name="data_inicio" class="form-control">
        </div>
        <div class="mb-3">
            <label for="data_termino" class="form-label">Data de Término</label>
            <input value="<?= date('Y-m-d\TH:i', strtotime($resultado['data_termino']))?>" type="datetime-local" id="data_termino" name="data_termino" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      echo $mensagem;
    ?>

<?php
    require_once('Rodape.php');