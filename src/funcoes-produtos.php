<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT nome, preco, quantidade FROM produtos ORDER BY nome";
    try{
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar produtos: ".$erro->getMessage());
    }

    return $resultado
    // SQL DE SELECT
    // TRY/CATCH
        // PREPARE...
        // EXECUTE...
        // GERAR RESULTADO COMO ARRAY
    // RETORNAR O RESULTADO como array
}