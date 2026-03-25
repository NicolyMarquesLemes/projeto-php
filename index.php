<?php

require_once __DIR__ . "/dao/ClienteDAO.php";
require_once __DIR__ . "/dao/ProdutoDAO.php";
require_once __DIR__ . "/dao/PedidoDAO.php";

require_once __DIR__ . "/models/cliente.php";
require_once __DIR__ . "/models/produto.php";
require_once __DIR__ . "/models/pedido.php";

$clienteDAO = new ClienteDAO();
$produtoDAO = new ProdutoDAO();
$pedidoDAO  = new PedidoDAO();

/* =========================
   CADASTRAR CLIENTE
========================= */
if (isset($_POST['salvar_cliente'])) {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    if ($nome && $email) {

        $cliente = new Cliente(null, $nome, $email);
        $clienteDAO->inserir($cliente);

        header("Location: index.php");
        exit;
    }
}

/* =========================
   CADASTRAR PRODUTO
========================= */
if (isset($_POST['salvar_produto'])) {

    $nome = trim($_POST['produto_nome']);
    $preco = floatval($_POST['produto_preco']);

    if ($nome && $preco > 0) {

        $produto = new Produto(null, $nome, $preco);
        $produtoDAO->inserir($produto);

        header("Location: index.php");
        exit;
    }
}

/* =========================
   CRIAR PEDIDO
========================= */
$pedidoCriado = null;

if (isset($_POST['salvar_pedido'])) {

    $cliente_id = $_POST['cliente_id'] ?? null;
    $produtosSelecionados = $_POST['produtos'] ?? [];

    if ($cliente_id && !empty($produtosSelecionados)) {

        $pedidoDAO->inserir($cliente_id, $produtosSelecionados);

        // Buscar cliente
        $clienteObj = $clienteDAO->buscarPorId($cliente_id);

        // Criar objeto Pedido para exibição
        $pedidoCriado = new Pedido(rand(1000,9999), $clienteObj);

        $listaProdutos = $produtoDAO->listar();

        foreach ($produtosSelecionados as $prod_id) {
            foreach ($listaProdutos as $p) {
                if ($p['id'] == $prod_id) {
                    $produtoObj = new Produto($p['id'], $p['nome'], $p['preco']);
                    $pedidoCriado->adicionarProduto($produtoObj);
                }
            }
        }

        header("Location: index.php");
        exit;
    }
}

/* =========================
   LISTAGENS
========================= */
$clientes = $clienteDAO->listar();
$produtos = $produtoDAO->listar();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Loja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Sistema de Pedidos</h1>

    <!-- ================= CLIENTE ================= -->
    <h2>Cadastro de Cliente</h2>

    <form method="POST">
        Nome:<br>
        <input type="text" name="nome" required><br><br>

        Email:<br>
        <input type="email" name="email" required><br><br>

        <button type="submit" name="salvar_cliente">Salvar Cliente</button>
    </form>

    <hr>

    <h2>Clientes Cadastrados</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($clientes as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= htmlspecialchars($c['nome']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <td>
                    <a href="editar_cliente.php?id=<?= $c['id'] ?>">Editar</a> |
                    <a href="excluir_cliente.php?id=<?= $c['id'] ?>"
                       onclick="return confirm('Tem certeza?')">
                       Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>

    <!-- ================= PRODUTO ================= -->
    <h2>Cadastro de Produto</h2>

    <form method="POST">
        Nome:<br>
        <input type="text" name="produto_nome" required><br><br>

        Preço:<br>
        <input type="number" step="0.01" name="produto_preco" required><br><br>

        <button type="submit" name="salvar_produto">Salvar Produto</button>
    </form>

    <hr>

    <h2>Produtos Cadastrados</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
        </tr>

        <?php foreach ($produtos as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['nome']) ?></td>
                <td>R$ <?= number_format($p['preco'],2,',','.') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>

    <!-- ================= PEDIDO ================= -->
    <h2>Criar Pedido</h2>

    <form method="POST">

        Cliente:<br>
        <select name="cliente_id" required>
            <option value="">Selecione</option>
            <?php foreach ($clientes as $c): ?>
                <option value="<?= $c['id'] ?>">
                    <?= htmlspecialchars($c['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        Produtos:<br>

        <?php if (empty($produtos)): ?>
            <p>Cadastre produtos primeiro.</p>
        <?php else: ?>
            <?php foreach ($produtos as $p): ?>
                <input type="checkbox" name="produtos[]" value="<?= $p['id'] ?>">
                <?= htmlspecialchars($p['nome']) ?> - R$ <?= number_format($p['preco'],2,',','.') ?>
                <br>
            <?php endforeach; ?>
        <?php endif; ?>

        <br>

        <button type="submit" name="salvar_pedido">Criar Pedido</button>

    </form>

    <!-- ================= RESUMO PEDIDO ================= -->
    <?php if ($pedidoCriado): ?>
        <div class="pedido-box">
            <?php $pedidoCriado->exibirResumo(); ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>