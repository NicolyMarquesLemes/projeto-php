<?php

require_once __DIR__ . "/models/Cliente.php";
require_once __DIR__ . "/models/Produto.php";
require_once __DIR__ . "/dao/ClienteDAO.php";
require_once __DIR__ . "/dao/ProdutoDAO.php";
require_once __DIR__ . "/dao/PedidoDAO.php";

$clienteDAO = new ClienteDAO();
$produtoDAO = new ProdutoDAO();
$pedidoDAO  = new PedidoDAO();

$mensagemCliente = "";
$mensagemProduto = "";
$mensagemPedido  = "";

if(isset($_POST['salvar_cliente'])){

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    if($nome && $email){

        $cliente = new Cliente(null, $nome, $email);

        if($clienteDAO->inserir($cliente)){
            $mensagemCliente = "Cliente cadastrado com sucesso!";
        } else {
            $mensagemCliente = "Erro ao cadastrar cliente!";
        }

    } else {
        $mensagemCliente = "⚠️ Preencha todos os campos!";
    }
}

if(isset($_POST['salvar_produto'])){

    $nome = trim($_POST['produto_nome']);
    $preco = floatval($_POST['produto_preco']);

    if($nome && $preco > 0){

        $produto = new Produto(null, $nome, $preco);

        if($produtoDAO->inserir($produto)){
            $mensagemProduto = "Produto cadastrado com sucesso!";
        } else {
            $mensagemProduto = "Erro ao cadastrar produto!";
        }

    } else {
        $mensagemProduto = "Nome ou preço inválido!";
    }
}

if(isset($_POST['salvar_pedido'])){

    $cliente_id = $_POST['cliente_id'] ?? null;
    $produtos = $_POST['produtos'] ?? [];

    if(!$cliente_id){
        $mensagemPedido = "⚠️ Selecione um cliente!";
    }
    elseif(empty($produtos)){
        $mensagemPedido = "⚠️ Selecione pelo menos um produto!";
    }
    else{

        if($pedidoDAO->inserir($cliente_id, $produtos)){
            $mensagemPedido = "Pedido criado com sucesso!";
        } else {
            $mensagemPedido = "Erro ao criar pedido!";
        }
    }
}

$listaProdutos = $produtoDAO->listar();
$listaClientes = $clienteDAO->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Cadastro de Cliente</h1>

    <form method="POST">
        Nome:<br>
        <input type="text" name="nome" required><br><br>

        Email:<br>
        <input type="email" name="email" required><br><br>

        <button type="submit" name="salvar_cliente">Salvar Cliente</button>
    </form>

    <?php if($mensagemCliente): ?>
        <div class="cliente-mensagem"><?= $mensagemCliente ?></div>
    <?php endif; ?>

    <hr>

    <h1>Cadastro de Produto</h1>

    <form method="POST">
        Nome:<br>
        <input type="text" name="produto_nome" required><br><br>

        Preço:<br>
        <input type="number" step="0.01" name="produto_preco" required><br><br>

        <button type="submit" name="salvar_produto">Salvar Produto</button>
    </form>

    <?php if($mensagemProduto): ?>
        <div class="cliente-mensagem"><?= $mensagemProduto ?></div>
    <?php endif; ?>

    <hr>

    <h1>Criar Pedido</h1>

    <form method="POST">

        Cliente:<br>
        <select name="cliente_id" required>
            <option value=""></option>
            <?php foreach($listaClientes as $c): ?>
                <option value="<?= $c['id'] ?>">
                    <?= $c['nome'] ?> (<?= $c['email'] ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        Produtos:<br>
        <?php if(empty($listaProdutos)): ?>
            <p>⚠️ Cadastre produtos primeiro</p>
        <?php else: ?>
            <?php foreach($listaProdutos as $p): ?>
                <input type="checkbox" name="produtos[]" value="<?= $p['id'] ?>">
                <?= $p['nome'] ?> - R$ <?= number_format($p['preco'],2,',','.') ?><br>
            <?php endforeach; ?>
        <?php endif; ?>

        <br>
        <button type="submit" name="salvar_pedido">Criar Pedido</button>
    </form>

    <?php if($mensagemPedido): ?>
        <div class="cliente-mensagem"><?= $mensagemPedido ?></div>
    <?php endif; ?>

</div>

</body>
</html>