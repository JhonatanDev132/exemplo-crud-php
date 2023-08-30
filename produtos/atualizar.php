<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-fabricantes.php";


$idProduto = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$preco = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_FLOAT);

$produto = lerUmProduto($conexao, $idProduto);

$listaDeFabricantes = lerFabricantes($conexao);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>
</head>
<body>
    <h1>Produtos | SELECT/UPDATE</h1>
    <hr>

    <form action="" method="post">
    <p>
        <label for="nome"></label>
        <input required value="<?=$produto['nome']?>" name="nome" id="nome" type="text" placeholder="Nome:">
    </p>
    <p>
        <label for="preco"></label>
        <input required value="<?=$produto['preco']?>" name="preco" id="preco" type="number" min="10" max="10000" step="0,01" placeholder="Preço:">
    </p>
    <p>
        <label for="quantidade"></label>
        <input required value="<?=$produto['quantidade']?>" name="quantidade" id="quantidade" type="number" min="10" max="10000" step="0,01" placeholder="Quantidade:">
    </p>
    <p>
        <label for="fabricante"></label>

        <select name="fabricante" id="fabricante">  
<?php foreach( $listaDeFabricantes as $fabricante ){ ?>
        <option
            <?php 
            if($produto['fabricante_id'] === $fabricante['id']) echo "selected";
            ?>
             value="<?=$fabricante['id']?>">
            <?=$fabricante['nome']?>
        </option>
<?php } ?>
        </select>
    </p>
    <p>
        <label for="descricao"></label> <br>
        <textarea type="text" id="descricao" name="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
    </p>
    <button type="submit" name="atualizar">Atualizar produto </button>
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>