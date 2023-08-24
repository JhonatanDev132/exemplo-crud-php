<?php
/* Importando o script de conexão require_once garante que a importação é feita somento uma vez*/
require_once "conecta.php";

function lerFabricantes(PDO $conexao){
    $sql = "SELECT * FROM fabricantes ORDER BY nome";
    try{
    // Método prepare(): faz uma preparação/pré-configuração do comando SQL e 
    // guarda em memória (variável consulta).
    $consulta = $conexao->prepare($sql);

    /* Método execute():
    Executa o comando SQL no banco de dados */
    $consulta->execute();

    /* Método fetchAll()
    Buscar todos os dados da consulta como um array associativo. */
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $erro){
        die("erro, animal detectado");
    }

    return $resultado;
}

// Teste 
$dados = lerFabricantes($conexao);
var_dump($dados)
?>