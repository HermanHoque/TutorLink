TutorLink

para rodar o projeto deve instalar o composer no terminal,
se você esta usando o programa Laragon o composer já vem instalado por padrão então é só abrir o terminal do Laragon e digitar os seguintes comandos:

1- composer global require laravel/installer (caso não tenha o Framework laravel instalado)

2- entra na raiz do projeto

3- composer install (para instalar as dependencias do projeto)

4-  copy .env.example .env (para criar o arquivo .env)

5-  php artisan key:generate

6- php artisan migrate (caso ainda não possue a base de dados no computador)

(opcional) preencher a base de dados automaticamente com dados pré definidos
7- php artisan db:seed

caso esteja a usar o Xampp ou outro programa você deve instalar o composer primeiro e depois seguir os passos acima.



## COMANDOS DE MIGRATIONS NO LARAVEL ##

# Criar uma nova migration
php artisan make:migration create_users_table

# Criar migration com --create (nova tabela)
php artisan make:migration create_products_table --create=products

# Criar migration com --table (alterar tabela existente)
php artisan make:migration add_email_to_users_table --table=users

# Executar todas as migrations pendentes
php artisan migrate

# Reverter a última batch de migrations
php artisan migrate:rollback

# Reverter todas as migrations (reset)
php artisan migrate:reset

# Reverter e rodar novamente todas as migrations (refresh)
php artisan migrate:refresh

# Reverter e rodar novamente todas as migrations + seeders
php artisan migrate:refresh --seed

# Executar as migrations do zero (dropa todas as tabelas e recria)
php artisan migrate:fresh

# Executar as migrations do zero + seeders
php artisan migrate:fresh --seed

# Ver o status das migrations
php artisan migrate:status

# Rodar seeders
php artisan db seed
