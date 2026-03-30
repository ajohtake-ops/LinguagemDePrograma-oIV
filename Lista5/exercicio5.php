<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4 - Controle de Estoque de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Controle de Estoque</h1>
        <form method="post">

            <!-- Livro 1 -->
            <div class="mb-3 border-bottom pb-3">
                <label for="livro1" class="form-label">Título do 1º livro:</label>
                <input type="text" id="livro1" name="livro[]" class="form-control" required>
                <label for="qtd1" class="form-label mt-2">Quantidade em estoque do 1º livro:</label>
                <input type="number" id="qtd1" name="qtd[]" class="form-control" required>
            </div>

            <!-- Livro 2 -->
            <div class="mb-3 border-bottom pb-3">
                <label for="livro2" class="form-label">Título do 2º livro:</label>
                <input type="text" id="livro2" name="livro[]" class="form-control" required>
                <label for="qtd2" class="form-label mt-2">Quantidade em estoque do 2º livro:</label>
                <input type="number" id="qtd2" name="qtd[]" class="form-control" required>
            </div>

            <!-- Livro 3 -->
            <div class="mb-3 border-bottom pb-3">
                <label for="livro3" class="form-label">Título do 3º livro:</label>
                <input type="text" id="livro3" name="livro[]" class="form-control" required>
                <label for="qtd3" class="form-label mt-2">Quantidade em estoque do 3º livro:</label>
                <input type="number" id="qtd3" name="qtd[]" class="form-control" required>
            </div>

            <!-- Livro 4 -->
            <div class="mb-3 border-bottom pb-3">
                <label for="livro4" class="form-label">Título do 4º livro:</label>
                <input type="text" id="livro4" name="livro[]" class="form-control" required>
                <label for="qtd4" class="form-label mt-2">Quantidade em estoque do 4º livro:</label>
                <input type="number" id="qtd4" name="qtd[]" class="form-control" required>
            </div>

            <!-- Livro 5 -->
            <div class="mb-3 pb-3">
                <label for="livro5" class="form-label">Título do 5º livro:</label>
                <input type="text" id="livro5" name="livro[]" class="form-control" required>
                <label for="qtd5" class="form-label mt-2">Quantidade em estoque do 5º livro:</label>
                <input type="number" id="qtd5" name="qtd[]" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $livros = $_POST['livro'];
            $quantidades = $_POST['qtd'];

            $lista = [];

            foreach ($livros as $i => $titulo) {
                $titulo = trim($titulo);
                $qtd = $quantidades[$i];

                if (!empty($titulo)) {
                    $lista[$titulo] = $qtd;
                }
            }
            ksort($lista);

            echo "<h3 class='mt-4'>Relatório de Estoque:</h3>";
            foreach ($lista as $titulo => $qtd) {                
                echo "<div class='card mb-2 p-2 shadow-sm'>";
                echo "<strong>Livro:</strong> $titulo <br>";
                echo "<strong>Quantidade:</strong> $qtd unidades";
                if ($qtd < 5) echo " <span class='badge bg-danger'>Estoque Baixo!</span>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>