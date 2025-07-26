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
