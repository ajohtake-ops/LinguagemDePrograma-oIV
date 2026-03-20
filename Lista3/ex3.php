<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ex 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Ex 3</h1>
        <form method="post">
            <div class="mb-3">
                <label for="numero1" class="form-label">Insira o primeiro número:</label>
                <input type="number" id="numero1" name="numero1" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="numero2" class="form-label">Insira o segundo número</label>
                <input type="number" id="numero2" name="numero2" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $a = $_POST['numero1'];
            $b = $_POST['numero2'];
            $maior = 0;
            $menor = 0;

            if ($a == $b) {
                echo "<br>Os dois números são iguais.</br>";
                echo "<br>Ordem crescente: </br>";
                echo "<br>$a</br>";
            } else {
                echo "<br>Os dois números não são iguais.</br>";
                echo "<br>Ordem crescente:</br>";
                if ($a > $b) {
                    $maior = $a;
                    $menor = $b;
                } elseif ($b > $a) {
                    $maior = $b;
                    $menor = $a;
                }
                while ($menor <= $maior) {
                    echo "| $menor ";
                    $menor++;
                }
            }
        }

        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>