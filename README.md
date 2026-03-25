# 📦 Sistema de Pedidos em PHP

Sistema simples para cadastro de **clientes, produtos e pedidos**, desenvolvido com PHP e MySQL, utilizando Programação Orientada a Objetos (POO) e padrão DAO.

---

## 🚀 Funcionalidades

- Cadastro de clientes
- Cadastro de produtos
- Criação de pedidos
- Associação de vários produtos a um pedido
- Listagem de clientes e produtos
- Validação básica de dados

---

## 🛠️ Tecnologias

- PHP
- MySQL
- HTML
- CSS
- PDO

---

## 📁 Estrutura do Projeto


/loja
│
├── config/
│ └── Database.php
│
├── models/
│ ├── Cliente.php
│ ├── Produto.php
│ └── Pedido.php
│
├── dao/
│ ├── ClienteDAO.php
│ ├── ProdutoDAO.php
│ └── PedidoDAO.php
│
├── index.php
└── style.css


---

## 🗄️ Banco de Dados

```sql
CREATE DATABASE loja;
USE loja;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100)
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    preco DECIMAL(10,2)
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE pedido_produtos (
    pedido_id INT,
    produto_id INT,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

⚙️ Configuração

No arquivo config/Database.php, configure:

private $host = "localhost";
private $db   = "loja";
private $user = "root";
private $pass = "";

▶️ Como executar
Coloque o projeto no htdocs (XAMPP) ou servidor local
Inicie Apache e MySQL
Acesse:
http://localhost/projeto-php/index.php

🧪 Como usar
Cadastre um cliente
Cadastre produtos
Crie um pedido selecionando cliente e produtos

💡 Melhorias futuras
CRUD completo (editar/deletar)
Interface mais moderna
Listagem de pedidos
Cálculo automático de total
Uso de AJAX
Estrutura MVC completa