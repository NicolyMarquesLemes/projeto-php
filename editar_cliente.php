<?php

require_once __DIR__ . "/dao/ClienteDAO.php";
require_once __DIR__ . "/models/Cliente.php";

$clienteDAO = new ClienteDAO();

if (!isset($_GET['id'])) {
    die("ID não informado");
}

$id = $_GET['id'];
$cliente = $clienteDAO->buscarPorId($id);

if (!$cliente) {
    die("Cliente não encontrado");
}

/* ATUALIZAR */
if (isset($_POST['atualizar'])) {

    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);

    $clienteDAO->atualizar($cliente);

    header("Location: index.php");
    exit;
}
?>

<h2>Editar Cliente</h2>

<form method="POST">
    Nome:<br>
    <input type="text" name="nome" value="<?= htmlspecialchars($cliente->getNome()) ?>"><br><br>

    Email:<br>
    <input type="email" name="email" value="<?= htmlspecialchars($cliente->getEmail()) ?>"><br><br>

    <button type="submit" name="atualizar">Atualizar</button>
</form>