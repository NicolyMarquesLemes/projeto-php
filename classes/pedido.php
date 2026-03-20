<?php
class Pedido {
    private $numero;
    private $cliente; 
    private $produtos = array(); 

    function __construct($numero, $cliente){
        $this->numero = $numero;
        $this->cliente = $cliente;
    }

    function adicionarProduto($produto){
        $this->produtos[] = $produto;
    }

    function calcularTotal(){
        $total = 0;
        foreach($this->produtos as $produto){
            $total += $produto->getPreco();
        }
        return $total;
    }

    function exibirResumo(){
        echo "<h2>Pedido Nº " . $this->numero . "</h2>";
        echo "<h3>Cliente:</h3>";
        echo $this->cliente->getNome() . "<br>";
        echo $this->cliente->getEmail() . "<br>";

        echo "<h3>Produtos:</h3><ul>";
        foreach($this->produtos as $produto){
            echo "<li>" . $produto->getNome() . " - R$ " . number_format($produto->getPreco(),2,',','.') . "</li>";
        }
        echo "</ul>";

        echo "<h3>Total do Pedido: R$ " . number_format($this->calcularTotal(),2,',','.') . "</h3>";
    }
}
?>