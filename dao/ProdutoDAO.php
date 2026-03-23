<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Produto.php";

class ProdutoDAO {

    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function inserir(Produto $produto){

        $sql = "INSERT INTO produtos (nome, preco)
                VALUES (:nome, :preco)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":preco", $produto->getPreco());

        return $stmt->execute();
    }

    public function listar(){
        $sql = "SELECT * FROM produtos";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}