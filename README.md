# Desafio ZapSign

## Requisitos:
- PHP v8.2
- Composer v2.5.1
- MySQL Database

## Como executar o projeto:

- Substitua as informações da sua DB_CONNECTION no arquivo .env (linhas 11-16)
- Execute o comando `composer install` para instalar as dependências;
- Execute o comando `php artisan migrate` para criar as tabelas no banco;
- Execute o comando `php artisan serve` para subir o servidor;
- Acesse o servidor de desenvolvimento através do endereço [http://127.0.0.1:8000]. 

*Obs.: é necessário criar uma companhia antes de criar um usuário, e é necessário criar um usuário antes de criar um doc*