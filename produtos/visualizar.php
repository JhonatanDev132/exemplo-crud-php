<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-utilitarias.php";
$listaDeProdutos = lerProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>

    <style>
        * { box-sizing: border-box; }

        .produtos {
            font-family: 'Segoe UI';
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            width: 80%;
            margin: auto;
        }

        .produto {
            background-color: #FFF5EE;
            padding: 1rem;
            width: 49%;
            box-shadow: rgba(0,0,0,0.3) 0 0 3px 1px;
        }
    </style>

</head>
<body>
    <h1>Produtos | SELECT - <a href="../index.php">Home</a> </h1>

    <hr>
    <h2>Lendo e carregando todos os produtos.</h2>

    <p><a href="inserirp.php">
        Inserir novo produto</a></p>

    <div class="produtos">

    <?php foreach ( $listaDeProdutos as $produto ){ ?>
        <article class="produto">
            <h3><?=$produto["produto"]?> - <i><?=$produto["fabricante"]?></i></h3>
            <p><b>Preço: <?=formataPreco($produto["preco"])?></b> </p>
            <p><b>Quantidade:</b> <?=$produto["quantidade"]?> </p>
            <p><b>Total: <?=calcularTotal($produto['preco'], $produto['quantidade'])?></b></p>
        
            <hr>
            <p>
                <a href="atualizar.php?id=<?=$produto["id"]?>">Editar</a>
                |
                <a href="excluir.php?id=<?=$fabricante["id"]?>">Excluir</a>
            </p>
        </article>
    <?php } ?>
        
    </div>

</body>
</html>