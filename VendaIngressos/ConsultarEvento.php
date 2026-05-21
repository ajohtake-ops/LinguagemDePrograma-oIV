<?php
    require_once('Cabecalho.php');
    require_once('Conexao.php');
    try{
        $stmt = 
            $pdo->prepare('SELECT * FROM Evento WHERE id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro! ".$e->getMessage();
    }
?>

<h1>Consultar Evento</h1>
    <form method="post" 
        action="ConsultarEvento.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
              <p><strong>Nome:</strong> 
                 <?= $resultado['nome'] ?> 
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Local:</strong> 
                 <?= $resultado['local'] ?> 
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Cidade/Estado:</strong> 
                 <?= $resultado['cidade'] ?>/<?= $resultado['estado'] ?> 
              </p>
        </div>
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM Evento WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    header('Location: Eventos.php');
                } else {
                    echo "Erro ao excluir!";
                }
            } catch(Exception $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    ?>
<?php
    require_once('Rodape.php');