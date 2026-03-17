<?php
    $mapa1 = array('João',"Maria", 3);
    print_r($mapa1);
    echo "<p></p>";
    var_dump($mapa1);
    echo "<p>Valor da posição 2: ". $mapa1[2]."</p>";

    $contatos["Vanessa"] = "123456";
    $contatos["José"] = "098765";
    echo "<p></p>";
    print_r($contatos);

    foreach($contatos as $valor){
        echo "<p>Telefone: $valor</p>";
    }

    foreach($contatos as $chave => $valor){
        echo "<p>Telefone de $chave: $valor</p>";
    }

    unset($mapa1[1]);
    print_r($mapa1);

    $quantidade = count($mapa1);
        echo "<p>Qtd. Elementos mapa 1: $quantidade</p>";

    asort($contatos);//ordenar pelo valor
    ksort($contatos);//ordenaor pela chave
    
?>