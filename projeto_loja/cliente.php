<?php
class Cliente {
    private $id;
    private $nome;
    private $email;

    function __construct($id, $nome, $email){
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    function getId(){ return $this->id; }
    function getNome(){ return $this->nome; }
    function getEmail(){ return $this->email; }

    function setId($id){ $this->id = $id; }
    function setNome($nome){ $this->nome = $nome; }
    function setEmail($email){ $this->email = $email; }
}
?>