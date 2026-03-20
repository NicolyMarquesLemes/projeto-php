<?php
class Produto {
    private $id;
    private $nome;
    private $preco;

    function __construct($id, $nome, $preco){
        $this->id = $id;
        $this->nome = $nome;
        $this->setPreco($preco); 
    }

    function getId(){ return $this->id; }
    function getNome(){ return $this->nome; }
    function getPreco(){ return $this->preco; }

    function setId($id){ $this->id = $id; }
    function setNome($nome){ $this->nome = $nome; }

    function setPreco($preco){
        if($preco < 0){
            echo "Erro: preço não pode ser negativo.<br>";
        } else {
            $this->preco = $preco;
        }
    }
}
?>