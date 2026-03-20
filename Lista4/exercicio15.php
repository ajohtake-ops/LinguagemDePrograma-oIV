<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercicio 15</h1>
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Digite um email:</label>
                <input type="email" id="email" name="email" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $pos = strpos($email, '@');
            $dominio = "";

            if (str_contains($email, '@')) {
                $pos = strpos($email, '@');

                for ($i = 0; $i < strlen($email); $i++) {
                    if ($i > $pos) {
                        $dominio .= $email[$i];
                    }
                }
                echo "O domínio é: " . $dominio;
            } else {
                echo "E-mail inválido (sem @).";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>