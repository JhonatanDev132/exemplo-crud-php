<?php

function formataPreco(float $preco) {
    return "R$ " . number_format($preco, 2, ',', '.');
}
?>
