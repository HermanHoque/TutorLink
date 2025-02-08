TutorLink

para rodar o projeto deve instalar o composer no terminal,
se você esta usando o programa Laragon o composer já vem instalado por padrão então é só abrir o terminal do Laragon e digitar os seguintes comandos:

1- composer global require laravel/installer (caso não tenha o Framework laravel instalado)

2- composer install (para instalar as dependencias do projeto)

3-  copy .env.example .env (para criar o arquivo .env)

4-  php artisan key:generate

5- php artisan migrate (caso ainda não possue a base de dados no computador)

caso esteja a usar o Xampp ou outro programa você deve instalar o composer primeiro e depois seguir os passos acima.