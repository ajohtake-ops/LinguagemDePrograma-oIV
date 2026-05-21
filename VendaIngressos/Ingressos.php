<?php
    require_once('Cabecalho.php');
    require_once('Conexao.php');
    try{
        $stmt = $pdo->query('SELECT i.*, e.nome as evento_nome, c.nome as cliente_nome 
                             FROM Ingresso i
                             INNER JOIN Evento e ON e.id = i.Evento_id
                             INNER JOIN Cliente c ON c.id = i.Cliente_id');
        $resultado = $stmt->fetchAll();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h2>Ingressos</h2>
    <a href="NovoIngresso.php" class="btn btn-success mb-3">Novo Registro</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Evento</th>
        <th>Cliente</th>
        <th>Valor</th>
        <th>Status</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['evento_nome'] ?></td>
            <td><?= $r['cliente_nome'] ?></td>
            <td>R$ <?= number_format($r['valor'], 2, ',', '.') ?></td>
            <td><?= $r['status'] ?></td>
            <td class="d-flex gap-2">
            <a href="AlterarIngresso.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <a href="ConsultarIngresso.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

<?php
    require_once('Rodape.php');