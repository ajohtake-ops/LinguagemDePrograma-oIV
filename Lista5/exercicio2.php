<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 2</h1>
        <form method="post">

            <div class="mb-3">
                <label for="aluno1" class="form-label">1º Aluno:</label>
                <input type="text" id="aluno1" name="aluno[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno1nota1" class="form-label">Nota 1 do 1º aluno</label>
                <input type="number" id="aluno1nota1" step="any" name="nota1aluno[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno1nota2" class="form-label">Nota 2 do 1º aluno:</label>
                <input type="number" id="aluno1nota2" step="any" name="nota2aluno[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno1nota3" class="form-label">Nota 3 do 1º aluno:</label>
                <input type="number" id="aluno1nota3" step="any" name="nota3aluno[]" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="aluno2" class="form-label">2º Aluno:</label>
                <input type="text" id="aluno2" name="aluno[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno2nota1" class="form-label">Nota 1 do 2º aluno</label>
                <input type="number" id="aluno2nota1" name="nota1aluno[]" step="any" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno2nota2" class="form-label">Nota 2 do 2º aluno:</label>
                <input type="number" id="aluno2nota2" name="nota2aluno[]" step="any" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno2nota3" class="form-label">Nota 3 do 2º aluno:</label>
                <input type="number" id="aluno2nota3" name="nota3aluno[]" step="any" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="aluno3" class="form-label">3º Aluno:</label>
                <input type="text" id="aluno3" name="aluno[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno3nota1" class="form-label">Nota 1 do 3º aluno</label>
                <input type="number" id="aluno3nota1" name="nota1aluno[]" step="any" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno3nota2" class="form-label">Nota 2 do 3º aluno:</label>
                <input type="number" id="aluno3nota2" name="nota2aluno[]" step="any" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno3nota3" class="form-label">Nota 3 do 1º aluno:</label>
                <input type="number" id="aluno3nota3" name="nota3aluno[]" step="any" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="aluno4" class="form-label">4º Aluno:</label>
                <input type="text" id="aluno4" name="aluno[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno4nota1" class="form-label">Nota 1 do 4º aluno</label>
                <input type="number" id="aluno4nota1" name="nota1aluno[]" step="any" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno4nota2" class="form-label">Nota 2 do 4º aluno:</label>
                <input type="number" id="aluno4nota2" name="nota2aluno[]" step="any" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno4nota3" class="form-label">Nota 3 do 4º aluno:</label>
                <input type="number" id="aluno4nota3" name="nota3aluno[]"step="any" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="aluno5" class="form-label">5º Aluno:</label>
                <input type="text" id="aluno5" name="aluno[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno5nota1" class="form-label">Nota 1 do 5º aluno</label>
                <input type="number" id="aluno5nota1" name="nota1aluno[]" step="any" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno5nota2" class="form-label">Nota 2 do 5º aluno:</label>
                <input type="number" id="aluno5nota2" name="nota2aluno[]" step="any" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="aluno5nota3" class="form-label">Nota 3 do 5º aluno:</label>
                <input type="number" id="aluno5nota3" name="nota3aluno[]" step="any" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $alunos = $_POST['aluno'];
            $nota1 = $_POST['nota1aluno'];
            $nota2 = $_POST['nota2aluno'];
            $nota3 = $_POST['nota3aluno'];

            $lista = [];

            foreach ($alunos as $i => $aluno) {
                $aluno = trim($aluno);
                $media = ((float)$nota1[$i] + (float)$nota2[$i] + (float)$nota3[$i]) / 3;
                $lista[$aluno] = number_format($media, 2);
            }
            arsort($lista);

            echo "<h3 class='mt-4'>Resultado (Ordenado por Média):</h3>";
            foreach ($lista as $aluno => $media) {
                echo "<div class='card mb-2 p-2'>";
                echo "<strong>Aluno:</strong> $aluno <br>";
                echo "<strong>Média:</strong> $media";
                echo "</div>";
            }
        }


        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>