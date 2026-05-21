<?php
    require_once('Cabecalho.php');
    require_once('Conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $id = $_GET['id'];
        try{
          $sql = "UPDATE Cliente SET nome = ?, cpf = ?, telefone = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$nome, $cpf, $telefone, $id])){
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
            $pdo->prepare("SELECT * from Cliente WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Alterar Cliente</h1>
    <form method="post" 
        action="AlterarCliente.php?id=<?= $resultado['id']?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input value="<?= $resultado['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input value="<?= $resultado['cpf']?>" type="number" id="cpf" name="cpf" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input value="<?= $resultado['telefone']?>" type="number" id="telefone" name="telefone" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      echo $mensagem;
    ?>

<?php
    require_once('Rodape.php');