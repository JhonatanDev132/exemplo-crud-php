<?php
require_once '../src/funcoes-fabricantes.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

/* Chamando a função e recuperando os dados de um
 fabricante de acordo com o id passado. */

$fabricante = lerUmFabricante($conexao, $id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Edição</title>
    <style>
        body{
            background-color: aliceblue;
            text-align: center;
        }

        section {
            text-align: center;
            background-color: lightseagreen;
            width: 20%;
            position: relative;
            top: 15vw;
            padding: 3vw;
            margin: auto;
        }

        .botao{
            background-color: aliceblue;
            width: 20%;
            margin: auto;
            position: relative;
            top: 1vh;
        }
        .botao a{
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>
<body>
    
    <h1>Fabricantes | SELECT/UPDATE -</h1>

    <section>
    <form action="" method="post">
        <!-- Campo oculto usado apenas para registro no formulário do
    id do fabricante que está sendo vizualizado. -->
        <input type="hidden" name="id" value="<?=$fabricante['id']?>">

        <p>
        <label for="nome"></label>
        <input value="<?=$fabricante['nome']?>" required type="text" name="nome" id="nome" placeholder="Nome:">
        </p>

        <button type="submit" name="atualizar">Atuaizar fabricante</button>
    </form>
    

    <p class="botao"><a href="visualizar.php">voltar</a></p>
    </section>
</body>
</html>