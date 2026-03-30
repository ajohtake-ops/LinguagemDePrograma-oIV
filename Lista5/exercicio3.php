<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 3</h1>
        <form method="post">

            <div class="mb-3">
                <label for="codigo1" class="form-label">Insira o código do 1º produto:</label>
                <input type="number" id="codigo1" name="codigo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="produto" class="form-label">1º Produto</label>
                <input type="text" id="produto1" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço do 1º produto:</label>
                <input type="number" id="preco1" name="preco[]" step="any" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="codigo2" class="form-label">Insira o código do 2º produto:</label>
                <input type="number" id="codigo2" name="codigo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="produto2" class="form-label">2º Produto</label>
                <input type="text" id="produto2" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco2" class="form-label">Preço do 2º produto:</label>
                <input type="number" id="preco2" name="preco[]" step="any" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="codigo3" class="form-label">Insira o código do 3º produto:</label>
                <input type="number" id="codigo3" name="codigo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="produto3" class="form-label">3º Produto</label>
                <input type="text" id="produto3" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco3" class="form-label">Preço do 3º produto:</label>
                <input type="number" id="preco3" name="preco[]" step="any" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="codigo4" class="form-label">Insira o código do 4º produto:</label>
                <input type="number" id="codigo4" name="codigo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="produto4" class="form-label">4º Produto</label>
                <input type="text" id="produto4" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco4" class="form-label">Preço do 4º produto:</label>
                <input type="number" id="preco4" name="preco[]" step="any" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="codigo5" class="form-label">Insira o código do 5º produto:</label>
                <input type="number" id="codigo5" name="codigo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="produto5" class="form-label">5º Produto</label>
                <input type="text" id="produto5" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco5" class="form-label">Preço do 5º produto:</label>
                <input type="number" id="preco5" name="preco[]" step="any" class="form-control" required="">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $codigos = $_POST['codigo'];
            $produto = $_POST['produto'];
            $preco = $_POST['preco'];

            $lista =[];

            foreach($codigos as $i => $codigo){
                $codigo = trim($codigo);
                $prod = trim($produto[$i]);
                $pre = trim($preco[$i]);

                if($pre > 100){
                    $preco_alterado = $pre - ($pre * (10/100));
                    $pre = $preco_alterado;
                }
                if(!empty($codigo)){
                    $lista[$codigo] = [
                        'nome' => $prod,
                        'preco' => $pre
                        ];
                    }
            }
            uasort($lista, function($a, $b) {
                return $a['preco'] <=> $b['preco'];
            });

            // Exibição dos dados ordenados
            foreach ($lista as $codigo => $dados) {
                echo "<br><div class='card mb-2 p-2 shadow-sm border-primary'>";
                echo "<strong>Código:</strong> $codigo <br>";
                echo "<strong>Produto:</strong> {$dados['nome']} <br>";
                echo "<strong class='text-success'>Preço: R$ " . number_format($dados['preco'], 2, ',', '.') . "</strong>";
                echo "</div></br>";
            }

            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>