# Payment System

## Instalação

1. Clone o repositório:
```sh
git clone https://github.com/leonardo403/payment-lima.git
```

2. Navegue até o diretório do projeto:
```sh
cd payment-system
```
3. Instale as dependências:
```sh
composer install
```
4. Configure o arquivo .env:
```sh
cp .env.example .env
```
Atualize as variáveis de ambiente conforme necessário.

6. Gere a chave da aplicação:
```sh
php artisan key:generate
```
7. Configure o banco de dados e execute as migrações:
```sh
php artisan migrate
```
8. Inicie o servidor:
```sh
php artisan serve
```
9. Iniciar o Projeto com Docker Compose
```sh
docker-compose up -d
```
10. Acessar a Aplicação
 Após iniciar os containers, a aplicação estará disponível em http://localhost:8000.

11. Migrar o Banco de Dados
Para rodar as migrações do banco de dados, execute:
```sh
docker-compose exec app php artisan migrate
```

# Testes
Execute os testes:
```sh
php artisan test
```

# Como usar
1. Acesse a página de pagamento:

```sh
http://localhost:8000/
```
2. Preencha o formulário de pagamento e envie.

3. Se o pagamento for bem-sucedido, você será redirecionado para a página de agradecimento.
