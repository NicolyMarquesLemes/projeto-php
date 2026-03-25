<?php

require_once "dao/ClienteDAO.php";

$clienteDAO = new ClienteDAO();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if ($clienteDAO->temPedidos($id)) {
        echo "Não é possível excluir: cliente possui pedidos vinculados.";
        exit;
    }

    if ($clienteDAO->excluir($id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao excluir!";
    }

}