<?php
    require_once('Cabecalho.php');
    require_once('Conexao.php');
    try{
        $stmt = $pdo->query('SELECT * FROM Evento');
        $resultado = $stmt->fetchAll();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h2>Eventos</h2>
    <a href="NovoEvento.php" class="btn btn-success mb-3">Novo Registro</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Local</th>
        <th>Cidade</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['nome'] ?></td>
            <td><?= $r['local'] ?></td>
            <td><?= $r['cidade'] ?></td>
            <td class="d-flex gap-2">
            <a href="AlterarEvento.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <a href="ConsultarEvento.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

<?php
    require_once('Rodape.php');