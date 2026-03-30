<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3 - Cadastro de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Cadastro de Produtos</h1>
        <form method="post">

            <!-- Produto 1 -->
            <div class="mb-3 border-bottom pb-3">
                <label for="produto1" class="form-label">1º Produto:</label>
                <input type="text" id="produto1" name="produto[]" class="form-control" required>
                <label for="preco1" class="form-label mt-2">Preço do 1º produto:</label>
                <input type="number" id="preco1" name="preco[]" step="0.01" class="form-control" required>
            </div>

            <!-- Produto 2 -->
            <div class="mb-3 border-bottom pb-3">
                <label for="produto2" class="form-label">2º Produto:</label>
                <input type="text" id="produto2" name="produto[]" class="form-control" required>
                <label for="preco2" class="form-label mt-2">Preço do 2º produto:</label>
                <input type="number" id="preco2" name="preco[]" step="0.01" class="form-control" required>
            </div>

            <!-- Produto 3 -->
            <div class="mb-3 border-bottom pb-3">
                <label for="produto3" class="form-label">3º Produto:</label>
                <input type="text" id="produto3" name="produto[]" class="form-control" required>
                <label for="preco3" class="form-label mt-2">Preço do 3º produto:</label>
                <input type="number" id="preco3" name="preco[]" step="0.01" class="form-control" required>
            </div>

            <!-- Produto 4 -->
            <div class="mb-3 border-bottom pb-3">
                <label for="produto4" class="form-label">4º Produto:</label>
                <input type="text" id="produto4" name="produto[]" class="form-control" required>
                <label for="preco4" class="form-label mt-2">Preço do 4º produto:</label>
                <input type="number" id="preco4" name="preco[]" step="0.01" class="form-control" required>
            </div>

            <!-- Produto 5 -->
            <div class="mb-3 pb-3">
                <label for="produto5" class="form-label">5º Produto:</label>
                <input type="text" id="produto5" name="produto[]" class="form-control" required>
                <label for="preco5" class="form-label mt-2">Preço do 5º produto:</label>
                <input type="number" id="preco5" name="preco[]" step="0.01" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar Produtos</button>
        </form>
        <?php
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $produtos = $_POST['produto'];
                $precos = $_POST['preco'];

                $lista = [];

                foreach($produtos as $i => $produto){
                    $produto = trim($produto);
                    $preco = trim($precos[$i]);

                    $preco_alterado = $preco + ($preco * (15/100));

                    $lista[$produto] = $preco_alterado;
                }
                ksort($lista);

                foreach($lista as $produto => $preco){
                    echo "<br><div class='card mb-2 p-2 shadow-sm border-primary'>";
                    echo "<strong>Produto:</strong> $produto<br>";
                    echo "<strong class='text-success'>Preço: R$ " . number_format($preco, 2, ',', '.') . "</strong>";
                    echo "</div></br>";    
                }
            }
        
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>