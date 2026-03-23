<?php

require_once __DIR__ . "/../config/Database.php";

class PedidoDAO {

    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function inserir($cliente_id, $produtos){

        $sql = "INSERT INTO pedidos (cliente_id) VALUES (:cliente_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":cliente_id", $cliente_id);
        $stmt->execute();

        $pedido_id = $this->conn->lastInsertId();

        foreach($produtos as $produto_id){
            $sql = "INSERT INTO pedido_produtos (pedido_id, produto_id)
                    VALUES (:pedido_id, :produto_id)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":pedido_id", $pedido_id);
            $stmt->bindValue(":produto_id", $produto_id);
            $stmt->execute();
        }

        return true;
    }
}