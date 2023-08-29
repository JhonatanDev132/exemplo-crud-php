<?php
require_once '../src/funcoes-fabricantes.php';

$fabricantes = lerFabricantes($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
</head>
<body>
    <h1>Produtos | INSERT</h1>
    <hr>

    <form action="" method="post">
    <p>
        <label for="nome"></label>
        <input required name="nome" id="nome" type="text" placeholder="Nome:">
    </p>
    <p>
        <label for="preco"></label>
        <input required name="preco" id="preco" type="number" min="10" max="10000" step="0,01" placeholder="Preço:">
    </p>
    <p>
        <label for="quantidade"></label>
        <input required name="quantidade" id="quantidade" type="number" min="10" max="10000" step="0,01" placeholder="Quantidade:">
    </p>
    <p>
        <label for="fabricante"></label>

        <select name="fabricante" id="fabricante">  
<?php foreach( $fabricantes as $fabricante ){ ?>
        <option value="<?=$fabricante['id']?>"><?=$fabricante['nome']?></option>
<?php } ?>
        </select>
    </p>
    <p>
        <label for="descricao"></label> <br>
        <textarea type="text" id="descricao" cols="30" rows="3"></textarea>
    </p>
    <button type="submit" name="inserir">Inserir produto </button>
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>