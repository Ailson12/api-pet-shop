## API Pet Shop

Esta API atua juntamente com a interface desenvolvida em vuejs https://github.com/Ailson12/pet-shop.

## Requisitos do sistema
- Composer

## Instalação

- Realizar clone do projeto

    ```
       git clone https://github.com/Ailson12/api-pet-shop
    ```
- Instalar as depêndencias
```
    composer install
```
- Acessar o SGBD(Preferencial Postgres) e criar o banco do sistema.

- Abra o arquivo .ENV na raiz do projeto, altere as variáveis de ambiente para se adequar ao cenário de sua infraestrutura.
- segue abaixo o exemplo de conexão.
```
    DB_CONNECTION=mysql
    DB_HOST=http://localhost
    DB_PORT=3306
    DB_DATABASE=frutaria
    DB_USERNAME=root
    DB_PASSWORD=root
```

- Pelo terminal execute o comando abaixo para gerar a chave da aplicação
```
    php artisan key:generate
```

- Execute o comando abaixo para criar as tabelas do sistema e povoar o banco de dados
```
    php artisan migrate --seed
```

- Para executar o servidor do artisan
```
    php artisan serve
```
