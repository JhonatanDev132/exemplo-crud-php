<?php
require_once '../src/funcoes-fabricantes.php';
require_once '../src/funcoes-produtos.php';

$fabricantes = lerFabricantes($conexao);

if(isset($_POST['inserir'])){
    $nome = filter_input(
        INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS
    );

    $preco = filter_input(
        INPUT_POST, 'preco',
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    $quantidade = filter_input(
        INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT
    );

    // Pegaremos o value, ou seja, o valor do id do fabricante
    $fabricanteid = filter_input(
        INPUT_POST, 'fabricante', FILTER_SANITIZE_NUMBER_INT
    );

    $descricao = filter_input(
        INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS
    );

    inserirProduto($conexao, $nome, $fabricanteid, $preco, $quantidade, $descricao);

    header('location:visualizar.php');

    // teste
    echo $nome, $preco, $fabricanteid, $quantidade, $descricao;

}
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
        <textarea type="text" id="descricao" name="descricao" cols="30" rows="3"></textarea>
    </p>
    <button type="submit" name="inserir">Inserir produto </button>
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>