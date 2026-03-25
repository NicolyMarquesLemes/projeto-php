<?php

class Pedido {

    private $id;
    private $cliente;
    private $produtos = [];

    public function __construct($id = null, $cliente = null){
        $this->id = $id;
        $this->cliente = $cliente;
    }

    public function adicionarProduto($produto){
        $this->produtos[] = $produto;
    }

    public function getProdutos(){
        return $this->produtos;
    }

    public function calcularTotal(){
        $total = 0;
        foreach ($this->produtos as $p){
            $total += $p->getPreco();
        }
        return $total;
    }

    public function getCliente(){
        return $this->cliente;
    }
}