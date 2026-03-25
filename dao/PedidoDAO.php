<?php

require_once __DIR__ . "/../config/Database.php";

class PedidoDAO {

    private $conn;

    public function __construct(){
        $this->conn = (new Database())->getConnection();
    }

    public function inserir($cliente_id, $produtos){

        try {
            $this->conn->beginTransaction();

            $stmt = $this->conn->prepare(
                "INSERT INTO pedidos (cliente_id) VALUES (:cliente_id)"
            );
            $stmt->bindValue(":cliente_id", $cliente_id);
            $stmt->execute();

            $pedido_id = $this->conn->lastInsertId();

            foreach ($produtos as $produto_id){
                $stmt = $this->conn->prepare(
                    "INSERT INTO pedido_produtos (pedido_id, produto_id)
                     VALUES (:pedido_id, :produto_id)"
                );

                $stmt->bindValue(":pedido_id", $pedido_id);
                $stmt->bindValue(":produto_id", $produto_id);
                $stmt->execute();
            }

            $this->conn->commit();
            return $pedido_id;

        } catch(Exception $e){
            $this->conn->rollBack();
            return false;
        }
    }
}