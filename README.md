# TESTE LARAVEL API 

Para rodar este projeto é necessário ter instalado e configurado o ambiente de desenvolvimento para PHP/Laravel. Foi utilizado banco de dados MySQL. A compatibilidade com outros bancos não é garantida. 
É necessário criar um banco de dados com o nome de sua preferência e colocar as informações de conexão no arquivo .env. Os parâmetros a serem configurados são:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nomeBancoDeDados
DB_USERNAME=root
DB_PASSWORD=


Abrir um terminal na pasta do projeto e rodar os seguintes comandos:

composer install
php artisan migrate --seed


Subir o ambiente de desenvolvimento conforme sua configuração.


# ENDPOINTS

Efetuar Saque
POST /api/conta/saque

Efetuar Depósito
POST /api/conta/deposito

Exemplo de Payload
{
    "conta": {"1001"},
    "valor": 10
}

Visualizar saldo
GET /api/conta/{numero_conta}
