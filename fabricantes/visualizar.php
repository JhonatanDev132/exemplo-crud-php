<?php
// Importando as funções de manipulação de fabricantes
require_once "../src/funcoes-fabricantes.php";
// Guardando o retorno/resultado da função lerFabricantes 
$listaDeFabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');
        *{
            font-family: 'Noto Sans', sans-serif;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        table{
            margin: auto;
        }
        table a{
            text-decoration: none;
            font-weight: bolder;
            color: black;
        }


        tr:nth-child(odd){
            background-color: lightcyan;
        }
        tr:nth-child(even){
            background-color: lightseagreen;
        }
        .width{
            width: 20VW;
        }
        
    </style>
</head>
<body>
    <h1>Fabricantes | SELECT - 
        <a href="../index.php">Home</a>
    </h1>

    <hr>
    <h2>Lendo e carregando todos os fabricantes.</h2>

    <p><a href="inserir.php">Inserir novo fabricante</a></p>

    <?php

    ?>
        <table>
    <tr>
        <th>ID</th>
        <th class="width">Nome</th>
        <th class="width">Operações</th>
    </tr>
    <?php
        foreach($dados as $dados_fabricante){
    ?>
    <tr>
        <td><?=$dados_fabricante['id']?></td>
        <td class="width"><?=$dados_fabricante['nome']?></td>
        <td class="width"><a href="">Editar</a> | <a href="">Excluir</a></td>
    </tr>
    <?php
        }

    ?>
        </table>
    <?php
    
    ?>
</body>
</html>