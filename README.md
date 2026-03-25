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
<<<<<<< HEAD
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
=======
├── style.css
└── classes/
    ├── Cliente.php
    ├── Produto.php
    └── Pedido.php
🧱 Classes do Sistema
1. Cliente

Atributos:

id

nome

email

Responsabilidade: Representa o cliente do pedido.

Exemplo de uso:

$cliente1 = new Cliente(1, "João Silva", "joao@email.com");

Imagem ilustrativa:
<img width="560" height="569" alt="image" src="https://github.com/user-attachments/assets/bf1d94cb-e55a-40e7-9cff-9a144dc1151c" />

2. Produto

Atributos:

id

nome

preco

Responsabilidade: Representa os produtos que podem ser adicionados ao pedido.

Regras:

Preço não pode ser negativo (validação no setter).

Exemplo de uso:

$p1 = new Produto(1, "Notebook", 3500);
$p2 = new Produto(2, "Mouse Gamer", 150);

Imagem ilustrativa:
<img width="472" height="576" alt="image" src="https://github.com/user-attachments/assets/ba4facf8-db90-4624-a6ce-d57f1b31e686" />

3. Pedido

Atributos:

numero

cliente (objeto Cliente)

produtos (array de Produtos)

Métodos:

adicionarProduto()

calcularTotal()

exibirResumo()

Exemplo de uso:

$pedido1 = new Pedido(1001, $cliente1);
$pedido1->adicionarProduto($p1);
$pedido1->adicionarProduto($p2);
$pedido1->exibirResumo();

Imagem ilustrativa:
<img width="504" height="570" alt="image" src="https://github.com/user-attachments/assets/40b8d14f-8604-42cb-96dc-b809c383f0dd" />

⚙️ Funcionalidades do Sistema

Cadastro de Cliente

Armazena nome e email do cliente

Permite visualização no resumo do pedido


Cadastro de Produtos

Nome e preço do produto

Validação: preço não pode ser negativo


Criação de Pedido

Associa um cliente ao pedido

Permite adicionar múltiplos produtos


Resumo do Pedido

Lista produtos adicionados

Calcula total do pedido

Exibe informações organizadas


🎨 Interface e Estilo

Layout limpo e organizado

Cores suaves e fonte legível (Arial, sans-serif)

Responsivo para telas de celular usando media queries

Exemplo em celular:
<img width="540" height="421" alt="image" src="https://github.com/user-attachments/assets/18e1ccdb-7a1f-4cd6-8140-d0588b9e718a" />

🧠 Tecnologias Utilizadas

PHP (POO)

HTML5

CSS3

Media queries para responsividade

📌Como Executar o Sistema

Siga os passos abaixo para executar o projeto localmente:

Instalar um servidor PHP

Ex: XAMPP
, WAMP ou usar o PHP Built-in server.

Baixar ou clonar o projeto

git clone https://github.com/seu-usuario/projeto-php.git
cd projeto-php

Manter a estrutura de pastas
Certifique-se de que index.php, style.css e a pasta classes/ estão na mesma raiz.

Abrir o projeto no navegador

Se estiver usando XAMPP/WAMP, coloque a pasta em htdocs ou www

Acesse via navegador: http://localhost/rojeto-php/projeto_loja/index.php

Visualizar o resumo do pedido

O pedido será exibido com informações do cliente, produtos e total calculado.

Teste a adição de novos produtos ou clientes alterando index.php.

📜 Licença

Projeto open source para estudo e prática pessoal.

📈 Próximos Passos

Adicionar quantidade de produtos no pedido

Implementar subtotal por item

Criar login de cliente e autenticação

Salvar pedidos em banco de dados

📝 Observações

Todos os atributos estão encapsulados (private).

Getters e setters foram usados para acesso e manipulação.

Construtores garantem inicialização correta dos objetos.

Layout adaptado para celular, tablets e desktop.

Comentários no código ajudam na manutenção.
>>>>>>> 01b3ea511cc3a43034f6c9ffb3c78a561e25b1c3
