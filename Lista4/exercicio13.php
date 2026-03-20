<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 13 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 13 PHP</h1>
        <form method="post">
            <div class="mb-3">
                <label for="frase" class="form-label">Digite uma frase:</label>
                <input type="text" id="frase" name="frase" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $frase = $_POST['frase'];
            $maiorpalavra = "";
            $atualpalavra = "";
            $palavraCount = str_word_count($frase);

            for($i = 0; $i < strlen($frase); $i++){
                $caracter = $frase[$i];

                if($caracter != ' '){
                    $atualpalavra .= $caracter;
                }
                else{
                    if(mb_strlen($atualpalavra) > mb_strlen($maiorpalavra)){
                        $maiorpalavra = $atualpalavra;
                    }
                    $atualpalavra = "";
                }
            }
            $tamanhoP = strlen($maiorpalavra);

            echo "<br>A quantidade de palavras nesta frase é: $palavraCount.</br>";
            echo "<br>A maior palavra identificada dentro da frase é ( $maiorpalavra ), com $tamanhoP caracteres. </br>";
            
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>