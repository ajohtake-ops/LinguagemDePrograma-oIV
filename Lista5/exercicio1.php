<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 1</h1>
        <form method="post">

            <div class="mb-3">
                <label for="nome" class="form-label">1º Nome:</label>
                <input type="text" id="nome1" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">1º Número de Telefone:</label>
                <input type="number" id="telefone1" name="telefone[]" class="form-control" required="">
            </div>
            
            <div class="mb-3">
                <label for="nome" class="form-label">2º Nome:</label>
                <input type="text" id="nome2" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">2º Número de Telefone:</label>
                <input type="number" id="telefone2" name="telefone[]" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">3º Nome:</label>
                <input type="text" id="nome3" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">3º Número de Telefone:</label>
                <input type="number" id="telefone3" name="telefone[]" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">4º Nome:</label>
                <input type="text" id="nome4" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">4º Número de Telefone:</label>
                <input type="number" id="telefone4" name="telefone[]" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">5º Nome:</label>
                <input type="text" id="nome5" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">5º Número de Telefone:</label>
                <input type="number" id="telefone5" name="telefone[]" class="form-control" required="">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nomes = $_POST['nome'];
                $telefones = $_POST['telefone'];

                $lista_final = [];

                foreach($nomes as $i => $nome){
                    $nome = trim($nome);
                    $tel = trim($telefones[$i]);

                    if (isset($lista_final[$nome])) {
                        echo "Nome duplicado!";
                    } elseif (in_array($tel, $lista_final)) {
                        echo "Telefone duplicado!";
                    } else {
                        if(!empty($nome)){
                            $lista_final[$nome] = $tel;
                        }
                    }
                }
                ksort($lista_final);

                foreach ($lista_final as $nome => $tel) {
                    echo "$nome: $tel <br>";
                }
            }

        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>