<?php
    require_once('Cabecalho.php');
    require_once('Conexao.php');

    $data_inicial = isset($_POST['data_inicial']) ? $_POST['data_inicial'] : '';
    $data_final = isset($_POST['data_final']) ? $_POST['data_final'] : '';
    $resultados = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($data_inicial) && !empty($data_final)) {
        try {
            // Filtra pelo campo data_venda do ingresso
            $sql = "SELECT i.data_venda, c.nome as cliente_nome, i.status, i.forma_pagamento 
                    FROM Ingresso i
                    INNER JOIN Cliente c ON c.id = i.Cliente_id
                    WHERE i.data_venda BETWEEN ? AND ?
                    ORDER BY i.data_venda ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$data_inicial, $data_final]);
            $resultados = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
?>

<h1>Relatório de Vendas por Período</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label for="data_inicial" class="form-label">Data Inicial</label>
                <input type="date" name="data_inicial" id="data_inicial" class="form-control" value="<?= $data_inicial ?>" required>
            </div>
            <div class="col-md-4">
                <label for="data_final" class="form-label">Data Final</label>
                <input type="date" name="data_final" id="data_final" class="form-control" value="<?= $data_final ?>" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Gerar Relatório</button>
            </div>
        </form>
    </div>
</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <?php if (count($resultados) > 0): ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Data da Venda</th>
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Forma de Pagamento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?= date('d/m/Y', strtotime($row['data_venda'])) ?></td>
                        <td><?= htmlspecialchars($row['cliente_nome']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                        <td><?= htmlspecialchars($row['forma_pagamento'] ?: 'Não informada') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Nenhuma venda encontrada para o período selecionado.</div>
    <?php endif; ?>
<?php endif; ?>

<?php
    require_once('Rodape.php');
