<?php

class Produto {

    private $id;
    private $nome;
    private $preco;

    public function __construct($id = null, $nome = null, $preco = 0) {
        $this->id = $id;
        $this->nome = $nome;
        $this->setPreco($preco);
    }

    public function getId(){ return $this->id; }
    public function getNome(){ return $this->nome; }
    public function getPreco(){ return $this->preco; }

    public function setPreco($preco){
        if ($preco < 0) {
            throw new Exception("Preço inválido");
        }
        $this->preco = $preco;
    }
}