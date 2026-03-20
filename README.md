# Sistema de Pedidos da Loja

## 💡 Descrição do Projeto
Este projeto implementa um **sistema de pedidos para uma loja** utilizando **PHP Orientado a Objetos (POO)**, com HTML e CSS, garantindo layout limpo e responsivo.  

O sistema permite:  

- Cadastrar clientes  
- Cadastrar produtos (com validação de preço)  
- Criar pedidos e adicionar produtos  
- Calcular o valor total do pedido  
- Exibir um resumo organizado do pedido  

---

## 🗂 Estrutura do Projeto

```bash
projeto_loja/
│
├── index.php
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

📌 Como Executar

Instale um servidor PHP (XAMPP, WAMP ou PHP Built-in server).

Mantenha a estrutura de pastas conforme o projeto.

Abra index.php no navegador.

Visualize o resumo do pedido e teste a adição de produtos.

📜 Licença

Projeto open source para estudo e prática pessoal.

📈 Próximos Passos (opcional)

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
