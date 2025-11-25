# StockFlow - Sistema de Gestão de Estoque

## 📋 Sobre o Projeto
O **StockFlow** é um sistema completo de gestão de estoque desenvolvido em **Laravel 11**, projetado para otimizar o controle de produtos, movimentações e relatórios em empresas de diversos portes.

## 🚀 Tecnologias Utilizadas
- **Backend**: Laravel 11, PHP 8.2+, MySQL, Eloquent ORM
- **Frontend**: Tailwind CSS, Alpine.js, Blade Templates
- **Ferramentas**: Composer, Node.js, Git

## 🎯 Funcionalidades Principais
- **Gestão Completa de Produtos** - CRUD completo com controle de estoque
- **Sistema de Usuários** - Controle de acesso com permissões hierárquicas
- **Movimentações de Estoque** - Entradas e saídas com histórico detalhado
- **Relatórios Avançados** - Análises em tempo real do estoque
- **Interface Responsiva** - Design moderno e adaptável
- **Segurança** - Autenticação e autorização robustas

## 📦 Instalação Rápida

```bash
# Clone o repositório
git clone https://github.com/silasrosario/stockflow.git
cd stockflow

# Instale as dependências
composer install
npm install

# Configure o ambiente
cp .env.example .env
php artisan key:generate

# Configure o banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stock_management
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Execute migrações e seeders
php artisan migrate --seed

# Compile os assets
npm run build

# Inicie o servidor
php artisan serve

👥 Usuários Padrão
Administrador:

Email: admin@stock.com

Senha: password

Funcionários:

Email: joao@stock.com, maria@stock.com, carlos@stock.com

Senha: password

🔐 Sistema de Permissões
Administrador: Acesso completo ao sistema

Funcionário: Apenas movimentações de estoque

🏗️ Estrutura do Projeto
text
app/
├── Models/ (User, Product, Movement)
├── Http/Controllers/ (User, Product, Movement, Report)
└── Middleware/ (CheckAdmin)
database/
├── migrations/
└── seeders/
resources/views/
├── layouts/
├── users/
├── products/
├── movements/
└── reports/
📊 Funcionalidades Detalhadas
Produtos: Cadastro, edição, exclusão, controle de estoque

Movimentações: Registro de entradas/saídas, histórico, fotos

Relatórios: Estoque atual, movimentações, gráficos

Usuários: Cadastro, permissões, diferentes níveis de acesso

🎨 Interface
Design moderno com Tailwind CSS

Totalmente responsiva

Cores: Azul (#3B82F6) e gradientes

Tipografia: Inter Font Family

👨‍💻 Desenvolvedor
Silas Rosário - Desenvolvedor Full Stack


🛠️ Habilidades Técnicas
Backend: PHP, Laravel, MySQL, API REST

Frontend: JavaScript, Vue.js, Tailwind CSS

Ferramentas: Git, Docker, Linux

📞 Suporte
Email: silas.rosario@email.com

LinkedIn: Silas Rosário

Issues: GitHub Issues

StockFlow - Transformando a gestão de estoque com tecnologia moderna! 🚀