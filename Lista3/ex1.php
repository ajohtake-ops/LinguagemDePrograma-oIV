<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ex1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Ex1</h1>
        <form method="post">
            <div class="mb-3">
                <label for="numero1" class="form-label">Insira o 1º número:</label>
                <input type="number" id="numero1" name="numero1" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="numero2" class="form-label">Insira o 2º número:</label>
                <input type="number" id="numero2" name="numero2" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="numero3" class="form-label">Insira o 3º número:</label>
                <input type="text" id="numero3" name="numero3" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="numero4" class="form-label">Insira o 4º número:</label>
                <input type="number" id="numero4" name="numero4" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="numero5" class="form-label">Insira o 5º número:</label>
                <input type="number" id="numero5" name="numero5" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="numero6" class="form-label">Insira o 6º número:</label>
                <input type="number" id="numero6" name="numero6" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="numero7" class="form-label">Insira o 7º número:</label>
                <input type="number" id="numero7" name="numero7" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $i = 0;
            $menor = 0;
            $posicao = 0;
            $n1 = $_POST['numero1'];
            $n2 = $_POST['numero2'];
            $n3 = $_POST['numero3'];
            $n4 = $_POST['numero4'];
            $n5 = $_POST['numero5'];
            $n6 = $_POST['numero6'];
            $n7 = $_POST['numero7'];

            while ($i < 7) {
                if ($n1 > $menor) {
                    $menor = $n1;
                    $posicao = 1;
                }
                if ($n2 < $menor) {
                    $menor = $n2;
                    $posicao = 2;
                }
                if ($n3 < $menor) {
                    $menor = $n3;
                    $posicao = 3;
                }
                if ($n4 < $menor) {
                    $menor = $n4;
                    $posicao = 4;
                }
                if ($n5 < $menor) {
                    $menor = $n5;
                    $posicao = 5;
                }
                if ($n6 < $menor) {
                    $maior = $n6;
                    $posicao = 6;
                }
                if ($n7 < $menor) {
                    $menor = $n7;
                    $posicao = 7;
                }
                $i++;
            }
            echo "O menor número é $menor, estando na $posicao ª posição.";
        }

        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>