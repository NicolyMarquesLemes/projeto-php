<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/cliente.php";

class ClienteDAO {

    private $conn;

    public function __construct(){
        $this->conn = (new Database())->getConnection();
    }

    public function inserir(Cliente $cliente){
        $sql = "INSERT INTO clientes (nome, email) VALUES (:nome, :email)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nome", $cliente->getNome());
        $stmt->bindValue(":email", $cliente->getEmail());

        return $stmt->execute();
    }

    public function listar(){
        return $this->conn->query("SELECT * FROM clientes ORDER BY id DESC")
                          ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id){
        $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $d = $stmt->fetch(PDO::FETCH_ASSOC);

        return $d ? new Cliente($d['id'], $d['nome'], $d['email']) : null;
    }

    public function atualizar(Cliente $cliente){
        $sql = "UPDATE clientes SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nome", $cliente->getNome());
        $stmt->bindValue(":email", $cliente->getEmail());
        $stmt->bindValue(":id", $cliente->getId());

        return $stmt->execute();
    }
public function temPedidos($id) {
    $sql = "SELECT COUNT(*) as total FROM pedidos WHERE cliente_id = :id";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resultado['total'] > 0;
}

public function excluir($id) {

    $sql = "DELETE FROM clientes WHERE id = :id";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(":id", $id);

    return $stmt->execute();
}
    }