<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ex4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Ex4</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor" class="form-label">Insira o valor do produto:</label>
                <input type="number" id="valor" step="any" name="valor" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $valor = $_POST['valor'];

                if($valor > 100){
                    $valor_desconto = $valor - ($valor * (15/100));
                    echo "<br>Como o valor do produto está acima de R$100.00, teve que ser aplicado um desconto de 15%.</br>";
                    echo "<br>O novo valor do produto é de: R$$valor_desconto.</br>";
                    echo "<br>Valor original: R$$valor.</br>";
                }else{
                    echo "<br>Como o valor do produto não está acima de R$100,00, então não necessitou a aplicação do desconto.</br>";
                    echo "<br>Valor original: R$$valor.</br>";
                }
            }
        
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>