<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Cliente.php";

class ClienteDAO {

    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function inserir(Cliente $cliente){

    $sql = "INSERT INTO clientes (nome, email)
            VALUES (:nome, :email)";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(":nome", $cliente->getNome());
    $stmt->bindValue(":email", $cliente->getEmail());

    return $stmt->execute();
}

   public function listar(){
    $sql = "SELECT * FROM clientes";
    return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
}

        

  
