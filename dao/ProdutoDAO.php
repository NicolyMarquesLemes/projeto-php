<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/produto.php";

class ProdutoDAO {

    private $conn;

    public function __construct(){
        $this->conn = (new Database())->getConnection();
    }

    public function inserir(Produto $produto){
        $sql = "INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":preco", $produto->getPreco());

        return $stmt->execute();
    }

    public function listar(){
        return $this->conn->query("SELECT * FROM produtos ORDER BY id DESC")
                          ->fetchAll(PDO::FETCH_ASSOC);
    }
}