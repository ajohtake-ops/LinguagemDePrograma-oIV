<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>exercício 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>exercício 15</h1>
        <form method="post">
            <div class="mb-3">
                <label for="peso" class="form-label">Insira o valor do seu peso:</label>
                <input type="number" step="any" id="peso " name="peso" class="form-control" required="">
                <label for="altura" class="form-label">Insira o valor da sua altura:</label>
                <input type="number" step="any" id="altura" name="altura" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $resultado = $peso / ($altura ** 2);
            echo "<p>O resultado do seu IMC é: $resultado.</p>";

            if ($resultado < 18.5) {
                echo "<p>Você está abaixo do peso. </p?";
            } elseif ($resultado >= 18.5 & $resultado < 25) {
                echo "<p>Vocẽ está no peso adequado</p>";
            } elseif ($resultado >= 25) {
                echo "<p>Você está acima do peso.</p>";
            }
        }

        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>