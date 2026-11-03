# 🌐 Controle de Estoque de Limpeza - Back-End & API Web

API RESTful desenvolvida em **Laravel** para o gerenciamento e controle do estoque de produtos de limpeza, responsável por centralizar a lógica de negócios, controle de dados e autenticação de usuários do sistema.

---

## 🎯 Objetivo

Fornecer uma estrutura backend sólida e endpoints para a aplicação mobile e a interface web, garantindo a gestão eficiente de produtos de limpeza, histórico de validade e controle de acesso aos dados.

---

## 🚀 Tecnologias Utilizadas

* **PHP 8.x**
* **Laravel Framework**
* **MySQL / MariaDB** (gerenciado via HeidiSQL)
* **Composer** (Gerenciador de dependências)

---

## 🗄️ Estrutura do Banco de Dados

### Tabela `usuario`
* `id` (BIGINT, Primary Key, Auto-increment)
* `nome` (VARCHAR 255)
* `email` (VARCHAR 255)
* `senha` (TEXT)
* `data_nascimento` (DATE)
* `cpf` (VARCHAR 255)
* `created_at` / `updated_at` (TIMESTAMP)

### Tabela `produto`
* `id` (BIGINT, Primary Key, Auto-increment)
* `nome_produto` (VARCHAR 255)
* `codigo` (VARCHAR 255)
* `estoque` (INT)
* `categoria` (VARCHAR 255)
* `fornecedor` (VARCHAR 255)
* `data_validade` (DATE)
* `descricao` (TEXT)
* `created_at` / `updated_at` (TIMESTAMP)

---

## ⚙️ Rotas da API

| Método | Rota | Descrição |
| --- | --- | --- |
| `POST` | `/api/login` | Autenticação do usuário no sistema |
| `POST` | `/api/register` | Cadastro de novos usuários |
| `GET` | `/api/produtos` | Listagem de todos os produtos cadastrados |
| `POST` | `/api/produtos` | Cadastro de um novo produto no estoque |
| `PUT` | `/api/produtos/{id}` | Edição dos dados de um produto existente |
| `DELETE` | `/api/produtos/{id}` | Remoção de produto do estoque |

---

## 🔧 Como Configurar e Executar o Projeto Web (API)

### Pré-requisitos
* PHP 8.x instalado
* Composer instalado
* Servidor MySQL ativo

### Passos de Instalação:

```bash
# 1. Clonar o repositório
git clone [https://github.com/usuario/controle-estoque-limpeza.git](https://github.com/usuario/controle-estoque-limpeza.git)

# 2. Acessar a pasta da API/Web
cd controle-estoque-limpeza/backend

# 3. Instalar as dependências do PHP
composer install

# 4. Criar o arquivo de configuração de ambiente (.env)
cp .env.example .env

# 5. Gerar a chave de criptografia da aplicação
php artisan key:generate

# 6. Configurar os dados de acesso ao banco MySQL no arquivo .env
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

# 7. Executar as migrações para criar as tabelas no banco de dados
php artisan migrate

# 8. Iniciar o servidor de desenvolvimento
php artisan serve