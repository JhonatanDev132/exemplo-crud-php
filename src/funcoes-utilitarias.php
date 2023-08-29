<?php

function formataPreco(float $preco) {
    return "R$ " . number_format($preco, 2, ',', '.');
}

function calcularTotal(float $preco, int $quantidade){
    $total = $preco * $quantidade;
    return formataPreco($total);
}
?>
