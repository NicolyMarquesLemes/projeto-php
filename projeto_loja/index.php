<?php
require_once "Cliente.php";
require_once "Produto.php";
require_once "Pedido.php";

$cliente1 = new Cliente(1, "Nicoly", "n320992@gmail.com");

$p1 = new Produto(1, "Notebook", 3500);
$p2 = new Produto(2, "Mouse Gamer", 150);
$p3 = new Produto(3, "Headset", 280);

$pedido1 = new Pedido(1001, $cliente1);

$pedido1->adicionarProduto($p1);
$pedido1->adicionarProduto($p2);
$pedido1->adicionarProduto($p3);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Pedidos da Loja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sistema de Pedidos da Loja</h1>
        <div class="pedido-box">
            <?php $pedido1->exibirResumo(); ?>
        </div>
    </div>
</body>
</html>