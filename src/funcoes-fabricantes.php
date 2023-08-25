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
        die("Deu ruim");
    }

    return $resultado;
}

// Teste 
$dados = lerFabricantes($conexao);
var_dump($dados);

// Usada em fabricantes/inserir.php
function inserirFabricante(PDO $conexao, string $nomeDoFabricante){
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

    try {
        $consulta = $conexao->prepare($sql);

        // bindValue() -> Permite vincular o valor existente no parâmetro nomeado (:nome) à consulta que será executada.
        // É necessário indicar qual é o parametro (:nome), de onde vem o valor ($nomeDoFabricante) e de que tipo ele é (PDO::PARAM_STR)
        $consulta->bindValue(':nome', $nomeDoFabricante, PDO::PARAM_STR);

        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
} // fim inserirFabricante

// Usada em fabricantes/atualizar.php
function lerUmFabricante(PDO $conexao, int $idFabricante){
    $sql = 'SELECT * FROM fabricantes WHERE id = :id';

    try {
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(':id', $idFabricante, PDO::PARAM_INT);

        $consulta->execute();

        $resultado =$consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die('Erro ao carregar: '.$erro->getMessage());
    }

    return $resultado;
} // fim lerUmFabricante
?>