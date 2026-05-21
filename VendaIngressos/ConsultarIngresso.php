<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
        $stmt = 
            $pdo->prepare('SELECT i.*, e.nome as evento_nome, c.nome as cliente_nome 
                           FROM Ingresso i
                           INNER JOIN Evento e ON e.id = i.Evento_id
                           INNER JOIN Cliente c ON c.id = i.Cliente_id
                            WHERE i.id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro! ".$e->getMessage();
    }
?>

<h1>Consultar Ingresso</h1>
    <form method="post" 
        action="consultar_ingresso.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
              <p><strong>Evento:</strong> 
                 <?= $resultado['evento_nome'] ?> 
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Cliente:</strong> 
                 <?= $resultado['cliente_nome'] ?> 
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Valor:</strong> 
                 R$ <?= number_format($resultado['valor'], 2, ',', '.') ?> 
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Status:</strong> 
                 <?= $resultado['status'] ?> 
              </p>
        </div>
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM Ingresso WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    header('Location: ingressos.php');
                } else {
                    echo "Erro ao excluir!";
                }
            } catch(Exception $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    ?>
<?php
    require_once('rodape.php');